 <div id="content-wrapper">

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
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Thể Loại</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID Thể Loại</th>
                <th>Tên Thể Loại</th>
                <th>Số Thứ Tự</th>
                <th>Ẩn Hiện Tin</th>
                <th>Xóa</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>ID Thể Loại</th>
                <th>Tên Thể Loại</th>
                <th>Số Thứ Tự</th>
                <th>Ẩn Hiện Tin</th>
                <th>Xóa</th>
            </tr>
          </tfoot>
          <tbody>
          <?php
                   
                      foreach($data['ds'] as $ds_theloai){
                       echo"<tr><td>".$ds_theloai->IdType."</a></td>
                               <td><a href='".URLROOT."/admin/edittheloai/".$ds_theloai->IdType."'>".$ds_theloai->TypeName."</td>
                                <td>".$ds_theloai->TypeNumber."</td>
                                <td>".$ds_theloai->TypeAppear."</td>
                                <td>
                                  <form method='post' action='".URLROOT."/admin/delete_theloai/".$ds_theloai->IdType."'>
                                    <button type='submit' name='btn_delete_theloai' class='btn btn-danger '> Xóa </button>
                                  </form>
                                </td>
                           </tr>";
                       }
                       ?>
          </tbody>
        </table>
      </div>
    </div>
    <h6>
    <?php 
       if(isset($data['error'])){
         echo "<script> alert('";
        switch ($data['error']) {
            case 1:
            echo "Xóa Loại Tin tham chiếu đến thể loại trước'";
                break;
            default:
            echo "Xóa thành công'";
                break;
        }
        echo ");</script>";
  }
    ?>
    </h6>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

  <p class="small text-center text-muted my-5">
    <em>More table examples coming soon...</em>
  </p>

</div>
<!-- /.container-fluid -->


