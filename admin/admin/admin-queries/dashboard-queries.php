<?php
// include '../../backend/database.php';
include '../backend/timeAgo.php';
// session_start();
// // use unicalCSphp\UploadFile;
// ob_start();
$sql ="SELECT COUNT(id) as total FROM posts WHERE post_status ='Published'  ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$publishedpost_count = $row['total'];
 }

 $sql ="SELECT COUNT(id) as total FROM posts ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$post_count = $row['total'];
 }

// $sql ="SELECT id, post_time FROM posts WHERE post_status ='Published'";
//  $result =$database->query($sql);
//  $row=$database->fetch_array($result);
//  foreach ($result as $row) {
//  	$id = $row['id'];
//  	$post_time = $row['post_time'];
//  	if ($post_time <= date('Y-m-d H:i:s',strtotime('-1 week'))) {
//  		# code...
//  	}
//  }

$sql ="SELECT * FROM posts WHERE post_status ='Published' AND YEAR(post_time)=YEAR(CURRENT_DATE ) AND MONTH(post_time) = MONTH(CURRENT_DATE) ";
 $result= $db->query ($sql);
$monthlypublishedpost  = $database->num_rows($result);
$sql="SELECT * FROM posts WHERE post_status ='Published' AND post_time BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
$previousmonthPost = $database->num_rows($result);
if($previousmonthPost>0){
$PPperInc = ceil((($monthlypublishedpost - $previousmonthPost)/$previousmonthPost)*100);
}else{
	$PPperInc =0;
}

 $sql ="SELECT * FROM posts WHERE post_status ='Draft' ";
 $result =$database->query($sql);
 	$draftpost_count = $database->num_rows($result);
 

$sql ="SELECT * FROM posts WHERE post_status ='Draft' AND YEAR(post_time)=YEAR(CURRENT_DATE ) AND MONTH(post_time) = MONTH(CURRENT_DATE)";
 $result= $db->query ($sql);
$monthlydraftpost  = $database->num_rows($result);
$sql="SELECT * FROM posts WHERE post_status ='Draft' AND post_time BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
$previousmonthDPost = $database->num_rows($result);
if($previousmonthDPost>0){
$DPperInc= ceil((($monthlydraftpost-$previousmonthDPost)/$previousmonthDPost)*100);
}else{
	$DPperInc= 0;
}

$sql ="SELECT * FROM posts WHERE YEAR(post_time)=YEAR(CURRENT_DATE ) AND MONTH(post_time) = MONTH(CURRENT_DATE)";
 $result= $db->query ($sql);
$monthlypost  = $database->num_rows($result);
$sql="SELECT * FROM posts WHERE  post_time BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
$previousmonthPost = $database->num_rows($result);
if($previousmonthPost>0){
 $TPperInc= ceil((($monthlypost-$previousmonthPost)/$previousmonthPost)*100);
}else{
$TPperInc=0;	
}

 $sql ="SELECT COUNT(id) as total FROM posts WHERE  post_status != 'Deleted' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$totalpost_count = $row['total'];
 }


$sql ="SELECT COUNT(id) as total FROM categories WHERE category_status = 'Active' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$cat_count = $row['total'];
 }

 $sql ="SELECT COUNT(id) as total FROM comments WHERE comment_status = 'Pending' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$pendingcomment_count = $row['total'];
 }

$sql ="SELECT * FROM comments WHERE comment_status ='Pending' AND YEAR(comment_time)=YEAR(CURRENT_DATE ) AND MONTH(comment_time) = MONTH(CURRENT_DATE)";
 $result= $db->query ($sql);
$monthlydraftcomment  = $database->num_rows($result);
$sql="SELECT * FROM comments WHERE comment_status ='Pending' AND comment_time BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
$previousmonthDcomment = $database->num_rows($result);
if($previousmonthDcomment>0){
$PCperInc= ceil((($monthlydraftcomment-$previousmonthDcomment)/$previousmonthDcomment)*100);
}else{
$PCperInc=0;	
}

 $sql ="SELECT COUNT(id) as total FROM comments WHERE comment_status = 'Approved' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$comment_count = $row['total'];
 }

