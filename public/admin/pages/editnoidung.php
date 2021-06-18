<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Nội dung chi tiết</li>
          </ol>
            <?php 
                foreach($data["ds"] as $list_noidung){
            ?>
          <!-- Icon Cards-->
            <form action="<?php echo URLROOT;?>/admin/editnoidung/<?php echo $list_noidung->IdNews;?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="Title">Tên tiêu đề:</label>
                    <input type="text" name="Title" class="form-control" readonly value="<?php echo $list_noidung->Title?>">
                </div>
                <div class="form-group">
                    <label for="Overview">Tóm tắt</label>
                    <input type="text"  name="Overview" class="form-control" id="exampleInputPassword1" placeholder="Nhập vào mật khẩu" value="<?php echo $list_noidung->Overview;?>">
                </div>
                <div class="form-group">
                <label for="UrlPics">Hình ảnh</label>
                <img src="<?php echo URLROOT.'/'.$list_noidung->UrlPics;?>" alt="chưa có ảnh" class="rounded mx-auto d-block">
                </div>
                <input name="UrlPics" class="form-control" value="<?php echo $list_noidung->UrlPics;?>" readonly>
                <div class="form-group">
                <label for="Detail">Nội dung</label>
                <textarea class="form-control" name="Detail" id="exampleFormControlTextarea1" placeholder="Nhập vào nội dung" rows="5"><?php echo $list_noidung->Detail;?></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="Day">Ngày</label>
                    <input name="Day" type="date" class="form-control" value="<?php echo $list_noidung->Day;?>">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="Keyword">Từ Khóa</label>
                    <input type="text" name="Keyword" class="form-control" value="<?php echo $list_noidung->Keyword?>">
                    </div>
                    <div class="form-group col-md-2">
                    <label for="anhien">Ẩn hiện tin</label>
                    <?php
                        $selected_0 = "";
                        $selected_1 = "";
                        if($list_noidung->NewsAppear == 0){
                            $selected_0 = "selected";
                        }
                        else{
                            $selected_1 = "selected";
                        }
                    ?>
                    <select name="anhien" class="form-control">
                        <option value="0" <?php echo $selected_0;?> >Ẩn</option>
                        <option value="1" <?php echo $selected_1;?> >Hiện</option>
                    </select>
                    </div>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="HotNews">Nổi bật</label>
                    <?php
                        $selected_0 = "";
                        $selected_1 = "";
                        if($list_noidung->HotNews == 0){
                            $selected_0 = "selected";
                        }
                        else{
                            $selected_1 = "selected";
                        }
                    ?>
                    <select name="HotNews" class="form-control">
                        <option value="0" <?php echo $selected_0;?> >Không</option>
                        <option value="1" <?php echo $selected_1;?> >Có</option>
                    </select>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="IdNewsType">Thể Loại</label>
                    <select name="IdNewsType" class="form-control">
                    <?php
                    if(isset($data['list_loaitin'])){
                        foreach($data['list_loaitin'] as $list_loaitin){
                            if($list_loaitin->IdNewsType == $list_noidung->IdNewsType){
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
            <?php }?>
            <button type="submit" name="btn_editnoidung" class="btn btn-primary mb-2">Cập nhật</button>
            </form>
            <div>
            <h6> 
            <?php if(isset($data["result"])){?>
                <?php
                    if($data["result"]=="true"){
                        echo "Cập nhật thành công";
                    }
                    else{
                        echo "Cập nhật thất bại";
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
                ?>
                </h6>
            <?php }?>
            </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->
