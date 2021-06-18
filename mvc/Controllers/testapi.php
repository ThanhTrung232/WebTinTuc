<?php
    class testapi extends Controller{
        public $userModel;
        public $tieudeModel;
        public function __construct(){
            //Model 
            //$this->adminModel = $this->model("adminModel");
            $this->userModel = $this->model("usersModel");
            $this->noidungModel = $this->model("noidungModel");
            $this->newssaveModel = $this->model("newssaveModel");
        }
        function SayHi(){
            $dsnoidung = $this->noidungModel->dsnoidung();
            //$tintuc = $this->tieudeModel->dsTintuc();
            //$user = $this->userModel->getUsers();
            $this->view("admin", [
                "pages"      => "testapi",
                
            ]);
        }
       
    }
?>