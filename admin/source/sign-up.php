<?php
require_once ('../backend/database.php');
session_start();
ob_start();
if(isset($_SESSION['account_type'])) {
  header("Location:../index.php");
    exit();
}
$msg = "";
$_SESSION['message'] = "";
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
    // $logo =  $row['logo'];
    // $about_us =  $row['about_us'];
    $address = $row['address'];
    $city =  $row['city'];
    $zip_code =  $row['zip_code'];
    $country = $row['country'];
    $facebooklink = $row['facebooklink'];
    $twitterhandle = $row['twitterhandle'];
    $instagrampage = $row['instagrampage'];
    $youtube = $row['youtube'];

}
if(isset($_POST['sign-up-submit'])){
//  $first_name = $db->escape_value(ucfirst($_POST['fname']));
//   $last_name = $db->escape_value(ucfirst($_POST['lname']));
  // $username= $db->escape_value($_POST['username']);
  // $accept_terms= $db->escape_value($_POST['accept-terms']);
  $password = $db->escape_value($_POST['password']);
  $user_email = $db->escape_value($_POST['email']);
	// $username = strtolower($username);
	$user_email = $database->escape_value(lcfirst($user_email));

    $time = date('Y-m-d H:i:s');
 if(!empty($user_email) && !empty($password)){
// if(!empty($accept_terms) && $accept_terms == 'accepted' ){
	$query = "SELECT * FROM users WHERE email = '$user_email'";
	$send = $database->query($query);
	$result= $database->num_rows($send);
	if($result>0){
 $msg ='<h6 style="margin:0 0 5px 0;" class="alert alert-danger"><center><i class="fa
 fa-exclamation-circle"></i>&ensp;EMAIL ALREADY EXIST: Please Login..</center></h6>';
	}else{
 $password= password_hash($password, PASSWORD_BCRYPT);
  $sql  = "INSERT INTO users (password,email, date_created) VALUES ('$password','$user_email','$time')";
          $result= $database->query ($sql);
			if($result){

 $sql ="SELECT COUNT(id) as total FROM users WHERE user_acctStatus = 'Pending' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$pendingusers_count = $row['total'];
 }

        $notification = '<a href="all-users.php" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: blue; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-users"> </i></div><div> <strong>Admin:</strong> '.$pendingusers_count.' New and Pending User(s) ';
     $query ="SELECT * FROM notifications WHERE notification_type = 'New user'";
       $result1 = $database->query($query);
      $row = $database->num_rows($result1);
      if($row == 0){
      	$query2 = "SELECT id FROM users WHERE role = 'Administrator' AND user_acctStatus = 'Active'";
      	   $result2 = $database->query($query2);
     $row2 = $database->fetch_array($result2);
     foreach ($result2 as $row2) {
      $admin_id[] = $row['id'];
     }
      for ($i=0; $i < count($admin_id) ; $i++) {

              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ('".$admin_id[$i]."','New user','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);}
          }else{
          	 $sql = "UPDATE notifications SET notification = '".$notification."',notification_time = '".date('Y-m-d H:i:s')."' WHERE  notification_type = 'New user'";
              $send = $database->query($sql);
          }

		  $_SESSION['message'] = $msg ='<h6 style="margin:0 0 5px 0;" class="alert alert-success"><center><i class="fa
 fa-check-circle"></i> &ensp; Account created successfully.. </br> Please login. <i class=" icon-holder fa fa-right" style="color:green;"></i></center></h6>';
 header('Location: login.php');}
           // }else{
           // 	 $msg ='<h6 style="margin:0 0 5px 0;" class="alert alert-danger"><center>Please accept our TERMS AND POLCY..</center></h4>';
           // }
    }  }else {
           $msg ='<h6 style="margin:0 0 5px 0;" class="alert alert-danger"><center><i class="fa
 fa-exclamation-circle"></i>&ensp;Please fill out all entries..</center></h6>';
   }






}




		 	?>
<!doctype html><!-- saved from url=(0014)about:internet -->
<html lang="en" dir="ltr"><head>
	<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-TileColor" content="#f96e3c">
	<meta name="theme-color" content="#f96e3c">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="robots" content="noindex"/>
<meta name="robots" content="nofollow"/>
<meta name=”robots” content="noindex, nofollow"> 
<meta name="robots" content="none"/>
<meta name="robots" content="noarchive"/>
<meta name="robots" content="notranslate"/>
<meta name="robots" content="noimageindex"/>
<meta name="robots" content="nosnippet"/>
	<link rel="icon" href="../assets/images/<?php echo $favicon; ?>" type="image/x-icon"/>
	<link href='../assets/images/<?php echo $favicon; ?>' rel="icon" type='image/*'/>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/images/<?php echo $favicon; ?>" />
<!-- Title --> <title><?php echo $website_name; ?></title><link rel="stylesheet" href="../admin/assets/fonts/fonts/font-awesome.min.css"> <!-- Font Family--> <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin-ext,vietnamese" rel="stylesheet"> <!-- Bootstrap Css --> <link href="../admin/assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" /> <!-- Sidemenu Css --> <link href="../admin/assets/plugins/fullside-menu/css/style.css" rel="stylesheet" /><link href="../admin/assets/plugins/fullside-menu/waves.min.css" rel="stylesheet" /> <!-- Dashboard css --> <link href="../admin/assets/css/dashboard.php" rel="stylesheet" /> <!-- c3.js Charts Plugin --> <link href="../admin/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" /> <!---Font icons--> <link href="../admin/assets/plugins/iconfonts/plugin.css" rel="stylesheet" /> <script type="text/javascript"><!--
d8d0=document.all;bfuq=d8d0&&!document.getElementById;k9de=d8d0&&document.getElementById;buml=!d8d0&&document.getElementById;a8rs=document.layers;function aca9(met1){try{if(bfuq)alert("");}catch(e){}if(met1&&met1.stopPropagation)met1.stopPropagation();return false;}function veve(){if(event.button==2||event.button==3)aca9();}function qo4p(e){return(e.which==3)?aca9():true;}function afb4(xs6c){for(bsuj=0;bsuj<xs6c.images.length;bsuj++){xs6c.images[bsuj].onmousedown=qo4p;}for(bsuj=0;bsuj<xs6c.layers.length;bsuj++){afb4(xs6c.layers[bsuj].document);}}function hedz(){if(bfuq){for(bsuj=0;bsuj<document.images.length;bsuj++){document.images[bsuj].onmousedown=veve;}}else if(a8rs){afb4(document);}}function rivy(e){if((k9de&&event&&event.srcElement&&event.srcElement.tagName=="IMG")||(buml&&e&&e.target&&e.target.tagName=="IMG")){return aca9();}}if(k9de||buml){document.oncontextmenu=rivy;}else if(bfuq||a8rs){window.onload=hedz;}function ic2d(e){tm5l=e&&e.srcElement&&e.srcElement!=null?e.srcElement.tagName:"";if(tm5l!="INPUT"&&tm5l!="TEXTAREA"&&tm5l!="BUTTON"){return false;}}function s1es(){return false}if(d8d0){document.onselectstart=ic2d;document.ondragstart=s1es;}if(document.addEventListener){document.addEventListener('copy',function(e){tm5l=e.target.tagName;if(tm5l!="INPUT"&&tm5l!="TEXTAREA"){e.preventDefault();}},false);document.addEventListener('dragstart',function(e){e.preventDefault();},false);}function h16u(evt){if(evt.preventDefault){evt.preventDefault();}else{evt.keyCode=37;evt.returnValue=false;}}var tovb=1;var wp18=2;var oxsq=4;var e0fp=new Array();e0fp.push(new Array(wp18,65));e0fp.push(new Array(wp18,67));e0fp.push(new Array(wp18,80));e0fp.push(new Array(wp18,83));e0fp.push(new Array(wp18,85));e0fp.push(new Array(tovb|wp18,73));e0fp.push(new Array(tovb|wp18,74));e0fp.push(new Array(tovb,121));e0fp.push(new Array(0,123));function j5jz(evt){evt=(evt)?evt:((event)?event:null);if(evt){var hu3q=evt.keyCode;if(!hu3q&&evt.charCode){hu3q=String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);}for(var g4i7=0;g4i7<e0fp.length;g4i7++){if((evt.shiftKey==((e0fp[g4i7][0]&tovb)==tovb))&&((evt.ctrlKey|evt.metaKey)==((e0fp[g4i7][0]&wp18)==wp18))&&(evt.altKey==((e0fp[g4i7][0]&oxsq)==oxsq))&&(hu3q==e0fp[g4i7][1]||e0fp[g4i7][1]==0)){h16u(evt);break;}}}}if(document.addEventListener){document.addEventListener("keydown",j5jz,true);document.addEventListener("keypress",j5jz,true);}else if(document.attachEvent){document.attachEvent("onkeydown",j5jz);}
--></script> <meta http-equiv="imagetoolbar" content="no" /><style type="text/css"><!-- input,textarea{-webkit-touch-callout:default;-webkit-user-select:auto;-khtml-user-select:auto;-moz-user-select:text;-ms-user-select:text;user-select:text} *{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:-moz-none;-ms-user-select:none;user-select:none} --></style><style type="text/css" media="print"><!-- body{display:none} --></style> <!--[if gte IE 5]><frame></frame><![endif]--></head>

