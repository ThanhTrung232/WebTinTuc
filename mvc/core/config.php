<?php
    /*
    class DB{
        public $connect;
        protected $server = "localhost";
        protected $user = "root";
        protected $password = "";
        protected $dbname = "test_lab03"; // tên csdl 

        function __construct(){
            $this->connect = mysqli_connect ($this->server,$this->user,$this->password,$this->dbname) or die ('ket noi that bai');
            mysqli_select_db($this->connect,$this->dbname);
            mysqli_query($this->connect,"SET NAMES UTF8");
        }
    }
    */

    // Database params
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','News');

    //APPROOT
    define('APPROOT',dirname(dirname(__FILE__)));

    //URLROOT 
    define('URLROOT','http://localhost:8080/web-tin-tuc-08');

    //SITENAME 
    define('SITENAME','WEB TIN TỨC');
