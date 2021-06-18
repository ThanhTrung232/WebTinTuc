<section class="body-absolute">
   
    
    <div id="all-single-content" class="container-fluid pb-4 pt4 padding">
        <div class="container-fluid pb-4 pt-4 padding">
            <div class="row mx-0">
                <div class="col-md-10 animate-box" data-animate-effect="InLeft">
                    <div class="container paddding">
                        <div class="row mx-0">
                            <div class="col-md-8 animate-box" data-animate-effect="InLeft">
                                <!-- <br><h3>Info</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla malesuada enim id enim congue
                                    convallis. Praesent a cursus orci. Proin mauris eros, rhoncus in risus nec, vestibulum dignissim
                                    diam. Duis dapibus, magna ac fringilla consectetur, tellus quam aliquam quam, molestie tincidunt
                                    justo risus et nunc. Donec quis justo nec diam hendrerit facilisis placerat non magna. Class aptent
                                    taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                </p>
                                <div id="list-img-text" class="list-img-text">
                                    <img src="img/single/aa.png">
                                </div>
                                <ul>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, modi!</li>
                                    <li>Ea iure at, debitis culpa perspiciatis suscipit laudantium a, expedita.</li>
                                    <li>Voluptate distinctio perspiciatis cum sed ipsum nisi accusantium a aut!</li>
                                    <li>Sed vel quo dignissimos, quaerat totam officia, deserunt provident minus.</li>
                                </ul>
                                <br><h3>More</h3>
                                <div id="list-img-text" class="list-img-text">
                                    <img src="img/single/single.png">
                                </div>
                                <p>
                                    Nam vehicula viverra quam, nec ornare ex convallis eget. Praesent pulvinar, justo at lacinia
                                    elementum, dolor elit facilisis massa, vel feugiat elit massa et libero. Praesent hendrerit metus eu
                                    elementum commodo. Morbi tempus mi a nulla scelerisque, vitae vulputate nisi commodo. Maecenas felis
                                    urna, dictum quis mollis quis, mollis vel ligula. Nullam sodales sapien tellus, ornare tincidunt
                                    dolor imperdiet at. Vestibulum convallis, felis quis condimentum finibus, justo lectus aliquam
                                    libero, eu lacinia tellus leo eu orci.
                                </p> -->
                                <?php
                                foreach($data['ds_one_news'] as $list){
                                            if($list != null){
                                                echo '
                                                <br><h3>'.$list->Title.'</h3>
                                                <p>
                                                    '.$list->Overview.'
                                                </p>
                                                <div id="list-img-text" class="list-img-text">
                                                    <img src="../../'.$list->UrlPics.'">
                                                </div>
                                                <p>
                                                 '.$list->Detail.'
                                                </p>
                                                ';
                                                    }
                                }   
                                ?>
                            </div>
                            <div class="col-md-3 animate-box" data-animate-effect="InRight">
                                <div>
                                    <div class="all_headding all_heading_border_bottom py-2 mb-4">Tags</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="all_tags_all">
                                    <a href="#" class="all_tagg">Business</a>
                                    <a href="#" class="all_tagg">Technology</a>
                                    <a href="#" class="all_tagg">Sport</a>
                                    <a href="#" class="all_tagg">Art</a>
                                    <a href="#" class="all_tagg">Lifestyle</a>
                                    <a href="#" class="all_tagg">Three</a>
                                    <a href="#" class="all_tagg">Photography</a>
                                    <a href="#" class="all_tagg">Lifestyle</a>
                                    <a href="#" class="all_tagg">Art</a>
                                    <a href="#" class="all_tagg">Education</a>
                                    <a href="#" class="all_tagg">Social</a>
                                    <a href="#" class="all_tagg">Three</a>
                                </div>
                                <div>
                                    <div class="all_heading all_heading_border_bottom pt-3 py-2 mb-4">Populer</div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-5 align-self-center">
                                        <img src="img/single/aa.png" alt="img" class="all_most_trading"/>
                                    </div>
                                    <div class="col-7 paddding">
                                        <div class="most_all_treding_font"> Ra đường anh là cá mập</div>
                                        <div class="most_all_treding_font_123"> Về nhà anh là cá con</div>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-5 align-self-center">
                                        <img src="img/single/aa.png" alt="img" class="all_most_trading"/>
                                    </div>
                                    <div class="col-7 paddding">
                                        <div class="most_all_treding_font"> Chúng nó bảo anh sợ vợ</div>
                                        <div class="most_all_treding_font_123"> Anh bảo chúng nó quá non</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 animate-box" data-animate-effect="InRight">
                    <div class="container paddding">
                        <div class="row mx-0" id="adv">
                            <div class="col-md-8 animate-box list-adv" data-animate-effect="InLeft">
                            <?php
                                if(isset($data['quangcao'])){
                                    $row = $data['row'];
                                    if($row < 3) $max = $row;
                                    else $max = 3;
                                    $i = 0;
                                    foreach ($data['quangcao'] as $quangcao) {
                                        echo '<img src="../../'.$quangcao->UrlAdsPics.'">';
                                    }
                                }
                             ?>
                            </div>
                            <div class="col-md-3 animate-box" data-animate-effect="InRight"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="/action_page.php">
            <div class="form-group">
              <label for="comment">Comment:</label>
              <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</section>