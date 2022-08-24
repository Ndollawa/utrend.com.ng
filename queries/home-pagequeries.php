<?php
$cat="";
// echo $cat;
if(isset($_POST['action'])){
include '../backend/database.php';
include '../backend/timeAgo.php';
include '../backend/functions.php';
session_start();
ob_start();
// $post_id = array();	$post_title = array();	$post_author = array();	$post_tag = array();	$post_content = array();	$post_cat = array();	$post_status = array();	$post_time = array();	$time = array();	$post_file = array();
// $postcategory1 ="";
// $postcategory2 ="";
// $postcategory3 ="";
// $postcategory4 ="";
// $postcategory5 ="";
// $postcategory6 ="";
// $postcategory7 ="";
// $postcategory8 ="";
// $row['id'] = "";
// 	$row['post_title'] = "";
// 	$row['author'] = "";
// 	 $row['post_tag'] = "";
// 	 $row['post_content'] = "";
// 	 $row['category'] = "";
// 	 $row['post_status'] = "";
// 	 $row['post_time'] = "";
// 	$row['post_time'] = "";
// 	 $row['post_cover'] = "";
if($_POST['action']=='load_home_postcat'){
			$sql = "SELECT * FROM homepage_post WHERE id =1";
			$send = $database->query($sql);
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
			 $post_categories= array($postcategory1,$postcategory2,$postcategory3,$postcategory4,$postcategory5,$postcategory6,$postcategory7,$postcategory8);
			// print_r($post_categories);
			}echo json_encode($post_categories);
}

if($_POST['action'] == 'fetch_featuredposts'){
	$query = "SELECT * FROM posts WHERE post_status = 'Published' AND post_tag  LIKE '%Featured%' GROUP BY posts.id ORDER BY id DESC LIMIT 4";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			$count = 0;
			$rowcount = $database->num_rows($send);
			if($send){
			if($row>0){
			foreach ($send as $row) {
			$post_id[] = $row['id'];
			$post_title[] = $row['post_title'];
			$post_author[] = getUsername($row['author']);
			$post_tag[] = $row['post_tag'];
			$post_content[] = $row['post_content'];
			$post_cat[] = $row['category'];
			$post_status[] = $row['post_status'];
			$post_time[] = timeAgo($row['post_time']);
			$time[] = $row['post_time'];
			$post_file[] = $row['post_cover'];}
            $review_status[] = $row['review_status'];

			$output ='<article class="featured-item item-0"><div class="featured-item-inner"><a class="entry-image-link before-mask" href="content.php?source&p_id='.$post_id[0].'&title="'.preg_replace("/ /","+", $post_title[0]).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file[0].')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file[0].'" /></span></a><div class="entry-info"><span class="entry-category">'.$post_cat[0].'</span><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id[0]."&title=".preg_replace("/ /","+", $post_title[0]).'">'.$post_title[0].'</a></h2><div class="entry-meta"><span class="entry-author"><em>by</em><span class="by">'.$post_author[0].'</span></span><span class="entry-time"><em>'; if(isset($review_status[0]) && $review_status[0] != ""){
  $output .= ' -<strong >'.$review_status[0].'</strong>'; }
$output .='- </em><time class="published" datetime="'.$time[0].'">'.$post_time[0].'</time></span></div></div></div></article><div class="featured-scroll">';
			for ($i=1; $i <count($post_id) ; $i++) { 
				 $output .='<article class="featured-item item-'.$i.'"><div class="featured-item-inner"><a class="entry-image-link before-mask" href="content.php?source&p_id='.$post_id[$i]."&title=".preg_replace("/ /","+", $post_title[$i]).'"><span class="entry-thumb lazy-ify" style="background-image:url(../assets/images/blog/'.$post_file[$i].')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file[$i].'"/> </span></a><div class="entry-info"><span class="entry-category">'.$post_cat[$i].'</span><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id[$i]."&title=".preg_replace("/ /","+", $post_title[$i]).'">'.$post_title[$i].'</a></h2><div class="entry-meta"><span class="entry-time">';
if(isset($review_status[$i]) && $review_status[$i] != ""){
  $output .= '- <strong>'.$review_status[$i].'</strong> -'; }
$output .='<time class="published" datetime="'.$time[$i].'">'.$post_time[$i].'</time></span></div></div></div></article>';
			}

			echo $output;

			}else{
			    echo '<div class="container text-center"><h4>Sorry: No Post yet!!!</h4></div>';
			}


			}else{
			$output = "Failed to load resource: the server responded with a status of 503";
			}
}

