<?php require 'webcomponents/admin-header.php'; ?>
<?php require 'webcomponents/admin-sidebar.php'; ?>
<?php
ob_start();

if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:../index.php");
  exit();
}

?>
<?php



use unicalCSphp\UploadFile;

require_once '../src/unicalCSphp/UploadFile.php';
$msg ="";
$Fname= array();
$result= array();
$post_coverImage ='';
if(isset($_POST['post-Submit'])){
  $post_title = $db->escape_value($_POST['post-title']);
  $post_cat = $db->escape_value($_POST['post-cat']);
  $post_tag= $db->escape_value($_POST['post-tags']);
  $post_content = $db->escape_value($_POST['post-content']);
    if($_SESSION['user_role'] == 'Administrator' || $_SESSION['user_role'] == 'Moderator'  ){
    	$post_status = $db->escape_value($_POST['post-status']);}
  // $post_author = $db->escape_value($_SESSION['username']);
  $post_author = $db->escape_value($_SESSION['user_id']);
  $post_time = date('Y-m-d H:i:s');
if(!empty($post_title) && !empty($post_cat) && !empty($post_tag)){
// $max = 50000*1024;
	if(isset($_FILES['post-coverImage'])){
	$file =	uploadfile('../assets/images/blog/',$_FILES['post-coverImage'],(327680),'');
			// print_r($file);
			$file = json_decode($file);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		$post_coverImage = $database->escape_value($file[2][$i]);
		$file_type = $database->escape_value($file[3][$i]);
	// 	$q = "SELECT * FROM postfiles WHERE POST_ID = $post_id AND USER_ID = $user_id AND POSTFILE_INDEX = $i";
	// 	$send = $database->query($q);
	// $rowcount = $database->num_rows($send);
}}
	}


	
     
               $sql= "INSERT INTO posts (post_title,post_content,";
               if($_SESSION['user_role'] == 'Administrator' || $_SESSION['user_role'] == 'Moderator'  ){
              $sql .= "post_status,"; }
              $sql .= "post_tag,author,category,post_cover,post_coverfiletype,post_time) VALUES('$post_title','$post_content',";
               if($_SESSION['user_role'] == 'Administrator' || $_SESSION['user_role'] == 'Moderator'  ){
              $sql .= "'$post_status',";}
              $sql .= "'$post_tag','".$_SESSION['user_id']."','$post_cat','$post_coverImage','$file_type','$post_time')";
               $result= $database->query ($sql);
        $sql = "SELECT id FROM posts WHERE author = '".$_SESSION['user_id']."' ORDER BY id DESC LIMIT 1";
		$send = $database->query($sql);
		$row = $database->fetch_array($send);
		foreach ($send as $row ) {
			 $post_id = $row['id'];		}
