$(document).ready(function(){
    function load(){

            phantrang(1);

    }
    function phantrang(page){

                $.ajax({

                    type:"get",

                    url:"phantrang.php",

                    data:{page:page},

                    success:function(data){

                        $("#paging").html(data);

                        // alert(data);

                    }

                });
                return false;

    }
    load();
    // $("#goNew").live("click",function(){

    //    var page=$(this).attr('page');
    //     page = 2;
    //     phantrang(page);

    //    alert(page);
 
    // });
});
function load_next($page){

    phantrang($page);
}
function load_priv($page){

    phantrang($page);
}
function phantrang(page){

    $.ajax({

        type:"get",

        url:"phantrang.php",

        data:{page:page},

        success:function(data){

            $("#paging").html(data);

            // alert(data);

        }

    });
    return false;

}
