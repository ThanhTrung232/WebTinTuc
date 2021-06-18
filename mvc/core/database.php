<?php
    class DB{
        public $connect;
        private $server     = DB_HOST;
        private $user       = DB_USER;
        private $password   = DB_PASS;
        private $dbName     = DB_NAME; // tên csdl 

        private $statement;
        private $dbHander;
        private $error;

        function __construct(){
            /*
            $this->connect = mysqli_connect ($this->server,$this->user,$this->password,$this->dbname) or die ('ket noi that bai');
            mysqli_select_db($this->connect,$this->dbname);
            mysqli_query($this->connect,"SET NAMES UTF8");
            */
            $conn = 'mysql:host=' . $this->server . ';dbname=' . $this->dbName;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            try {
                $this->dbHander = new PDO($conn,$this->user,$this->password,$options);
            }catch (PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // Alows us wirte queries
        public function query($sql){
            $this->statement = $this->dbHander->prepare($sql);
        }

        //Bind value
        public function bind($parameter, $value, $type=null){
            switch (is_null($type)) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            $this->statement->bindValue($parameter, $value, $type);
        }

        //Excute the prepared statement
        public function execute() {
            return $this->statement->execute();
        }

        //Return an array
        public function resultSet(){
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        //Return a specific row as an object
        public function single(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        //Get's the row count
        public function rowCount(){
            return $this->statement->rowCount();
        }
        //
        public function fetchColumn(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_COLUMN, 1);
        }

    }