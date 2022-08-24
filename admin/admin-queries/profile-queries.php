<?php
use unicalCSphp\UploadFile;
$msg ="";
$Fname= array();
$result= array();
 $message= "";





if(isset($_POST['action'])) {

include '../../backend/database.php';
include '../../backend/timeAgo.php';
include'../../backend/functions.php';
session_start();
ob_start();



			if($_POST['action'] == 'upload_profpic'){
	$user_id =$_SESSION['user_id'];
$Fname= array();
$FType = array();
$FTname = array();
  $destination = '../../assets/images/users-pics';
  // $max = 2000*1024;
$file =	uploadfile($destination,(327680),'');
			print_r($file);
			$file = json_decode($file);
			$uploadstatus = $file[0];
			$filename = $file[2];
			 $file_type = $file[3];
		     $count = count($filename) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
	 $profpic = $database->escape_value($filename[$i]);
$sql="SELECT user_image FROM users WHERE id = '".$user_id."' ";
	$send= $database->query($sql);
	$row =$database->fetch_array($send);
		if($row >0){
				foreach ($send as $row) {
                            		$files = $row['user_image'];
                            		}
                            	 // $count = count($files) ;

                        // for($x=0;$x<$count;$x++) {
                            		 	if (!empty($files)){
                            		 deleteFile( $files,$destination);

                            		}
                            	}
                            // }
if($send){
		
		$_SESSION['user_image'] = $profpic;
	}


$sql="UPDATE users SET user_image = '".$profpic."' WHERE id = '".$user_id."' ";
	$send= $database->query($sql);
if($send){

		$_SESSION['user_image'] = $profpic;
	}
		
	}else{
	echo ($database->escape_value($file));
}




			}
        }



if($_POST['action']== 'getuserpic'){
$user_id = $_SESSION['user_id'];
$sql="SELECT * FROM users WHERE id = '".$user_id."' ";
	$result= $database->query($sql);
	$row = $database->fetch_array($result);
	foreach ($result as $row) {

			$user_image = $row['user_image'];
		}
		$output = '<a class="profpic" href="../assets/images/'.getUserpic($_SESSION['user_id']).'" data-lightbox="profpic" ><img src="../assets/images/'.getUserpic($_SESSION['user_id']).'" alt="user-img" class="avatar avatar-lgavatar  avatar-xl brround avatar-md" /></a>';
		echo $output;
	}

if($_POST['action']== 'getuserpic2'){
$user_id = $_SESSION['user_id'];
$sql="SELECT * FROM users WHERE id = '".$user_id."' ";
	$result= $database->query($sql);
	$row = $database->fetch_array($result);
	foreach ($result as $row) {

			$user_image = $row['user_image'];
		}
		$output = '<img src="../assets/images/'.getUserpic($_SESSION['user_id']).'" alt="profile-img" class="avatar avatar-md brround">';
		echo $output;
	}
  if($_POST['action']== 'checkUsername'){
    $username = $_POST['username'];
      $sql="SELECT id FROM users WHERE username = '{$username}'";
              $result= $db->query ($sql);
              $row= mysqli_fetch_array($result);
            if($row>0){
             $msg='<h4 style="margin:0 10px 0 10px;" class="alert alert-danger"><center>Username already taken!</center></h4>';
           echo $msg; }
            else{
              $msg='<h4 style="margin:0 10px 0 10px;" class="alert alert-success"><center>Username not taken <i class="fa fa-check"></i></center></h4>';
            echo $msg;}

	}



}







