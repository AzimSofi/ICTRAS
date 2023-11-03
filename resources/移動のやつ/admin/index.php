<?php
session_start();
error_reporting(0);
include("../include/connection.php");
include("include/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>

  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link type="text/css" href="assets/css/theme.css" rel="stylesheet">
  <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
  rel='stylesheet'>

</head>
<body>
<!-- navbar -->
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
          <i class="icon-reorder"></i></a><a class="brand" href="index.php"><img src=images/logo.png alt="lOGO" width="50" height="60"> I-CTRAS</a>
          <div class="nav-collapse collapse navbar-inverse-collapse">
            <ul class="nav pull-right">
              <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="images/profile3.png" class="nav-avatar" />
                <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="index.php">Your Profile</a></li>
                  <li class="divider"></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<!-- navbar close -->
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <!--/.sidebar-->
          <div class="span3">
            <div class="sidebar">
              <ul class="widget widget-menu unstyled">
                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home</a></li>
                <li><a href="userlog.php"><i class="menu-icon icon-book"></i>Userlog</a></li>
                <li><a href="History.php"><i class="menu-icon icon-book"></i>History</a></li>
                <li><a href="userlog.php"><i class="menu-icon icon-book"></i>User Assigments </a></li>
                <li><a href="ecourse.php" target="_blank" rel="noopener noreferrer"><i class="menu-icon icon-book"></i>Endorsed Courses</a></li>
                <li><a href="student.php"><i class="menu-icon icon-tasks"></i>Student Management</a></li>
                <li><a href="printselect.php"><i class="menu-icon icon-list"></i>Print Out</a></li>
              </ul>
              <ul class="widget widget-menu unstyled">
                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
              </ul>
            </div>
          </div>
          <div class="span9">
            <center>
              <div class="card" style="width: 50%;">
                <img class="card-img-top" src="images/profile2.png" alt="Card image cap">
                <div class="card-body">

                  <?php
                  $matric = $_SESSION['matric'];
                  $sql="select * from user where matric='$matric'";
                  $result=$con->query($sql);
                  $row=$result->fetch_assoc();

                  $name=$row['name'];
                  $department=$row['department'];
                  $email=$row['email'];
                  $semester=$row['semester'];
                  ?>
                  <i>
                    <h1 class="card-title"><center><?php echo $name ?></center></h1>
                    <br>
                    <p><b>Email : </b><?php echo $email ?></p>
                    <br>
                    <p><b>Matric No: </B><?php echo $matric ?></p>
                    <br>
                    <p><b>Department: </b><?php echo $department ?></p>
                    <br>
                    <p><b>Semester: </b><?php echo $semester ?></p>
                    </b>
                  </i>
                </div>
              </div>
              <br>
              <a href="editprofile.php" class="btn btn-primary">Edit Details</a>
            </center>
          </div>
        </div>
      </div>
    </div>






</body>

<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="scripts/common.js" type="text/javascript"></script>



</html>
