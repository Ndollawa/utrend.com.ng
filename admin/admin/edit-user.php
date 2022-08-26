
<?php require 'webcomponents/admin-header.php'; ?>
<?php require 'webcomponents/admin-sidebar.php'; ?>
<?php
if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:index.php");
  exit();
}elseif($_SESSION['account_type'] != "Admin" && $_SESSION['user_role'] != "Administrator"){ 
					header ("location:source/500.php");
					exit();}
					?>
<?php
$msg = "";
if(isset($_GET['user_id'])){
	$user_id = $database->escape_value($_GET['user_id']);
	$sql = "SELECT * FROM users WHERE id = '".$user_id."' ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
$user_id = $row['id'];
	$user_username = $row['username'];
	$fname=  $row['first_name'];
	$lname =  $row['last_name'];
	$about_me =  $row['about_me'];
	$user_email =  $row['email'];
	$user_role =  $row['role'];
	$account_type =  $row['account_type'];
	$phone_no =  $row['phone_no'];
	$user_bio =  $row['user_bio'];
	$address = $row['address'];
	$city =  $row['city'];
	$zip_code =  $row['zip_code'];
	$country = $row['country'];
	$company = $row['company'];
	$user_acctStatus =  $row['user_acctStatus'];
	$user_image = $row['user_image'];
	$coverpic = $row['cover_pic'];
	$facebooklink = $row['facebooklink'];
	$twitterhandle = $row['twitterhandle'];
	$externallink =  $row['externallink'];
	$instagrampage = $row['instagrampage'];
	$youtube = $row['youtube'];
	$user_name = $fname." ".$lname;

}
}


