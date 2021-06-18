<?php 
    class loaitinModel{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        public function dsloaitin(){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM newstype");

            $result = $this->db->resultSet();

            return $result;
        }
        public function get_one_loaitin($IdNewsType){
            $this->db->query("SELECT * FROM newstype WHERE IdNewsType = :IdNewsType");
            
            //bind value
            $this->db->bind(':IdNewsType',$IdNewsType);

            $result = $this->db->resultSet();

            return $result;
        }
         //Check the loai co ton tai chua
         public function check_loaitin($NewsTypeName){
            // kiem tra the loai tồn tại chưa
            $this->db->query("SELECT NewsTypeName FROM newstype WHERE NewsTypeName = :NewsTypeName");

             //bind value
            $this->db->bind(':NewsTypeName',$NewsTypeName);

            $result = $this->db->execute();

            if($this->db->rowCount() > 0){
                return "true";
            }
            return "false";
        }
        // UPDATE `newstype` SET `NewsTypeName` = 'Du Lịch cuộc sống', `NewsTypeNumber` = '0', `NewsTypeAppear` = '0', `IdType` = '7' WHERE `newstype`.`IdNewsType` = 4;
        public function update_loaitin($IdNewsType,$NewsTypeName,$NewsTypeNumber,$NewsTypeAppear,$IdType){
            // kiem tra the loai tồn tại chưa
            $this->db->query("UPDATE newstype SET NewsTypeName = :NewsTypeName, NewsTypeNumber = :NewsTypeNumber, NewsTypeAppear = :NewsTypeAppear, IdType = :IdType WHERE IdNewsType = :IdNewsType;
            ");
             //bind value
            $this->db->bind(':IdNewsType',$IdNewsType);
            $this->db->bind(':NewsTypeName',$NewsTypeName);
            $this->db->bind(':NewsTypeNumber',$NewsTypeNumber);
            $this->db->bind(':NewsTypeAppear',$NewsTypeAppear);
            $this->db->bind(':IdType',$IdType);

            $result = $this->db->execute();

            return $result;
        }
        public function Insert_loaitin($NewsTypeName,$NewsTypeNumber,$NewsTypeAppear,$IdType){
            $this->db->query("INSERT INTO newstype VALUES(null,:NewsTypeName,:NewsTypeNumber,:NewsTypeAppear,:IdType)");
         
            //bind value
            $this->db->bind(':NewsTypeName',$NewsTypeName);
            $this->db->bind(':NewsTypeNumber',$NewsTypeNumber);
            $this->db->bind(':NewsTypeAppear',$NewsTypeAppear);
            $this->db->bind(':IdType',$IdType);

            $result = $this->db->execute();
        
            return  $result;
         }
         public function delete_loaitin($IdNewsType){
            $this->db->query("DELETE FROM newstype WHERE IdNewsType = :IdNewsType");
            
             //bind value
             $this->db->bind(':IdNewsType',$IdNewsType);

            $result = $this->db->execute();

            return $result;
         }
    }
?>