if($_POST['action'] == 'fetch_popularposts'){
			$query = "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY post_views DESC LIMIT 4";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			$count = 0;
			$rowcount = $database->num_rows($send);
			if($send){
			if($rowcount>0){
			foreach ($send as $row) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				$post_author = getUsername($row['author']);
				$post_tag = $row['post_tag'];
				$post_content = $row['post_content'];
				$post_cat = $row['category'];
				$post_status = $row['post_status'];
				$post_time = timeAgo($row['post_time']);
				$post_file = $row['post_cover'];
				$review_status = $row['review_status'];

				$output ="<article class='popular-post post'><a class='entry-image-link' href='content.php?source&p_id=".$post_id."&title=".preg_replace("/ /","+", $post_title)."'><span class='entry-thumb lazy-ify'> <img style='width:100%;' class='thumbnail img-responsive' src='../assets/images/blog/".$post_file."' alt='".$post_title."'/></span></a><div class='entry-header'><h2 class='entry-title'><a href='content.php?source&p_id=".$post_id."&title=".preg_replace("/ /","+", $post_title)."'>".$post_title."</a></h2><div class='entry-meta'><span class='entry-time'>"; if(isset($review_status) && $review_status != ""){
  $output .= '<strong style="font-weight:bold;">'.$review_status.'</strong> -'; }
$output .="<time class='published' datetime='".$row['post_time']."'>".$post_time."</time></span></div></div></article>";
				echo $output;
				}
			}else{
			    echo '<div class="container text-center"><h4>Sorry: No Post yet!!!</h4></div>';
			}
			}else{
				$output = "Failed to load resource: the server responded with a status of 503";
			}
	}

if($_POST['action'] == 'fetch_recentposts'){
	$query = "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY id DESC LIMIT 4";
				$send = $database->query($query);
				$row = $database->fetch_array($send);
				// $count = 1;
				$rowcount = $database->num_rows($send);
				if($send){
				if($rowcount>0){
				foreach ($send as $row) {
					$post_id = $row['id'];
					$post_title = $row['post_title'];
					$post_author = getUsername($row['author']);
					$post_tag = $row['post_tag'];
					$post_content = $row['post_content'];
					$post_cat = $row['category'];
					$post_status = $row['post_status'];
					$post_time = timeAgo($row['post_time']);
					$post_file = $row['post_cover'];
					$review_status = $row['review_status'];

				$output =	"<article class='custom-item '><a class='entry-image-link' href='content.php?source&p_id=".$post_id."&title=".preg_replace("/ /","+", $post_title)."'><span class='entry-thumb lazy-ify'> <img style='width:100%;' class='thumbnail img-responsive' src='../assets/images/blog/".$post_file."' alt='".$post_title."'/></span></a><div class='entry-header'><h2 class='entry-title'><a href='content.php?source&p_id=".$post_id."&title=".preg_replace("/ /","+", $post_title)."'>".$post_title."</a></h2><div class='entry-meta'><span class='entry-time'>"; if(isset($review_status) && $review_status != ""){
  $output .= '<strong style="font-weight:bold;">'.$review_status.'</strong>'; }
$output .="<time class='published' datetime='".$row['post_time']."'>".$post_time."</time></span></div></div></article>";
					echo $output;
					}
					}
					}else{
						$output = "Failed to load resource: the server responded with a status of 503";
					}
}


if($_POST['action'] == 'fetch_homepost'){
			$perPage = 10;	
			$page = 0;
			$sql = "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY id DESC";
			if(!empty($_POST["pagenum"])) {
			$page = $_POST["pagenum"];
			}
			$start = ($page-1)*$perPage;
			if($start < 0) $start = 0;
			$query =  $sql." LIMIT ".$start." , ".$perPage; 
		
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			$rowcount = $database->num_rows($send);
			
				$pages  = ceil($rowcount/$perPage);
				
			
			// $count = 1;
		
			if($send){
			if($rowcount>0){
			foreach ($send as $row) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				$post_author = getUsername($row['author']);
				$post_tag = $row['post_tag'];
				$post_content = $row['post_content'];
				$post_cat = $row['category'];
				$post_status = $row['post_status'];
				$post_time = timeAgo($row['post_time']);
				$post_file = $row['post_cover'];
				$review_status = $row['review_status'];

			$output =	"<article class='blog-post hentry index-post'>
			<div class='entry-image'><a class='entry-image-link' href='content.php?source&p_id=".$post_id."&title=".preg_replace("/ /","+", $post_title)."'><span class='entry-thumb lazy-ify'  style='background-image:url(../assets/images/blog/".$post_file.")'><img style='width:100%;' class='thumbnail img-responsive' src='../assets/images/blog/".$post_file."' /></span></a><span class='entry-category'>".$post_cat."</span></div><h2 class='entry-title'><a class='entry-title-link' href='content.php?source&p_id=".$post_id."&title=".preg_replace("/ /","+", $post_title)."' rel='bookmark'>".$post_title."</a></h2><div class='entry-meta'><span class='entry-author'><em>by</em><span class='by'>".$post_author."</span></span><span class='entry-time'><em>"; if(isset($review_status) && $review_status != ""){
 $output .= '- <strong style="font-weight:bold;">'.$review_status.'</strong>'; }
$output .=" -</em><time class='published'  datetime=".$row['post_time'].">".$post_time."</time></span></div></article>";
				echo $output;
				}
				$output = '<input type="hidden" class="pagenum" value="'.$page .'" />
				<input type="hidden" class="total-page" value="'.$pages.'" />';
					echo $output;
						}
						}else{
							$output = "Failed to load resource: the server responded with a status of 503";
			}
	}
