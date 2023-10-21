<?php
include("../include/connection.php");
$coursecode=$_POST['courseCode'];
$matric=$_POST['matric'];

$query = "update ictras.status set approval = '1' where matric = ? and coursecode = ?;";
$stmt = $connect->prepare($query);
$stmt->bindParam(1,$matric);
$stmt->bindParam(2,$coursecode);
$check_submit = $stmt->execute();
$stmt->closeCursor();

if(isset($check_submit)){
	echo 'SUCCESS';
}else{
	echo 'ERROR';
}



?>
