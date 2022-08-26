
<?php
// include '../backend/functions.php';
// include '../backend/timeAgo.php';
// session_start();
// ob_start();
$post_tag = array();
if(isset($_GET['p_id'])){
$post_id = $metaInfo = isset($_GET['p_id']) ? trim($_GET['p_id']) : '';
$_SESSION['post_id'] = $post_id;
$query = "SELECT * FROM posts WHERE post_status = 'Published' AND id = '".$post_id."'";
$send = $database->query($query);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
if($rowcount>0){
foreach ($send as $row) {
	$post_id = $row['id'];
	$post_title = $row['post_title'];
	$post_author =   $row['author'];
	$post_content = $row['post_content'];
	$post_cat = $row['category'];
	$_SESSION['cat'] = $post_cat ;
	$post_tag = $post_tagText = $row['post_tag'];
	$post_status = $row['post_status'];
	$post_time = timeAgo($row['post_time']);
	$post_cover = $postCover = $row['post_cover'];
	$review_status = $row['review_status'];

 	

$query = "SELECT id FROM posts WHERE post_status = 'Published' AND id < '".$post_id."'";
$send = $database->query($query);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
if($rowcount>0){
	$ppost_id = array();
	$ppost_title = array();
foreach ($send as $row) {
	$ppost_id[] = $row['id'];
	}

 $previous_post_id = max($ppost_id);
	$query = "SELECT post_title FROM posts WHERE post_status = 'Published' AND id = '".$post_id."'";
$send = $database->query($query);
$row = $database->fetch_array($send);
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
$ppost_title = $row['post_title'];	
}
	 $previous_post = "content.php?source&p_id=".$previous_post_id."&title=".preg_replace("/ /","-", $ppost_title)."";
}
	$query = "SELECT id FROM posts WHERE post_status = 'Published' AND id > '".$post_id."'";
$send = $database->query($query);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
if($rowcount>0){
foreach ($send as $row) {
	$npost_id[] = $row['id'];
	}
	 $next_post_id = min($npost_id);
	$query = "SELECT post_title FROM posts WHERE post_status = 'Published' AND id = '".$post_id."'";
$send = $database->query($query);
$row = $database->fetch_array($send);
// $count = 1;
$rowcount = $database->num_rows($send);
foreach ($send as $row) {
	$npost_title = $row['post_title'];
}
	$next_post = "content.php?source&p_id=".$next_post_id."&title=".preg_replace("/ /","-", $npost_title)."";


}
$post_tag = preg_split("/,/", preg_replace("/ /", "", $post_tag));
// print_r($post_tag) ;
$sql ="SELECT COUNT(id) as total FROM comments WHERE post_id =".$post_id." AND comment_status = 'Approved' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$comment_count = $row['total'];
 }
 $post_commentCount = $comment_count;
 
}

}else{
	header('Location:404.php');
}
}

if (isset($_GET['recycledpost'])) {
	$Dpost_id = $database->escape_value($_GET['recycledpost']);
	$_SESSION['post_id'] = $Dpost_id;
$query = "SELECT * FROM posts WHERE post_status = 'Deleted' AND id = '".$Dpost_id."'";
$send = $database->query($query);
$row = $database->fetch_array($send);
$count = 1;
$rowcount = $database->num_rows($send);
if($rowcount>0){
foreach ($send as $row) {
	$post_id = $row['id'];
	$post_title = $row['post_title'];
	$post_author =  $row['author'];
	$post_tag = $row['post_tag'];
	$post_content = $row['post_content'];
	$post_cat = $row['category'];
	$post_status = $row['post_status'];
	$post_time = timeAgo($row['post_time']);
	$post_file = $row['post_cover'];
	$post_commentCount = $count ++;

$sql ="SELECT COUNT(id) as total FROM comments WHERE post_id ='".$post_id."' AND comment_status = 'Approved' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$comment_count = $row['total'];
 }
  $post_commentCount = $comment_count;
}
}else{
	header('Location:503.php');
}
}

// if(isset($_GET['author'])){
// $post_author = $database->escape_value($_GET['author']);
// $query = "SELECT * FROM posts WHERE post_status = 'Published' AND post_author = '".$post_author."' ORDER BY id DESC ";
// $send = $database->query($query);
// $row = $database->fetch_array($send);
// $count = 1;
// $rowcount = $database->num_rows($send);
// if($rowcount>0){
// foreach ($send as $row) {
// 	$post_id = $row['id'];
// 	$post_title = $row['post_title'];
// 	$post_author =  getUsername($row['author']);
// 	$post_tag = $row['post_tag'];
// 	$post_content = $row['post_content'];
// 	$post_cat = $row['category'];
// 	$post_status = $row['post_status'];
// 	$post_time = timeAgo($row['post_time']);
// 	$post_file = $row['post_file'];
// 	$post_commentCount = $count ++;

// $sql ="SELECT COUNT(id) as total FROM comments WHERE post_id ='".$post_id."' AND comment_status = 'Approved' ";
//  $result =$database->query($sql);
//  $row=$database->fetch_array($result);
//  foreach ($result as $row) {
//  	$comment_count = $row['total'];
//  }
//   $post_commentCount = $comment_count;
// }
// }else{
// 	header('Location:503.php');
// }





?>