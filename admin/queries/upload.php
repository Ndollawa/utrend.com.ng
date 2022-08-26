
  <?php
  include 'backend/database.php';
  include 'backend/functions.php';
  session_start();
  ob_start();
  
   $uploadDetails= array();
  $destination = '../assets/images/comment/';
    $file_obj =	uploadfile2($destination,'',(99927680),'');
    
        $file = json_decode($file_obj);
        $uploadstatus = $file[0];
         $file_type = $file[3];
           $count = count($file[2]) ;
  for ($i=0; $i <$count; $i++) {
    if($uploadstatus !== "Error"){
       $file_up = $database->escape_value($file[2][$i]);
      $file_type = $database->escape_value($file[3][$i]);
  
          echo  json_encode(array('location' => $destination.$file_up));
            
  }
  }
  ?>
