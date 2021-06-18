<?php 

    class usersModel{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        public function getUsers(){
            $this->db->query("SELECT * FROM users order by Username asc");

            $result = $this->db->resultSet();

            return $result;
        }
        // phan quyền 
        public function getPrivileges($username){
            $this->db->query("SELECT privileges FROM users WHERE Username =:username ");

            //bind
            $this->db->bind(':username',$username);

            $result = $this->db->single();

            return $result;
        }
        //lay id user 
         // phan quyền 
         public function getIDuser($username){
            $this->db->query("SELECT IdUser FROM users WHERE Username =:username ");

            //bind
            $this->db->bind(':username',$username);

            $result = $this->db->single();

            return $result;
        }
        //check_user
        public function check_user($username){
            // kiem tra coi user tồn tại chưa
            $this->db->query("SELECT Username FROM users WHERE Username = :username");
            
            $this->db->bind(':username',$username);
            
            $this->db->single();

            $data_exists = ($this->db->rowCount() > 0) ? "true" : "false";

            return $data_exists;

        }
        // check admin user 
        public function check_admin_user($username,$password){
            // kiem tra coi user tồn tại chưa
            $this->db->query("SELECT Username,Password,IdGroup FROM users WHERE Username = :username");

            $this->db->bind(':username',$username);

            $result = $this->db->resultSet();
            
            $data_exists = ($this->db->rowCount() > 0) ? "true" : "false";
            
            if($data_exists == true){
                foreach($result as $user){
                    return ($user->Password == $password && $user->IdGroup == "1") ? true : false;
                }
            }
            else{
                return false;
            }
        }
        // check user 
        public function check_user_0($username,$password){
            // kiem tra coi user tồn tại chưa
            $this->db->query("SELECT Username,Password,IdGroup FROM users WHERE Username = :username");

            $this->db->bind(':username',$username);

            $result = $this->db->resultSet();
            
            $data_exists = ($this->db->rowCount() > 0) ? "true" : "false";
            
            if($data_exists == true){
                foreach($result as $user){
                    return ($user->Password == $password && $user->IdGroup == "0") ? true : false;
                }
            }
            else{
                return false;
            }
        }
        //Check email 
        public function check_email($email){
            // kiem tra coi user tồn tại chưa
            $this->db->query("SELECT Username FROM users WHERE Email = :email");
            
            $this->db->bind(':email',$email);

            $result = $this->db->resultSet();
            
            $data_exists = ($this->db->rowCount() > 0) ? "true" : "false";

            return $data_exists;

        }
        // Insert User
        public function insertUser($fullname,$username,$password,$email,$level,$gender,$avatar,$RegisterDay,$Birthday,$permission,$token){
            $this->db->query("INSERT INTO users VALUES(null,:fullname,:username,:password,:email,:RegisterDay,:level,:Birthday,:gender,:avatar,:privileges,:token)");
         
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
            $this->db->bind(':token',$token);
            //
            $result = $this->db->execute();
        
            return  $result;
 
         }
        // get info 1 user by ID
        public function GetInfoUser($IdUser){
            $this->db->query("SELECT * FROM users WHERE IdUser = :IdUser");
            
            //bind
            $this->db->bind(':IdUser',$IdUser);

            $result = $this->db->resultSet();

            return $result;
        }
        //  delete info 1 user
        public function deleteUser($IdUser){
            $this->db->query("DELETE FROM users WHERE IdUser = :IdUser");
            
            //bind
            $this->db->bind(':IdUser',$IdUser);

            $result = $this->db->execute();

            if(isset($result)){
                return true;
            }
            return false;
         }
        // update info 1 user
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

            $result = $this->db->execute();
        
            return  $result;
        }
        public function rowCount(){
            
            $result = $this->db->rowCount();

            return $result;
        }
        public function Get_permission(){
            $this->db->query("SELECT * FROM permission");
            
            $result = $this->db->resultSet();

            return $result;

        }
}
?>