<?php
include '../../backend/database.php';
include '../../backend/timeAgo.php';
include '../../backend/functions.php';
session_start();
// use unicalCSphp\UploadFile;
ob_start();
if(isset($_POST['action'])) {
 $output ="";
 $c=1;
			if($_POST['action'] == 'get_allUsers'){

$query = "SELECT * FROM users WHERE user_acctStatus != 'Deleted' ORDER BY id DESC";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$user_id = $row['id'];
	$user_username = $row['username'];
	$fname=  $row['first_name'];
	$lname =  $row['last_name'];
	$about_me =  $row['about_me'];
	$user_email =  $row['email'];
	$user_role =  $row['role'];
	$account_type =  $row['account_type'];
	$user_acctStatus =  $row['user_acctStatus'];
	// $user_bio =  $row['user_bio'];
	// $address = $row['address'];
	// $city =  $row['city'];
	// $zip_code =  $row['zip_code'];
	// $country = $row['country'];
	// $company = $row['company'];
	$user_image = $row['user_image'];
	// $coverpic = $row['cover_pic'];
	// $facebooklink = $row['facebooklink'];
	// $twitterhandle = $row['twitterhandle'];
	// $externallink =  $row['externallink'];
	// $instagrampage = $row['instagrampage'];
	// $youtube = $row['youtube'];
	$user_name = $fname." ".$lname;
	$date_created = date('jS F, Y', strtotime($row['date_created']));
	switch ($row['user_acctStatus']) {
		case 'Active':
			$user_acctStatus ='<span class="btn-sm btn-success">'.$row['user_acctStatus'].'</span>';
			break;

		case 'Banned':
			$user_acctStatus ='<span class="btn-sm btn-warning">'.$row['user_acctStatus'].'</span>';
			break;

		case 'Pending':
			$user_acctStatus ='<span class="btn-sm btn-primary">'.$row['user_acctStatus'].'</span>';
			break;
		case 'Deleted':
			$user_acctStatus ='<span class="btn-sm btn-danger">'.$row['user_acctStatus'].'</span>';
			break;
		default:
			# code...
			break;
	}


$sql ="SELECT COUNT(id) as total FROM posts WHERE author='".$user_id."' AND post_status != 'Deleted' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$allposts_count = $row['total'];
 }

$sql ="SELECT COUNT(id) as total FROM posts WHERE author ='".$user_id."' AND post_status = 'Published' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$publishedposts_count = $row['total'];
 }

				$output .= '<tr class="odd gradeX">
					<td><input type="checkbox" class="checkboxes" name="selectpost[]" value="'.$user_id.'"></td>
					<td class="left">'.$c.'</td>
					<td class="left "><div class=" user-img"><img src="../assets/images/'.getUserPic($user_id).'"  class="img-circle avatar  brround avatar-md"  alt="user-image"/></div></td>
					<td style="width:200px;">'.$user_username.'</td>
					<td>'.$fname.' '.$lname.'</td>
					<td>'.$user_email.'</td>
					<td>'.$user_acctStatus.'</td>
					<td>'.$account_type.'</td>
					<td>'.$user_role.' </td>
					<td>'.$allposts_count.'</td>
					<td>'.$publishedposts_count.'</td>
					<td>'.$date_created.'</td>
					<td style="display:inline-flex;">
					<!-- 	<a href="profile.php?source&user_id='.$user_id.''.$user_name.'" style="margin:2px 4px;" class="btn btn-success btn-xs" title="View User">
							<i class="fa fa-eye"></i>
						</a> -->
						<a href="edit-user.php?source&user_id='.$user_id.'"'.preg_replace("/ /", "_",$user_name).'	style=" margin:2px 4px;" class="btn btn-primary btn-xs" title="Edit User">
							<i class="fa fa-pencil"></i>
						</a>
						<button type="button" style="margin:2px 4px;" class="btn btn-danger btn-xs action-button delete-user" title="Delete User" data-action="delete-user" data-user_id="'.$user_id.'">
							<i class="fa fa-trash-o "></i>
						</button>
					</td>

				</tr>';

														$c++;	 } 
				echo  $output;
			}