if($result){
if (isset($_FILES['post-attachment'])) {
		# code...
		$file =	uploadfile('../assets/images/blog-attachments/',$_FILES['post-attachment'],(999927680),'');
			// print_r($file);
			$file = json_decode($file);
			$uploadstatus = $file[0];
			 $file_type = $file[3];
		     $count = count($file[2]) ;
for ($i=0; $i <$count; $i++) {
	if($uploadstatus !== "Error"){
		$post_attachment = $database->escape_value($file[2][$i]);
		$post_attachment_fileType = $database->escape_value($file[3][$i]);
		$q = "INSERT INTO  post_attachments (post_id,file_name,file_type,file_index)  VALUES('$post_id','$post_attachment','$post_attachment_fileType','".$i."')";
		$send = $database->query($q);
}}
	}




   if($_SESSION['user_role'] != 'Administrator'){
   	$sql ="SELECT COUNT(id) as total FROM posts WHERE post_status ='Draft' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$draftpost_count = $row['total'];
 }

        $notification = '
                    <a href="all-posts.php" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: blue; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-edit"> </i></div><div> <strong>Admin:</strong> '.$draftpost_count.' new Pending Post(s) ';

                    $query = "SELECT * FROM notifications WHERE notification_type = 'New post'";
                    $send= $database->query($query);

$row = $database->num_rows($send);
if($row==0) {
              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ((SELECT id FROM users WHERE role = 'Administrator' AND user_acctStatus = 'Active'),'New post','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);
          }else{
          	 $sql = "UPDATE notifications SET notification = '".$notification."',notification_time = '".date('Y-m-d H:i:s')."' WHERE  notification_type = 'New post',)";
              $send = $database->query($sql);
          }
            }     }
                    $msg ='<h4 style="margin:0 10px 0 10px;" class="alert alert-success"><center>  New post created successfully <i class=" icon-holder fa fa-right" style="color:green;"></i></center></h4>';

      }else {
           $msg ='<h4 style="margin:0 10px 0 10px;" class="alert alert-danger"><center>Please fill out all entries..</center></h4>';
   }






}







		?>
		<div class="side-app">
			<div class="page-header">
						 			<h4 class="page-title">Post</h4>
						 			<ol class="breadcrumb">
						 				<li class="breadcrumb-item"><a href="#">Create Post</a></li>
						 				<li class="breadcrumb-item active" aria-current="page">Post</li>
						 			</ol>
						 		</div>
				 	<div class="row">
				 		<div class="col-lg-12">
				 			<div class="card">
				 				<div class="card-header">
				 					<div class="card-title">Create Post</div>
				 					<!-- <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fa fa-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fa fa-times"></i></a>
				 					</div> -->
				 				</div>
		 			<div class="row">
						<div class="col-sm- 12 col-md-12">
							<?php echo $msg; ?>
	 						<div class="card-body">
		 				<form action="" id="createpost" class="form-horizontal"  enctype="multipart/form-data" method="post">
								<div class="form-body">
									<div class="row">
										<div class="col-sm- 12 col-md-6">
											<div class="form-group row">
												<label class="control-label col-md-6">Title
													<span class="required"> * </span>
												</label>
												<div class="col-md-12">
													<input type="text" name="post-title" placeholder="Enter post title"
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
													<option value="">Select...</option>
	<?php
$query = "SELECT * FROM categories WHERE category_status ='Active'";
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
												</label></br><div style="margin: 0 0 0 10px ;">
												<em>Hint:Use UPPERCASE for first letter of each tag and seperate using comma(,).&nbsp;  @example(Technology, Economy, Politics)</em></div>
												<div class="col-md-12">
													<input type="text" name="post-tags" placeholder="Enter post tags"
														class="form-control input-height" />
												</div>
											</div>
											</div>
											<?php
											if($_SESSION['user_role'] == 'Administrator' || $_SESSION['user_role'] == 'Moderator'  ){
									echo	'<div class="col-sm- 12 col-md-6">
											<div class="form-group row">
												<label class="control-label col-md-6">Post Status
													<span class="required"> * </span>
												</label>
												<div class="col-md-12">
													<select class="form-control input-height" name="post-status">
														<option value="Draft">Select...</option>
														<option value="Published">Publish</option>
														<option value="Draft">	Draft</option>
														<!-- <option value="other">other</option> -->
													</select>
												</div>
											</div>
										</div>';
}
										?>
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

												<label class="control-label col-md-6" for="post-attachment">Post File Attachment &nbsp;<i class="fa fa-film"></i>
												</label>
												<div class="form-control">
													<input type="file" class="input-control" id="post-attachment"  name="post-attachment[]" multiple />
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-12">Post Content
											<span class="required"> * </span>
												</label>
										<div class="col-md-12">
											<div class="card-body"> <textarea class="editor" placeholder="Type post contents here..." name="post-content"></textarea> </div>
											</div>
										</div>
											<div class="form-actions" style="margin-top:20px;">
												<div class="row">
													<div class="offset-md-5 col-md-9">
														<input type="submit"
															class="btn btn-info m-r-20" name="post-Submit" <?php if (isset($_SESSION['user_acctStatus']) && $_SESSION['user_acctStatus'] != 'Active'){
												echo 'disabled';} ?> value="Submit Post"></input>
													</div>
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
