
<?php require 'webcomponents/admin-header.php'; ?>
<?php require 'webcomponents/admin-sidebar.php'; ?>
<?php
if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:../");
}
					?>
<?php

if(isset($_GET['p_id'])){
$p_id = $database->escape_value($_GET['p_id']);
$query = "SELECT * FROM posts WHERE id = '".$p_id."'";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$post_id = $row['id'];
	$post_title = $row['post_title'];
	$post_content = $row['post_content'];
	$post_author = $row['author'];
	$post_tag = $row['post_tag'];
	$post_category = $row['category'];
	$post_status = $row['post_status'];
	$post_time = $row['post_time'];
	$post_file = $row['post_cover'];
	$file_type = $row['post_coverfiletype'];
}
}else{
    header('location:../source/404.php');
}

$msg ="";
$Fname= array();
$result= array();

if(isset($_POST['updatepost-Submit'])){
    
    if($_SESSION['user_acctStatus'] ==='Active'){
  $destination = '../assets/images/blog/';
  $post_title = $db->escape_value($_POST['post-title']);
  $post_cat = $db->escape_value($_POST['post-cat']);
  $post_tag= $db->escape_value($_POST['post-tags']);
  $post_content = $db->escape_value($_POST['post-content']);
    if($_SESSION['user_role'] == 'Administrator' || $_SESSION['user_role'] == 'Moderator'  ){
  $post_status = $db->escape_value($_POST['post-status']);}
  // $post_author = $db->escape_value($_SESSION['username']);
  $post_author = $db->escape_value($_SESSION['user_id']);
  $post_time = date('Y-m-d H:i:s');
  
$post_title = <<<EOT
 $post_title
EOT;
 
  
   	$post_content = <<<EOT
 $post_content
EOT;
if(!empty($post_title) && !empty($post_cat) && !empty($post_tag)){
// $max = 50000*1024;
if(isset($_FILES['post-coverImage']) && !empty($_FILES['post-coverImage']))
	{
	$file =	uploadfile('../assets/images/blog/',$_FILES['post-coverImage'],(2147483648),'');
			// print_r($file);
			$file = json_decode($file);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		$post_coverImage = $database->escape_value($file[2][$i]);
		$file_type = $database->escape_value($file[3][$i]);
}}
	if(isset($post_file) && !empty($post_file)){deleteFile($postt_file,"../assets/images/blog/");}
unset($_FILES['post-coverImage']);
	}
// print_r($_FILES);
            //    author = '$post_author',
              $sql= "UPDATE posts SET post_title = '$post_title',
               post_content ='$post_content',";
               if($_SESSION['user_role'] == 'Administrator' || $_SESSION['user_role'] == 'Moderator'  ){
             $sql .= "post_status = '$post_status', ";}
             $sql .= "post_tag = '$post_tag',
               category ='$post_cat',";
               if(!empty($post_coverImage)){
               $sql .="
               post_cover = '$post_coverImage',post_coverfiletype = '$file_type',";}
               $sql .="post_time ='$post_time', review_status = 'Updated' WHERE id = '".$p_id."'";
               $result= $database->query($sql);
     if($result){
     	if (isset($_FILES['post-attachment']) && !empty($_FILES['post-attachment']))
	 {
	
     		
		$file =	uploadfile('../assets/images/blog-attachments/',$_FILES['post-attachment'],(2147483648),'');
			print_r($file);
			$file = json_decode($file);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		$post_attachment = $database->escape_value($file[2][$i]);
		$post_attachment_fileType = $database->escape_value($file[3][$i]);
		if(!empty($post_attachment) && !is_null($post_attachment) && $post_attachment != ""){
		$sql = "SELECT * FROM post_attachments WHERE post_id = $p_id ";
				$send = $database->query($sql);
				$row = $database->fetch_array($send);
				$rowcount = $database->num_rows($send);
				if($rowcount>0){
				foreach ($send as $row) {
                            		$files[] = $row['file_name'];
                            		}
                            	 $count = count($files) ;

                        for($x=0;$x<$count;$x++) {
                            		 	if (!empty($files[$x])){
                            		 deleteFile( $files[$x],"../assets/images/blog-attachments/");

                            		}
                            	}}}
				$q = "SELECT * FROM post_attachments WHERE post_id = $post_id  AND file_index = $i";
		$send = $database->query($q);
	$rowcount = $database->num_rows($send);
	if($rowcount>0){
	$sql = "UPDATE  post_attachments SET file_name = '$post_attachment',file_type = '".$post_attachment_fileType."' WHERE post_id ='$post_id' AND file_index ='".$i."', ";
	$sendAssetfile = $database->query($sql);
		}else{

	$sql = "INSERT INTO post_attachments (post_id,file_name,file_type,file_index)  VALUES('$post_id','$post_attachment','$post_attachment_fileType','".$i."')";
	$sendAssetfile = $database->query($sql);

	
				}
	
}}
	}

   if($_SESSION['user_role'] != 'Administrator'){
        $notification = '
                    <a href="../source/content.php?source&p_id='.$post_id.''.preg_replace("/ /","+", $post_title).'" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: blue; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-edit"> </i></div><div> <strong>'.$post_author.':</strong> Your post was edited by an Admin.';
              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ('$author_id','Post edited','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);

            }
                    $msg ='<h4 style="margin:0 10px 0 10px;" class="alert alert-success"><center> Post updated successfully <i class=" icon-holder fa fa-check" ></i></center></h4>';
                    header('Location:../source/content.php?source&p_id='.$post_id.''.preg_replace("/ /","+", $post_title));

      }else {
           $msg ='<h4 style="margin:0 10px 0 10px;" class="alert alert-danger"><center>Please fill out all entries..</center></h4>';
   }

}}else{
   $msg =`<h4 style="margin:0 10px 0 10px;" class="alert alert-danger"><center>SORRY: you don\'t have permission for this action!!! Your account is ${$_SESSION['user_acctStatus']}. </center></h4>`;  
}


}
		?>
		<div class="side-app">
					<div class="page-header">
						 			<h4 class="page-title">Post</h4>
						 			<ol class="breadcrumb">
						 				<li class="breadcrumb-item"><a href="#">Edit Post</a></li>
						 				<li class="breadcrumb-item active" aria-current="page">Post</li>
						 			</ol>
						 		</div>
				 	<div class="row">
				 		<div class="col-lg-12">
				 			<div class="card">
				 				<div class="card-header">
				 					<div class="card-title">Edit Post</div>
				 					<!-- <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fa fa-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fa fa-times"></i></a>
				 					</div> -->
				 				</div>
		 			<div class="row">
						<div class="col-sm- 12 col-md-12">
							<?php echo $msg; ?>
	 						<div class="card-body">
		 				<form action="" id="updatepost" class="form-horizontal"  enctype="multipart/form-data" method="post">
								<div class="form-body">
									<div class="row">
										<div class="col-sm- 12 col-md-6">
											<div class="form-group row">
												<label class="control-label col-md-6">Title
													<span class="required"> * </span>
												</label>
												<div class="col-md-12">
													<input type="text" name="post-title" value="<?php echo $post_title; ?>"
														class="form-control input-height" />
												</div>
											</div>
										</div>
										<div class="col-sm- 12 col-md-6">
										<div class="form-group row">
											<label class="control-label col-md-6">Post Category
												<span class="required"> * </span>
											</label>
											<div class="col-md-12">
												<select class="form-control input-height" name="post-cat">
													<option value="<?php echo $post_category; ?>"><?php echo $post_category; ?></option>
	<?php
