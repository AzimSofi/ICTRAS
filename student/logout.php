<?php
include("include/connection.php");

session_start();
session_destroy();

date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );

$query = "update userlog  set logout = ? WHERE matric = ? ORDER BY id DESC LIMIT 1;";
$stmt = $connect->prepare($query);
$stmt->bindParam(1,$ldate);
$stmt->bindParam(2,$matric);
$stmt->execute();
$stmt->closeCursor();


header("location:../index.php");


exit;
?>
