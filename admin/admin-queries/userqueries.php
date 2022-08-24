<?php
include '../../backend/database.php';
include '../../backend/timeAgo.php';
session_start();
// use unicalCSphp\UploadFile;
ob_start();
if(isset($_POST['action'])) {
 $output ="";
			if($_POST['action'] == 'create-post'){
			// parse_str($_POST["files"],$_POST);   
			$postName = $database->escape_value($_POST['postname']);
			$query = "INSERT INTO postegories (post_title) VALUES ('$postName')";
			$send = $database->query($query);
}


if($_POST['action'] == 'update-post'){
			// parse_str($_POST["files"],$_POST); 
			$post_id = $_POST['post_id'];  
			$postName = $database->escape_value($_POST['postname']);
			$query = "UPDATE postegories SET post_title = '$postName' WHERE id = '".$post_id."'";
			$send = $database->query($query);
}



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

?>