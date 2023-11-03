<?php
ob_start();
error_reporting(0);
include("include/connection.php");
include("include/functions.php");

$matric = $_SESSION['matric'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>I-CTRAS</title>
  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link type="text/css" href="assets/css/theme.css" rel="stylesheet">
  <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
  rel='stylesheet'>

</head>
<body>
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
                  <!--li><a href="#">Edit Profile</a></li>
                  <li><a href="#">Account Settings</a></li-->
                  <li class="divider"></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.nav-collapse -->
        </div>
      </div>
      <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="span3">
            <div class="sidebar">
              <ul class="widget widget-menu unstyled">
                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                </a></li>
                <li><a href="application.php"><i class="menu-icon icon-inbox"></i>Application</a>
                </li>
                <li><a href="status.php"><i class="menu-icon icon-tasks"></i>Status</a></li>
                <li><a href="printapplication.php"><i class="menu-icon icon-list"></i>Print Out</a></li>
              </ul>
              <ul class="widget widget-menu unstyled">
                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
              </ul>
            </div>
            <!--/.sidebar-->
          </div>
          <div class="span9">
            <div class="module">
              <div class="module-head">
                <label for="studentname"> <b>LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER</b></label>
              </div>
              <div class="module-body">

                <div id='courseReq'></div>

                <center>
                            <a href="printapprove.php" class="btn btn-primary btn-xs">Print</a>

                            <!-- <a href="#" class="btn btn-danger btn-xs">Print</a> -->

                          
                  </center>
              </div>
            </div>
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
<script>
var matric = <?php echo $matric ?>;

              // call function to load course table list
loadCourseTable();

              // initiate load course table list function
function loadCourseTable(){
  $('#courseReq').load("coursereqtable.php",{
      matric: matric
        });
    }

              // call refresh table function when click refresh button
function refreshTable(){
    loadCourseTable();
          }

</script>
</html>