if($_POST['action'] == 'UsersBulkOperation'){
// $checkboxes =array();
var_dump($_POST);
	if(!empty($_POST['selectid'])){
$checkboxes = json_decode(stripcslashes($_POST['selectid']));
	foreach ($checkboxes as $checkboxValue) {
$bulk_options = $_POST['bulk_options'];
$user_id=$checkboxValue;

 switch ($bulk_options) {
 	case 'Active':
 		$sql =" UPDATE users SET user_acctStatus = '{$bulk_options}' WHERE id = $user_id ";
 $send = $database->query($sql);
 if($send){
	$query = "SELECT * FROM users WHERE id = $user_id ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$user_id = $row['id'];
	$user_username = $row['username'];
	$fname=  $row['first_name'];
	$lname =  $row['last_name'];
	$about_me =  $row['about_me'];
	$user_email =  $row['email'];
	$user_role =  $row['role'];
	$account_type =  $row['account_type'];
	$user_acctStatus =  $row['user_acctStatus'];}
        $notification = '
                    <a href="#" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: green; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-user"> </i></div><div> <strong>'.getUsername($user_id).'</strong> Your account has been Approved by the Admin ';

              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ('$user_id','Approved account','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);

}

 		break;
 	case 'Banned':
 		$sql =" UPDATE users SET user_acctStatus  = '{$bulk_options}' WHERE id = $user_id ";
 		$send = $database->query($sql);
 		if($send){
	$query = "SELECT * FROM users WHERE id = $user_id ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$user_id = $row['id'];
	$user_username = $row['username'];
	$fname=  $row['first_name'];
	$lname =  $row['last_name'];
	$about_me =  $row['about_me'];
	$user_email =  $row['email'];
	$user_role =  $row['role'];
	$account_type =  $row['account_type'];
	$user_acctStatus =  $row['user_acctStatus'];}
        $notification = '
                    <a href="#" class="dropdown-item d-flex pb-3"> <div class="bg bg-warning"style="display: flex; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-user"> </i></div><div> <strong>'.getUsername($user_id).'</strong> Your account has been Banned by the Admin ';

              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ('$user_id','Banned account','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);

}

 	 	break;
 	case 'Unban':
 		$sql =" UPDATE users SET user_acctStatus  = 'Active' WHERE id = $user_id ";
 		$send = $database->query($sql);
 		if($send){
	$query = "SELECT * FROM users WHERE id = $user_id ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$user_id = $row['id'];
	$user_username = $row['username'];
	$fname=  $row['first_name'];
	$lname =  $row['last_name'];
	$about_me =  $row['about_me'];
	$user_email =  $row['email'];
	$account_type =  $row['account_type'];
	$user_acctStatus =  $row['user_acctStatus'];}
        $notification = '
                    <a href="javascript:;" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: green; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-user"> </i></div><div> <strong>'.getUsername($user_id).'</strong> Your account has been Unbanned by the Admin ';

              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ('$user_id','Approved account','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);

}

 	 	break;
 	case 'Deleted':
 		$sql =" UPDATE users SET user_acctStatus  = '{$bulk_options}' WHERE id = $user_id ";
 		$send = $database->query($sql);


 		break;
 	case 'Administrator':
 		$sql =" UPDATE users SET account_type = 'Admin', role  = '{$bulk_options}' WHERE id = $user_id ";
 		$send = $database->query($sql);
 		if($send){
	$query = "SELECT * FROM users WHERE id = $user_id ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$user_id = $row['id'];
	$user_username = $row['username'];
	$fname=  $row['first_name'];
	$lname =  $row['last_name'];
	$about_me =  $row['about_me'];
	$user_email =  $row['email'];
	$user_role =  $row['role'];
	$account_type =  $row['account_type'];
	$user_acctStatus =  $row['user_acctStatus'];}
        $notification = '
                    <a href="#" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: green; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-exclamation"> </i></div><div> <strong>'.getUsername($user_id).'</strong> CONGRATS: You are now an Admin: Administrator. ';

              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ('$user_id','Approved accountRole','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);

}

 		break;
 		case 'Moderator':
 		$sql =" UPDATE users SET account_type = 'Admin', role  = '{$bulk_options}' WHERE id = $user_id ";
 		$send = $database->query($sql);
 		if($send){
	$query = "SELECT * FROM users WHERE id = $user_id ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$user_id = $row['id'];
	$user_username = $row['username'];
	$fname=  $row['first_name'];
	$lname =  $row['last_name'];
	$about_me =  $row['about_me'];
	$user_email =  $row['email'];
	$user_role =  $row['role'];
	$account_type =  $row['account_type'];
	$user_acctStatus =  $row['user_acctStatus'];}
        $notification = '
                    <a href="#" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: green; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-exclamation"> </i></div><div> <strong>'.getUsername($user_id).'</strong>  CONGRATS: You are now an Admin: Moderator.  ';

              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ('$user_id','Approved accountRole','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);

}

 		break;
 		case 'Subscriber':
 		$sql =" UPDATE users SET account_type = 'Subscriber', role  = 'Author' WHERE id = $user_id ";
 		$send = $database->query($sql);
 		if($send){
	$query = "SELECT * FROM users WHERE id = $user_id ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$user_id = $row['id'];
	$user_username = $row['username'];
	$fname=  $row['first_name'];
	$lname =  $row['last_name'];
	$about_me =  $row['about_me'];
	$user_email =  $row['email'];
	$user_role =  $row['role'];
	$account_type =  $row['account_type'];
	$user_acctStatus =  $row['user_acctStatus'];}
        $notification = '
                    <a href="#" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: green; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-exclamation"> </i></div><div> <strong>'.getUsername($user_id).'</strong>  CONGRATS: You are made an Author by the Admin.  ';

              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ('$user_id','Approved accountRole','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);

}

 		break;

 	default:
 		# code...
 		break;
					 }

					}
				}

		}


		if($_POST['action'] == 'deletedPostsBulkOperation'){
// $checkboxes =array();
echo "found";
	if(!empty($_POST['selectid'])){
$checkboxes = json_decode(stripcslashes($_POST['selectid']));
	foreach ($checkboxes as $checkboxValue) {
$bulk_options = $_POST['bulk_options'];
$post_id=$checkboxValue;
				
$post_id=$checkboxValue;

 switch ($bulk_options) {
 	case 'Restore':
 		$sql =" UPDATE posts SET post_status = 'Draft' WHERE id = $post_id ";
 $send = $database->query($sql);

 		break;
 	case 'Delete':
 		$sql =" DELETE FROM posts WHERE id = $post_id ";
 		$send = $database->query($sql);
 		echo $post_id;
 		break;
 	
 	default:
 		# code...
 		break;
 }



				}
			}
		}

