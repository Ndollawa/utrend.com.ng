<?php
use unicalCSphp\UploadFile;



function count_replies($comment_id){
  global $database;
  $sql = "SELECT * FROM replies WHERE post_id = '".$post_id."'";
  $result = $database->query($sql);
  $repliesCount= $database->num_rows($result);
  return $repliesCount;
}

function count_comment($post_id){
  global $database;
  $sql = "SELECT * FROM comments WHERE POST_ID = '".$post_id."'";
  $send= $database->query($sql);
  $commentCount = $database->num_rows($send);
  return $commentCount;

}
function make_follow_button($follower_id,$following){
  global $database;
  $sql=" SELECT * FROM follow WHERE FOLLOWER_ID='".$follower_id."' AND FOLLOWING = '".$following."'";
  $send= $database->query($sql);
  $followCount = $database->num_rows($send);
  $output= '';
  if($followCount > 0){
  $output= '<button type="button" id = "follow-btn"  name="follow_button" class="btn btn-primary mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  btn-circle action_button  action_button" style="border-radius:15px; padding: 5px 10px;" data-action="unfollow" data-following="'.$following.'">Following</button>';
  }else{
  $output= '<button type="button" id = "follow-btn"  name="follow_button" class="btn btn-info mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  btn-circle action_button action_button" style="border-radius:15px; padding: 5px 10px;" data-action="follow" data-following="'.$following.'"><i class= "glyphicon glyphicon-plus"></i>Follow</button>';
  }
  return $output;
}
function make_friend_button($user_id,$friend_id){
  global $database;
  $sql=" SELECT * FROM friends WHERE USER_ID='".$user_id."' AND FRIEND_ID = '".$friend_id."'";
  $send= $database->query($sql);
  $result=$database->fetch_array($send);
  $friendCount = $database->num_rows($send);
  $output= '';
  if($friendCount > 0){
    foreach ($send as $result) {
    $status = $result['STATUS'];
    }
    if($status == 'accepted'){
  $output= '<button type="button" id="friend-btn" name="friend_button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  btn-circle action_button" data-action="unfriend" data-friend_id="'.$friend_id.'"><i class="material-icons f-left" style="color:green;">group</i><i style="color:green;" class="fa fa-check "></i></button>';}
  elseif($status == 'pending'){
  $output= '<button type="button" id="friend-btn" name="friend_button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  btn-circle action_button" data-action="cancelRequest" data-friend_id="'.$friend_id.'"><i class="material-icons f-left " style="color:blue;">people</i><i class="fa fa-times" style="color:blue;"></i></button>';}
  }else{
  $output= '<button type="button" id="friend-btn" name="friend_button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  btn-circle btn-primary action_button" data-action="friend" data-friend_id="'.$friend_id.'"><i class="material-icons f-left">person_add</i></button>';
  }
  return $output;
}
function make_like_button($post_id,$user_id){
  global $database;
  $sql=" SELECT * FROM post_likes WHERE POST_ID='".$post_id."' AND USER_ID = '".$user_id."'";
  $send= $database->query($sql);
  $likeCount = $database->num_rows($send);
  $output= '';
  if($likeCount > 0){
    $output = ' <button id="likes" name="likes" type="button" style="border-radius:15px; padding: 5px 10px;" class="  btn btn-raised btn-info btn-sm action_button" data-toggle="tooltip" data-action="unlike" data-post_id="'.$post_id.'"><i class="fa fa-heart-o like-button" ></i> Unlike ('.total_post_like($post_id).') </button>';}
  else{
      $output = '<button id="likes" name="likes" type="button" style="border-radius:15px; padding: 5px 10px;" class="  btn btn-raised btn-info btn-sm action_button"  data-toggle="tooltip" data-action="like" data-post_id="'.$post_id.'"><i class="fa fa-heart-o like-button" ></i> Like ('.total_post_like($post_id).') </button>'; }
  return $output;
}
function deleteFile($file,$destination){
  $filename = $destination.$file;
  unlink($filename);
}
function uploadfile($destination,$uploaditem=null,$max_size=null,$allowedTypes=null){
 $output ="";
  $Fname= array();
      $FType = array();
      $FTname = array();
      $status = array();
       $uploadDetails= array();
      require_once '../src/unicalCSphp/UploadFile.php';
        // $destination = '../assets/images/blog/';
        // $max = 2000*1024;
      try{
            $upload = new UploadFile($destination,$uploaditem);
            $upload->setMaxSize($max_size);
            $upload->allowAllTypes($allowedTypes);
            $upload->upload();
            $result=$upload->getMessages();
            $Fname=$upload->getName();
            $FTname=$upload->getFTname();
            $FType=$upload->getFType();
            $status = $upload->getStatus();
            $uploadDetails = $upload->getuploadDetails();
          }catch(Exception $e){
          $result[]=$e->getMessage();
          // $Fname[]= $e->getMessage();
          }
        $response = array($status,$result,$Fname,$FType);
          // $response = $uploadDetails;
            return json_encode($response);
                              }


