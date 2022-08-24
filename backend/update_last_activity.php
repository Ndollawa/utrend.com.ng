<?php
include '../database.php';
session_start();
$sql="
UPDATE session 
SET LAST_USER_ACTIVITY = now()
WHERE sessions = '".session_id()."'
";
$statement=$db->query($sql);
?>