if($_POST['action'] == 'fetch_recentcomments'){
	$query = "SELECT * FROM comments WHERE comment_status = 'Approved' ORDER BY id DESC LIMIT 4";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			// $count = 1;
			$rowcount = $database->num_rows($send);
			if($send){
			if($rowcount>0){
			foreach ($send as $row) {
										$comment_id = $row['id'];
										$author_id =$row['user_id'];
										$post_id =$row['post_id'];
								 	$username =$row['username'];
								 	$comment =$row['comment'];
								 	$time =timeAgo($row["comment_time"]);
$query = "SELECT * FROM posts WHERE id =$post_id AND post_status = 'Published' ";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			foreach ($send as $row) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				$post_author =  getUsername($row['author']);
				$post_tag = $row['post_tag'];}	
				$output ='<article class="custom-item "><a class="entry-image-link cmm-avatar" href="content.php?source&p_id='.$post_id.'&title="'.preg_replace("/ /", "+",$post_title).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/'.getUserPic($author_id).')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/'.getUserPic($author_id).'" /></span></a><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id.'&title="'.preg_replace("/ /", "+",$post_title).'">';
				if ($author_id != 0){
					$output .= getUsername($author_id);}else{
						$output .=$username;}
						$output .= '</a></h2><span class="cmm-snippet excerpt"><div class="" style="width:100%; height:30%;">'.$comment.'</div></span></article>';
				echo $output;
						}
					}
				}else{
					$output = "Failed to load resource: the server responded with a status of 503";
				}
}


if($_POST['action'] == 'fetch_mobileapps'){
			$query = "SELECT * FROM posts WHERE post_tag LIKE ('%Mobile%') AND post_status = 'Published' ORDER BY id DESC LIMIT 3";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			if($send){
			foreach ($send as $row) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				$post_author = getUsername($row['author']);
				$post_tag = $row['post_tag'];
				$post_content = $row['post_content'];
				$post_cat = $row['category'];
				$post_status = $row['post_status'];
				$post_time = timeAgo($row['post_time']);
				$post_file = $row['post_cover'];
				$review_status = $row['review_status'];

				echo '<article class="custom-item">
						<a class="entry-image-link" href="content.php?source&p_id="'.$post_id.'&title='.preg_replace("/ /", "+", $post_title).'"><img style="width:100%;" class="thumbnail img-responsive" class="entry-thumb img-responsive" src="../assets/images/blog/'.$post_file.'" alt="data-img" /></a>
						<div class="entry-header">
							<h2 class="entry-title">
								<a href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /", "+",$post_title).'">'.$post_title.'</a></h2>
								<div class="entry-meta">
									<span class="entry-time">'; if(isset($review_status) && $review_status != ""){
  echo '- <strong style="font-weight:bold;">'.$review_status.'</strong> -'; }
echo'<time class="published" datetime="'.$row['post_time'].'">'.$post_time.'</time></span>
								</div>
							</div>
						</article>';
				}

			}else{
				$output = "Failed to load resource: the server responded with a status of 503";
			}
}





