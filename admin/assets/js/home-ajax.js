 $(document).ready(function(){ 
load_home_postcat();
init_editor(".editor");
function load_home_postcat(){
var action = 'load_home_postcat';
var homepost_cat;
     $.ajax({
                url: '../queries/home-pagequeries.php',
                type: 'post',
                data:{action:action},
                datatype:"json",
                success: function (data) {
            homepost_cat =   JSON.parse(data);
               
              // 
              // for (var i =0; i<= data.length; i++) {
              //  alert(homepost_cat[i]);
              $('#posts_by_cat1title').html('<h3 class="title" >'+homepost_cat[0]+'</h3><a class="more" href="scontent.php?search&label='+homepost_cat[0]+'">Show more</a>');
              $('#posts_by_cat2title').html('<h3 class="title" >'+homepost_cat[1]+'</h3><a class="more" href="scontent.php?search&label='+homepost_cat[1]+'">Show more</a>');
              $('#posts_by_cat3title').html('<h3 class="title" >'+homepost_cat[2]+'</h3><a class="more" href="scontent.php?search&label='+homepost_cat[2]+'">Show more</a>');
              $('#posts_by_cat4title').html('<h3 class="title" >'+homepost_cat[3]+'</h3><a class="more" href="/scontent.php?search&label='+homepost_cat[3]+'">Show more</a>');
              $('#posts_by_cat5title').html('<h3 class="title" >'+homepost_cat[4]+'</h3><a class="more" href="scontent.php?search&label='+homepost_cat[4]+'">Show more</a>');
              $('#posts_by_cat6title').html('<h3 class="title" >'+homepost_cat[5]+'</h3><a class="more" href="scontent.php?search&label='+homepost_cat[5]+'">Show more</a>');
              $('#posts_by_cat7title').html('<h3 class="title" >'+homepost_cat[6]+'</h3><a class="more" href="scontent.php?search&label='+homepost_cat[6]+'">Show more</a>');
              $('#posts_by_cat8title').html('<h3 class="title" >'+homepost_cat[7]+'</h3><a class="more" href="scontent.php?search&label='+homepost_cat[7]+'">Show more</a>');
             // }
             }
           });

}
   
var pagenum;
 fetch_searchedposts();
function fetch_searchedposts(pagenum=""){
var action = 'fetch_searchedposts';
var sdata = $('#scontent').data('search');
var stag = $('#scontent').data('stag');
// alert(stag);
// alert(sdata);
 $.ajax({
        url:'../queries/search-pagequeries.php',
        method:"POST",
        data:{action:action, sdata:sdata,stag:stag, pagenum:pagenum},
          beforeSend: function(){
      $('#loader-icon2').show();},
       complete: function(){
      $('#loader-icon2').hide();
      },
        success:function(data){
      // alert(data);
           $('.searchpage-posts').html(data);
          
         }
     });
}
$(document).on('click', '.pagination', function(){
       var pagenum =$(this).data('pagenum');
        var tpages =$(this).data('tpages');
         if(pagenum <= tpages){
          fetch_searchedposts(pagenum);
        }
      });
$(document).on('click', '.pager-nav', function(){
       var pager = $(this).data('pager');
        var tpages = $(this).data('tpages');
        var pagerpage= $(this).data('pagerpage');
          var pagenum = Math.ceil(pagerpage * 10);
          if(pagerpage <= tpages){
          fetch_searchedposts(pagenum);
              
          }
          // var prev = $(this).data('prev');
        //  alert(pager+" "+tpages+" "+pagerpage);
        
      });
      $(document).on('click', '.innerpager-nav', function(){
       var page = $(this).data('page');
        var tpages = $(this).data('tpages');
        var movepage= $(this).data('movepage');
          var pagenum = movepage;
          if(page <= tpages){
          fetch_searchedposts(pagenum);
          }
      });
// fetch_pager();
      // function fetch_pager(pager=null,pagenum,tpages){
      //     var action = 'fetch_pager';
      //     $.ajax({
      //         url:'../queries/search-pagequeries.php',
      //         method: 'post',
      //         data:{action:action,pager:pager,pagenum:pagenum,tpages:tpages},
      //         success:function(data){
      //             alert(data);
      //             $('.pager-pagination').html(data);
      //         }
      //     });
      // }
 fetch_featuredposts();
function fetch_featuredposts(){
var action = 'fetch_featuredposts';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
          
        $('#featuredposts').html(data);
         }
     });
} 


 fetch_popularposts();
