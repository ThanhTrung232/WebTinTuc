<?php 
    class adminModel extends DB{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        public function check_admin($username){
            // kiem tra coi user tồn tại chưa
            $this->db->query("SELECT Username FROM users WHERE Username = :username");
            
            //bind value
            $this->db->bind(':username',$username);

            $result = $this->db->resultSet();
            
            $data_exists = ($this->db->rowCount() > 0) ? "true" : "false";

            return $data_exists;
        }
        public function check_admin_all($username,$password){
            // kiem tra coi user tồn tại chưa
            $this->db->query("SELECT Username,Password FROM admin WHERE Username = :username");

            //bind value
            $this->db->bind(':username',$username);

            $result = $this->db->resultSet();
            
            $data_exists = ($this->db->rowCount() > 0) ? "true" : "false";
            
            if($data_exists == "true"){
                foreach($result as $user){
                    return ($user->Password == $password ) ? "true" : "false";
                }
            }
            else{
                return false;
            }
        }
        public function dstheloai(){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM type");

            $result = $this->db->resultSet();

            return $result;
        }

}
?>