<?php
include '../../backend/database.php';
include '../../backend/timeAgo.php';
session_start();
ob_start();
// use unicalCSphp\UploadFile;
if(isset($_POST['action'])) {
 $output ="";
 if($_POST['action'] == 'delete-comment'){
$comment_id = $_POST['comment_id'];
$query = "UPDATE comments SET comment_status = 'Deleted' WHERE id = '".$comment_id."'";
$send= $database->query($query);
	if($send){redirect_to('Location:../dashboard/comments.php');	
		}}

 if($_POST['action'] == 'approve-comment'){
$comment_id = $_POST['comment_id'];
$query = "UPDATE comments SET comment_status = 'Approved' WHERE id = '".$comment_id."'";
$send= $database->query($query);
	if($send){redirect_to('Location:../dashboard/comments.php');	
		}}

 if($_POST['action'] == 'unapprove-comment'){
$comment_id = $_POST['comment_id'];
$query = "UPDATE comments SET comment_status = 'Unapproved' WHERE id = '".$comment_id."'";
$send= $database->query($query);
	if($send){redirect_to('Location:../dashboard/comments.php');	
		}}

		}












?>