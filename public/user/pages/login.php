<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/user/css/login.css">
    <title>Thành Viên</title>
</head>
<body>
        <header>
            <div class="main-header">
                <h1>Đăng nhập thành viên</h1>
                <hr/>
                <h3>Chào mừng đến với thành viên web tin tức</h3>
                <form action="<?php echo URLROOT;?>/user/login" method="post" id="formlogin">
                    <p></p><input type="text" name="username" placeholder="Username"></p>
                    <p><input type="password" name="password" placeholder="Password"></p>
                </form>
                   <p><button name="btnuserLogin" form="formlogin" type="submit">Đăng nhập</button></p>
                   <div class = "btn_login">
                        <p><a href ="<?php echo URLROOT;?>/user/forgot"><button>Quên mật khẩu</button></a></p>
                        <p><a href ="<?php echo URLROOT;?>/user/register"><button name = "btn_register">Đăng kí</button></a></p>
                    </div>
           
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