if($_POST['action'] == 'get_allDeletedPosts'){

$query = "SELECT * FROM posts WHERE post_status = 'Deleted'";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$post_id = $row['id'];
	$post_title = $row['post_title'];
	$post_author = $row['author'];
	$post_tag = $row['post_tag'];
	$post_cat = $row['category'];
	$post_views = $row['post_views'];
	$post_time = $row['post_time'];
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
	

$sql ="SELECT COUNT(id) as total FROM comments WHERE post_id ='".$post_id."' AND comment_status != 'Deleted' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$comment_count = $row['total'];
 }	
	
	$post_comments = $comment_count;							

					$output .='<tr class="odd gradeX">
					<th><input type="checkbox" class="checkboxes" name="selectpost[]" value="'.$post_id.'"></th>
					<td class="left">'.$post_id.'</td>
					<td class="left">'.getUsername($post_author).'</td>
					<td style="width:200px;">'.substr($post_title, 0,20).'"..."</td>
					<td>'.$post_cat.'</td>
					<td class="left">'.$post_tag.'</td>
					<td>'.$post_status.'</td>
					<td><img src="../assets/images/blog/'.$post_file.'"/></td>
					<td><i class="fa fa-eye"></i>('.$post_views.') </td>
					<td><i class="fa fa-comments"></i>('.$post_comments.')</td>
					<td>'.$post_time.'</td>
					<td style="display:inline-flex;">
						<a href="../content.php?source&recycledpost='.$post_id.'&title='.preg_replace("/ /","-", $post_title).'"  style="margin:2px 4px;" class="btn btn-primary btn-xs">
							<i class="fa fa-eye"></i>
						</a>
						 <button type="button"  style="margin:2px 4px;" class="btn btn-danger btn-xs action-button delete-post-p " title="Delete Post Permanently" data-action="delete-post-p" data-post_id="'.$post_id.'">
							<i class="fa fa-trash-o "></i>
						</button> 
						<button type="button"  style="margin:2px 4px;" class="btn btn-success btn-xs action-button restore-post " data-action="restore-post" data-post_id="'.$post_id.'">
							<i class="fa fa-repeat "></i>
						</button>
					</td>
						
				</tr>';
			}
			echo $output;
}



