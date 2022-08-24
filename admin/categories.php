<?php require 'webcomponents/admin-header.php'; ?>
<?php require 'webcomponents/admin-sidebar.php'; ?>
<?php
if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:../index.php");
  exit();
}elseif($_SESSION['account_type'] != "Admin" && $_SESSION['user_role'] != "Administrator"){
					header ("location:../source/500.php");
				exit();				
			}elseif($_SESSION['account_type'] != "Admin" && $_SESSION['user_role'] != "Editor"){
					header ("location:../source/500.php");
				exit();				
			}

?>
	<div class="side-app">
			<div class="page-header"> 
						 			<h4 class="page-title">Categories</h4>
						 			<ol class="breadcrumb"> 
						 				<li class="breadcrumb-item"><a href="#">Categories</a></li> 
						 				<li class="breadcrumb-item active" aria-current="page">Category Tools</li> 
						 			</ol> 
						 		</div> 
				 	<div class="row"> 
				 		<div class="col-lg-12"> 
				 			<div class="card"> 
				 				<div class="card-header"> 
				 					<div class="card-title">Tools</div> 
				 					<!-- <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> 
				 					</div>  -->
				 				</div> 
				 	<div class="row">
						<div class="col-sm- 12 col-md-4">
			 				<div class="card-body"> 
			 					<form action="" method="post"  id="add-category">
			 					<div class="form-group">	
			 						<label for="cat-title"><strong> Add Category</strong></label>
			 						<input type="text" class="form-control" id="cat-title" name="cat-title" /></div>
			 					<div class="form-group">
			 						<button type="submit" class="btn btn-primary btn-default" id="create-category">Add Category</button></div>
			 					</form>

				 			</div>
					<div class="category-edit"></div>
				 		</div>
				 	<!-- </div> -->
					<!-- <div class="row"> -->
						<div class="col-sm- 12 col-md-8">
				 			<div class="card-body"> 
							 	<div class="table-responsive"> 
							 		<form action="" method="post" id="postdisTable">
									<table class="table table-bordered table-hover border mb-0 align-items-center"> 
										<?php 
if(isset($_POST['checkbox-submit'])){
	if(!empty($_POST['selectcategory'])){
$checkboxes = $_POST['selectcategory'];
	foreach ($checkboxes as $checkboxValue) {
$bulk_options = $_POST['bulk-options'];
$cat_id=$checkboxValue;

 switch ($bulk_options) {
 // 	case 'Active':
 // 		$sql =" WHERE id = $post_id ";
 // $send = $database->query($sql);

 // 		break;
 	case 'Deleted':
 		$sql =" UPDATE categories SET category_status = '{$bulk_options}' WHERE id = $cat_id ";
 		$send = $database->query($sql);
 		break;
 	
 	default:
 		# code...
 		break;

 }

}

}
}
?>

										<div class="bulkoptions-container">
					 								<div class="row" >
															<div class="col-md-6 col-sm-6 col-6">
																<div class="btn-group " style="margin: 5px 0px;">
																	<a href="category-recyclebin.php" 
																		class="btn btn-danger" title="Delete">
																		Recyce Bin <i class="fa fa-trash"></i>
																	</a>
																</div>
										
											</div><div class="col-md-6 col-sm-6 col-6 pull-right">
												<select class="form-control bulkoptions-container-tools" name="bulk-options" style="width: 150px; margin: 5px 0px;">
														<option value="">Select Options</option>
														<!-- <option value="Active">Restore</option> -->
														<option value="Deleted">Delete</option>
													</select>	<div class="bulkoptions-container-tools" style="margin: 5px 0px;">
											<input type="submit" class="btn btn-success" name="checkbox-submit" value="Apply">
										</div>
															</div>
										
					 							</div>

					 					<thead>
					 						<tr>
					 							<th><input type="checkbox" id="selectAll" name="selectAll"></th>
					 							<th><strong> Id</strong></th>
					 							<th><strong> Category Title</strong></th>
					 							<th><strong> Actions</strong></th>
					 							
					 						</tr> 
					 						</thead> 
					 						<tbody class=" catTable">
					 						</tbody>
							 		</table>
							 	</form>
							 	</div>
							  </div> 
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