<?php 
// use unicalCSphp\UploadFile;
// $msg ="";
// $Fname= array();
// $result= array();
//  $message= "";
if(isset($_POST['action'])){

include '../../backend/database.php';
include '../../backend/timeAgo.php';
include'../../backend/functions.php';


if($_POST['action']== 'getsitelogo'){
$sql = "SELECT logo FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
// $user_id = $row['id'];
// 	$favicon=  $row['favicon'];
	// $brand_name_logo =  $row['brand_name_logo'];
	
	 $logo =  $row['logo'];
$output = '<div style="background-color: #ccc; padding: 10px; border: 2px solid #f68600; border-radius: 2%;" class="container">'; if(!empty($logo)){$output .='<button type="button" class="text-danger m-2 p-2 float-right remove-img" data-tb_column="logo" data-action="getlogo" data-imgname="'.$logo.'" style="postion:absolute; z-index:2;top:5px;right:5px;"title="Remove"> <i class="fa fa-trash" style="font-size:1.2em;"></i></button>';}
	$output .='	<img  class="img-responsive" src="../assets/images/'.$logo.'" alt="logo"/></div>';		
		echo $output;
		}
		
	}

	if($_POST['action']== 'getsite-background_image'){
$sql = "SELECT background_image FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
// $user_id = $row['id'];
// 	$favicon=  $row['favicon'];
	// $brand_name_loader =  $row['brand_name_loader'];
	$background_image =  $row['background_image'];
$output = '<div style="background-color: #ccc; padding: 10px; border: 2px solid #f68600; border-radius: 2%;" class="container">';
if(!empty($background_image)){$output .='<button type="button" class="text-danger m-2 p-2 float-right remove-img" data-tb_column="background_image" data-action="getbackground_image" data-imgname="'.$background_image.'" style="postion:absolute; z-index:2;top:5px;right:5px;"title="Remove"> <i class="fa fa-trash" style="font-size:1.2em;"></i></button>';}		$output .='<img  class="img-responsive" src="../assets/images/'.$background_image.'" alt="logo"/></div>';		
		echo $output;
		}
		
	}

	if($_POST['action']== 'remove_site_file'){
		$tb_column = $_POST['tb_column'];
		$sql="UPDATE general SET $tb_column = '' WHERE id = 1 ";
	$send= $database->query($sql);
	if($send){
deleteFile($_POST['imgName'], '../../assets/images/');
}
	}



if($_POST['action']== 'getsite-lsbackground_image'){
$sql = "SELECT login_signup_bg FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
// $user_id = $row['id'];
// 	$favicon=  $row['favicon'];
	// $brand_name_loader =  $row['brand_name_loader'];
	$ls_bg =  $row['login_signup_bg'];
$output = '<div style="background-color: #ccc; padding: 10px; border: 2px solid #f68600; border-radius: 2%;" class="container">';
if(!empty($ls_bg)){$output .='<button type="button" class="text-danger m-2 p-2 float-right remove-img" data-action="getlsbackground_image" data-tb_column="login_signup_bg" data-imgname="'.$ls_bg.'" style="postion:absolute; z-index:2;top:5px;right:5px;"title="Remove"> <i class="fa fa-trash" style="font-size:1.2em;"></i></button>';}$output .='<img  class="img-responsive" src="../assets/images/'.$ls_bg.'" alt="logo"/></div>';		
		echo $output;
		}
		
	}


	if($_POST['action']== 'getsiteloader'){
$sql = "SELECT loader FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
// $user_id = $row['id'];
// 	$favicon=  $row['favicon'];
	// $brand_name_loader =  $row['brand_name_loader'];
	$loader =  $row['loader'];
$output = '<div style="background-color: #ccc; padding: 10px; border: 2px solid #f68600; border-radius: 2%;" class="container">';
if(!empty($loader)){$output .='<button type="button" class="text-danger m-2 p-2 float-right remove-img" data-tb_column="loader" data-action="getloader" data-imgname="'.$loader.'" style="postion:absolute; z-index:2;top:5px;right:5px;"title="Remove"> <i class="fa fa-trash" style="font-size:1.2em;"></i></button>';}		$output .='		<img  class="img-responsive" src="../assets/images/'.$loader.'" alt="logo"/></div>';		
		echo $output;
		}
		
	}
	if($_POST['action']== 'getsitebrandname_logo'){
$sql = "SELECT brand_name_logo FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
// $user_id = $row['id'];
// 	$favicon=  $row['favicon'];
	$brand_name_logo =  $row['brand_name_logo'];
	// $logo =  $row['logo'];
	$output = '<div style="background-color: #ccc; padding: 10px; border: 2px solid #f68600; border-radius: 2%;" class="container">';
if(!empty($brand_name_logo)){$output .='<button type="button" class="text-danger m-2 p-2 float-right remove-img" data-tb_column="brand_name_logo" data-action="getbrandname_logo" data-imgname="'.$brand_name_logo.'" style="postion:absolute; z-index:2;top:5px;right:5px;"title="Remove"> <i class="fa fa-trash" style="font-size:1.2em;"></i></button>';} $output .='<img  class="img-responsive" src="../assets/images/'.$brand_name_logo.'" alt="logo"/></div>';		
		echo $output;
		}
	
	}

if($_POST['action']== 'getsitefavicon'){
$sql = "SELECT favicon FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
// $user_id = $row['id'];
	$favicon=  $row['favicon'];
	// $brand_name_logo =  $row['brand_name_logo'];
	// $logo =  $row['logo'];
$output = '<div style="background-color: #ccc; padding: 10px; border: 2px solid #f68600; border-radius: 2%; class="container">';
if(!empty($favicon)){$output .='<button type="button" class="text-danger m-2 p-2 float-right remove-img" data-action="getfavicon" data-tb_column="favicon" data-imgname="'.$favicon.'" style="postion:absolute; z-index:2;top:5px;right:5px;"title="Remove"> <i class="fa fa-trash" style="font-size:1.2em;"></i></button>';}		$output .='<img  class="img-responsive" src="../assets/images/'.$favicon.'" width="100" alt="logo"/></div>';		
		echo $output;
		}
		
	}
}?>