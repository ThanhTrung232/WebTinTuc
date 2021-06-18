<?php 
    class user extends Controller{
        public $userModel;
        public $tieudeModel;
        public function __construct(){
            //Model 
            //$this->adminModel = $this->model("adminModel");
            $this->userModel = $this->model("usersModel");
            $this->noidungModel = $this->model("noidungModel");
            $this->theloaiModel = $this->model("theloaiModel");
            $this->loaitinModel = $this->model("loaitinModel");
            $this->newssaveModel = $this->model("newssaveModel");
        }
        function SayHi(){
            $dsnoidung = $this->noidungModel->dsnoidung();
            $ds_theloai = $this->theloaiModel->dstheloai();
            $ds_loaitin= $this->loaitinModel->dsloaitin();
            //$tintuc = $this->tieudeModel->dsTintuc();
            //$user = $this->userModel->getUsers();
            $this->view("user", [
                "pages"      => "login",
                "dsnoidung"  => $dsnoidung,
                "ds_loaitin"  => $ds_loaitin,
                "ds_theloai"  => $ds_theloai,
                
            ]);
        }
        function login(){
            if(isset($_SESSION['username_0'])){
                $username = $_SESSION['username_0'] ;
                $idusers = $this->userModel->getIDuser($username);
                $_SESSION['IdUser_0'] = $idusers->IdUser;
                $infoUser = $this->userModel->GetInfoUser($idusers->IdUser);
                $dsnoidung = $this->noidungModel->dsnoidung();
                $this->view("user",[
                    "pages" => "index",
                    "loged"     => "loged",
                    "infoUser"  => $infoUser,
                    "dsnoidung" => $dsnoidung,
                ]);
            }
            else{
                if(isset($_POST['btnuserLogin'])){
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    if(!empty($username) && !empty($password)){
                        $check_user_0 = $this->userModel->check_user_0($username,$password);
                        if($check_user_0 == "true"){
                            $_SESSION['username_0'] = $username;
                            $idusers = $this->userModel->getIDuser($username);
                            $_SESSION['IdUser_0'] = $idusers->IdUser;
                            $infoUser = $this->userModel->GetInfoUser($idusers->IdUser);
                            $dsnoidung = $this->noidungModel->dsnoidung();
                            $this->view("user",[
                                "pages"     => "home",
                                "dsnoidung" => $dsnoidung,
                                "infoUser"  => $infoUser,
                                "loged"     => "loged"
                            ]);
                        }
                        else{
                            $this->view("user",[
                                "pages" => "login",
                                "error" => "1"
                            ]);
                        }
                    }
                    else{
                        $this->view("user",[
                            "pages" => "login",
                            "error" => "3"
                        ]);
                    }
                }
                else{
                    $this->view("user",[
                        "pages" => "login",
                        "error" => "0"
                    ]);
                }
            }
        }
        function logout(){
            if(isset($_SESSION['username_0'])){
                unset($_SESSION['username_0']);
                unset($_SESSION['IdUser_0']);
            }
            $this->view("user",[
                "pages" => "login",
                "error" => "0",
            ]);
            }
        function register(){
            if(isset($_POST['btn_register'])){
                $this->view("user",[
                    "pages" => "register",
                ]);
            }
            else{
                if(isset($_POST['btn_submit'])){
                    $fullname = $_POST["hovaten"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $level = 0;
                    $email = $_POST["email"];
                    $birth = date_create($_POST['birthday']);
                    $Birthday = date_format($birth,"Y/m/d");
                    $gender = $_POST["gender"];
                    $avatar = URLROOT."public/user/images/image.JPG";
                    $RegisterDay = date("Y/m/d");
                    $permission = 4;
                    $nameValidation = "/^[a-zA-Z0-9]*$/";
                    if(empty($fullname) || empty($username) ||  empty($password) || empty($email) || empty($birth) || empty($gender)){
                        $this->view("user",[
                            "pages" => "register",
                            "error" => "3"
                        ]);
                    }
                    else{
                        
                        if(preg_match($nameValidation,$username)){
                            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                                $check_user = $this->userModel->check_user($username);
                                $check_email = $this->userModel->check_email($email);
                                if($check_user == "false" && $check_email == "false" ){
                                    $token = md5($username)."LV".$level;
                                    $kq = $this->userModel->insertUser($fullname,$username,$password,$email,$level,$gender,$avatar,$RegisterDay,$Birthday,$permission,$token);
                                    $this->view("user",[
                                        "pages"  => "index",
                                    ]);
                                }
                                else{
                                    $this->view("user",[
                                        "pages" => "register",
                                        "error" => "6"
                                    ]);
                                }
                            }
                            else{
                                $this->view("user",[
                                    "pages" => "register",
                                    "error" => "5"
                                ]);
                            }
                        }
                        else{
                            $this->view("user",[
                                "pages" => "register",
                                "error" => "4"
                            ]);
                        }
                    }
                }
                else{
                    $this->view("user",[
                        "pages" => "register",
                    ]);
                }
            }
        }
    }
?>