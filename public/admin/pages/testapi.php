<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
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
              <div class="form-group col-md-4">
                    <label for="permission">Thao tác</label>
                    <select name="permission" id="permission" class="form-control">
                        <option value="GET" selected>GET</option>
                        <option value="POST">POST</option>
                        <option value="PUT">PUT</option>
                        <option value="DELETE">DELETE</option>
                    </select>
              </div>
              <button type="submit" id="btn_load" name="btnadd" class="btn btn-primary col-md-4">LOAD</button>
              <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable_api" width="100%" cellspacing="0">
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
                </table>
              </div>
              <form  method="post" name="addUser" id="form_api">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="Username" class="form-control" required="required" placeholder="Nhập vào tài khoản">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"  name="password" id="Password" class="form-control" id="exampleInputPassword1" placeholder="Nhập vào mật khẩu">
                </div>
                <div class="form-group">
                    <label for="hovaten">Họ và Tên</label>
                    <input type="text"  name="hovaten" id="FullName"  class="form-control"  required="required" placeholder="Nhập vào họ và tên">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="required"   placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Nam" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Nam
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Nữ">
                    <label class="form-check-label" for="exampleRadios2">
                        Nữ
                    </label>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="birthday">Ngày sinh</label>
                    <input name="birthday" type="date" class="form-control" id="birthday" >
                    </div>
                    <div class="form-group col-md-4">
                    <label for="permission">Phân quyền</label>
                    <select name="permission" id="permission_api" class="form-control">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="0" selected>Thành Viên</option>
                        <option value="1">Người dùng</option>
                    </select>
                </div>
                <input type="submit" name="btnadd" id="btnadd" class="btn btn-primary mb-2" value="Thêm"></input>
            </form>
                    </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

          <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
          </p>

        </div>
        <!-- /.container-fluid -->