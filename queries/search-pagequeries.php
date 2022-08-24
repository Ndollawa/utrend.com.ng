<?php 
// $sql='';
if(isset($_GET['author']) || isset($_GET['label']) || isset($_GET['search'])){
	if(isset($_GET['label'])){
	$label = $database->escape_value($_GET['label']);
	// $_SESSION['post_id'] = $Dpost_id; 
}
if(isset($_GET['author'])){
$post_author = $database->escape_value($_GET['author']);
}

	if(isset($_GET['search'])){
	$key = $database->escape_value($_GET['search']);
	// $_SESSION['post_id'] = $Dpost_id;

}

}
if(isset($_POST['action'])) {
 $output ="";
include '../backend/database.php';
include '../backend/timeAgo.php';
include '../backend/functions.php';
include 'post-queries.php';
session_start();
ob_start();
 if (isset($_SESSION['user_id'])) {
 $user_id = $_SESSION['user_id'];
 }else{
 $user_id = "";	
 }
 if($_POST['action'] == 'fetch_searchedposts'){
if($_POST['stag'] == 'label'){
$sql= "SELECT * FROM posts WHERE post_status = 'Published' AND LOWER(post_tag) LIKE LOWER('%".$_POST['sdata']."%') OR post_status = 'Published' AND LOWER(post_title) LIKE LOWER('%".$_POST['sdata']."%') OR post_status = 'Published' AND LOWER(category) LIKE LOWER('%".$_POST['sdata']."%') ORDER BY id DESC"; 
}elseif($_POST['stag'] == 'author'){
$sql = "SELECT * FROM posts WHERE post_status = 'Published' AND LOWER(author) LIKE LOWER('%".$_POST['sdata']."%') ORDER BY id DESC ";
}elseif($_POST['stag'] == 'all-posts'){
$sql= "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY id DESC";
}elseif($_POST['stag'] == 'key'){
	// $key = $database->escape_value($_GET['search']);
	// $_SESSION['post_id'] = $Dpost_id;
	$filter = array("is","this","that","how","where","when","what","a","to","then","them","who","let","have","should","would","those","does","do","done","did","can","we","you","him","she","her","help","if","all","was","could","in","on","under","over","but");
	$key = explode(' ', $_POST['sdata']);
	$x=1;
	$keyword ="";
	foreach ($key as $word) {
	if(!in_array($word, $filter)){
		$keywords[] = $word;
	foreach ($keywords as  $value) {
	$x++;
     $value;
	if($x == 1){
		$keyword .="post_status = 'Published' AND LOWER(post_tag) LIKE LOWER('%".$value."%') OR post_status = 'Published' AND LOWER(post_title) LIKE LOWER('%".$value."%')  OR post_status = 'Published' AND LOWER(author) LIKE LOWER('%".$value."%')";
	}else{
	    
		$keyword .=" post_status = 'Published' AND LOWER(post_tag) LIKE LOWER('%".$value."%') OR post_status = 'Published' AND LOWER(post_title) LIKE LOWER('%".$value."%')  OR post_status = 'Published' AND LOWER(author) LIKE LOWER('%".$value."%') OR";
	}

	}
	}
	}
	$keyword = preg_replace('/\W\w+\s*(\W*)$/', '$1',$keyword);

$sql= "SELECT * FROM posts WHERE $keyword ORDER BY id "; 

}


			$sql1 = "SELECT * FROM homepage_post WHERE id =1";
			$send = $database->query($sql1);
			$row = $database->fetch_array($send);
			foreach ($send as $row) {
				$post_id = $row['id'];
				$postcategory1 = ucfirst($row['postcategory1']);
				$postcategory2 = ucfirst($row['postcategory2']);
				$postcategory3 = ucfirst($row['postcategory3']);
				$postcategory4 = ucfirst($row['postcategory4']);
				$postcategory5 = ucfirst($row['postcategory5']);
				$postcategory6 = ucfirst($row['postcategory6']);
				$postcategory7 = ucfirst($row['postcategory7']);
				$postcategory8 = ucfirst($row['postcategory8']);
				$postPerPage = $row['postPerPage'];}
$perPage = $postPerPage;

			$page = 1;
if(!empty($_POST["pagenum"])) {
$page = $_POST["pagenum"];
}
$pager = ceil($page/10);
if($pager < 0 || $pager == 0) $pager = 1;
$start = ($page-1)*$perPage;
if($start < 0) $start = 0;

$query =  $sql." LIMIT ".$start." , ".$perPage; 
$posts= $database->query($sql);
$postresult= $database->query($query);
$row = $db->fetch_array($postresult);
$rowcount = $database->num_rows($posts);

$pages  = ceil($rowcount/$perPage);
if($rowcount >0){
foreach ($postresult as $row) {

$ids[]=$row ["id"];

}



$frq = array_count_values($ids);

foreach ($frq as $index => $id) {
$sr = "SELECT * FROM posts WHERE id = $index";
$rsearch =$database->query($sr) ;
$row = $database->fetch_array($rsearch) ;
$count=0;
foreach ($rsearch as $row) {
  $post_id = $row['id'];
  $post_title = $row['post_title'];
  $post_author = getUsername($row['author']);
  $post_tag = $row['post_tag'];
  $post_content = $row['post_content'];
  $post_cat = $row['category'];
  $post_status = $row['post_status'];
  $post_time = timeAgo($row['post_time']);
  $post_cover = $row['post_cover'];
  	$review_status = $row['review_status'];
	

echo'<article class="blog-post hentry index-post post-'.$count ++.'">
<div class="entry-image">
<a class="entry-image-link" href="content.php?source&p_id='. $post_id.'&title='. preg_replace("/ /", "+",$post_title).'"><span class="entry-thumb lazy-ify" data-image="../assets/images/blog/'.$post_cover.'" style="background-image:url(../assets/images/blog/'.$post_cover.')"></span>
</a>
<span class="entry-category">'. $post_cat.'</span>
</div>
<h2 class="entry-title">
<a class="entry-title-link" href="content.php?source&p_id='. $post_id.'&title='. preg_replace("/ /", "+",$post_title).'" rel="bookmark">'. $post_title.'</a>
</h2>
<div class="entry-meta">
<span class="entry-author"><em>by</em><span class="by">'. $post_author.'</span></span>
<span class="entry-time"><em>-';if(isset($review_status) && $review_status != ""){
  echo '<strong style="color:black;">'.$review_status.'</strong>'; }
echo'-</em><time class="published" datetime="'. $row['post_time'].'">'. $post_time.'</time></span>
</div>
</article>';
			
		}	}
			$output ='</div><input type="hidden" class="ppager" value="'.$pager.'" /><input type="hidden" class="ppagenum" value="'.$page .'" /><input type="hidden" class="ptotal-page" value="'.$pages.'" />
<div class="blog-pager pager container" id="blog-pager"><ul class="pager-pagination" style="display:inline-flex; wordwrap:wrap;">';

if($pages>1){
$output .= '<li ><button style="border-radius:40%; padding:2px 6px; margin:0 2px;" class="btn btn-sm btn-default pager-nav';
if($pages <1){$output .= 'disabled';}
$output .='" id="" data-pager="'.$pager.'" data-pagerpage="'.($pager-1).'" data-tpages="'.$pages.'" data-page="'.$page.'"><i class="fa fa-angle-double-left"></i></button></li>';
$output .= '<li ><button style="border-radius:40%; padding:2px 6px; margin:0 2px;" class="btn btn-sm btn-default innerpager-nav';
if($page <1){$output .= 'disabled';}
$output .='" id="" data-pager="'.$pager.'" data-movepage="'.($page-1).'" data-tpages="'.$pages.'" data-page="'.$page.'"><i class="fa fa-angle-left"></i></button></li>';
if($pages>10){
$pagercount = ($pager*10);}else{$pagercount = $pages;}
$i=ceil($pagercount -10);
if($i <1){
	$i =1;
}
 for ($i+1; $i <= $pagercount ; $i++) {
 	if ($i==$page) {
 			$output .= '<li ><button style="border-radius:40%; padding:2px 6px; margin:0 2px;" class="btn btn-sm btn-danger pagination active" id="" data-pagenum="'.$i.'" data-tpages="'.$pages.'">'.$i.'</button></li>';
}else{
 	
	$output .= '<li ><button style="border-radius:40%; padding:2px 6px; margin:0 2px;" class="btn btn-sm btn-default pagination" id="" data-pagenum="'.$i.'" data-tpages="'.$pages.'">'.$i.'</button></li>';}
}
$output .= '<li ><button style="border-radius:40%; padding:2px 6px; margin:0 2px;" class="btn btn-sm btn-default innerpager-nav';
if($page >= $pages){$output .= 'disabled';}
$output .='" id="" data-pager="'.$pager.'" data-movepage="'.($page+1).'" data-tpages="'.$pages.'" data-page="'.$page.'"><i class="fa fa-angle-right"></i></button></li>';
$output .= '<li ><button style="border-radius:40%; padding:2px 6px; margin:0 2px;" class="btn btn-sm btn-default pager-nav';
if(($page*10) >= $pages){$output .='disabled';}
$output .='" id="" data-pager="'.$pager.'" data-pagerpage="'.($page+1).'" data-tpages="'.$pages.'" data-page="'.$page.'"';
$output .='><i class="fa fa-angle-double-right"></i></button></li>';}
$output .='</ul>
</div>
';
	echo $output;	
		} else{
  echo '<div class="container jumbotron "><h3 align="center" style="vertical-align:center; margin-top:50%; margin-bottom:50%;">SORRY...</br>No Posts yet!!!</h3></div>';
		}

}


