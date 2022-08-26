<body class="app sidebar-mini">
    <!--<div id="loading"></div>-->


		<div class="page container-fluid">
			<div class="page-main">
				<div class="app-header header py-1 d-flex">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="../"> <img src="../assets/images/<?php echo $brand_name_logo; ?>" class="header-brand-img" alt="<?php echo $website_name; ?> logo"/> </a> <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div> <!-- <div class="searching"> <a href="javascript:void(0)" class="search-open searching1"> <i class="fa fa-search"></i> </a> <div class="search-inline"> <form> <input type="text" class="form-control" placeholder="Searching..."> <button type="submit"> <i class="fa fa-search"></i> </button> <a href="javascript:void(0)" class="search-close"> <i class="fa fa-times"></i> </a> </form>
										</div>
							 		</div>  -->
								</div>
							 <div class="d-flex order-lg-2 ml-auto">
							 	<div class="dropdown d-none d-md-flex"> <a class="nav-link icon full-screen-link"> <i class="fa fa-desktop floating" id="fullscreen-button"></i> </a> </div>

							 	<div class="dropdown d-none d-md-flex"> <a class="nav-link icon" data-toggle="dropdown" id="nothd">
							 		  <i class="fa fa-bell-o"></i> </a> <div class="dropdown-divider"></div> <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" id="notifyuser">

							 		</div> 

							 		</div>  
							 		   <?php if($_SESSION['user_role'] == 'Administrator'){
							 		 	echo' <div class="d-none d-md-flex dropdown">  <a href="site-setting.php" class="nav-link icon"> <i class="si si-settings  floating text-dark" title="Site Settings"></i> <span class="block"></span> </a> <div class="dropdown-divider"></div> </div>';}?>
							 		 <!-- 	<div class="dropdown d-none d-md-flex"> <a class="nav-link icon" data-toggle="dropdown"> <i class="fe fe-grid floating"></i> </a> <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  app-selector"> <ul class="drop-icon-wrap"> <li> <a href="#" class="drop-icon-item"> <i class="si si-envelope text-dark"></i> <span class="block"> E-mail</span> </a> </li> <li> <a href="#" class="drop-icon-item"> <i class="si si-map text-dark"></i> <span class="block">map</span> </a> </li> <li> <a href="#" class="drop-icon-item"> <i class="si si-bubbles text-dark"></i> <span class="block">Messages</span> </a> </li> <li> <a href="#" class="drop-icon-item"> <i class="si si-user-follow text-dark"></i> <span class="block">Followers</span> </a> </li> <li> <a href="#" class="drop-icon-item"> <i class="si si-picture text-dark"></i> <span class="block">Photos</span> </a> </li></ul>
							 		 		<div class="dropdown-divider"></div> <a href="#" class="dropdown-item text-center">View all</a> </div> </div> -->
							 		 		 <div class="dropdown"> <a href="#" class="nav-link pr-0 leading-none user-img user-img2" data-toggle="dropdown">  </a> <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow "> <a class="dropdown-item" href="profile.php"> <i class="dropdown-icon si si-user"></i> My Profile </a><!--  <a class="dropdown-item" href="emailservices.php"> <i class="dropdown-icon si si-envelope"></i> Inbox </a> --> <a class="dropdown-item" href="edit-profile.php"> <i class="dropdown-icon  si si-settings"></i> Account Settings </a> <a class="dropdown-item" href="../source/logout.php"> <i class="dropdown-icon si si-power"></i> Log out </a> </div> </div> </div> </div> </div> </div>
							 		  <!-- Sidebar menu-->
							 		  <div class="app-sidebar__overlay" data-toggle="sidebar">
							 		  </div>
							 		  <aside class="app-sidebar">
							 		   <div class="app-sidebar__user clearfix">
							 		   	<div class="dropdown user-pro-body"> <div class="user-profpicture container">  <button type="button" class="profile-img upload-profpic"> <label class="fa fa-pencil" for="profpic" aria-hidden="true"><input type="file" id="profpic" name="profpic" style="display: none;" accept=".jpeg, .jpg, .png, .gif" /> </label></button>
							 		   	<div class="profpic-fileinput"></div></div>
							 		   	<div class="user-info"> <h2><?php echo getUsername($_SESSION['user_id']); ?></h2> <span><?php echo $_SESSION['account_type'].": ".$_SESSION['user_role']; ?></span> </div>
							 		   </div>
							 		</div>
							 		<ul class="side-menu">
							 			<li class="border-0">
							 				<h3>Personal</h3></li>
							 			<li> </li>

							 			<?php if($_SESSION['account_type'] == 'Admin'){
							 	echo		'<li>
							 		 <a class="side-menu__item" href="index.php"><i class="side-menu__icon si si-speedometer"></i><span class="side-menu__label">Dashboard</span></a> </li>
							 		<li>';} ?>
							 		<li class="slide"> <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-file-text-o"></i><span class="side-menu__label">Posts</span><i class="angle fa fa-angle-right"></i></a>
							 			<ul class="slide-menu">
							 				<li> <a href="create-post.php" class="slide-item "> Create Post<!--  &nbsp;<i class="si si-note"></i> --></a> </li>
							 				<?php if($_SESSION['account_type'] == 'Admin'){
							 			echo	'<li> <a href="all-posts.php" class="slide-item">
							 				 View All Posts<!--  &nbsp;<i class="fa fa-eye"></i> --></a> </li> ';}?>

							 			</ul>
							 		</li>
							 		<?php if($_SESSION['account_type'] == 'Admin'){
							 	echo	'<li>
							 		 <a class="side-menu__item" href="categories.php"><i class="side-menu__icon si si-list"></i><span class="side-menu__label">Categories</span></a> </li>
							 		<li>
							 		 <a class="side-menu__item" href="comments.php"><i class="side-menu__icon si si-speech"></i><span class="side-menu__label">Comments</span></a> </li>
							 		 <!-- <li>
							 		 <a class="side-menu__item" href="ads.php"><i class="side-menu__icon si si-tag"></i><span class="side-menu__label">Adverts and Banners</span></a> </li>  -->
							 		  <li class="slide"> <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-trash"></i><span class="side-menu__label">Recycle Bin</span><i class="angle fa fa-angle-right"></i></a>
							 		 <ul class="slide-menu">
							 		 	 <li> <a href="post-recyclebin.php" class="slide-item">Posts<!-- &nbsp;<i class="fa fa-plus"></i> --></a> </li>
							 		 	 <li> <a href="category-recyclebin.php" class="slide-item">Categories<!-- &nbsp;<i class="fa fa-eye"></i> --></a> </li>
							 		 	 <li> <a href="users-recyclebin.php" class="slide-item">Users <!-- &nbsp;<i class="fa fa-eye"></i> --></a> </li>
							 		 	 </ul></li>';
if($_SESSION['user_role'] == 'Administrator'){
							 		 echo '<li class="slide"> <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon si si-people"></i><span class="side-menu__label">Users</span><i class="angle fa fa-angle-right"></i></a>
							 		 <ul class="slide-menu">
							 		 	 <li> <a href="create-user.php" class="slide-item">Add User <!-- &nbsp;<i class="fa fa-plus"></i> --></a> </li>
							 		 	 <li> <a href="all-users.php" class="slide-item">View All Users <!-- &nbsp;<i class="fa fa-eye"></i> --></a> </li> ';}}?>
							 		 	 	</ul></li>
							 		 </ul>
							 <div class="app-sidebar-footer">
							 	<!-- <a href="emailservices.php"> <span class="si si-envelope" aria-hidden="true"></span> </a>  -->
							 	<a href="profile.php"> <span class="si si-user" aria-hidden="true"></span> </a> <a href="edit-profile.php"> <span class="si si-settings" aria-hidden="true"></span> </a>
							 	<a href="../source/lockscreen.php"> <span class="si si-login" aria-hidden="true"></span> </a> <!-- <a href="chat.php"> <span class="si si-bubble" aria-hidden="true"></span> </a>  -->
							 </div>
						</aside>
					 <div class="app-content  my-3 my-md-5">
					 	<div class="modal" id="ajax-response"></div>
