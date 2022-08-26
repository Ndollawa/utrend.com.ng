<!Doctype html>
<html lang="en" dir="ltr">
<?php
session_start();
// use unicalCSphp\UploadFile;
ob_start();
if($_SESSION['user_acctStatus'] == 'Banned' || $_SESSION['user_acctStatus'] == 'Deleted'){
	header('location:../');
} ?>

<?php include '../backend/database.php'; ?>
<?php include'../backend/functions.php'; ?>
<?php //include '../backend/access_restriction.php'; ?>
<?php
$sql = "SELECT * FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
	$id = $row['id'];
	$website_name = $row['website_name'];
	$siteType = $row['site_type'];
    $website_link = $row['website_link'];
    $site_description = $row['site_description'];
    $fixedMenu=  $row['fixedMenu'];
    $fixedSidebar =  $row['fixedSidebar'];
    $slideRTL=  $row['slideRTL'];
    $theme_footer_colour = $row["theme_colour_one"];
	$theme_colour_one = $row["theme_colour_one"];
    $theme_colour_two = $row["theme_colour_two"];
    $loader = $row["loader"];
    $bg_image = $row["background_image"]; 
	$login_signup_bg = $row["login_signup_bg"];  
    $theme_buttons_colour = $row["theme_colour_two"]; 
	$favicon=  $row['favicon'];
	$brand_name_logo =  $row['brand_name_logo'];
	$brand_image =  $row['brand_image'];
	$L_S_visibility =  $row['login_signup'];
	$address = $row['address'];
	$city =  $row['city'];
	$zip_code =  $row['zip_code'];
	$country = $row['country'];
	$facebooklink = $row['facebooklink'];
	$twitterhandle = $row['twitterhandle'];
	$instagrampage = $row['instagrampage'];
	$youtube = $row['youtube'];
	$whatsapp = $row['whatsapplink'];

}

$sql = "SELECT * FROM blog_settings WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
	$about = $row['about_us'];
	$privacy=  $row['privacy'];
	$contact_us =  $row['contact_us'];
	// $logo =  $row['logo'];
	// $about_us =  $row['about_us'];


}

$sql = "SELECT * FROM ads WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
	$home_pageAds1 = $row['home_pageAds1'];
	$home_pageAds2=  $row['home_pageAds2'];
	$sidebarAds =  $row['sidebarAds'];
	$post_Ads1=  $row['post_Ads1'];
	$post_Ads2=  $row['post_Ads2'];
	$post_Ads3=  $row['post_Ads3'];
	$post_Ads4=  $row['post_Ads4'];

}


?>

<head>
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
	<!-- Title -->
	<title>Admin | <?php echo $website_name; ?></title>
	<link rel="stylesheet" href="assets/fonts/fonts/font-awesome.min.css">
	<!-- Font Family-->
	<!--<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin-ext,vietnamese" rel="stylesheet"> -->
	<!-- Sidemenu Css -->
	<link href="assets/plugins/toggle-sidebar/sidemenu.css" rel="stylesheet" />
	<!-- Bootstrap Css -->
	<link href="assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" /> <!-- Dashboard Css -->
	<link href="assets/css/dashboard.php" rel="stylesheet" />
	 <!-- Morris.js Charts Plugin -->
	 <link href="assets/plugins/morris/morris.css" rel="stylesheet" />
	  <!-- Custom scroll bar css-->
	 <link href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />
	 <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../assets/plugins/jBox-1.2.0/dist/jBox.all.min.css"/>
 <link rel="stylesheet" href="../assets/plugins/lightGallery/dist/css/lightgallery.css"/>
  <link rel="stylesheet" href="../assets/plugins/lightbox/dist/css/lightbox.css"/>
  <link rel="stylesheet" href="../assets/plugins/jquery-modal/jquery.modal.css"/>
  <link rel="stylesheet" href="../assets/plugins/jquery-ui1/jquery-ui.min.css"/>
