<?php
include '../../backend/database.php';


if(isset($_POST['action'])) {
 $output ="";
 if($_POST['action'] == 'delete-comment'){
$comment_id = $_POST['id'];
$query = "UPDATE comments SET comment_status = 'Deleted' WHERE id = '".$comment_id."'";
$send= $database->query($query);
	}

 if($_POST['action'] == 'approve-comment'){
$comment_id = $_POST['comment_id'];
$query = "UPDATE comments SET comment_status = 'Approved' WHERE id = '".$comment_id."'";
$send= $database->query($query);
	}

 if($_POST['action'] == 'unapprove-comment'){
$comment_id = $_POST['comment_id'];
$query = "UPDATE comments SET comment_status = 'Unapproved' WHERE id = '".$comment_id."'";
$send= $database->query($query);
}

		}












?>