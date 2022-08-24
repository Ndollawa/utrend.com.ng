<?php 
use unicalCSphp\UploadFile;
$msg ="";
$Fname= array();
$result= array();
 $message= "";

include '../backend/database.php';
include '../backend/timeAgo.php';
include'../backend/functions.php';
session_start();
ob_start();
// if(isset($_POST['action'])){
//   if($_POST['action'] == 'upload-file'){
require_once '../admin/src/unicalCSphp/UploadFile.php';
  $destination = '../assets/images/comment/';
  // $max = 2000*1024;
try{
      $upload = new UploadFile($destination);
      $upload->setMaxSize('');
      $upload->allowAllTypes('');
      $upload->upload();
      $result=$upload->getMessages();
      $Fname=$upload->getName();
      $FTname=$upload->getFTname();
      $FType=$upload->getFType();
    }catch(Exception $e){
    $result[]=$e->getMessage();
    // $Fname[]= $e->getMessage();
    }
foreach ($result as $key){
           $msg = $key;   
            } 
foreach ($Fname as $key){
        echo  json_encode(array('location' => $destination.$key));
            } 
// }
// }
?>