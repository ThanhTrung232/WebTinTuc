<div id="content-wrapper">

<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Chi tiết loại tin</li>
</ol>

<!-- Icon Cards-->
<?php 
            foreach($data["list_one_loaitin"] as $list_one_loaitin){
?>
    <form action="<?php echo URLROOT."/admin/editloaitin/".$list_one_loaitin->IdNewsType?>" method="post">
        <div class="form-group">
            <label for="NewsTypeName">Tên Loại Tin</label>
            <input type="text" name="NewsTypeName" class="form-control" required="required" value="<?php echo $list_one_loaitin->NewsTypeName;?>" placeholder="Tên Loại Tin">
        </div>
        <div class="form-group">
            <label for="NewsTypeNumber">Số thứ tự</label>
            <input type="text"  name="NewsTypeNumber" class="form-control"required="required" value="<?php echo $list_one_loaitin->NewsTypeNumber;?>"  placeholder="Số thứ tự">
        </div>
        <div class="form-group col-md-2">
            <label for="NewsTypeAppear">Ẩn hiện tin</label>
            <?php
                $selected_0 = "";
                $selected_1 = "";
                if($list_one_loaitin->NewsTypeAppear == 0){
                    $selected_0 = "selected";
                }
                else{
                    $selected_1 = "selected";
                }
            ?>
            <select name="NewsTypeAppear" class="form-control">
                <option value="0" <?php echo $selected_0;?> >Ẩn</option>
                <option value="1" <?php echo $selected_1;?> >Hiện</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="IdType">Thể Loại</label>
            <select name="IdType" class="form-control">
            <?php
             if(isset($data['listtheloai'])){
                foreach($data['listtheloai'] as $listtheloai){
                    if($listtheloai->IdType == $list_one_loaitin->IdType){
                        echo '<option value="'.$list_one_loaitin->IdType.'" selected>'.$listtheloai->TypeName.'</option>';
                    }
                    else{
                        echo '<option value="'.$listtheloai->IdType.'">'.$listtheloai->TypeName.'</option>';
                    }
                }
            }
        ?>
            </select>
        </div>
        <button type="submit" name="btn_editloaitin" class="btn btn-primary mb-2">Cập nhật</button>
    </form>
    <?php } ?>
    <?php if(isset($data["result"])){?>
        <h3> 
        <?php
            if($data["result"]=="true"){
                echo "<p>Cập nhật thành công</p>";
            }else{
                echo "<p>Cập nhật thất bại</p>";
            }
        }
            if(isset($data['error'])){
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
        ?>
        </h3>
    <?php }?>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

</div>
<!-- /.container-fluid -->

