
<?php require 'webcomponents/admin-header.php'; ?>
<?php require 'webcomponents/admin-sidebar.php'; ?>
<?php
if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:../index.php");
  exit();
}


?>

<?php include'admin-queries/profile-queries.php'; ?>
<div class="side-app">
			<div class=" content-area">
				<div class="page-header">
					<h4 class="page-title">Profile</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Pages</a></li>
						<li class="breadcrumb-item active" aria-current="page">Profile</li>
					</ol>
				</div>
				<div class="row">
			
					<!-- <div class='pd-20 m-10 alert alert-warning container'>Please setup your account details completely <a href='edit-profile.php' class=' text-center'>&ensp;click here</a></div> -->
				
					<div class="col-lg-5 col-xl-4 post-thumb"> <!-- <a class="lightgallery" href="../assets/images/users-coverpics/<?php echo $coverpic;?>"> -->
						<div class="card card-profile cover-image " data-image-src="../assets/images/users-coverpics/<?php echo $coverpic;?>" style="background: url(&quot;../assets/images/users-coverpics/<?php echo $coverpic;?>&quot;) center center;">
							<div <?php if($coverpic==""){echo ' style="background-color: black !important;" ';}?>class="card-body text-center ">
								<div class="user-profpicture"></div>
								<!-- <img class="card-profile-img" src="../assets/images/<?php echo getUserpic($_SESSION['user_id']);?>" alt="img"/>  -->
								<h3 class="mb-1 text-white"><?php echo getUsername($user_id); ?></h3>
								<p class="mb-2 text-white"><?php echo $account_type." ".$user_role; ?></p>
								<!-- <a class="btn btn-primary text-white btn-sm mt-2"> <span class="fa fa-twitter"></span> Follow </a> -->
								<?php if($_SESSION['user_role']!='Administrator'){
								echo ''; }?><a href="edit-profile.php" class="btn btn-success btn-sm mt-2"><i class="fa fa-pencil" aria-hidden="true"></i> Edit profile</a>
							</div><!--  </a> -->
						</div>
						<div class="card p-5 ">
							<div class="card-title"> Contact &amp; Personal Info </div>
							<div class="media-list">
								<div class="media mt-1 pb-2">
									<div class="mediaicon"> <i class="fa fa-link" aria-hidden="true"></i> </div>
									<div class="card-body ml-5 p-1">
										<h6 class="mediafont text-dark">Websites</h6>
										<a class="d-block" href="<?php echo $externallink; ?>"><?php echo $externallink; ?></a>  </div> <!-- media-body --> </div> <!-- media --> <!-- media -->
										<div class="media mt-1 pb-2">
											<div class="mediaicon"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
											</div>
											<div class="card-body p-1 ml-5">
												<h6 class="mediafont text-dark">Email </h6><span class="d-block"><?php echo $user_email; ?></span> </div> <!-- media-body --> </div> <!-- media --> <div class="media mt-1"> <div class="mediaicon"> <i class="fa fa-twitter" aria-hidden="true"></i> </div> <div class="card-body p-1 ml-5"> <h6 class="mediafont text-dark">Twitter</h6><a class="d-block" href="<?php echo $twitterhandle; ?>"><?php echo '@'.$user_username; ?></a> </div> <!-- media-body --> </div> <!-- media --> </div> <!-- media-list --> </div> <div class="card"> <div class="card-header"> <h3 class="card-title">My Story</h3> <!-- <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div> -->
											</div>
											<div class="card-body">
												<div class="body-section"> <h5 class="mediafont text-dark mb-1">About</h5> <p class="text-muted"><?php echo $about_me; ?></p>
												</div>
												<!-- <div class="body-section"> <h4 class="mediafont text-dark mb-1">Introduction</h4> <p class="text-muted">Put a little about yourself here so people know they've found the correct Kevin.</p></div> <div class="body-section"> <h4 class="mediafont text-dark mb-1 ">Acheivements</h4> <p class="text-muted">Examples: survived high school, have 3 kids, etc.</p></div>  --><!-- <div class="body-section"> <a href="#" class="btn btn-purple btn-sm">Edit</a> </div>  -->
											</div>
										</div>
									</div>
									<div class="col-lg-7 col-xl-8">
										<div class="card">
											<div class="card-body">
												<div id="profile-log-switch">
													<div class="fade show active ">
														<div class="table-responsive border "> <table class="table row table-borderless w-100 m-0 "> <tbody class="col-lg-12 col-xl-6 p-0"><tr><td><strong>Full Name :</strong> <?php echo getUsername($user_id); ?></td></tr><tr><td><strong>Location :</strong><?php echo $country; ?></td></tr><!--<tr> <td><strong>Languages :</strong> English, German, Spanish.</td> </tr>--> </tbody> <tbody class="col-lg-12 col-xl-6 p-0"><tr><td><strong>Website :</strong><?php echo $externallink; ?></td></tr><tr><td><strong>Email :</strong><?php echo $user_email; ?></td></tr><!-- <tr><td><strong>Phone :</strong> +125 254 3562 </td></tr> --> </tbody></table>
														</div>
														<div class="row mt-5 profie-img"> <div class="col-md-12"> <div class="media-heading"> <h5><strong>Biography</strong></h5> </div> <p><?php echo $user_bio; ?></p></div> <!-- <img class="img-fluid rounded w-25 h-25 m-2" src="../assets/images/photos/8.jpg" alt="banner image"> <img class="img-fluid rounded w-25 h-25 m-2" src="../assets/images/photos/10.jpg" alt="banner image "> <img class="img-fluid rounded w-25 h-25 m-2" src="../assets/images/photos/11.jpg" alt="banner image ">  -->
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card profile-info">
										<!-- <form> <textarea class="form-control input-lg p-text-area  border-0" rows="2" placeholder="Whats in your mind today?"></textarea> </form> <div class="card-footer"> <button type="button" class="btn btn-sm btn-info pull-right">Post</button> <ul class="nav nav-pills"> <li><a href="#"><i class="fa fa-map-marker mr-3"></i></a></li> <li><a href="#"><i class="fa fa-camera mr-3"></i></a></li> <li><a href="#"><i class=" fa fa-film mr-3"></i></a></li> <li><a href="#"><i class="fa fa-microphone"></i></a></li> </ul> </div>  -->
										<div class="btn-group pull-right" style="margin: 5px 0px; margin-left:75%;">
											<a href="create-post.php"<?php if (isset($user_acctStatus) && $user_acctStatus != 'Active'){
												echo 'disabled';} ?>
											 class="btn btn-info">New Post<i class="si si-note"></i></a>
										</div>
									</div>
									<div class="card">
									<div class="card-header"> <h3 class="card-title">Recent Posts</h3>  </div>
										<div class="card-body">											<!-- <div class="d-flex">  -->
												<div class="row">
