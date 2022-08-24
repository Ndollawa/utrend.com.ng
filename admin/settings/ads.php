<?php 

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
// echo $user_name = getUsername($_SESSION['user_id']);
// echo $user_image = getUserpic($_SESSION['user_id']);
if(isset($_POST['update-siteads'])){
	$qhome_pageAds1 = $database->escape_value($_POST['home_pageAds1']);
	$qhome_pageAds2=  $database->escape_value($_POST['home_pageAds2']);	
	$qsidebarAds =  $database->escape_value($_POST['sidebarAds']);
	$qpost_Ads1=  $database->escape_value($_POST['post_Ads1']);
	$qpost_Ads2=  $database->escape_value($_POST['post_Ads2']);
	$qpost_Ads3=  $database->escape_value($_POST['post_Ads3']);
	$qpost_Ads4=  $database->escape_value($_POST['post_Ads4']);

$sql = "UPDATE ads SET  home_pageAds1 = '$qhome_pageAds1', home_pageAds2= '$qhome_pageAds2',sidebarAds = '$qsidebarAds', post_Ads1= '$qpost_Ads1',post_Ads2= '$qpost_Ads2', post_Ads3 = '$qpost_Ads3', post_Ads4 = '$qpost_Ads4'  WHERE id = 1 ";
$send = $database->query($sql);
if($send){

	$message = '<h4 style="margin:10px  10px; padding:5px;" class="alert alert-success"><center>  ADS record updated successfully <i class=" icon-holder material-icons f-left" style="color:white;">done_all</i></center></h4>';
            header('Location:site-setting.php?tab=Ads');
      }
   }
?>											
							<form class="card" method="post"  name="adssetting-form" >
										<div class="card-header"> 
											<h3 class="card-title">Site Ads</h3> 
											<!-- <div class="card-options"> 
												<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div> --> 
											</div> 
											<div class="card-body"> 
												<div class="row">
												
												<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">Home page Ads 1</label> <textarea rows="5" class="form-control ads-editor" name="home_pageAds1" placeholder="Code here..."><?php echo $home_pageAds1; ?></textarea>
														 </div> 
														</div> 
												<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">Home Page Ads 2</label> <textarea rows="5" class="form-control ads-editor" name="home_pageAds2" placeholder="Code here.."><?php echo $home_pageAds2; ?></textarea>
														 </div> 
														</div> 
											
											<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">Sidebar Ads </label> <textarea rows="5" class="form-control ads-editor" name="sidebarAds" placeholder="Code here..."><?php echo $sidebarAds; ?></textarea>
														 </div> 
														</div> 
												<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">Post page Ads 1</label> <textarea rows="5" class="form-control ads-editor" name="post_Ads1" placeholder="Code here..."><?php echo $post_Ads1; ?></textarea>
														 </div> 
												<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">Post Page Ads 2</label> <textarea rows="5" class="form-control ads-editor" name="post_Ads2" placeholder="Code here.."><?php echo $post_Ads2; ?></textarea>
														 </div> 
														</div> 
												<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">Post Page Ads 3</label> <textarea rows="5" class="form-control ads-editor" name="post_Ads3" placeholder="Type here.."><?php echo $post_Ads3; ?></textarea>
														 </div> 
														</div> 
												<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">Post Page Ads 4</label> <textarea rows="5" class="form-control ads-editor" name="post_Ads4" placeholder="Type here.."><?php echo $post_Ads4; ?></textarea>
														 </div> 
														</div> 
													</div> 

														</div> 
												
												<div class="card-footer text-left"> 
													<button type="submit"  name="update-siteads" class="btn btn-primary">Update</button> </div>
												</div> 
											</form> 
							