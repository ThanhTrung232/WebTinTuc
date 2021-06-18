<div id="content-wrapper">

<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Thêm loại tin</li>
</ol>

<!-- Icon Cards-->
    <form action="<?php echo URLROOT."/admin/addloaitin"?>" method="post">
        <div class="form-group">
            <label for="NewsTypeName">Tên Loại Tin</label>
            <input type="text" name="NewsTypeName" class="form-control" required="required" placeholder="Tên Loại Tin">
        </div>
        <div class="form-group">
            <label for="NewsTypeNumber">Số thứ tự</label>
            <input type="text"  name="NewsTypeNumber" class="form-control"required="required" placeholder="Số thứ tự">
        </div>
        <div class="form-group col-md-1">
            <label for="NewsTypeAppear">Ẩn hiện tin</label>
            <select name="NewsTypeAppear" class="form-control">
                <option value="0" selected >Ẩn</option>
                <option value="1" >Hiện</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="IdType">Thể Loại</label>
            <select name="IdType" class="form-control">
            <?php
             if(isset($data['listtheloai'])){
                foreach($data['listtheloai'] as $listtheloai){
                        echo '<option value="'.$listtheloai->IdType.'">'.$listtheloai->TypeName.'</option>';
                }
            }
        ?>
            </select>
        </div>
        <button type="submit" name="btn_addloaitin" class="btn btn-primary mb-2">Thêm</button>
    </form>
    <h6> 
    <?php if(isset($data["result"])){?>
     
        <?php
            if($data["result"]=="true"){
                echo "<p>Thêm thành công</p>";
            }else{
                echo "<p>Thêm thất bại</p>";
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
        </h6>
    <?php }?>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

</div>
<!-- /.container-fluid -->

