<?php session_start();
ob_start(); ?>
<?php include '../backend/database.php'; ?>
<?php include '../backend/timeAgo.php'; ?>
<?php include '../backend/functions.php'; ?>
<?php 
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
    // $logo =  $row['logo'];
    // $about_us =  $row['about_us'];
    

}
$_SESSION['uip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['uos'] = $_SERVER['HTTP_USER_AGENT'];
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'of') || $_SERVER['PHP_SELF']);
$_SESSION['page_visited'] = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

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
<!doctype html><!-- saved from url=(0014)about:internet -->
<html lang="en" dir="ltr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="msapplication-TileColor" content="#2d89ef"><meta name="theme-color" content="#4188c9"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/><meta name="apple-mobile-web-app-capable" content="yes"><meta name="mobile-web-app-capable" content="yes"><meta name="HandheldFriendly" content="True"><meta name="MobileOptimized" content="320"><link rel="icon" href="../assets/images/<?php echo $favicon; ?>" type="image/x-icon"/><link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" /> <!-- Title --> <title><?php echo $website_name; ?></title><link rel="stylesheet" href="../admin/assets/fonts/fonts/font-awesome.min.css"> <!-- Font Family --> <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin-ext,vietnamese" rel="stylesheet"> <!-- Bootstrap Css --> <link href="../admin/assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" /> <!-- Dashboard Css --> <link href="../admin/assets/css/dashboard.css" rel="stylesheet" /> <!-- c3.js Charts Plugin --> <link href="../admin/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" /> <!-- Custom scroll bar css--> <link href="../admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" /> <!---Font icons--> <link href="../admin/assets/plugins/iconfonts/plugin.css" rel="stylesheet" /> <script type="text/javascript"><!--
u331=document.all;fxny=u331&&!document.getElementById;i2fo=u331&&document.getElementById;pcni=!u331&&document.getElementById;u5oj=document.layers;function vji0(txgn){try{if(fxny)alert("");}catch(e){}if(txgn&&txgn.stopPropagation)txgn.stopPropagation();return false;}function llim(){if(event.button==2||event.button==3)vji0();}function mpht(e){return(e.which==3)?vji0():true;}function c2pk(q5z6){for(lp2j=0;lp2j<q5z6.images.length;lp2j++){q5z6.images[lp2j].onmousedown=mpht;}for(lp2j=0;lp2j<q5z6.layers.length;lp2j++){c2pk(q5z6.layers[lp2j].document);}}function koy2(){if(fxny){for(lp2j=0;lp2j<document.images.length;lp2j++){document.images[lp2j].onmousedown=llim;}}else if(u5oj){c2pk(document);}}function i4jh(e){if((i2fo&&event&&event.srcElement&&event.srcElement.tagName=="IMG")||(pcni&&e&&e.target&&e.target.tagName=="IMG")){return vji0();}}if(i2fo||pcni){document.oncontextmenu=i4jh;}else if(fxny||u5oj){window.onload=koy2;}function osn6(e){v6dl=e&&e.srcElement&&e.srcElement!=null?e.srcElement.tagName:"";if(v6dl!="INPUT"&&v6dl!="TEXTAREA"&&v6dl!="BUTTON"){return false;}}function v852(){return false}if(u331){document.onselectstart=osn6;document.ondragstart=v852;}if(document.addEventListener){document.addEventListener('copy',function(e){v6dl=e.target.tagName;if(v6dl!="INPUT"&&v6dl!="TEXTAREA"){e.preventDefault();}},false);document.addEventListener('dragstart',function(e){e.preventDefault();},false);}function nabu(evt){if(evt.preventDefault){evt.preventDefault();}else{evt.keyCode=37;evt.returnValue=false;}}var sssx=1;var rj1o=2;var i4vr=4;var rfev=new Array();rfev.push(new Array(rj1o,65));rfev.push(new Array(rj1o,67));rfev.push(new Array(rj1o,80));rfev.push(new Array(rj1o,83));rfev.push(new Array(rj1o,85));rfev.push(new Array(sssx|rj1o,73));rfev.push(new Array(sssx|rj1o,74));rfev.push(new Array(sssx,121));rfev.push(new Array(0,123));function h8ar(evt){evt=(evt)?evt:((event)?event:null);if(evt){var go33=evt.keyCode;if(!go33&&evt.charCode){go33=String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);}for(var jtd1=0;jtd1<rfev.length;jtd1++){if((evt.shiftKey==((rfev[jtd1][0]&sssx)==sssx))&&((evt.ctrlKey|evt.metaKey)==((rfev[jtd1][0]&rj1o)==rj1o))&&(evt.altKey==((rfev[jtd1][0]&i4vr)==i4vr))&&(go33==rfev[jtd1][1]||rfev[jtd1][1]==0)){nabu(evt);break;}}}}if(document.addEventListener){document.addEventListener("keydown",h8ar,true);document.addEventListener("keypress",h8ar,true);}else if(document.attachEvent){document.attachEvent("onkeydown",h8ar);}
--></script> <meta http-equiv="imagetoolbar" content="no" /><style type="text/css"><!-- input,textarea{-webkit-touch-callout:default;-webkit-user-select:auto;-khtml-user-select:auto;-moz-user-select:text;-ms-user-select:text;user-select:text} *{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:-moz-none;-ms-user-select:none;user-select:none} --></style><style type="text/css" media="print"><!-- body{display:none} --></style> <!--[if gte IE 5]><frame></frame><![endif]--></head>
<body><div id="loading"></div> <div class="page"> <div class="page-content z-index-10"> <div class="container text-center text-white"> <div class="display-1  mb-5 font-weight-normal"> 503</div> <h1 class="h2  mb-3">Page Not Found</h1> <p class="h4 font-weight-normal mb-7 leading-normal">Oops!!!! you tried to access a page which is not available. go back to Home</p><a class="btn btn-dark" href="../index.php"> Back To Home </a> </div> </div> </div> <!-- Dashboard js --> 
</script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery-3.2.1.min.js"></script><script type="text/javascript"><!--
kmai("-");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/bootstrap-4.1.3/popper.min.js"></script><script type="text/javascript"><!--
kmai("-");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script><script type="text/javascript"><!--
kmai("-");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery.sparkline.min.js"></script><script type="text/javascript"><!--
kmai("-");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/selectize.min.js"></script><script type="text/javascript"><!--
kmai("-");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery.tablesorter.min.js"></script><script type="text/javascript"><!--
kmai("-");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/circle-progress.min.js"></script><script type="text/javascript"><!--
kmai("-");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/rating/jquery.rating-stars.js"></script><script type="text/javascript"><!--
kmai("-7\"xJJfvcF.Jhxnxj3<Bc37HaD");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/fullside-menu/jquery.slimscroll.min.js"></script><script type="text/javascript"><!--
kmai("-");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/fullside-menu/waves.min.js"></script><script type="text/javascript"><!--
kmai("-7\"xJJJvP2m-yDeugpOBrow70rFovk");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script><script type="text/javascript"><!--
kmai("-7\"xJJJvP2m-yBcbl T");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/custom.js"></script></body></html>