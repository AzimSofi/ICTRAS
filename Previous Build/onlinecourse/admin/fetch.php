<?php
session_start();
include('includes/config.php');
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM data
  WHERE universities LIKE '%".$search."%'
  OR programme LIKE '%".$search."%' 
  OR department LIKE '%".$search."%' 
  OR coursecodeB LIKE '%".$search."%' 
  OR coursecodeA LIKE '%".$search."%'
  OR status LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM data ORDER BY id
 ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Universities</th>
     <th>Programme</th>
     <th>Department</th>
     <th>Course Code Before</th>
     <th>Course Code After</th>
     <th>Status</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["universities"].'</td>
    <td>'.$row["programme"].'</td>
    <td>'.$row["department"].'</td>
    <td>'.$row["coursecodeB"].'</td>
    <td>'.$row["coursecodeA"].'</td>
    <td>'.$row["status"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>


