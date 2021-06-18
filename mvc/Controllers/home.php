<?php 
    include_once('phantrang.php');
    class home extends Controller{
        public function __construct(){
            //Model 
            //$this->adminModel = $this->model("adminModel");
            $this->userModel = $this->model("usersModel");
            $this->noidungModel = $this->model("noidungModel");
            $this->theloaiModel = $this->model("theloaiModel");
            $this->loaitinModel = $this->model("loaitinModel");
            $this->newssaveModel = $this->model("newssaveModel");
            $this->quangcaoModel = $this->model("quangcaoModel");
        }
        function SayHi(){
            $ds_theloai = $this->theloaiModel->dstheloai();
            $ds_loaitin= $this->loaitinModel->dsloaitin();
            $dsnoidung_DESC = $this->noidungModel->dsnoidung_DESC();
            $dsnoidung_view = $this->noidungModel->dsnoidung_view();
            $dsquangcao_DESC = $this->quangcaoModel->dsquangcao_DESC();
            $row = $this->quangcaoModel->rowCount();
            //$tintuc = $this->tieudeModel->dsTintuc();
            //$user = $this->userModel->getUsers();
            if(!isset($_GET['page'])){
                if(isset($_SESSION['viewed'])){
                    if(isset($_SESSION['viewed']) != null ){
                        foreach($_SESSION['viewed'] as $list){ 
                            $dsview[] = $this->noidungModel->get_noidung($list);
                        }
                    }
                    $this->view("home", [
                        "pages"      => "index",
                        "dsview"  => $dsview,
                        "dsnoidung"  => $dsnoidung_DESC,
                        "ds_loaitin"  => $ds_loaitin,
                        "ds_theloai"  => $ds_theloai,
                        "dsnoidung_view" => $dsnoidung_view,
                        "quangcao" => $dsquangcao_DESC,
                        "row" => $row
                    ]);
                }
                $this->view("home", [
                    "pages"      => "index",
                    "dsnoidung"  => $dsnoidung_DESC,
                    "ds_loaitin"  => $ds_loaitin,
                    "ds_theloai"  => $ds_theloai,
                    "dsnoidung_view" => $dsnoidung_view,
                    "quangcao" => $dsquangcao_DESC,
                    "row" => $row
                ]);
            }else {
                    $page=$_GET['page'];   //lấy giá trị ajax gửi qua
                    //echo $page;
                    $phantrang = new Phantrang($page);   //tạo đối tượng phân trang
                    $dulieu=$phantrang->select_product();    //lấy thông tin sản phẩm
                    $link_parination=$phantrang->nut_phantrang();  //lấy các link phân trang
                    echo $dulieu.$link_parination;        
            }
        }
        function viewed($param=null){
            if($param == null){
                $this->view("home",[
                    "pages" => "error",
                ]);
                exit;
            }
            else {
                $IdNews = $param[0];
            }
            $ds_theloai = $this->theloaiModel->dstheloai();
            $ds_loaitin= $this->loaitinModel->dsloaitin();
            $dsnoidung_DESC = $this->noidungModel->dsnoidung_DESC();
            $dsnoidung_view = $this->noidungModel->dsnoidung_view();
            $dsnoidung = $this->noidungModel->dsnoidung();
            $dsquangcao_DESC = $this->quangcaoModel->dsquangcao_DESC();
            $row = $this->quangcaoModel->rowCount();
            if(!isset($_SESSION['username_0'])){
                if(isset($_SESSION['viewed'])){
                    if($_SESSION['viewed'] != null){
                        $_SESSION['viewed'] = array_diff($_SESSION['viewed'], array($IdNews));
                        $_SESSION['viewed'][] = $IdNews;
                    }
                    else{
                        $_SESSION['viewed'][] = $IdNews;
                    }  
                }
                else {
                    $_SESSION['viewed'][] = $IdNews;
                }
                foreach($_SESSION['viewed'] as $list){ 
                    $dsview[] = $this->noidungModel->get_noidung($list);
                }
                $ds_one_news = $this->noidungModel->get_noidung($IdNews);
                $this->view("home", [
                    "pages"      => "viewed",
                    "ds_one_news"  => $ds_one_news,
                    "dsnoidung"  => $dsnoidung_DESC,
                    "ds_loaitin"  => $ds_loaitin,
                    "ds_theloai"  => $ds_theloai,
                    "dsnoidung_view" => $dsnoidung_view,
                    "quangcao" => $dsquangcao_DESC,
                    "row" => $row
                ]);
                // $method = $_SERVER['REQUEST_METHOD'];
                // if($method == "GET"){
                //     return json_encode($dsview);
                // }
            }
            else{
                $username = $_SESSION['username_0'];
                $IdUsers =  $this->userModel->getIDuser($username);
                $IdUser =  $IdUsers->IdUser;
                $kq = $this->newssaveModel->add_idnew($IdUser,$IdNews);
                $ds_view = $this->newssaveModel->get_IDnews($IdUser);
                $dsquangcao_DESC = $this->quangcaoModel->dsquangcao_DESC();
                $row = $this->quangcaoModel->rowCount();
                foreach($ds_view as $list){
                    $dsview[] = $this->noidungModel->get_noidung($list->id_news);
                }
                $ds_one_news = $this->noidungModel->get_noidung($IdNews);
                $this->view("home", [
                    "pages"      => "viewed",
                    "ds_one_news"  => $ds_one_news,
                    "dsnoidung"  => $dsnoidung_DESC,
                    "ds_loaitin"  => $ds_loaitin,
                    "ds_theloai"  => $ds_theloai,
                    "quangcao" => $dsquangcao_DESC,
                    "dsnoidung_view" => $dsnoidung_view,
                    "row" => $row
                ]);
                // $method = $_SERVER['REQUEST_METHOD'];
                // if($method == "GET"){
                //     return json_encode($dsview);
                // }
            }
        }
    }
?>