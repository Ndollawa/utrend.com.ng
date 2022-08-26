

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
	$_SESSION['message'] = '<strong class="text-danger">Sorry invalid request!!</strong>';
	// exit();
	header('location:./');
}
// '.$admin_name.'</br>

}else{
	$_SESSION['message'] = '<strong class="text-danger">Sorry invalid request!!</strong>';

	header('location:./source/404.php');
}
if(isset($_POST['passwd-reset'])){
$passw =  $database->escape_value($_POST['password']);
$passw2 =  $database->escape_value($_POST['confirmpassword']);

if(isset($passw) && isset($passw2)){
		if($passw == $passw2){
			$raw_password = $passw;
			 $password= password_hash($passw, PASSWORD_BCRYPT);
			$sql ="UPDATE users SET password = '".$password."' WHERE id = $user_id";
	
			$send = $db->query($sql);
			if($send){
			$mail ='<div class="container jumbotron" style="margin:10px 20px; padding: 5px 10px; display:block; justify-content:center; text-alignment:justify;"><strong><h4>Hi '.$first_name.' '.$last_name.',</h4></strong><br>
			<p> Your password reset has been  successful, kindly login into your account for your '.$website_link.'.<br> 
			Click the button below to Login.</p>
				<a href="'.$website_link.'/login.php" style="margin:10px 20px; padding: 5px 10px; background-color:#428bca; color:white;"><button class="btn btn-success">Login</button></a> <br>
				 <br>
		 <p>		If you did not request a password reset, please ignore this email. This password reset is only valid for the next 15 minutes.<br>
       Thanks, best regards.<br>
        
       <strong> Admin</strong>  @ <a href="'.$website_link.'">'.$website_link.'</a><br> Please do not reply to this mail address.</p></div>';
			
				if(!empty($from_mail) && !empty($to_mail) && !empty($mail)){
	
	$from_mail = "no-reply@utrend.com.ng";
// $to_mail = $email;
	$html = <<<EOT
 $mail

EOT;
$plainText = <<<EOT

 $mail
EOT;



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    // $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'user@example.com';                     //SMTP username
    // $mail->Password   = 'secret';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($from_mail, "@".$website_name);
    $mail->addAddress($to_mail , $last_name.", ".$first_name);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'PASSWORD RESET CONFIRMATION @utrend.com.ng';
    $mail->Body    = $html;
    $mail->AltBody = $plainText;

    $mail->send();
    $_SESSION['message'] = '<strong class="text text-success">Message has been sent</strong>';
} catch (Exception $e) {
    $_SESSION['message'] = '<strong class="text text-danger">Message could not be sent. Mailer Error: {$mail->ErrorInfo}</strong>';
}
}
				$_SESSION['message'] = '<h5 style="margin:10px  10px; padding:5px;" class="text-success"><center>  Password updated successfully <i class=" icon-holder fa fa-check f-left" style="color:white;"></i></center></h5>';
				
				header('Location:login.php');
			}
			}else{
				$_SESSION['message'] = '<strong class="text text-danger">Passwords do not match!!</strong>';
			}				
	
}
}

if(isset($_POST['action'])){
if($_POST['action']=== 'deletePasswordResetToken'){
    $sql  = "SELECT * FROM password_reset ";
      $result= $database->query ($sql);
$row = $database->fetch_array($result);
			if($row>0){
				foreach ($result as $row) {
			$_SESSION['user_id']= $user_id = $row['user_id'];
			$token = $row['token'];
			$date_requested = $row['date_requested'];
			$resetid = $row['id'];
$dbtimestamp = strtotime($date_requested);
if (time() - $dbtimestamp > 15 * 60) {
     $sql2  = "DELETE FROM password_reset WHERE id = $resetid ";
      $result2= $database->query ($sql2);
      
            }
        }
			 
	}

}
}
?>
