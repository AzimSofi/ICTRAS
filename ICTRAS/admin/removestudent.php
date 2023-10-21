<?php
include("../include/connection.php");
$matric=$_POST['matric'];

$query = "delete from ictras.user where matric = ?;";
$stmt = $connect->prepare($query);
$stmt->bindParam(1,$matric);
$check_submit = $stmt->execute();
$stmt->closeCursor();


if(isset($check_submit)){
	echo 'SUCCESS';

}else{
	echo 'ERROR';
}



?>
