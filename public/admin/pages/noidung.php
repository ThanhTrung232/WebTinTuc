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
      Nội dụng</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID Tiêu Đề</th>
                <th>Tiều Đề</th>
                <th>Tóm Tắt</th>
                <th>ID user</th>
                <th>Loại Tin</th>
                <th>Xóa</th>
          </thead>
          <tfoot>
            <tr>
                <th>ID Tiêu Đề</th>
                <th>Tiều Đề</th>
                <th>Tóm Tắt</th>
                <th>ID user</th>
                <th>Loại Tin</th>
                <th>Xóa</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
                    foreach($data["ds"] as $list){
                        echo"<tr>
                                <td>".$list->IdNews."</td>
                                <td><a href='".URLROOT."/admin/editnoidung/".$list->IdNews."'>".$list->Title."</td>
                                <td>".$list->Overview."</td>
                                <td>".$list->IdUser."</td>";
                        foreach($data["ds_loaitin"] as $ds_loaitin){
                          if($ds_loaitin->IdNewsType == $list->IdNewsType)
                          echo "<td>".$ds_loaitin->NewsTypeName."</td> ";
                        }
                        echo "
                                <td>
                                    <form action='".URLROOT."/admin/xoanoidung/".$list->IdNews."' method = 'post'>
                                        <button type='submit' name='btn_deletenoidung' class='btn btn-danger '> Xóa </button>
                                    </form>
                                </td>
                                </tr>";
                    }
                        
            ?>
          </tbody>
        </table>
        <?php if(isset($data["error"])){?>
        <h3> 
        <?php
            if($data["error"] == "1"){
                echo "Đăng nhập user để thêm ";
            }
        ?>
        </h3>
    <?php }?>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

  <p class="small text-center text-muted my-5">
    <em>More table examples coming soon...</em>
  </p>

</div>
<!-- /.container-fluid -->


