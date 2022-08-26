
<?php include '../backend/database.php'; ?>
<?php include '../backend/timeAgo.php'; ?>
<?php include '../backend/functions.php'; ?>
<?php
ob_start();
session_start();
$message = "";
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
 require '../assets/plugins/PHPMailer/src/Exception.php';
require '../assets/plugins/PHPMailer/src/PHPMailer.php';
// require '../assets/plugins/PHPMailer/src/SMTP.php';        
// require_once '../assets/plugins/swiftmailer-master/lib/swift_required.php';
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

?>


<?php 
$sql = "SELECT * FROM general WHERE id = 1 ";
$send = $database->query($sql);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
$user_id = $row['id'];
    $website_name = $row['website_name'];
    $website_link = $row['website_link'];
    $site_description = $row['site_description'];
     $fixedMenu=  $row['fixedMenu'];
    $fixedSidebar =  $row['fixedSidebar'];
    $slideRTL=  $row['slideRTL'];
    $favicon=  $row['favicon'];
    $brand_name_logo =  $row['brand_name_logo'];
    // $about_us =  $row['about_us'];
    $address = $row['address'];
    $city =  $row['city'];
    $zip_code =  $row['zip_code'];
    $country = $row['country'];
    $sfacebooklink = $row['facebooklink'];
    $stwitterhandle = $row['twitterhandle'];
    $sinstagrampage = $row['instagrampage'];
    $syoutube = $row['youtube'];

}



$_SESSION['message'] = "";
if(isset($_POST['passwd-resetbtn'])){
	$email = $database->escape_value($_POST['email']);
        $sql  = "SELECT * FROM users ";
    $sql .= "WHERE email ='{$email}' ";
    // $sql .= "AND PASSWORD = '{$pssword}' ";
    $sql .= "LIMIT 1";
      $result= $database->query ($sql);
      $row = $database->fetch_array($result);
      if($row>0){
      foreach ($result as $row) {
      $user_id = $row['id'];
      $username = $row['username'];
      $user_password = $row['password'];
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $user_email = $row['email'];
      $user_acctStatus = $row['user_acctStatus'];
      $user_phone_no = $row['phone_no'];
      $user_account_type = $row['account_type'];
    }

     // $token = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
$date_requested = date('Y-m-d H:i:s');
$sql = "INSERT INTO password_reset
              (user_id, token, date_requested)
              VALUES
              ('$user_id', '$token', '$date_requested')";
$send = $database->query($sql);

 $passwordRequestId = $database->insert_id();
//Create a link to the URL that will verify the
//forgot password request and allow the user to change their
//password.
$verifyScript = $website_link.'/source/passwd-reset.php';
$from_mail = "no-reply@utrend.com.ng";
$to_mail = $email;
//The link that we will send the user via email.
 $linkToSend = $verifyScript . '?pwdrst&uid=' . $user_id . '&id=' . $passwordRequestId . '&t=' . $token;
$mail ='<div class="container jumbotron" style="margin:10px 20px; padding: 5px 10px; display:block; justify-content:center; text-alignment:justify;"><strong><h4>Hi '.$first_name.' '.$last_name.',</h4></strong>
<br> 
<p>Your request to reset your password  has been  received, kindly ignore this mail if you did not make this request. </br>Click the button below to Change Password.</p>
        <a href="'.$linkToSend.'"><button class="btn btn-success" style="margin:10px 20px; padding: 5px 10px; background-color:#428bca; color:white;">Reset Password</button></a> <br>
        <br>
		 <p>		If you did not request a password reset, please ignore this email. This password reset is only valid for the next 15 minutes.</br>
       Thanks, best regards.<br>
        
       <strong> Admin</strong> @ <a href="'.$website_link.'">'.$website_link.'</a><br> Please do not reply to this mail address.</p></div>';
if(!empty($from_mail) && !empty($to_mail) && !empty($mail)){

$smtp_server = "";
$username = "";
$password = "";
 

$from  =array($from_mail => "Utrend.com.ng") ;
$recipients = array($to_mail => $last_name.", ".$first_name) ;

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
    $mail->Subject = 'PASSWORD RESET REQUEST @utrend.com.ng';
    $mail->Body    = $html;
    $mail->AltBody = $plainText;

    $mail->send();
    $message =$_SESSION['message'] = "<strong class='text-success' Message has been sent</strong>";
} catch (Exception $e) {
    $message =$_SESSION['message'] = "<strong class='text-danger' Message could not be sent. Mailer Error: {$mail->ErrorInfo}</strong>";
}

}
      }else{ $message =$_SESSION['message'] = "<strong class='text-danger' >Sorry this email address doesn't exist!!!</strong>"; }
  }

