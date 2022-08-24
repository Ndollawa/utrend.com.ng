
<?php require 'webcomponents/admin-header.php'; ?>
<?php require 'webcomponents/admin-sidebar.php'; ?>
<?php
if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:../index.php");
  exit();
}elseif($_SESSION['account_type'] != "Admin" && $_SESSION['user_role'] != "Administrator"){ 
					header ("location:../source/500.php");
					exit();}
					?>
<?php  $message= ""; ?>
<div class="side-app"> 
					<div class=" content-area"> <div class="page-header"> <h4 class="page-title">Site Settings</h4> <ol class="breadcrumb"> <li class="breadcrumb-item"><a href="#">Settings</a></li> 
						<li class="breadcrumb-item active" aria-current="page">Options</li> 
				</ol> 
			</div> 
			<div id="response"></div>
			<?php echo $message; ?>
			<div class="row "> 
				<div class="col-lg-4"> 
					<div class="card"> 
						<div class="card-header"> 
							<h3 class="card-title"> Menu</h3> 
						<!-- 	<div class="card-options"> 
								<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
								 <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> 
								</div> --> 
							</div> 
							<div class="card-body"> 
						 <div class="setting-menu">
						 <ul class="setting-menu-option">
								<li <?php if( isset($_GET['tab']) && $_GET['tab'] == 'General'){echo 'style="background:'.$theme_colour_one.';" class="active"';}
								    ?>
								><a class="menu-list " href="site-setting.php?tab=General"><i class="fa fa-home"></i>&ensp; General </a></li>
						 		<li <?php if( isset($_GET['tab']) && $_GET['tab'] == 'Pages'){echo 'style="background:'.$theme_colour_one.';" class="active"';}
								    ?>><a class="menu-list " href="site-setting.php?tab=Pages"><i class="fa fa-file"></i>&ensp; Pages</a></li>
						 		<li <?php if( isset($_GET['tab']) && $_GET['tab'] == 'Ads'){echo 'style="background:'.$theme_colour_one.';" class="active"';}
								    ?>><a class="menu-list " href="site-setting.php?tab=Ads"><i class="fa fa-gg"></i>&ensp; Ads </a></li>
						 		<li <?php if( isset($_GET['tab']) && $_GET['tab'] == 'Posts'){echo 'style="background:'.$theme_colour_one.';" class="active"';}
								    ?>><a class="menu-list " href="site-setting.php?tab=Posts"><i class="fa fa-edit"></i>&ensp; Posts </a></li>
						 		
						 		<li <?php if( isset($_GET['tab']) && $_GET['tab'] == 'Users'){echo 'style="background:'.$theme_colour_one.';" class="active"';}
								    ?>><a class="menu-list " href="site-setting.php?tab=Users"><i class="fa fa-users"></i> Users </a></li>
						 		<li <?php if( isset($_GET['tab']) && $_GET['tab'] == 'Images'){echo 'style="background:'.$theme_colour_one.';" class="active"';}
								    ?>><a class="menu-list " href="site-setting.php?tab=Images"><i class="fa fa-image"></i>&ensp;  Site Images </a></li>
						 		<!-- <li><a class="menu-list " href="site-setting.php?tab=Category"><i class="fa fa-reorder"></i>&ensp; Category</a></li> -->
						 		<!-- <li><a class="menu-list " href="site-setting.php?tab="></a></li> -->
						 	</ul>
						 </div>
							</div> 
									</div> 
								</div> 
								<div class="col-lg-8"> 
								<?php 
if(isset($_GET['tab']))	{
	$condition = $_GET['tab'];
}else{
	$condition ="";
}
switch ($condition) {
	case 'General':
	include 'settings/general.php';
		break;
	
	case 'Pages':
	include 'settings/pages.php';
		break;

	case 'Ads':
	include 'settings/ads.php';
		break;

	case 'Posts':
	include 'settings/posts.php';
		break;

	case 'Images':
	include 'settings/site-image.php';
		break;

		case 'Users':
	include 'settings/users.php';
		break;

	default:
		include 'settings/general.php';
		$_GET['tab'] = 'General';
		break;
}



									?>
										</div> 
										 </div> </div></div></div>
<?php require 'webcomponents/admin-footer.php'; ?>
	<?php require 'webcomponents/admin-js.php';?>
		</body>
	</html>
