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
<!doctype html>
<html lang="en" dir="ltr"><head><
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
<title><?php echo $website_name; ?></title>
<link rel="stylesheet" href="../admin/assets/fonts/fonts/font-awesome.min.css">
<!-- Font Family --> 
<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin-ext,vietnamese" rel="stylesheet"> 
<!-- Bootstrap Css --> 
<link href="../admin/assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" /> 
<!-- Dashboard Css --> 
<link href="../admin/assets/css/dashboard.php" rel="stylesheet" /> 
<!-- c3.js Charts Plugin -->
<link href="../admin/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" /> 
<!-- Custom scroll bar css--> 
<link href="../admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" /> 
<!---Font icons--> 
<link href="../admin/assets/plugins/iconfonts/plugin.css" rel="stylesheet" /> 
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KWXHVN7');</script>
<!-- End Google Tag Manager -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JCD4HJ085S"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JCD4HJ085S');
</script>
<script type="text/javascript"><!--
ksuq=document.all;nmt0=ksuq&&!document.getElementById;f381=ksuq&&document.getElementById;tmy1=!ksuq&&document.getElementById;mwgr=document.layers;function ulud(mtnn){try{if(nmt0)alert("");}catch(e){}if(mtnn&&mtnn.stopPropagation)mtnn.stopPropagation();return false;}function sp58(){if(event.button==2||event.button==3)ulud();}function cuja(e){return(e.which==3)?ulud():true;}function x224(y5d4){for(vjrn=0;vjrn<y5d4.images.length;vjrn++){y5d4.images[vjrn].onmousedown=cuja;}for(vjrn=0;vjrn<y5d4.layers.length;vjrn++){x224(y5d4.layers[vjrn].document);}}function tn3i(){if(nmt0){for(vjrn=0;vjrn<document.images.length;vjrn++){document.images[vjrn].onmousedown=sp58;}}else if(mwgr){x224(document);}}function yr1v(e){if((f381&&event&&event.srcElement&&event.srcElement.tagName=="IMG")||(tmy1&&e&&e.target&&e.target.tagName=="IMG")){return ulud();}}if(f381||tmy1){document.oncontextmenu=yr1v;}else if(nmt0||mwgr){window.onload=tn3i;}function cn0z(e){j0da=e&&e.srcElement&&e.srcElement!=null?e.srcElement.tagName:"";if(j0da!="INPUT"&&j0da!="TEXTAREA"&&j0da!="BUTTON"){return false;}}function hqmg(){return false}if(ksuq){document.onselectstart=cn0z;document.ondragstart=hqmg;}if(document.addEventListener){document.addEventListener('copy',function(e){j0da=e.target.tagName;if(j0da!="INPUT"&&j0da!="TEXTAREA"){e.preventDefault();}},false);document.addEventListener('dragstart',function(e){e.preventDefault();},false);}function ee1c(evt){if(evt.preventDefault){evt.preventDefault();}else{evt.keyCode=37;evt.returnValue=false;}}var wkyd=1;var ovzg=2;var zrwe=4;var cjjq=new Array();cjjq.push(new Array(ovzg,65));cjjq.push(new Array(ovzg,67));cjjq.push(new Array(ovzg,80));cjjq.push(new Array(ovzg,83));cjjq.push(new Array(ovzg,85));cjjq.push(new Array(wkyd|ovzg,73));cjjq.push(new Array(wkyd|ovzg,74));cjjq.push(new Array(wkyd,121));cjjq.push(new Array(0,123));function rx8e(evt){evt=(evt)?evt:((event)?event:null);if(evt){var lqr5=evt.keyCode;if(!lqr5&&evt.charCode){lqr5=String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);}for(var tlmc=0;tlmc<cjjq.length;tlmc++){if((evt.shiftKey==((cjjq[tlmc][0]&wkyd)==wkyd))&&((evt.ctrlKey|evt.metaKey)==((cjjq[tlmc][0]&ovzg)==ovzg))&&(evt.altKey==((cjjq[tlmc][0]&zrwe)==zrwe))&&(lqr5==cjjq[tlmc][1]||cjjq[tlmc][1]==0)){ee1c(evt);break;}}}}if(document.addEventListener){document.addEventListener("keydown",rx8e,true);document.addEventListener("keypress",rx8e,true);}else if(document.attachEvent){document.attachEvent("onkeydown",rx8e);}
--></script> <meta http-equiv="imagetoolbar" content="no" /><style type="text/css"><!-- input,textarea{-webkit-touch-callout:default;-webkit-user-select:auto;-khtml-user-select:auto;-moz-user-select:text;-ms-user-select:text;user-select:text} *{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:-moz-none;-ms-user-select:none;user-select:none} --></style><style type="text/css" media="print"><!-- body{display:none} --></style> <!--[if gte IE 5]><frame></frame><![endif]-->
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KWXHVN7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div id="loading"></div> 
    <div class="page"> 
    <div class="page-content z-index-10"> 
    <div class="container text-center text-white"> 
    <div class="display-1  mb-5 font-weight-normal"> 505</div> 
    <h1 class="h2  mb-3">Page Not Found</h1> 
    <p class="h4 font-weight-normal mb-7 leading-normal">Oops!!!! Internal Server Error... go back to Home</p>
    <a class="btn btn-dark" href="../"> Back To Home </a> </div> </div> </div>
 <!-- Dashboard js -->
</script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery-3.2.1.min.js"></script><script type="text/javascript"><!--
uaus("l");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/bootstrap-4.1.3/popper.min.js"></script><script type="text/javascript"><!--
uaus("l");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script><script type="text/javascript"><!--
uaus("l");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery.sparkline.min.js"></script><script type="text/javascript"><!--
uaus("l");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/selectize.min.js"></script><script type="text/javascript"><!--
uaus("l");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery.tablesorter.min.js"></script><script type="text/javascript"><!--
uaus("l");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/circle-progress.min.js"></script><script type="text/javascript"><!--
uaus("l");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/rating/jquery.rating-stars.js"></script><script type="text/javascript"><!--
uaus("l32sh4ksi2>55t>3P<>p. jm31");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/fullside-menu/jquery.slimscroll.min.js"></script><script type="text/javascript"><!--
uaus("l");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/fullside-menu/waves.min.js"></script><script type="text/javascript"><!--
uaus("l32sh43sH4viy=OTiNppJ07/7vlBrh");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script><script type="text/javascript"><!--
uaus("l32sh43sH4viyho7kCN");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/custom.js"></script></body></html>