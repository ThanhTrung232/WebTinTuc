<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Thêm nội dung</li>
          </ol>
          <!-- Icon Cards-->
            <form action="<?php echo URLROOT;?>/admin/addnoidung" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="Title">Tên tiêu đề:</label>
                    <input type="text" name="Title" class="form-control" required="required" placeholder="Tên tiêu đề" >
                </div>
                <div class="form-group">
                    <label for="Overview">Tóm tắt</label>
                    <input type="text"  name="Overview" class="form-control" required="required" id="exampleInputPassword1" placeholder="Tóm tắt nội dung">
                </div>
                <div class="form-group">
                    <label for="UrlPics">Hình ảnh</label>
                    <input type="file" name="UrlPics" id="fileupload">
                </div>
                <div class="form-group">
                <label for="Detail">Nội dung</label>
                <textarea class="form-control" name="Detail" id="exampleFormControlTextarea1" required="required" placeholder="Nhập vào nội dung" rows="5"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="Keyword">Từ Khóa</label>
                    <input type="text" name="Keyword" class="form-control"required="required"  placeholder="Từ Khóa">
                    </div>
                    <div class="form-group col-md-2">
                    <label for="anhien">Ẩn hiện tin</label>
                    <select name="anhien" class="form-control">
                        <option value="0" > >Ẩn</option>
                        <option value="1" selected >Hiện</option>
                    </select>
                    </div>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="HotNews">Nổi bật</label>
                    <select name="HotNews" class="form-control">
                        <option value="0" selected >Không</option>
                        <option value="1" >Có</option>
                    </select>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="IdNewsType">Loại tin</label>
                    <select name="IdNewsType" class="form-control">
                    <?php
                    if(isset($data['list_loaitin'])){
                        foreach($data['list_loaitin'] as $list_loaitin){
                            if($list_loaitin->IdNewsType == 0){
                                echo '<option value="'.$list_loaitin->IdNewsType.'" selected>'.$list_loaitin->NewsTypeName.'</option>';
                            }
                            else{
                                echo '<option value="'.$list_loaitin->IdNewsType.'">'.$list_loaitin->NewsTypeName.'</option>';
                            }
                        }
                    }
                ?>
                </select>
            </div>
            <button type="submit" name="btn_addnoidung" class="btn btn-primary mb-2">Thêm</button>
            </form>
            <div>
            <h6> 
            <?php if(isset($data["result"])){?>
                <?php
                    if($data["result"]=="true"){
                        echo "Thêm thành công";
                    }
                    else{
                        echo "Thêm thất bại";
                    }
                    if(isset($data["error"])){
                        switch ($data['error']) {
                            case 1:
                            echo "<p> Chưa điền đủ thông tin  !!!</p>";
                                break;
                            case 2:
                                echo "<p> Tên Loại Tin không hợp lệ !!!  !!!</p>";
                                break;
                            case 3:
                                echo "<p> Số thứ tự phải là số  !!!</p>";
                                break;
                            case 4:
                                echo "<p> Tên Loại Tin đã tồn tại  !!!</p>";
                                break;
                    }
                    }
                    if(isset($data["messages"])){
                        foreach($data["messages"] as $error){
                            echo '<br>'.$error;
                        }
                    }
                ?>
                </h6>
            <?php }?>
            </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->