<?php
$query = "SELECT * FROM posts WHERE post_status = 'Published' AND author = '".$_SESSION['user_id']."' ORDER BY id DESC LIMIT 6";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$post_id = $row['id'];
	$post_title = $row['post_title'];
	$post_author = $row['author'];
	$post_tag = $row['post_tag'];
	$post_cat = $row['category'];
	$post_file = $row['post_cover'];
	$file_type= $row['post_coverfiletype'];
	$post_views = $row['post_views'];

$sql ="SELECT COUNT(id) as total FROM comments WHERE post_id ='".$post_id."' AND comment_status = 'Approved' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$comment_count = $row['total'];
 }

	$imageTypes =array(
 					'image/jpeg',
 					'image/pjpeg',
 					'image/gif',
 					'image/png',
 					'image/webp');
$videoTypes =array(
 					'video/3gp',
 					'video/mp4',
 					'video/avi',
 					'video/mpg',
 					'video/mpeg',
 				'video/webm');

			echo'<div class="card col-sm-6 col-md-4" style="margin:2px 0 ;">
					<div class="card-box post-thumb" style="pading:10px 0;"" >
						<div class="entry-image"><a class="entry-image-link" href="../source/content.php?source&p_id='.$post_id.''.preg_replace("/ /","+", $post_title).'">';

							if (in_array($file_type,$imageTypes)){
               echo ' <span class="entry-thumb"> <img class="thumbnail img-responsive " src="../assets/images/blog/'.$post_file.'" style="width:100%; height:130px; margin:5px 0;"/></span>';
                                }elseif (in_array($file_type,$videoTypes)) {
                    echo '<span class="entry-thumb"> <img class="thumbnail img-responsive " src="../assets/images/blog/'.$post_file.'" style="width:100%; height:130px; margin:5px 0;"/></span><span class="video-icon"></span>';}
									echo '</a></div><h5 class="entry-title"><a href="../source/content.php?source&p_id='.$post_id.''.preg_replace("/ /","+", $post_title).'"><strong>'.substr($post_title, 0, 40).'...'.'</strong></a></h5><div class="entry-meta" style="margin:0 0 15px 0;"><span ><em>Comments</em>&ensp;<i class="fa fa-comments"> </i> ('.$comment_count.')&ensp;</br><em>Views</em>&ensp; <i class="fa fa-eye"> </i>('.$post_views.') </span>
									</div>
													</div>
												</div>';
												} ?>
											</div>

											<div class="clearfix"></div>
										</div> </div> </div>
								</div> <div class="card"> <div class="card-header"> <h3 class="card-title">Other Posts</h3> <!-- <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div>  --></div>
											<div class="card-body">
												<div class="table-responsive">
	<?php
