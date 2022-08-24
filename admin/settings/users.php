<?php 
$postApproval ="";
$user_acctApproval ="";
$commentApproval ="";
$smlApproval ="";
if(isset($_POST['action'])){

                include '../../backend/database.php';
                include '../../backend/timeAgo.php';
                include'../../backend/functions.php';
                	// $user_acctApproval=  $database->escape_value($_POST['user-acctApproval']);
                	// $commentApproval = $database->escape_value($_POST['commentApproval']);
                	// $smlApproval =  $database->escape_value($_POST['smlApproval']);
                	
                if($_POST['action'] == 'turnOn_postApproval'){
                $sql = "ALTER TABLE `posts` CHANGE `post_status` `post_status` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'Published'";
                $send = $database->query($sql);

                }elseif ($_POST['action'] == 'turnOff_postApproval') {
                $sql = "ALTER TABLE `posts` CHANGE `post_status` `post_status` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'Draft'";
                $send = $database->query($sql);
                
                }
                
                if($_POST['action'] == 'turnOn_commentApproval'){
                $sql = "ALTER TABLE `comments` CHANGE `comment_status` `comment_status` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'Approved';";
                $send = $database->query($sql);}elseif ($_POST['action'] == 'turnOff_commentApproval') {
                $sql = "ALTER TABLE `comments` CHANGE `comment_status` `comment_status` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'Pending'";
                $send = $database->query($sql);
                }
                
                if($_POST['action'] == 'turnOn_userApproval'){
                $sql = "ALTER TABLE `users` CHANGE `user_acctStatus` `user_acctStatus` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'Active'";
                $send = $database->query($sql);
                }elseif ($_POST['action'] == 'turnOff_userApproval') {
                $sql = "ALTER TABLE `users` CHANGE `user_acctStatus` `user_acctStatus` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'Pending'";
                $send = $database->query($sql);
                
                }
                if($_POST['action'] == 'turnOn_smlApproval'){
                $sql = "UPDATE blog_settings SET Social_login ='True' WHERE id = 1";
                $send = $database->query($sql);}elseif ($_POST['action'] == 'turnOff_smlApproval') {
                $sql = "UPDATE blog_settings SET Social_login ='False' WHERE id = 1";
                $send = $database->query($sql);
                }
   }

   $sql = "SELECT COLUMN_DEFAULT AS value FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'utrendco_utrend' AND TABLE_NAME = 'posts' AND COLUMN_NAME = 'post_status'";
$result = $database->query($sql);
$row = $database->fetch_array($result);
foreach ($result as $row) {
     $postApproval = $row['value'];
}

   $sql1 = "SELECT COLUMN_DEFAULT AS value FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'utrendco_utrend' AND TABLE_NAME = 'users' AND COLUMN_NAME = 'user_acctStatus'";
$result1 = $database->query($sql1);
$row1 = $database->fetch_array($result1);
foreach ($result1 as $row1) {
   	$useracctApproval = $row1['value'];
}


   $sql2 = "SELECT COLUMN_DEFAULT AS value FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'utrendco_utrend' AND TABLE_NAME = 'comments' AND COLUMN_NAME = 'comment_status'";
$result2 = $database->query($sql2);
$row2 = $database->fetch_array($result2);
foreach ($result2 as $row2) {
     $commentApproval = $row2['value'];
}

//     $sql3 = "
// SELECT COLUMN_DEFAULT AS value FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'utrendco_utrend' AND TABLE_NAME = 'posts' AND COLUMN_NAME = 'post_status'";
// $result3 = $database->query($sql3);
// $row = $database->fetch_array($result3);
// foreach ($result3 as $row) {
// $smlApproval = $row['value'];}

$sql4 = "SELECT social_login FROM blog_settings WHERE id = 1";
 $result4 = $database->query($sql4);
$row4 = $database->fetch_array($result4);
foreach ($result4 as $row4) {
$smlApproval = $row4['social_login'];
}

	
?>											
							<div class="card">
										<div class="card-header"> 
											<h3 class="card-title">Users Settings</h3> 
											<div class="card-options"> 
												<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div> 
											</div> 
											<div class="card-body"> 
												<div class="row">
												
												<div class="col-md-12">
													<div class="form-group mb-0 "> 
													<h6> Auto Approve User Account</h6> 
														<label class="switch pull-right"><input type="checkbox" id="userApproval" class="switch" name="user-acctApproval" <?php  if(strtolower($useracctApproval) == 'active'){
															echo ' checked';

														} ?> value="<?php echo $user_acctApproval; ?>"><span class="slider round"></span></input></label>
														 </div> 
														</div> 
												<div class="col-md-12">
													<div class="form-group mb-0 "> 
													<h6> Auto Post Approval</h6> 
														<label class="switch pull-right"><input type="checkbox" id="postApproval" class="switch" name="postApproval" <?php if( strtolower($postApproval) == 'published'){
															echo ' checked';
														} ?> value="<?php echo $postApproval; ?>"><span class="slider round"></span></input></label>
														 </div> 
												</div>  
												<div class="col-md-12">
													<div class="form-group mb-0 "> 
													<h6> Auto Approve User Comment</h6> 
														<label class="switch pull-right"><input type="checkbox" id="commentApproval" class="switch" name="commentApproval" <?php if( strtolower($commentApproval) == 'approved'){
															echo ' checked';
														} ?> value="<?php echo $commentApproval; ?>"><span class="slider round"></span></input></label>
														 </div> 
														</div>  
											<div class="col-md-12">
													<div class="form-group mb-0 "> 
													<h6> Allow Social Media Logins</h6> 
														<label class="switch pull-right"><input type="checkbox" id="smlApproval" class="switch" name="smlApproval" <?php if( strtolower($smlApproval) == 'true'){
															echo ' checked';
														} ?> value="<?php echo $smlApproval; ?>"><span class="slider round"></span></input></label>
														 </div> 
														</div> 
												</div>
								 </div>
											</div> 
							