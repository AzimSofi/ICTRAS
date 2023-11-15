<?php
session_start();
error_reporting(0);
include("../include/connection.php");
include("include/functions.php");


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Add New Courses</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>

  <div class="content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-head-line"><P style="color:#189D9A">New Courses<p></h1>
          </div>
        </div>

        <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
        <div class=" container">
          <form action="editcourses.php" method="post">
            <div class="row">
              <div class="col-md-6">
                <input type="text" Name="university" placeholder="Institutions Name" required class="form-control"><hr>
                <input type="text" Name="programme" placeholder="Matric Number" required  class="form-control" ><hr>
                <input type="text" Name="coursecode" placeholder="New Course Code " required class="form-control"><hr>
                <input type="text" Name="programme" placeholder="Eg. Electrical and Computer information Engineering" required  class="form-control"><hr>
                <input type="text" Name="ecoursecode" placeholder="Endorsed Corse Code" required  class="form-control"><hr>
                <select name="department" id="department" class="form-control">
          					<option value="CIE">CIE</option>
          					<option value="CIV">CIV</option>
          					<option value="MECH">MECH</option>
          					<option value="COMM">COMM</option>
                    <option value="BIO">BIO</option>
                    <option value="AERO">AERO</option>
                    <option value="MANU">MANU</option>
        				</select><hr>
                <input type="text" Name="status" placeholder="Status" required class="form-control"><hr>
                <button type="submit" name="add" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Add</button>&nbsp; <hr>
                <a href="ecourse.php"  class="btn btn-primary">Back</a>
              </div>

            </form>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  if(isset($_POST['add']))
  {
    $university=$_POST['university'];
    $programme=$_POST['programme'];
    $coursecode=($_POST['coursecode']);
    $ecoursecode=$_POST['ecoursecode'];
    $department=($_POST['department']);
    $status=$_POST['status'];

    $query = "inset into ictras.ecourses (?,?,?,?,?,?) ;";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(1,$university);
    $stmt->bindParam(2,$programme);
    $stmt->bindParam(3,$coursecode);
    $stmt->bindParam(4,$ecoursecode);
    $stmt->bindParam(5,$department);
    $stmt->bindParam(6,$status);
    $check_submit =$stmt->execute();
    $stmt->closeCursor();

    if (isset($check_submit))
    {
      header('location:ecourse.php');
    }
    else{
      echo '<div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">please insert valid information</div>';
    }


  }

  ?>
  <?php include('includes/footer.php');?>
  <script src="assets/js/jquery-1.11.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>
