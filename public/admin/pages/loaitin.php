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
                <th>ID Loại Tin</th>
                <th>Tên Loại Tin</th>
                <th>Số Thứ Tự</th>
                <th>Ẩn Hiện Tin</th>
                <th>Thể Loại</th>
                <th>Xóa</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>ID Loại Tin</th>
                <th>Tên Loại Tin</th>
                <th>Số Thứ Tự</th>
                <th>Ẩn Hiện Tin</th>
                <th>Thể Loại</th>
                <th>Xóa</th>
            </tr>
          </tfoot>
          <tbody>
          <?php
                foreach($data['list_all_loaitin'] as $list_all_loaitin){
                    echo"<tr><td>".$list_all_loaitin->IdNewsType."</a></td>
                        <td><a href='".URLROOT."/admin/editloaitin/".$list_all_loaitin->IdNewsType."'>".$list_all_loaitin->NewsTypeName."</td>
                        <td>".$list_all_loaitin->NewsTypeNumber."</td>
                        <td>".$list_all_loaitin->NewsTypeAppear."</td>";
                    if(isset($data['listtheloai'])){
                        foreach($data['listtheloai'] as $listtheloai){
                            if($listtheloai->IdType == $list_all_loaitin->IdType){
                                echo "<td>".$listtheloai->TypeName."</td>";
                            }
                        }
                    }
                    echo "
                        <td>
                            <form method='post' action='".URLROOT."/admin/delete_loaitin/".$list_all_loaitin->IdNewsType."'>
                            <button type='submit' name='btn_delete_loaitin' class='btn btn-danger '> Xóa </button>
                            </form>
                        </td>
                    </tr>";
                }
                ?>
          </tbody>
        </table>
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
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

  <p class="small text-center text-muted my-5">
    <em>More table examples coming soon...</em>
  </p>

</div>
<!-- /.container-fluid -->


