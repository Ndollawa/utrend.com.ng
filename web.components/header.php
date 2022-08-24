
<!DOCTYPE html>
<html class='ltr' dir='ltr' >
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
<?php include '../queries/post-queries.php'; ?>

<head>
<meta content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1' name='viewport'/>
<title><?php echo $website_name; ?></title>
<link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>

<link href='../assets/images/<?php echo $favicon; ?>' rel="icon" type='image/*'/>
<meta content='#003aff' name='theme-color'/>
<meta content='#003aff' name='msapplication-navbutton-color'/>
<link href='index.php' rel='canonical'/>
<!--<link rel="alternate" type="application/atom+xml" title="<?php echo $website_name; ?>- Atom" href="feeds/posts/default" />-->
<!--<link rel="alternate" type="application/rss+xml" title="<?php echo $website_name; ?>- RSS" href="feeds/posts/default9522" />-->
<!-- Metadata for Open Graph protocol. See http://ogp.me/. -->
<meta content='website' property='og:type'/>
<meta property="og:site_name" content="<?php echo $website_name; ?>">
<meta property="og:image:type" content="image/jpeg">
<meta content='207867290894154' property='fb:app_id'/>
<!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">
<title><?php echo $website_name; if(isset($post_title)){echo ' | '.$post_title;} ?></title>
 <meta content='<?php if(isset($metaInfo) & !empty($metaInfo)){echo ($post_title);}else{ echo $website_name;} ?>' property='og:site_name'/>
 <meta content='<?php if(isset($metaInfo) & !empty($metaInfo)){echo ($post_title);}else{ echo $website_name;} ?>' property='og:title'/>
<meta content='<?php if(isset($metaInfo) & !empty($metaInfo)){echo $website_link."/source/content.php?source%26p_id=".$post_id."%26title=".preg_replace("/ /", "+",$post_title);}else{ echo $website_link."/source/";} ?>' property='og:url'/>
<meta content='<?php if(isset($metaInfo) & !empty($metaInfo)){echo $website_link."/assets/images/blog/".$post_cover;}else{ echo $website_link."/assets/images/Utrendcover.jpg";} ?>' property='og:image'/>
<meta content='<?php if(isset($metaInfo) & !empty($metaInfo)){echo strip_tags(substr($post_content, 0,300));}else{ echo $site_description;} ?>' property='og:description' />

<?php if(isset($metaInfo) & !empty($metaInfo)){
    
    $filter = array("is","and","this","that","how","where","when","what","a","to","then","them","who","let","have","should","would","those","does","do","done","did","can","we","you","him","she","her","help","if","all","was","could","in","on","under","over","but");
	$key = explode(' ', $post_title);

	foreach ($key as $word) {
	if(!in_array($word, $filter)){
		$keywords[] = $word;
    }}
  echo  '<meta content="'.$keywords = implode(",", $keywords).'" name="keywords"/>';}?>
<meta content='<?php if(isset($metaInfo) & !empty($metaInfo)){echo $website_link."/assets/images/blog/".$post_cover;}else{ echo $website_link."/assets/images/Utrendcover.jpg";} ?>' name='twitter:card'/>
<meta content='<?php if(isset($metaInfo) & !empty($metaInfo)){echo ($post_title);}else{ echo $website_name;} ?>' name='twitter:title'/>
<meta content='<?php if(isset($metaInfo) & !empty($metaInfo)){echo $website_link."/source/content.php?source%26p_id=".$post_id."%26title=".preg_replace("/ /", "+",$post_title);}else{ echo $website_link."/source/";} ?>' property ='twitter:url'/>
<meta content='<?php if(isset($metaInfo) & !empty($metaInfo)){echo strip_tags(substr($post_content, 0,300));}else{ echo $site_description;} ?>' name='twitter:description'/>
<!-- Font Awesome Free 5.11.2 -->
<link href='../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css' rel='stylesheet'/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />

<script data-ad-client="ca-pub-9461395147716507" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<link rel="stylesheet" type="text/css" href='../assets/css/styles.php' />

<link href="../assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet">
<!-- Jquery Toast css -->
<link rel="stylesheet" href="../assets/plugins/jquery-toast/dist/jquery.toast.min.css">
<link rel="stylesheet" type="text/css" href="../assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">

<!-- <link rel="stylesheet" type="text/css" href="../assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css
">
<link rel="stylesheet" type="text/css" href="../assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="../assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.green.css
">
<link rel="stylesheet" type="text/css" href="../assets/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.green.min.css">
 -->
<!-- Template Style CSS -->
<script defer='defer' type='text/javascript'>
//<![CDATA[
    // Global variables with content. "Available for Edit"
        fixedMenu = <?php echo $fixedMenu ; ?>,
        fixedSidebar = <?php echo $fixedSidebar ; ?>,
        slideRTL = <?php echo $slideRTL; ?>,
        showMoreText = '',
        followByEmailText = '';
//]]>
</script>
<!-- Google Analytics -->

</head>