function fetch_popularposts(){
var action = 'fetch_popularposts';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
          // 
        $('#popularposts').html(data);
         }
     });
} 
setInterval(function(){
  // fetch_recentposts();
  fetch_popularposts();
  fetch_recentcomments();
  fetch_mobileapps();
  fetch_navnews();
  // fetch_breaking_news();

  }, 5000);

 fetch_recentposts();
function fetch_recentposts(){
var action = 'fetch_recentposts';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#recentposts').html(data);
         }
     });
} 
 fetch_recentcomments();
function fetch_recentcomments(){
var action = 'fetch_recentcomments';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#recentcomments').html(data);
         }
     });
} 


 fetch_posts_by_cat1();
function fetch_posts_by_cat1(){
var action = 'fetch_posts_by_cat1';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#posts_by_cat1').html(data);
        
         }
     });
} 


 fetch_posts_by_cat2();
function fetch_posts_by_cat2(){
var action = 'fetch_posts_by_cat2';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
        success:function(data){
        $('#posts_by_cat2').html(data);
  $('.owl-carousel').owlCarousel({
    items : 3,
    itemsDesktop : [1199,4],
    itemsDesktopSmall : [980,3],
    itemsTablet: [768,3],
    itemsMobile : [479,1],
    navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
    // stagePadding: 50,
    loop:true,
    margin:5,
    nav:true,
    center: true,
    //Autoplay
    autoPlay : true,
     //Auto height
    autoHeight : true
  });
         }
     });
} 
fetch_posts_by_cat3();
function fetch_posts_by_cat3(){
var action = 'fetch_posts_by_cat3';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#posts_by_cat3').html(data);
        
         }
     });
}  fetch_posts_by_cat4();
function fetch_posts_by_cat4(){
var action = 'fetch_posts_by_cat4';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#posts_by_cat4').html(data);
        
         }
     });
}  fetch_posts_by_cat5();
function fetch_posts_by_cat5(){
var action = 'fetch_posts_by_cat5';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#posts_by_cat5').html(data);
        
         }
     });
}  fetch_posts_by_cat6();
function fetch_posts_by_cat6(){
var action = 'fetch_posts_by_cat6';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#posts_by_cat6').html(data);
        // alert(data);
         }
     });
}
fetch_posts_by_cat7();
function fetch_posts_by_cat7(){
var action = 'fetch_posts_by_cat7';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#posts_by_cat7').html(data);
        //alert(data);
         }
     });
} 

 fetch_posts_by_cat8();
function fetch_posts_by_cat8(){
var action = 'fetch_posts_by_cat8';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#posts_by_cat8').html(data);
        
         }
     });
} 

 fetch_footer_posts();
function fetch_footer_posts(){
var action = 'fetch_footer_posts';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#footer-popularposts').html(data);
        //alert(data);
         }
     });
} 
 fetch_home_mega_posts();
function fetch_home_mega_posts(){
var action = 'fetch_home_mega_posts';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#home_mega_posts').html(data);
        
         }
     });
} 

 fetch_recentgadgets();
function fetch_recentgadgets(){
var action = 'fetch_recentgadgets';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#recentgadgets').html(data);
        //alert(data);
         }
     });
} 
 fetch_mobileapps();
function fetch_mobileapps(){
var action = 'fetch_mobileapps';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#mobileapps').html(data);
        
         }
     });
} 
 fetch_relatedposts();
function fetch_relatedposts(){
var action = 'fetch_relatedposts';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        $('#relatedposts').html(data);
        // alert(data);
         }
     });
} 



 fetch_homepost();
function fetch_homepost(){
var action = 'fetch_homepost';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
          beforeSend: function(){
      $('.loader-icon').show();},
       complete: function(){
      $('.loader-icon').hide();
      },
        success:function(data){
        // alert(data);
           $('.homepage-posts').html(data);        
         }
     });
} 
 

 fetch_navnews();
