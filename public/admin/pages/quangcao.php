
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
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
    </li>
  </ol>
  <h1>Số Lượng quảng cáo: </h1>
<?php
    if(isset($data['row'])){
        echo '<h1>'.$data['row'].'</h1>';
    }
    else{
        echo '<h1> 0 </h1>';
    }
?>
<a class="btn btn-primary" href="<?php echo URLROOT ?>/admin/addquangcao" role="button">Thêm</a>
<div id="content-wrapper">
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

  <p class="small text-center text-muted my-5">
    <em>More table examples coming soon...</em>
  </p>

</div>
<!-- /.container-fluid -->


