
<?php
include '../../backend/database.php';
include '../../backend/timeAgo.php';
session_start();
// use unicalCSphp\UploadFile;
if(isset($_POST['action'])) {
 $output ="";
			if($_POST['action'] == 'create-category'){
			// parse_str($_POST["files"],$_POST);   
			$catName = $database->escape_value(ucfirst($_POST['catname']));
			$query = "INSERT INTO categories (category_title) VALUES ('$catName')";
			$send = $database->query($query);
}


if($_POST['action'] == 'update-category'){
			// parse_str($_POST["files"],$_POST); 
			$cat_id = $_POST['cat_id'];  
			$catName = $database->escape_value($_POST['catname']);
			$query = "UPDATE categories SET category_title = '$catName' WHERE id = '".$cat_id."'";
			$send = $database->query($query);
}



if($_POST['action'] == 'loadCategory'){

$query = "SELECT * FROM categories WHERE category_status = 'Active' ";
$send = $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$cat_id = $row['id'];
	$cat_title = $row['category_title'];
	$output = '	<tr>
	<th><input type="checkbox" class="checkboxes" name="selectcategory[]" value="'. $cat_id.'"></th>
					<td>'.$cat_id.'</td>
					<td>'.$cat_title.'</td>
					<td>
				<button	type="button" style="width:5px; height:25px; padding: 0px 5px 10px; margin:2px 4px;" class="btn btn-primary btn-xs  edit-category" title="Edit" data-action="edit-category" data-cat_id="'.$cat_id.'">
					<i class="fa fa-pencil"></i>
				</button>
				<button type="button"  style="width:5px; height:25px; padding:0px 5px 10px; margin:2px 4px;" class="btn btn-danger btn-xs delete-category" title="Delete" data-action="delete-category" data-cat_id="'.$cat_id.'">
					<i class="fa fa-trash-o "></i>
				</button>
					</td>
						
				</tr>';
				echo $output;
}



}
		

if($_POST['action'] == 'edit-category'){
$cat_id = $_POST['cat_id'];
$query = "SELECT * FROM categories WHERE category_status = 'Active' AND id = '".$cat_id."'";
$send= $database->query($query);
$row = $database->fetch_array($send);
foreach ($send as $row) {
	$cat_title = $row['category_title'];

$output = '<div class="card-body"> 
			 					<form action="" method="post"  id="edit-category">
			 					<div class="form-group">	
			 						<label for="newcat-title"><strong> Edit Category</strong></label>
			 						<input type="text" class="form-control" value="'.$cat_title.'" id="newcat-title" name="newcat-title" /></div>
			 					<div class="form-group">
			 					<input type="hidden" value ="'.$cat_id.'" id="update-catid" />
			 						<button type="submit" class="btn btn-primary btn-default" id="upadte-category" >Update Category</button></div>
			 					</form></div>';

echo $output;
	}
		
}


if($_POST['action'] == 'delete-category'){
$cat_id = $_POST['id'];
$query = "UPDATE categories SET category_status = 'Deleted' WHERE id = '".$cat_id."'";
$send= $database->query($query);
		
		}


		}


		?>