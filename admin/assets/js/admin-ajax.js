 $(document).ready(function() {

   $(document).on('submit','#add-category', function(event){
    event.preventDefault();
var catname = $('#cat-title').val();
var action = 'create-category';
   $.ajax({
                url: 'admin-queries/categoryqueries.php',
                type: 'post',
                // dataType: 'json',
                // enctype:"multipart/form-data",
                data:{catname:catname,action:action},
                // contentType: false,
                // processData: false,
                success: function (data) {
              $('#add-category')[0].reset();
              Swal.fire({
                  position: "bottom-end",
                  icon: "success",
                  title: "Your changes  has been saved",
                  showConfirmButton: false,
                  timer: 1500,
                });
                            
                loadCategory();
              }
           });
});


 $(document).on('submit','#edit-category', function(event){
    event.preventDefault();
var catname = $('#newcat-title').val();
var action = 'update-category';
var cat_id = $('#update-catid').val();
   $.ajax({
                url: 'admin-queries/categoryqueries.php',
                type: 'post',
                // dataType: 'json',
                // enctype:"multipart/form-data",
                data:{catname:catname,action:action,cat_id:cat_id},
                // contentType: false,
                // processData: false,
                success: function (data) {
              $('#edit-category')[0].reset();
                loadCategory();
              }
           });
});
  $(document).on('submit','#create-user', function(event){
var password = $('#password').val();
var password2 =$('#password2').val();
 // alert(password); alert(password2);
if(password == password2){

}else{ event.preventDefault();
                heading ="Alert!!!";
                text = "PASSWORDS MIS-MATCH: Check your password!!!";
                icon = "error";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500);}

});
    $(document).on('submit','#pfsetting1-form', function(event){
var password = $('#password').val();
var password2 =$('#confirmpassword').val();
 // alert(password); alert(password2);
if(password == password2){

}else{ event.preventDefault();
                heading ="Alert!!!";
                text = "PASSWORDS MIS-MATCH: Check your password!!!";
                icon = "error";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500);
}

});
loadCategory();

		$(document).on('click','.edit-category', function(){
		var cat_id = $(this).data('cat_id');
		var action =  $(this).data('action');
					  $.ajax({
                url: 'admin-queries/categoryqueries.php',
                type: 'post',
                // dataType: 'json',
                // enctype:"multipart/form-data",
                data:{action:action, cat_id:cat_id},
                // contentType: false,
                // processData: false,
                success: function (data) {
                    // alert(data);
                    $('.category-edit').html(data);


              }
           });
	});


$(document).on('click','.delete-category', function(){
  var id = $(this).data('cat_id');
  var action =  $(this).data('action');
  var url = 'admin-queries/categoryqueries.php';
                  var callbackAction = 'loadCategory';
                  var message = 'Category has been deleted.'
  delete_btn(action,id,url,callbackAction,message);
	
		});
 get_allpost();


 $(document).on('click','.remove-img', function(){
  var imgName = $(this).data('imgname');
  var action =  $(this).data('action');
  var tb_column =  $(this).data('tb_column');
  var url = 'admin-queries/generalsetting-queries.php';
                  var callbackAction = action;
                  var message = 'File has been deleted.'
  delete_img(imgName,url,callbackAction,message,tb_column);
	
		});



$(document).on('click','.delete-post', function(){
		var id = $(this).data('post_id');
		var action =  $(this).data('action');
    var url= 'admin-queries/postqueries.php';
                  var callbackAction = 'get_allpost';
                  var message = 'Post has been deleted.'
  delete_btn(action,id,url,callbackAction,message);
  

		});


$(document).on('click','.delete-post-p', function(){
    var id = $(this).data('post_id');
    var action =  $(this).data('action');
    var url= 'admin-queries/recycle-binqueries.php';
                  var callbackAction = 'get_allrecycledPosts';
                  var message = 'Post has been permanently deleted.'
  delete_btn(action,id,url,callbackAction,message);
  

    });

$(document).on('click','.approve-comment', function(){
    var comment_id = $(this).data('comment_id');
    var action =  $(this).data('action');
        $.ajax({
                url: 'admin-queries/commentqueries.php',
                type: 'post',
                data:{action:action, comment_id:comment_id},
                success: function (data) {
              // loadPost();
               heading ="ADMIN ACTION";
                text = "Comment successfully Approved.";
                icon = "success";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500);
              }
           });

    });

$(document).on('click','.unapprove-comment', function(){
    var comment_id = $(this).data('comment_id');
    var action =  $(this).data('action');
        $.ajax({
                url: 'admin-queries/commentqueries.php',
                type: 'post',
                data:{action:action, comment_id:comment_id},
                success: function (data) {
              // loadPost();
                heading ="ADMIN ACTION";
                text = "Comment successfully Unapproved.";
                icon = "success";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
              }
           });

    });