if($_POST['action'] == 'get_allDeletedUsers'){

$query = "SELECT * FROM users WHERE user_acctStatus = 'Deleted' ORDER BY id DESC";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$user_id = $row['id'];
	$user_username = $row['username'];
	$fname=  $row['first_name'];
	$lname =  $row['last_name'];
	$about_me =  $row['about_me'];
	$user_email =  $row['email'];
	$user_role =  $row['role'];
	$account_type =  $row['account_type'];
	$user_acctStatus =  $row['user_acctStatus'];
	// $user_bio =  $row['user_bio'];
	// $address = $row['address'];
	// $city =  $row['city'];
	// $zip_code =  $row['zip_code'];
	// $country = $row['country'];
	// $company = $row['company'];
	$user_image = $row['user_image'];
	// $coverpic = $row['cover_pic'];
	// $facebooklink = $row['facebooklink'];
	// $twitterhandle = $row['twitterhandle'];
	// $externallink =  $row['externallink'];
	// $instagrampage = $row['instagrampage'];
	// $youtube = $row['youtube'];
	$user_name = $fname." ".$lname;
	$date_created = date('d-m-Y', strtotime($row['date_created']));
	switch ($row['user_acctStatus']) {
		case 'Active':
			$user_acctStatus ='<span class="btn-sm btn-success">'.$row['user_acctStatus'].'</span>';
			break;

		case 'Banned':
			$user_acctStatus ='<span class="btn-sm btn-warning">'.$row['user_acctStatus'].'</span>';
			break;

		case 'Pending':
			$user_acctStatus ='<span class="btn-sm btn-primary">'.$row['user_acctStatus'].'</span>';
			break;
		case 'Deleted':
			$user_acctStatus ='<span class="btn-sm btn-danger">'.$row['user_acctStatus'].'</span>';
			break;
		default:
			# code...
			break;
	}


$sql ="SELECT COUNT(id) as total FROM posts WHERE author='".$user_id."' AND post_status != 'Deleted' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$allposts_count = $row['total'];
 }

$sql ="SELECT COUNT(id) as total FROM posts WHERE author ='".$user_id."' AND post_status = 'Published' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$publishedposts_count = $row['total'];
 }


				$output .='<tr class="odd gradeX">
					<th><input type="checkbox" class="checkboxes" name="selectpost[]" value="'.$user_id.'"></th>
					<td class="left">'.$c.'</td>
					<td class="left "><div class=" user-img"><img  class="img-circle avatar  brround avatar-md"  src="../assets/images/'.getUserpic($user_id).'" alt="user-image"/></div></td>
					<td style="width:200px;">'.$user_username.'</td>
					<td>'.$fname.' '.$lname.'</td>
					<td>'.$user_email.'</td>
					<td>'.$user_acctStatus.'</td>
					<td>'.$account_type.'</td>
					<td>'.$user_role.' </td>
					<td>'.$allposts_count.'</td>
					<td>'.$publishedposts_count.'</td>
					<td>'.$date_created.'</td>
					<td style="display:inline-flex;">
					<!-- 	<a href="profile.php?source&user_id='.$user_id.''.$user_name.'" style="margin:2px 4px;" class="btn btn-success btn-xs" title="View User">
							<i class="fa fa-eye"></i>
						</a> -->
						<a href="edit-user.php?source&user_id='.$user_id.'"'.preg_replace("/ /", "_",$user_name).'	style=" margin:2px 4px;" class="btn btn-primary btn-xs" title="Edit User">
							<i class="fa fa-pencil"></i>
						</a>
						 <button  style="margin:2px 4px;" class="btn btn-danger btn-xs action-button delete-user-p " title="Delete User Permanently" data-action="delete-user-p" data-user_id="'.$user_id.'">
							<i class="fa fa-trash-o "></i>
						</button> 
				
						<button type="button"  style="margin:2px 4px;" class="btn btn-success btn-xs restore-user " title="Restore User" data-action="restore-user" data-user_id="'.$user_id.'">
							<i class="fa fa-repeat "></i>
						</button>
					</td>

				</tr>';
				$c++;
								 } 