function fetch_navnews(){
var action = 'fetch_navnews';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
        success:function(data){
        $('#news').html(data);
       
        // alert(data);
         }
     });
} 
var menu;
$('.mega-postsmenu').hover(function () {

menu = $(this).data('mega_menu');
// alert(menu);
fetch_megatab_posts(menu);
},function () {
$('mega-tab').hover(function(){
    
},function(){fetch_megatab_posts("");});
});
 fetch_megatab_posts();
function fetch_megatab_posts(menu=""){
var action = 'fetch_megatab_posts';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action,menu:menu},
        success:function(data){
        $('#megatab-posts').html(data);
        
         }
     });
} 
 var  search
 $(document).on('submit','#navsearchform', function(event){ 
search =$('.search-input').val();
 if(search!= ""){
 
                }else{
                event.preventDefault();      
                }
            });
 $(document).on('submit','#footer-search', function(event){
     
  search =$('#fsearch-input').val();
 if(search!= ""){
 
                }else{
                  event.preventDefault();  
                }
            });
 fetch_breaking_news();
function fetch_breaking_news(){
var action = 'fetch_breaking_news';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action},
        success:function(data){
        // $('#breakingnews-posts').html(data);
// alert(data);

} });
}

$('.breaking-news').owlCarousel({
  loop:true,
  margin:0,
  navText:['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        loop:true,
          autoplay:true,
          mouseDrag:true,
          pullDrag:true,
          touchDrag:true,
          autoplayTimeout:5000,
          autoplayHoverPause:false,
  responsiveClass:true,
  responsive:{
      0:{
          items:1,
          nav:true,
          autoHeight:true
      },
      400:{
          items:1,
          nav:true,
        autoHeight:true
      },
      600:{
          items:1,
          nav:true,
        autoHeight:true
      },
      1000:{
          items:1,
          nav:true,
          
        autoHeight:true
      }
  }

});


// new Splide('.splide', {
//   perPage: 3,
//   autoplay: true,
//   rewind: true,
//   marginBottom: '2em',
  // pagination  : false,
  // classes:{
  // arrows:'splide__arrows owl-nav',
  // arrow:'splide__arrow ',
  // prev:'splide__arrow--prev owl-prev',
  // next:'splide__arrow--next owl-next',},
//   autoplay:true,
//   breakpoints: {
//     '640': {
//       perPage: 2,
//       gap    : '1rem',
//     },
//     '480': {
//       perPage: 1,
//       gap    : '1rem',
//     },
//   }
// } ).mount();
update_last_activity();

function update_last_activity(){
    var action = 'update_last_activity';
    $.ajax({
        url:'../admin/admin-queries/userqueries.php',
        method:'POST',
        data:{action:action},
        success:function(data){

        }
    });
}
visitor();

function visitor(){
    var action = 'visitor';
    $.ajax({
        url:'../queries/visitor-queries.php',
        method:'POST',
        data:{action:action},
        success:function(data){
          // alert(data);
        }
    });
}
var menu;
 fetch_megatab_posts();
function fetch_megatab_posts(menu=""){
var action = 'fetch_megatab_posts';
 $.ajax({
        url:'../queries/home-pagequeries.php',
        method:"POST",
        data:{action:action,menu:menu},
        success:function(data){
        $('#megatab-posts').html(data);
        
         }
     });
} 

$('.mega-postsmenu').hover(function () {
$(this).parent().addClass('active');
menu = $(this).data('mega_menu');
// alert(menu);
fetch_megatab_posts(menu);
}
,function () {
 $(this).parent().removeClass('active');  
fetch_megatab_posts("");
}
);


});

//################################################################### END HOMEPAGE QUERIES ##############################################################


