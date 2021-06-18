<?php
    class Api{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        //Insert user 
        public function insertUser($fullname,$username,$password,$email,$level,$gender,$avatar,$RegisterDay,$Birthday,$permission){
            $this->db->query("INSERT INTO users VALUES(null,:fullname,:username,:password,:email,:RegisterDay,:level,:Birthday,:gender,:avatar,:privileges)");
         
            // bind value
            $this->db->bind(':fullname',$fullname);
            $this->db->bind(':username',$username);
            $this->db->bind(':password',$password);
            $this->db->bind(':email',$email);
            $this->db->bind(':level',$level);
            $this->db->bind(':gender',$gender);
            $this->db->bind(':avatar',$avatar);
            $this->db->bind(':RegisterDay',$RegisterDay);
            $this->db->bind(':Birthday',$Birthday);
            $this->db->bind(':privileges',$permission);
            //
            if($this->db->execute()){
                return  "true";
            }else{
                return  "false";
            }
         }

         //Update User
         public function updatetUser($fullname,$IdUser,$password,$email,$level,$gender,$Birthday,$privileges){
            $this->db->query("UPDATE users SET FullName = :fullname, Password = :password,Email = :email,IdGroup = :level, BirthDay = :Birthday, Gender = :gender, privileges = :privileges WHERE  users . IdUser = :IdUser");
         
            // bind value
            $this->db->bind(':fullname',$fullname);
            $this->db->bind(':IdUser',$IdUser);
            $this->db->bind(':password',$password);
            $this->db->bind(':email',$email);
            $this->db->bind(':level',$level);
            $this->db->bind(':gender',$gender);
            $this->db->bind(':Birthday',$Birthday);
            $this->db->bind(':privileges',$privileges);

            if($this->db->execute()){
                return  "true";
            }else{
                return  "false";
            }
        }

        // delete User
        public function deleteUser($IdUser){
            $this->db->query("DELETE FROM users WHERE IdUser = :IdUser");
            
            //bind
            $this->db->bind(':IdUser',$IdUser);

            if($this->db->execute()){
                return  true;
            }else{
                return  false;
            }
        }

        // get info all User
        public function getAllUsers(){
            $this->db->query("SELECT * FROM users order by Username asc");

            $result = $this->db->resultSet();

            return $result;
        }
        // get info one User by ID
        public function getIDuser($IdUser){
            $this->db->query("SELECT * FROM users WHERE IdUser =:IdUser ");

            //bind
            $this->db->bind(':IdUser',$IdUser);

            $result = $this->db->single();

            return $result;
        }
        

    }
    $api = new Api();
?>