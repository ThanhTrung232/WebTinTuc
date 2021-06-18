<?php 
    class admin extends Controller{
        private $adminModel;
        private $userModel;
        private $noidungModel;
        private $theloaiModel;
        private $validate_number = "/^[0-9]]*$/";
        private $validate_username = "/^[a-zA-Z0-9]]*$/";
        private $validate_name = "/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ0-9 ]+$/";
        public function __construct(){
            //Model 
            $this->userModel = $this->model("usersModel");
            $this->noidungModel = $this->model("noidungModel");
            $this->theloaiModel = $this->model("theloaiModel");
            $this->loaitinModel = $this->model("loaitinModel");
            $this->adminModel = $this->model("adminModel");
            $this->quangcaoModel = $this->model("quangcaoModel");
        }
        function SayHi(){
            if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                $this->view("admin",[
                    "pages" => "admin",
                ]);
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0"
                ]);
            }
        }
        function login(){
                if(isset($_POST['btnadminLogin'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    if($username != null && $password != null){
                        $check_admin_all = $this->adminModel->check_admin_all($username,$password);
                        $check_admin_user = $this->userModel->check_admin_user($username,$password);
                        if($check_admin_all == "true"){
                            $_SESSION['admin'] = $username;
                            $this->view("admin",[
                                "pages" => "admin"
                            ]);
                        }
                        else{
                            if($check_admin_user == "true"){
                                $_SESSION['username'] = $username;
                                $privilege = $this->userModel->getPrivileges($username);
                                $_SESSION['privileges'] = $privilege->privileges;
                                $idusers = $this->userModel->getIDuser($username);
                                $_SESSION['IdUser'] = $idusers->IdUser;
                                
                                $this->view("admin",[
                                    "pages" => "admin"
                                ]);
                            }
                            else{
                                $this->view("admin",[
                                    "pages" => "login",  
                                    "error" => "1",        
                                ]);
                            }
                        }
                    }
                    else{
                        $this->view("admin",[
                            "pages" => "login",  
                            "error" => "1",        
                        ]);
                    }
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
                }
        }
        function logout(){
            if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                unset($_SESSION['username']);
                unset($_SESSION['admin']);
                unset($_SESSION['privileges']);
                unset($_SESSION['IdUser']);
                unset($_SESSION['Title']);
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0",

                ]);
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0",
                ]);
            }
        }
    // Kết thuc trang login
       
    //Phân the lọai
        function theloai(){
            if(isset($_SESSION['admin'])){
                $listtheloai = $this->theloaiModel->dstheloai();
                $this->view("admin",[
                    "pages" => "theloai",
                    "ds"    => $listtheloai,
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $listtheloai = $this->theloaiModel->dstheloai();
                    $this->view("admin",[
                    "pages" => "theloai",
                    "ds"    => $listtheloai,
                ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                }
            }
        }
        
        //Add the lọai
        function addtheloai(){
            if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                if(isset($_POST["btn_addtheloai"])){   
                    $theloai = isset($_POST["theloai"]) ?  htmlspecialchars($_POST["theloai"]) : '';
                    $stt = isset($_POST["txt_STT"]) ?  htmlspecialchars($_POST["txt_STT"]) : '';
                    $anhien = isset($_POST["txt_anhien"]) ?  htmlspecialchars($_POST["txt_anhien"]) : '';
                    if($theloai == null || $stt == null || $anhien == null){
                        $this->view("admin",[
                            "pages" => "addtheloai",
                            "error" => "1",
                        ]);
                    }
                    else{   
                        if(!preg_match($this->validate_name,$theloai)){
                            $this->view("admin",[
                                "pages" => "addtheloai",
                                "error" => "2",
                            ]);
                        }
                        else{
                            if(!preg_match($this->validate_number,$stt)){     
                                $this->view("admin",[
                                    "pages" => "addtheloai",
                                    "error" => "3",
                                ]);
                            }
                            else{
                                $check_theloai = $this->theloaiModel->check_theloai($theloai);
                                if($check_theloai == "false"){
                                    $kq = $this->theloaiModel->Insert_theloai($theloai,$stt,$anhien);
                                    $this->view("admin",[
                                        "pages"  => "addtheloai",  
                                        "result" => "true"
                                    ]);  
                                }
                                else{
                                    $this->view("admin",[
                                        "pages" => "addtheloai",
                                        "result" => "false"
                                    ]);
                                }
                            }
                        }
                    }
                }
                else{
                    $this->view("admin",[
                        "pages" => "addtheloai"
                    ]);
                }
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                ]);
            }
        }
        function delete_theloai($param=null){
            if($param != null){
                $IdType = $param[0];
            }
            else{
                $this->view("admin",[
                    "pages" => "error",
                ]);
            }
            if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                if(isset($_POST["btn_delete_theloai"])){
                    $error = '';
                    $Foreign = 0;
                    $ds_loaitin = $this->loaitinModel->dsloaitin();
                    foreach($ds_loaitin as $loaitin_IdType){
                        if($loaitin_IdType->IdType == $IdType){
                            $Foreign = 1;
                            $error = 1;
                        }
                    }
                    if($Foreign == 0){
                        $kq = $this->theloaiModel->delete_theloai($IdType);
                    }
                    $ds = $this->theloaiModel->dstheloai();
                    $this->view("admin",[
                        "pages" => "theloai",
                        "ds"    => $ds,
                        "error" => $error
                    ]);
                }
                else{
                    $ds = $this->theloaiModel->dstheloai();
                    $this->view("admin",[
                        "pages" => "theloai",
                        "ds"    => $ds,
                    ]);
                }
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                ]);
            }
        }
        
        function edittheloai($param=null){
            if($param != null){
                $IdType = $param[0];
            }
            else{
                $this->view("admin",[
                    "pages" => "error",
                ]);
            }
            if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                    if(isset($_POST["submit_edittheloai"])){
                        $_theloai = isset($_POST["theloai"]) ?  htmlspecialchars($_POST["theloai"]) : '';
                        $STT = isset($_POST["txt_STT"]) ?  htmlspecialchars($_POST["txt_STT"]) : '';
                        $anhien = isset($_POST["txt_anhien"]) ?  htmlspecialchars($_POST["txt_anhien"]) : '';
                        if( $_theloai == null || $STT == null || $anhien == null){
                            $ds = $this->theloaiModel->GetInfotheloai($IdType);
                            $this->view("admin",[
                                "pages"  => "edittheloai",
                                "error" => "1",
                                "list_one_theloai" =>   $ds,
                            ]); 
                        }
                        else{
                            $ds = $this->theloaiModel->GetInfotheloai($IdType);
                            if(!preg_match($this->validate_name,$_theloai)){
                                $this->view("admin",[
                                    "pages" => "edittheloai",
                                    "error" => "2",
                                    "list_one_theloai" =>   $ds,
                                ]);
                            }
                            else{
                                if(!preg_match($this->validate_number,$STT)){     
                                    $this->view("admin",[
                                        "pages" => "edittheloai",
                                        "error" => "3",
                                        "list_one_theloai" =>   $ds,
                                    ]);
                                }
                                else{
                                    $check_theloai="false";
                                    foreach($ds as $theloai){
                                        $name_theloai= $theloai->TypeName;
                                    }
                                    if($name_theloai != $_theloai)
                                    $check_theloai = $this->theloaiModel->check_theloai($_theloai);
                                    if($check_theloai=="false"){
                                        $kq = $this->theloaiModel->update_theloai($IdType,$_theloai,$STT,$anhien);
                                        $_ds = $this->theloaiModel->GetInfotheloai($IdType);
                                        $this->view("admin",[
                                            "pages"  => "edittheloai",
                                            "result" => $kq,
                                            "list_one_theloai" =>  $_ds,
                                        ]);   
                                    }
                                    else{
                                        $this->view("admin",[
                                            "pages" => "edittheloai",
                                            "error" => "4",
                                            "list_one_theloai" => $ds,
                                        ]);
                                    }
                                } 
                            }  
                        }
                    }
                    else{
                        $ds = $this->theloaiModel->GetInfotheloai($IdType);
                        $this->view("admin",[
                            "pages" => "edittheloai",
                            "list_one_theloai"    => $ds,
                        ]);
                    }
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                ]);
            }
        }
        //Hết phần tiêu đề  PDO xong

        // Phần nội dung
        function noidung(){
            $ds_loaitin = $this->loaitinModel->dsloaitin();
            if(isset($_SESSION['admin'])){
                $ds = $this->noidungModel->dsnoidung();
                $this->view("admin",[
                    "pages" => "noidung",
                    "ds"    => $ds,
                    "ds_loaitin" => $ds_loaitin,
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $IdUser = $_SESSION['IdUser'];
                    $ds = $this->noidungModel->dsnoidung_user($IdUser);
                    $this->view("admin",[
                        "pages" => "noidung",
                        "ds"    => $ds,
                        "ds_loaitin" => $ds_loaitin,
                    ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                }      
            }
        }
        function xoanoidung($param=null){
            if($param != null){
                $IdNews = $param[0];
            }
            else{
                $this->view("admin",[
                    "pages" => "error",
                ]);
            }
            $ds_loaitin = $this->loaitinModel->dsloaitin();
            if(isset($_SESSION['admin'])){
                if(isset($_POST['btn_deletenoidung'])){
                    $lists = $this->noidungModel->get_noidung($IdNews);
                    foreach($lists as $list){
                        $IdNewsType = $list->IdNewsType;
                    }
                    $kq = $this->noidungModel->delete_noidung($IdNews,$IdNewsType);
                    $ds = $this->noidungModel->dsnoidung();
                    $this->view("admin",[
                        "pages" => "noidung",
                        "ds"    => $ds,
                        "ds_loaitin" => $ds_loaitin,
                        "result"    => $kq
                    ]);
                }
                else{
                    $ds = $this->noidungModel->dsnoidung();
                    $this->view("admin",[
                        "pages" => "noidung",
                        "ds_loaitin" => $ds_loaitin,
                        "ds"    => $ds,
                    ]);
                }
            }
            else{
                if(isset($_SESSION['username'])){
                    $IdUser = $_SESSION['IdUser'];
                    if(isset($_POST['btn_deletenoidung'])){
                        $check_iduser = $this->noidungModel->check_iduser($IdUser,$IdNews);
                        if($check_iduser == "true"){
                            $lists = $this->noidungModel->get_noidung($IdNews);
                            foreach($lists as $list){
                                $IdNewsType = $list->IdNewsType;
                            }
                            $kq = $this->noidungModel->delete_noidung($IdNews,$IdNewsType);
                            $ds = $this->noidungModel->dsnoidung_user($IdUser);
                            $this->view("admin",[
                                "pages" => "noidung",
                                "ds"    => $ds,
                                "ds_loaitin" => $ds_loaitin,
                                "result"    => $kq
                            ]);
                        }
                        else{
                            $ds = $this->noidungModel->dsnoidung_user($IdUser);
                            $this->view("admin",[
                            "pages" => "noidung",
                            "ds_loaitin" => $ds_loaitin,
                            "ds"    => $ds,
                            ]);
                        }
                    }
                    else{
                        $ds = $this->noidungModel->dsnoidung_user($IdUser);
                        $this->view("admin",[
                        "pages" => "noidung",
                        "ds_loaitin" => $ds_loaitin,
                        "ds"    => $ds,
                        ]);
                    }
                }else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                } 
            }
        }
        function editnoidung($param=null){
            if($param != null){
                $IdNews = $param[0];
                 $ds_loaitin = $this->loaitinModel->dsloaitin();
            }
            else{
                $this->view("admin",[
                    "pages" => "error",
                ]);
            }
            if(isset($_SESSION['admin'])){
                    $ds = $this->noidungModel->dsnoidung();
                    $ds_loaitin = $this->loaitinModel->dsloaitin();
                    $this->view("admin",[
                        "pages" => "noidung",
                        "ds"    => $ds,
                        "ds_loaitin" => $ds_loaitin,
                    ]);
            }
            else{
                $list_loaitin = $this->loaitinModel->dsloaitin();
                if(isset($_SESSION['username'])){
                    $IdUser = $_SESSION['IdUser'];
                    if(isset($_POST["btn_editnoidung"])){
                        $IdUser = $_SESSION['IdUser'];
                            $check = $this->noidungModel->check_iduser($IdUser,$IdNews);
                            if($check = "true"){
                                $ds = $this->noidungModel->get_noidung($IdNews);
                                foreach($ds as $list){
                                    $IdNewsType = $list->IdNewsType;
                                }
                                $Title = isset($_POST["Title"]) ?  htmlspecialchars($_POST["Title"]) : '';
                                $HotNews = isset($_POST["HotNews"]) ?  htmlspecialchars($_POST["HotNews"]) : '';
                                $_Overview = isset($_POST["Overview"]) ?  htmlspecialchars($_POST["Overview"]) : '';
                                $_Detail = isset($_POST["Detail"]) ?  htmlspecialchars($_POST["Detail"]) : '';
                                $_UrlPics = isset($_POST["UrlPics"]) ?  htmlspecialchars($_POST["UrlPics"]) : '';
                                $_NewsAppear = isset($_POST["anhien"]) ?  htmlspecialchars($_POST["anhien"]) : '';
                                $_Keyword = isset($_POST["Keyword"]) ?  htmlspecialchars($_POST["Keyword"]) : '';
                                $_IdNewsType = isset($_POST["IdNewsType"]) ?  htmlspecialchars($_POST["IdNewsType"]) : '';
                                if(isset($_POST["day"])){
                                    $_Day = date("Y/m/d", strtotime($_POST["day"]));
                                }else{
                                    $_Day = date("Y/m/d");
                                }
                            // ktra null 
                                if( $Title == null ||
                                    $HotNews == null ||
                                    $_Overview == null ||
                                    $_Detail == null ||
                                    $_UrlPics == null ||
                                    $_NewsAppear == null ||
                                    $_Keyword == null ||
                                    $_IdNewsType == null ||
                                    $_Day == null ){
                                        $this->view("admin",[
                                            "pages" => "editnoidung",
                                            "list_loaitin" => $list_loaitin,
                                            "error"    => "1",
                                            "ds"    => $ds,
                                        ]);
                                      
                                }
                                else{
                                    $kq = $this->noidungModel->update_noidung($IdNews,$Title,$_Overview,$_Detail,$_UrlPics,$_NewsAppear,$_Keyword,$_Day,$_IdNewsType,$IdNewsType,$HotNews);
                                    $_ds = $this->noidungModel->get_noidung($IdNews);
                                    $this->view("admin",[
                                        "pages" => "editnoidung",
                                        "list_loaitin" => $list_loaitin,
                                        "result"    => $kq,
                                        "ds"    => $_ds,
                                    ]);
                                }
                            }
                            else{
                                $ds = $this->noidungModel->dsnoidung_user($IdUser);
                                $this->view("admin",[
                                "pages" => "noidung",
                                "ds_loaitin" => $ds_loaitin,
                                "ds"    => $ds,
                            ]);
                            }  
                    }
                    else{
                        $check = $this->noidungModel->check_iduser($IdUser,$IdNews);
                        if($check = "true"){
                            $ds = $this->noidungModel->get_noidung($IdNews);
                            $this->view("admin",[
                            "pages" => "editnoidung",
                            "list_loaitin" => $list_loaitin,
                            "ds"    => $ds,
                            ]);
                        }
                        else{
                            $ds = $this->noidungModel->dsnoidung_user($IdUser);
                            $this->view("admin",[
                            "pages" => "noidung",
                            "ds_loaitin" => $ds_loaitin,
                            "ds"    => $ds,
                        ]);
                        }   
                        }
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                }      
            }
        }
                            // đang làm
        function addnoidung(){
            if(isset($_SESSION['admin'])){
                    $ds_loaitin = $this->loaitinModel->dsloaitin();
                    $ds = $this->noidungModel->dsnoidung();
                        $this->view("admin",[
                            "pages" => "noidung",
                            "ds"    => $ds,
                            "ds_loaitin" => $ds_loaitin,
                            "error"    => "1",
                        ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $list_loaitin = $this->loaitinModel->dsloaitin();
                    $IdUser =  $_SESSION['IdUser'];
                    if(!isset($_POST['btn_addnoidung'])){
                        $this->view("admin",[
                            "pages" => "addnoidung",
                            "list_loaitin" => $list_loaitin,
                        ]);
                    }
                    else{
                            $messages = array();
                            $messages['error'] = array();
                            // Đường dẫn file ảnh.
                            $url_img ='';
                            $target_dir    = "uploads/";
                            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
                            $target_file   = $target_dir . basename($_FILES["UrlPics"]["name"]);
                             //Lấy phần mở rộng của file (jpg, png, ...)
                            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                            // Cỡ lớn nhất được upload (bytes)
                            $maxfilesize   = 100000000000;

                            ////Những loại file được phép upload
                            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif','JPG', 'PNG', 'JPEG', 'GIF');
                            //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                            $check = getimagesize($_FILES["UrlPics"]["tmp_name"]);
                            if($check !== false)
                            {
                                $messages['error'] =  "Đây là file ảnh - " . $check["mime"] . ".";
                                $allowUpload = true;
                            }
                            else
                            {
                                $messages['error'] = "Không phải file ảnh.";
                                $allowUpload = false;
                            }
                            // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
                            // Bạn có thể phát triển code để lưu thành một tên file khác
                            if (file_exists($target_file))
                            {
                                $messages['error'] = "Tên file đã tồn tại trên server, không được ghi đè";
                                $allowUpload = false;
                            }
                            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
                            if ($_FILES["UrlPics"]["size"] > $maxfilesize)
                            {
                                $messages['error'] = "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                                $allowUpload = false;
                            }
                             // Kiểm tra kiểu file
                            if (!in_array($imageFileType,$allowtypes))
                            {
                                $messages['error'] = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                                $allowUpload = false;
                            }
                            if ($allowUpload)
                            {
                                    $dir = "./uploads/"; 
                                    $name_img = stripslashes($_FILES['UrlPics']['name']);
                                    $source_img = $_FILES['UrlPics']['tmp_name'];
                        
                                    // Lấy ngày, tháng, năm hiện tại
                                    $newday = date('Y,m,d');
                                    $day_current = substr($newday, 8, 2);
                                    $month_current = substr($newday, 5, 2);
                                    $year_current = substr($newday, 0, 4);
                                    // Tạo folder mục nội dung tại
                                    if (!is_dir($dir.'noidung'))
                                    {
                                        mkdir($dir.'noidung/', 0777, true);
                                    } 
                                    // Tạo folder năm hiện tại
                                    if (!is_dir($dir.'noidung/'.$year_current))
                                    {
                                        mkdir($dir.'noidung/'.$year_current.'/', 0777, true);
                                    } 
                                  
                                    // Tạo folder tháng hiện tại
                                    if (!is_dir($dir.'noidung/'.$year_current.'/'.$month_current))
                                    {
                                        mkdir($dir.'noidung/'.$year_current.'/'.$month_current.'/', 0777, true);
                                    }   
                                   
                                    // Tạo folder ngày hiện tại
                                    if (!is_dir($dir.'noidung/'.$year_current.'/'.$month_current.'/'.$day_current))
                                    {
                                        mkdir($dir.'noidung/'.$year_current.'/'.$month_current.'/'.$day_current.'/', 0777, true);
                                    }
                                   
                                    $path_img = $dir.'noidung/'.$year_current.'/'.$month_current.'/'.$day_current.'/'.$name_img; // Đường dẫn thư mục chứa file
                                    // echo '<br> path_img: '.$path_img;
                                    // echo '<br> name_img: '.$name_img;
                                    
                                    move_uploaded_file($source_img, $path_img); // Upload file
                                    $tmp_type_img = explode("\.", $name_img);
                                    $type_img = array_pop($tmp_type_img); // Loại file
                                    $url_img = substr($path_img, 2); // Đường dẫn file
                                    $size_img = $_FILES['UrlPics']['size']; // Dung lượng file
                                    // echo '<br> type_img: '.$type_img;
                                    // echo '<br> url_img: '.$url_img;
                                    // echo '<br> size_img: '.$size_img;
                                    // xoa file anh
                                    // unlink($dir.$year_current.'/'.$month_current.'/'.$day_current.'/'.$name_img);
                                    // Thêm dữ liệu vào table
                                    // xóa file rỗng
                                    // rmdir($dir.'2020');
                                    $messages['error'] =  'Upload thành công.';
                            }else{
                                $this->view("admin",[
                                    "pages" => "addnoidung",
                                    "list_loaitin" => $list_loaitin,
                                    "messages"=> $messages,
                                    "result"=> "false"

                                ]);
                            }
                            $Title = isset($_POST["Title"]) ?  htmlspecialchars($_POST["Title"]) : '';
                            $HotNews = isset($_POST["HotNews"]) ?  htmlspecialchars($_POST["HotNews"]) : '';
                            $_Overview = isset($_POST["Overview"]) ?  htmlspecialchars($_POST["Overview"]) : '';
                            $_Detail = isset($_POST["Detail"]) ?  htmlspecialchars($_POST["Detail"]) : '';
                            $_UrlPics = ($url_img != null) ? $url_img : '';
                            $_NewsAppear = isset($_POST["anhien"]) ?  htmlspecialchars($_POST["anhien"]) : '';
                            $_Keyword = isset($_POST["Keyword"]) ?  htmlspecialchars($_POST["Keyword"]) : '';
                            $_IdNewsType = isset($_POST["IdNewsType"]) ?  htmlspecialchars($_POST["IdNewsType"]) : '';
                            $_Day = date("Y-m-d");
                            if(     $Title == null || $HotNews == null || $_Overview == null || $_Detail == null || $_UrlPics == null || $_NewsAppear == null
                                ||  $_Keyword == null ||  $_IdNewsType == null ||  $_Day == null )
                            {
                                $this->view("admin",[
                                    "pages" => "addnoidung",
                                    "list_loaitin" => $list_loaitin,
                                    "error" => "1",
                                ]);
                            }
                            else{
                                if(isset($_SESSION['Title'])){
                                    if($_SESSION['Title'] == $Title){
                                        $this->view("admin",[
                                            "pages" => "addnoidung",
                                            "list_loaitin" => $list_loaitin,
                                        ]);
                                    }
                                    else{
                                        $kq = $this->noidungModel->insert_noidung($Title,$_Overview,$_Detail,$_UrlPics,$_NewsAppear,$_Keyword,$_Day,$_IdNewsType,$IdUser,$HotNews);
                                        $_SESSION['Title'] = $Title;
                                        $this->view("admin",[
                                        "pages" => "addnoidung",
                                        "list_loaitin" => $list_loaitin,
                                        "result" => $kq,
                                    ]);
                                    }
                                }
                                else{
                                    $kq = $this->noidungModel->insert_noidung($Title,$_Overview,$_Detail,$_UrlPics,$_NewsAppear,$_Keyword,$_Day,$_IdNewsType,$IdUser,$HotNews);
                                    $_SESSION['Title'] = $Title;
                                    $this->view("admin",[
                                        "pages" => "addnoidung",
                                        "list_loaitin" => $list_loaitin,
                                        "result" => $kq,
                                    ]);
                                }
                            }
                        }
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                }
            }
        }
        function noidungpic(){
            if(isset($_SESSION['admin'])){
                $listNoidung = $this->noidungModel->dsnoidung();
                $this->view("admin",[
                    "pages" => "noidungpic",
                    "list_noidung" => $listNoidung,     
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                        $IdUser = $_SESSION['IdUser'];
                        $listNoidung = $this->noidungModel->dsnoidung_user($IdUser);
                        $this->view("admin",[
                        "pages" => "noidungpic",
                        "list_noidung" => $listNoidung,
                        ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                    ]);
                }
            }
        }
        // Hết phần nội dung

        //Phân thành viên -------------------------------- PDO
        function thanhvien(){
            if(isset($_SESSION['admin'])){
                $listUsers = $this->userModel->getUsers();
                $this->view("admin",[
                    "pages" => "thanhvien",
                    "listUsers" => $listUsers
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "2"
                    ]);
                }
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0"
                ]);
            }

        }
        function deleteUser($IdUser=null){
            if($param != null){
                $IdUser = $param[0];
            }
            else{
                $this->view("admin",[
                    "pages" => "error",
                ]);
            }
            if(isset($_SESSION['admin'])){
                $kq = $this->userModel->deleteUser($IdUser);
                $listUsers = $this->userModel->getUsers();
                $this->view("admin",[
                    "pages" => "thanhvien",
                    "listUsers" => $listUsers,
                    "result"    => $kq
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "2"
                    ]);
                }
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0"
                ]);
            }
        }
        function editthanhvien($param=null){
            if($param != null){
                $IdUser = $param[0];
            }
            else{
                $this->view("admin",[
                    "pages" => "error",
                ]);
            }
            if(isset($_SESSION['admin'])){
                if($param != null){
                    $IdUser = $param[0];
                    $result = $this->userModel->GetInfoUser($IdUser);
                    $list_permission = $this->userModel->Get_permission();
                    if(isset($_POST["btnEdit"]) ){
                        $fullname = isset($_POST['hovaten']) ? $_POST['hovaten'] : "";
                        $password = isset($_POST['password']) ? $_POST['password'] : "";
                        $level = isset($_POST['level']) ? $_POST['level'] : "";
                        $email = isset($_POST['email']) ? $_POST['email'] : "";
                        $temp_birth = isset($_POST['birthday']) ? $_POST['birthday'] : "";
                        $Birthday = date("Y/m/d", strtotime($temp_birth));
                        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
                        $permission = isset($_POST['permission']) ? $_POST['permission'] : "";
                        $avatar = URLROOT."public/user/images/image.JPG";
                        if($fullname == null || $permission == null || $password == null || $level == null || $email == null || $Birthday == null || $gender == null){
                            $this->view("admin",[
                                "pages" => "editthanhvien",
                                "infoUsser" => $result,
                                "list_permission" => $list_permission,
                                "error" => 1,
                            ]);
                        }
                        else{
                            $year_brith = explode("/",$Birthday);
                            $RegisterDay = date("Y/m/d");
                            $year_now = explode("/",$RegisterDay);
                            $age = intval($year_now[0]) - intval($year_brith[0]);
                            if($age > 10){
                                $kq = $this->userModel->updatetUser($fullname,$IdUser,$password,$email,$level,$gender,$Birthday,$permission);
                                $listUsers = $this->userModel->getUsers();
                                $this->view("admin",[
                                    "pages"  => "thanhvien",
                                    "listUsers" => $listUsers,
                                    "list_permission" => $list_permission,
                                    "result" => $kq,
                                ]);
                            }else{
                                $this->view("admin",[
                                    "pages" => "editthanhvien",
                                    "infoUsser" => $result,
                                    "list_permission" => $list_permission,
                                    "error" => 4,
                                ]);
                            }
                        }
                    }
                    else{
                        $this->view("admin",[
                            "pages" => "editthanhvien",
                            "infoUsser" => $result,
                            "list_permission" => $list_permission,
                        ]);
                    }
                }
                else{
                    $this->view("admin",[
                        "pages"  => "error",
                    ]);
                }
            }
            else{
                if(isset($_SESSION['username'])){
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "2"
                    ]);
                }
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0"
                ]);
            }
        }
        function addthanhvien(){
            if(isset($_SESSION['admin'])){
                $list_permission = $this->userModel->Get_permission();
                if(isset($_POST["btnadd"]) ){
                        $nameValidation = "/^[a-zA-Z0-9]*$/";
                        $fullname = isset($_POST['hovaten']) ? $_POST['hovaten'] : "";
                        $username = isset($_POST['username']) ? $_POST['username'] : "";
                        $permission = isset($_POST['permission']) ? $_POST['permission'] : "";
                        $password = isset($_POST['password']) ? $_POST['password'] : "";
                        $level = isset($_POST['level']) ? $_POST['level'] : "";
                        $email = isset($_POST['email']) ? $_POST['email'] : "";
                        $temp_birth = isset($_POST['birthday']) ? $_POST['birthday'] : "";
                        $Birthday = date("Y/m/d", strtotime($temp_birth));
                        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
                        if($fullname == null || $username == null || $permission == null || $password == null || $level == null || $email == null || $Birthday == null || $gender == null){
                            $this->view("admin",[
                                "pages" => "addthanhvien",
                                "list_permission" => $list_permission,
                                "error"  => "Vui lòng điền đủ thông tin",
                                "result" => "false",
                            ]);
                        }
                        else{
                            if(preg_match($nameValidation,$username)){
                                if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                                    $avatar = URLROOT."public/user/images/image.JPG";
                                    $RegisterDay = date("Y/m/d");
                                    $check_user = $this->userModel->check_user($username);
                                    $check_email = $this->userModel->check_email($email);
                                    if($check_user == "false" && $check_email == "false" ){
                                        $year_brith = explode("/",$Birthday);
                                        $year_now = explode("/",$RegisterDay);
                                        $age = intval($year_now[0]) - intval($year_brith[0]);
                                        if($age < 10){
                                            $this->view("admin",[
                                                "pages"  => "addthanhvien",
                                                "error"  => "Tuổi phải lớn hơn 10",
                                                "list_permission" => $list_permission,
                                                "result" => "false",
                                            ]);
                                        }
                                        else{
                                            $token = md5($username)."LV".$level;
                                            $kq = $this->userModel->insertUser($fullname,$username,$password,$email,$level,$gender,$avatar,$RegisterDay,$Birthday,$permission,$token);
                                            $listUsers = $this->userModel->getUsers();
                                            $this->view("admin",[
                                                "pages"  => "thanhvien",
                                                "listUsers" => $listUsers,
                                                "list_permission" => $list_permission,
                                                "result" => $kq,
                                            ]);
                                        }
                                    }
                                    else{
                                        $error = ($check_user == true) ? "User đã tồn tại" : "Email đã tồn tại";
                                        $this->view("admin",[
                                            "pages"  => "addthanhvien",
                                            "list_permission" => $list_permission,
                                            "error"  => $error,
                                            "result" => "false",
                                        ]);
                                    }
                                }
                                else{
                                    $this->view("admin",[
                                        "pages" => "addthanhvien",
                                        "error"  => "Email sai định dạng",
                                        "list_permission" => $list_permission,
                                        "result" => "false",
                                    ]);
                                }
                            }
                            else{
                                $this->view("admin",[
                                    "pages" => "addthanhvien",
                                    "error"  => "Tên sai định dạng",
                                    "list_permission" => $list_permission,
                                    "result" => "false",
                                ]);
                            }
                        }
                }
                else{
                    $this->view("admin",[
                        "pages" => "addthanhvien",
                        "list_permission" => $list_permission,
                    ]);
                }
                }
                else{
                    if(isset($_SESSION['username'])){
                        $this->view("admin",[
                            "pages" => "login",
                            "error" => "2"
                        ]);
                    }
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
                }
        }
        //IMAGES
        function avatarthanhvien(){
           /* if(isset($_POST['ok'])) 

            { 

                $folder ="uploads/"; 

                $image = $_FILES['image']['name']; 

                $path = $folder . $image ; 

                $target_file=$folder.basename($_FILES["image"]["name"]);


                $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


                $allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 

                $ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 

                { 

                    echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

                }

                else{ 

                    move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 

                    $sth=$con->prepare("insert into users(image)values(:image) "); 

                    $sth->bindParam(':image',$image); 

                    $sth->execute(); 

                } 

                } 
                else{
                    $this->view("admin",[
                        "pages" => "avatarthanhvien",
                        
                    ]);
                }
                */
                if(isset($_SESSION['admin'])){
                    $listUsers = $this->userModel->getUsers();
                    $this->view("admin",[
                        "pages" => "avatarthanhvien",
                        "listUsers" => $listUsers,     
                    ]);
                }
                else{
                    if(isset($_SESSION['username'])){
                        $this->view("admin",[
                            "pages" => "login",
                            "error" => "2"
                        ]);
                    }
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
                }
        }
        //Hết phần thành viên
        // Phần loai tin
        function loaitin(){
            if(isset($_SESSION['admin']) || isset($_SESSION['username'])){
                $list_all_loaitin = $this->loaitinModel->dsloaitin();
                $listtheloai = $this->theloaiModel->dstheloai();
                $this->view("admin",[
                    "pages" => "loaitin",
                    "list_all_loaitin" => $list_all_loaitin,
                    "listtheloai" => $listtheloai,
                ]);
            }
            else{
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
            }
        }
        function editloaitin($param=null){
            if($param != null){
                $IdNewsType = $param[0];
            }
            else{
                $this->view("admin",[
                    "pages" => "error",
                ]);
            }
            if(isset($_SESSION['admin']) || isset($_SESSION['username'])){
                $listtheloai = $this->theloaiModel->dstheloai();
                $list_one_loaitin = $this->loaitinModel->get_one_loaitin($IdNewsType); 
                if(isset($_POST['btn_editloaitin'])){
                    $NewsTypeName = isset($_POST['NewsTypeName']) ? $_POST['NewsTypeName'] : "";
                    $NewsTypeNumber = isset($_POST['NewsTypeNumber']) ? $_POST['NewsTypeNumber'] : "";
                    $NewsTypeAppear = isset($_POST['NewsTypeAppear']) ? $_POST['NewsTypeAppear'] : "";
                    $IdType = isset($_POST['IdType']) ? $_POST['IdType'] : "";
                    if( $NewsTypeName == null || $NewsTypeNumber == null || $NewsTypeAppear == null || $IdType == null){              
                        $this->view("admin",[
                        "pages" => "editloaitin",
                        "list_one_loaitin" => $list_one_loaitin,
                        "listtheloai" => $listtheloai,
                        "error" => 1,
                    ]);
                    }
                    else{
                        $check_loaitin="false";
                        if(preg_match($this->validate_name,$NewsTypeName)){
                            foreach($list_one_loaitin as $loaitin){
                                $name_loaitin = $loaitin->NewsTypeName;
                                $IdNewsType = $loaitin->IdNewsType;
                            }
                            if($name_loaitin != $NewsTypeName)
                            $check_loaitin = $this->loaitinModel->check_loaitin($NewsTypeName);
                            if($check_loaitin=="false"){
                                $kq = $this->loaitinModel->update_loaitin($IdNewsType,$NewsTypeName,$NewsTypeNumber,$NewsTypeAppear,$IdType);
                                $_list_one_loaitin = $this->loaitinModel->get_one_loaitin($IdNewsType); 
                                $this->view("admin",[
                                    "pages" => "editloaitin",
                                    "list_one_loaitin" => $_list_one_loaitin,
                                    "listtheloai" => $listtheloai,
                                    "result" => $kq
                                ]);
                            }
                            else{
                                $this->view("admin",[
                                    "pages" => "editloaitin",
                                    "list_one_loaitin" => $list_one_loaitin,
                                    "listtheloai" => $listtheloai,
                                    "error" => 4
                                ]);
                            }
                            
                        }else{
                            $this->view("admin",[
                                "pages" => "editloaitin",
                                "list_one_loaitin" => $list_one_loaitin,
                                "listtheloai" => $listtheloai,
                                "error" => 2
                            ]);
                        }
                    }
                }
                else{
                    $this->view("admin",[
                        "pages" => "editloaitin",
                        "list_one_loaitin" => $list_one_loaitin,
                        "listtheloai" => $listtheloai,
                    ]);
                }
            }
            else{
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
            }
        }
        function addloaitin(){
            $listtheloai = $this->theloaiModel->dstheloai();
            if(isset($_SESSION['admin']) || isset($_SESSION['username'])){
                if(isset($_POST['btn_addloaitin'])){
                    $NewsTypeName = isset($_POST['NewsTypeName']) ? $_POST['NewsTypeName'] : "";
                    $NewsTypeNumber = isset($_POST['NewsTypeNumber']) ? $_POST['NewsTypeNumber'] : "";
                    $NewsTypeAppear = isset($_POST['NewsTypeAppear']) ? $_POST['NewsTypeAppear'] : "";
                    $IdType = isset($_POST['IdType']) ? $_POST['IdType'] : "";
                    if( $NewsTypeName == null || $NewsTypeNumber == null || $NewsTypeAppear == null || $IdType == null){              
                        $this->view("admin",[
                        "pages" => "addloaitin",
                        "listtheloai" => $listtheloai,
                        "error" => 1,
                        ]);
                    }
                    else{
                        if(preg_match($this->validate_name,$NewsTypeName)){
                            $check_loaitin = $this->loaitinModel->check_loaitin($NewsTypeName);
                            if($check_loaitin=="false"){
                                $kq = $this->loaitinModel->insert_loaitin($NewsTypeName,$NewsTypeNumber,$NewsTypeAppear,$IdType);
                                $this->view("admin",[
                                    "pages" => "addloaitin",
                                    "listtheloai" => $listtheloai,
                                    "result" => $kq
                                ]);
                            }
                            else{
                                $this->view("admin",[
                                    "pages" => "addloaitin",
                                    "listtheloai" => $listtheloai,
                                    "error" => 4
                                ]);
                            }
                        }
                        else{
                            $this->view("admin",[
                                "pages" => "addloaitin",
                                "listtheloai" => $listtheloai,
                                "error" => 2,
                                ]);
                        }
                    }
                }else{
                    $this->view("admin",[
                        "pages" => "addloaitin",
                        "listtheloai" => $listtheloai,
                    ]);
                }
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0"
                ]);
            }
        }
        function delete_loaitin($param=null){
            if($param!=null){
                $IdNewsType = $param[0];
            }
            else{
                $this->view("admin",[
                    "pages" => "error",
                ]);
            }
            if(isset($_SESSION['admin']) || isset($_SESSION['username'])){
                $list_all_loaitin = $this->loaitinModel->dsloaitin();
                $listtheloai = $this->theloaiModel->dstheloai();
                if(isset($_POST["btn_delete_loaitin"])){
                    $error = '';
                    $Foreign = 0;
                    $ds_noidung = $this->noidungModel->dsnoidung();
                    foreach($ds_noidung as $noidung_IdNewsType){
                        if($noidung_IdNewsType->IdNewsType == $IdNewsType){
                            $Foreign = 1;
                            $error = 1;
                        }
                    }
                    if($Foreign == 0){
                         $kq = $this->loaitinModel->delete_loaitin($IdNewsType);
                    }
                    $ds = $this->theloaiModel->dstheloai();
                    $_list_all_loaitin = $this->loaitinModel->dsloaitin();
                    $this->view("admin",[
                        "pages" => "loaitin",
                        "list_all_loaitin"    => $_list_all_loaitin,
                        "listtheloai"    => $listtheloai,
                        "error" => $error
                    ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "loaitin",
                        "list_all_loaitin"    => $list_all_loaitin,
                        "listtheloai"    => $listtheloai,
                    ]);
                }
            }
            else{
                $this->view("admin",[
                    "pages" => "login",
                    "error" => "0"
                ]);
            }
        }
        // Hết phần loại tin
        //Phần quảng cáo 
        function quangcao(){
            $getquangcao = $this->quangcaoModel->dsquangcao();
            $row = $this->quangcaoModel->rowCount();
            if(isset($_SESSION['admin'])){
                $this->view("admin",[
                    "pages" => "quangcao",
                    "getquangcao" => $getquangcao,
                    "row" => $row 
                ]);
            }
            else{
                if(isset($_SESSION['username'])){
                    $this->view("admin",[
                        "pages" => "admin",
                        "getquangcao" => $getquangcao,
                    ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
                }
            }
        }
        function addquangcao(){
            $getquangcao = $this->quangcaoModel->dsquangcao();
            $row = $this->quangcaoModel->rowCount();
            if(isset($_SESSION['admin'])){
                if(isset($_POST['btn_addquangcao'])){
                $messages = array();
                $messages['error'] = array();
                // Đường dẫn file ảnh.
                $url_img ='';
                $target_dir    = "uploads/";
                //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
                $target_file   = $target_dir . basename($_FILES["UrlPics"]["name"]);
                //Lấy phần mở rộng của file (jpg, png, ...)
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Cỡ lớn nhất được upload (bytes)
                $maxfilesize   = 100000000000;

                ////Những loại file được phép upload
                $allowtypes    = array('jpg', 'png', 'jpeg', 'gif','JPG', 'PNG', 'JPEG', 'GIF');
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check = getimagesize($_FILES["UrlPics"]["tmp_name"]);
                if($check !== false)
                {
                    $messages['error'] =  "Đây là file ảnh - " . $check["mime"] . ".";
                    $allowUpload = true;
                }
                else
                {
                    $messages['error'] = "Không phải file ảnh.";
                    $allowUpload = false;
                }
                // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
                // Bạn có thể phát triển code để lưu thành một tên file khác
                if (file_exists($target_file))
                {
                    $messages['error'] = "Tên file đã tồn tại trên server, không được ghi đè";
                    $allowUpload = false;
                }
                // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
                if ($_FILES["UrlPics"]["size"] > $maxfilesize)
                {
                    $messages['error'] = "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                    $allowUpload = false;
                }
                // Kiểm tra kiểu file
                if (!in_array($imageFileType,$allowtypes))
                {
                    $messages['error'] = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                    $allowUpload = false;
                }
                if ($allowUpload)
                {
                        $dir = "./uploads/"; 
                        $name_img = stripslashes($_FILES['UrlPics']['name']);
                        $source_img = $_FILES['UrlPics']['tmp_name'];
            
                        // Lấy ngày, tháng, năm hiện tại
                        $newday = date('Y,m,d');
                        $day_current = substr($newday, 8, 2);
                        $month_current = substr($newday, 5, 2);
                        $year_current = substr($newday, 0, 4);
                        // Tạo folder mục nội dung tại
                        if (!is_dir($dir.'quangcao'))
                        {
                            mkdir($dir.'quangcao/', 0777, true);
                        } 
                        // Tạo folder năm hiện tại
                        if (!is_dir($dir.'quangcao/'.$year_current))
                        {
                            mkdir($dir.'quangcao/'.$year_current.'/', 0777, true);
                        } 
                    
                        // Tạo folder tháng hiện tại
                        if (!is_dir($dir.'quangcao/'.$year_current.'/'.$month_current))
                        {
                            mkdir($dir.'quangcao/'.$year_current.'/'.$month_current.'/', 0777, true);
                        }   
                    
                        // Tạo folder ngày hiện tại
                        if (!is_dir($dir.'quangcao/'.$year_current.'/'.$month_current.'/'.$day_current))
                        {
                            mkdir($dir.'quangcao/'.$year_current.'/'.$month_current.'/'.$day_current.'/', 0777, true);
                        }
                    
                        $path_img = $dir.'quangcao/'.$year_current.'/'.$month_current.'/'.$day_current.'/'.$name_img; // Đường dẫn thư mục chứa file
                        // echo '<br> path_img: '.$path_img;
                        // echo '<br> name_img: '.$name_img;
                        
                        move_uploaded_file($source_img, $path_img); // Upload file
                        $tmp_type_img = explode("\.", $name_img);
                        $type_img = array_pop($tmp_type_img); // Loại file
                        $url_img = substr($path_img, 2); // Đường dẫn file
                        $size_img = $_FILES['UrlPics']['size']; // Dung lượng file
                        // echo '<br> type_img: '.$type_img;
                        // echo '<br> url_img: '.$url_img;
                        // echo '<br> size_img: '.$size_img;
                        // xoa file anh
                        // unlink($dir.$year_current.'/'.$month_current.'/'.$day_current.'/'.$name_img);
                        // Thêm dữ liệu vào table
                        // xóa file rỗng
                        // rmdir($dir.'2020');
                        $messages['error'] =  'Upload thành công.';
                }else{
                    $this->view("admin",[
                        "pages" => "addquangcao",
                        "messages"=> $messages,
                        "result"=> "false"
                    ]);
                }
                $AdsDescription = isset($_POST['AdsDescription']) ? $_POST['AdsDescription'] : "";
                $URL = isset($_POST['URL']) ? $_POST['URL'] : "";
                $_UrlPics = ($url_img != null) ? $url_img : '';
                if($AdsDescription == null ||$URL == null || $_UrlPics == null){
                    $this->view("admin",[
                        "pages" => "addquangcao",
                        "result"=> "false",
                        "error" => 1
                    ]);
                }
                else{
                    $kq = $this->quangcaoModel->insert_quangcao($AdsDescription,$URL,$_UrlPics);
                    $getquangcao = $this->quangcaoModel->dsquangcao();
                    $row = $this->quangcaoModel->rowCount();
                    $this->view("admin",[
                        "pages" => "quangcao",
                        "row" => $row,
                    ]);
                }
            }
            else{
                $this->view("admin",[
                    "pages" => "addquangcao",
                ]);
            }
            }
            else{
                if(isset($_SESSION['username'])){
                    $this->view("admin",[
                        "pages" => "admin",
                        "getquangcao" => $getquangcao,
                    ]);
                }
                else{
                    $this->view("admin",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
                }
            }
        }
      
    }
