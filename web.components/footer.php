<!-- Footer Wrapper -->
<footer id='footer-wrapper'>
<div class='container row-x1'>
<div class='footer-widgets-wrap'>
<div class='footer galaxymag-widget-ready section' id='footer-sec1' name='Footer 1'><div class='widget Label' data-version='2' id='Label3'>
<div class='widget-title'>
<h3 class='title'>
Categories
</h3>
</div>
<div class='widget-content list-label'>
<ul>
<?php
$query = "SELECT * FROM categories INNER JOIN posts ON categories.category_title = posts.category WHERE category_status = 'Active' GROUP BY categories.id ORDER BY COUNT(posts.post_views) DESC LIMIT 10 ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
  $cat_id = $row['id'];
  $cat_title = ucfirst($row['category_title']);
  $sql ="SELECT COUNT(id) as total FROM posts WHERE LOWER(post_tag) LIKE LOWER('%".$cat_title."%') AND post_status = 'Published' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
  $cat_count = $row['total'];
 }

  echo '<li>
<a class="label-name" href="scontent.php?search&label='.$cat_title.'">
 '.$cat_title.'<span class="label-count">('.$cat_count.')</span>
</a>
</li>';
  }?>
<!-- <span class="label-count">('.$cat_count.')</span> -->
</ul>
</div>
</div><div class='widget BlogSearch' data-version='2' id='BlogSearch1'>
<div class='widget-title'>
<h3 class='title'>
Search Here
</h3>
</div>
<div class='widget-content' role='search'>
<form class='search-form' target="_top" method="GET"  action="scontent.php" id="footer-search">
<input aria-label='Search this blog' autocomplete='off' class='search-input' id="fsearch-input" name='search' placeholder='Search this blog' value=''/>
<input class='search-action' type='submit' value='Search'/>
</form>
</div>
</div></div>
<div class='footer galaxymag-widget-ready section' id='footer-sec2' name='Footer 2'><div class='widget HTML' data-version='2' id='HTML4'>
<div class='widget-title'>
<h3 class='title'>
Recent Gedgets
</h3>
</div>
<div class='widget-content' ><div class="custom-widget" id="recentgadgets">

  <center><div id="loader-icon"><img src="../assets/images/preloader6.jpg" style="width: 30px;" alt="" /></div></center>
 </div>
</div>
</div></div>
<div class='footer galaxymag-widget-ready section' id='footer-sec3' name='Footer 3'><div class='widget PopularPosts' data-version='2' id='PopularPosts2'>
<div class='widget-title'>
<h3 class='title'>
Most Popular
</h3>
</div>
<div class='widget-content' id="footer-popularposts">
  <center><div id="loader-icon"><img src="../assets/images/preloader6.jpg" style="width: 30px;" alt="" /></div></center>
</div>
</div></div>
</div>
<div class='about-section section' id='about-section' name='About Section'><div class='widget Image' data-version='2' id=''>
<div class='widget-content'>
<div class='footer-logo custom-image'>
<a href='../index.php'>
<img alt='<?php echo $website_name; ?>'  src='../assets/images/<?php echo $brand_name_logo; ?>'/>
</a>
</div>
<div class='about-content'>
<div class='widget-title'>
<h3 class='title'>
About Us
</h3>
</div>
<span class='image-caption excerpt'><?php echo $site_description; ?></span>
</div>
</div>
</div><div class='widget LinkList' data-version='2' id='LinkList157'>
<div class='widget-content'>
<ul class='social-footer social social-color'>
  <?php if(isset($sfacebooklink) && $sfacebooklink != ""){
echo"<li class='facebook-f'><a class='facebook-f' href=".$sfacebooklink." target='_blank'></a></li>";
}

if(isset($stwitterhandle) && $stwitterhandle != ""){
  echo "<li class='twitter'><a class='twitter' href=".$stwitterhandle." target='_blank'></a></li>";
}

if(isset($sinstagrampage) && $sinstagrampage != ""){
  echo "<li class='instagram'><a class='instagram' href=".$sinstagrampage." target='_blank'></a></li>";
}
if(isset($swhatsapp) && $swhatsapp != ""){
  echo "<li class='whatsapp'><a class='whatsapp' href=".$swhatsapp." target='_blank'></a></li>";
}
?>
</ul>
</div>
</div></div>
</div>
<div id='sub-footer-wrapper'>
<div class='container row-x1'>
<div class='footer-copyright section' id='footer-copyright' name='Footer Copyright'><div class='widget Text' data-version='2' id='Text150'>
<span class='copyright-text'>Copyright © 2020 - <?php echo date('Y'); ?>&nbsp;&nbsp; <a href="<?php echo $website_link; ?>"><?php echo $website_name; ?></a>  &nbsp;</br>All rights Reserved &ensp; Designed by - <a href="mailto:foundictsolutions@gmail.com" target="email">Found ICT Solutions</a></span>
</div></div>
<div class='footer-menu section' id='footer-menu' name='Footer Menu'><div class='widget LinkList' data-version='2' id='LinkList158'>
<div class='widget-content'>
<ul>
<li><a href='about-us.php'>About</a></li>
<li><a href='privacy.php'>Privacy</a></li>
<li><a href='contact-us.php'>Contact Us</a></li>
</ul>
</div>
</div></div>
</div>
</div>
</footer>