$(document).on('click','.delete-comment', function(){
		var id = $(this).data('comment_id');
		var action =  $(this).data('action');
    var url= 'admin-queries/commentqueries.php';
    var callbackAction = 'get_allComments';
    var message = 'Comment deleted!!!.'
  delete_btn(action,id,url,callbackAction,message);

		});

$(document).on('click','.delete-user', function(){
    var id = $(this).data('user_id');
    var action =  $(this).data('action');
    var url= 'admin-queries/userqueries.php';
                  var callbackAction = 'get_allusers';
                  var message = 'User account has been deleted.'
  delete_btn(action,id,url,callbackAction,message);

    });

$(document).on('click','.delete-user-p', function(){
    var id = $(this).data('user_id');
    var action =  $(this).data('action');
    var url= 'admin-queries/recycle-binqueries.php';
                  var callbackAction = 'get_allrecycledUsers';
                  var message = 'User account has been permanently deleted.'
  delete_btn(action,id,url,callbackAction,message);

    });

$(document).on('click','.restore-post', function(){
		var id = $(this).data('post_id');
		var action =  $(this).data('action');
			
              var id = $(this).data('user_id');
              var action =  $(this).data('action');
              var url= 'admin-queries/recycle-binqueries.php';
                            var callbackAction = 'get_allrecycledPosts';
                            var message = 'Post successfully restored.';
            restore_btn(action,id,url,callbackAction,message);
          
		});

 $('#username').on('keyup', function(event){
            var username = $('#username').val();
             var action ='checkUsername';
            $.ajax({
                url: 'admin-queries/profile-queries.php',
                method: "POST",
                data:{username:username, action:action},
                success:function(data){
                $('#response').html(data);
                }
            });
        });


$(document).on('click','.restore-user', function(){
    var id = $(this).data('user_id');
    var action =  $(this).data('action');
  
          
           var url= 'admin-queries/recycle-binqueries.php';
                         var callbackAction = 'get_allrecycledUsers';
                         var message = 'User successfully restored.';
         restore_btn(action,id,url,callbackAction,message);
       

    });
// $(document).on('click','.restore-comment', function(){
// 		var comment_id = $(this).data('comment_id');
// 		var action =  $(this).data('action');
// 			  $.ajax({
//                 url: 'admin-queries/recycle-binqueries.php',
//                 type: 'post',
//                 // dataType: 'json',
//                 enctype:"multipart/form-data",
//                 data:{action:action, comment_id:comment_id},
//                 // contentType: false,
//                 // processData: false,
//                 success: function (data) {
//               // alert(data);

//               }
//            });

// 		});
$(document).on('click','.restore-cat', function(){
		var id = $(this).data('cat_id');
		var action =  $(this).data('action');
		
           var url= 'admin-queries/recycle-binqueries.php';
           var callbackAction = 'get_allrecycledCategory';
           var message = 'Category successfully restored.';
restore_btn(action,id,url,callbackAction,message);


		});

$(document).on('submit', '#postdisTable', function(event) {
  event.preventDefault();
 bulk_options = $('#bulk-options').val();
 selectid =  $('.checkboxes:checked').map(function(){
   return $(this).val();
  }).get();
  selectid=JSON.stringify(selectid);
  // alert(selectid);
 var action = 'postsBulkOperation';
 if(bulk_options !== "" && selectid !== ""){
  $.ajax({
    url: '../queries/table-queries.php',
    method: 'post',
    data:{action:action,bulk_options:bulk_options,selectid:selectid},
    success:function(data){
      // alert(data);
    get_allpost();
      $('#bulk-options').val('');
      $('#selectAll').prop('checked',false);
    }
  });
}
});

$(document).on('submit', '#usersdisTable', function(event) {
  event.preventDefault();
 bulk_options = $('#bulk-options').val();
 selectid =  $('.checkboxes:checked').map(function(){
   return $(this).val();
  }).get();
  selectid=JSON.stringify(selectid);
  // alert(selectid);
 var action = 'UsersBulkOperation';
 if(bulk_options !== "" && selectid !== ""){
  $.ajax({
    url: '../queries/table-queries.php',
    method: 'post',
    data:{action:action,bulk_options:bulk_options,selectid:selectid},
    success:function(data){
      // alert(data);
    get_allusers();
      $('#bulk-options').val('');
      $('#selectAll').prop('checked',false);
    }
  });
}
});

