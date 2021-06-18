<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Thêm quảng cáo</li>
          </ol>

          <!-- Icon Cards-->
            <form action="addquangcao" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="AdsDescription">Tên quảng cáo</label>
                    <input type="text" name="AdsDescription" class="form-control" required="required" placeholder="Tên quảng cáo">
                </div>
                <div class="form-group">
                    <label for="URL">URL</label>
                    <input type="text"  name="URL" class="form-control"required="required"  placeholder="URL">
                </div>
                <div class="form-group">
                    <label for="UrlPics">Hình ảnh</label>
                    <input type="file" name="UrlPics" id="pathpics">
                </div>
                <button type="submit" name="btn_addquangcao" class="btn btn-primary mb-2">Thêm</button>
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