if(isset($_POST['checkbox-submit'])){
	if(!empty($_POST['selectpost'])){
$checkboxes = $_POST['selectpost'];
	foreach ($checkboxes as $checkboxValue) {
$bulk_options = $_POST['bulk-options'];
$post_id=$checkboxValue;

 switch ($bulk_options) {
 // 	case 'Published':
 // 		$sql =" UPDATE posts SET post_status = '{$bulk_options}' WHERE id = $post_id ";
 // $send = $database->query($sql);

 // 		break;
 // 	case 'Draft':
 // 		$sql =" UPDATE posts SET post_status = '{$bulk_options}' WHERE id = $post_id ";
 // 		$send = $database->query($sql);
 // 	 	break;
 	case 'Deleted':
 		$sql =" UPDATE posts SET post_status = '{$bulk_options}' WHERE id = $post_id ";
 		$send = $database->query($sql);
 		break;
 	// case 'Reset':
 	// 	$sql =" UPDATE posts SET post_views = 0 WHERE id = $post_id ";
 	// 	$send = $database->query($sql);
 	// 	break;

 	default:
 		# code...
 		break;
 }

}
}else{


}
}

?>

										<table class="table table-bordered table-hover table-checkable order-column valign-middle border mb-0 align-items-centerid datatable4" id="example4"> <div class="bulkoptions-container">
		 								<div class="row" >
											<div class="col-md-6 col-sm-6 col-6 pull-right">
												<select class="form-control bulkoptions-container-tools" name="bulk-options" style="width: 200px; margin: 5px 0px;">
														<option value="">Select Options</option>
														<!-- <option value="Published">Publish</option> -->
														<!-- <option value="Draft">	Draft</option> -->
														<option value="Deleted">Delete</option>
													<!-- 	<option value="Reset">Reset Post Views</option> -->
													</select>	<div class="bulkoptions-container-tools" style="margin: 5px 0px;">
											<input type="submit" class="btn btn-success" name="checkbox-submit" value="Apply">
										</div>
															</div>
</div>
							 					<thead>
							 						<tr>
							 							<th><input type="checkbox" id="selectAll" name="selectAll"></th>
							 							<!-- <th><strong> Id</strong></th>
							 							<th><strong> Author</strong></th> -->
							 							<th><strong> Post Title</strong></th>
							 							<th><strong> Category</strong></th>
							 							<th><strong> Post Tag</strong></th>
							 							<th><strong> Status</strong></th>
							 							<th><strong> Post Cover Image</strong></th>
							 							<th><strong> Post Views</strong></th>
							 							<th><strong> Comments</strong></th>
							 							<th><strong> Date/Time</strong></th>
							 							<th><strong> Actions</strong></th>

							 						<!-- 	<th><strong> Category Title</strong></th>
							 							<th><strong> Actions</strong></th>
							 							<th><strong> Actions</strong></th>
							 							 -->
							 						</tr>
							 						</thead>
							 						<tbody >
<?php