$sql ="SELECT * FROM comments WHERE comment_status ='Approved' AND YEAR(comment_time)=YEAR(CURRENT_DATE ) AND MONTH(comment_time) = MONTH(CURRENT_DATE)";
 $result= $db->query ($sql);
$monthlycomment  = $database->num_rows($result);
$sql="SELECT * FROM comments WHERE comment_status ='Approved' AND comment_time BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
$previousmonthcomment = $database->num_rows($result);
if($previousmonthcomment>0){
$MCperInc= ceil((($monthlycomment-$previousmonthcomment)/$previousmonthcomment)*100);
}else{
$MCperInc=0;	
}

 $sql ="SELECT COUNT(id) as total FROM posts WHERE post_status = 'Deleted' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$recycledpost_count = $row['total'];
 }

 $sql ="SELECT * FROM posts WHERE post_status ='Deleted' AND YEAR(post_time)=YEAR(CURRENT_DATE ) AND MONTH(post_time) = MONTH(CURRENT_DATE)";
 $result= $db->query ($sql);
 $monthlytrashedpost  = $database->num_rows($result);
$sql="SELECT * FROM posts WHERE post_status ='Deleted' AND post_time BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
 $previousmonthTPost = $database->num_rows($result);
if($previousmonthTPost > 0){
$RPperInc= ceil((($monthlytrashedpost-$previousmonthTPost)/$previousmonthTPost)*100);
}else{
	$RPperInc= 0;
}

 $sql ="SELECT * FROM users WHERE user_acctStatus = 'Active' AND account_type ='Subscriber' ";
 $result =$database->query($sql);
  $users_countT =$database->num_rows($result);

$sql ="SELECT * FROM users WHERE user_acctStatus = 'Active' AND account_type ='Subscriber'  AND YEAR(date_created)=YEAR(CURRENT_DATE ) AND MONTH(date_created) = MONTH(CURRENT_DATE)";
 $result= $db->query ($sql);
$monthlyusers  = $database->num_rows($result);
$sql="SELECT * FROM users WHERE user_acctStatus = 'Active' AND account_type ='Subscriber'  AND date_created BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
$previousmonthusers = $database->num_rows($result);
if($previousmonthusers>0){
$MUperInc= ceil((($monthlyusers-$previousmonthusers)/$previousmonthusers)*100);
}else{
$MUperInc = 0;	
}
 $sql ="SELECT * FROM users WHERE user_acctStatus = 'Pending' ";
 $result =$database->query($sql);
$pendingusers_count =$database->num_rows($result);
 

$sql ="SELECT * FROM users WHERE user_acctStatus = 'Pending' AND account_type ='Subscriber'  AND YEAR(date_created)=YEAR(CURRENT_DATE ) AND MONTH(date_created) = MONTH(CURRENT_DATE)";
 $result= $db->query ($sql);
$monthlypendingusers  = $database->num_rows($result);
$sql="SELECT * FROM users WHERE user_acctStatus = 'Pending' AND account_type ='Subscriber'  AND date_created BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
$previousmonthpendingusers = $database->num_rows($result);
if($previousmonthpendingusers>0){
$MPUperInc= ceil((($monthlypendingusers-$previousmonthpendingusers)/$previousmonthpendingusers)*100);
}else{
$MPUperInc=0;	
}
 $sql ="SELECT COUNT(id) as total FROM visitors WHERE YEAR(date_visited)=YEAR(CURRENT_DATE ) AND MONTH(date_visited) = MONTH(CURRENT_DATE)";
 $result= $db->query ($sql);
