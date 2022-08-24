<?php require 'webcomponents/admin-header.php'; ?>
<?php require 'webcomponents/admin-sidebar.php'; ?>
<?php
if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:../index.php");
  exit();
}elseif($_SESSION['account_type'] != "Admin" && $_SESSION['user_role'] != "Administrator"){
					header ("location:../source/500.php");
					exit();}
					?>
<div class="side-app">
	<div class="page-header">
						 			<h4 class="page-title">Deleted Users</h4>
						 			<ol class="breadcrumb">
						 				<li class="breadcrumb-item"><a href="#">Recycle Bin</a></li>
						 				<li class="breadcrumb-item active" aria-current="page">Users</li>
						 			</ol>
						 		</div>

				 	<div class="row">
				 		<div class="col-lg-12">
				 			<div class="card">
				 				<div class="card-header">
				 					<div class="card-title">Tools</div>
				 					<!-- <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fa fa-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fa fa-times"></i></a>
				 					</div> -->
				 				</div>

						 	<div class="row">
								<div class="col-sm- 12 col-md-12">
					 				<div class="card-body">

					 					<div class="table-responsive table-scrollable">
					 						<form action="" method="post" id="deletedUserdisTable">
												<table class="table table-bordered table-hover table-checkable order-column valign-middle border mb-0 align-items-centerid" id="all_deletedUsersTable">
					 							<div class="bulkoptions-container">
					 								<div class="row" >
															<div class="col-md-6 col-sm-6 col-6">
																<div class="btn-group " style="margin: 5px 0px;">
																	<a href="all-users.php"
																		class="btn btn-info">
																		View all users <i class="si si-people"></i>
																	</a>
																</div>

											</div><div class="col-md-6 col-sm-6 col-6 pull-right">
												<select class="form-control bulkoptions-container-tools" name="bulk-options" style="width: 200px; margin: 5px 0px;">
														<option value="">Select Options</option>
														<option value="Restore">Restore</option>
														<option value="Delete Permanently">Delete Permanently</option>
													</select>	<div class="bulkoptions-container-tools" style="margin: 5px 0px;">
											<input type="submit" class="btn btn-success" name="checkbox-submit" value="Apply">
										</div>
															</div>

					 							</div>
							 							<thead>
							 						<tr>
							 							<th><input type="checkbox" id="selectAll" name="selectAll"></th>
							 							<th><strong> Id</strong></th>
							 							<th><strong> Profile Image</strong></th>
							 							<th><strong> Username</strong></th>
							 							<th><strong> Name</strong></th>
							 							<th><strong> User Email</strong></th>
							 							<th><strong> Account Status</strong></th>
							 							<th><strong> Account Type</strong></th>
							 							<th><strong> User Role</strong></th>
							 							<th><strong> Posts Created</strong></th>
							 							<th><strong> Posts Published</strong></th>
							 							<th><strong>Account Created</strong></th>

							 							<th><strong> Actions</strong></th>

							 						<!--
							 							<th><strong> Actions</strong></th>
							 							<th><strong> Actions</strong></th>
							 							 -->
							 						</tr>
							 						</thead>
							 						<tbody id="deletedUsersTableData">


																
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