echo $output;
					}

					if($_POST['action'] == 'deletedUserBulkOperation'){

	if(!empty($_POST['selectid'])){
$checkboxes = json_decode(stripcslashes($_POST['selectid']));
	foreach ($checkboxes as $checkboxValue) {
$bulk_options = $_POST['bulk_options'];
$user_id=$checkboxValue;


 switch ($bulk_options) {
 	case 'Restore':
 		$sql =" UPDATE users SET user_acctStatus = 'Active' WHERE id = $user_id ";
 $send = $database->query($sql);

 		break;

 	case 'Deleted':
 		$sql =" UPDATE users SET user_acctStatus = '{$bulk_options}' WHERE id = $user_id ";
 		$send = $database->query($sql);
 		break;

 	default:
 		# code...
 		break;
 }


					}
				}
			}




if($_POST['action'] == 'postsBulkOperation'){
	if(!empty($_POST['selectid'])){
$checkboxes = json_decode(stripcslashes($_POST['selectid']));
	foreach ($checkboxes as $checkboxValue) {
$bulk_options = $_POST['bulk_options'];
$post_id=$checkboxValue;

 switch ($bulk_options) {
 	case 'Published':
 		$sql =" UPDATE posts SET post_status = '{$bulk_options}' WHERE id = $post_id ";
 $send = $database->query($sql);
if($send){
	$query = "SELECT * FROM posts WHERE id = $post_id";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$post_id = $row['id'];
	$post_title = $row['post_title'];
	$post_author = $row['author'];
	$author_id = $row['author_id'];
	$post_tag = $row['post_tag'];
	$post_cat = $row['category'];
	$post_views = $row['post_views'];
	$post_time = date('d-m-Y', strtotime($row['post_time']));
	$post_file = $row['post_cover'];}
        $notification = '
                    <a href="../content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","-", $post_title).'" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: green; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-check"> </i></div><div> <strong>'.getUsername($author_id).'</strong> Your post has been Approved by the Admin ';

              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ('$author_id','Approved post','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);
        
}


 		break;
 	case 'Draft':
 		$sql =" UPDATE posts SET post_status = '{$bulk_options}' WHERE id = $post_id ";
 		$send = $database->query($sql);
 	 	break;
 	case 'Deleted':
 		$sql =" UPDATE posts SET post_status = '{$bulk_options}' WHERE id = $post_id ";
 		$send = $database->query($sql);
 		if($send){
	$query = "SELECT * FROM posts WHERE id = $post_id";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$post_id = $row['id'];
	$post_title = $row['post_title'];
	$post_author = $row['author'];
	$author_id = $row['author_id'];
	$post_tag = $row['post_tag'];
	$post_cat = $row['category'];
	$post_views = $row['post_views'];
	$post_time = date('d-m-Y', strtotime($row['post_time']));
	$post_file = $row['post_cover'];}
        $notification = '
                    <a href="../content.php?source&p_id='.$post_id.'&title='.preg_replace("/ /","-", $post_title).'" class="dropdown-item d-flex pb-3"> <div class=""style="display: flex; background-color: green; width: 40px; height: 40px; border-radius:50% ; justify-content: center; padding: 5px; "  ><i style="color: #ffff; font-size: 2em;" align="center" class=" fa fa-check"> </i></div><div> <strong>'.getUsername($author_id).'</strong> Your post has been Deleted by the Admin ';

              $sql = "INSERT INTO notifications (user_id,notification_type, notification, notification_time) VALUES ('$author_id','Approved post','".$notification."','".date('Y-m-d H:i:s')."')";
              $send = $database->query($sql);
        
}

 		break;
 	case 'Reset':
 		$sql =" UPDATE posts SET post_views = 0 WHERE id = $post_id ";
 		$send = $database->query($sql);
 		break;
 	
 	default:
 		# code...
 		break;
 				}

				}

			}
		}

		