if(isset($_POST['edituser-Submit'])){

  require_once '../src/unicalCSphp/UploadFile.php';
  $destination = '../assets/images/users-pics/';
  $account_type = $db->escape_value($_POST['account_type']);
  $acctStatus = $db->escape_value($_POST['acctStatus']);
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
    $time = date('Y-m-d H:i:s');
 if(!empty($first_name) && !empty($last_name) && !empty($user_email) ){
// $max = 1000*1024;
  if (!empty($password) ) { $password= password_hash($password, PASSWORD_BCRYPT);}

		
		
		if(isset($_FILES['profpic']) && !empty($_FILES['profpic']) &&!is_null($_FILES['profpic']))
	{
	$file =	uploadfile($destination,$_FILES['profpic'],(6327680),'');
			// print_r($file);
			$file = json_decode($file);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		$profpic = $database->escape_value($file[2][$i]);
		$file_type = $database->escape_value($file[3][$i]);
}}
	deleteFile($user_image,"../assets/images/user-pics/");
	}
       

		$sql  = "UPDATE users SET username ='$username',";
		if(isset($password) && !empty($password)){
			$sql .=" password ='$password',";
		}
		$sql .=" first_name ='$first_name', last_name ='$last_name', email ='$user_email', account_type ='$account_type',  role = '$account_role', phone_no ='$phone_no',";
		if(isset($profpic)&& !empty($profpic)){
		$sql .= "user_image = '$profpic',";} 
		$sql .= "user_acctStatus = '$acctStatus' WHERE id = '".$user_id."' ";
	
		      $result= $database->query ($sql);
		      if(!$result){
						die("QUERY FAILED".mysqli_error());
					}
      //               $sql = "INSERT INTO students (USER_ID,ROLL_NO,FIRST_NAME, MIDDLE_NAME, LAST_NAME,DOB,GENDER,ADDRESS,TELEPHONE,EMAIL,MATRIC_NUMBER,REG_NO,PARENT_GUARDIAN_NAME,PARENT_GUARDIAN_PHONE_NO,STUDENT_LEVEL,ENROLLMENT_DATE, PROGRAMME,ACADEMIC_SESSION,CREATED_TIME, USER_IMAGE)  
      //                VALUES ((SELECT ID FROM users WHERE USERNAME = '{$username}'),'$rollNo','$firstname', '$middlename', '$lastname', '$dob', '$gender', '$address', '$number', '$email', '$matricNo',  '$regNo', '$parentName', '$parentNumber', '$level','$enrollment','$programme','$academic_session','$post_time', '$user_image')";
      //          $result= $db->query ($sql);

      // $notification_sql ="SELECT ID FROM users WHERE USERNAME = '{$username}'";
      // $result=$database->query($notification_sql);
      // $row=$database->fetch_array($result);
      // foreach ($result as $row) {
      //   $user_id = $row['ID'];
      //   $notification = '<li>
      //                 <a href="javascript:;">
      //                   <span class="time">'.calculate_time_span($date).'</span>
      //                   <span class="details">
      //                     <span class="notification-icon circle deepPink-alert alertcolor"><i
      //                         class="fa fa-check"></i></span>
      //                     <b>'.getUsername($user_id).'</b> Congratulations!. Feel free to setup your account details.  </span>
      //                 </a>
      //               </li>
      //             ';
      //         $sql = "INSERT INTO notifications (RECEIVER_ID, NOTIFICATION, NOTIME) VALUES ('".$row['ID']."','".$notification."','".$date."')";
      //         $send = $database->query($sql);

      //       }     
                    $msg ='<h4 style="margin:0 10px 0 10px;" class="alert alert-success"><center>  User Updated successfully <i class=" icon-holder fa fa-right" style="color:green;"></i></center></h4>';
                
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
							<?php echo $msg; ?>
							<div id="response"></div>
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
															<option value="<?php echo $account_type; ?>"><?php echo $account_type; ?></option>
															<?php if($account_type == "Subscriber"){
													echo '<option value="Admin">	Admin</option>';}else{
														echo	'<option value="Subscriber">Subscriber</option>';}?>
														<!-- <option value="other">other</option> -->
													</select> 
													</div> 
											</div>
											 <div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">User Role<span class="required"> * </span></label><select class="form-control input-height" id="account_role" name="account_role">
														<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
															<?php if($user_role == "Author"){
													echo	'<option value="Administrator">Administrator</option>
														<option value="Moderator">	Moderator</option><option value="Editor">	Editor</option>';}elseif($user_role == "Administrator"){
															echo '<option value="Author">Author</option>
															<option value="Moderator">	Moderator</option><option value="Editor">	Editor</option>';
														}elseif($user_role == "Moderator"){
													echo '<option value="Author">Author</option>
													<option value="Administrator">	Administrator</option><option value="Editor">Editor</option>';
														}elseif($user_role == "Editor"){
													echo '<option value="Author">Author</option>
													<option value="Administrator">	Administrator</option><option value="Moderator">	Moderator</option>';
														}
														?>
													</select>  
													</div> 
												</div> 
											<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Account Status<span class="required"> * </span></label> 
														<select class="form-control input-height"  name="acctStatus">
														<option value="<?php echo $user_acctStatus; ?>"><?php echo $user_acctStatus; ?></option>
															<?php 
															$acctStatus = array("Pending" => "Pending", "Active" => "Activate","Banned" =>"Ban");
															foreach($acctStatus as $key => $status){
															if($user_acctStatus !== $key){
														echo '<option value="'.$key.'">'.$status.'</option>';	}
													}
													?>
														<!-- <option value="other">other</option> -->
													</select> 
													</div> 
												</div> 
												
											<div class="col-sm-6 col-md-4"> 
												<div class="form-group"> 
													<label class="form-label">Username</label> <input type="text" class="form-control" name="username" id="username" placeholder="Username"  value="<?php echo $user_username; ?>" /> 
												</div> 
											</div> 
											<div class="col-sm-6 col-md-4"> 
												<div class="form-group"> 
													 <label class="form-label">Email address</label> <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $user_email; ?>"/> 
													</div> 
												</div>
												<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Phone No:</label> <input type="telephone" class="form-control" name="phone_no"  placeholder="Contact number" value="<?php echo $phone_no; ?>"/> 
													</div> 
												</div>  
												<div class="col-sm-6 col-md-6"> 
													<div class="form-group"> 
														<label class="form-label">First Name</label> <input type="text" class="form-control" name="fname"  placeholder="First Name" value="<?php echo $fname; ?>"/> 
													</div> 
												</div> 
												<div class="col-sm-6 col-md-6"> 
													<div class="form-group"> 
														<label class="form-label">Last Name</label> <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>"/> 
													</div> 
												</div> 
												
												<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Password</label> <input type="password" id="password" class="form-control" name="password"  placeholder="password" /> 
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
														<input type="file" class="form-control" name="profpic"></input> 
													</div> 
												</div> 
											</div> 
										</div> 
										<div class="card-footer text-center"> 
											<button type="submit"  name="edituser-Submit" class="btn btn-primary">Update User</button> 
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