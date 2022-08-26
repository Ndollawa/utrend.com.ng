<!DOCTYPE html>
<html class='ltr' dir='ltr' lang='en'>
<?php session_start();
ob_start(); ?>
<?php include '../backend/database.php'; ?>
<?php include '../backend/timeAgo.php'; ?>
<?php include '../backend/functions.php'; ?>
<?php
// include '../baseurl.php';
$sql = "SELECT * FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {

    $L_S_visibility= $row['login_signup'];
    $siteType =  $row['site_type'];
    $website_name = $row['website_name'];
    $website_link = $row['website_link'];
    $site_description = $row['site_description'];
     $fixedMenu=  $row['fixedMenu'];
    $fixedSidebar =  $row['fixedSidebar'];
    $slideRTL=  $row['slideRTL'];
    $favicon=  $row['favicon'];
    $theme_footer_colour = $row["theme_colour_one"];
    $loader = $row["loader"];
    $bg_image = $row["background_image"]; 
$login_signup_bg = $row["login_signup_bg"];  
    $theme_buttons_colour = $row["theme_colour_two"]; 
    $brand_name_logo =  $row['brand_name_logo'];
    $brand_image =  $row['brand_image'];
    // $about_us =  $row['about_us'];
    $address = $row['address'];
    $city =  $row['city'];
    $zip_code =  $row['zip_code'];
    $country = $row['country'];
    $sfacebooklink = $row['facebooklink'];
    $stwitterhandle = $row['twitterhandle'];
    $sinstagrampage = $row['instagrampage'];
    $syoutube = $row['youtube'];
    $swhatsapp = $row['whatsapplink'];

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
<?php ?>
<?php include '../queries/post-queries.php'; ?>
<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KWXHVN7');</script>
<!-- End Google Tag Manager -->
<meta content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1' name='viewport'/>

<meta name="robots" content="index, follow">
<link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<link href='../assets/images/<?php echo $favicon; ?>' rel="icon" type='image/*'/>
<meta content='#003aff' name='theme-color'/>
<meta content='#003aff' name='msapplication-navbutton-color'/>
<link rel="canonical"  href='<?php if(isset($metaInfo) && !empty($metaInfo)){echo $website_link."/source/content.php?source%26p_id=".$post_id."%26title=".preg_replace("/ /", "-",$post_title);}else{ echo $website_link;} ?>' />
<!-- Metadata for Open Graph protocol. See http://ogp.me/. -->
<meta content='website' property='og:type'/>
<meta property="og:site_name" content="<?php echo $website_name; ?>">
<meta property="og:image:type" content="image/*"/>
<meta content='207867290894154' property='fb:app_id'/>
<!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1156465651279302"
     crossorigin="anonymous"></script>
<title><?php if(isset($metaInfo) && !empty($metaInfo)){echo $post_title;}else{ echo $website_name;} ?></title>
 <meta content='<?php if(isset($metaInfo) && !empty($metaInfo)){echo ($post_title);}else{ echo $website_name;} ?>' property='og:site_name'/>
 <meta content="<?php if(isset($metaInfo) && !empty($metaInfo)){echo ($post_title);}else{ echo $website_name;} ?>" property='og:title'/>
<meta content='<?php if(isset($metaInfo) && !empty($metaInfo)){echo $website_link."/source/content.php?source%26p_id=".$post_id."%26title=".preg_replace("/ /", "-",$post_title);}else{ echo $website_link;} ?>' property='og:url'/>
<meta content='<?php if(isset($metaInfo) && !empty($metaInfo)){echo $website_link."/assets/images/blog/".$postCover;}else{ echo $website_link."/assets/images/".$brand_image;} ?>' property='og:image'/>
<meta content="<?php if(isset($metaInfo) && !empty($metaInfo)){echo strip_tags(substr(str_replace('"',"'",$post_content), 0,300));}else{ echo $database->escape_value($site_description);} ?>" property='og:description' />

<meta content="<?php if(isset($metaInfo) && !empty($metaInfo)){
    $key = array();
    $filter = array('"',"'","is","&","1","2","3","4",",",".","5","6","7","8","9","0","and","be","has","the","had","as","again","onces","ones","own","will","this","that","how","where","when","what","a","to","then","them","who","let","have","should","would","those","does","do","done","did","can","we","you","him","she","her","help","if","all","was","could","in","on","under","over","but");

$key = explode(' ', $post_content);
	foreach ($key as $word) {
	if(!in_array(strtolower($word), $filter)){
		$keywords[] = preg_replace('/[^\da-z]/i',"", str_replace('"','',$word));
    }}
  echo $post_title.",".implode(",", $keywords);}else{echo $site_description;}?>" name="keywords"/>
<meta content='<?php if(isset($metaInfo) && !empty($metaInfo)){echo $website_link."/assets/images/blog/".$postCover;}else{ echo $website_link."/assets/images/".$brand_image;} ?>' name='twitter:card'/>
<meta content="<?php if(isset($metaInfo) && !empty($metaInfo)){echo ($post_title);}else{ echo $website_name;} ?>" name='twitter:title'/>
<meta content='<?php if(isset($metaInfo) && !empty($metaInfo)){echo $website_link."/source/content.php?source%26p_id=".$post_id."%26title=".preg_replace("/ /", "-",$post_title);}else{ echo $website_link;} ?>' property ='twitter:url'/>
<meta content="<?php if(isset($metaInfo) && !empty($metaInfo)){echo $database->escape_value(strip_tags(substr(str_replace('"',"'",$post_content), 0,300)));}else{ echo $database->escape_value($site_description);} ?>" name='twitter:description'/>


<!-- Font Awesome Free 5.11.2 -->
<link href='../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css' rel='stylesheet'/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href='../assets/css/styles.php' />

<link href="../assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet">
<!-- Jquery Toast css -->
<link rel="stylesheet" href="../assets/plugins/jquery-toast/dist/jquery.toast.min.css">
<link rel="stylesheet" type="text/css" href="../assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css"/>

<!-- <link rel="stylesheet" type="text/css" href="../assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css
">
<link rel="stylesheet" type="text/css" href="../assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="../assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.green.css
">
<link href="../assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.green.min.css">
 -->
<!-- Template Style CSS -->
<script>
//<![CDATA[
    // Global variables with content. "Available for Edit"
        fixedMenu = <?php echo $fixedMenu ; ?>,
        fixedSidebar = <?php echo $fixedSidebar ; ?>,
        slideRTL = <?php echo $slideRTL; ?>,
        showMoreText = '',
        followByEmailText = '';
//]]>
</script>
<link rel="stylesheet" type="text/css" href="../assets/plugins/lightGallery/dist/css/lightgallery.min.css"/>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JCD4HJ085S"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JCD4HJ085S');
</script>

</head>
