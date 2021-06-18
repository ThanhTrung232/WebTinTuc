





<!--
<form method="POST" enctype="multipart/form-data"> 

    <input type="file" name="image" /> 

    <input type="submit" name="ok"/> 

</form>

<a href="">See Image</a>
-->

<div class="content">
            <div class="trangchu">
                <p>Danh sách ảnh trang tin tức</p>
            </div>
            <div class="container2">
                <div class="List_title">
                <form action="" class="avataruser" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <th style="width:20%">Thể Loại</th>
                            <th style="width:50%">Ảnh</th>
                            <th style="width:30%">Miêu tả</th>
                        </tr>
                        <?php 
                            foreach($data['list_noidung'] as $list){
                                echo "
                                        <tr>
                                        <td><p class = 'container'>".$list->Title."</p></td>
                                        <td> <div class = 'img_avatar'><img src='".URLROOT."/public/user/images/image.JPG'></div></td>
                                        <td><p class = 'container'>".$list->IdNewsType."</p></td>
                                        </tr> 
                                ";
                            }
                        ?>
            
                    </table>
                </form>
            </div>
        </div>
        </div>