$(document).on('submit', '#commentdisTable', function(event) {
  event.preventDefault();
 bulk_options = $('#bulk-options').val();
 selectid =  $('.checkboxes:checked').map(function(){
   return $(this).val();
  }).get();
  selectid=JSON.stringify(selectid);
  // alert(selectid);
 var action = 'commentsBulkOperation';
 if(bulk_options !== "" && selectid !== ""){
  $.ajax({
    url: '../queries/table-queries.php',
    method: 'post',
    data:{action:action,bulk_options:bulk_options,selectid:selectid},
    success:function(data){
      // alert(data);
    get_allComments();
      $('#bulk-options').val('');
      $('#selectAll').prop('checked',false);
    }
  });
}
});

   $(document).on('click','#selectAll', function(){
                            if(this.checked){
                              $('.checkboxes').each(function(){
                            this.checked = true;
                              });
                            }else{
                              $('.checkboxes').each(function(){
                            this.checked = false;
                              });
                            }
                            });
$(document).on('submit', '#deletedUserdisTable', function(event) {
  event.preventDefault();
 bulk_options = $('#bulk-options').val();
 selectid =  $('.checkboxes:checked').map(function(){
   return $(this).val();
  }).get();
  selectid=JSON.stringify(selectid);
  // alert(selectid);
 var action = 'deletedUsersBulkOperation';
 if(bulk_options !== "" && selectid !== ""){
  $.ajax({
    url: '../queries/table-queries.php',
    method: 'post',
    data:{action:action,bulk_options:bulk_options,selectid:selectid},
    success:function(data){
      // alert(data);
    get_allrecycledUsers();
      $('#bulk-options').val('');
      $('#selectAll').prop('checked',false);
    }
  });
}
});

get_allusers();
get_allrecycledUsers();
get_allrecycledPosts();

