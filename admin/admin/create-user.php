
<?php
require 'webcomponents/admin-header.php';
require 'webcomponents/admin-sidebar.php';

if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:./");
}elseif($_SESSION['account_type'] != "Admin" && $_SESSION['user_role'] != "Administrator"){ 
					header ("location:source/500.php");
					}
					?>
<?php

$msg ="";
$Fname= array();
$result= array();
if(isset($_POST['createuser-Submit'])){
  $destination = '../assets/images/users-pics/';
  $account_type = $db->escape_value($_POST['account_type']);
  $user_acctStatus = $db->escape_value($_POST['acctStatus']);
  $account_role= $db->escape_value($_POST['account_role']);
  $first_name = $db->escape_value(ucfirst($_POST['fname']));
  $last_name = $db->escape_value(ucfirst($_POST['lname']));
  $username= $db->escape_value($_POST['username']);
  $phone_no= $db->escape_value($_POST['phone_no']);
  $password = $db->escape_value($_POST['password']);
  $user_email = $db->escape_value($_POST['email']);
	$username = strtolower($username);
	$user_email = $database->escape_value(lcfirst($user_email));
    $raw_password = $database->escape_value($password);
    $password= password_hash($password, PASSWORD_BCRYPT);
    $time = date('Y-m-d H:i:s');
 if(!empty($first_name) && !empty($last_name) && !empty($user_email) && !empty($password)){
	$file =	uploadfile($destination,$_FILES['profpic'],(6327680),'');
			// print_r($file);
			$file = json_decode($file);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		$user_image = $database->escape_value($file[2][$i]);
		$file_type = $database->escape_value($file[3][$i]);
}}

		$sql  = "INSERT INTO users (username, password,raw_password, first_name, last_name, email,account_type, role, phone_no,";
		if(isset($user_image)){
		$sql .= "user_image,";} 
		$sql .= "user_acctStatus, date_created) VALUES ('$username','$password','$raw_password', '$first_name','$last_name','$user_email','$account_type','$account_role','$phone_no',";
		if(isset($user_image)){
		$sql .= "'$user_image',";} 
		$sql .="'$acctStatus','$time')";
		      $result= $database->query ($sql);
		      if(!$result){
						die("QUERY FAILED".mysqli_error());
					}
         $msg ='<h4 style="margin:0 10px 0 10px;" class="alert alert-success"><center>  New user created successfully <i class=" icon-holder fa fa-right" style="color:green;"></i></center></h4>';
                
      }else {
           $msg ='<h4 style="margin:0 10px 0 10px;" class="alert alert-danger"><center>Please fill out all entries..</center></h4>';
   }
 





}







		?>
		<div class="side-app"> 
			<div class="page-header"> 
						 			<h4 class="page-title">Users</h4>
						 			<ol class="breadcrumb"> 
						 				<li class="breadcrumb-item"><a href="#">Create User</a></li> 
						 				<li class="breadcrumb-item active" aria-current="page">Create</li> 
						 			</ol> 
						 		</div> 
				 	<div class="row"> 
				 		<div class="col-lg-12"> 
				 			<!-- <div class="card">  -->
				 				<div id="response"></div>
							<?php echo $msg; ?>
	 						<div class="card-body"> 
									<form class="card" method="post" action="" id="create-user" name="create-user" enctype="multipart/form-data"> 
										<div class="card-header"> 
											<h3 class="card-title">User Profile</h3> 
											<!-- <div class="card-options"> 
												<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div>  -->
											</div> 
											<div class="card-body"> 
												<div class="row"> 
													<div class="col-sm-6 col-md-4"> 
														<div class="form-group"> <label class="form-label">Account Type	<span class="required"> * </span>
												</label>
													<select class="form-control input-height" id="account_type" name="account_type">
															<option value="Subscriber">Select...</option>
														<option value="Subscriber">Subscriber</option>
														<option value="Admin">	Admin</option>
														<!-- <option value="other">other</option> -->
													</select> 
													</div> 
											</div>
											 <div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">User Role<span class="required"> * </span></label><select class="form-control input-height" id="account_role" name="account_role">
														<option value="Author">Select...</option>
													

													</select>  
													</div> 
												</div> 
											<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Account Status<span class="required"> * </span></label> 
															<select class="form-control input-height"  name="acctStatus">
														<option value="">Select ...</option>
															<?php 
															$acctStatus = array("Pending" => "Pending", "Active" => "Activate","Banned" =>"Ban");
															foreach($acctStatus as $key => $status){
															if($user_acctStatus !== $key){
														echo '<option value="'.$key.'">'.$status.'</option>';	}
													}
													?>
													</select> 
													</div> 
												</div> 
												
											<div class="col-sm-6 col-md-4"> 
												<div class="form-group"> 
													<label class="form-label">Username</label> <input type="text" class="form-control" name="username" id="username" placeholder="Username" /> 
												</div> 
											</div> 
											<div class="col-sm-6 col-md-4"> 
												<div class="form-group"> 
													 <label class="form-label">Email address</label> <input type="email" class="form-control" name="email" placeholder="Email" /> 
													</div> 
												</div>
												<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Phone No:</label> <input type="telephone" class="form-control" name="phone_no"  placeholder="Contact number"/> 
													</div> 
												</div>  
												<div class="col-sm-6 col-md-6"> 
													<div class="form-group"> 
														<label class="form-label">First Name</label> <input type="text" class="form-control" name="fname"  placeholder="First Name"/> 
													</div> 
												</div> 
												<div class="col-sm-6 col-md-6"> 
													<div class="form-group"> 
														<label class="form-label">Last Name</label> <input type="text" class="form-control" name="lname" placeholder="Last Name"/> 
													</div> 
												</div> 
												
												<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Password</label> <input type="password" id="password" class="form-control" name="password"  placeholder="password"/> 
													</div> 
												</div> 
												<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Confirm Password</label> <input type="password" id="password2" class="form-control" name="password2"  placeholder="password"/> 
													</div> 
												</div> 
												
												<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Profile Picture</label> 
														<input type="file" class="form-control" name="profpic" accept=".jpeg, .jpg, .png, .gif"></input> 
													</div> 
												</div> 
											</div> 
										</div> 
										<div class="card-footer text-center"> 
											<button type="submit"  name="createuser-Submit" class="btn btn-primary">Create User</button> 
										</div> 
									</form> 
								</div>
							</div> 
						</div> 
					</div> 
				</div> 
			</div> 
		</div>
	</div> 
<?php require 'webcomponents/admin-footer.php'; ?>
	<?php require 'webcomponents/admin-js.php';?>

</body>
</html>