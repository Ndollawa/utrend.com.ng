<?php
include '../backend/database.php';
include '../backend/timeAgo.php';
session_start();
// use unicalCSphp\UploadFile;
ob_start();
if(isset($_POST['action'])) {
			if($_POST['action'] == 'visitor'){
						$uip = $_SESSION['uip'];
						$query = "SELECT * FROM visitors WHERE user_ip = '".$uip."'";
						$sendquery = $database->query($query);
						$row = $database->num_rows($sendquery);
						$uos = $_SESSION['uos'];
						$date = date('Y-m-d H:i:s');
							if($row == 0){
			$sql="INSERT INTO visitors (user_ip,user_os,page_visited,date_visited) VALUES('$uip','$uos','".$_SESSION['page_visited']."','$date')";
						$insert= $database->query($sql);
						

					} 
				}

}


?>