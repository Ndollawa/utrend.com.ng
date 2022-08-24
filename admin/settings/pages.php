<?php 

$sql = "SELECT * FROM blog_settings WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
	$about = $row['about_us'];
	$privacy=  $row['privacy'];
	$contact_us =  $row['contact_us'];
	// $logo =  $row['logo'];
	// $about_us =  $row['about_us'];
	

}
if(isset($_POST['update-sitepages'])){

// require_once '../src/unicalCSphp/UploadFile.php';privacy
//   $destination = '../../assets/images/';
	$about_us =  $database->escape_value($_POST['about-us']);
	$privacy = $database->escape_value($_POST['privacy']);
	$contact_us =  $database->escape_value($_POST['contact-us']);
	

$sql = "UPDATE blog_settings SET about_us = '$about_us', privacy = '$privacy',contact_us = '$contact_us' WHERE id = 1 ";
$send = $database->query($sql);
if($send){
	$message = '<h4 style="margin:10px  10px; padding:5px;" class="alert alert-success"><center>  pages record updated successfully <i class=" icon-holder material-icons f-left" style="color:white;">done_all</i></center></h4>';
         header('Location:site-setting.php?tab=Pages') ;    
      }
   }
?>											
							<form class="card" method="post" name="pagessetting-form" >
										<div class="card-header"> 
											<h3 class="card-title">Edit pages</h3> 
											<div class="card-options"> 
												<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div> 
											</div> 
											<div class="card-body"> 
												<div class="row">
												
												<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">About</label> <textarea rows="5" class="form-control editor" name="about-us" placeholder="Type here..."><?php echo $about; ?></textarea>
														 </div> 
														</div> 
												<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">Privacy</label> <textarea rows="5" class="form-control editor" name="privacy" placeholder="Type here.."><?php echo $privacy; ?></textarea>
														 </div> 
														</div> 
												<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">Contact Us</label> <textarea rows="5" class="form-control editor" name="contact-us" placeholder="Type here.."><?php echo $contact_us; ?></textarea>
														 </div> 
														</div> 
													</div> 
											
												<div class="card-footer text-right"> 
													<button type="submit"  name="update-sitepages" class="btn btn-primary">Update Site Pages</button> </div>
												</div> 
											</form> 
							