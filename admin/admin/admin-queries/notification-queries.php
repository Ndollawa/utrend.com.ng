<?php

include '../../backend/database.php';
include '../../backend/timeAgo.php';
include'../../backend/functions.php';
session_start();
ob_start();

if(isset($_POST['action'])){
if ($_POST['action'] == 'getNotificationsCount') {
			$notificationCount = notificationCount($_SESSION['user_id']);
			echo $notificationCount;

			}
			
if($_POST['action'] == 'Notifications'){
				$receiver_id = $_SESSION['user_id'];
				$sql = " SELECT * FROM notifications WHERE user_id ='".$receiver_id."' ORDER BY id DESC ";
				$send = $database->query($sql);
				$result = $database->fetch_array($send);
				$rowCount = $database->num_rows($send);
				if($rowCount > 0){
					
					foreach ($send as $result) {
						$time = $result["notification_time"];
						// if($result['notification_status'] != "read"){<li style="background:#fff55;">
						//<a href="javascript:;"> <span class="time">'.$date = getTimeDifference($time).'</span>
						$output ='
					 '.$result["notification"].'<div class="small text-muted"> '.calculate_time_span($time).'</div> </div> </a> ' ;
					 //}else{
						// 	$output ='<li>
						// <a href="javascript:;"> <span class="time">'.$date = getTimeDifference($time).'</span>
					 // '.$result["NOTIFICATION"].' ' ;}
						
						echo $output;
					}
				}
			} 
if($_POST['action'] == 'clear_not'){
				$reciever_id = $_SESSION['user_id'];
				$sql = " UPDATE notifications SET notification_status = 'read' WHERE user_id ='".$reciever_id."' ORDER BY id DESC ";
				$send = $database->query($sql);
				
			} 
    
}
?>