function uploadfile2($destination,$uploaditem=null,$max_size=null,$allowedTypes=null){
 $output ="";
  $Fname= array();
      $FType = array();
      $FTname = array();
      $status = array();
       $uploadDetails= array();
      // require_once '../../src/unicalCSphp/UploadFile.php';
      require_once __DIR__.'/../src/unicalCSphp/UploadFile.php';
        // $destination = '../assets/images/blog/';
        // $max = 2000*1024;
      try{
            $upload = new UploadFile($destination,$uploaditem);
            $upload->setMaxSize($max_size);
            $upload->allowAllTypes($allowedTypes);
            $upload->upload();
            $result=$upload->getMessages();
            $Fname=$upload->getName();
            $FTname=$upload->getFTname();
            $FType=$upload->getFType();
            $status = $upload->getStatus();
            $uploadDetails = $upload->getuploadDetails();
          }catch(Exception $e){
          $result[]=$e->getMessage();
          // $Fname[]= $e->getMessage();
          }
        $response = array($status,$result,$Fname,$FType);
          // $response = $uploadDetails;
            return json_encode($response);
                              }
function total_post_like($post_id){
  global $database;
  $sql = "SELECT * FROM post_likes WHERE POST_ID = '".$post_id."'";
  $send = $database->query($sql);
  $Tpost_like = $database->num_rows($send);
  return $Tpost_like;
}
function total_crs_like($crs_id){
  global $database;
  $sql = "SELECT * FROM course_likes WHERE COURSE_ID = '".$crs_id."'";
  $send = $database->query($sql);
  $Tcrs_like = $database->num_rows($send);
  return $Tcrs_like;
}
function getUsername($user_id){
  global $database;
  $fullname = '';
  $sql = "SELECT * FROM users WHERE id = '".$user_id."'";
  $result = $database->query($sql);
  $row = $database->fetch_array($result);
  foreach ($result as $row) {
    $user_account_type = $row['account_type'];
      $username = $row['username'];
      $email= $row['email'];
      $account_type= $row['account_type'];
      $user_acctStatus = $row['user_acctStatus'];
      $fname=  $row['first_name'];
     $lname =  $row['last_name'];
    $user_name = $fname." ".$lname;
      if(!isset($user_name)){
    return $username;
  }else{
   return $user_name;
  }
      }

}

 function notificationCount($receiver_id){
  global $database;
 $sql ="SELECT * FROM notifications WHERE user_id='".$receiver_id."' AND notification_status = 'unread' ";
 $result =$database->query($sql);
  return $row=$database->num_rows($result);
 
}

