<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo URLROOT ?>/public/user/css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo URLROOT ?>/public/user/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="<?php echo URLROOT ?>/public/user/css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo URLROOT ?>/public/user/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo URLROOT ?>/public/user/css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="<?php echo URLROOT ?>/public/user/css/style_1.css" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="<?php echo URLROOT ?>/public/user/js/modernizr-3.5.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <title>Tin tức</title>
</head>
<body class="index">
    <!----Heder----->
<section class="header-absolute">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 all_padding_menu">
                    <img src="<?php echo URLROOT?>/public/user/images/logo.png" alt="img" class="all_logo_width"/>
                </div>
                <div class="col-12 col-md-9 align-self-center all_mediya_right">
                    <div class="text-center d-inline-block">
                        <a class="all_display_table"><div class="wrap-search d-none d-lg-inline-block">
                            <form action="./" method="post" autocomplete="off" >
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                <div class="autocomplete">
                                <input type="text" id="myInput" name="mynews" placeholder="Nhập từ khóa tìm kiếm">
                                </div>
                            </form>
                        </div></a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a class="all_display_table"><div class="all_verticle_middle"><i class="fa fa-linkedin"></i></div></a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a class="all_display_table"><div class="all_verticle_middle"><i class="fa fa-google-plus"></i></div></a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a href="https://twitter.com/all" target="_blank" class="all_display_table"><div class="all_verticle_middle"><i class="fa fa-twitter"></i></div></a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a href="https://fb.com/all" target="_blank" class="all_display_table"><div class="all_verticle_middle"><i class="fa fa-facebook"></i></div></a>
                    </div>
                    <div class="d-inline-block text-center dd_position_relative ">
                        <select class="form-control all_text_select_option">
                            <option>Vietnam </option>
                            <option>French </option>
                            <option>German </option>
                            <option>English </option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-faded all_padd_mediya paddding_786">
        <div class="container padding_786">
            <nav class="navbar navbar-toggleable-md navbar-light ">
                <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                <a class="navbar-brand" href="#"><img src="img/home/logo.png" alt="img" class="mobile_logo_width"/></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo URLROOT; ?>/home">Trang chủ<span class="sr-only">(current)</span></a>
                        </li>
                        
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Danh mục <span class="sr-only">(current)</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                <?php 
                                    if(isset($data['ds_theloai'])){
                                        foreach($data['ds_theloai'] as $ds_theloai){
                                            echo ' <a class="dropdown-item" href="News.html">'.$ds_theloai->TypeName.'</a>';
                                        }
                                    }
                                ?>
                            </div>
                        </li>
                       
                        <li class="nav-item ">
                            <a class="nav-link" href="Contact_us.html">Liên hệ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                        <?php
                            if(isset($data["infoUser"])){
                                foreach($data["infoUser"] as $user){
                                echo '<a class="nav-link" href="User.html">'.$user->Username.'<span class="sr-only">(current)</span></a>';
                        ?>
                        </li>
                        <li class="nav-item ">
                        <?php
                                echo ' <a class="nav-link" href="'.URLROOT.'/user/logout">Đăng Xuất <span class="sr-only">(current)</span></a>';
                                }
                            }
                            else{
                                echo ' <a class="nav-link" href="'.URLROOT.'/user/login">Đăng nhập <span class="sr-only">(current)</span></a>';
                            }
                        ?>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>


