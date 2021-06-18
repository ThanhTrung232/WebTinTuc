<?php
if($data['pages'] == "login" ||$data['pages'] == "register"  ){
    require('./public/user/pages/'.$data['pages'].'.php');
}
else{
require('./public/user/layouts/header.php');

require('./public/user/pages/'.$data['pages'].'.php');

require('./public/user/layouts/footer.php');
}
?>