<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME','ictras');

$servername = 'localhost';
$dbname ='ictras';
$username ='root';
$password ='';

//Create connection
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$connect = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
