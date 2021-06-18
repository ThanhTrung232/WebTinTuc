<?php
    class Phantrang extends home{
 
        //thuoc tinh
 
        public $start;//vị trí bắt đầu
 
        public $total;//tổng số sản phẩm
 
        public $limit=4;//số  sản phẩm trên 1 trang
 
        public $next; //button next
 
        public $back; //button back
 
        public $page_current;  //trang hien tai
 
        public $page;  //lấy page bên file phantrang.php đưa vào
 
        public function __construct($page=NULL){
 
            parent::__construct();
 
            if($page!=NULL){
 
                $this->page=$page;
 
                $this->getPage();//gọi hàm getPage
 
            }    
 
        }
 
        public function getPage(){
 
            if($this->page!=1){
 
                $this->start=($this->page-1)*$this->limit;
 
                $this->page_current=$this->page;
 
            }
 
            else{
 
                $this->start=$this->page-1;
 
                $this->page_current=$this->page;
 
            }
 
        }
 
        public function totalRow(){
            
            $dsnoidung_DESC = $this->noidungModel->dsnoidung_DESC();
            $select_count = $this->noidungModel->rowCount();
            if($select_count > 0) {
                $this->total=ceil($select_count/$this->limit);
                return $this->total;
            }
            // $sql="select * from dienthoai";
 
            // Sanpham::select($sql);
 
            // if(Sanpham::select_count()>0){
 
            //     $this->total=ceil(Sanpham::select_count()/$this->limit);
 
            //     return $this->total;
 
            // }


 
        }
        public function select_product(){

            $dsnoidung_limit = $this->noidungModel->select_product_Limit($this->start,$this->limit);

            $count=$this->noidungModel->rowCount();

            $str="";

            foreach($dsnoidung_limit as $list){
                $str .= '<div class="row pb-4" id="row">
                <div class="col-md-5">
                    <div class="all_hover_news_img">';
                $str .=
                       '<div class="all_news_img"><img src="./'.$list->UrlPics.'" alt=""/></div>';
                $str .='
                        <div></div>
                    </div>
                </div>
                <div class="col-md-7 animate-box">';
                $str .='
                    <a href="'.URLROOT.'/home/viewed/'.$list->IdNews.'" class="all_magna py-2">'.$list->Title.'</a> <a href="'.URLROOT.'/home/viewed/'.$list->IdNews.'" class="all_mini_time py-3">'.$list->Overview.'</a>';
                $str .='
                    <div class="most_all_treding_font_123 align="right">'.$list->Day.'</div>';
                $str .='</div></div>';
            }
            return $str;
            // $sql="select * from dienthoai limit $this->start,$this->limit";
 
            // //echo $sql;
 
            //  Sanpham::select($sql);
 
            // $count=Sanpham::select_count();
 
            // $str="";
 
            // while($row=Sanpham::fetch_array_table()){
 
            //     $str.="<div class=\"sp1\">";
 
            //     $str.="<img src=\"public/images/".$row['hinhdt']."\" width=\"196\" height=\"150\">";
 
            //     $str.="<h1 style=\"font-size:16px\">".$row['tendt']."</h1>";
 
            //     $str.="</div>";
 
            // }
 
            // return $str;
 
        }
 
        public function nut_phantrang(){
 
 
            $link='<ul class="pagination justify-content-center ">';
 
            if($this->page_current>1){
 
                $this->back=$this->page_current-1;
                
                // $link.='<li class="page-item page-link" page="'.$this->back.'" id="goPrevious">Previous</li>';
                $link.='<li class="page-item page-link" page="';
                $link.=$this->back;
                $link.='"id="goPrevious">
                '.'<button class="btn btn-primary btn-sm" type="button" onclick="load_next('.$this->back.')">
                Previous
                </button>'.'
                </li>';
 
            }
 
 
            for($i=1;$i<=$this->totalRow();$i++){
 
                if($i==$this->page_current){
                    $link .= '<li class="page-item page-link " page="'.$i.'">'.
                    '<button class="btn btn-primary btn-sm" type="button" onclick="load_next('.$i.')">
                    '.$i.'
                    </button>'
                    .'</li>';
                }
 
                else{
 
                    $link .= '<li class="page-item page-link " page="'.$i.'">'.
                    '<button class="btn btn-light btn-sm" type="button" onclick="load_next('.$i.')">
                    '.$i.'
                    </button>'
                    .'</li>';
 
                }
 
            }
 
            if($this->page_current<$this->totalRow()){
 
                $this->next=$this->page_current+1;
                $link .= '<li class="page-item page-link " page="'.$this->next.' ">
                <button class="btn btn-primary btn-sm" type="button" onclick="load_next('.$this->next.')">
                next
                </button>
                
                </li>';
            }
            $link.='</ul>';
            return $link;
 
        }
    }
?>
