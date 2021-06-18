





<!--
<form method="POST" enctype="multipart/form-data"> 

    <input type="file" name="image" /> 

    <input type="submit" name="ok"/> 

</form>

<a href="">See Image</a>
-->

<div class="content">
            <div class="trangchu">
                <p>Danh sách ảnh đại diện thành viên</p>
            </div>
            <div class="container2">
                <div class="List_title">
                <form action="" class="avataruser" method="post" enctype="multipart/form-data">
                    <?php 
                        // foreach($data['infoUsser'] as $user){
                    ?>
                    <table>
                        <tr>
                            <th style="width:20%">Username</th>
                            <th style="width:50%">Avartar</th>
                            <th style="width:30%">Description</th>
                        </tr>
                        <?php 
                            foreach($data['listUsers'] as $user){
                                echo "
                                        <tr>
                                        <td><p class = 'container'>".$user->Username."</p></td>
                                        <td> <div class = 'img_avatar'><img src='".URLROOT."/public/user/images/image.JPG'></div></td>
                                        <td><p class = 'container'>".$user->Email."</p></td>
                                        </tr> 
                                ";
                            }
                        ?>
            
                    </table>
                <?php //}?>
                </form>
            </div>
        </div>
        </div>