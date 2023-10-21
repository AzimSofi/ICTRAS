<?php session_start();
require_once("includes/config.php");
if(isset($_POST["coursecodeee"]))
{
  $coursecodeee = $_POST["coursecodeee"];
  $coursetitlee = $_POST["coursetitlee"];
  $credithourss = $_POST["credithourss"];
  $gradeobtainedd = $_POST["gradeobtainedd"];
  $coursecodeeee = $_POST["coursecodeeee"];
  $query = '';
  for($count = 0; $count<count($coursecodeee); $count++)
  {
    $coursecodeee_clean = mysqli_real_escape_string($con, $coursecodeee[$count]);
    $coursetitlee_clean = mysqli_real_escape_string($con, $coursetitlee[$count]);
    $credithourss_clean = mysqli_real_escape_string($con, $credithourss[$count]);
    $gradeobtainedd_clean = mysqli_real_escape_string($con, $gradeobtainedd[$count]);
    $coursecodeeee_clean = mysqli_real_escape_string($con, $coursecodeeee[$count]);
    if($coursecodeee_clean != '' && $coursetitlee_clean != '' && $credithourss_clean != '' && $gradeobtainedd_clean != '' && $coursecodeeee_clean != '')
    {
      $query .= '
      INSERT INTO itemm(coursecodeee, coursetitlee, credithourss, gradeobtainedd, coursecodeeee)
      VALUES("'.$coursecodeee_clean.'", "'.$coursetitlee_clean.'", "'.$credithourss_clean.'", "'.$gradeobtainedd_clean.'", "'.$coursecodeeee_clean.'");
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