update_last_activity();
function update_last_activity(){
    var action = 'update_last_activity';
    $.ajax({
        url:'admin-queries/userqueries.php',
        method:'POST',
        data:{action:action},
        success:function(data){
        }
    });
}

  init_editor('.editor','../file-upload2.php','../');
  init_editor('.ads-editor','../file-upload.php','../');


 getUserpic();
    function getUserpic(){
        var action = 'getuserpic';
         $.ajax({
            url:'admin-queries/profile-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){
              // alert(data);
            $('.profpic').remove();
            $('.user-profpicture').prepend(data);
            }
        });
    }
 getUserpic2();
    function getUserpic2(){
        var action = 'getuserpic2';
         $.ajax({
            url:'admin-queries/profile-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){
              // alert(data);
            // $('.profpic').remove();
            $('.user-img2').html(data);
            }
        });
    }

 $('#profpic').on('change', function(event){
  // alert('changed');
            var profilePicture = new FormData();
            profilePicture.append("profpic", document.getElementById('profpic').files[0]);
           var action = 'upload_profpic';
            profilePicture.append("action", action);
            // alert(profilePicture.get('profpic'));
             if(profilePicture.get('profpic') != ""){
          $.ajax({
                url:'admin-queries/profile-queries.php',
                method:"POST",
                enctype:"multipart/form-data",
                data:profilePicture,
                contentType: false,
                processData: false,
                success:function(data){
                  // alert(data);
                 try{
                   data = JSON.parse(data);
                  // alert(data);
                  for (var i = 0; i < data[1].length; i++) {
                    // data[i]
                     if(data[0][i] == 'Error'){
                     $.toast({
                        heading: 'Sorry Profile picture was not uploaded ',
                        text: data[1][i],
                        position: 'top-right',
                        loaderBg:'#ff6849',
                        icon: 'error',
                        hideAfter:false,
                        stack: 6
                      });  }else{

                heading ="PROFILE PICTURE UPDATE";
                text = "User Picture successfully uploaded/Changed.";
                icon = "success";
                init_sweetAlert(heading, text, position='top-right',icon,hideAfter=3500);
                 getUserpic();
                getUserpic2();
                     }
                     init_sweetAlert(heading, text, position='top-right',icon,hideAfter=3500);
                 getUserpic();
                getUserpic2();
                                  }
                      }catch (e){

                         console.log(e.message);          }
   setTimeout(function(){
        location.reload();
    },500);



                  }
             });
}
        });


    $('#favicon').on('change', function(event){
            var favicon = new FormData();
            favicon.append("favicon", document.getElementById('favicon').files[0]);
           var action = 'upload_favicon';
            favicon.append("action", action);
             if(favicon.get('favicon') != ""){
          $.ajax({
                url:'settings/upload.php',
                method:"POST",
                enctype:"multipart/form-data",
                data:favicon,
                contentType: false,
                processData: false,
                success:function(data){
                  // alert(data);
                    try{
                       data = JSON.parse(data);
                      // alert(data);
                      for (var i = 0; i < data[1].length; i++) {
                        // data[i]
                         if(data[0][i] == 'Error'){
                         $.toast({
                            heading: 'Sorry Favicon was not uploaded ',
                            text: data[1][i],
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'error',
                            hideAfter:false,
                            stack: 6
                          });  }else{
                            getfavicon();
                heading ="Site FAVICON";
                text = "Favicon successfully uploaded/Changed.";
                icon = "success";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
                         }
                                          }
                              }catch (e){

                                 console.log(e.message);          }
                                                
//  document.location.reload();
                 
                  }
             });
}
        });
     $('#brand_name_logo').on('change', function(event){
            var brand_name_logo = new FormData();
            brand_name_logo.append("brand_name_logo", document.getElementById('brand_name_logo').files[0]);
           var action = 'upload_brand_name_logo';
            brand_name_logo.append("action", action);
            if(brand_name_logo.get('brand_name_logo') != ""){
          $.ajax({
                url:'settings/upload.php',
                method:"POST",
                enctype:"multipart/form-data",
                data:brand_name_logo,
                contentType: false,
                processData: false,
                success:function(data){
                  try{
                     data = JSON.parse(data);
                    for (var i = 0; i < data[1].length; i++) {
                     // alert(data[0][i]);
                       if(data[0][i] == 'Error'){
                       $.toast({
                          heading: 'Sorry Brandname Logo was not uploaded ',
                          text: data[1][i],
                          position: 'top-right',
                          loaderBg:'#ff6849',
                          icon: 'error',
                          hideAfter:false,
                          stack: 6
                        });  }else{
                           getbrandname_logo();
                heading ="Brand Name LOGO";
                text = "Image successfully uploaded/Changed.";
                icon = "success";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 

                       }
                                        }
                            }catch (e){

                            console.log(e.message);          }
                                            
                                 }
             });
}
        });

     $('#logo').on('change', function(event){
            var logo = new FormData();
            logo.append("logo", document.getElementById('logo').files[0]);
           var action = 'upload_logo';
            logo.append("action", action);
            if(logo.get('logo') != ""){
          $.ajax({
                url:'settings/upload.php',
                method:"POST",
                enctype:"multipart/form-data",
                data:logo,
                contentType: false,
                processData: false,
                success:function(data){
                try{
                       data = JSON.parse(data);
                      // alert(data);
                      for (var i = 0; i < data[1].length; i++) {
                        // data[i]
                         if(data[0][i]  == 'Error'){
                         $.toast({
                                heading: 'Sorry Logo was not uploaded ',
                                text: data[1][i],
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'error',
                                hideAfter:false,
                                stack: 6
                              });  }else{
                                    getlogo();
                heading ="All Done Site LOGO";
                text = "Logo successfully uploaded/Changed.";
                icon = "success";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
                         }
                                              }
                                                }catch (e){

                                                   console.log(e.message);          }
                                           
      //  document.location.reload();
                     
             }
             });
}
        });


 $('#loader-up').on('change', function(event){
            var loader = new FormData();
            loader.append("loader", document.getElementById('loader-up').files[0]);
           var action = 'upload_loader';
            loader.append("action", action);
            if(loader.get('loader') != ""){
          $.ajax({
                url:'settings/upload.php',
                method:"POST",
                enctype:"multipart/form-data",
                data:loader,
                contentType: false,
                processData: false,
                success:function(data){
                try{
                       data = JSON.parse(data);
                      // alert(data);
                      for (var i = 0; i < data[1].length; i++) {
                        // data[i]
                         if(data[0][i]  == 'Error'){
                         $.toast({
                                heading: 'Sorry loader was not uploaded ',
                                text: data[1][i],
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'error',
                                hideAfter:false,
                                stack: 6
                              });  }else{
                                    getloader();
                heading ="All Done Site LOADER";
                text = "Loader successfully uploaded/Changed.";
                icon = "success";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
                         }
                                              }
                                                }catch (e){

                                                   console.log(e.message);          }
                                           
      //  document.location.reload();
                     
             }
             });
}
        });

 $('#background_image-up').on('change', function(event){
            var background_image = new FormData();
            background_image.append("background_image", document.getElementById('background_image-up').files[0]);
           var action = 'upload_bg-image';
            background_image.append("action", action);
            if(background_image.get('background_image') != ""){
          $.ajax({
                url:'settings/upload.php',
                method:"POST",
                enctype:"multipart/form-data",
                data:background_image,
                contentType: false,
                processData: false,
                success:function(data){
                try{
                       data = JSON.parse(data);
                      // alert(data);
                      for (var i = 0; i < data[1].length; i++) {
                        // data[i]
                         if(data[0][i]  == 'Error'){
                         $.toast({
                                heading: 'Sorry background_image was not uploaded ',
                                text: data[1][i],
                                position: 'top-right',
                                background_imageBg:'#ff6849',
                                icon: 'error',
                                hideAfter:false,
                                stack: 6
                              });  }else{
                                    getbackground_image();
                heading ="All Done";
                text = "Background Image successfully uploaded/Changed.";
                icon = "success";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
                         }
                                              }
                                                }catch (e){

                                                   console.log(e.message);          }
                                           
      //  document.location.reload();
                     
             }
             });
}
        });


 $('#lsbackground_image-up').on('change', function(event){
            var background_image = new FormData();
            background_image.append("background_image", document.getElementById('lsbackground_image-up').files[0]);
           var action = 'upload_lsbg-image';
            background_image.append("action", action);
            if(background_image.get('background_image') != ""){
          $.ajax({
                url:'settings/upload.php',
                method:"POST",
                enctype:"multipart/form-data",
                data:background_image,
                contentType: false,
                processData: false,
                success:function(data){
                try{
                       data = JSON.parse(data);
                      // alert(data);
                      for (var i = 0; i < data[1].length; i++) {
                        // data[i]
                         if(data[0][i]  == 'Error'){
                         $.toast({
                                heading: 'Sorry background_image was not uploaded ',
                                text: data[1][i],
                                position: 'top-right',
                                background_imageBg:'#ff6849',
                                icon: 'error',
                                hideAfter:false,
                                stack: 6
                              });  }else{
                                    getbackground_image();
                heading ="All Done";
                text = "Background Image successfully uploaded/Changed.";
                icon = "success";
                init_sweetAlert(heading, text, postion='top-right',icon,hideAfter=3500); 
                         }
                                              }
                                                }catch (e){

                                                   console.log(e.message);          }
                                           
      //  document.location.reload();
                     
             }
             });
}
        });


      getlogo();
    function getlogo(){
        var action = 'getsitelogo';
         $.ajax({
            url:'admin-queries/generalsetting-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){
            $('#sitelogo').html(data);
            }
        });
    }

    getbackground_image();
    function getbackground_image(){
        var action = 'getsite-background_image';
         $.ajax({
            url:'admin-queries/generalsetting-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){
        //  alert(data);
            $('#sitebackground_image').html(data);
            }
        });
    }


    getlsbackground_image();
    function getlsbackground_image(){
        var action = 'getsite-lsbackground_image';
         $.ajax({
            url:'admin-queries/generalsetting-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){
         // alert(data);
            $('#sitelsbackground_image').html(data);
            }
        });
    }

