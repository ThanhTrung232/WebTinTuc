<div id="content-wrapper">

<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Chi tiết loại</li>
</ol>

<!-- Icon Cards-->
<?php 
            foreach($data["list_one_theloai"] as $list_one_theloai){
?>
    <form action="<?php echo URLROOT."/admin/edittheloai/".$list_one_theloai->IdType?>" method="post" name="addUser">
        <div class="form-group">
            <label for="theloai">Tên Thể Loại</label>
            <input type="text" name="theloai" class="form-control" required="required" value="<?php echo $list_one_theloai->TypeName;?>" placeholder="Tên Thể Loại">
        </div>
        <div class="form-group">
            <label for="txt_STT">Số thứ tự</label>
            <input type="text"  name="txt_STT" class="form-control"required="required" value="<?php echo $list_one_theloai->TypeNumber;?>"  placeholder="Số thứ tự">
        </div>
        <div class="form-group col-md-2">
            <label for="txt_anhien">Ẩn hiện tin</label>
            <?php
                $selected_0 = "";
                $selected_1 = "";
                if($list_one_theloai->TypeAppear == 0){
                    $selected_0 = "selected";
                }
                else{
                    $selected_1 = "selected";
                }
            ?>
            <select name="txt_anhien" class="form-control">
                <option value="0" <?php echo $selected_0;?> >Ẩn</option>
                <option value="1" <?php echo $selected_1;?> >Hiện</option>
            </select>
        </div>
        <button type="submit" name="submit_edittheloai" class="btn btn-primary mb-2">Cập nhật</button>
    </form>
    <?php } ?>
    <div>
    <h3> 
    <?php if(isset($data["result"])){?>
        <?php
            if($data["result"]=="true"){
                echo "<p>Câp nhật thành công</p>";
            }else{
                echo "<p>Câp nhật thất bại</p>";
            }
        }
            if(isset($data['error'])){
                switch ($data['error']) {
                    case 1:
                    echo "<p> Chưa điền đủ thông tin  !!!</p>";
                        break;
                    case 2:
                        echo "<p> Tên thể loại không hợp lệ !!!  !!!</p>";
                        break;
                    case 3:
                        echo "<p> Số thứ tự phải là số  !!!</p>";
                    case 4:
                        echo "<p> Tên Thể Loại đã tồn tại  !!!</p>";
                        break;
            }
        ?>
        </h3>
    <?php }?>
    </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

</div>
<!-- /.container-fluid -->

