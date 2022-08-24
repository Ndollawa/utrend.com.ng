
   var post_type="";
   var chatfiles="";
   var chat_type="";
   var response="";
   var file_type="";
   var filetype="";
var postData=  new FormData();
  init_editor('.editor','../queries/upload.php','');
  $(document).ready(function(){
   fetch_blogposts();
                                     
// #################################################################################################################################################################################
                                         


   $(document).on('click', '.bloglikes', function(){
                                              var post_id =$(this).data('post_id');
                                              var action=$(this).data('action');
                                               var repost =$(this).data('repost');
                                              $.ajax({
                                                  url:'../queries/blog-queries.php',
                                                  method:"POST",
                                                  data:{post_id:post_id, action:action},
                                                  success:function(data){
                                                    loadPost_button(post_id,repost);
                                                  }
                                              });
                                            });
      $(document).on('click','.blogrepost', function(){
                                              var post_id = $(this).data('post_id');
                                              var action = 'repost';
                                                  $.ajax({
                                                      url:'../queries/blog-queries.php',
                                                      method:"POST",
                                                      data:{post_id:post_id, action:action},
                                                      success:function(data){
                                                $.toast({
                                              heading: 'All Done! ',
                                              text: data,
                                              position: 'top-right',
                                              loaderBg:'#ff6849',
                                              icon: 'success',
                                              hideAfter: 3500, 
                                              stack: 6
                                            });
                                                     fetch_blogposts();
                                                      }
                                                  });
                                          });

// ######################################################################################################################################################################################################
                      $(document).on('click', '.blogpostaction_button', function(){
                                              var repost =$(this).data('repost');
                                               var post_id =$(this).data('post_id');
                                            loadPost_button(post_id,repost);
                                            });


  $(document).on('click','#blogpostFile', function(){
                                                    $('#blogpostFileform').html('<input type="file" id ="blogpostshareFile" accept=".jpeg, .jpg, .png, .gif, .mp4, .3gp" name="blogpostshareFile[]" multiple style="display: none;"></input>');
                                                     $('#blogpostshareFile').click();
                                                    $('#blogpostshareFile').on('change', function(event){
                                                        var postArea = '<div class="main_division"><div id="sub_division" contenteditable class="form-control"></div></div><input type="hidden" name="post_content" id="post_content" />';
                                                    
                                                        // Read selected files
                                                        var totalfiles = document.getElementById('blogpostshareFile').files.length;
                                                        if(totalfiles>6){
                                                        $.toast({
                                              heading: 'File limit exceeded. ',
                                              text: 'You can only select 6 files..',
                                              position: 'top-right',
                                              loaderBg:'#ff6849',
                                              icon: 'info',
                                              hideAfter: 3500, 
                                              stack: 6
                                            });
                  $('#blogpost_submit').prop('disabled',true);
              }else{
                  $('#blogpost_submit').prop('disabled',false);
                
              for (var index = 0; index < totalfiles; index++) {
        var file =document.getElementById('blogpostshareFile').files[index];
                var previewContainer = 'blogpreview_content';
                  set_media_grid(totalfiles,file,previewContainer,index);
       
         postData.append("blogpostshareFile[]", document.getElementById('blogpostshareFile').files[index]);
                 }  
                          post_type = "upload";
                                                 }

                                                    });

                                                });




                                         $(document).on('click','#blogpostupdateFile', function(){
                                                    $('#blogpostupdateFileform').html('<input type="file" id ="blogpostupdateshareFile" accept=".jpeg, .jpg, .png, .gif, .mp4, .3gp" name="blogpostupdateshareFile[]" multiple style="display: none;"></input>');
                                                     $('#blogpostupdateshareFile').click();
                                                    $('#blogpostupdateshareFile').on('change', function(event){
                                                        postupdate_type = "upload";
                                                        var postArea = '<div class="main_division"><div id="sub_division" contenteditable class="form-control"></div></div><input type="hidden" name="post_content" id="post_content" />';
                                                       
                                                        // Read selected files
                                                        var totalfiles = document.getElementById('blogpostupdateshareFile').files.length;
                                                        if(totalfiles>6){
                                                             $.toast({
                                              heading: 'File limit exceeded. ',
                                              text: 'You can only select 6 files..',
                                              position: 'top-right',
                                              loaderBg:'#ff6849',
                                              icon: 'info',
                                              hideAfter: 3500, 
                                              stack: 6
                                            });
                                                            $('#blogpostupdate_submit').prop('disabled',true);
                                                            $('#blogpostupdateshareFile').val('');
                                                        }else{
                                                            $('#blogpostupdate_submit').prop('disabled',false);
                                                        for (var index = 0; index < totalfiles; index++) {
                                                      var file = document.getElementById('blogpostupdateshareFile').files[index];
                                                      var previewContainer = "blogpreviewupdate_content";
                                                          set_media_grid(totalfiles,file,previewContainer,index);
                                                           postData.append("blogpostupdateshareFile[]", document.getElementById('blogpostupdateshareFile').files[index]);
                                                  } 
                                                post_type = "upload";
                                                }

                                                    });

                                                });

    $(document).on('keyup', '#blogpost_content', function(){
        var check_content = $('#blogpost_content').val();
        var check_url = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;

        var if_url = check_content.match(check_url);

        if(if_url)
        {
            $('#bloglink_content').css('padding', '16px');
            $('#bloglink_content').css('background-color', '#f9f9f9');
            $('#bloglink_content').css('margin-bottom', '16px');
            $('#bloglink_content').html('<h4>Fetching...</h4>');
            $('#blogpost_type').val('link');
            var action = 'fetch_link_content';
            $.ajax({
                url:"../queries/blog-queries.php",
                method:"POST",
                data:{action:action, url:if_url},
                success:function(data)
                {
                    var title = $(data).filter("meta[property='og:title']").attr('content');
                    var description = $(data).filter("meta[property='og:description']").attr('content');

                    var image = $(data).filter("meta[property='og:image']").attr('content');

                    if(title === undefined)
                    {
                        title = $(data).filter("meta[name='twitter:title']").attr('content');
                    }

                    if(description === undefined)
                    {
                        description = $(data).filter("meta[name='twitter:description']").attr('content');
                    }

                    if(image === undefined)
                    {
                        image = $(data).filter("meta[name='twitter:image']").attr('content');
                    }

                    var output = '<p><a href="'+if_url[0]+'">'+if_url[0]+'</a></p>';

                    output += '<img src="'+image+'" class="img-responsive img-thumbnail" />';
                    output += '<h3><b>'+title+'</b></h3>';
                    output += '<p>'+description+'</p>';
                  post_type = "link";
                    $('#link_content').html(output);
                }
            })
        }
        else
        {
            $('#bloglink_content').html('');
            $('#bloglink_content').css('padding', '0');
            $('#bloglink_content').css('background-color', '');
            $('#bloglink_content').css('margin-bottom', '');
            return false;
        }
    });

var postupdate_type;
  $(document).on('keyup', '#blogpostupdate_content', function(){
        var check_content = $('#blogpostupdate_content').val();
        var check_url = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;

        var if_url = check_content.match(check_url);

        if(if_url)
        {
            $('#bloglinkupdate_content').css('padding', '16px');
            $('#bloglinkupdate_content').css('background-color', '#f9f9f9');
            $('#bloglinkupdate_content').css('margin-bottom', '16px');
            $('#bloglinkupdate_content').html('<h4>Fetching...</h4>');
            $('#blogpostupdate_type').val('link');
            var action = 'fetch_link_content';
            $.ajax({
                url:"../queries/blog-queries.php",
                method:"POST",
                data:{action:action, url:if_url},
                success:function(data)
                {
                    var title = $(data).filter("meta[property='og:title']").attr('content');
                    var description = $(data).filter("meta[property='og:description']").attr('content');

                    var image = $(data).filter("meta[property='og:image']").attr('content');

                    if(title === undefined)
                    {
                        title = $(data).filter("meta[name='twitter:title']").attr('content');
                    }

                    if(description === undefined)
                    {
                        description = $(data).filter("meta[name='twitter:description']").attr('content');
                    }

                    if(image === undefined)
                    {
                        image = $(data).filter("meta[name='twitter:image']").attr('content');
                    }

                    var output = '<p><a href="'+if_url[0]+'">'+if_url[0]+'</a></p>';

                    output += '<img src="'+image+'" class="img-responsive img-thumbnail" />';
                    output += '<h3><b>'+title+'</b></h3>';
                    output += '<p>'+description+'</p>';
                   postupdate_type = "link";
                    $('#linkupdate_content').html(output);
                }
            })
        }
        else
        {
            $('#bloglinkupdate_content').html('');
            $('#bloglinkupdate_content').css('padding', '0');
            $('#bloglinkupdate_content').css('background-color', '');
            $('#bloglinkupdate_content').css('margin-bottom', '');
            return false;
        }
    });
                      
// ###########################################################################################################################################################################
                               $(document).on('submit','#blogpostshare', function(event){
                                              event.preventDefault();
                                            var post_text =$('#blogpost_content').val();
                                             
                                    
                                           if(post_type === 'link')
        {
            post_text = $('#bloglink_content').html();
            $('#bloglink_content').css('padding', '0');
            $('#bloglink_content').css('background-color', '');
            $('#bloglink_content').css('margin-bottom', '0');
        }

                                                  if(post_text ==='' && post_type !== 'upload' && post_type !== 'link'){
                                             $.toast({
                                              heading: 'Sorry you can\'t submit an empty field ',
                                              text: 'Enter a story content',
                                              position: 'top-right',
                                              loaderBg:'#ff6849',
                                              icon: 'warning',
                                              hideAfter: 3500, 
                                              stack: 6
                                            });
                                              
                                             }else{
                                             var user_id = $('#blogpost_submit').data('user_id');
                                                      var action = 'sharePost';
  													                         postData.append("user_id",user_id);
                                                      postData.append("action",action);
                                                      postData.append("post_text",post_text); 
                                                      $.ajax({
                                                           url:'../queries/blog-queries.php',
                                                            method:"POST",
                                                            // dataType: "json",
                                                            enctype:"multipart/form-data",
                                                            processData: false,
                                                            contentType: false,
                                                            // cache: false,
                                                          data:postData,
                                                          beforeSend:function()
                                                          {
                                                              $('#blogpost_submit').attr('disabled', 'disabled');  
                                                          },
                                                          success:function(data){
                                                    try{
                                                             data = JSON.parse(data);
                                                            alert(data);
                                                            for (var i = 0; i < data[1].length; i++) {
                                                              data[i]
                                                               if(data[0][i] === 'Error'){
                                                               $.toast({
                                              heading: 'Sorry some files were not uploaded ',
                                              text: data[1][i],
                                              position: 'top-right',
                                              loaderBg:'#ff6849',
                                              icon: 'error',
                                              hideAfter: 5500, 
                                              stack: 6
                                            });  }
                                                            }
                                                            }catch (e){
                                                   console.log(e.message);          }
                                                   for (var key of postData.keys()){
                                                       postData.delete(key);      
                                                               }
                                                      post_type="";
                                                             fetch_blogposts();
                                                             fetch_blogGallery();
                                                            $('#blogpreview_content').empty(); 
                                                              // $(".emojionearea-editor").html('');
                                                              $('#blogpostshare')[0].reset();
                                          $.toast({
                                            heading: 'All Done!',
                                            text: 'Post successfully shared...',
                                            position: 'top-right',
                                            loaderBg:'#ff6849',
                                            icon: 'success',
                                            hideAfter: 3500, 
                                            stack: 6
                                          });

                                            $('#bloglink_content').html('');
                                        $('#blogpost_submit').attr('disabled', false);
                                                              
                                                          }
                                                      });
                                                     }
                                                });
//##########################################################################################################################################
                                $(document).on('submit','#blogpost-update', function(event){
                                              event.preventDefault();
                                            var postupdate_text =$('#blogpostupdate_content').val();
                                            var post_id = $('#blogpost_updatesubmit').data('post_id');
                                       
                                      if(postupdate_type === 'link')
                                          {
                                             postupdate_text = $('#bloglinkupdate_content').html();
                                              $('#bloglinkupdate_content').css('padding', '0');
                                              $('#bloglinkupdate_content').css('background-color', '');
                                              $('#bloglinkupdate_content').css('margin-bottom', '0');
                                          }

                                                  if(postupdate_text ==='' && post_type !=='upload' && post_type !== 'link'){
                                           $.toast({
                                              heading: 'Sorry you can\'t submit an empty field ',
                                              text: 'Enter a story content',
                                              position: 'top-right',
                                              loaderBg:'#ff6849',
                                              icon: 'warning',
                                              hideAfter: 3500, 
                                              stack: 6
                                            });
                                             }else{
                                                      var action = 'updatePost';
                                                      postData.append("post_id",post_id);
                                                      postData.append("action",action);
                                                      postData.append("postupdate_text",postupdate_text);
                                                      $.ajax({
                                                           url:'../queries/blog-queries.php',
                                                            method:"POST",
                                                            // dataType: "json",
                                                            enctype:"multipart/form-data",
                                                            processData: false,
                                                            contentType: false,
                                                            cache: false,
                                                          data:postData,
                                                          beforeSend:function()
                                                          {
                                                           $('#blogpostupdate_submit').attr('disabled', 'disabled');  
                                                            },
                                                            success:function(data){
                                                              alert(data);
                                                              try{
                                                             data = JSON.parse(data);
                                                            
                                                            for (var i = 0; i < data[1].length; i++) {
                                                              data[i]
                                                               if(data[0][i] === 'Error'){
                                                               $.toast({
                                              heading: 'Sorry some files were not uploaded ',
                                              text: data[1][i],
                                              position: 'top-right',
                                              loaderBg:'#ff6849',
                                              icon: 'error',
                                              hideAfter: 5500, 
                                              stack: 6
                                            }); 
                                             }
                                                            }
                                                            }catch (e){
                                            
                                            console.log(e.message);
                                                            }
                                                           for (var key of postData.keys()){
                                                       postData.delete(key);      
                                                               }
                                                           post_type ="";
                                                             fetch_blogposts();
                                                             fetch_blogGallery();
                                                             // $('form#post-update').remove();
                                                            $('#blogpreviewupdate_content').empty(); 
                                                              // $(".emojionearea-editor").html('');
                                                              $('#blogpost-update')[0].reset();
                                                              $('#ajax-response').modal('hide');
                                       $.toast({
                                            heading: 'All Done!',
                                            text: 'Post successfully Updated...',
                                            position: 'top-right',
                                            loaderBg:'#ff6849',
                                            icon: 'success',
                                            hideAfter: 3500, 
                                            stack: 6
                                          });
                                         $('#bloglinkupdate_content').html('');
                                     $('#blogpostupdate_submit').attr('disabled', false);
                                                              
                                                          }
                                                      });
                                                     }
                                                });
 // ##############################################################################################################################################################
                            $(document).on('click', '.blogdelete-post', function(){
                                              var post_id =$(this).data('post_id');
                                              var action=$(this).data('action');
                                              // alert(post_id);

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
                                                    $.ajax({
                                                  url:'../queries/blog-queries.php',
                                                  method:"POST",
                                                  data:{post_id:post_id, action:action},
                                                  success:function(data){
                                                      fetch_blogposts();
                                                      fetch_blogGallery()
                                                       update_last_activity();
                                                  }
                                              });
      Swal.fire("Deleted!", "Post has been deleted.", "success");
    }
  });
                                            });

                                 $(document).on('click', '.blogedit-post', function(){
                                              var post_id =$(this).data('post_id');
                                              var action=$(this).data('action');
                                               update_last_activity();
                                              $.ajax({
                                                  url:'../queries/blog-queries.php',
                                                  method:"POST",
                                                  data:{post_id:post_id, action:action},
                                                  success:function(data){
                                                    // alert(data);
                                                    data = JSON.parse(data);
                                               var updateform = '<div><div><form  method="post" class="postform" enctype="multipart/form-data" id="blogpost-update"><textarea class="form-control p-text-area" id="blogpostupdate_content" name="blogpostupdate_content" rows="4" placeholder="What\'s on your mind today?">'+data[0]+'</textarea><div id="blogpreviewupdate_content" class=" "  style="justify-content: center;margin: 3px 0 0 0; display:inline; height: 240px; max-height: 240px; ">'+data[1]+'</div><div id="bloglinkupdate_content"></div><div class="" id="blogpostupdateFileform"></div><footer class="panel-footer"><button  class="btn btn-post pull-right" id="blogpost_updatesubmit" type="submit" data-post_id="'+post_id+'" name="submit">Post</button><ul class="nav nav-pills p-option"><li><a href="javascript:;"><i class="fa fa-user"></i></a></li><li><a href="javascript:;" id="blogpostupdateFile"><i class="fa fa-camera"></i></a></li><li> <a href="javascript:;"><i class="fa  fa-location-arrow"></i></a></li><li><a href="javascript:;" id="blogemojiarea"><i class="fa fa-meh-o"></i></a></li></ul></footer></form></div></div>';
                                             init_modalWindow('<h4 class="bold"> Edit Post</h4>',"",updateform);
                                             $('#ajax-response').modal({
                                                  backdrop:'static',
                                                  keyboard:false
                                                });
                                                }
                                              });
                                            });

                                       $(document).on('click', '#blogfollow-btn', function(){
                                              // var following =$(this).data('following');
                                              var action=$(this).data('action');
                                              $.ajax({
                                                  url:'../queries/blog-queries.php',
                                                  method:"POST",
                                                  data:{action:action},
                                                  success:function(data){
                                                      load_profileButtons();
                                                      load_followbtn(following);
                                                      fetch_posts();
                                                       update_last_activity();
                                                  }
                                              });
                                            });
                                         
                                       // $(document).on('click', '.blogsprofile_button', function(){
                                       //        var following =$(this).data('following');
                                       //         var friend_id =$(this).data('friend_id');
                                       //         var acct_id;
                                       //        if(following === ""){
                                       //         acct_id = friend_id;
                                       //        }else{
                                       //          acct_id = following;
                                       //        }
                                       //        // alert(acct_id);
                                       //        sload_profileButtons(acct_id);
                                       //                load_profileButtons();
                                       //                fetch_user();
                                       //                // loadmore_posts();
                                       //         update_last_activity();
                                       //      });
                                       //                 load_profileButtons();
                                          
                                         