if($_POST['action'] == 'fetch_posts_by_cat1'){
				$query = "SELECT postcategory1 FROM homepage_post WHERE id =1";
				$count = 0;
				$send = $database->query($query);
				$row = $database->fetch_array($send);
				foreach ($send as $row) {
					// $post_id = $row['id'];
					$post_cat = ucfirst($row['postcategory1']);
					}
					$query = "SELECT * FROM posts WHERE post_tag LIKE '%".$post_cat."%' AND post_status = 'Published' ORDER BY id DESC LIMIT 5";
				$send = $database->query($query);
				$row = $database->fetch_array($send);
				if($send){
					if($row >0){
				foreach ($send as $row) {
					$post_id1[] = $row['id'];
					$post_title1[] = $row['post_title'];
					$post_author1[] =  getUsername($row['author']);
					$post_tag1[] = $row['post_tag'];
					$post_content1[] = $row['post_content'];
					$post_cat1[] = $row['category'];
					$post_status1[] = $row['post_status'];
					$post_time1[] = timeAgo($row['post_time']);
					$time1[] = timeAgo($row['post_time']);
					$post_file1[] = $row['post_cover'];}
					$output = '<article class="block-item item-0"><div class="block-inner"><a class="entry-image-link before-mask" href="content.php?source&p_id='.$post_id1[0].'&title='.preg_replace("/ /", "+",$post_title1[0]).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file1[0].')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file1[0].'" /></span></a><div class="entry-info"><span class="entry-category">'.$post_cat1[0].'</span><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id1[0].'&title='.preg_replace("/ /", "+",$post_title1[0]).'">'.$post_title1[0].'</a></h2><div class="entry-meta"><span class="entry-author"><em>by</em><span class="by">'.$post_author1[0].'</span></span><span class="entry-time"><em>-</em><time class="published" datetime="'.$time1[0].'">'.$post_time1[0].'</time></span></div></div></div></article>';
					for ($i=1; $i <count($post_id1); $i++) { 
					$output .='<article class="block-item item-'.$i.'"><a class="entry-image-link" href="content.php?source&p_id='.$post_id1[$i].'&title='.preg_replace("/ /", "+",$post_title1[$i]).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file1[$i].')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file1[$i].'" /></span></a><div class="entry-header"><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id1[$i].'&title='.preg_replace("/ /", "+",$post_title1[$i]).'">'.$post_title1[$i].'</a></h2><div class="entry-meta"><span class="ntry-time"><time class="published" datetime="'.$time1[$i].'">'.$post_time1[$i].'</time></span></div></div></article>';}
					echo $output;
				}else{
				  echo '<div class="container jumbotron "><h3 align="center" style="vertical-align:center; margin-top:50%; margin-bottom:50%;">SORRY...</br>No Posts yet!!!</h3></div>';}
				}else{
					$output = "Failed to load resource: the server responded with a status of 503";
				}
}

if($_POST['action'] == 'fetch_posts_by_cat2'){
				$query = "SELECT postcategory2 FROM homepage_post WHERE id =1";
				$count = 0;
				$send = $database->query($query);
				$row = $database->fetch_array($send);
				$output = '';
				foreach ($send as $row) {
					// $post_id = $row['id'];
					$cat = $post_cat = ucfirst($row['postcategory2']);
					}
					$query = "SELECT * FROM posts WHERE post_tag LIKE '%".$post_cat."%' AND post_status = 'Published' ORDER BY id DESC LIMIT 40";
				$send = $database->query($query);
				$row = $database->fetch_array($send);
				$rowcount = $database->num_rows($send);
				if($send){
					if($rowcount>0){
				foreach ($send as $row) {
				$post_id = $row['id'];
			$post_title = $row['post_title'];
			$post_author =  getUsername($row['author']);
			$post_tag = $row['post_tag'];
			$post_content = $row['post_content'];
			$post_cat = $row['category'];
			$post_status = $row['post_status'];
			$post_time = timeAgo($row['post_time']);
			$post_file = $row['post_cover'];
			$output .= '<div class="owl-item active" style="width: 198.333px; margin-right: 20px;"><article class="carousel-item item-'.$count++.'"><div class="entry-image"><a class="entry-image-link" href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /", "+",$post_title).'"><span class="entry-thumb lazy-ify" data-image="../assets/images/blog/'.$post_file.'" style="background-image:url(../assets/images/blog/'.$post_file.')"></span></a></div><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /", "+",$post_title).'">'.$post_title.'</a></h2><div class="entry-meta"><span class="entry-time"><time class="published" datetime="'.$row['post_time'].'">'.$post_time.'</time></time></span></div></article></div>';
			}	
			echo $output;
					}	 else{
  echo '<div class="container jumbotron "><h3 align="center" style="vertical-align:center; margin-top:50%; margin-bottom:50%;">SORRY...</br>No Posts yet!!!</h3></div>';
		}	}else{
							$output = "Failed to load resource: the server responded with a status of 503";
						}
}

