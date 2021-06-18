<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/admin/css/login.css">
    <title>ADMIN</title>
</head>
<body>
        <header>
            <div class="main-header">
                <h1>Login admin</h1>
                <hr/>
                <h3>Wellcome to Admin Website News</h3>
                <form action="<?php echo URLROOT;?>/admin/login" method="post" id="formlogin">
                    <p></p><input type="text" name="username" placeholder="Username"></p>
                    <p><input type="password" name="password" placeholder="Password"></p>
                </form>
                   <p><button name="btnadminLogin" form="formlogin" type="submit">Continue</button></p>

           
<?php
    if(isset($data['error'])){
        switch ($data['error']) {
            case 1:
               echo "<p> Sai tên đăng nhập hoặc mật khẩu !!!</p>";
                break;
            case 2:
                echo "<p> Bạn không có quyền truy cập vào mục này !!!</p>";
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