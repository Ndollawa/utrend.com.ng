<?php
include '../../backend/database.php';
include '../../backend/timeAgo.php';
include '../../backend/functions.php';
session_start();
// use unicalCSphp\UploadFile;
ob_start();
if(isset($_POST['action'])) {
 $output ="";


if($_POST['action'] == 'delete-post'){
$post_id = $_POST['id'];
$query = "UPDATE posts SET post_status = 'Deleted' WHERE id = '".$post_id."'";
$send= $database->query($query);
		}

		}

?>


                                
                            