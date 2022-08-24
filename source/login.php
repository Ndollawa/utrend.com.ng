<?php 
require_once ('../backend/database.php');
session_start();
ob_start();
if(isset($_SESSION['account_type'])) {
  header("Location:../index.php");
    exit();
}

$sql = "SELECT * FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
$user_id = $row['id'];
    $website_name = $row['website_name'];
    $website_link = $row['website_link'];
    $site_description = $row['site_description'];
     $fixedMenu=  $row['fixedMenu'];
    $fixedSidebar =  $row['fixedSidebar'];
    $slideRTL=  $row['slideRTL'];
    $favicon=  $row['favicon'];
    $brand_name_logo =  $row['brand_name_logo'];
    $logo =  $row['logo'];
    // $about_us =  $row['about_us'];
    $address = $row['address'];
    $city =  $row['city'];
    $zip_code =  $row['zip_code'];
    $country = $row['country'];
    $sfacebooklink = $row['facebooklink'];
    $stwitterhandle = $row['twitterhandle'];
    $sinstagrampage = $row['instagrampage'];
    $syoutube = $row['youtube'];

}
$sql = "SELECT * FROM blog_settings WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
    $about_us = $row['about_us'];
    $privacy=  $row['privacy'];
    $contact_us =  $row['contact_us'];
    $social_login =  $row['social_login'];
    // $about_us =  $row['about_us'];
    

}
$message = "";
// $_SESSION['message'] = "";
if(isset($_POST['login-submit'])){
	$user_email = $db->escape_value($_POST['email']);
	$password = $db->escape_value($_POST['password']);
	// $username = strtolower($username);
	$user_email = $database->escape_value(lcfirst($user_email));
    $password = $database->escape_value($password);
    $sql  = "SELECT * FROM users WHERE email ='{$user_email}' LIMIT 1";
      $result= $database->query ($sql);
			if(!$result){
				die("QUERY FAILED".mysqli_error());
			}
			$row = mysqli_fetch_array($result);
			if($row>0){
			foreach ($result as $row) {
			$user_id = $row['id'];
			$username = $row['username'];
			$user_password = $row['password'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$user_email = $row['email'];
			$user_acctStatus = $row['user_acctStatus'];
			$user_phone_no = $row['phone_no'];
			$user_account_type = $row['account_type'];
			$user_role = $row['role'];}
			switch ($user_acctStatus) {
				case 'Deleted':			
					$message = "<strong style='color:red'>SORRY: Your account has been deleted!</strong>";
 
					break;
				case 'Banned':			
					$message = "<strong style='color:red'>SORRY: Your account has been banned!</strong>";
 
					break;
				default:
						$password = password_verify($password, $user_password);
						if($password==$user_password){
										$_SESSION['user_id'] = $user_id;
								  	$_SESSION['username'] = $username;
								  	$_SESSION['account_type'] = $user_account_type;
								  	$_SESSION['user_role'] = $user_role;
								  	$_SESSION['user_acctStatus'] = $user_acctStatus;
								// foreach ($subresult as $output) {
								// $Fname = $output['FIRST_NAME'];
								// $Mname = $output['MIDDLE_NAME'];
								// $Lname= $output['LAST_NAME'];
								// if($user_account_type == 'STUDENT'){
								//  $_SESSION['student_level'] = $output['STUDENT_LEVEL'];} 		
								// $_SESSION['gender'] = strtolower($output['GENDER']);
								$_SESSION['user_image'] = $output['user_image'];
								$_SESSION['fullname']=$first_name." ".$last_name;
								if(isset($_POST['rememberme']) && $_POST['rememberme'] == 'true'){
									setcookie('email',$user_email, time()+60*60*7);
									$_SESSION['email'] = $user_email;

								}
								// $date =date('Y-m-d H:i:s');
								  	$session = session_id();
								  $sql = "SELECT * FROM sessions WHERE user_id = '".$_SESSION['user_id']."' LIMIT 1";
						$result = $database->query($sql);
						$sesrow = $database->num_rows($result);
						if($sesrow == 0){
						$uip = $_SERVER['REMOTE_ADDR'];
						$uos = $_SERVER['HTTP_USER_AGENT'];
						$date = date('Y-m-d H:i:s');
						$sql="INSERT INTO sessions (user_id,username,session_id,user_ip,user_os,last_activity) VALUES('$user_id','$username','$session','$uip','$uos','$date')";
						$insert= $database->query($sql);
						if(!$insert){
						die("QUERY FAILED".mysqli_error());
						}
						}else{
						$time = date('Y-m-d H:i:s');
						$sql="UPDATE sessions SET username = '$username', session_id = '".session_id()."', last_activity = '$time' WHERE sessions.user_id = '".$_SESSION['user_id']."'";
						$statement=$db->query($sql);
						}

						if($user_account_type == "Admin" && $user_role == "Administrator"){
							header ("location:../admin/index.php");
						}elseif($user_account_type == "Admin" && $user_role == "Developer"){
							header ("location:../admin/index.php");
						}elseif($user_account_type == "admin" && $user_role == "Moderator"){
							header ("location:../admin/index.php");
						}elseif($user_account_type == "Admin" && $user_role == "Editor"){
							header ("location:../admin/index.php");
						}elseif($user_account_type == "Subscriber" && $user_role == "Author"){ 
							header ("location:../admin/profile.php");}	
							 }else { $message = "<div class='alert alert-danger text-center' ><strong style='color:red'>Password incorrect!</strong></div>";}
										
					break;
			}

							 
							   }else{$message = "<div class='alert alert-danger text-center' ><strong style='color:red'>Your email is incorrect!</strong></div>"; }
			

   } 

?>
<!doctype html><!-- saved from url=(0014)about:internet -->
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="msapplication-TileColor" content="#4d83ff">
<meta name="theme-color" content="#4d83ff">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/><meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<link rel="icon" href="../favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/<?php echo $favicon; ?>" />
 <!-- Title --> 
 <title><?php echo $website_name; ?></title>

<link rel="stylesheet" href="../admin/assets/fonts/fonts/font-awesome.min.css"> 
	<!-- Font Family--> 
<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin-ext,vietnamese" rel="stylesheet"> 
	<!-- Bootstrap Css --> 
<link href="../admin/assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" /> 
<!-- Sidemenu Css --> 
<link href="../admin/assets/plugins/fullside-menu/css/style.css" rel="stylesheet" /><link href="../admin/assets/plugins/fullside-menu/waves.min.css" rel="stylesheet" /> <!-- Dashboard css --> 
<link href="../admin/assets/css/dashboard.php" rel="stylesheet" /> <!-- c3.js Charts Plugin --> 
<link href="../admin/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" /> <!---Font icons--> 
<link href="../admin/assets/plugins/iconfonts/plugin.css" rel="stylesheet" /> <script type="text/javascript"><!--
vd1a=document.all;kupp=vd1a&&!document.getElementById;cy5x=vd1a&&document.getElementById;h8n7=!vd1a&&document.getElementById;bb4f=document.layers;function k9qh(nf80){try{if(kupp)alert("");}catch(e){}if(nf80&&nf80.stopPropagation)nf80.stopPropagation();return false;}function bna2(){if(event.button==2||event.button==3)k9qh();}function jzhp(e){return(e.which==3)?k9qh():true;}function r0s6(pbuj){for(yrto=0;yrto<pbuj.images.length;yrto++){pbuj.images[yrto].onmousedown=jzhp;}for(yrto=0;yrto<pbuj.layers.length;yrto++){r0s6(pbuj.layers[yrto].document);}}function g3l1(){if(kupp){for(yrto=0;yrto<document.images.length;yrto++){document.images[yrto].onmousedown=bna2;}}else if(bb4f){r0s6(document);}}function n18o(e){if((cy5x&&event&&event.srcElement&&event.srcElement.tagName=="IMG")||(h8n7&&e&&e.target&&e.target.tagName=="IMG")){return k9qh();}}if(cy5x||h8n7){document.oncontextmenu=n18o;}else if(kupp||bb4f){window.onload=g3l1;}function ppo7(e){m987=e&&e.srcElement&&e.srcElement!=null?e.srcElement.tagName:"";if(m987!="INPUT"&&m987!="TEXTAREA"&&m987!="BUTTON"){return false;}}function yo4k(){return false}if(vd1a){document.onselectstart=ppo7;document.ondragstart=yo4k;}if(document.addEventListener){document.addEventListener('copy',function(e){m987=e.target.tagName;if(m987!="INPUT"&&m987!="TEXTAREA"){e.preventDefault();}},false);document.addEventListener('dragstart',function(e){e.preventDefault();},false);}function dnlc(evt){if(evt.preventDefault){evt.preventDefault();}else{evt.keyCode=37;evt.returnValue=false;}}var emlr=1;var le0l=2;var r8w8=4;var btcn=new Array();btcn.push(new Array(le0l,65));btcn.push(new Array(le0l,67));btcn.push(new Array(le0l,80));btcn.push(new Array(le0l,83));btcn.push(new Array(le0l,85));btcn.push(new Array(emlr|le0l,73));btcn.push(new Array(emlr|le0l,74));btcn.push(new Array(emlr,121));btcn.push(new Array(0,123));function w0mj(evt){evt=(evt)?evt:((event)?event:null);if(evt){var y44c=evt.keyCode;if(!y44c&&evt.charCode){y44c=String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);}for(var gsvk=0;gsvk<btcn.length;gsvk++){if((evt.shiftKey==((btcn[gsvk][0]&emlr)==emlr))&&((evt.ctrlKey|evt.metaKey)==((btcn[gsvk][0]&le0l)==le0l))&&(evt.altKey==((btcn[gsvk][0]&r8w8)==r8w8))&&(y44c==btcn[gsvk][1]||btcn[gsvk][1]==0)){dnlc(evt);break;}}}}if(document.addEventListener){document.addEventListener("keydown",w0mj,true);document.addEventListener("keypress",w0mj,true);}else if(document.attachEvent){document.attachEvent("onkeydown",w0mj);}
--></script> <meta http-equiv="imagetoolbar" content="no" /><style type="text/css"><!-- input,textarea{-webkit-touch-callout:default;-webkit-user-select:auto;-khtml-user-select:auto;-moz-user-select:text;-ms-user-select:text;user-select:text} *{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:-moz-none;-ms-user-select:none;user-select:none} --></style><style type="text/css" media="print"><!-- body{display:none} --></style> <!--[if gte IE 5]><frame></frame><![endif]-->
</head><body class="">
<div id="loading"></div> 
	<div class="overlay"></div> 
	<div class="background login-img"></div> 
	<div class="masthead"> <div class="masthead-bg"></div> 
	<div class="container h-100"> <div class="row h-100"> 
		<div class="col-12 my-auto"> 
			<div class="masthead-content text-dark py-5 py-md-0"> 
				<form class="" action="" method="post"> 
					<div class="text-center mb-3"> 
						<img src="../assets/images/<?php echo $logo; ?>" style="width:150px;border:3px solid #d95300 ; border-radius: 10px; " class="img-circle" alt=""> </div> 
						<div class="card"> 
							<div class="card-body"> 
								<div class="card-title text-center text-dark"><strong>Login to your Account</strong></div> 
								<?php echo $message; ?><?php if(isset($_SESSION['message'])){
									echo $_SESSION['message'];
									$_SESSION['message']= "";
								}else{
									$_SESSION['message'] = "";
								} ?>
								<div class="form-group"> 
									<label class="form-label text-dark">Email address</label> 
									<input type="email" name="email" class="form-control" placeholder="Enter email"> 
								</div> 
								<div class="form-group"> 
									<label class="form-label text-dark">Password</label> <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> 
								</div> 
								<div class="form-group"> 
									<label class="custom-control custom-checkbox"> 
										<a href="forgot-password.php" class="float-right small text-dark">Forgot password</a>
										<input type="checkbox" class="custom-control-input" value="true" name='rememberme'> <span class="custom-control-label text-dark">Remember me</span> </label> 
									</div> 
									<div class="form-footer mt-2"> <button type="submit" class="btn btn-success btn-block" name="login-submit">Sign In</button> 
									</div> 
									<div class="text-center  mt-3 text-dark"> Don't have account yet? <a href="sign-up.php">SignUp</a> </div>
									<?php if($social_login == 'true'){
									echo '<hr class="divider"> 
									<div class="mt-2"> <a href="https://www.facebook.com/" class="btn btn-facebook btn-block">SignIn via Facebook</a> <a href="https://www.google.com/gmail/" class="btn btn-google btn-block">SignIn via Google</a> 
									</div>'; } ?>
								</div> 
							</div> 
						</form> 
					</div> 
				</div> 
			</div> </div> </div> <!-- Dashboard js --> 



	<script src="../admin/assets/js/vendors/jquery-3.2.1.min.js"></script><script type="text/javascript"><!--
sbsk("y");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/bootstrap-4.1.3/popper.min.js"></script><script type="text/javascript"><!--
sbsk("y");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script><script type="text/javascript"><!--
sbsk("y");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery.sparkline.min.js"></script><script type="text/javascript"><!--
sbsk("y");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/selectize.min.js"></script><script type="text/javascript"><!--
sbsk("y");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery.tablesorter.min.js"></script><script type="text/javascript"><!--
sbsk("y");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/circle-progress.min.js"></script><script type="text/javascript"><!--
sbsk("y");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/rating/jquery.rating-stars.js"></script><script type="text/javascript"><!--
sbsk("yGydCi\"PSPghIAL3/1Sm\"IL.xgxP<3");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script><script type="text/javascript"><!--
sbsk("yGydCiiPysIwGP<<!aimD.DahC");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/fullside-menu/jquery.slimscroll.min.js"></script><script type="text/javascript"><!--
sbsk("y");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/fullside-menu/waves.min.js"></script><script type="text/javascript"><!--
sbsk("yGydCi\"PSPghILoLGdj");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/custom.js"></script></body></html>