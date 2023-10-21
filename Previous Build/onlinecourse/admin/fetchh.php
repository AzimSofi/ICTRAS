<?php
session_start();
include('includes/config.php');
$output = '';
$query = "SELECT * FROM item ORDER BY item_id DESC";
$result = mysqli_query($connect, $query);
$output = '';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["coursecode"].'</td>
  <td>'.$row["coursetitle"].'</td>
  <td>'.$row["credithours"].'</td>
  <td>'.$row["gradeobtained"].'</td>
  <td>'.$row["coursecodee"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>