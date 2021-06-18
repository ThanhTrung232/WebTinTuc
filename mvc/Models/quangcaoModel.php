<?php 
    class quangcaoModel{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        public function dsquangcao(){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM ads");

            $result = $this->db->resultSet();

            return $result;
        }
        public function dsquangcao_DESC(){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM ads ORDER BY IdAds DESC");

            $result = $this->db->resultSet();

            return $result;
        }
        public function rowCount(){
            
            $result = $this->db->rowCount();

            return $result;
        }
        public function insert_quangcao($AdsDescription,$Url,$UrlAdsPics){
            $this->db->query("INSERT INTO ads (IdAds,AdsDescription,Url,UrlAdsPics) VALUES (NULL,:AdsDescription,:Url,:UrlAdsPics)");
         
            //bind value
            $Views = 0;
            $this->db->bind(':AdsDescription',$AdsDescription);
            $this->db->bind(':Url',$Url);
            $this->db->bind(':UrlAdsPics',$UrlAdsPics);

            $result = $this->db->execute();
        
            return  $result;
 
         }
}
?>