<?php 
    class newssaveModel extends DB{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        public function add_idnew($IdUser,$IdNews){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("INSERT INTO newssave (id, id_user, id_news) VALUES (NULL, :IdUser, :IdNews)");

            //bind 
            $this->db->bind(':IdUser',$IdUser);
            $this->db->bind(':IdNews',$IdNews);
        
            $result = $this->db->execute();

            return $result;
        }
        public function get_IDnews($IdUser){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT id_news FROM newssave WHERE id_user = :IdUser");

            //bind 
            $this->db->bind(':IdUser',$IdUser);
        
            $result = $this->db->resultSet();

            return $result;
        }
}
?>