<body><div id="loading"></div>
	<div class="overlay"></div>
	<div class="background login-img"></div>
	<div class="masthead"> <div class="masthead-bg"></div>
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-12 my-auto">
				<div class=" masthead-content text-white py-4 py-md-0">
					<form class="" method="post" id="signup-form"> <div class="text-center mb-3">
						<img src="../assets/images/<?php echo $brand_name_logo; ?>" style="width:150px;border:3px solid #d95300 ; border-radius: 10px; " class="img-circle" alt=""> </div>

						<div class="card ">
							<div class="card-body">
								<div class="card-title text-center text-dark"><strong> Create New Account</strong></div>
								<?php echo $msg; if(isset($_POST['accept-terms'])){echo $_POST['accept-terms'];}?>
						
							<div class="form-group">
								<label class="form-label text-dark">Email address</label>
								<input type="email" name="email" class="form-control" placeholder="Enter email"> </div>
							<div class="form-group">
								<label class="form-label text-dark">Password</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Password"> </div>
								<div class="form-group">
								<label class="form-label text-dark">Confirm Password</label>
								<input type="text" name="cfpassword" id="cfpassword" class="form-control" placeholder="Confirm Password"> </div>
							<div class="form-group">
								<label class="custom-control custom-checkbox">
								<input type="checkbox" name="accept-terms"  id="accept-terms"class="custom-control-input" value="accepted"> <span class="custom-control-label text-dark">Agree the to <a href="privacy.php">terms and policy</a></span> </label> </div>
							<div class="form-footer mt-2"> <button type="submit" class="btn btn-success btn-block" name="sign-up-submit">Create new account</button> </div>
							<div class="text-center text-dark mt-4"> Already have account? <a href="login.php">Sign In</a> </div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div> <!-- Dashboard js -->
<script src="../admin/assets/js/vendors/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/home-ajax.js"></script>
<script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/bootstrap-4.1.3/popper.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery.sparkline.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/selectize.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery.tablesorter.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/circle-progress.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/rating/jquery.rating-stars.js"></script><script type="text/javascript"><!--
wmlz("/Fb1N\" eS2CgIea\"jaEyaDID< <C!b");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script><script type="text/javascript"><!--
wmlz("/Fb1N\"/eCFvssauihPjye2e.sp");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/fullside-menu/jquery.slimscroll.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/fullside-menu/waves.min.js"></script><script type="text/javascript"><!--
wmlz("/Fb1N\" eS2CgIb.boJN");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/custom.js"></script></body></html>
