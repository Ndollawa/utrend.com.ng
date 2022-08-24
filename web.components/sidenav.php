<aside id='sidebar-wrapper'>
<div class='sidebar galaxymag-widget-ready no-items section' id='sidebar1' name='Sidebar 1'></div>
<div class='sidebar section' id='social-counter' name='Social Count'><div class='widget LinkList' data-version='2' id='LinkList156'>
<div class='widget-title'>
<h3 class='title'>
Follow Us
</h3>
</div>
<div class='widget-content'>
<ul class='social-icons social social-color'>

	<?php if(isset($sfacebooklink) && $sfacebooklink != ""){
	echo "<li class='facebook-f link-0'><a class='facebook-f' data-content='".$sfacebooklink."' href='".$sfacebooklink."' target='_blank'><span class=''></span></a></li>";
}?>

<?php if(isset($stwitterhandle) && $stwitterhandle != ""){
	echo "<li class='twitter link-1'><a class='twitter' data-content='".$stwitterhandle."' href='".$stwitterhandle."' target='_blank'><span class='count'></span></a></li>";
}?>

<?php if(isset($syoutube) && $syoutube != ""){
	echo "
<li class='youtube link-2'><a class='youtube' data-content='".$syoutube."' href='".$syoutube."' target='_blank'><span class='count'></span></a></li>";
}?>

<?php if(isset($sinstagrampage) && $sinstagrampage != ""){
	echo "<li class='instagram link-4'><a class='instagram' data-content='".$sinstagrampage."' href='".$sinstagrampage."' target='_blank'><span class='count'></span></a></li>";
}?>
 <?php if(isset($swhatsapp) && $swhatsapp != ""){
	echo "
<li class='whatsapp link-3'><a class='whatsapp' data-content='".$swhatsapp."' href='".$swhatsapp."' target='_blank'><span class='count'></span></a></li>";
}?>
</ul>
</div>
</div></div>
<div class='sidebar galaxymag-widget-ready no-items section' id='sidebar2' name='Sidebar 2'></div>
<div class='sidebar sidebar-tabs galaxymag-widget-ready section' id='sidebar-tabs' name='Sidebar Tabs'><div class='widget PopularPosts' data-version='2' id='PopularPosts1'>
<div class='widget-title'>
<h3 class='title'>
Popular
</h3>
</div>
<div class='widget-content' >
<div class="custom-widget" id="popularposts">
	<center><div id="loader-icon"><img src="../assets/images/preloader5.gif" style="width: 150px;" alt="" /></div></center>
</div>
</div>
</div><div class='widget HTML' data-version='2' id='HTML6'>
<div class='widget-title'>
<h3 class='title'>
Recents
</h3>
</div>
<div class='widget-content' >
<div class="custom-widget" id="recentposts">
<center><div id="loader-icon"><img src="../assets/images/preloader5.gif" style="width: 150px;" alt="" /></div></center>

</div></div>
</div><div class='widget HTML' data-version='2' id='HTML7'>
<div class='widget-title'>
<h3 class='title'>
Comments
</h3>
</div>
<div class='widget-content'>
<div class="custom-widget container" id="recentcomments">
<center><div id="loader-icon"><img src="../assets/images/preloader5.gif" style="width: 150px;" alt="" /></div></center>
</div>
</div>
</div></div>
<div class='sidebar galaxymag-widget-ready section' id='sidebar3' name='Sidebar 3'><div class='widget HTML' data-version='2' id='HTML16'>
<div class='widget-content'><?php echo $sidebarAds; ?>
</div>
</div><div class='widget HTML' data-version='2' id='HTML10'>
<div class='widget-title'>
<h3 class='title'>
Mobile Apps
</h3>
</div>
<div class='widget-content'>
	<div class="custom-widget" id="mobileapps">
<center><div id="loader-icon"><img src="../assets/images/preloader5.gif" style="width: 150px;" alt="" /></div></center>

	</div>
</div>
</div><div class='widget Label' data-version='2' id='Label2'>
<div class='widget-title'>
<h3 class='title'>
Categories
</h3>
</div>
<div class='widget-content list-label'>
<ul>
	<?php
$query = "SELECT * FROM categories WHERE category_status = 'Active' ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$cat_id = $row['id'];
	$cat_title = ucfirst($row['category_title']);
	$sql ="SELECT COUNT(id) as total FROM posts WHERE post_tag LIKE '%".$cat_title."%' AND post_status = 'Published' ";
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

</div>
</div><div class='widget Label' data-version='2' id='Label1'>
<div class='widget-title'>
<h3 class='title'>
Tags
</h3>
</div>
<div class='widget-content cloud-label'>
<ul>
		<?php
$query = "SELECT * FROM categories WHERE category_status = 'Active' ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$cat_id = $row['id'];
	$cat_title = ucfirst($row['category_title']);
	echo '<li>
<a class="label-name" href="scontent.php?search&label='.$cat_title.'">
 '.$cat_title.'
</a>
</li>';
	}?>

</ul>
</div>
</div></div>
</aside>