if($_POST['action'] == 'get_allDeletedCategory'){
$query = "SELECT * FROM categories WHERE category_status = 'Deleted'";
$send = $database->query($query);
$row = $database->fetch_array($send);
$c=1;
foreach ($send as $row) {
	$cat_id = $row['id'];
	$cat_title = $row['category_title'];
							

					
						echo'<tr class="odd gradeX">
					<th><input type="checkbox" class="checkboxes" name="selectcategory[]" value="'.$cat_id.'"></th>
					<td class="left">'.$c.'</td>
					<td style="width:200px;">'.$cat_title.'</td>
					<td>
						<button  style="width:5px; height:25px; padding:0px 5px 10px; margin:2px 4px;" class="btn btn-success btn-xs action-button restore-cat " data-action="restore-cat" data-cat_id="'.$cat_id.'">
							<i class="fa fa-repeat "></i>
						</button>
					</td>
						
				</tr>';
				$c++;
																
															  } 
															}
if($_POST['action'] == 'load_allPost'){
$query = "SELECT * FROM posts WHERE post_status != 'Deleted' ORDER BY id DESC";
$send = $database->query($query);
$row = $database->fetch_array($send);
$c = 1;
foreach ($send as $row) {
  $post_id = $row['id'];
  $post_title = $row['post_title'];
  $post_author = getUsername($row['author']);
  $post_tag = $row['post_tag'];
  $post_cat = $row['category'];
  $post_views = $row['post_views'];
  $post_time = date('jS F, Y', strtotime($row['post_time']));
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
  

$sql ="SELECT COUNT(id) as total FROM comments WHERE post_id ='".$post_id."' AND comment_status != 'Deleted' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
  $comment_count = $row['total'];
 }  
  
  $post_comments = $comment_count;
                

  $output .= '<tr class="odd gradeX">
          <td><input type="checkbox" class="checkboxes" name="selectpost[]" value="'.$post_id.'"></td>
          <td class="left">'.$c.'</td>
          <td class="left">'.$post_author.'</td>
          <td style="width:200px;">'.substr($post_title, 0,20)."...".'</td>
          <td>'.$post_cat.'</td>
          <td class="left">'.$post_tag.'</td>
          <td>'.$post_status.'</td>
          <td><img src="../assets/images/blog/'.$post_file.'"/></td>
          <td><i class="fa fa-eye"></i>('.$post_views.') </td>
          <td><i class="fa fa-comments"></i>('.$post_comments.')</td>
          <td>'.$post_time.'</td>
          <td style="display:inline-flex;">
            <a href="../content.php?source&p_id='.$post_id.'&title'.preg_replace("/ /", "-",$post_title).'" style="margin:2px 4px;" class="btn btn-success btn-xs" title="View Post">
              <i class="fa fa-eye"></i>
            </a>
            <a href="edit-post.php?source&p_id='.$post_id.''.preg_replace("/ /", "-",$post_title).'"  style=" margin:2px 4px;" class="btn btn-primary btn-xs" title="Edit Post">
              <i class="fa fa-pencil"></i>
            </a>
            <button type="button"  style="margin:2px 4px;" class="btn btn-danger btn-xs action-button delete-post " title="Delete Post" data-action="delete-post" data-post_id="'.$post_id.'">
              <i class="fa fa-trash-o "></i>
            </button>
          </td>
            
        </tr>';
        $c++;
			
}

  echo $output;

}
		