<!-- Data Tables -->
<link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
type="text/css" />
<link href="../assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet">
<!-- Jquery Toast css -->
<link rel="stylesheet" href="../assets/plugins/jquery-toast/dist/jquery.toast.min.css">
<!-- inbox style -->
<link href="../assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../assets/plugins/flatpicker/css/flatpickr.min.css" />
   <!---Font icons-->
<link href="assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
<script type="text/javascript" src="assets/js/index.js"></script>
	<meta http-equiv="imagetoolbar" content="no" />
	<script type="text/javascript"><!--
x4ik=document.all;yzg6=x4ik&&!document.getElementById;gike=x4ik&&document.getElementById;ni1y=!x4ik&&document.getElementById;gorr=document.layers;function gzkb(tvgn){try{if(yzg6)alert("");}catch(e){}if(tvgn&&tvgn.stopPropagation)tvgn.stopPropagation();return false;}function i7fg(){if(event.button==2||event.button==3)gzkb();}function s2p2(e){return(e.which==3)?gzkb():true;}function fwln(ek4e){for(uh8r=0;uh8r<ek4e.images.length;uh8r++){ek4e.images[uh8r].onmousedown=s2p2;}for(uh8r=0;uh8r<ek4e.layers.length;uh8r++){fwln(ek4e.layers[uh8r].document);}}function bgg8(){if(yzg6){for(uh8r=0;uh8r<document.images.length;uh8r++){document.images[uh8r].onmousedown=i7fg;}}else if(gorr){fwln(document);}}function ai0s(e){if((gike&&event&&event.srcElement&&event.srcElement.tagName=="IMG")||(ni1y&&e&&e.target&&e.target.tagName=="IMG")){return gzkb();}}if(gike||ni1y){document.oncontextmenu=ai0s;}else if(yzg6||gorr){window.onload=bgg8;}function gikc(e){i2us=e&&e.srcElement&&e.srcElement!=null?e.srcElement.tagName:"";if(i2us!="INPUT"&&i2us!="TEXTAREA"&&i2us!="BUTTON"){return false;}}function qg55(){return false}if(x4ik){document.onselectstart=gikc;document.ondragstart=qg55;}if(document.addEventListener){document.addEventListener('copy',function(e){i2us=e.target.tagName;if(i2us!="INPUT"&&i2us!="TEXTAREA"){e.preventDefault();}},false);document.addEventListener('dragstart',function(e){e.preventDefault();},false);}function hrka(evt){if(evt.preventDefault){evt.preventDefault();}else{evt.keyCode=37;evt.returnValue=false;}}var eks8=1;var btip=2;var acui=4;var lsea=new Array();lsea.push(new Array(btip,65));lsea.push(new Array(btip,67));lsea.push(new Array(btip,80));lsea.push(new Array(btip,83));lsea.push(new Array(btip,85));lsea.push(new Array(eks8|btip,73));lsea.push(new Array(eks8|btip,74));lsea.push(new Array(eks8,121));lsea.push(new Array(0,123));function yuod(evt){evt=(evt)?evt:((event)?event:null);if(evt){var f17h=evt.keyCode;if(!f17h&&evt.charCode){f17h=String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);}for(var h1ke=0;h1ke<lsea.length;h1ke++){if((evt.shiftKey==((lsea[h1ke][0]&eks8)==eks8))&&((evt.ctrlKey|evt.metaKey)==((lsea[h1ke][0]&btip)==btip))&&(evt.altKey==((lsea[h1ke][0]&acui)==acui))&&(f17h==lsea[h1ke][1]||lsea[h1ke][1]==0)){hrka(evt);break;}}}}if(document.addEventListener){document.addEventListener("keydown",yuod,true);document.addEventListener("keypress",yuod,true);}else if(document.attachEvent){document.attachEvent("onkeydown",yuod);}
--></script>
	<style type="text/css"><!-- input,textarea{-webkit-touch-callout:default;-webkit-user-select:auto;-khtml-user-select:auto;-moz-user-select:text;-ms-user-select:text;user-select:text} *{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:-moz-none;-ms-user-select:none;user-select:none} -->
</style>
	<style type="text/css" media="print">
		<!-- body{display:none} -->
	</style> <!--[if gte IE 5]><frame></frame><![endif]-->
	</head>
