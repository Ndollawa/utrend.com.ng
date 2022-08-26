<?php
$msg= "";
if(isset($_POST['submit_comment'])){

}

// use unicalCSphp\UploadFile;
if(isset($_POST['action'])) {
 $output ="";
include '../backend/database.php';
include '../backend/timeAgo.php';
include '../backend/functions.php';
include 'post-queries.php';
session_start();
ob_start();
 if (isset($_SESSION['user_id'])) {
 $user_id = $_SESSION['user_id'];
 }else{
 $user_id = "";
 }


  $post_id= $_SESSION['post_id'];
 if($_POST['action'] == 'load_comments'){
	$sql = "SELECT * FROM  comments WHERE post_id = '".$post_id."' AND comment_status = 'Approved' ORDER BY id DESC";
$perPage = 5;
						$page = 0;
if(!empty($_POST["pagenum"])) {
$page = $_POST["pagenum"];
}

$start = ($page-1)*$perPage;
if($start < 0) $start = 0;
 $sql2 = $sql." LIMIT ".$start." , ".$perPage;
$comments= $database->query($sql);
$query = "SELECT * FROM($sql2)comments ORDER BY COMMENT_TIME ASC";
$send= $database->query($query);
$row = $db->fetch_array($send);
$rowCount = $database->num_rows($comments);

$pages  = ceil($rowCount/$perPage);
if(!empty($send)) {
						foreach ($send as $row) {
							$comment_id = $row['id'];
							$post_id =$row["post_id"];
					 	$username =$row["username"];
					 	$commenter_id =$row["user_id"];
					 	$comment =$row["comment"];
					 	$time =timeAgo($row["comment_time"]);

$output ='<li class="comment" id="'.$comment_id.'"><div class="avatar-image-container"><img src="../assets/images/'.getUserpic($commenter_id).'" style="width:35px; height:35px;" alt=""></div><div class="comment-block"><div class="comment-header"><cite class="user"><a href="#" rel="nofollow">'.$username .'</a></cite><span class="icon user blog-author"></span><span class="datetime secondary-text">'.$time.'</span></div><p class="comment-content" style="margin:0 !important;">'.$comment.'</p>
<span class="comment-actions secondary-text" style="padding:10px;">
<button type="button" class="comment-reply btn btn-link action-btn btn'.$comment_id.'" id="'.$comment_id.'"  data-user_id="'.$user_id.'"  data-post_id="'.$post_id.'" style="border:none; padding:2px; font-style: italic; background:transparent;" >Reply('.replies_count($comment_id).')</button>';
if(isset($_SESSION['user_role'])){
if($_SESSION['user_role'] == 'Administrator'){
$output .='<span class="item-control blog-admin "><button class="comment-delete action-btn" data-action="delete-comment" data-comment_id='.$comment_id.'style="border:none; padding:2px; font-style: italic; background:transparent;">Delete</button></span>';}}

$output .='</span><div class="comment-replies container" id="'.$comment_id.'" style="left:30%; max-height:300px; margin: 0;overflow:scroll;overflow-x:hidden;"><ul>';

$sql = "SELECT * FROM  replies WHERE comment_id = '".$comment_id."' ORDER BY id ASC ";
						$send = $database->query($sql);
						if($send){
						$row =$database->fetch_array($send);
						foreach ($send as $row) {
							$reply_id = $row['id'];
							$comment_id =$row["comment_id"];
					 	$tousername =$row["username"];
					 	$reply =$row["reply_content"];
					 	$time =timeAgo($row["reply_time"]);
							$output .='<li class="comment" id="'.$reply_id.'"><div class="avatar-image-container"><img src="../assets/images/'.getUserpic($user_id).'" style="width:35px; height:35px;" alt=""></div><div class="comment-block"><div class="comment-header"><cite class="user">'.$tousername.'</cite><span class="icon user blog-author"></span><span class="datetime secondary-text">'.$time.'</span></div><p class="comment-content" style="margin:0 !important;">'.$reply.'</p>
								<span class="actions secondary-text" style="margin-bottom:10px;">
								<button type="button" class="reply-reply btn btn-link action-btn" id="'.$comment_id.'" data-to_user="'.$tousername.'" data-user_id="'.$user_id.'"  style="border:none; padding:2px; margin:0; font-style: italic; background:transparent;" >Reply</button>
								<span class="item-control"><button class="comment-delete action-btn" style="border:none; padding:2px; font-style: italic; background:transparent;">Delete</button></span></span>
										</li>';
					}
}

$output .='</ul></div><div class="form-group" id="reply-form'.$comment_id.'" style="display:none;">
<form method="post" action="" id="reply-comment-form" >
	<div class="form-group"> <textarea name="reply" class="form-control editor" id="reply'.$comment_id.'"></textarea></div>
	<div class="form-group" align="left"><button type="submit" name="submit-reply" class="btn btn-dafault btn-sm text-small submit-reply"data-user_id="'.$user_id.'" id="'.$comment_id.'" >Reply</button></div></form>
	 </div></div>

<div class="form-group" id="reply-form2'.$comment_id.'" style="display:none;">
<form method="post" action="" id="reply-comment-form" class="container" >
<div class="row ">
<div class="col-sm- 12 col-md-6"><div class="form-group row"><label class="control-label col-md-6">Name<span class="required"> * </span></label><div class="col-md-12"><input type="text" id="replier_username" name="username" placeholder="Enter your name"
				class="form-control input-height" width="50px" />
		</div></div></div><div class="col-sm- 12 col-md-6"><div class="form-group row">
		<label class="control-label col-md-6">Email
<span class="required"> * </span></label><div class="col-md-12">
<input type="email"id="replier_email" name="email" placeholder="Enter email: (example@gmail.com)"
				class="form-control input-height" width="50px"/></div></div></div></div>

	<div class="form-group"> <textarea name="reply" class="form-control editor" id="reply'.$comment_id.'" style="margin-top:5px;"></textarea></div>
	<div class="form-group" align="right"><button type="submit" name="submit-reply" class="btn btn-dafault btn-sm submit-reply text-small" data-comment_author="'.$commenter_id.'" data-user_id="'.$user_id.'" id="'.$comment_id.'" >Reply</button></div></form>
	 				</div>
				</div>
			</div>
		</div>
		</li><input type="hidden" class="pagenum" value="'.$page .'" />
	<input type="hidden" class="total-page" value="'.$pages.'" />';
				echo $output;		}

					}
		}



if($_POST['action'] == 'submit-comment'){
$post_id = $_SESSION['post_id'];
if (isset($_SESSION['user_id'])) {
 $user_id = $_SESSION['user_id'];
 }else{
 $user_id = "";
 }

$time = date('Y-m-d H:i:s');
$comment = $database->escape_value($_POST['comment']);

if($user_id == ""){

$username =$database->escape_value($_POST['username']);
$email = $database->escape_value($_POST['email']);
if($username != "" && $email != "" && $comment != ""){
$sql = "INSERT INTO comments (username,user_id,user_email, comment, comment_time, post_id) VALUES ('$username','$user_id','$email','$comment','$time','$post_id')";
$send = $database->query($sql);
if($send){

$sql ="SELECT COUNT(id) as total FROM comments WHERE comment_status = 'Pending' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$pendingcomment_count = $row['total'];
 }

        $notification = '
                    <a href="all-comment.php" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: blue; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-comment"> </i></div><div> <strong>Admin:</strong> '.$pendingcomment_count.' new Pending Comment(s) ';

                    $query = "SELECT * FROM notifications WHERE notification_type = 'New comment'";
                    $send= $database->query($query);

$row = $database->num_rows($send);
if($row==0) {
              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ((SELECT id FROM users WHERE role = 'Administrator' AND user_acctStatus = 'Active'),'New comment','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);
          }else{
          	 $sql = "UPDATE notifications SET notification = '".$notification."',notification_time = '".date('Y-m-d H:i:s')."' WHERE  notification_type = 'New comment',)";
              $send = $database->query($sql);
          }
            }

}else{
	$msg = '<div style
	="width:100%;height:40px;" class="alert alert-danger"><p align="center" style="vertical-align:center; color:red; font-weight:600px;">Please fill in the form..</p></div>';
}
}else{
	if($user_id != ""){

	$sql = "SELECT * FROM users WHERE id = '".$user_id."'";
  $result = $database->query($sql);
  $row = $database->fetch_array($result);
  foreach ($result as $row) {
    $user_account_type = $row['account_type'];
    $user_id =$row['id'];
      $username = $row['username'];
      $email= $row['email'];
      $account_type= $row['account_type'];
      $user_acctStatus = $row['user_acctStatus'];


      }
// $username = getUsername($user_id);
$sql = "INSERT INTO comments (username,user_id, user_email, comment, comment_time, post_id) VALUES ('".getUsername($user_id)."','$user_id','$email','$comment','$time','$post_id')";
$send = $database->query($sql);
if($send){
   if($_SESSION['user_role'] != 'Administrator'){
        $notification = '
                    <a href="all-comment.php" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: blue; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-comment"> </i></div><div> <strong>Blake</strong> '.$pendingComment_count.' new Pending Comment(s) ';

                    $query = "SELECT * FROM notifications WHERE notification_type = 'New comment'";
                    $send= $database->query($query);

$row = $database->num_rows($send);
if($row==0) {
              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ((SELECT id FROM users WHERE role = 'Administrator' AND user_acctStatus = 'Active'),'New comment','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);
          }else{
          	 $sql = "UPDATE notifications SET notification = '".$notification."',notification_time = '".date('Y-m-d H:i:s')."' WHERE  notification_type = 'New comment',)";
              $send = $database->query($sql);
          }
            }
}
}else{
$msg = '<div class="alert alert-danger" style
	="width:100%;height:40px;"><p align="center" style="vertical-align:center; color:red; font-weight:600px;">Please type a comment..</p></div>';

}}

}


if($_POST['action'] == 'submit-reply'){
$comment_id = $_POST['comment_id'];
$user_id = $_POST['user_id'];
$time = date('Y-m-d H:i:s');
$reply = $database->escape_value($_POST['reply']);

if($user_id == ""){

$username =$database->escape_value($_POST['username']);
$email = $database->escape_value($_POST['email']);
$sql = "INSERT INTO replies (user_id,username, user_email,comment_id,post_id, reply_content, reply_time ) VALUES ('".$_SESSION['user_id']."','$username','$email','$comment_id','$post_id','$reply','$time')";
$send = $database->query($sql);

}else{
	$sql = "SELECT * FROM users WHERE id = '".$user_id."'";
  $result = $database->query($sql);
  $row = $database->fetch_array($result);
  foreach ($result as $row) {
    $user_account_type = $row['account_type'];
      $username = $row['username'];
      $email= $row['email'];
      $account_type= $row['account_type'];
      $user_acctStatus = $row['user_acctStatus'];


      }
// $username = getUsername($user_id);
$sql = "INSERT INTO replies (user_id,username, user_email,comment_id,post_id, reply_content, reply_time ) VALUES ('".$_SESSION['user_id']."','".getUsername($user_id)."','$email','$comment_id','$post_id','$reply','$time')";
$send = $database->query($sql);


}

// if($commenter_id ==0){
// 	$name = $username;
// }else{
// 	$name= getUsername($commenter_id);
// }

//  $notification = '
//                     <a href="all-comment.php" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: blue; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-comments"> </i></div><div> <strong>'.$name.'</strong> '.$pendingComment_replies.' Users replied to your Comment '.substr($comment, 0, 50).'...'.' ';


//               $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ((SELECT id FROM users WHERE role = 'Administrator' AND user_acctStatus = 'Active'),'New comment_reply','".$notification."','".date('Y-m-d H:i:s')."')";
//               $send = $database->query($sql);
}





}


function replies_count($comment_id='')
{
	global $database;
	$sql = "SELECT COUNT(id) AS total FROM replies WHERE comment_id = $comment_id";
	 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
  return $row['total'];}
}



?>