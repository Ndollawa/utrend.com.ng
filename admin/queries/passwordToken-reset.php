<?php include '../backend/database.php'; ?>
<?php include '../backend/timeAgo.php'; ?>
<?php include '../backend/functions.php'; 

if(isset($_POST['action'])){
if($_POST['action']=== 'deletePasswordResetToken'){
    $sql  = "SELECT * FROM password_reset ";
      $result= $database->query ($sql);
$row = $database->fetch_array($result);
			if($row>0){
				foreach ($result as $row) {
			$_SESSION['user_id']= $user_id = $row['user_id'];
			$token = $row['token'];
			$date_requested = $row['date_requested'];
			$resetid = $row['id'];
$dbtimestamp = strtotime($date_requested);
if (time() - $dbtimestamp > 15 * 60) {
     $sql2  = "DELETE FROM password_reset WHERE id = $resetid ";
      $result2= $database->query ($sql2);
      
            }
        }
			 
	}

}
}
?>