// ############################################################################################################################################################################################################
                                   
// ################################################################################################################################################################################################
                                             
// ##############################################################################################################################################################################################
                                          var post_id;
                                          var user_id;
                                              $(document).on('click','.blogpost_comment', function(){
                                                    post_id =$(this).attr('id');
                                                    user_id =$(this).data('user_id');
                                                     update_last_activity();
                                                     // $('#comment_form'+post_id).slideToggle('slow');
                                                          post_id =$(this).attr('id');
                                                    user_id =$(this).data('user_id');
                                                    var action = 'fetch_comment';
                                                // $('.comment-form').emojioneArea({
                                                //   autoHideFilters: true,
                                                //  pickerPosition: "bottom"
                                                // });
                                                 // $('#reply-form'+comment_id).slideToggle('slow');
                                                     $.ajax({
                                                            url:'../queries/blog-queries.php',
                                                            method:"POST",
                                                            data:{post_id:post_id,user_id:user_id, action:action},
                                                            success:function(data){
                                                              // alert(data);
                                                                 $('#old_comment'+post_id).html(data);
                                                                $('#comment_form'+post_id).slideToggle('slow');
                                                            // $(".emojionearea-editor").html('');
                                                              var currpage = $('.pagenum').val();
                                                          var id = $('.comment-replies').attr('id');
                                                  $('.comment-replies').slimScroll({
                                              start: 'bottom',
                                              alwaysVisible: false
                                            });
                                                             // $('.post_comment').click();
                                                              // loadmore_posts();
                                                            }
                                                        });
                                            
                                            });
  // ###############################################################################################################################################################################################################################################

                                    var post_id;
                                 var user_id;
                                 var reply_id;
                                 var comment_id;
                               $(document).on('click', '.blogcomment-reply', function(){
                                 update_last_activity();
                                 post_id = $(this).data('post_id');
                                comment_id = $(this).attr('id');
                                repost = $(this).data('repost'); 
                                var action = 'add-reply-comment'
                                // AJAX request
                                            $.ajax({
                                                url: '../queries/blog-queries.php',
                                                type: 'post',
                                                data:{action:action,post_id:post_id, comment_id:comment_id},
                                                success: function (data) {
                                                   // alert(data);
                                               tinymce.remove('.reditor');
                                            $('#comment-wrapper'+post_id).html(data);
                                init_editor('.reditor','../queries/comment-upload.php','');
 
                                                    }
                                            });                              
                                
                                // images_upload_base_path: '../../assets/images/',
                            
                              });
                                   $(document).on('click', '.blogadd-comment', function(){
                                 update_last_activity();
                                 post_id = $(this).data('post_id');
                                repost = $(this).data('repost'); 
                                var action = 'add-comment'
                                // AJAX request
                                            $.ajax({
                                                url: '../queries/blog-queries.php',
                                                type: 'post',
                                                data:{action:action,post_id:post_id,repost:repost},
                                                success: function (data) {
                                                   // alert(data);
                                             tinymce.remove('.editor');
                                            $('#comment-wrapper'+post_id).html(data);
                                              // $('#reply-form'+comment_id).slideToggle('slow');
                               init_editor('.editor','../queries/comment-upload.php','');
                                                    }
                                            });                              
                                
                                // images_upload_base_path: '../../assets/images/',
                            
                              });
 // #################################################################################################################################################################
                                          $(document).on('submit','.blogcomment-reply-form', function(event){
                                              event.preventDefault();  
                                              // $(document).on('click','.comment-reply',function (){ 
                                             user_id =$('.blogcomment-reply').data('user_id');
                                             post_id =$('.blogcomment-reply').data('post_id');
                                             comment_id =$('.blogcomment-reply').attr('id');
                                           // });
                                              var reply = tinyMCE.activeEditor.getContent();
                                                               var action = 'submit-reply';
                                                              if(reply === ""){
                                                                alert('Please type your reply...');
                                                              }else{
                                                               // AJAX request
                                                                          $.ajax({
                                                                              url: '../queries/blog-queries.php',
                                                                              type: 'post',
                                                                              data:{action:action, user_id:user_id, comment_id:comment_id, reply:reply},
                                                                              success: function (data) {
                                                                                // alert(data); 
                                                                              $('#comment-wrapper'+post_id).empty(); 
                                                                               // loadmore_posts();
                                                                                            $('.blogpost_comment').click();                  }
                                                                          });
                                                              }
                                                            });