$query = "SELECT * FROM posts WHERE post_status != 'Deleted' AND author = '".$_SESSION['user_id']."'";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$post_id = $row['id'];
	$post_title = $row['post_title'];
	$post_author = $row['author'];
	$post_tag = $row['post_tag'];
	$post_cat = $row['category'];
	$post_views = $row['post_views'];
	$post_time = date('d-m-Y', strtotime($row['post_time']));
	$post_file = $row['post_cover'];
	switch ($row['post_status']) {
		case 'Published':
			$post_status ='<span class="btn-sm btn-success">'.$row['post_status'].'</span>';
			break;

		case 'Draft':
			$post_status ='<span class="btn-sm btn-warning">'.$row['post_status'].'</span>';
			break;

		case 'Deleted':
			$post_status ='<span class="btn-sm btn-danger">'.$row['post_status'].'</span>';
			break;
		default:
			# code...
			break;
	}


$sql ="SELECT COUNT(id) as total FROM comments WHERE post_id ='".$post_id."' AND comment_status = 'Approved' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$comment_count = $row['total'];
 }

	$post_comments = $comment_count;


											?>

											<tr class="odd gradeX">
					<th><input type="checkbox" class="checkboxes" name="selectpost[]" value="<?php echo $post_id; ?>"></th>
					<!-- <td class="left"><?php echo $post_id; ?></td>
					<td class="left"><?php echo $post_author; ?></td> -->
					<td style="width:200px; "><?php echo substr($post_title, 0,20)."..."; ?></td>
					<td><?php echo $post_cat; ?></td>
					<td class="left" style="width:200px; "><?php echo$post_tag; ?></td>
					<td><?php echo $post_status; ?></td>
					<td><img src="../assets/images/blog/<?php echo $post_file; ?>"/></td>
					<td><i class="fa fa-eye"></i>(<?php echo $post_views; ?>) </td>
					<td><i class="fa fa-comments"></i>(<?php echo $post_comments; ?>)</td>
					<td><?php echo $post_time; ?></td>
					<td>
						<a href="../source/content.php?source&p_id=<?php echo $post_id; ?><?php echo preg_replace("/ /", "+",$post_title); ?>" style="width:5px; height:25px; padding:0px 5px 10px; margin:2px 4px;" class="btn btn-success btn-xs" title="View Post">
							<i class="fa fa-eye"></i>
						</a>
						<a href="edit-post.php?source&p_id=<?php echo $post_id; ?><?php echo preg_replace("/ /", "+",$post_title); ?>"	style="width:5px; height:25px; padding: 0px 5px 10px; margin:2px 4px;" class="btn btn-primary btn-xs" title="Edit Post">
							<i class="fa fa-pencil"></i>
						</a>
						<button  style="width:5px; height:25px; padding:0px 5px 10px; margin:2px 4px;" class="btn btn-danger btn-xs action-button delete-post " title="Delete Post" data-action="delete-post" data-post_id="<?php echo $post_id; ?>">
							<i class="fa fa-trash-o "></i>
						</button>
					</td>

				</tr>

															 <?php } ?>
																<!-- </tbody>
															</table> -->
							 						</tbody>
									 		</table>
												</div>
											</div>
										</div>
						</div>
					</div>
				</div>
			</div>
<?php require 'webcomponents/admin-footer.php'; ?>
	<?php require 'webcomponents/admin-js.php';?>

<?php
	$sql = "SELECT last_activity FROM sessions WHERE user_id = '".$_SESSION['user_id']."' ORDER BY ID LIMIT 1 ";
	$qry = $database->query($sql);
	$row = $database->fetch_array($qry);
	foreach ($qry as $key => $row ){
				$user_last_activity = $row['last_activity'];
			}
?>
   <script>
		 var script = document.referrer.split('/');
			script= script[script.length-1];
			var $last_activity = "<?php echo timeAgo($user_last_activity); ?>";
			var username = "<strong><?php echo getName($_SESSION['user_id']) ;?></strong>";
  if(script == 'login.php'){
  	  $.toast({
                                            heading: 'Welcome back! '+username ,
                                            text:'Last seen: '+$last_activity,
                                            position: 'top-right',
                                            loaderBg:'#ff6849',
                                            icon: 'success',
                                            hideAfter: 3500,
                                            stack: 6
                                          });
  }
    </script>

	</body>
</html>