$count = $database->num_rows($result);
$row =$database->fetch_array($result);

	 foreach ($result as $row) {
 	$Mvisitors_count = $row['total'];
 }
 $sql="SELECT * FROM visitors WHERE date_visited BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
 $PMvisitors_count =$database->num_rows($result);
 if($PMvisitors_count >0){
     $visitorsInc= ceil((($Mvisitors_count-$PMvisitors_count)/$PMvisitors_count)*100);
}else{
$visitorsInc=0;	
}
$sql ="SELECT SUM(post_views) as total FROM posts WHERE post_status = 'Published'   AND YEAR(post_time)=YEAR(CURRENT_DATE ) AND MONTH(post_time) = MONTH(CURRENT_DATE)";
 $result= $db->query ($sql);
 $CMengagement_count= $database->num_rows($result);

$sql="SELECT SUM(post_views) as total FROM posts WHERE post_status = 'Published'   AND post_time BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
 
 	$PMengagement_count = $database->num_rows($result);
 if($PMengagement_count>0){
$engagementperInc= ceil((($CMengagement_count-$PMengagement_count)/$PMengagement_count)*100);
}else{
$engagementperInc=0;	
}
 $sql ="SELECT * FROM users WHERE user_acctStatus = 'Deleted' ";
 $result =$database->query($sql);
 	$deleteduser_count = $database->num_rows($result);
 
 $sql ="SELECT * FROM users WHERE user_acctStatus = 'Banned' ";
 $result =$database->query($sql);
 	$bannedusers_count = $database->num_rows($result);

  $sql ="SELECT * FROM users WHERE account_type = 'Admin' AND user_acctStatus = 'Active' ";
 $result =$database->query($sql);
 	$adminusers_count = $database->num_rows($result);
 
 
 $sql ="SELECT id FROM users WHERE user_acctStatus = 'Active' AND role != 'Administrator'" ;
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 
 foreach ($result as $row) {
$onlineuser_id[]	= $row['id'];

}
 $onlineusers_count = 0;
 if(isset($onlineuser_id)){
 for ($i=0; $i <count($onlineuser_id) ; $i++) { 
$online_status = getUser_status($onlineuser_id[$i]); 
// echo "<script>alert('".$online_status."');</script>";
if ($online_status == "online") {
      $onlineusers_count = $onlineusers_count +1 ; }                    		        
	// else{ $status = "offline";}
	# code...
 	}	
}
 $sql ="SELECT * FROM visitors";
 $result =$database->query($sql);
 	$visitors_count = $database->num_rows($result);
 


$sql ="SELECT * FROM categories WHERE category_status = 'Active' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$categories[] = $row['category_title'];
 	$cat=$row['category_title'];
 	 $sql ="SELECT COUNT(id) as total FROM posts WHERE  post_status = 'Published' AND post_tag LIKE '%".$row['category_title']."%' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$catpost_count[] = $row['total'];
 }
 $sql ="SELECT SUM(post_views) as total FROM posts WHERE  post_status = 'Published' AND post_tag LIKE '%".$cat."%' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$catposteng_count[] = $row['total'];
 }
 }

$sql ="SELECT * FROM users WHERE user_acctStatus = 'Active' AND role ='Subscriber'  AND YEAR(date_created)=YEAR(CURRENT_DATE ) AND MONTH(date_created) = MONTH(CURRENT_DATE)";
 $result= $db->query ($sql);
$monthlyusers  = $database->num_rows($result);
$sql="SELECT * FROM users WHERE user_acctStatus = 'Active' AND role ='Subscriber'  AND date_created BETWEEN date_format(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m-01') AND date_format(CURRENT_DATE , '%Y-%m-01')";
 $result= $db->query ($sql);
$previousmonthusers = $database->num_rows($result);
if($previousmonthusers>0){
$MUperInc= ceil((($monthlyusers-$previousmonthusers)/$previousmonthusers)*100);
}else{
$MUperInc=0;	
}

?>