// #################################################################################################################################################
                                   $(document).on('click','.blogreply-reply',function (){ 
                                       update_last_activity();
                                   user_id =$(this).data('user_id');
                                var to_user =$(this).data('to_user');
                                comment_id = $(this).attr('id');
                                 post_id = $(this).data('post_id');
                                comment_id = $(this).attr('id');
                                repost = $(this).data('repost'); 
                                var action = 'add-reply-comment'
                                // AJAX request
                                            $.ajax({
                                                url: '../queries/blog-queries.php',
                                                type: 'post',
                                                data:{action:action,post_id:post_id, comment_id:comment_id},
                                                success: function (data) {
                                                  // alert(data);
                                             tinymce.remove('.reditor');
                                            $('#comment-wrapper'+post_id).html(data)
                                            if(to_user !== user_id){
                    $('#reply'+comment_id).val('<strong>@<a href="user_profile.php?uid='+user_id+'">'+to_user+'</a></strong></br>--');;
                                }
                                init_editor('.reditor','../queries/comment-upload.php','');}
                                });
                                        });
 // ################################################################################################################################################

                                $(document).on('submit','.blogcommentform', function(event){
                                    event.preventDefault();   
                                     var repost =$('.submit_comment').data('repost');
                                   post_id =$('.submit_comment').data('post_id');
                                   user_id =$('.submit_comment').data('user_id');
                                   // comment_id =$(this).data('comment_id');
                                    var comment = tinyMCE.activeEditor.getContent();
                                 var action = 'submit_comment';
                                if(comment === ""){
                                  alert('Please type your comment...');
                                }else{
                                 // AJAX request
                                            $.ajax({
                                                url: '../queries/blog-queries.php',
                                                type: 'post',
                                                data:{action:action, user_id:user_id, post_id:post_id, comment:comment},
                                                success: function (data) {
                                                	// alert(data);
                                                $('#comment-wrapper'+post_id).empty(); 
                                               loadPost_button(post_id,repost);

                                               $('.blogpost_comment').click();
                                                 
                                              
                                                    }
                                            });
                                }
                                });