// if($_POST['action'] == 'fetch_pager'){
//     $pager = 1;
// if(isset($_POST['pager'])){
// $pager=$_POST['pager'];}
// $pages = $_POST['tpages'];
// $page = $_POST['pagenum'];
// $output ='<input type="hidden" class="ppager" value="'.$pager.'" />';
// if($pages>1){
// $output .= '<li ><button style="border-radius:40%; padding:2px 6px; margin:0 2px;" class="btn btn-sm btn-default pager';
// if($pages <1){$output .= 'disabled';}
// $output .='" id="" data-pager="'.($pager-1).'" data-tpages="'.$pages.'" data-page="'.$page.'"><i class="fa fa-angle-double-left"></i></button></li>';
// if($pages>10){
// $pagercount = ($pager*10);}else{$pagercount = $pages;}
//  for ($i=$pager; $i < $pagercount ; $i++) { 
//  	if ($i==$page) {
//  			$output .= '<li ><button style="border-radius:40%; padding:2px 6px; margin:0 2px;" class="btn btn-sm btn-danger pagination active" id="" data-pagenum="'.$i.'" data-tpages="'.$pages.'">'.$i.'</button></li>';
// }else{
 	
// 	$output .= '<li ><button style="border-radius:40%; padding:2px 6px; margin:0 2px;" class="btn btn-sm btn-default pagination" id="" data-pagenum="'.$i.'" data-tpages="'.$pages.'">'.$i.'</button></li>';}
// }
// $output .= '<li ><button style="border-radius:40%; padding:2px 6px; margin:0 2px;" class="btn btn-sm btn-default pager';
// if(($page*10) >= $pages){$output .='disabled';}
// $output .='" id="" data-pager="'.($pager+1).'" data-tpages="'.$pages.'" data-page="'.$page.'"><i class="fa fa-angle-double-right"></i></button></li>';}

// echo $output;
// }


}
?>