getloader();
    function getloader(){
        var action = 'getsiteloader';
         $.ajax({
            url:'admin-queries/generalsetting-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){
        //  alert(data);
            $('#siteloader').html(data);
            }
        });
    }

     getfavicon();
    function getfavicon(){
        var action = 'getsitefavicon';
         $.ajax({
            url:'admin-queries/generalsetting-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){
            $('#sitefavicon').html(data);
            }
        });
    }
         getbrandname_logo();
    function getbrandname_logo(){
        var action = 'getsitebrandname_logo';
         $.ajax({
            url:'admin-queries/generalsetting-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){
            $('#sitebrandname_logo').html(data);

            }
        });
    }

        $(".img-popup").lightGallery();
        $(".post-thumb").lightGallery({
            selector: ".lightgallery",
            hash: false
        });
$(document).on('click','#selectAll', function(){
if(this.checked){
	$('.checkboxes').each(function(){
this.checked = true;
	});
}else{
	$('.checkboxes').each(function(){
this.checked = false;
	});
}});


var action;
$(document).on('click','#userApproval', function(){

if(this.hasAttribute('checked')){
 action = 'turnOff_userApproval';

  alert('off');
}else{
  action = 'turnOn_userApproval';
  alert('on');
}
  $.ajax({
                url:'settings/users.php',
                method:"POST",
                data:{action:action},
                success:function(data){}

              });

});

$(document).on('click','#postApproval', function(){
if(this.hasAttribute('checked')){
 action = 'turnOff_postApproval';
}else{
  action = 'turnOn_postApproval';
}
  $.ajax({
                url:'settings/users.php',
                method:"POST",
                data:{action:action},
                success:function(data){}

              });

});

$(document).on('click','#commentApproval', function(){
if(this.hasAttribute('checked')){
 action = 'turnOff_commentApproval';
}else{
  action = 'turnOn_commentApproval';
}
  $.ajax({
                url:'settings/users.php',
                method:"POST",
                data:{action:action},
                success:function(data){}

              });

});

$(document).on('click','#smlApproval', function(){
if(this.hasAttribute('checked')){
 action = 'turnOff_smlApproval';
}else{
  action = 'turnOn_smlApproval';
}
  $.ajax({
                url:'settings/users.php',
                method:"POST",
                data:{action:action},
                success:function(data){}

              });

});