$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user_id']."' ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
$user_id = $row['id'];
	$user_username = $row['username'];
	$fname=  $row['first_name'];
	$lname =  $row['last_name'];
	$about_me =  $row['about_me'];
	$user_email =  $row['email'];
	$user_role =  $row['role'];
	$user_acctStatus =  $row['user_acctStatus'];
	$account_type =  $row['account_type'];
	$phone_no =  $row['phone_no'];
	$user_bio =  $row['user_bio'];
	$address = $row['address'];
	$city =  $row['city'];
	$zip_code =  $row['zip_code'];
	$country = $row['country'];
	$company = $row['company'];
	$user_image = $row['user_image'];
	$coverpic = $row['cover_pic'];
	$facebooklink = $row['facebooklink'];
	$twitterhandle = $row['twitterhandle'];
	$externallink =  $row['externallink'];
	$instagrampage = $row['instagrampage'];
	$youtube = $row['youtube'];
	$user_name = $fname." ".$lname;

}
// echo $user_name = getUsername($_SESSION['user_id']);
// echo $user_image = getUserpic($_SESSION['user_id']);
if(isset($_POST['update-profile'])){

require_once 'src/unicalCSphp/UploadFile.php';
  $destination = '../assets/images/users-coverpics';
	$user_username = $database->escape_value(lcfirst($_POST['username']));
	$fname=  $database->escape_value($_POST['fname']);
	$lname =  $database->escape_value($_POST['lname']);
	$about_me =  $database->escape_value($_POST['about-me']);
	$user_email =  $database->escape_value(lcfirst($_POST['email']));
	// $user_bio =  $database->escape_value($_POST['user-bio']);
	$address = $database->escape_value($_POST['address']);
	$city =  $database->escape_value($_POST['city']);
	$zip_code =  $database->escape_value($_POST['zip-code']);
	$country = $database->escape_value(ucfirst($_POST['country']));
	$company = $database->escape_value($_POST['company']);
	$facebooklink = $database->escape_value(lcfirst($_POST['fblink']));
	$twitterhandle = $database->escape_value(lcfirst($_POST['twitterhandle']));
	// $externallink =  $database->escape_value(lcfirst($_POST['website']));
	$instagrampage = $database->escape_value(lcfirst($_POST['instagrampage']));
	$youtube = $database->escape_value(lcfirst($_POST['youtube']));
// $Fname= array();
// $FType = array();
// $FTname = array();
  // $max = 2000*1024;
try{
      $upload = new UploadFile($destination);
      $upload->setMaxSize('');
      $upload->allowAllTypes();
      $upload->upload();
      $result=$upload->getMessages();
      $Fname=$upload->getName();
      $FTname=$upload->getFTname();
      $FType=$upload->getFType();
    }catch(Exception $e){
    $result[]=$e->getMessage();
    // $Fname[]= $e->getMessage();
    }

foreach ($Fname as $key){
           $coverpic = $key;
            }

foreach ($result as $key){
           $msg = $key;
     echo '<script type="text/javascript"> alert ('.$msg.')</script>';
            }
$sql = "UPDATE users SET username = '$user_username', first_name = '$fname', last_name = '$lname', email = '$user_email', about_me = '$about_me',address = '$address',company ='$company',city = '$city',zip_code = '$zip_code', country = '$country',";
if(isset($coverpic)){
$sql .=	"cover_Pic ='$coverpic',";
}
$sql .="facebooklink = '$facebooklink',twitterhandle = '$twitterhandle',  instagrampage = '$instagrampage',  youtube = '$youtube' WHERE id = '".$_SESSION['user_id']."' ";
$send = $database->query($sql);
if($send){
	$message = '<h4 style="margin:10px  10px; padding:5px;" class="alert alert-success"><center>  profile record updated successfully <i class=" icon-holder material-icons f-left" style="color:white;">done_all</i></center></h4>';

      }else {
           $msg ='<h4 style="margin:10px  10px; padding:5px;" class="alert alert-danger"><center>Please fill out all entries..</center></h4>';
   }
}

if(isset($_POST['pfsetting1'])){
	// $about_me =  $database->escape_value($_POST['about-me']);
	$user_email =  $database->escape_value(lcfirst($_POST['email']));
	$user_bio =  $database->escape_value($_POST['user-bio']);
	$externallink =  $database->escape_value(lcfirst($_POST['website']));
	$passw =  $database->escape_value($_POST['password']);
	$passw2 =  $database->escape_value(lcfirst($_POST['confirmpassword']));
	$sql = "UPDATE users SET email = '$user_email', user_bio= '$user_bio', externallink = '$externallink' ";
	if(isset($passw) && isset($passw2)){
		if($passw == $passw2){
			if(!empty($passw) || $passw != ""){
			 $password= password_hash($passw, PASSWORD_BCRYPT);

			$sql .=", password = '".$password."'";
		}}
	}
	$sql .="WHERE id = '".$_SESSION['user_id']."'";
$send = $database->query($sql);
if($send){
	$message = '<h4 style="margin:10px  10px; padding:5px;" class="alert alert-success"><center>  profile record updated successfully <i class=" icon-holder material-icons f-left" style="color:white;">done_all</i></center></h4>';

      }else {
           $msg ='<h4 style="margin:10px  10px; padding:5px;" class="alert alert-danger"><center>Please fill out all entries..</center></h4>';
   }
}


?>
