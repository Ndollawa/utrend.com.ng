
<?php require 'webcomponents/admin-header.php'; ?>
<?php require 'webcomponents/admin-sidebar.php'; ?>
<?php
if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:../index.php");
  exit();
}
					?>
<?php require 'admin-queries/profile-queries.php'; ?>
	<div class="side-app"> 
					<div class=" content-area"> <div class="page-header"> <h4 class="page-title">Edit Profile</h4> <ol class="breadcrumb"> <li class="breadcrumb-item"><a href="#">Profile</a></li> 
						<li class="breadcrumb-item active" aria-current="page">Edit Profile</li> 
				</ol> 
			</div> 
			<div id="response"></div>
			<?php echo $message; ?>
			<div class="row "> 
				<div class="col-lg-4"> 
					<div class="card"> 
						<div class="card-header"> 
							<h3 class="card-title">My Profile</h3> 
							<!-- <div class="card-options"> 
								<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
								 <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> 
								</div>  -->
							</div> 
							<div class="card-body"> 
								<form method="post" action="" id="pfsetting1-form"> 
									<div class="row mb-2"> 
										<div class="col-auto user-profpicture"> 
											<!-- <img class="avatar brround avatar-xl" src="assets/images/<?php echo getUserpic($_SESSION['user_id']);?>" alt="Avatar-img"/>  -->
										</div> 
										<div class="col"> 
											<h3 class="mb-1 "><?php echo getUsername($_SESSION['user_id']); ?></h3> 
											<p class="mb-4 "><?php echo $user_role; ?></p>
										</div> 
									</div> 
									<div class="form-group"> 
										<label class="form-label">Bio</label> 
										<textarea class="form-control" name="user-bio" rows="5"><?php echo $user_bio; ?></textarea> </div> 
										<div class="form-group"> 
											<label class="form-label">Email-Address</label> <input class="form-control" name="email" placeholder="your-email@domain.com" value="<?php echo $user_email; ?>"/> 
										</div> 
										<div class="form-group"> 
											<label class="form-label">New Password</label> <input type="password" id="password" name="password" class="form-control" /> <!-- value="<?php echo $password; ?>" -->
										</div> 
										<div class="form-group"> 
											<label class="form-label"> Confirm Password</label> <input type="password" id="confirmpassword" name="confirmpassword" class="form-control"> 
										</div> 
										<div class="form-group"> 
											<label class="form-label">Website</label> 
											<input class="form-control" name="website" value="<?php echo $externallink; ?>" placeholder="http://Utrend.com.ng"/> 
										</div> 
										<div class="form-footer"> 
											<button type="submit" class=" btn btn-primary btn-block pfsetting1" name="pfsetting1">Save</button>
										</div> 
								</form> 
							</div> 
									</div> 
								</div> 
								<div class="col-lg-8"> 
									<form class="card" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" name="pfsetting2-form" enctype="multipart/form-data"> 
										<div class="card-header"> 
											<h3 class="card-title">Edit Profile</h3> 
											<div class="card-options"> 
												<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div> 
											</div> 
											<div class="card-body"> 
												<div class="row"> 
													<div class="col-md-5"> 
														<div class="form-group"> <label class="form-label">Company</label> <input type="text" class="form-control" name="company" placeholder="Company" value="<?php echo $company; ?>"/> 
														</div> 
											</div> 
											<div class="col-sm-6 col-md-3"> 
												<div class="form-group"> 
													<label class="form-label">Username</label> <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $user_username; ?>"/> 
												</div> 
											</div> 
											<div class="col-sm-6 col-md-4"> 
												<div class="form-group"> 
													 <label class="form-label">Email address</label> <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $user_email; ?>"/> 
													</div> 
												</div> 
												<div class="col-sm-6 col-md-6"> 
													<div class="form-group"> 
														<label class="form-label">First Name</label> <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" placeholder="First Name"/> 
													</div> 
												</div> 
												<div class="col-sm-6 col-md-6"> 
													<div class="form-group"> 
														<label class="form-label">Last Name</label> <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" placeholder="Last Name"/> 
													</div> 
												</div> 
												<div class="col-md-12"> 
													<div class="form-group"> 
														<label class="form-label">Address</label> <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" placeholder="Home Address"/> 
													</div> 
												</div> 
												<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">City</label> <input type="text" class="form-control" name="city" value="<?php echo $city; ?>" placeholder="City"/> 
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
														<label class="form-label">Youtube</label> <input type="text" class="form-control" name="youtube" value="<?php echo $youtube; ?>" placeholder=" Youtube"/> 
													</div> 
												</div> 
												<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Twitter Handle</label> <input type="text" class="form-control" name="twitterhandle" value="<?php echo $twitterhandle; ?>" placeholder=" Twitter"/> 
													</div> 
												</div>
												<div class="col-sm-6 col-md-6"> 
													<div class="form-group"> 
														<label class="form-label">Cover Picture</label> 
														<input type="file" class="form-control" name="coverpic"></input> 
													</div> 
												</div> 
												<div class="col-md-12"> 
													<div class="form-group mb-0"> 
														<label class="form-label">About Me</label> <textarea rows="5" class="form-control" name="about-me" placeholder="Enter About your description"><?php echo $about_me; ?></textarea>
														 </div> 
														</div> 
													</div> 
												</div> 
												<div class="card-footer text-right"> 
													<button type="submit"  name="update-profile" class="btn btn-primary">Update Profile</button> 
												</div> 
											</form> 
										</div> 
										 </div> </div></div></div>
<?php require 'webcomponents/admin-footer.php'; ?>
	<?php require 'webcomponents/admin-js.php';?>
		</body>
	</html>