$(document).on('click','#fixedMenu', function(){
if(this.hasAttribute('checked')){
 action = 'turnOff_fixedMenu';
}else{
  action = 'turnOn_fixedMenu';
}
  $.ajax({
                url:'settings/general.php',
                method:"POST",
                data:{action:action},
                success:function(data){}

              });

});
$(document).on('click','#fixedSidebar', function(){
if(this.hasAttribute('checked')){
 action = 'turnOff_fixedSidebar';
}else{
  action = 'turnOn_fixedSidebar';
}
  $.ajax({
                url:'settings/general.php',
                method:"POST",
                data:{action:action},
                success:function(data){}

              });

});

$(document).on('click','#slideRTL', function(){
if(this.hasAttribute('checked')){
 action = 'turnOff_slideRTL';
}else{
  action = 'turnOn_slideRTL';
}
  $.ajax({
                url:'settings/general.php',
                method:"POST",
                data:{action:action},
                success:function(data){}

              });

});

$(document).on('click','#show_login_signup', function(){
if(this.hasAttribute('checked')){
 action = 'turnOff_show_login_signup';
}else{
  action = 'turnOn_show_login_signup';
}
  $.ajax({
                url:'settings/general.php',
                method:"POST",
                data:{action:action},
                success:function(data){}

              });

});


setInterval(function(){
     getNotifications();
    getNotificationsCount();
  }, 5000);
    getNotificationsCount();
    function getNotificationsCount(){
        var action = 'getNotificationsCount';
         $.ajax({
            url:'admin-queries/notification-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){
              if(data >0){
          $('#nothd').html(' <i class="fa fa-bell-o floating"></i> <span class=" nav-unread badge badge-warning  badge-pill">'+data+'</span>');
          // $('#notbanner').html('<h3><span class="bold">Notifications</span></h3><span class="notification-label cyan-bgcolor">New '+data+'</span>');
        }else{
            $('#nothd').html('<i class="fa fa-bell-o floating"></i>');
            // $('#notbanner').html('<h3><span class="bold">Notifications</span></h3>');
        }

            }
        });
    }
 getNotifications();
    function getNotifications(){
        var action = 'Notifications';
         $.ajax({
            url:'admin-queries/notification-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){
                $('#notifyuser').html(data+'<div class="dropdown-divider"></div> <a href="javascript:;" class="dropdown-item text-center clear_not">Clear all Notifications</a></div>');
            }
        });
    }
 $(document).on('click', '.clear_not', function(){
        // var user_id = $(this).attr('id');
        var action ='clear_not';
        $.ajax({
            url:'admin-queries/notification-queries.php',
            method:"POST",
            data:{ action:action},
            success:function(data){
                // alert(data);
            getNotificationsCount();
            getNotifications();        }
        });
      });

  });

function get_allpost(){
  var action = 'load_allPost';
  $.ajax({
      url: 'admin-queries/table-queries.php',
      method: 'post',
      data:{action:action},
      success:function(data){
        // alert(data);
        selector = $('#all_postTable');
message ='Published Posts ';
selector.DataTable().clear().destroy();
$('#postTableData').html(data);
dataTables(selector,message);
    }


  });
}


function get_allusers(){
  var action = 'get_allUsers';
  $.ajax({
      url: 'admin-queries/table-queries.php',
      method: 'post',
      data:{action:action},
      success:function(data){
        // alert(data);
        selector = $('#all_usersTable');
message ='Published Posts ';
selector.DataTable().clear().destroy();
$('#usersTableData').html(data);
dataTables(selector,message);
    }


  });
}

function get_allrecycledUsers(){
  var action = 'get_allDeletedUsers';
  $.ajax({
      url: 'admin-queries/table-queries.php',
      method: 'post',
      data:{action:action},
      success:function(data){
        // alert(data);
        selector = $('#all_deletedUsersTable');
message ='Published Posts ';
selector.DataTable().clear().destroy();
$('#deletedUsersTableData').html(data);
dataTables(selector,message);
    }


  });
}