//##################################### START COMMENT QUERIES ###########################################################################
$(document).ready(function(){
     function deletePasswordResetToken (){
   var action = 'deletePasswordResetToken';
    $.ajax({
        url:'../queries/passwordToken-reset.php',
        method:'POST',
        data:{action:action},
        success:function(data){
        //   alert(data);
        }
    }); 
}


    setInterval(function(){
        deletePasswordResetToken();
    },3000);
   

$(document).on('submit','#reply-comment-form', function(event){
    event.preventDefault();
   user_id =$('.comment-reply').data('user_id');
   comment_id =$('.comment-reply').attr('id');
     var reply = tinyMCE.activeEditor.getContent();
   if(user_id != ""){
                     var action = 'submit-reply';
                    if(reply == ""){
                     heading ="Alert!!";
                text = "Submitting blank form. Please type your reply...";
                icon = "warning";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
                    }else{
                     // AJAX request
                                $.ajax({
                                    url: '../queries/comment-queries.php',
                                    type: 'post',
                                    data:{action:action, user_id:user_id, comment_id:comment_id, reply:reply},
                                    success: function (data) {
                                        //
                      tinyMCE.activeEditor.setContent("");

                                      fetch_comments();
                                      $("#reply-comment-form")[0].reset();
                   const selector='.editor';
let uploader = '../queries/upload.php';
init_editor(selector,uploader,'../');


                                        }
                                });
                    }

        }else{
                      var reply = tinyMCE.activeEditor.getContent();
                      var username = $('#replier_username').val();
                      var email = $('#replier_email').val();
                     var action = 'submit-reply';
                     if(username == "" && email == "" && reply == ""){

                   heading ="Alert!!";
                text = "Submitting blank form. Please type your comment...";
                icon = "warning";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
}else if(username == ""){
     heading ="Alert!";
                text = "Please enter your name.";
                icon = "warning";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
}else if(email == ""){
     heading ="Alert!";
                text = "Please type your email...";
                icon = "warning";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
}else if(reply == ""){
     heading ="Alert!";
                text = "Please type your reply...";
                icon = "warning";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
                    }else {
                     // AJAX request
                                $.ajax({
                                    url: '../queries/comment-queries.php',
                                    type: 'post',
                                    data:{action:action, user_id:user_id, comment_id:comment_id, reply:reply, username:username, email:email},
                                    success: function (data) {
                        $('#replier_username').val("");
                               $('#replier_email').val("");

                      tinyMCE.activeEditor.setContent("");
                                      fetch_comments();
                                    //  $("#reply-comment-form")[0].reset();

                    const selector='.editor';
let uploader = '../queries/upload.php';
init_editor(selector,uploader,'../');

                                        }
                                });
        }

             }

});



 $(document).on('submit','#post_comment', function(event){
    event.preventDefault();
 var  post_id =$('.submit_comment').data('post_id');
   var user_id =$('.submit_comment').data('user_id');
   // comment_id =$(this).data('comment_id');
    var comment = tinyMCE.activeEditor.getContent();
   // alert(postdata);
 if(user_id != ""){
 var action = 'submit-comment';
if(comment == ""){
    heading ="Alert!!";
                text = "Submitting blank form. Please type your comment...";
                icon = "warning";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
}else{
 // AJAX request
            $.ajax({
                url: '../queries/comment-queries.php',
                type: 'post',
                data:{action:action, user_id:user_id, post_id:post_id, comment:comment},
                success: function (data) {
                                          tinyMCE.activeEditor.setContent("");
      tinyMCE.activeEditor.setContent("");

             response = $('.modal').text("Comment received awaiting approval..");
fetch_comments();
                          response.modal({
                              fadeDuration: 1000,
                      fadeDelay: 0.50
                     }).delay(2000).fadeOut(1000, function(){
 $('.icon-remove').trigger('click');});

                 
$("#post_comment")[0].reset();

                    }
            });
}

    }else{
  var comment = tinyMCE.activeEditor.getContent();
  var username = $('#username').val();
  var email = $('#email').val();
 var action = 'submit-comment';
 if(username == "" && email == "" && comment == ""){
 
 heading ="Alert!!";
                text = "Submitting blank form. Please type your comment...";
                icon = "warning";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
}else if(username == ""){
     heading ="Alert!";
                text = "Please enter your name.";
                icon = "warning";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
}else if(email == ""){
     heading ="Alert!";
                text = "Please type your email...";
                icon = "warning";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
}else if(comment == ""){
     heading ="Alert!";
                text = "Please type your comment...";
                icon = "warning";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
}else {
 // AJAX request
            $.ajax({
                url: '../queries/comment-queries.php',
                type: 'post',
                data:{action:action, user_id:user_id, post_id:post_id, comment:comment, username:username, email:email},
                success: function (data) {
                     $('#username').val("");
            $('#email').val("");
        tinyMCE.activeEditor.setContent("");
                fetch_comments();
                     response = $('.modal').text("Comment received awaiting approval..");
                          response.modal({
                              fadeDuration: 1000,
                      fadeDelay: 0.50
                     }).delay(2000).fadeOut(1000, function(){
 $('.icon-remove').trigger('click');});
                 
      $("#post_comment")[0].reset();

                    }
            });
        }

             }
        });


   $(document).on('click','.reply-reply',function (){

   user_id =$(this).data('user_id');
var to_user =$(this).data('to_user');
comment_id = $(this).attr('id');
$('.btn'+comment_id).trigger('click');
$('#reply'+comment_id).val('<strong>@'+to_user+'</strong></br>--&nbsp;&nbsp;');
 });


 fetch_comments();
function fetch_comments(pagenum){
var action = 'load_comments';
 $.ajax({
        url:'../queries/comment-queries.php',
        method:"POST",
        data:{action:action, pagenum:pagenum},
      //     beforeSend: function(){
      // $('.loader-icon').show();},
      //  complete: function(){
      // $('.loader-icon').hide();
      // },
        success:function(data){
           $('.pagenum').remove();
$('.total-page').remove();
// alert(data);
           if(data != null){
            $('#top-ra').html(data);
          }else if(empty(data)){
        $('#top-ra').html('<span class="alert alert-primary"> No More comments..</span>');}
    var id = $('.comment-replies').attr('id');
    AddReadMore();
//       $('.comment-replies').slimScroll({
//   start: 'bottom',
//   alwaysVisible: false
// });
        $("img").lightGallery();

  // scrollToBottom(id);
            }
  });

}

function fetchmore_comments(pagenum){
var action = 'load_comments';
 $.ajax({
        url:'../queries/comment-queries.php',
        method:"POST",
        data:{action:action, pagenum:pagenum},
      //     beforeSend: function(){
      // $('.loader-icon').show();},
      //  complete: function(){
      // $('.loader-icon').hide();
      // },
        success:function(data){
           $('.pagenum').remove();
$('.total-page').remove();
// alert(data);
           if(data != null){
            $('#top-ra').prepend(data);
          }else if(empty(data)){
        $('#top-ra').prepend('<span class="alert alert-primary"> No More comments..</span>');}
    var id = $('.comment-replies').attr('id');
    AddReadMore();
//       $('.comment-replies').slimScroll({
//   start: 'bottom',
//   alwaysVisible: false
// });
//         $("img").lightGallery();

  // scrollToBottom(id);
            }
  });

}
      
                                  function AddReadMore() {
                                              //This limit you can set after how much characters you want to show Read More.
                                              var carLmt = 350;
                                              // Text to show when text is collapsed
                                              var readMoreTxt = " ... Read More";
                                              // Text to show when text is expanded
                                              var readLessTxt = " Read Less";


                                              //Traverse all selectors with this class and manupulate HTML part to show Read More
                                              $(".addReadMore").each(function() {
                                                  if ($(this).find(".firstSec").length)
                                                      return;

                                                  var allstr = $(this).text();
                                                  if (allstr.length > carLmt) {
                                                      var firstSet = allstr.substring(0, carLmt);
                                                      var secdHalf = allstr.substring(carLmt, allstr.length);
                                                      var strtoadd = firstSet + "<span class='moretext'>" + secdHalf + "</span><div class='readoptions'><span class='moreless-button' style='color:blue; cursor:pointer;'>" + readMoreTxt + "</span></div>";
                                                      $(this).html(strtoadd);
                                                  }

                                              });
                                              //Read More and Read Less Click Event binding
                                              $(document).on("click", ".moreless-button", function() {
                                                  $(".moretext").slideToggle();
                                                  if($('.moreless-button').text() == " ... Read More"){
                                                    $(this).text(readLessTxt);
                                                  }else{
                                                    $(this).text(readMoreTxt);
                                                  }
                                                });
                                          }

$(".lightgallery").lightGallery();

function scrollToBottom(id){
 var    div = $('#'+id);

 // div[0].scrollTop =div[0].scrollHeight - div[0].clientHeight;
 // div.scrollTop(div.prop("scrollHeight"));
div.animate({
scrollTop :div[0].scrollHeight - div[0].clientHeight
 },500);

}

$(".lightgallery").lightGallery();
 $(document).on('click','.loadmorecomments', function(){

  if($('.pagenum').val() <= $('.total-page').val()) {
        var pagenum = parseInt($('.pagenum').val()) + 1;
        fetchmore_comments(pagenum);
       }
 });});