if($_POST['action'] == 'commentsBulkOperation'){

if(!empty($_POST['selectid'])){
$checkboxes = json_decode(stripcslashes($_POST['selectid']));
	foreach ($checkboxes as $checkboxValue) {
$bulk_options = $_POST['bulk_options'];


	$comment_id=$checkboxValue;

 switch ($bulk_options) {
 	case 'Approved':
 		$sql =" UPDATE comments SET comment_status = '{$bulk_options}' WHERE id = $comment_id ";
 $send = $database->query($sql);

 		break;
 	case 'Unapproved':
 		$sql =" UPDATE comments SET comment_status = '{$bulk_options}' WHERE id = $comment_id ";
 		$send = $database->query($sql);
 	 	break;
 	case 'Deleted':
 		$sql =" UPDATE comments SET comment_status = '{$bulk_options}' WHERE id = $comment_id ";
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

		}
	}


	if($_POST['action'] == 'get_allComments'){


$query = "SELECT * FROM comments WHERE comment_status != 'Deleted' ORDER BY id DESC";
$send = $database->query($query);
$row = $database->fetch_array($send);
$c=1;
foreach ($send as $row) {
	$comment_id = $row['id'];
	$comment_author = $row['username'];
	$email = $row['user_email'];
	$comment = $row['comment'];
	$comment_status = $row['comment_status'];
	$post_id  = $row['post_id'];
	$comment_time = date('jS F, Y', strtotime($row['comment_time']));

	switch ($comment_status) {
		case 'Approved':
			$comment_status ='<span class="btn-sm btn-success">'.$row['comment_status'].'</span>';
			break;
		
		case 'Unapproved' || 'pending':
			$comment_status ='<span class="btn-sm btn-warning">'.$row['comment_status'].'</span>';
			break;

		case 'Deleted':
			$comment_status ='<span class="btn-sm btn-danger">'.$row['comment_status'].'</span>';
			break;
		default:
			# code...
			break;
	}
	$sql ="SELECT post_title FROM posts WHERE id = $post_id AND post_status != 'Deleted' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$post = $row['post_title'];
 }		
$sql ="SELECT COUNT(id) as total FROM replies WHERE comment_id = $comment_id AND reply_status != 'Deleted' ";
 $result =$database->query($sql);
 $row=$database->fetch_array($result);
 foreach ($result as $row) {
 	$replies_count = $row['total'];
 }						

	$comment_replies = $replies_count;
	
	 
					$output .= '<tr class="odd gradeX">
					<td><input type="checkbox" class="checkboxes" name="selectcomment[]" value="'.$comment_id.'"></td>
					<td >'.$c.'</td>
					<td >'.$comment_author.'</td>
					<td><div class="container comment-table" style="width: 100%; height: 100%;">'.$comment.'</div></td>
					<td >'.$email.'</td>
					<td>'.substr($post, 0,50).'...'.'</td>
					<td>'.$comment_status.'</td>
					<td><i class="fa fa-comments"></i>('.$comment_replies.') </td>
					<td>'.$comment_time.'</td>
					<!--  --><td style="display:inline-flex;">
						<button  align="center" style="width:100%; height:25px; padding:5px 10px; margin:2px 4px;" class="btn btn-success btn-sm action-button approve-comment " data-action="approve-comment" data-comment_id="'.$comment_id.'">Approve 
							<i class="fa fa-check "></i>
						</button>
						<button align="center" style="width:100%; height:25px; padding:5px 10px; margin:2px 4px;" class="btn btn-warning btn-sm action-button unapprove-comment " data-action="unapprove-comment" data-comment_id="'.$comment_id.'">Unapprove 
							<i class="fa fa-times "></i>
						</button>
						<button type="button"  align="center" style="width:100%; height:25px; padding:5px 10px; margin:2px 4px;" class="btn btn-danger btn-sm action-button delete-comment " data-action="delete-comment" data-comment_id="'.$comment_id.'">Delete 
							<i class="fa fa-trash-o "></i>
						</button>
					</td>
						
				</tr>';
														$c++;		
															  } 
															  echo $output;

							}
		


		}




		?>
