<?php
use unicalCSphp\UploadFile;
$msg ="";
$Fname= array();
$result= array();
 $message= "";
if(isset($_POST['action'])){

include '../../backend/database.php';
include '../../backend/timeAgo.php';
include'../../backend/functions.php';

if($_POST['action'] == 'turnOn_fixedMenu'){
$sql = "UPDATE general SET fixedMenu = 'true' WHERE id =1";
$send = $database->query($sql);
}elseif ($_POST['action'] == 'turnOff_fixedMenu') {
$sql = "UPDATE general SET fixedMenu = 'false' WHERE id =1";
$send = $database->query($sql);

}

if($_POST['action'] == 'turnOn_fixedSidebar'){
$sql = "UPDATE general SET fixedSidebar = 'true' WHERE id =1";
$send = $database->query($sql);
}elseif ($_POST['action'] == 'turnOff_fixedSidebar') {
$sql = "UPDATE general SET fixedSidebar = 'false' WHERE id =1";
$send = $database->query($sql);

}
if($_POST['action'] == 'turnOn_slideRTL'){
$sql = "UPDATE general SET slideRTL = 'true' WHERE id =1";
$send = $database->query($sql);
}elseif ($_POST['action'] == 'turnOff_slideRTL') {
$sql = "UPDATE general SET slideRTL = 'false' WHERE id =1";
$send = $database->query($sql);

}

if($_POST['action'] == 'turnOn_show_login_signup'){
$sql = "UPDATE general SET login_signup= 'true' WHERE id =1";
$send = $database->query($sql);
}elseif ($_POST['action'] == 'turnOff_show_login_signup') {
$sql = "UPDATE general SET login_signup = 'false' WHERE id =1";
$send = $database->query($sql);

}
}

if(isset($_POST['update-siteprofile'])){

  $destination = '../assets/images/';
	$website_name=  $database->escape_value($_POST['website_name']);
	$address = $database->escape_value($_POST['address']);
	$sitetype =  $database->escape_value($_POST['sitetype']);
	$city =  $database->escape_value($_POST['city']);
	$zip_code =  $database->escape_value($_POST['zip-code']);

	 $theme_color1 =  $database->escape_value($_POST['theme-color1']);
$theme_color2 =  $database->escape_value($_POST['theme-color2']);

	$country = $database->escape_value(ucfirst($_POST['country']));
	$facebooklink = $database->escape_value(lcfirst($_POST['fblink']));
	$twitterhandle = $database->escape_value(lcfirst($_POST['twitterhandle']));
	$website_link =  $database->escape_value(lcfirst($_POST['sitelink']));
	$instagrampage = $database->escape_value(lcfirst($_POST['instagrampage']));
	$youtube = $database->escape_value(lcfirst($_POST['youtube']));
	$whatsapp = $database->escape_value(lcfirst($_POST['whatsapp']));
  $site_description=  $database->escape_value($_POST['site-description']);

$sql = "UPDATE general SET theme_colour_one = '$theme_color1', theme_colour_two = '$theme_color2', website_name = '$website_name', website_link ='$website_link', site_description = '$site_description',address = '$address',city = '$city',zip_code = '$zip_code', country = '$country', facebooklink = '$facebooklink',twitterhandle = '$twitterhandle',  instagrampage = '$instagrampage', site_type = '$sitetype', youtube = '$youtube' ,whatsapplink = '$whatsapp' WHERE id = 1 ";
$send = $database->query($sql);
if($send){
	$message = '<h4 style="margin:10px  10px; padding:5px;" class="alert alert-success"><center>  Record updated successfully <i class=" icon-holder material-icons f-left" style="color:white;">done_all</i></center></h4>';
        header('Location:site-setting.php?tab=General') ;
      }else {
           $msg ='<h4 style="margin:10px  10px; padding:5px;" class="alert alert-danger"><center>Please fill out all entries..</center></h4>';
   }
}

?>
							<div class="card">
										<div class="card-header">
											<h3 class="card-title">Edit Website</h3>
											<!-- <div class="card-options">
												<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div>  -->
											</div>
											<div class="card-body">
												<div class="row">
<?php

$sql = "SELECT loader,theme_colour_one,theme_colour_two FROM general WHERE id =1"; 
$query = $database->query($sql);
$row = $database->fetch_array($query);
foreach($query as $key => $row) {
$theme_colour_one = $row["theme_colour_one"];
$theme_colour_two = $row["theme_colour_two"];
$loader = $row["loader"];            
              } 