$query = "SELECT * FROM categories WHERE category_status ='Active' AND category_title != '".$post_category."'";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
echo '<option value="'.$row['category_title'].'">'.$row['category_title'].'</option>';
}




	?>


												</select>
											</div>
										</div>
									</div>
								<!-- </div> -->
								<div class="col-sm- 12 col-md-6">
											<div class="form-group row">
												<label class="control-label col-md-6">Post Tags
													<span class="required"> * </span>
												</label>
											</br><div style="margin: 0 0 0 10px;">
												<em>Hint:Use UPPERCASE for first letter of each tag and seperate using comma(,).&nbsp;  @example(Technology, Economy, Politics) </em></div>
												<div class="col-md-12">
													<input type="text" name="post-tags" value="<?php echo $post_tag; ?>"
														class="form-control input-height" />
												</div>
											</div>
											</div>
										<?php	if($_SESSION['user_role'] == 'Administrator' || $_SESSION['user_role'] == 'Moderator'  ){
									echo	'<div class="col-sm- 12 col-md-6">
											<div class="form-group row">
												<label class="control-label col-md-6">Post Status
													<span class="required"> * </span>
												</label>
												<div class="col-md-12">
													<select class="form-control input-height" name="post-status">
														<option value="'.$post_status.'">'. $post_status.'</option>';
														 if($post_status == "Published"){
														echo '<option value="Draft">	Draft</option>';
														}else{
															echo '<option value="Published">Publish</option>';
														}

													echo '</select>
												</div>
											</div>
										</div>';} ?>
										<div class="col-sm- 12 col-md-6 " >
											<div class="form-group">
												<label class="control-label col-md-6" for="post-coverImage">Post Cover Image
												</label>
												<div class="form-control">
													<input type="file" class="input-control" id="post-coverImage" name="post-coverImage" accept=".jpeg, .jpg, .png, .gif" />
												</div>
											</div>
										</div>
										<div class="col-sm- 12 col-md-6 " >
											<div class="form-group">

												<label class="control-label col-md-6" for="post-attacthment">Post File Attachment &enbs;<i class="fa fa-film"></i>
												</label>
												<div class="form-control">
													<input type="file" class="input-control" id="post-attacthment"  name="post-attachment[]" multiple />
												</div>
											</div>
										</div>
										<div class="col-sm- 12 col-md-6">
											<div class="form-group row">
												<label class="control-label col-md-6">File Preview
												</label>
												<div class="offset-md-1 col-md-6"><?php

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

												if (in_array($file_type,$imageTypes)){

               echo ' <div class="post-thumb-gallery">
                                    <figure class="post-thumb img-popup"><a class="lightgallery" href="../assets/images/blog/'.$post_file.'" ><img   class="img-responsive" src="../assets/images/blog/'.$post_file.'" style="width: 400px;" alt="post image">  </a> </figure>
                                </div>';
                                }elseif (in_array($file_type,$videoTypes)) {
                    echo '<div class="embed-responsive embed-responsive-16by9">
                                    <video class="embed-responsive-item" controls="controls" src="../assets/images/blog/'.$post_file.'" ></video>
                                </div>';

                                }?>

												</div>
											</div>
										</div>
									</div>
						<div class="form-group row">
							<label class="control-label col-md-12">Post Content
								<span class="required"> * </span>										</label>
									<div class="col-md-12"><textarea class="editor" row="20" name="post-content"><?php echo $post_content; ?></textarea> 
										</div></div>
											<div class="form-actions" style="margin-top:20px;">
								
									<div class="text-center col-md-12">
										<button type="submit" class="btn btn-info mr-5"  <?php if (isset($_SESSION['user_acctStatus']) && $_SESSION['user_acctStatus'] != 'Active'){
												echo 'disabled';} ?> name="updatepost-Submit">Update Post</button><button type="button" onClick = "history.back();"class="btn btn-default ml-10">Cancel</button>
													
												</div>
											</div>
										</div>

									</form>
										</div>
									</div>
								</div>			<!--  -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require 'webcomponents/admin-footer.php'; ?>
	<?php require 'webcomponents/admin-js.php';?>
</body>
</html>