function friendRequestCount($receiver_id){
  global $database;
 $sql ="SELECT COUNT(ID) as total FROM friends WHERE FRIEND_ID ='".$receiver_id."' AND STATUS = 'pending' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
  return $row['total'];
 }
}
function msgCount($to_user_id){
  global $database;
 $sql ="SELECT COUNT(ID) as total FROM msgnotifications WHERE TO_USER_ID ='".$to_user_id."' AND STATUS = 'unread' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
  return $row['total'];
 }
}



function fetch_user_last_activity($user_id){
  global $database;
  $last_activity = '';
  $sql = "SELECT * FROM sessions WHERE user_id = '".$user_id."' ORDER BY last_activity DESC LIMIT 1";
  $result = $database->query($sql);
  $row = $database->num_rows($result);
  foreach ($result as $row ) {
    $last_activity = $row['last_activity'];
  } return $last_activity;
}
function getUserPic($user_id){
  global $database;
   if($user_id == "" || $user_id == 0){
return $output="default-user-image1.jpeg";
}else{
  $sql = "SELECT * FROM users WHERE id = '".$user_id."'";
  $result = $database->query($sql);
  $row = $database->fetch_array($result);
  foreach ($result as $row) {
      $profilePic = $row['user_image'];
      if($profilePic == ""){

return $output="default-user-image1.jpeg";
      }else{
     return $output='users-pics/'.$profilePic .'';
      }

    }
  }
  }


function getUser_statusDot($user_id){
           $dot ='';
     $current_timestamp =strtotime(date('Y-m-d H:i:s'));
         $user_last_activity = fetch_user_last_activity($user_id);
      //And the time the notification was set
      $fromTime = strtotime($user_last_activity);
      //Now calc the difference between the two
      $timeDiff = floor(abs($current_timestamp - $fromTime) / 60);
      //Now we need find out whether or not the time difference needs to be in
      //minutes, hours, or days
  if ($timeDiff < 10) {
        $dot =' <i class="online dot"></i>'; }
    elseif ($timeDiff > 10 && $timeDiff < 20) {
        $dot='<i class="busy dot"></i>';}
    elseif ($timeDiff > 20 && $timeDiff < 40) {
        $dot =' <i class="away dot"></i>'; }
  else{ $dot =' <i class="offline dot"></i>';}
  return $dot;
}

function getUser_status($user_id){
           $status ='';
     $current_timestamp =strtotime(date('Y-m-d H:i:s'));
         $user_last_activity = fetch_user_last_activity($user_id);
      //And the time the notification was set
      $fromTime = strtotime($user_last_activity);
      //Now calc the difference between the two
      $timeDiff = floor(abs($current_timestamp - $fromTime) / 60);
      //Now we need find out whether or not the time difference needs to be in
      //minutes, hours, or days
  if ($timeDiff < 40) {
      $status = "online"; }
  else{ $status = "offline";}
  return $status;
}
function user_msgCount($user_id){
global $database;
 $sql ="SELECT COUNT(MSG_ID) as total FROM messages WHERE TO_USER_ID ='".$_SESSION['user_id']."' AND FROM_USER_ID = '".$user_id."' AND STATUS = 'unread' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
  return $row['total'];
 }
}
function getTyping_status ($from_user_id, $to_user_id){
global $database;
$sql = "SELECT TYPING_STATUS FROM messages  WHERE USER_ID =$to_user_id AND TO_USER_ID = $from_user_id ORDER BY MSG_ID DESC";
$result =$database->query($sql);
$row=$database->fetch_array($result);
 foreach ($result as $row) {
  if($row['TYPING_STATUS'] == 'typing'){
    $status= '<small>'.getUsername($to_user_id).'<em><span class="text-muted"> is Typing...</span></em></small>';
  }elseif ($row['TYPING_STATUS'] == 'not_typing') {
  $status= '';
  }
return $status;
}
}


function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) {
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

function __spl_autoload_register($class_name) {
	$class_name = strtolower($class_name);
  $path = "../backend/{$class_name}.php";
  if(file_exists($path)) {
    require_once($path);
  } else {
		die("The file {$class_name}.php could not be found.");
	}
}

?>