if($_POST['action'] == 'fetch_posts_by_cat3'){
			$query = "SELECT postcategory3 FROM homepage_post WHERE id =1";
			$count = 0;
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			foreach ($send as $row) {
				// $post_id = $row['id'];
				$post_cat = ucfirst($row['postcategory3']);
				}
				$query = "SELECT * FROM posts WHERE post_tag LIKE '%".$post_cat."%' AND post_status = 'Published' ORDER BY id DESC LIMIT 3";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			if($send){
			if($row>0){
			foreach ($send as $row) {
				$post_id4[] = $row['id'];
				$post_title4[] = $row['post_title'];
				$post_author4[] = getUsername($row['author']);
				$post_tag4[] = $row['post_tag'];
				$post_content4[] = $row['post_content'];
				$post_cat4[] = $row['category'];
				$post_status4[] = $row['post_status'];
				$post_time4[] = timeAgo($row['post_time']);
				$time4[] = $row['post_time'];
				$post_file4[] = $row['post_cover'];}
				$output = '
					<article class="column-item item-0"><div class="column-inner"><a class="entry-image-link before-mask" href="content.php?source&p_id='.$post_id4[0].'&title='.preg_replace("/ /", "+",$post_title4[0]).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file4[0].')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file4[0].'" /></span></a><div class="entry-info"><span class="entry-category">'.$post_cat4[0].'</span><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id4[0].'&title='.preg_replace("/ /", "+",$post_title4[0]).'">'.$post_title4[0].'</a></h2><div class="entry-meta"><span class="entry-author"><em>by</em><span class="by">'.$post_author4[0].'</span></span><span class="entry-time"><em>-</em><time class="published"  datetime="'.$time4[0].'">'.$post_time4[0].'</time></span></div></div></div></article>';
				for ($i=1; $i <count($post_id4) ; $i++) { 
				$output .= '<article class="column-item item-'.$i.'"><a class="entry-image-link" href="content.php?source&p_id='.$post_id4[$i].'&title='.preg_replace("/ /", "+",$post_title4[$i]).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file4[$i].')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file4[$i].'" /></span></a><div class="entry-header"><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id4[$i].'&title='.preg_replace("/ /", "+",$post_title4[$i]).'">'.$post_title4[$i].'</a></h2><div class="entry-meta"><span class="entry-time"><time class="published" datetime="'.$time4[$i].'">'.$post_time4[$i].'</time></span></div></div></article>';}
				echo $output;
				} else{
  echo '<div class="container jumbotron "><h3 align="center" style="vertical-align:center; margin-top:50%; margin-bottom:50%;">SORRY...</br>No Posts yet!!!</h3></div>';
		}
			}else{
				$output = "Failed to load resource: the server responded with a status of 503";
			}
}

 
 if($_POST['action'] == 'fetch_posts_by_cat4'){
				$query = "SELECT postcategory4 FROM homepage_post WHERE id =1";
				$count = 0;
				$send = $database->query($query);
				$row = $database->fetch_array($send);
				foreach ($send as $row) {
					// $post_id = $row['id'];
					$post_cat = ucfirst($row['postcategory4']);
					}
					$query = "SELECT * FROM posts WHERE post_tag LIKE '%".$post_cat."%' AND post_status = 'Published' ORDER BY id DESC LIMIT 3";
				$send = $database->query($query);
				$row = $database->fetch_array($send);
				if($send){
				if($row>0){
				foreach ($send as $row) {
					$post_id5[] = $row['id'];
					$post_title5[] = $row['post_title'];
					$post_author5[] =  getUsername($row['author']);
					$post_tag5[] = $row['post_tag'];
					$post_content5[] = $row['post_content'];
					$post_cat5[] = $row['category'];
					$post_status5[] = $row['post_status'];
					$post_time5[] = timeAgo($row['post_time']);
					$time5[] = $row['post_time'];
					$post_file5[] = $row['post_cover'];}
					$output = '<article class="column-item item-0"><div class="column-inner"><a class="entry-image-link before-mask" href="content.php?source&p_id='.$post_id5[0].'&title='.preg_replace("/ /", "+",$post_title5[0]).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file5[0].')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file5[0].'" /></span></a><div class="entry-info"><span class="entry-category">'.$post_cat5[0].'</span><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id5[0].'&title='.preg_replace("/ /", "+",$post_title5[0]).'">'.$post_title5[0].'</a></h2><div class="entry-meta"><span class="entry-author"><em>by</em><span class="by">'.$post_author5[0].'</span></span><span class="entry-time"><em>-</em><time class="published"  datetime="'.$time5[0].'">'.$post_time5[0].'</time></span></div></div></div></article>';
				for ($i=1; $i <count($post_id5) ; $i++) { 
				$output .= '<article class="column-item item-'.$i.'"><a class="entry-image-link" href="content.php?source&p_id='.$post_id5[$i].'&title='.preg_replace("/ /", "+",$post_title5[$i]).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file5[$i].')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file5[$i].'" /></span></a><div class="entry-header"><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id5[$i].'&title='.preg_replace("/ /", "+",$post_title5[$i]).'">'.$post_title5[$i].'</a></h2><div class="entry-meta"><span class="entry-time"><time class="published" datetime="'.$time5[$i].'">'.$post_time5[$i].'</time></span></div></div></article>';}
						echo $output;
						} else{
  echo '<div class="container jumbotron "><h3 align="center" style="vertical-align:center; margin-top:50%; margin-bottom:50%;">SORRY...</br>No Posts yet!!!</h3></div>';
		}

				}else{
					$output = "Failed to load resource: the server responded with a status of 503";
				}
}
if($_POST['action'] == 'fetch_posts_by_cat5'){
			$query = "SELECT postcategory5 FROM homepage_post WHERE id =1";
			$count = 0;
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			foreach ($send as $row) {
				// $post_id = $row['id'];
				$post_cat = ucfirst($row['postcategory5']);
				}
				$query = "SELECT * FROM posts WHERE post_tag LIKE '%".$post_cat."%' AND post_status = 'Published' ORDER BY id DESC LIMIT 3";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			if($send){
			foreach ($send as $row) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				$post_author =  getUsername($row['author']);
				$post_tag = $row['post_tag'];
				$post_content = $row['post_content'];
				$post_cat = $row['category'];
				$post_status = $row['post_status'];
				$post_time = timeAgo($row['post_time']);
				$post_file = $row['post_cover'];
				echo '<article class="videos-item item-'.$count++.'"><div class="entry-image"><a class="entry-image-link" href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /", "+",$post_title).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file.')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file.'" /></span><span class="video-icon"></span></a></div><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /", "+",$post_title).'">'.$post_title.'</a></h2><div class="entry-meta"><span class="entry-time"><time class="published" datetime="'.$row['post_time'].'">'.$post_time.'</time></span></div></article>';
				}

			}else{
				$output = "Failed to load resource: the server responded with a status of 503";
			}
}



 if($_POST['action'] == 'fetch_posts_by_cat6'){
			$query = "SELECT postcategory6 FROM homepage_post WHERE id =1";
			$count = 0;
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			foreach ($send as $row) {
				// $post_id = $row['id'];
				$post_cat = ucfirst($row['postcategory6']);
				}
				$query = "SELECT * FROM posts WHERE post_tag LIKE '%".$post_cat."%' AND post_status = 'Published' ORDER BY id DESC LIMIT 4";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			if($send){
				if($row>0){
			foreach ($send as $row) {
				$post_id6[] = $row['id'];
				$post_title6[] = $row['post_title'];
				$post_author6[] =  getUsername($row['author']);
				$post_tag6[] = $row['post_tag'];
				$post_content6[] = $row['post_content'];
				$post_cat6[] = $row['category'];
				$post_status6[] = $row['post_status'];
				$post_time6[] = timeAgo($row['post_time']);
				$time6[] = $row['post_time'];
				$post_file6[] = $row['post_cover'];}
				$output = '<article class="block-item item-0"><div class="block-inner"><a class="entry-image-link before-mask" href="content.php?source&p_id='.$post_id6[0].'&title='.preg_replace("/ /", "+",$post_title6[0]).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file6[0].')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file6[0].'" /></span></a><div class="entry-info"><span class="entry-category">'.$post_cat6[0].'</span><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id6[0].'&title='.preg_replace("/ /", "+",$post_title6[0]).'">'.$post_title6[0].'</a></h2><div class="entry-meta"><span class="entry-author"><em>by</em><span class="by">'.$post_author6[0].'</span></span><span class="entry-time"><em>-</em><time class="published" datetime="'.$time6[0].'">'.$post_time6[0].'</time></span></div></div></div></article><div class="block-grid">';
				for ($i=1; $i <count($post_id6); $i++) { 
					$output .= '<article class="block-item item-'.$i.'"><div class="entry-image"><a class="entry-image-link" href="content.php?source&p_id='.$post_id6[$i].'&title='.preg_replace("/ /", "+",$post_title6[$i]).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file6[$i].')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file6[$i].'" /></span></a></div><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id6[$i].'&title='.preg_replace("/ /", "+",$post_title6[$i]).'">'.$post_title6[$i].'</a></h2><div class="entry-meta"><span class="entry-time"><time class="published" datetime="'.$time6[$i].'">'.$post_time6[$i].'</time></span></div></article>';}

				echo $output;
				
				} else{
  echo '<div class="container jumbotron "><h3 align="center" style="vertical-align:center; margin-top:50%; margin-bottom:50%;">SORRY...</br>No Posts yet!!!</h3></div>';
		}
			}else{
				$output = "Failed to load resource: the server responded with a status of 503";
			}
}

 if($_POST['action'] == 'fetch_posts_by_cat7'){
			$query = "SELECT postcategory7 FROM homepage_post WHERE id =1";
			$count = 0;
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			foreach ($send as $row) {
				// $post_id = $row['id'];
				$post_cat = ucfirst($row['postcategory7']);
				}
				$query = "SELECT * FROM posts WHERE post_tag LIKE '%".$post_cat."%' AND post_status = 'Published' ORDER BY id DESC LIMIT 6";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			if($send){
			foreach ($send as $row) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				$post_author =  getUsername($row['author']);
				$post_tag = $row['post_tag'];
				$post_content = $row['post_content'];
				$post_cat = $row['category'];
				$post_status = $row['post_status'];
				$post_time = timeAgo($row['post_time']);
				$post_file = $row['post_cover'];
				$review_status = $row['review_status'];

				echo '<article class="grid-item item-'.$count++.'"><div class="entry-image"><a class="entry-image-link" href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /", "+",$post_title).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file.')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file.'" /></span></a><span class="entry-category">'.$post_cat.'</span></div><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /", "+",$post_title).'">'.$post_title.'</a></h2><div class="entry-meta"><span class="entry-author"><em>by</em><span class="by">'.$post_author.'</span></span><span class="entry-time"><em>- '; if(isset($review_status) && $review_status != ""){
  echo '<strong style="font-weight:bold;">'.$review_status.'</strong>'; }
echo'-</em><time class="published" datetime="'.$row['post_time'].'">'.$post_time.'</time></span></div></article>';
				}

			}else{
				$output = "Failed to load resource: the server responded with a status of 503";
			}
}




