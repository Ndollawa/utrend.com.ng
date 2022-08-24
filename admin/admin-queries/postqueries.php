<?php
include '../../backend/database.php';
include '../../backend/timeAgo.php';
include '../../backend/functions.php';
session_start();
// use unicalCSphp\UploadFile;
ob_start();
if(isset($_POST['action'])) {
 $output ="";

if($_POST['action'] == 'delete-post'){
$post_id = $_POST['id'];
$query = "UPDATE posts SET post_status = 'Deleted' WHERE id = '".$post_id."'";
$send= $database->query($query);
		}

		}

?>
<?php



use unicalCSphp\UploadFile;
$msg ="";
$Fname= array();
$result= array();
if(isset($_POST['post-Submit'])){

  require_once 'src/unicalCSphp/UploadFile.php';
  $destination = '../assets/images/blog/';
  $post_title = $db->escape_value($_POST['post-title']);
  $post_cat = $db->escape_value($_POST['post-cat']);
  $post_tag= $db->escape_value($_POST['post-tags']);
  $post_content = $db->escape_value($_POST['post-content']);
  $post_status = $db->escape_value($_POST['post-status']);
  // $post_author = $db->escape_value($_SESSION['username']);
  $post_author = $db->escape_value('Usman Bitrus');
  $post_time = date('Y-m-d, H:s:a');
if(!empty($post_title) && !empty($pst_cat) && !empty($post_tag) && !empty($post_conetent) ){
// $max = 1000*1024;

  $file = uploadfile($destination,(327680),'');
      // print_r($file);
      $file = json_decode($file);
      $uploadstatus = $file[0];
       $file_type = $file[3];
         $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
  if($uploadstatus !== "Error"){
    $user_image = $database->escape_value($file[2][$i]);
    $image_fileType = $database->escape_value($file[3][$i]);
    $q = "INSERT INTO  post_attachments (post_id,file_name,file_type,file_index)  VALUES('$post_id','$post_attachment','$post_attachment_fileType','".$i."')";
    $send = $database->query($q);
}else{
  echo ($file);
}
}


           $password= password_hash($password, PASSWORD_BCRYPT);
              $sql="SELECT ID FROM users WHERE USERNAME = '{$username}'";
              $result= $db->query ($sql);
              $row= mysqli_fetch_array($result);
            if($row>0){
             
            }
            else{
               $sql= "INSERT INTO posts (post_title,post_content,post_status, post_tag,author,category,post_cover,post_time) VALUES('$post_title','$post_content','$post_status','post_tag',post_author,'post_cat','post_file','post_time')";  
               $result= $db->query ($sql);
      //               $sql = "INSERT INTO students (USER_ID,ROLL_NO,FIRST_NAME, MIDDLE_NAME, LAST_NAME,DOB,GENDER,ADDRESS,TELEPHONE,EMAIL,MATRIC_NUMBER,REG_NO,PARENT_GUARDIAN_NAME,PARENT_GUARDIAN_PHONE_NO,STUDENT_LEVEL,ENROLLMENT_DATE, PROGRAMME,ACADEMIC_SESSION,CREATED_TIME, USER_IMAGE)  
      //                VALUES ((SELECT ID FROM users WHERE USERNAME = '{$username}'),'$rollNo','$firstname', '$middlename', '$lastname', '$dob', '$gender', '$address', '$number', '$email', '$matricNo',  '$regNo', '$parentName', '$parentNumber', '$level','$enrollment','$programme','$academic_session','$post_time', '$user_image')";
      //          $result= $db->query ($sql);

      // $notification_sql ="SELECT ID FROM users WHERE USERNAME = '{$username}'";
      // $result=$database->query($notification_sql);
      // $row=$database->fetch_array($result);
      // foreach ($result as $row) {
      //   $user_id = $row['ID'];
      //   $notification = '<li>
      //                 <a href="javascript:;">
      //                   <span class="time">'.calculate_time_span($date).'</span>
      //                   <span class="details">
      //                     <span class="notification-icon circle deepPink-alert alertcolor"><i
      //                         class="fa fa-check"></i></span>
      //                     <b>'.getUsername($user_id).'</b> Congratulations!. Feel free to setup your account details.  </span>
      //                 </a>
      //               </li>
      //             ';
      //         $sql = "INSERT INTO notifications (RECEIVER_ID, NOTIFICATION, NOTIME) VALUES ('".$row['ID']."','".$notification."','".$date."')";
      //         $send = $database->query($sql);

      //       }     
                    $msg ='<h4 style="margin:0 10px 0 10px;" class="alert alert-success"><center>  New record created successfully <i class=" icon-holder material-icons f-left" style="color:green;">done_all</i></center></h4>';
                }
      }else {
           $msg ='<h4 style="margin:0 10px 0 10px;" class="alert alert-danger"><center>Please fill out all entries..</center></h4>';
   }




}



		?>


                                
                            