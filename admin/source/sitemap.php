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
$output = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
<loc>https://utrend.com.ng</loc>
<lastmod>'.date('Y-m-d').'</lastmod>
</url>
<url>
<loc>https://utrend.com.ng/login.php</loc>
<lastmod>'.date('Y-m-d').'</lastmod>
</url>
<url>
<loc>https://utrend.com.ng/sign-up.php</loc>
<lastmod>'.date('Y-m-d').'</lastmod>
</url>
<url>
<loc>https://utrend.com.ng/about-us.php</loc>
<lastmod>'.date('Y-m-d').'</lastmod>
</url>
<url>
<loc>https://utrend.com.ng/privacy.php</loc>
<lastmod>'.date('Y-m-d').'</lastmod>
</url>
<url>
<loc>https://utrend.com.ng/contact-us.php</loc>
<lastmod>'.date('Y-m-d').'</lastmod>
<lastmod>daily</lastmod>
</url>
';
$query = "SELECT * FROM categories WHERE category_status = 'Active' ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$cat_id = $row['id'];
	$cat_title = ucfirst(str_replace('&','&amp;',$row['category_title']));
	$output .= "<url>
<loc>$website_link/scontent.php?search&amp;label=$cat_title</loc>
<lastmod>".date('Y-m-d')."</lastmod>
</url>";
	}
	$query = "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY id DESC ";
				$send = $database->query($query);
				$row = $database->fetch_array($send);
				// $count = 1;
				$rowcount = $database->num_rows($send);
				if($send){
				if($rowcount>0){
				foreach ($send as $row) {
					$post_id = $row['id'];
					$post_title =  $row['post_title'];
					$post_author = getUsername($row['author']);
					$post_tag = $row['post_tag'];
					$post_content = $row['post_content'];
					$post_cat = $row['category'];
					$post_status = $row['post_status'];
					$post_time = date('Y-m-d', strtotime($row['post_time']));
					$post_file = $row['post_cover'];
					$review_status = $row['review_status'];

				$output .=	"<url>
<loc>$website_link/content.php?source&amp;p_id=".$post_id."&amp;title=".str_replace(['&','.',' '],['&amp;','','-'], $post_title)."</loc>
<lastmod>$post_time</lastmod>
</url>";
				
					}
				    
				}
				}
				$output .= '</urlset>';
				echo $output;	?>