if($_POST['action'] == 'fetch_posts_by_cat8'){
		$query = "SELECT postcategory8 FROM homepage_post WHERE id =1";
		$count = 0;
		$send = $database->query($query);
		$row = $database->fetch_array($send);
		foreach ($send as $row) {
			// $post_id = $row['id'];
			$post_cat = ucfirst($row['postcategory8']);
			}
			$query = "SELECT * FROM posts WHERE post_tag LIKE '%".$post_cat."%' AND post_status = 'Published' ORDER BY id DESC LIMIT 6";
		$send = $database->query($query);
		$row = $database->fetch_array($send);
		if($send){
		foreach ($send as $row) {
			$post_id = $row['id'];
			$post_title = $row['post_title'];
			$post_author =  getUsername($row['author']);
			$post_tag = $row['post_tag'];
			$post_content = $row['post_content'];
			$post_cat = $row['category'];
			$post_status = $row['post_status'];
			$post_time = timeAgo($row['post_time']);
			$post_file = $row['post_cover'];
			$review_status = $row['review_status'];

			echo '<article class="grid-item item-'.$count++.'"><div class="entry-image"><a class="entry-image-link" href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /", "+",$post_title).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file.')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file.'" /></span></a></div><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /", "+",$post_title).'">'.$post_title.'</a></h2><div class="entry-meta"><span class="entry-time"><em>'; if(isset($review_status) && $review_status != ""){
  echo '- <strong style="font-weight:bold;">'.$review_status.'</strong>'; }
echo' -</em><time class="published" datetime="'.$row['post_time'].'">'.$post_time.'</time></span></div></article>';
			}

		}else{
			$output = "Failed to load resource: the server responded with a status of 503";
		}
}

