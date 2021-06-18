<?php

    if($data['pages'] == "login"){
        require('./public/admin/pages/'.$data['pages'].'.php');
    }
    else{
        require('./public/admin/layouts/header.php');

        require('./public/admin/pages/'.$data['pages'].'.php');
    
        require('./public/admin/layouts/footer.php');
    }
?>