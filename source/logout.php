<?php
session_start();
	unset($_SESSION['user_id'] );
 	unset($_SESSION['username'] );
  	unset($_SESSION['user_account_type'] );
  	unset($_SESSION['fullname']);
 	unset($_SESSION['user_image'] );
  	unset($_SESSION['user_role'] );
  	session_destroy();
  	session_write_close();
    header("Location:../index.php");
    exit();
?>