if($_POST['action'] == 'fetch_recentgadgets'){
			$query = "SELECT * FROM posts WHERE post_tag LIKE '%Gadgets%' AND post_status = 'Published' ORDER BY id DESC LIMIT 3";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			if($send){
			foreach ($send as $row) {
				$post_id = $row['id'];
				$post_title = $row['post_title'];
				$post_author =  getUsername($row['author']);
				$post_tag = $row['post_tag'];
				$post_content = $row['post_content'];
				$post_cat = $row['category'];
				$post_status = $row['post_status'];
				$post_time = timeAgo($row['post_time']);
				$post_file = $row['post_cover'];
				$review_status = $row['review_status'];

				echo "<article class='custom-item '><a class='entry-image-link' href='content.php?source&p_id=".$post_id."&title=".preg_replace("/ /","+", $post_title)."'><span class='entry-thumb lazy-ify'> <img style='width:100%;' class='thumbnail img-responsive' src='../assets/images/blog/".$post_file."' alt='".$post_title."'/></span></a><div class='entry-header'><h2 class='entry-title'><a href='content.php?source&p_id=".$post_id."&title=".preg_replace("/ /","+", $post_title)."'>".$post_title."</a></h2><div class='entry-meta'><span class='entry-time'>"; if(isset($review_status) && $review_status != ""){
  echo '- <strong style="font-weight:bold;">'.$review_status.'</strong> -'; }
echo"<time class='published' datetime='".$row['post_time']."'>".$post_time."</time></span></div></div></article>";
					}

				}else{
					$output = "Failed to load resource: the server responded with a status of 503";
				}
}


if($_POST['action'] == 'fetch_footer_posts'){
					$query = "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY post_views DESC LIMIT 3";
					$send = $database->query($query);
					$row = $database->fetch_array($send);
					foreach ($send as $row) {
						$post_id = $row['id'];
						$post_title = $row['post_title'];
						$post_author =  getUsername($row['author']);
						$post_tag = $row['post_tag'];
						$post_content = $row['post_content'];
						$post_cat = $row['category'];
						$post_status = $row['post_status'];
						$post_time = timeAgo($row['post_time']);
						$post_file = $row['post_cover'];
						echo '<article class="popular-post post">
								<a class="entry-image-link" href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","+", $post_title).'"><span class="entry-thumb lazy-ify" data-image="../assets/images/blog/'.$post_file.'" style="background-image:url(../assets/images/blog/'.$post_file.')"></span></a>
								<div class="entry-header">
									<h2 class="entry-title">
										<a href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","+", $post_title).'">'.$post_title.'</a></h2>
										<div class="entry-meta">
											<span class="entry-time"><time class="published" datetime="'.$row['post_time'].'">'.$post_time.'</time></span>
										</div>
									</div>
								</article>';
						}

}
 

 if($_POST['action'] == 'fetch_navnews'){
				$query = "SELECT * FROM posts WHERE post_status = 'Published' AND post_tag LIKE '%News%' ORDER BY id DESC LIMIT 5";
				$send = $database->query($query);
				$row = $database->fetch_array($send);
				foreach ($send as $row) {
					$post_id = $row['id'];
					$post_title = $row['post_title'];
					$post_author =  getUsername($row['author']);
					$post_tag = $row['post_tag'];
					$post_content = $row['post_content'];
					$post_cat = $row['category'];
					$post_status = $row['post_status'];
					$post_time = timeAgo($row['post_time']);
					$post_file = $row['post_cover'];
					echo '<article class="mega-item"><div class="mega-content"><a class="entry-image-link" href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","+", $post_title).'"><span class="entry-thumb lazy-ify"  style="background-image:url(../assets/images/blog/'.$post_file.')"><img style="width:100%;" class="thumbnail img-responsive" src="../assets/images/blog/'.$post_file.'" /></span></a><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","+", $post_title).'">'.$post_title.'</a></h2><div class="entry-meta"><span class="entry-time"><time class="published" datetime="'.$row['post_time'].'">'.$post_time.'</time></span></div></div></article>';
					}


}