?>
											
												<div class="col-md-12">
													<div class="form-group mb-0 ">
													<h6> Fixed Menu</h6>
														<label class="switch pull-right"><input type="checkbox" id="fixedMenu" class="switch" name="fixedMenu"<?php if( $fixedMenu== 'true'){
															echo 'checked';
														} ?> value="<?php echo $fixedMenu; ?>"><span class="slider round"></span></input></label>
														 </div>
														</div>
												<div class="col-md-12">
													<div class="form-group mb-0 ">
													<h6> Scrollable Sidebar</h6>
														<label class="switch pull-right"><input type="checkbox" id="fixedSidebar" class="switch" name="fixedSidebar"<?php if( $fixedSidebar== 'true'){
															echo 'checked';
														} ?> value="<?php echo $fixedSidebar; ?>"><span class="slider round"></span></input></label>
														 </div>
												</div>
												<div class="col-md-12">
													<div class="form-group mb-0 ">
													<h6> Slide RTL</h6>
														<label class="switch pull-right"><input type="checkbox" id="slideRTL" class="switch" name="slideRTL"<?php if( $slideRTL== 'true'){	echo 'checked';	} ?> value="<?php echo $slideRTL; ?>"><span class="slider round"></span></input></label>
														 </div>
														</div>
										<div class="col-md-12">
											<div class="form-group mb-0 ">
													<h6> Show Login/Signup</h6>
														<label class="switch pull-right"><input type="checkbox" id="show_login_signup" class="switch" name="show_login_signup"<?php if( $L_S_visibility== 'true'){	echo 'checked';	} ?> value="<?php echo $L_S_visibility; ?>"><span class="slider round"></span></input></label>
														 </div>
														</div>
											</div>
												<form method="post"  name="gsetting-form" > <div class="row">
														<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label class="form-label" for="theme-color1" >Theme Colour One</label> <input type="color"id="theme-color1"  class="form-control" name="theme-color1" value="<?php echo $theme_colour_one; ?>" />
													</div>
											</div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label class="form-label" for="theme-color2">Theme Colour Two</label> <input type="color" id="theme-color2" class="form-control" name="theme-color2" value="<?php echo $theme_colour_two; ?>" />
													</div>
												</div>
											
													<div class="col-md-4 col-sm-6">
														<div class="form-group"> <label class="form-label">Website Name</label> <input type="text" class="form-control" name="website_name" placeholder="name" value="<?php echo $website_name; ?>"/>
														</div>
											</div>
									<div class="col-sm-6 col-md-4">
										<div class="form-group">
										    <label class="form-label">Website Type</label> <select class="form-control" name="sitetype" ><option value="<?php echo $siteType; ?>"><?php if($siteType == ""){ echo "..Select";}else{ echo $siteType;} ?></option>
											<?php if($siteType == 'BLOG'){
									echo '<option value="CMS">CMS</option>';}elseif($siteType == 'CMS'){
									    echo '<option value="BLOG">BLOG</option>';
									}else{
									    echo '	<option value="CMS">CMS</option>
										<option value="BLOG">BLOG</option>';
									}?>
											</select>
													</div>
												</div>

												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label class="form-label">Site Link</label> <input type="text" class="form-control" name="sitelink" value="<?php echo $website_link; ?>" placeholder="site url"/>
													</div>
												</div>

												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label class="form-label">Facebook Link</label> <input type="text" class="form-control" name="fblink" value="<?php echo $facebooklink; ?>" placeholder="http://facebook.com/username"/>
													</div>
												</div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label class="form-label">Instagram Handle</label> <input type="text" class="form-control" name="instagrampage" value="<?php echo $instagrampage; ?>" placeholder="Instagram page link"/>
													</div>
												</div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label class="form-label">Youtube</label> <input type="text" class="form-control" name="youtube" value="<?php echo $youtube; ?>" placeholder=" Youtube Channel"/>
													</div>
												</div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label class="form-label">Twitter Handle</label> <input type="text" class="form-control" name="twitterhandle" value="<?php echo $twitterhandle; ?>" placeholder=" Twitter Handle"/>
													</div>
												</div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label class="form-label">Whatsapp Link</label> <input type="text" class="form-control" name="whatsapp" value="<?php echo $whatsapp; ?>" placeholder=" Whatsapp link"/>
													</div>
												</div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label class="form-label">Postal Code</label> <input type="number" class="form-control" name="zip-code" value="<?php echo $zip_code; ?>" placeholder="ZIP Code"/>
													</div>
												</div>
												<div class="col-sm-6 col-md-4">
													<div class="form-group">
														<label class="form-label">Country</label> <input type="text" class="form-control" name="country" value="<?php echo $country; ?>" placeholder=" Country"/>
													</div>
												</div>
												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<label class="form-label">Address</label> <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" placeholder="Home Address"/>
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">City</label> <input type="text" class="form-control" name="city" value="<?php echo $city; ?>" placeholder="City"/>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group mb-0">
														<label class="form-label">Site Description</label> <textarea rows="5" class="form-control" name="site-description" placeholder="Enter site description"><?php echo $site_description; ?></textarea>
														 </div>
														</div>
													</div>
												</div>
												<div class="card-footer text-right">
													<button type="submit"  name="update-siteprofile" class="btn btn-primary">Update Site Profile</button> </div>
												</div>
											</form>
										</div>