$(document).ready(function(){
 var post_id;
 var user_id;
 var reply_id;
 var comment_id;
 $(document).on('click', '.comment-reply', function(){
  comment_id = $(this).attr('id');
  user_id = $(this).data('user_id');
  post_id = $(this).attr('comment_id');
  // alert(comment_id);
if(user_id != ""){
  $('#reply-form'+comment_id).slideToggle('slow');
const selector='.editor';
let uploader = '../queries/upload.php';
init_editor(selector,uploader,'../');
 }else{



  $('#reply-form2'+comment_id).slideToggle('slow');
const selector='.editor';
let uploader = '../queries/upload.php';
init_editor(selector,uploader,'../');
}
 });

// });
// $(document).ready(function(){


  $(document).on('click','.post_comment', function(){
        post_id =$(this).attr('id');
        user_id =$(this).data('user_id');
     if (user_id != ""){
         $('#comment_form'+post_id).slideToggle('slow');
const selector='.editor';
let uploader = '../queries/upload.php';
init_editor(selector,uploader,'../');

     }else{
            $('#comment_form2'+post_id).slideToggle('slow');
 const selector='.editor';
let uploader = '../queries/upload.php';
init_editor(selector,uploader,'../');

              }
});


const selector='.editor';
let uploader = '../queries/upload.php';
init_editor(selector,uploader,'../');


});

