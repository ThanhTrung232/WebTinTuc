<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo URLROOT;?>/public/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo URLROOT;?>/public/admin/bootstrap/fonts/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo URLROOT;?>/public/admin/bootstrap/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo URLROOT;?>/public/admin/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="<?php echo URLROOT;?>/admin">
      <?php
                     if(isset($_SESSION['admin']))
                     {
                         echo "ADMIN - ";
                         echo $_SESSION['admin'];
                     }
                     else{
                        if(isset($_SESSION['username'])){
                            echo "USER - ";
                            echo $_SESSION['username'];
                        }
                     }
                 ?>
      </a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="<?php echo URLROOT;?>/admin">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Thông báo</a>
            <a class="dropdown-item" href="#">Thông báo khác</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Thông báo ...</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Tin nhắn 1</a>
            <a class="dropdown-item" href="#">Tin nhắn 2</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Tin nhắn ... </a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Cài đặt</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/logout">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT;?>/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Trang quản trị</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Quản trị viên</h6>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/thanhvien">Thành viên</a>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/addthanhvien">Thêm thành viên</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Quản trị thể loại:</h6>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/theloai">Thông tin thể loại</a>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/addtheloai">Thêm thể loại</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Quản trị loại tin</h6>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/loaitin">Thông tin loại tin</a>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/addloaitin">Thêm loại tin </a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Quản trị nội dung:</h6>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/noidung">Thông tin nội dung</a>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/addnoidung">Thêm nội dung </a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Quản trị quảng cáo:</h6>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/quangcao">Thông tin quảng cáo</a>
            <a class="dropdown-item" href="<?php echo URLROOT;?>/admin/addquangcao">Thêm quảng cáo </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/admin/theloai">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Thể Loại</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/admin/loaitin">
            <i class="fas fa-fw fa-table"></i>
            <span>Loại tin</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/admin/noidung">
            <i class="fas fa-fw fa-table"></i>
            <span>Nội dung</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/admin/quangcao">
            <i class="fas fa-fw fa-table"></i>
            <span>Quảng cáo</span></a>
        </li>
      </ul>