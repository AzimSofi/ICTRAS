<table class="table" id = "tables">
  <thead>
    <tr>
      <th width="25%">Course Code</th>
      <th width="40%">Course name</th>
      <th width="5%">Credit Hours</th>
      <th width="5%">Grade Obtained</th>
      <th width="25%">Status</th>

    </tr>
  </thead>
  <tbody>

<?php
include("include/connection.php");

$matric = $_POST['matric'];

// $sql="select * from ictras.coursereq where matric ='$matric' order by coursename ASC";
// $result=$con->query($sql);
// $sql1=" select approval from ictras.status where coursecode = $coursecode";

$query = "select a.coursecode, a.coursename, a.credithr, a.grade, b.approval
          from ictras.coursereq a Inner join ictras.status b
          on a.coursecode = b.coursecode and a.matric = b.matric
          where a.matric = ? order by b.approval DESC;";
$stmt = $connect->prepare($query);
$stmt->bindParam(1,$matric);
$stmt->execute();
$courseList_ = $stmt->fetchAll();
$stmt->closeCursor();
// print_r($courseList_);



foreach($courseList_ as $row)
{
  $coursecode =$row['coursecode'];
  $coursename=$row['coursename'];
  $credithr=$row['credithr'];
  $grade=$row['grade'];
  $permission = '1';

?>
    <tr>
      <td><?php echo $coursecode  ?></td>
      <td><?php echo $coursename ?></td>
      <td><?php echo $credithr ?></td>
      <td><?php echo $grade ?></td>
      <td><center>

      <?php  if($row['approval']=='1')
        {   $permission += '1';
            ?>
        <a href="#" class="btn btn-success btn-xs">Accepted</a>
      <?php } elseif ($row['approval']=='0')
        { $permission *= '0';
          ?>
        <a href="#" class="btn btn-primary btn-xs">Pending</a>
      <?php } elseif ($row['approval']=='2')
        {  $permission += '1';
        ?>
        <a href="#" class="btn btn-danger btn-xs">Rejected</a>
      <?php
        } ?>

        <!-- <button class="btn btn-danger" id='refreshbtn' onclick="refreshTable(); event.preventDefault();">Refresh</button> -->
      </center></td>
  <?php
}    ?>



    </tbody>
  </table>
