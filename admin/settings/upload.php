<?php
use unicalCSphp\UploadFile;
$msg ="";
$Fname= array();
$result= array();
 $message= "";
if(isset($_POST['action'])){

include '../../backend/database.php';
include '../../backend/timeAgo.php';
include'../../backend/functions.php';
			if($_POST['action'] == 'upload_favicon'){
	$file_obj =	uploadfile('../../assets/images/','',(99927680),'');
			// print_r($file);
			$file = json_decode($file_obj);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		$favicon = $database->escape_value($file[2][$i]);
		$file_type = $database->escape_value($file[3][$i]);
			$sql = "SELECT favicon FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
	$obj = $row['favicon'];
	deleteFile($obj,'../../assets/images/');
}
$sql="UPDATE general SET favicon = '".$favicon."' WHERE id = 1 ";
	$send= $database->query($sql);
	if($send){
	echo ($file_obj);
	}

			}else{
	echo ($file_obj);
		}
	}


}
   

			if($_POST['action'] == 'upload_brand_name_logo'){

	$file_obj =	uploadfile('../../assets/images/','',(99927680),'');
			// print_r($file);
			$file = json_decode($file_obj);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		$brand_name_logo = $database->escape_value($file[2][$i]);
		$file_type = $database->escape_value($file[3][$i]);
				$sql = "SELECT brand_name_logo FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
	$obj = $row['brand_name_logo'];
	deleteFile($obj,'../../assets/images/');
}
	$sql="UPDATE general SET brand_name_logo = '".$brand_name_logo."' WHERE id = 1 ";
	$send= $database->query($sql);
if($send){
		echo ($file_obj);
	}
		}else{
	echo ($file_obj);
}
	}

        

}

if($_POST['action'] == 'upload_logo'){

  // $max = 2000*1024;
	$file_obj =	uploadfile('../../assets/images/','',(99927680),'');
			// print_r($file);
			$file = json_decode($file_obj);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		 $logo = $database->escape_value($file[2][$i]);
		$file_type = $database->escape_value($file[3][$i]);
				$sql = "SELECT logo FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
	$obj = $row['logo'];
	deleteFile($obj,'../../assets/images/');
}
	$sql="UPDATE general SET logo = '".$logo."' WHERE id = 1 ";
	$send= $database->query($sql);
if($send){
			echo ($file_obj);
	}
		}else{
	echo ($file_obj);
}
	}

}
if($_POST['action'] == 'upload_loader'){

  // $max = 2000*1024;
	$file_obj =	uploadfile('../../assets/images/','',(99927680),'');
			// print_r($file);
			$file = json_decode($file_obj);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		 $loader = $database->escape_value($file[2][$i]);
		$file_type = $database->escape_value($file[3][$i]);
			$sql = "SELECT loader FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$obj = $row['loader'];
	deleteFile($obj,'../../assets/images/');
}
	$sql="UPDATE general SET loader = '".$loader."' WHERE id = 1 ";
	$send= $database->query($sql);
if($send){
			echo ($file_obj);
	}
		}else{
	echo ($file_obj);
}
	}

}

if($_POST['action'] == 'upload_bg-image'){

  // $max = 2000*1024;
	$file_obj =	uploadfile('../../assets/images/','',(99927680),'');
			// print_r($file);
			$file = json_decode($file_obj);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		 $bg_image = $database->escape_value($file[2][$i]);
		$file_type = $database->escape_value($file[3][$i]);
			$sql = "SELECT background_image FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$obj = $row['background_image'];
	deleteFile($obj,'../../assets/images/');
}
	$sql="UPDATE general SET background_image = '".$bg_image."' WHERE id = 1 ";
	$send= $database->query($sql);
if($send){
			echo ($file_obj);
	}
		}else{
	echo ($file_obj);
}
	}

}


if($_POST['action'] == 'upload_lsbg-image'){

  // $max = 2000*1024;
	$file_obj =	uploadfile('../../assets/images/','',(99927680),'');
			print_r($file_obj);
			$file = json_decode($file_obj);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		 $bg_image = $database->escape_value($file[2][$i]);
		$file_type = $database->escape_value($file[3][$i]);
			$sql = "SELECT login_signup_bg FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$obj = $row['login_signup_bg'];
	deleteFile($obj,'../../assets/images/');
}
	$sql="UPDATE general SET login_signup_bg = '".$bg_image."' WHERE id = 1 ";
	$send= $database->query($sql);
if($send){
			echo ($file_obj);
	}
		}else{
	echo ($file_obj);
}
	}

}


if($_POST['action'] == 'turnOn_fixedMenu'){
$sql = "UPDATE general SET fixedMenu = 'true' WHERE id =1";
$send = $database->query($sql);
}elseif ($_POST['action'] == 'turnOff_fixedMenu') {
$sql = "UPDATE general SET fixedMenu = 'false' WHERE id =1";
$send = $database->query($sql);

}

if($_POST['action'] == 'turnOn_fixedSidebar'){
$sql = "UPDATE general SET fixedSidebar = 'true' WHERE id =1";
$send = $database->query($sql);
}elseif ($_POST['action'] == 'turnOff_fixedSidebar') {
$sql = "UPDATE general SET fixedSidebar = 'false' WHERE id =1";
$send = $database->query($sql);

}
if($_POST['action'] == 'turnOn_slideRTL'){
$sql = "UPDATE general SET slideRTL = 'true' WHERE id =1";
$send = $database->query($sql);
}elseif ($_POST['action'] == 'turnOff_slideRTL') {
$sql = "UPDATE general SET slideRTL = 'false' WHERE id =1";
$send = $database->query($sql);

}

if($_POST['action'] == 'turnOn_show_login_signup'){
$sql = "UPDATE general SET login_signup= 'true' WHERE id =1";
$send = $database->query($sql);
}elseif ($_POST['action'] == 'turnOff_show_login_signup') {
$sql = "UPDATE general SET login_signup = 'false' WHERE id =1";
$send = $database->query($sql);

}


}

?>