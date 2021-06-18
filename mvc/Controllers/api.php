<?php
    class api extends Controller{
        private $adminModel;
        private $userModel;
        private $noidungModel;
        private $theloaiModel;
        public function __construct(){
            //Model 
            $this->userModel = $this->model("usersModel");
            $this->noidungModel = $this->model("noidungModel");
            $this->theloaiModel = $this->model("theloaiModel");
            $this->loaitinModel = $this->model("loaitinModel");
            $this->adminModel = $this->model("adminModel");
        }
        function SayHi($param=null){
            $method = $_SERVER['REQUEST_METHOD'];
            switch ($method) {
                case 'POST':
                    $nameValidation = "/^[a-zA-Z0-9]*$/";
                    $fullname = isset($_POST['hovaten']) ? $_POST['hovaten'] : "";
                    $username = isset($_POST['username']) ? $_POST['username'] : "";
                    $permission = isset($_POST['permission']) ? $_POST['permission'] : "";
                    $password = isset($_POST['password']) ? $_POST['password'] : "";
                    $level = isset($_POST['level']) ? $_POST['level'] : "";
                    $email = isset($_POST['email']) ? $_POST['email'] : "";
                    $temp_birth = isset($_POST['birthday']) ? $_POST['birthday'] : "";
                    $newDate = date("Y/m/d", strtotime($temp_birth));
                    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
                    if($fullname == null || $username == null || $permission == null || $password == null || $level == null || $email == null || $newDate == null || $gender == null){
                        echo json_encode(array('message'=>'chua dien du thong tin'));
                    }
                    else{
                         if(preg_match($nameValidation,$username)){
                            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                                $avatar = URLROOT."public/user/images/image.JPG";
                                $RegisterDay = date("Y/m/d");
                                $check_user = $this->userModel->check_user($username);
                                $check_email = $this->userModel->check_email($email);
                                if($check_user == "false" && $check_email == "false" ){
                                    $year_brith = explode("/",$newDate);
                                    $year_now = explode("/",$RegisterDay);
                                    $age = intval($year_now[0]) - intval($year_brith[0]);
                                    if($age < 10){
                                        echo json_encode(array('error'=>'tuoi lon hon 10'));
                                    }
                                    else{
                                        $token = md5($username)."LV".$level;
                                        $Birthday = $newDate;
                                       
                                         $kq = $this->userModel->insertUser($fullname,$username,$password,$email,$level,$gender,$avatar,$RegisterDay,$Birthday,$permission,$token);
                                        if(isset($kq)){
                                             echo json_encode(array('error'=>"themthanh cong"));
                                        }
                                        else{
                                            echo json_encode(array('error'=>'that bai'));
                                        }
                                    }
                                }
                                else{
                                    if($check_user == "true" && $check_email == "true" ){
                                        echo json_encode(array('error'=>'Username va Email da ton tai'));
                                    }
                                    else{
                                        if($check_user == "true"){
                                            echo json_encode(array('error'=>'Username da ton tai'));
                                        }
                                        else{
                                            if($check_email == "true"){
                                                echo json_encode(array('error'=>'Email da ton tai'));
                                            }
                                        }
                                    }
                                }
                            }
                            else{
                                echo json_encode(array('error'=>'Sai dinh dang email'));
                            }
                        }
                        else{
                            echo json_encode(array('error'=>'Sai dinh dang User'));
                        }
                    }
                    break;
                case 'GET':
                    if($param == null){
                        $listUsers = $this->userModel->getUsers();
                        //var_dump(json_encode($listUsers));
                        $num = $this->userModel->rowCount();
                        if($num > 0){
                            $post_arr = array();
                            $post_arr['data'] = array();
                            foreach($listUsers as $user){
                                extract($listUsers);
                                $post_item = array(
                                    "IdUser" => $user->IdUser,
                                    "Username" => $user->Username,
                                    "FullName" => $user->FullName,
                                    "Email" => $user->Email,
                                    "IdGroup" => $user->IdGroup,
                                    "Gender" => $user->Gender,
                                    "RegisterDay" => $user->RegisterDay,
                                );
                                array_push($post_arr['data'],$post_item);
                            }
                            $result = json_encode($post_arr);
                        }
                        else{
                            $result = json_encode(array('message'=>'Chưa có thành viên nào tham gia'));
                        }
                        echo $result;
                    }else{
                        $user = $this->userModel->GetInfoUser($param[0]);
                        echo json_encode($user);
                    }
                    break;
                case 'PUT':
                    parse_str(file_get_contents("php://input"),$this->data);
                    $IdUser = $param[0];
                    $fullname = $this->data['data']['fullname'];
                    $password = $this->data['data']['password'];
                    $level = $this->data['data']['level'];
                    $email = $this->data['data']['email'];
                    $birth = date_create($this->data['data']['birthday']);
                    $Birthday = date_format($birth,"Y/m/d");
                    $gender = $this->data['data']['gender'];
                    $permission =$this->data['data']['permission'];
                    $avatar = URLROOT."public/user/images/image.JPG";
                    $kq = $this->userModel->updatetUser($fullname,$IdUser,$password,$email,$level,$gender,$Birthday,$permission);
                    if($kq=='true'){
                        echo json_encode(array("status"=>"update thành công"));
                    }
                    else{
                        echo json_encode(array("status"=>"update thất bại"));
                    }
                    break;
                case 'DELETE':
                    if($param[0]==null){
                        echo json_encode(array("status"=>"= Xóa thất bại"));
                    }
                    else{
                        $kq = $this->userModel->deleteUser($param[0]);
                        if($kq == true){
                            echo json_encode(array("status"=>"Xóa Thành Công"));
                        }else{
                            echo json_encode(array("status"=>"Xóa thất bại"));
                        }
                    }
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
?>