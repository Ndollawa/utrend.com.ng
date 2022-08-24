<?php 
if(isset($_POST['update-ps'])){

	$category1 =  $database->escape_value($_POST['category1']);
	$category2 =  $database->escape_value($_POST['category2']);
	$category3 =  $database->escape_value($_POST['category3']);
	$category4 =  $database->escape_value($_POST['category4']);
	$category6 =  $database->escape_value($_POST['category6']);
	$category7 =  $database->escape_value($_POST['category7']);
	$category8 =  $database->escape_value($_POST['category8']);
	$postperpage = $database->escape_value($_POST['postperpage']);
	
$sql = "UPDATE homepage_post SET postcategory1 = '$category1', postcategory2 = '$category2', postcategory3 = '$category3', postcategory4 = '$category4', postcategory6 = '$category6', postcategory7 = '$category7', postcategory8 = '$category8', postPerPage ='$postperpage' WHERE id = 1 ";
$send = $database->query($sql);
if($send){
	$message = '<h4 style="margin:10px  10px; padding:5px;" class="alert alert-success"><center>  Record updated successfully <i class=" icon-holder material-icons f-left" style="color:white;">done_all</i></center></h4>';
         header('Location:site-setting.php?tab=Posts') ;    
      }
  }



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
				$postPerPage = $row['postPerPage'];
			 $post_categories= array($postcategory1,$postcategory2,$postcategory3,$postcategory4,$postcategory5,$postcategory6,$postcategory7,$postcategory8);
			// print_r($post_categories);
			}

?>											
							<form class="card" method="post"  name="ps-form" >
										<div class="card-header"> 
											<h3 class="card-title">Post Settings</h3> 
											<!-- <div class="card-options"> 
												<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div>  -->
											</div> 
											<div class="card-body">
											<h6><em>Home Page Post Categories</em> </h6> 
										<div class="row">
											<div class="col-md-6"> 
												<div class="form-group"> 
													<label class="form-label">Category 1</label><select class="form-control input-height" name="category1" value="">
														<option value="<?php echo $postcategory1; ?>"><?php if (isset($postcategory1)){echo $postcategory1;}else{ 
															echo 'Select...';} ?></option>
														<?php 
			$query = "SELECT * FROM categories WHERE category_status ='Active'";
$send = $database->query($query);
$row = $database->fetch_array($end);
foreach ($send as $row) {
	if(!in_array($row['category_title'],$post_categories)){
echo '<option value="'.$row['category_title'].'">'.$row['category_title'].'</option>';
}}
?>
													</select>  
												</div> 
											</div> 
										<div class="col-md-6"> 
												<div class="form-group"> 
													<label class="form-label">Category 2</label><select class="form-control input-height" name="category2" value="">
														<option value="<?php echo $postcategory2; ?>"><?php if (isset($postcategory2)){echo $postcategory2;}else{ 
															echo 'Select...';} ?></option>
														<?php 
			$query = "SELECT * FROM categories WHERE category_status ='Active'";
$send = $database->query($query);
$row = $database->fetch_array($end);
foreach ($send as $row) {
	if(!in_array($row['category_title'],$post_categories)){
echo '<option value="'.$row['category_title'].'">'.$row['category_title'].'</option>';
}}
?>
													</select>  
												</div> 
											</div> 	 		
									<div class="col-md-6"> 
												<div class="form-group"> 
													<label class="form-label">Category 3</label><select class="form-control input-height" name="category3" value="">
														<option value="<?php echo $postcategory3; ?>"><?php if (isset($postcategory3)){echo $postcategory3;}else{ 
															echo 'Select...';} ?></option>
														<?php 
			$query = "SELECT * FROM categories WHERE category_status ='Active'";
$send = $database->query($query);
$row = $database->fetch_array($end);
foreach ($send as $row) {
	if(!in_array($row['category_title'],$post_categories)){
echo '<option value="'.$row['category_title'].'">'.$row['category_title'].'</option>';
}}
?>
													</select>  
												</div> 
											</div> 
										<div class="col-md-6"> 
												<div class="form-group"> 
													<label class="form-label">Category 4</label><select class="form-control input-height" name="category4" value="">
														<option value="<?php echo $postcategory4; ?>"><?php if (isset($postcategory4)){echo $postcategory4;}else{ 
															echo 'Select...';} ?></option>
														<?php 
			$query = "SELECT * FROM categories WHERE category_status ='Active'";
$send = $database->query($query);
$row = $database->fetch_array($end);
foreach ($send as $row) {
	if(!in_array($row['category_title'],$post_categories)){
echo '<option value="'.$row['category_title'].'">'.$row['category_title'].'</option>';
}}
?>
													</select>  
												</div> 
											</div> 
										<div class="col-md-6"> 
												<div class="form-group"> 
													<label class="form-label">Category 6</label><select class="form-control input-height" name="category6" value="">
														<option value="<?php echo $postcategory6; ?>"><?php if (isset($postcategory6)){echo $postcategory6;}else{ 
															echo 'Select...';} ?></option>
														<?php 
			$query = "SELECT * FROM categories WHERE category_status ='Active'";
$send = $database->query($query);
$row = $database->fetch_array($end);
foreach ($send as $row) {
	if(!in_array($row['category_title'],$post_categories)){
echo '<option value="'.$row['category_title'].'">'.$row['category_title'].'</option>';
}}
?>
													</select>  
												</div> 
											</div> 
										<div class="col-md-6"> 
												<div class="form-group"> 
													<label class="form-label">Category 7</label><select class="form-control input-height" name="category7" value="">
														<option value="<?php echo $postcategory7; ?>"><?php if (isset($postcategory7)){echo $postcategory7;}else{ 
															echo 'Select...';} ?></option>
														<?php 
			$query = "SELECT * FROM categories WHERE category_status ='Active'";
$send = $database->query($query);
$row = $database->fetch_array($end);
foreach ($send as $row) {
	if(!in_array($row['category_title'],$post_categories)){
echo '<option value="'.$row['category_title'].'">'.$row['category_title'].'</option>';
}}
?>
													</select>  
												</div> 
											</div> 
									<div class="col-md-6"> 
												<div class="form-group"> 
													<label class="form-label">Category 8</label><select class="form-control input-height" name="category8" value="">
														<option value="<?php echo $postcategory8; ?>"><?php if (isset($postcategory8)){echo $postcategory8;}else{ 
															echo 'Select...';} ?></option>
														<?php 
			$query = "SELECT * FROM categories WHERE category_status ='Active'";
$send = $database->query($query);
$row = $database->fetch_array($end);
foreach ($send as $row) {
	if(!in_array($row['category_title'],$post_categories)){
echo '<option value="'.$row['category_title'].'">'.$row['category_title'].'</option>';
}}
?>
													</select>  
												</div> 
											</div> 
												<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Post Per Page</label> <input type="number" class="form-control" name="postperpage" value="<?php echo $postPerPage; ?>"/> 
													</div> 
												</div> 
											<!-- 	<div class="col-sm-6 col-md-4"> 
													<div class="form-group"> 
														<label class="form-label">Facebook Link</label> <input type="text" class="form-control" name="fblink" value="<?php echo $facebooklink; ?>" placeholder="http://facebook.com/username"/> 
													</div> 
												</div>  -->
														 </div> 
													<div class="card-footer text-center"> 
													<button type="submit"  name="update-ps" class="btn btn-success">Update</button> </div>	
											
												
												</div> 
											</form> 
							