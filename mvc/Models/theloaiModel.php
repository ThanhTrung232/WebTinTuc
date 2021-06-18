<?php 
    class theloaiModel{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        public function dstheloai(){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM type");

            $result = $this->db->resultSet();

            return $result;
        }
        //Check the loai
        public function check_theloai($TypeName){
            // kiem tra the loai tồn tại chưa
            $this->db->query("SELECT TypeName FROM type WHERE TypeName = :TypeName");

             //bind value
             $this->db->bind(':TypeName',$TypeName);
            
            $result = $this->db->resultSet();
            
            if($this->db->rowCount() > 0){
                return "true";
            }
            return "false";

        }
        public function Insert_theloai($TypeName,$TypeNumber,$TypeAppear){
            $this->db->query("INSERT INTO type VALUES(null,:TypeName,:TypeNumber,:TypeAppear)");
         
            //bind value
            $this->db->bind(':TypeName',$TypeName);
            $this->db->bind(':TypeNumber',$TypeNumber);
            $this->db->bind(':TypeAppear',$TypeAppear);

            $result = $this->db->execute();
        
            return  $result;
 
         }
         //  delete 1 the loai
        public function delete_theloai($IdType){
            $this->db->query("DELETE FROM type WHERE IdType = :IdType");
            
             //bind value
             $this->db->bind(':IdType',$IdType);

            $result = $this->db->execute();

            if(isset($result)){
                return true;
            }
            return false;
         }
         // get info 1 the loai
        public function GetInfotheloai($IdType){
            $this->db->query("SELECT * FROM type WHERE Idtype = :IdType");
            
            //bind value
            $this->db->bind(':IdType',$IdType);

            $result = $this->db->resultSet();

            return $result;
        }
         // update info 1 the loai
         public function update_theloai($IdType,$_theloai,$STT,$anhien){
            $this->db->query("UPDATE type SET TypeName = :_theloai, TypeNumber = :STT, TypeAppear = :anhien WHERE  IdType = :IdType");

            //bind value
            $this->db->bind(':_theloai',$_theloai);
            $this->db->bind(':STT',$STT);
            $this->db->bind(':anhien',$anhien);
            $this->db->bind(':IdType',$IdType);

            $result = $this->db->execute();
        
            return  $result;
        }
}
?>