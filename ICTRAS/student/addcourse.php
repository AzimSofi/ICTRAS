<?php
ob_start();
error_reporting(0);
include("include/connection.php");
include("include/functions.php");

if ($_SESSION['matric']) {

  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
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
            <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php"><img src=images/logo.png alt="lOGO" width="50" height="60"> I-CTRAS</a>
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


      <div class="span9">
        <div class="content">

          <center><div class="module">
            <div class="module-head">
              <h3>Add Courses</h3>
            </div>
            <div class="module-body">


              <br >

              <form class="form-horizontal row-fluid" action="addcourse.php" method="post">


                <div class="control-group">
                  <label class="control-label" for="coursecode"><b>Course Code</b></label>
                  <div class="controls">
                    <input type="text" id="coursecode" name="coursecode" class="span9" >
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="coursename"><b>Course Name</b></label>
                  <div class="controls">
                    <input type="text" id="coursename" name="coursename" class="span9" >

                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="credithr"><b>Credit Hours</b></label>
                  <div class="controls">
                    <input type="text" id="credithr" name="credithr" class="span9" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="grade"><b>Grade</b></label>
                  <div class="controls">
                    <input type="text" id="grade" name="grade" class="span9" >
                  </div>
                </div>


                <div class="control-group">
                  <div class="controls">
                    <button type="submit" name="add"class="btn btn-primary ">Add Course</button>
                    <a href="application.php" class="btn btn-primary" role = "button">Cancel</a>
                  </div>
                </div>
              </form>

              <?php


              if(isset($_POST['add']))
              {
                $matric = $_SESSION['matric'];
                $coursecode=$_POST['coursecode'];
                $coursename=$_POST['coursename'];
                $credithr=$_POST['credithr'];
                $grade=$_POST['grade'];


                $query =  "insert into ictras.coursereq (matric,coursecode,coursename,credithr,grade)
                values (?,?,?,?,?)";


                $stmt = $connect->prepare($query);
                $stmt->bindParam(1,$matric);
                $stmt->bindParam(2,$coursecode);
                $stmt->bindParam(3,$coursename);
                $stmt->bindParam(4,$credithr);
                $stmt->bindParam(5,$grade);
                $check_submit = $stmt->execute();
                $stmt->closeCursor();

                //
                $query2 = "insert into ictras.status (matric,coursecode,approval)
                values (?,?,?)";

                $stmt = $connect->prepare($query2);
                $stmt->bindParam(1,$matric);
                $stmt->bindParam(2,$coursecode);
                $stmt->bindParam(3,$approval='0');
                $check_submit = $stmt->execute();
                $stmt->closeCursor();

                if(isset($check_submit)){
                  echo "ade dalam submit";
                  echo "<script type='text/javascript'>
                  alert('Success');
                  window.location.href = 'application.php';
                  </script>";

                }
                else
                {//echo $con->error;
                  echo "<script type='text/javascript'>alert('Error')</script>";
                }
              }
              ?>


            </div>
          </div>
        </div><!--/.content-->
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

  <?php
  }
  ?>