// ############################################################################################################################
                                          

                                    // $('#emojiarea').emojioneArea({
                                    //     container: "#post_content",
                                       
                                    //     // target:'#post_content',
                                    //      pickerPosition: "bottom",
                                    //       filtersPosition: "bottom",
                                    //      autoHideFilters: true
                                    //     });

                                     $(document).on('click','.blogloadmorepost', function(){
                                     // alert($(this).data('ppagenum'));
                                     //   alert($(this).data('ptotal_page'));
                                     
                                      if($(this).data('ppagenum') <= $(this).data('ptotal_page')) {
                                            var pagenum = parseInt($(this).data('ppagenum')) + 1;
                                          // alert(pagenum);
                                           $(this).remove();
                                              $('.pagination').remove();
                                            loadmore_blogposts(pagenum);
                                           } update_last_activity();
                                     });


                                   

                                 
    
                                  $(window).scroll(function(){
                                    var pagenum = $('.ppagenum').val();
                                      var tpages = $('.ptotal-page').val();
                                      // alert($(window).scrollTop());
                                      // alert($(document).height());
                                      // alert($(window).height());
                                    if (Math.ceil($(window).scrollTop()) >= Math.ceil($(document).height() - $(window).height())){
                                      if(pagenum <= tpages ) {
                                        // alert(tpages);
                                        update_last_activity();
                                        var fpagenum = parseInt(pagenum )+ 1 ;
                                          // alert(fpagenum);
                                          $('.pagination').remove();
                                           $('.loadmorepost').remove();
                                        loadmore_blogposts(fpagenum);
                                      }
                                    }
                                  });


                          $(document).on('click','.upload-blogprofpic', function(){
                                $('.profpic-fileinput').html('<input type="file" id ="profpic" name="profpic" accept="image/*" style="display: none;"></input>');
                                 $('#profpic').click();
                                $('#profpic').on('change', function(event){         
                                    var profilePicture = new FormData();
                                    profilePicture.append("profpic", document.getElementById('profpic').files[0]);
                                   var action = 'upload_profpic';
                                    profilePicture.append("action", action);
                                  $.ajax({
                                        url:'../queries/blog-queries.php',
                                        method:"POST",
                                        enctype:"multipart/form-data",
                                        data:profilePicture,
                                        contentType: false,
                                        processData: false,
                                        success:function(data){
                                          // alert(data);
                                          getUserpic();
                                          load_headerImage();
                                             response = $('.modal').text("");
                                                    $.toast({
                                              heading: 'All Done! ',
                                              text: 'Profile picture uploaded..',
                                              position: 'top-right',
                                              loaderBg:'#ff6849',
                                              icon: 'success',
                                              hideAfter: 3500, 
                                              stack: 6
                                            });
                                              loadmore_posts();   
                                          }
                                     });

                                });
                              });

