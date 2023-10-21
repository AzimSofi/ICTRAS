<?php session_start();
require_once("includes/config.php");
if(isset($_POST["coursecode"]))
{
 $coursecode = $_POST["coursecode"];
 $coursetitle = $_POST["coursetitle"];
 $credithours = $_POST["credithours"];
 $gradeobtained = $_POST["gradeobtained"];
 $coursecodee = $_POST["coursecodee"];
 $status = $_POST["status"];
 $query = '';
 for($count = 0; $count<count($coursecode); $count++)
 {
  $coursecode_clean = mysqli_real_escape_string($con, $coursecode[$count]);
  $coursetitle_clean = mysqli_real_escape_string($con, $coursetitle[$count]);
  $credithours_clean = mysqli_real_escape_string($con, $credithours[$count]);
  $gradeobtained_clean = mysqli_real_escape_string($con, $gradeobtained[$count]);
  $coursecodee_clean = mysqli_real_escape_string($con, $coursecodee[$count]);
  $status_clean = mysqli_real_escape_string($con, $status[$count]);
  if($coursecode_clean != '' && $coursetitle_clean != '' && $credithours_clean != '' && $gradeobtained_clean != '' && $coursecodee_clean != '' && $status_clean != '')
  {
   $query .= '
   INSERT INTO item(coursecode, coursetitle, credithours, gradeobtained, coursecodee, status) 
   VALUES("'.$coursecode_clean.'", "'.$coursetitle_clean.'", "'.$credithours_clean.'", "'.$gradeobtained_clean.'", "'.$coursecodee_clean.'", "'.$status_clean.'" ); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($con, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>