function get_allrecycledPosts(){
  var action = 'get_allDeletedPosts';
  $.ajax({
      url: 'admin-queries/table-queries.php',
      method: 'post',
      data:{action:action},
      success:function(data){
        // alert(data);
        selector = $('#all_deletedPostsTable');
message ='Published Posts ';
selector.DataTable().clear().destroy();
$('#deletedPostTableData').html(data);
dataTables(selector,message);
    }
  })
}
get_allrecycledCategory();
    function get_allrecycledCategory(){
      var action = 'get_allDeletedCategory';
      $.ajax({
          url: 'admin-queries/table-queries.php',
          method: 'post',
          data:{action:action},
          success:function(data){
            // alert(data);
            selector = $('#all_deletedCategoryTable');
    message ='Deleted Category ';
    selector.DataTable().clear().destroy();
    $('#deletedCategoryTableData').html(data);
    dataTables(selector,message);
        }
    

  });
}
function loadCategory(){
	var action = 'loadCategory';
	   $.ajax({
                url: 'admin-queries/categoryqueries.php',
                type: 'post',
                // dataType: 'json',
                // enctype:"multipart/form-data",
                data:{action:action},
                // contentType: false,
                // processData: false,
                success: function (data) {
              $('.catTable').html(data);
              // alert(data);

              }
           });

          }
