<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Thêm thể loại</li>
          </ol>

          <!-- Icon Cards-->
            <form action="addtheloai" method="post" name="addUser">
                <div class="form-group">
                    <label for="theloai">Tên Thể Loại</label>
                    <input type="text" name="theloai" class="form-control" required="required" placeholder="Tên Thể Loại">
                </div>
                <div class="form-group">
                    <label for="txt_STT">Số thứ tự</label>
                    <input type="text"  name="txt_STT" class="form-control"required="required"  placeholder="Số thứ tự">
                </div>
                <div class="form-group col-md-2">
                    <label for="level">Ẩn hiện tin</label>
                    <select name="txt_anhien" class="form-control">
                        <option value="0" selected>Ẩn</option>
                        <option value="1">Hiện</option>
                    </select>
                </div>
                <button type="submit" name="btn_addtheloai" class="btn btn-primary mb-2">Thêm</button>
            </form>
            <h3> 
            <?php if(isset($data["result"])){?>
                <?php
                    if($data["result"]=="true"){
                        echo "Thêm thành công";
                        }
                    }
                    if(isset($data['error'])){
                        switch ($data['error']) {
                            case 1:
                               echo "Chưa điền đủ thông tin  !!!";
                                break;
                            case 2:
                                echo "Tên thể loại không hợp lệ !!!  !!!";
                                break;
                            case 3:
                                echo "Số thứ tự phải là số  !!!";
                                break;
                    }
                ?>
                </h3>
            <?php }?>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->