if($_POST['action'] == 'fetch_megatab_posts'){
			if(!isset($_POST['menu'])){
			$sql = "SELECT menu1 FROM megatab_menu WHERE id = 1";
			$send = $database->query($sql);
			$row = $database->fetch_array($send);
			if($row>0){

				foreach ($send as $row) {
				// $id = $row['id'];
				$menu = $row['menu1'];
				
				}}

				}else{
	 				$menu = $_POST['menu']; }
	 				$_SESSION['activemenu'] = $menu;
	 				if(!isset($_SESSION['activemenu'])){
	 					$_SESSION['activemenu'] = "";
	 				}
					$query = "SELECT * FROM posts WHERE post_status = 'Published' AND post_tag LIKE '%".$menu."%' ORDER BY post_views DESC LIMIT 4";
					$send = $database->query($query);
					$row = $database->fetch_array($send);
					if($row >0){
					foreach ($send as $row) {
						$post_id = $row['id'];
						$post_title = $row['post_title'];
						$post_author =  getUsername($row['author']);
						$post_tag = $row['post_tag'];
						$post_content = $row['post_content'];
						$post_cat = $row['category'];
						$post_status = $row['post_status'];
						$post_time = timeAgo($row['post_time']);
						$post_file = $row['post_cover'];
						$review_status = $row['review_status'];

						echo '<article class="mega-item"><div class="mega-content"><a class="entry-image-link" href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","+", $post_title).'"><span class="entry-thumb lazy-ify" data-image="" style="background-image:url(../assets/images/blog/'.$post_file.')"></span></a><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","+", $post_title).'">'.$post_title.'</a></h2><div class="entry-meta"><span class="entry-time">'; if(isset($review_status) && $review_status != ""){
  echo '- <strong style="font-weight:bold;">'.$review_status.'</strong> -'; }
echo'<time class="published" datetime="'.$row['post_time'].'">'.$post_time.'</time></span></div></div></article>';
								
						}}else{
			    echo '<div class="container-fliud jumbotron text-center"><h4>Sorry: No Post yet!!!</h4></div>';
			}
}

if($_POST['action'] == 'fetch_breaking_news'){
			$query = "SELECT * FROM posts WHERE post_status = 'Published' AND post_tag LIKE '%News%'  ORDER BY id DESC LIMIT 6";
			$send = $database->query($query);
			$row = $database->fetch_array($send);
			$output ="";
			if($row>0){
		foreach ($send as $row) {
				$post_id = $row['id'];
				$post_title = strip_tags($row['post_title']); 
				$post_author =  getUsername($row['author']);
				$post_tag = $row['post_tag'];
				$post_content = $row['post_content'];
				$post_cat = $row['category'];
				$post_status = $row['post_status'];
				$post_time = timeAgo($row['post_time']);
				$post_file = $row['post_cover'];

			$output .='<div class="owl-item" ><article class="breaking-item"><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","+", $post_title).'">'.$post_title.'</a></h2></article></div>';}
			
			}echo $output;
}



if($_POST['action'] == 'fetch_relatedposts'){
			$post_cat = $database->escape_value($_SESSION['cat']);
			$post_id = $_SESSION['post_id'];
			// count($post_tags)
					$query = "SELECT * FROM posts WHERE post_status = 'Published' AND post_tag LIKE '%".$post_cat."%' AND id != $post_id ORDER BY id DESC LIMIT 3";
					$send = $database->query($query);
					$row = $database->fetch_array($send);
					foreach ($send as $row) {
						$post_id = $row['id'];
						$post_title = $row['post_title'];
						$post_author =  getUsername($row['author']);
						$post_tag = $row['post_tag'];
						$post_content = $row['post_content'];
						$post_cat = $row['category'];
						$post_status = $row['post_status'];
						$post_time = timeAgo($row['post_time']);
						$post_file = $row['post_cover'];
						$review_status = $row['review_status'];

						echo '<article class="related-item item-0"><div class="related-item-inner"><div class="entry-image" style="marging:0 0 55px 0;"><a class="entry-image-link" href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","+", $post_title).'"><span class="entry-thumb lazy-ify" ><img src="../assets/images/blog/'.$post_file.'" /></span></a></div><h2 class="entry-title"><a href="content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","+", $post_title).'">'.$post_title.'</a></h2><div class="entry-meta"><span class="entry-time">';
						if(isset($review_status) && $review_status != ""){
  echo '-  <strong style="font-weight:bold;">'.$review_status.'</strong> -'; }
echo'<time class="published" datetime="'.$row['post_time'].'">'.$post_time.'</time></span></div></div></article>';
								
						}
}


}


?>