function get_allComments(){
  var action = 'get_allComments';
  $.ajax({
      url: 'admin-queries/table-queries.php',
      method: 'post',
      data:{action:action},
      success:function(data){
        // alert(data);
        selector = $('#all_commentsTable');
message ='Published Posts ';
selector.DataTable().clear().destroy();
$('#commentTableData').html(data);
dataTables(selector,message);
    }


  });
}
  function dataTables(selector,message){
     selector.DataTable({
      width: 'auto',
      lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
    ],
              dom: 'Bfrtip',
              buttons: [

                  {extend: 'csv',
                messageTop: message,
              exportOptions:{
                columns:':visible',

              }},  {extend: 'excel',
                messageTop: message,
              exportOptions:{
                columns:':visible',

              }},  {extend: 'pdf',
                messageTop: message,
              exportOptions:{
                columns:':visible',

              }}, {extend: 'print',
                messageTop: message,
              exportOptions:{
                columns:':visible',
              

              }},
               {extend: 'colvis',
                messageTop: message,
              className: 'btn-primary btn-circle',
              collectionLayout: 'fixed two-column'
              
            },
  
            ]

     });
  }

  function delete_btn(action,id,url,callbackAction,message=""){
        Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.value) {
        // alert('true');
                            $.ajax({
                                    url: url,
                                    type: 'post',
                                    data:{action:action, id:id},
                                    success: function (data) {
                                      // alert(data);
                      switch(callbackAction){
                    case "loadCategory":
                    loadCategory();
                    break;
                    case "get_allusers":
                      get_allusers();
                    break;
                    case "get_allComments":
                    get_allComments();
                    break;
                    case "loadPostTable":
                    loadPostTable();
                    break;
                      case "get_allpost":
                    get_allpost();
                    break;
                    case "get_allrecycledUsers":
                    get_allrecycledUsers();
                    break;
                    case "get_allrecycledPosts":
                    get_allrecycledPosts();
                    break;
                  
                      
                    
                  default:
                  break;
                   }

                                  }
                               });
        Swal.fire("Deleted!", message, "success");
      }
    });
  }

  function delete_img(imgName,url,callbackAction,message="",tb_column){
    Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!",
}).then((result) => {
  if (result.value) {
    // alert('true');
                        $.ajax({
                                url: url,
                                type: 'post',
                                data:{action:'remove_site_file', imgName:imgName,tb_column:tb_column},
                                success: function (data) {
                                  // alert(data);
                                
                  switch(callbackAction){
                case "getfavicon":
                getfavicon();
                break;
                case "getlogo":
                  getlogo();
                break;
                case "getloader":
                getloader();
                break;
                case "getbackground_image":
                getbackground_image();
                break;
                  case "getlsbackground_image":
                getlsbackground_image();
                break;
                case "getbrandname_logo":
                getbrandname_logo();
                break;
                
                  
                
              default:
              break;
               }

                              }
                           });
    Swal.fire("Deleted!", message, "success");
  }
});
}
  function restore_btn(action,id,url,callbackAction,message=""){
    Swal.fire({
  title: "Are you sure?",
  text: "You want  to restore this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, restore it!",
}).then((result) => {
  if (result.value) {
    // alert('true');
                        $.ajax({
                                url: url,
                                type: 'post',
                                data:{action:action, id:id},
                                success: function (data) {
                                  // alert(data);
                  switch(callbackAction){
                case "get_allrecycledCategory":
                  get_allrecycledCategory();
                break;
                case "get_allrecycledUsers":
                get_allrecycledUsers();
                break;
                case "get_allrecycledPosts":
                get_allrecycledPosts();
                break;
              
                  
                
              default:
              break;
               }

                              }
                           });
    Swal.fire("Restored!", message, "success");
  }
});
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

  function init_modalWindow(heading="",size="",content){
    var modal = '<div class="modal fade" id="ajax-response" tabindex="-1" role="dialog" aria-labelledby="ajax-responseTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered '+size+'"  role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">'+heading+'</h5><button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" style="word-wrap:break-word; word-break: break-all;">'+content+'</div></div></div></div>';
  $('.modal-container').html(modal);
  }
  function set_media_grid(totalfiles,file,container_id,index) {
     var imageTypes = ['jpg','jpeg','png','pjpeg','gif','webp'];
                    var videoTypes = ['mp4','3gp','webm','mpeg','mpg','avi'];
                    var filedata;
   var output = "<div style='height:100%; width:100%;'>";
     var extension = file.name.split('.').pop().toLowerCase();
         var fileType =  file.type;
    // alert(extension);
                        var thumb1H, thumb2O;
                  if(totalfiles == 2){
                        thumb1H = 240;
                        thumb2O = 340;
                        }
                      else if(totalfiles == 3){
                        thumb1H = 270;
                        thumb2O = 135;
                      }else if(totalfiles == 4){
                        thumb1H = 270;
                        thumb2O = 90;
                      }else if(totalfiles == 5){
                        thumb1H = 360;
                        thumb2O = 90;
                      }

                  var srcdata;

            if(totalfiles == 1){
   output += ' <div class="post-thumb-gallery" id="preview'+index+'"style="width:100%; height:320px; "></div>';
  }
  else if(totalfiles == 2){
  output += '<div class="post-thumb-gallery img-gallery"><div class="row no-gutters"><div class="col-6" id="preview0"></div><div class="col-6" id="preview1" ></div></div></div>';
  }else if(totalfiles == 3){

  output += '<div class="post-thumb-gallery img-gallery"><div class="row no-gutters"><div class="col-8" id="preview0" style="width:100%; height:252px; "></div><div class="col-4"><div class="row">';

           for(var i =1; i < totalfiles ;i++){

             output += '<div class="col-12" id="preview'+i+'" style="width:100%; height:126px; "></div>';

                    }
                         output += '</div> </div></div></div>';
            }else if(totalfiles == 4){

  output += '<div class="post-thumb-gallery img-gallery"><div class="row no-gutters">';

           for(var i =0; i < totalfiles ;i++){

             output += '<div class="col-6" id="preview'+i+'" style="width:100%; height:189px; "></div>';

                   }

                         output += '</div></div>';
            }else if(totalfiles == 5){

  output +=  '<div class="post-thumb-gallery img-gallery"><div class="row no-gutters"><div class="col-8" id="preview0"></div><div class="col-4"><div class="row">';

           for(var i =1; i < 3 ;i++){
             output += '<div class="col-12" id="preview'+i+'"></div>';

                     }
                         output += '</div> </div></div></div><div class="post-thumb-gallery img-gallery"><div class="row no-gutters"><div class="col-6" id="preview3"></div><div class="col-6" id="preview4" ></div></div></div>';
            }else if(totalfiles == 6){

  output += '<div class="post-thumb-gallery img-gallery"><div class="row no-gutters"><div class="col-8"><div class="row"><div class="col-12" id="preview0"></div><div class="col-12" id="preview1"></div></div></div><div class="col-4"><div class="row">';

           for(var i =2; i < totalfiles ;i++){
             output += '<div class="col-12" id="preview'+i+'"></div>';

                     }
                         output += '</div> </div></div></div>';
         }
         output +="</div>";
     $('#'+container_id).html(output);

           var reader = new FileReader();
            reader.readAsArrayBuffer(file);
            reader.onload = (function(index,e){
              var output ;
  let filedata = e.target.result;
  let mediafile = new Blob([new Uint8Array(filedata)],{type: file.type});
  let fileurl = (window.URL || window.webkitURL).createObjectURL(mediafile);
  // $('#previewhref'+index).attr('src', fileurl);
  // $(.attr('src', fileurl);
            if (imageTypes.includes(extension)){
  if(totalfiles == 1){
  srcdata = '<figure class="post-thumb img-popup"><a href="'+fileurl+'"  ><img   class="img-responsive" src="'+fileurl+'" alt=""></a></figure>';
     }else{
      srcdata = '<figure class="post-thumb"><a href="'+fileurl+'" class="gallery-selector"  ><img   class="img-responsive" src="'+fileurl+'" alt="" style="width:100%; height:100%; "></a></figure>';

     } }else if (videoTypes.includes(extension)) {
        srcdata = '<div class="embed-responsive embed-responsive-16by9"><video class="embed-responsive-item" controls="controls" src="'+fileurl+'"  style="width:100%; height:100%; "></video></div>';
    }
    thumb2O = 170;
  $('#preview'+index).prepend(srcdata);
    $(".img-popup").lightGallery();
          $(".img-gallery").lightGallery({
              selector: ".gallery-selector",
              hash: false
          });
  }).bind(reader,index);
  }