// ###################################################################################################################################
        
                                                  getblogpic();
                                                 
                                          //                        function update_last_activity(){
                                          //     var action = 'update_last_activity';
                                          //     $.ajax({
                                          //         url:'../queries/user-queries.php',
                                          //         method:'POST',
                                          //         data:{action:action},
                                          //         success:function(){

                                          //         }
                                          //     });
                                          // }
                                         
                                               fetch_blogGallery();
                                                       
// ##########################################################*** END ***#############################################################################
});  

function loadmore_blogposts(pagenum){
                                      var action = 'fetch_post';
                                       $.ajax({
                                              url:'../queries/blog-queries.php',
                                              method:"POST",
                                              data:{action:action, pagenum:pagenum},
                                                beforeSend: function(){
                                            $('#load').show();},
                                             complete: function(){
                                            $('#load').hide();
                                            },
                                              success:function(data){
                                                if(data!=""){
                                                 $('#blogPosts').append(data);
                                                 AddReadMore();
                                         $(".img-popup").lightGallery(); 
                                              $(".img-gallery").lightGallery({
                                                  selector: ".gallery-selector",
                                                  hash: false
                                              });
                                           }else{
                  $('#posts-status').append('<div class="jumbotron container text-center" style="justify-content:center; vertical-align:middle;"><p class="alert alert-primary">No more Posts!</p></div>');
                 
        }}
                                        });
                                      } 

                                     
 function fetch_blogposts(pagenum=null){
                                      var action = 'fetch_post';
                                       $.ajax({
                                              url:'../queries/blog-queries.php',
                                              method:"POST",
                                              data:{action:action, pagenum:pagenum},
                                                beforeSend: function(){
                                            $('#load').show();},
                                             complete: function(){
                                            $('#load').hide();
                                            },
                                              success:function(data){
                                              	// alert(data);
                                                if(data!=""){
                                                $('#blogPosts').html(data);
                                                AddReadMore();
                                                   $(".img-popup").lightGallery(); 
                                              $(".img-gallery").lightGallery({
                                                  selector: ".gallery-selector",
                                                  hash: false
                                              });
                                              $('#event-list').owlCarousel({
                                                items: 3,
                                                nav: false,
                                                pagination:false,
                                                dots:false,
                                                itemsDesktop: [1199, 3],
                                              itemsDesktopSmall: [979, 2],
                                              itemsDesktop: [600, 2]
                                              });
                                               $('#event-list').find('.item').each(function(i) {
                                                  this.className+=' padding-item';
                                              });
                                              }else{
                  $('#blogPosts').append('<div class="jumbotron container text-center" style="justify-content:center; vertical-align:center;"><h4 class="">No Posts yet!</h4></div>');
         }        
        }
                                        });
                                      } 
     
                                  function AddReadMore() {
                                              //This limit you can set after how much characters you want to show Read More.
                                              var carLmt = 500;
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
                                                  if($('.moreless-button').text() === " ... Read More"){
                                                    $(this).text(readLessTxt);
                                                  }else{
                                                    $(this).text(readMoreTxt);
                                                  }
                                                });
                                          }

                                        function loadPost_button(post_id, repost){

                                          var action = 'load_postbuttons';
                                             $.ajax({
                                                    url:'../queries/blog-queries.php',
                                                    method:"POST",
                                                    data:{action:action, post_id:post_id, repost:repost},
                                                    success:function(data){
                                            $('.post-buttons'+post_id).html(data);
                                                    }
                                                });
                                        }
 function load_blogfollowbtn(follower) {
                                           var action = 'load-followbtn';
                                            $.ajax({
                                                    url:'../queries/blog-queries.php',
                                                    method:"POST",
                                                    data:{action:action,follower:follower},
                                                    success:function(data){
                                            $('#user'+following).html(data); 
                                             update_last_activity();
                                                    }
                                                });
                                          }
  function load_blogprofileButtons(){
                                            var action = 'load_profileButtons';
                                             $.ajax({
                                                    url:'../queries/blog-queries.php',
                                                    method:"POST",
                                                    data:{action:action},
                                                    success:function(data){
                                            $('#profile-blogbuttons').html(data); 

                                                    }
                                                });
                                              } 
                                          
                                       function get_blogfollow_status(user_id){
                                              var action = 'get_follow_status';
                                              var result="";
                                               $.ajax({
                                                  url:'../queries/blog-queries.php',
                                                  method:"POST",
                                                  async:false,
                                                  data:{action:action, user_id:user_id},
                                                  success:function(data){
                                              result =data;
                                                  } 
                                              });
                                               return result;
                                          }

