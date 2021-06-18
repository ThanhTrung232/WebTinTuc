<?php 
    class App{
        protected  $controller="home";
        protected  $action="SayHi";
        protected  $params=[];

        function __construct(){  
           $arr = $this->UrlProcess();

           //xu li controller
            if(file_exists("./mvc/Controllers/".$arr[0].".php")){
                    $this->controller = $arr[0];
                    array_shift($arr);                    
                }
           require_once "./mvc/Controllers/".$this->controller.".php";
           $controller = new $this->controller;
           
           // xu li action
            if(isset($arr[0])){
                if( method_exists( $controller, $arr[0])){
                    $this->action = $arr[0];
                    array_shift($arr); 
                }
            } 
            // xu li params
            $this->params = $arr;         
            // call_user_func_array([$this->controller,$this->action],$this->params);
            $action = $this->action;
            $params = $this->params;
            $controller->$action($params);
        }
        // xu li thanh dia chi
        function UrlProcess(){
            if(isset($_GET["url"])) {
               return explode("/",filter_var(trim($_GET["url"],"/")));
            }
            else {
                $arr[0] = $this->controller;
                $arr[1] = $this->action;
                $arr[2] = [];
                return $arr;
                }
        }
    
    }

?>