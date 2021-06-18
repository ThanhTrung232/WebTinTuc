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
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Gender</th>
                      <th>RegisterDay</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Gender</th>
                      <th>RegisterDay</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                           
                              foreach($data['listUsers'] as $user){
                               echo"<tr><td>".$user->IdUser."</a></td>
                                       <td><a href='".URLROOT."/admin/editthanhvien/".$user->IdUser."'>".$user->Username."</td>
                                        <td>".$user->FullName."</td>
                                        <td>".$user->Email."</td>
                                        <td>".$user->IdGroup."</td>
                                        <td>".$user->Gender."</td>                      
                                        <td>".$user->RegisterDay."</td>
                                   </tr>";
                               }
                            
                               ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

          <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
          </p>

        </div>
        <!-- /.container-fluid -->


