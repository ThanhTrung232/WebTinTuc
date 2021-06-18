<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/user/css/login.css">
    <title>Đăng Kí</title>
</head>
<body>
        <header>
            <div class="main-header">
                <h1>Đăng Kí Thành viên</h1>
                <form action="<?php echo URLROOT;?>/user/register" method="post" id="formlogin">
                    <p><input type="text" name="username" placeholder="Username"></p>
                    <p><input type="text" name="password" placeholder="Password"></p>
                    <p><input type="text" name="hovaten" placeholder="Họ Và Tên"></p>
                    <p><input type="text" name="email" placeholder="Email"></p>
                    <p><input type="text" name="birthday" placeholder="Ngày sinh: YY/MM/DD"></p>
                    <p>
                    <lable for="gender" class="input_left">Giới tính :</lable>
                        <select name="gender" id="cars">
                            <option value="Nam"><p>Nam</p></option>
                            <option value="Nữ"><p>Nữ</p></option>
                        </select>
                    </p>
                </form>
                   <p><button name="btn_submit" form="formlogin" type="submit">Đăng Kí</button></p>
<?php
    if(isset($data['error'])){
        switch ($data['error']) {
            case 1:
               echo "<p> Sai tên đăng nhập hoặc mật khẩu !!!</p>";
                break;
            case 2:
                echo "<p> Bạn không có quyền truy cập vào mục này !!!</p>";
                break;
            case 3:
                echo "<p> Chưa điền đủ thông tin !!!</p>";
                break;
            case 4:
                echo "<p> Sai định dạng !!!</p>";
                break;
            case 5:
                echo "<p> Sai định dạng email !!!</p>";
                break;
            case 6:
                echo "<p> Tên đăng nhập hoặc email đã tồn tại !!!</p>";
                break;
            default:
                echo "<p> Mời bạn đăng nhập !!!</p>";
                break;
        }
        
    }
?>
 </div>
</header>
</body>
</html>