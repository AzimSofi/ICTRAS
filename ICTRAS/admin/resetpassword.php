<?php
include("../include/connection.php");

$matric=$_GET['id2'];

$query = "update ictras.user set password = 'reset' where matric = ?;";
$stmt = $connect->prepare($query);
$stmt->bindParam(1,$matric);

$check_submit = $stmt->execute();
$stmt->closeCursor();

if(isset($check_submit)){
	echo 'SUCCESS';
  header("Location: student.php");
}else{
	echo 'ERROR';
}



?>
