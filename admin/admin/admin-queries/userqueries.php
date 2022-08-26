<?php
include '../../backend/database.php';
include '../../backend/timeAgo.php';
include '../../backend/functions.php';
session_start();
// use unicalCSphp\UploadFile;
ob_start();
if(isset($_POST['action'])) {
 $output ="";
		

if($_POST['action'] == 'delete-user'){
$user_id = $_POST['id'];
$query = "UPDATE users SET user_acctStatus = 'Deleted' WHERE id = '".$user_id."'";
$send= $database->query($query);	
		}


if($_POST['action'] == "update_last_activity"){
						$time = date('Y-m-d H:i:s');
				$sql="UPDATE sessions SET session_id = '".session_id()."', last_activity = '$time' WHERE sessions.user_id = '".$_SESSION['user_id']."' LIMIT 1 ";
				$statement=$db->query($sql);
					}	
			

		}
		
		
		if($_POST['action'] == "welcomeUser"){

			$sql = "SELECT last_activity FROM sessions WHERE user_id = '".$_SESSION['user_id']."' ORDER BY ID LIMIT 1 ";
			$qry = $database->query($sql);
			$row = $database->fetch_array($qry);
			foreach ($qry as $row ){
					$user_last_activity = $row['last_activity'];
				
			}
		    
				echo json_encode(array(
				$last_activity = timeAgo($user_last_activity),
					$username = "<strong>".getUsername($_SESSION['user_id'])."</strong>"));
		  
		}

?>