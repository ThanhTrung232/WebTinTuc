 <!-----Body------>
 <script>

function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
/*An array containing all the country names in the world:*/
var countries = [<?php 
                        if(isset($data['dsnoidung'])){
                                $html = '';
                                foreach($data['dsnoidung'] as $dsnoidung){
                                $html .= '"'.$dsnoidung->Keyword.'"'.',';
                                }
                                echo substr($html, 0, -1);
                        }
                ?>,];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);

</script>
 <section calss="body-absolute">
     <div class="container-fluid2 padding mb-5">
         <div class="row mx-0">
             <div class="col-md-8 col-12 padding animate-box" data-animate-effect="fadeIn">
                 <?php
                            if(isset($data['dsnoidung'])){
                                $count = 0;
                                foreach($data['dsnoidung'] as $dsnoidung){
                                    if($dsnoidung->HotNews == 1 && $dsnoidung->NewsAppear == 1){
                                        echo ' <div class="all_suceeall_height"><img src="./'.$dsnoidung->UrlPics.'" alt="img"/>
                                                <div class="all_suceeall_height_position_absolute"></div>
                                                <div class="all_suceeall_height_position_absolute_font">
                                                <div class=""><a href="#" class="color_fff"></a></div>';
                                        echo '<div class=""><a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="all_good_font">'.$dsnoidung->Title.'</a></div>';
                                        $id = $dsnoidung->IdNews;
                                        break;
                                    }
                                }
                        ?>
             </div>
         </div>
     </div>
     <div class="col-md-4">
         <div class="row">
             <?php
                        $count = 0;
                        foreach($data['dsnoidung'] as $dsnoidung){
                            if($dsnoidung->HotNews == 1 && $dsnoidung->NewsAppear == 1 &&  $id != $dsnoidung->IdNews){
                            echo '<div class="col-md-12 col-12 paddding animate-box" data-animate-effect="fadeIn">
                            <div class="all_suceeall_height_2"><img src="./'.$dsnoidung->UrlPics.'" alt="img"/>
                                <div class="all_suceeall_height_position_absolute"></div>
                                <div class="all_suceeall_height_position_absolute_font_2">
                                    <div class=""><a href="#" class="color_fff"></a></div>';
                            echo '<div class=""><a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="all_good_font_2"> '.$dsnoidung->Title.'</a></div>';
                            echo '
                            </div>
                            </div>';
                            if($count >= 1) break;
                            $count++;
                        }
                    }    
                }                     
                ?>
         </div>
     </div>
     </div>
     </div>
     </div>
     </div>
     </div>
     <div class="container-fluid pt-3">
         <div class="container animate-box" data-animate-effect="fadeIn">
             <div class="all_heading all_heading_border_bottom py-2 mb-4">Trending</div>
             <div class="owl-carousel owl-theme js" id="slider1">
                 <?php
                     foreach($data['dsnoidung_view'] as $dsnoidung){
                        if($dsnoidung->Views != 0){
                         echo '     <div class="item px-2">
                         <div class="all_latest_trading_img_position_relative">
                             <div class="all_latest_trading_img"><img src="./'.$dsnoidung->UrlPics.'" alt=""class="all_img_special_relative"/></div>
                             <div class="all_latest_trading_img_position_absolute"></div>
                             <div class="all_latest_trading_img_position_absolute_1">
                                 <a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="text-white">'.$dsnoidung->Title.' </a>
                             </div>
                         </div>
                     </div>';
                     }
                 }   
                ?>
             </div>
         </div>
     </div>
     <div class="container-fluid pb-4 pt-5">
         <div class="container animate-box">
             <div class="all_heading all_heading_border_bottom py-2 mb-4">Tin tức</div>
             <div class="owl-carousel owl-theme" id="slider2">

                 <!-- <div class="item px-2">
                    <div class="all_hover_news_img">
                        <div class="all_news_img"><img src="img/home/ip12.png" alt=""/></div>
                        <div>
                            <a href="single_hot.html" class="d-block all_small_post_heading"><span class="">The top 10</span></a>
                            <div class="c_g"> bbv</div>
                        </div>
                    </div>
                </div> -->
                 <?php
                            if(isset($data['dsnoidung'])){
                                foreach($data['dsnoidung'] as $dsnoidung){
                                    if($dsnoidung->NewsAppear == 1){
                                        echo ' <div class="item px-2">
                                                <div class="all_hover_news_img">
                                                    <div class="all_news_img"><img src="'.$dsnoidung->UrlPics.'" alt=""/></div>
                                                    <div>
                                                        <a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="d-block all_small_post_heading"><span class="">'.$dsnoidung->Title.'</span></a>
                                                    </div>
                                                </div>
                                            </div> ';
                                    }
                                }
                            }
                        ?>

             </div>

         </div>
     </div>

     <div class="container-fluid pb-4 pt-4 paddding">
         <div class="row mx-0">
             <div class="col-md-10 animate-box" data-animate-effect="InLeft">
                 <div class="container paddding">
                     <div class="row mx-0">
                         <div class="col-md-8 animate-box" data-animate-effect="InLeft">
                             <h3>Hot</h3>
                             <?php
                                foreach($data['dsnoidung_view'] as $dsnoidung){
                                    if($dsnoidung->HotNews == 1){
                                echo '<div class="row pb-4">
                                    <div class="col-md-5">
                                        <div class="all_hover_news_img">
                                            <div class="all_news_img"><img src="./'.$dsnoidung->UrlPics.'" alt=""/></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 animate-box">
                                        <a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="all_magna py-2">'.$dsnoidung->Title.'</a> <a href="#" class="all_mini_time py-3"> '.$dsnoidung->Overview.'</a>
                                        <div class="most_all_treding_font_123"> '.$dsnoidung->Day.'</div>
                                    </div>
                                    </div>';
                                }
                            }   
                            ?>
                             <!-- Pagination -->
                             <h3>New</h3>
                             <div id="paging">
                                 <nav aria-label="Page navigation example">
                                     <?php
                                // foreach($data['dsnoidung'] as $dsnoidung){
                                // echo '<div class="row pb-4" id="row">
                                //         <div class="col-md-5">
                                //             <div class="all_hover_news_img">
                                //                 <div class="all_news_img"><img src="./'.$dsnoidung->UrlPics.'" alt=""/></div>
                                //                 <div></div>
                                //             </div>
                                //         </div>
                                //         <div class="col-md-7 animate-box">
                                //             <a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="all_magna py-2">'.$dsnoidung->Title.'</a> <a href="'.URLROOT.'/home/viewed/'.$dsnoidung->IdNews.'" class="all_mini_time py-3">'.$dsnoidung->Overview.'</a>
                                //             <div class="most_all_treding_font_123 align="right">'.$dsnoidung->Day.'</div>
                                //         </div>
                                //     </div> ';
                                // }     
                            ?>

                                 </nav>

                             </div>
                         </div>
                         <div class="col-md-4 animate-box" data-animate-effect="InRight">
                             <div>
                                 <div class="all_heading all_heading_border_bottom py-2 mb-4">Tags</div>
                             </div>
                             <div class="clearfix"></div>
                             <div class="all_tags_all">
                                 <!-- <a href="#" class="all_tagg">Business</a> -->
                                 <?php
                                foreach($data['ds_loaitin'] as $dsloaitin){
                                echo '<a href="#" class="all_tagg">'.$dsloaitin->NewsTypeName.'</a>';
                                }     
                            ?>
                             </div>
                             <div>
                                 <div class="all_heading all_heading_border_bottom pt-3 py-2 mb-4">Tin đã xem</div>
                             </div>
                             <div class="row pb-3">
                                 <?php
                                     if(!isset($data['dsview'])){
                                         echo '<div class="row pb-3">';
                                         echo '<h5> Chưa có mục nào </h5>';
                                         echo '</div>';
                                     }
                                     else{
                                         foreach($data['dsview'] as $dsview){
                                          foreach($dsview as $viewed)
                                             echo '<div class="row pb-3">
                                                <div class="col-5 align-self-center">
                                                    <img src="./'.$viewed->UrlPics.'" alt="img" class="all_most_trading"/>
                                                            </div>
                                                            <div class="col-7 paddding">
                                                            <a href="'.$viewed->IdNews.'">
                                                                <div class="most_all_treding_font">'.$viewed->Title.'</div>
                                                                <div class="most_all_treding_font_123">'.$viewed->Day.'</div>
                                                            </div> </a></div>'
                                                           ;
                                         }
                                      } 
                                ?>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-2 animate-box" data-animate-effect="InRight">
                 <div class="container paddding">
                     <div class="row mx-0" id="adv">
                         <div class="col-md-8 animate-box list-adv" data-animate-effect="InLeft">
                             <!-- <img src="img/home/dai.png"> -->
                             <?php
                                if(isset($data['quangcao'])){
                                    $row = $data['row'];
                                    if($row < 3) $max = $row;
                                    else $max = 3;
                                    $i = 0;
                                    foreach ($data['quangcao'] as $quangcao) {
                                        echo '<img src="'.$quangcao->UrlAdsPics.'">';
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
 </section>
<script src="<?php echo URLROOT ?>/public/user/js/getdata.js"></script>