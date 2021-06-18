<?php 
    class noidungModel{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        public function dsnoidung(){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM news");

            $result = $this->db->resultSet();

            return $result;
        }
        public function dsnoidung_DESC(){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM news ORDER BY IdNews DESC");

            $result = $this->db->resultSet();

            return $result;
        }
        public function dsnoidung_view(){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM news ORDER BY Views DESC");

            $result = $this->db->resultSet();

            return $result;
        }
        public function dsnoidung_user($IdUser){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM news WHERE IdUser =:IdUser");

            //bind value
            $this->db->bind(':IdUser',$IdUser);
            //excute
            $result = $this->db->resultSet();
            return $result;
        }
        
        public function Insert_noidung($Title,$_Overview,$_Detail,$_UrlPics,$_NewsAppear,$_Keyword,$_Day,$IdNewsType,$IdUser,$HotNews){
            $this->db->query("INSERT INTO news (IdNews, IdUser ,Title, Overview, Detail, UrlPics, Day, Views, NewsAppear, Keyword, IdNewsType, HotNews) VALUES (NULL,:IdUser, :Title, :_Overview, :_Detail, :_UrlPics, :_Day, :Views, :_NewsAppear, :_Keyword, :IdNewsType, :HotNews)");
         
            //bind value
            $Views = 0;
            $this->db->bind(':_Overview',$_Overview);
            $this->db->bind(':_Detail',$_Detail);
            $this->db->bind(':_UrlPics',$_UrlPics);
            $this->db->bind(':_NewsAppear',$_NewsAppear);
            $this->db->bind(':_Keyword',$_Keyword);
            $this->db->bind(':_Day',$_Day);
            $this->db->bind(':Title',$Title);
            $this->db->bind(':IdNewsType',$IdNewsType);
            $this->db->bind(':Views',$Views);
            $this->db->bind(':IdUser',$IdUser);
            $this->db->bind(':HotNews',$HotNews);


            $result = $this->db->execute();
        
            return  $result;
 
         }
         //  delete 1 the loai
        public function delete_noidung($IdNews,$IdNewsType){
           $this->db->query("DELETE FROM news WHERE IdNews = :IdNews AND IdNewsType = :IdNewsType");
            

           $this->db->bind(':IdNews',$IdNews);
           $this->db->bind(':IdNewsType',$IdNewsType);
           
            $result = $this->db->execute();

            if(isset($result)){
                return true;
            }
            return false;
         }
         // get info 1 noidung
        public function get_noidung($IdNews){
            $this->db->query("SELECT * FROM news WHERE IdNews = :IdNews");
            
            $this->db->bind(':IdNews',$IdNews);

            $result = $this->db->resultSet();

            return $result;
        }
         // update info 1 the loai
         public function update_noidung($IdNews,$Title,$_Overview,$_Detail,$_UrlPics,$_NewsAppear,$_Keyword,$_Day,$_IdNewsType,$IdNewsType,$HotNews){
            $this->db->query("UPDATE news SET Overview = :_Overview, Detail = :_Detail, UrlPics = :_UrlPics, NewsAppear = :_NewsAppear ,Day = :_Day, Keyword = :_Keyword , IdNewsType = :_IdNewsType, Title = :Title, HotNews = :HotNews  WHERE  IdNews = :IdNews AND IdNewsType = :IdNewsType");

            //bind 
            $this->db->bind(':IdNews',$IdNews);
            $this->db->bind(':_Overview',$_Overview);
            $this->db->bind(':_Detail',$_Detail);
            $this->db->bind(':_UrlPics',$_UrlPics);
            $this->db->bind(':_NewsAppear',$_NewsAppear);
            $this->db->bind(':_Keyword',$_Keyword);
            $this->db->bind(':_Day',$_Day);
            $this->db->bind(':_IdNewsType',$_IdNewsType);
            $this->db->bind(':IdNewsType',$IdNewsType);
            $this->db->bind(':Title',$Title);
            $this->db->bind(':HotNews',$HotNews);

            $result = $this->db->execute();
        
            return  $result;
        }
        // ktra quyen user 
        public function check_iduser($IdUser,$IdNews){

            $this->db->query("SELECT IdUser FROM news WHERE IdNews = :IdNews");
            
            $this->db->bind(':IdNews',$IdNews);

            $result = $this->db->single();

            $check = "false";

            if(isset($result->IdUser)){

            $check = ($result->IdUser == $IdUser) ? "true" : "false";
            
            }

            return $check;
        }
        public function rowCount(){
            
            $result = $this->db->rowCount();

            return $result;
        }
        public function select_product_Limit($start,$limit){
            
            $this->db->query("SELECT * FROM news limit :start, :limit");

            $this->db->bind(':start',$start);
            $this->db->bind(':limit',$limit);

            $result = $this->db->resultSet();

            return $result;

        }
}
?>