function loadmore_blogposts(pagenum){
                                     var action = 'fetch_post';
                                       $.ajax({
                                              url:'../queries/blog-queries.php',
                                              method:"POST",
                                              data:{action:action, pagenum:pagenum},
                                                beforeSend: function(){
                                            $('#load').show();},
                                             complete: function(){
                                            $('#load').hide();
                                            },
                                              success:function(data){ 
                                                // alert(data);

                                         //  data.hide().appendTo('#userPosts').fadeIn;
                                         // $(window).scrollTop($(window).scrollTop()-1);
                                        if(data !== ""){
                                            $('#blogPosts').append(data);
                                                AddReadMore();
                                         $(".img-popup").lightGallery(); 
                                              $(".img-gallery").lightGallery({
                                                  selector: ".gallery-selector",
                                                  hash: false
                                              }); 
                                              
                                            }else{
                                              $('#nomorePost').remove();
                                             $('#blogPost').html('<center><div id="nomorePost" class="alert alert-primary text-center">No more Posts</div></center>');
                                           }
                                            }
                                        });
                                      } 
 function getblogpic(){
                                                      var action = 'getblogpic';
                                                       $.ajax({
                                                          url:'../queries/blog-queries.php',
                                                          method:"POST",
                                                          data:{action:action},
                                                          success:function(data){
                                                            // alert(data);
                                                          $('.blogprofpic').remove();
                                                          $('#blog-profpicture').prepend(data);   
                                                           }
                                                      });
                                                  }
                                                                  
 function fetch_blogGallery(){
                                                            var action = 'getblogGallery';
                                                             $.ajax({
                                                                    url:'../queries/blog-queries.php',
                                                                    method:"POST",
                                                                    data:{action:action},
                                                                    success:function(data){
                                                                      // alert(data);
                                                                        $('#bloggallery').html(data);
                                                                         $(".img-popup").lightGallery(); 
                                                                         // alert(data);
                                                                      $(".img-gallery").lightGallery({
                                                                      selector: ".gallery-selector",
                                                                      hash: false
                                                                            }); 
                                                                    $('.gallery-toggle').on('click', function () {

                                                              var productThumb = $(this).find(".product-thumb-large-view img"),
                                                                      imageSrcLength = productThumb.length,
                                                                      images = [];
                                                                  for (var i = 0; i < imageSrcLength; i++) {
                                                                      images[i] = {"src": productThumb[i].src, "thumb": productThumb[i].src};
                                                                  }

                                                                  $(this).lightGallery({
                                                                      dynamic: true,
                                                                      actualSize: false,
                                                                      hash: false,
                                                                      index: 0,
                                                                      dynamicEl: images
                                                                  });

                                                              });
                                                                          }
                                                                      });
                                                                    } 
                                                                    function init_editor(selector,uploader=null,path=null){
      var editor =    tinymce.init({selector:selector,
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
  var modal = '<div class="modal fade" id="ajax-response" tabindex="-1" role="dialog" aria-labelledby="ajax-responseTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered '+size+'"  role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">'+heading+'</h5><button type="button" id="modal-close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">'+content+'</div></div></div></div>';
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
 output += ' <div class="post-thumb-gallery" id="preview'+index+'"></div>';
}
else if(totalfiles == 2){
output += '<div class="post-thumb-gallery img-gallery"><div class="row no-gutters"><div class="col-6" id="preview0"></div><div class="col-6" id="preview1" ></div></div></div>';
}else if(totalfiles == 3){

output += '<div class="post-thumb-gallery img-gallery"><div class="row no-gutters"><div class="col-8" id="preview0"></div><div class="col-4"><div class="row">';
                
         for(var i =1; i < totalfiles ;i++){ 
         if(i>1){
  output += '<div class="col-12"><div  style="background:#0e0e0e73; position:absolute; z-index:1;" id="preview'+i+'"><span class="text-center text-white">+'+totalfiles+'</span></div></div>';
         }else{     
           output += '<div class="col-12" id="preview'+i+'"></div>';
                  
                   }}
                       output += '</div> </div></div></div>';
          }else if(totalfiles == 4){

output += '<div class="post-thumb-gallery img-gallery"><div class="row no-gutters"><div class="col-12" id="preview0"></div></div></div><div class="post-thumb-gallery img-gallery"><div class="row no-gutters"><div class="col-8" ></div><div class="col-4"><div class="row">';
                
         for(var i =2; i < totalfiles ;i++){      
           output += '<div class="col-12" id="preview'+i+'"></div>';
                  
                   }
                       output += '</div> </div></div></div>';
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
    srcdata = '<figure class="post-thumb"><a href="'+fileurl+'" class="gallery-selector"  ><img   class="img-responsive" src="'+fileurl+'" alt=""></a></figure>';
  
   } }else if (videoTypes.includes(extension)) {
      srcdata = '<div class="embed-responsive embed-responsive-16by9"><video class="embed-responsive-item" controls="controls" src="'+fileurl+'" ></video></div>';
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