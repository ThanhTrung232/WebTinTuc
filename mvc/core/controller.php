<?php
    class Controller{

        public function model($model){
            require_once "./mvc/Models/".$model.".php";
            return new $model;
        }

        public function view($view,$data=[]){
            if(file_exists("./mvc/Views/".$view.".php")) {
                require_once "./mvc/Views/".$view.".php";
            }else{
                die("View does not exist.");
            }
            
        }

        function getBaseUrl(){
            $currentPath =$_SERVER['PHP_SELF']; // Biến có sẵn chứa url hiện tại
            $pathInfo = pathinfo($currentPath);
            $hostname = $_SERVER['HTTP_HOST']; // localhost
            $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'],0,5))=="https://"?"https://":"http://";
            return $protocol.$hostname.($pathInfo['dirname']!= '/' && $pathInfo['dirname'] != '/localhost:8080/lab-03/'? $pathInfo['dirname'] : '');
        }

    }
?>