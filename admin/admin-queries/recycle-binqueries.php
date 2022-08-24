<?php
include '../../backend/database.php';
include '../../backend/timeAgo.php';
session_start();
// use unicalCSphp\UploadFile;
if(isset($_POST['action'])) {
 $output ="";
if($_POST['action'] == 'restore-post'){
$post_id = $_POST['id'];
$query = "UPDATE posts SET post_status = 'Draft' WHERE id = '".$post_id."'";
$send= $database->query($query);
		
		}

if($_POST['action'] == 'restore-cat'){
$cat_id = $_POST['id'];
$query = "UPDATE categories SET category_status = 'Active' WHERE id = '".$cat_id."'";
$send= $database->query($query);	
		}
if($_POST['action'] == 'restore-user'){
$user_id = $_POST['id'];
$query = "UPDATE users SET user_acctStatus = 'Active' WHERE id = '".$user_id."'";
$send= $database->query($query);

		}
	
if($_POST['action'] == 'delete-post-p'){
$post_id = $_POST['id'];
$query = "DELETE FROM posts  WHERE id = '".$post_id."'";
$send= $database->query($query);  
    }


   
if($_POST['action'] == 'delete-user-p'){
$user_id = $_POST['id'];
$query = "DELETE FROM users  WHERE id = '".$user_id."'";
$send= $database->query($query);	
		}
	
// if($_POST['action'] == 'restore-user'){
// $user_id = $_POST['user_id'];
// $query = "UPDATE users SET user_acctStatus = 'Active' WHERE id = '".$user_id."'";
// $send= $database->query($query);
// 	header('Location:users-recyclebin.php');	
// 		}
 }


?>

										


								



