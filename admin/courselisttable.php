<table class="table" id = "tables">
  <thead>
    <tr>
      <th width="25%">Course Code</th>
      <th width="40%">Course name</th>
      <th width="5%">Credit Hours</th>
      <th width="5%">Grade Obtained</th>
      <th width="25%">Approval</th>

    </tr>
  </thead>
  <tbody>

<?php
include("../include/connection.php");

$matric = $_POST['matric'];

// $sql="select * from ictras.coursereq where matric ='$matric' order by coursename ASC";
// $result=$con->query($sql);
// $sql1=" select approval from ictras.status where coursecode = $coursecode";

$query = "select a.coursecode, a.coursename, a.credithr, a.grade, b.approval
          from ictras.coursereq a Inner join ictras.status b
          on a.coursecode = b.coursecode and a.matric = b.matric
          where a.matric = ? and b.approval = '0' order by a.coursename ASC;";
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

    ?>
    <tr>
      <td><?php echo $coursecode  ?></td>
      <td><?php echo $coursename ?></td>
      <td><?php echo $credithr ?></td>
      <td><?php echo $grade ?></td>
      <td><center>

        <button class="btn btn-success" id="approveBtn" onclick="approveAction('<?php echo $coursecode ?>','<?php echo $matric ?>'); event.preventDefault();">Approve</button>
        <button class="btn btn-danger" id="rejectBtn" onclick="rejectAction('<?php echo $coursecode ?>','<?php echo $matric ?>'); event.preventDefault();">Reject</button>
        <!-- <button class="btn btn-danger" id='refreshbtn' onclick="refreshTable(); event.preventDefault();">Refresh</button> -->
      </center></td>

      <?php  } ?>
    </tbody>
    </table>