$(document).ready(function(){

$(document).on('click','#accept-terms', function(){
if(this.checked){
this.checked = true;
}else{
this.checked = false;
}
});
 $(document).on('submit','#signup-form', function(event){
var password = $('#password').val();
var password2 =$('#cfpassword').val();
var terms = $('#accept-terms').prop('checked');
if(password == password2){
if(password.length>6){

  if(terms == true){

  }else{
    event.preventDefault();
  alert('ACCEPT T&C: You must read and accept our Terms and Policy!');
  }
}else{
  event.preventDefault();
  alert('PASSWORDS TOO WEAK: Password must be atleast six character long!');
}
}else{ event.preventDefault();
  alert('PASSWORDS MIS-MATCH: Check your password!');
}

});

});

  function init_editor(selector,uploader=null,path=null){
        var editor =    tinymce.init({
          selector:selector,
          theme:"silver",
    plugins:["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker ",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "save table contexmenu directionality emoticons template imagetools paste textcolor"],
    content_css:"css/content.css",
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
    styleformats:[
    { title: 'Bold text', inline: 'b'},
    {title: 'Red text', inline: 'span', styles:{color: '#ff0000'}},
    {title: 'Red header', block: 'h1', styles:{color: '#ff0000'}},
    {title: 'Example 1', inline: 'span', classes: 'example1'},
    {title: 'Example 2', inline: 'span', classes: 'example2'},
    {title: 'Table styles'},
    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}],
      images_upload_credentials: true,
      images_upload_url:uploader,
      images_upload_base_path: path,

                      });
        return editor;
  }
  
  
    function init_sweetAlert(heading, text, position='top-right',icon,hideAfter=3500) {
      $.toast({
                                            heading:heading,
                                            text: text,
                                            position: position,
                                            loaderBg:'#ff6849',
                                            icon: icon,
                                            hideAfter: hideAfter,
                                            stack: 6
                                          });
    // body...
  }

  