?>



<!doctype html><!-- saved from url=(0014)about:internet -->
<html lang="en" dir="ltr"><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="msapplication-TileColor" content="#2d89ef">
<meta name="theme-color" content="#4188c9">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<link rel="icon" href="../assets/images/<?php echo $favicon; ?>" type="image/x-icon"/>
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" /> 
<!-- Title --> 
<title><?php echo $website_name; ?></title>
<link rel="stylesheet" href="../admin/assets/fonts/fonts/font-awesome.min.css"> 
<!-- Font Family--> 
<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin-ext,vietnamese" rel="stylesheet"> 
<!-- Bootstrap Css --> 
<link href="../admin/assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet" /> 
<!-- Sidemenu Css --> 
<link href="../admin/assets/plugins/fullside-menu/css/style.css" rel="stylesheet" />
<link href="../admin/assets/plugins/fullside-menu/waves.min.css" rel="stylesheet" /> 
<!-- Dashboard css --> 
<link href="../admin/assets/css/dashboard.php" rel="stylesheet" /> 
<!-- c3.js Charts Plugin --> 
<link href="../admin/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" /> 
<!---Font icons--> 
<link href="../admin/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KWXHVN7');</script>
<!-- End Google Tag Manager -->
<script type="text/javascript"><!--
umn7=document.all;m9xj=umn7&&!document.getElementById;w3x3=umn7&&document.getElementById;ai2m=!umn7&&document.getElementById;viwc=document.layers;function kka8(h8a4){try{if(m9xj)alert("");}catch(e){}if(h8a4&&h8a4.stopPropagation)h8a4.stopPropagation();return false;}function ejie(){if(event.button==2||event.button==3)kka8();}function xzbs(e){return(e.which==3)?kka8():true;}function xvbs(s5fs){for(sk2h=0;sk2h<s5fs.images.length;sk2h++){s5fs.images[sk2h].onmousedown=xzbs;}for(sk2h=0;sk2h<s5fs.layers.length;sk2h++){xvbs(s5fs.layers[sk2h].document);}}function lvyr(){if(m9xj){for(sk2h=0;sk2h<document.images.length;sk2h++){document.images[sk2h].onmousedown=ejie;}}else if(viwc){xvbs(document);}}function m6kn(e){if((w3x3&&event&&event.srcElement&&event.srcElement.tagName=="IMG")||(ai2m&&e&&e.target&&e.target.tagName=="IMG")){return kka8();}}if(w3x3||ai2m){document.oncontextmenu=m6kn;}else if(m9xj||viwc){window.onload=lvyr;}function udhf(e){agph=e&&e.srcElement&&e.srcElement!=null?e.srcElement.tagName:"";if(agph!="INPUT"&&agph!="TEXTAREA"&&agph!="BUTTON"){return false;}}function g44w(){return false}if(umn7){document.onselectstart=udhf;document.ondragstart=g44w;}if(document.addEventListener){document.addEventListener('copy',function(e){agph=e.target.tagName;if(agph!="INPUT"&&agph!="TEXTAREA"){e.preventDefault();}},false);document.addEventListener('dragstart',function(e){e.preventDefault();},false);}function s8p0(evt){if(evt.preventDefault){evt.preventDefault();}else{evt.keyCode=37;evt.returnValue=false;}}var yciq=1;var k5f5=2;var f7n8=4;var sydq=new Array();sydq.push(new Array(k5f5,65));sydq.push(new Array(k5f5,67));sydq.push(new Array(k5f5,80));sydq.push(new Array(k5f5,83));sydq.push(new Array(k5f5,85));sydq.push(new Array(yciq|k5f5,73));sydq.push(new Array(yciq|k5f5,74));sydq.push(new Array(yciq,121));sydq.push(new Array(0,123));function zmkq(evt){evt=(evt)?evt:((event)?event:null);if(evt){var o2fg=evt.keyCode;if(!o2fg&&evt.charCode){o2fg=String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);}for(var bgx0=0;bgx0<sydq.length;bgx0++){if((evt.shiftKey==((sydq[bgx0][0]&yciq)==yciq))&&((evt.ctrlKey|evt.metaKey)==((sydq[bgx0][0]&k5f5)==k5f5))&&(evt.altKey==((sydq[bgx0][0]&f7n8)==f7n8))&&(o2fg==sydq[bgx0][1]||sydq[bgx0][1]==0)){s8p0(evt);break;}}}}if(document.addEventListener){document.addEventListener("keydown",zmkq,true);document.addEventListener("keypress",zmkq,true);}else if(document.attachEvent){document.attachEvent("onkeydown",zmkq);}
--></script> 
<meta http-equiv="imagetoolbar" content="no" />
<style type="text/css"><!-- input,textarea{-webkit-touch-callout:default;-webkit-user-select:auto;-khtml-user-select:auto;-moz-user-select:text;-ms-user-select:text;user-select:text} *{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:-moz-none;-ms-user-select:none;user-select:none} --></style><style type="text/css" media="print"><!-- body{display:none} --></style> <!--[if gte IE 5]><frame></frame><![endif]--></head>
	<body>
	 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KWXHVN7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->   
	<div class="overlay"></div> 
	<div class="background login-img"></div>
	<div class="masthead"> 
	    <div class="masthead-bg"></div> 
	    <div class="container h-100"> 
	        <div class="row h-100">
	             <div class="col-12 my-auto"> 
	                <div class="masthead-content text-white py-5 py-md-0"> 
		<form  method="post" id="password-reset" name="passwd-reset">  <div class="card"> <div class="card-body"> 
		    <div class="text-center mb-3"> <img src="../assets/images/<?php echo $brand_name_logo; ?>" style="width:150px;border:3px solid #d95300 ; border-radius: 10px; " class="img-circle" alt=""> </div>
		    <div class="text-center card-title text-dark"><strong>Forgot password</strong></div> <?php echo $message; ?><?php if(isset($_SESSION['message'])){
									echo $_SESSION['message'];
									$_SESSION['message']= "";
								}else{
									$_SESSION['message'] = "";
								} ?>
		        <div class="form-group"> 
		        <label class="form-label text-dark" for="exampleInputEmail1">Email address</label>
		        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email"> 
		        </div> 
		        <div class="form-footer">
		             <button type="submit" class="btn btn-success btn-block " name="passwd-resetbtn">Send</button> 
		             </div> 
		             <div class="text-center text-dark mt-3 "> Forget it, <a href="./login.php">send me back</a> to the sign in. </div> 
		             </div> 
		            </div> 
		        </form>
		 </div> </div> </div> </div> </div> <!-- Dashboard js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="../cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="../admin/assets/js/vendors/jquery-3.2.1.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/bootstrap-4.1.3/popper.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery.sparkline.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/selectize.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/jquery.tablesorter.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/vendors/circle-progress.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/rating/jquery.rating-stars.js"></script><script type="text/javascript"><!--
wmlz("/Fb1N\" eS2CgIea\"jaEyaDID< <C!b");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script><script type="text/javascript"><!--
wmlz("/Fb1N\"/eCFvssauihPjye2e.sp");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/fullside-menu/jquery.slimscroll.min.js"></script><script type="text/javascript"><!--
wmlz("/");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/plugins/fullside-menu/waves.min.js"></script><script type="text/javascript"><!--
wmlz("/Fb1N\" eS2CgIb.boJN");
--></script><noscript><p>To display this page you need a browser that supports JavaScript.</p></noscript><script src="../admin/assets/js/custom.js"></script>

</body></html>