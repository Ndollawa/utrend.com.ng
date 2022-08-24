<?php require 'webcomponents/admin-header.php'; ?>
<?php require 'webcomponents/admin-sidebar.php'; ?>
<?php
ob_start();

if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:../index.php");
  exit();
}elseif($_SESSION['account_type'] != "Admin"){
					header ("location:../source/500.php");
					exit();}

?>
<div class="side-app"> 
 <div class="page-header"> 
						 			<h4 class="page-title">All Posts</h4>
						 			<ol class="breadcrumb"> 
						 				<li class="breadcrumb-item"><a href="#">View Posts</a></li> 
						 				<li class="breadcrumb-item active" aria-current="page">Post Tools</li> 
						 			</ol> 
						 		</div>

				 	<div class="row"> 
				 		<div class="col-lg-12"> 
				 			<div class="card"> 
				 				<div class="card-header"> 
				 					<div class="card-title">Tools</div> 
				 					<!-- <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fa fa-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fa fa-times"></i></a> 
				 					</div>  -->
				 				</div> 
				 		
						 	<div class="row">
								<div class="col-sm- 12 col-md-12">
					 				<div class="card-body">
					 						
					 					<div class="table-responsive table-scrollable"> 
					 						<form action="" method="post" id="postdisTable">

											<table class="table table-bordered table-hover table-checkable order-column valign-middle border mb-0 align-items-centerid " id="all_postTable"> 
					 							<div class="bulkoptions-container">
					 								<div class="row" >
															<div class="col-md-6 col-sm-6 col-6">
																<div class="btn-group " style="margin: 5px 0px;">
																	<a href="create-post.php" 
																		class="btn btn-info">
																		Add New <i class="si si-note"></i>
																	</a>
																</div>
										
											</div><div class="col-md-6 col-sm-6 col-6 pull-right">
												<select class="form-control bulkoptions-container-tools" name="bulk-options" style="width: 200px; margin: 5px 0px;">
														<option value="">Select Options</option>
														<option value="Published">Publish</option>
														<option value="Draft">	Draft</option>
														<option value="Deleted">Delete</option>
														<option value="Reset">Reset Post Views</option>
													</select>	<div class="bulkoptions-container-tools" style="margin: 5px 0px;">
											<input type="submit" class="btn btn-success" name="checkbox-submit" value="Apply">
										</div>
															</div>
										
					 							</div>
							 					<thead>
							 						<tr>
							 							<th><input type="checkbox" id="selectAll" name="selectAll"></th>
							 							<th><strong> Id</strong></th>
							 							<th><strong> Author</strong></th>
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
							 						<tbody id="postTableData" >					

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
	</div> 
<?php require 'webcomponents/admin-footer.php'; ?>
	<?php require 'webcomponents/admin-js.php';?>
</body>
</html>