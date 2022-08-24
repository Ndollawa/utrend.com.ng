<!-- <?php //include '../backend/database.php'; ?>
<?php //include '../backend/timeAgo.php'; ?>
<?php //include '../backend/functions.php'; ?> -->



<?php
if(isset($_GET['pwdrst'])){

	//The user's id, which should be present in the GET variable "uid"
$user_id = isset($_GET['uid']) ? trim($_GET['uid']) : '';
//The token for the request, which should be present in the GET variable "t"
$token = isset($_GET['t']) ? trim($_GET['t']) : '';
//The id for the request, which should be present in the GET variable "id"
$passwordRequestId = isset($_GET['id']) ? trim($_GET['id']) : '';

$sql  = "SELECT * FROM password_reset  WHERE    user_id = '$user_id' AND token = '$token' AND id = '$passwordRequestId' LIMIT 1";
      $result= $database->query ($sql);

			$row = $database->fetch_array($result);
			if($row>0){
				foreach ($result as $row) {
			$_SESSION['user_id']= $user_id = $row['user_id'];
			$token = $row['token'];
			$date_requested = $row['date_requested'];
			$resetid = $row['id'];

			$sql  = "SELECT * FROM users WHERE id ='{$user_id}' LIMIT 1";
      $result= $database->query ($sql);

			$row = $database->fetch_array($result);
			
				foreach ($result as $row) {
			$user_id = $row['id'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$to_mail = $row['email'];
			$user_name = $first_name.' '.$last_name;

			}
}}else{
	$_SESSION['message'] = '<strong class="alert alert-danger">Sorry invalid request!!</strong>';
	// exit();
	header('location:../index.php');
}
// '.$admin_name.'</br>

}else{
	$_SESSION['message'] = '<strong class="alert alert-danger">Sorry invalid request!!</strong>';
	// exit();
	header('location:../page-403.php');
}
if(isset($_POST['passwd-reset'])){
$passw =  $database->escape_value($_POST['password']);
$passw2 =  $database->escape_value($_POST['confirmpassword']);

if(isset($passw) && isset($passw2)){
		if($passw == $passw2){
			$raw_password = $passw;
			 $password= password_hash($passw, PASSWORD_BCRYPT);
			$sql ="UPDATE users SET password = '".$password."' WHERE id = '".$_SESSION['user_id']."'";
	
			$send = $db->query($send);
			if($send){
			$mail ='<strong><h4>Hi "'.$first_name.' '.$last_name.'",</h4></strong></br><p> Your password reset has been  successful, kindly login into your account for your '.$website_link.'.</br> Click the button below to Login.</p>
				<a href="'.$website_link.'/admin/login.php"><button class="btn btn-success">Login</button></a> </br>
				</br>
				<p>Thanks,</br>
			
				Admin @ '.$website_link.'</br> Please do not reply to this mail address.</p>';
				$sent = mail($email, "Password Reset Request", $mail,"From: noreply@'".$website_link."'");
				if(!empty($from_mail) && !empty($to_mail) && !empty($mail)){
					include 'email-queries.php';}
				$_SESSION['message'] = '<h4 style="margin:10px  10px; padding:5px;" class="alert alert-success"><center>  profile record updated successfully <i class=" icon-holder fa fa-check f-left" style="color:white;"></i></center></h4>';
				
				header('Location:login.php');
			}
			}else{
				$_SESSION['message'] = '<strong class="alert alert-danger">Passwords do not match!!</strong>';
			}				
	
}
}

?>
