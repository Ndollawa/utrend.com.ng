<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KWXHVN7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Theme Options -->
<div class='theme-options' style='display:none'>
<div class='ify-panel section' id='ify-panel'><div class='widget HTML' data-version='2' id='HTML150'>
<div class='widget-content'>
</div>
</div><div class='widget HTML' data-version='2' id='HTML151'>
</div>
</div>
</div>
<!-- Outer Wrapper -->
<div id='outer-wrapper'>
<!-- Header Wrapper -->
<header id='header-wrapper'>
<!-- Navbar -->
<div class='navbar-wrap'>
<div class='navbar'>
<div class='container row-x1'>
<span class='show-mobile-menu'></span>
<div class='main-logo-wrap'>
<div class='main-logo section' id='main-logo'><div class='widget Header' data-version='2' id='Header1'>
<div class='header-widget'>
<a class='main-logo-img' href='../'>
<img alt='<?php echo $website_name; ?>' data-height='34' data-width='174' src='../assets/images/<?php echo $brand_name_logo; ?>'/>
<h1 id='h1-tag'><?php echo $website_name; ?></h1>
</a>
</div>
</div></div>
</div>
<nav class='main-menu-wrap'>
<div class='galaxymag-main-menu section' id='galaxymag-main-menu'>
	<div class='widget LinkList' data-version='2' id='LinkList155'>
<ul id='galaxymag-main-menu-nav' role='menubar'>
<li><a href='../' role='menuitem'>Home</a></li>

<li ><a href="./scontent.php?search&label=Featured" role="menuitem">Featured</a></li>

<li class="has-sub mega-menu msimple">
	<a href="scontent.php?search&label=News" role="menuitem">News</a>
	<div class="getMega"><span  class="templateify-sc-node templateify-sc-node-getMega"></span></div>
	<ul class="mega-widget" id="news">

	</ul>
</li>
<li><a href="#" role="menuitem">Deals</a></li>
<li class="has-sub mega-menu tab mtabs">
	<a href="javascript:;" role="menuitem">Mega Tabs</a>
	<div class="getMega"><span class="templateify-sc-node templateify-sc-node-getMega"></span></div>
	<ul class="complex-tabs ">
		<ul class="select-tab">
			<?php
		$sql = "SELECT * FROM megatab_menu WHERE id = 1";
		$send = $database->query($sql);
		$row = $database->fetch_array($send);
		if($row>0){

			foreach ($send as $row) {
			$id = $row['id'];
			$menu[] = $row['menu1'];
			$menu[] = $row['menu2'];
			$menu[] = $row['menu3'];
			$menu[] = $row['menu4'];
			$menu[] = $row['menu5'];
			$menu[] = $row['menu6'];
			}
			for ($i=0; $i < count($menu) ; $i++) { 
		// 		if(isset($_SESSION['activemenu'])){
		// 		if($_SESSION['activemenu'] == $menu[$i]){
		// echo'<li ><a class="mega-postsmenu active" href="scontent.php?search&label='.$menu[$i].'" data-mega_menu='.$menu[$i].'>'.$menu[$i].'</a></li>';
		// 		}else{
				echo '<li class="" id="'.$i.'">
						<a class="mega-postsmenu " href="scontent.php?search&label='.$menu[$i].'" data-mega_menu='.$menu[$i].'>'.$menu[$i].'</a>
					</li>';
			// }
			}
		}
		?></ul>
	<div class="mega-tab tab-animated tab-active tab-fadeInUp">
		<ul class="mega-widget" id="megatab-posts">


		</ul>
	</div>
	</ul>
</li>
    <li class="has-sub">
		<a href="./scontent.php?search&label=Trends" role="menuitem">Trends</a>
		<ul class="sub-menu m-sub">
			<li><a href="./scontent.php?search&label=Fashion" role="menuitem">Fashion</a></li>
			<li><a href="./scontent.php?search&label=Innovations" role="menuitem">Gadgets</a></li>
		</ul>
	</li>
		<?php
		if(isset($_SESSION['user_id'])){
				echo "<li><a href='../admin/profile.php' role='menuitem'>Profile</a></li>";

			if($_SESSION['account_type'] == 'Admin'){
				if(isset($_GET['p_id'])){
				$p_id = $_GET['p_id'];	
				echo "<li><a href='../admin/edit-post.php?source&p_id=".$p_id."' role='menuitem'>Edit</a></li>";
				}
			}
		}else{
					if($L_S_visibility  =="true"){
					echo  '<li class="has-sub">
					<a href="javascript:;" role="menuitem">Users</a>
					<ul class="sub-menu m-sub">
					<li><a href="./login.php" role="menuitem">Log In</a></li>';
					if($siteType== "CMS"){
					echo '<li><a href="./sign-up.php" role="menuitem">Sign Up</a></li>';
					}
					echo '</ul></li>';
					} 
				}


		?>
</ul>
</div>
</div>
</nav>
<span class="show-search"></span>
<div id="nav-search">
<form  class="search-form" role="search" method="GET" id="navsearchform" action="./scontent.php">
<input autocomplete="on" class="search-input" name="search" id="search-input" placeholder="Search this blog" type="search" value="">
<!-- <button class="search-btn"><i class="fa fa-search"></i></button> --><!-- <i class="fa fa-search"></i> -->
<button type="submit" class="hide-search"></button>
</form>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>

</header>