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
        <div class="module">
          <div class="module-head">
            <h3>INFORMATION ON PREVIOUS INSTITUTION</h3>
          </div>
          <div class="module-body">


            <form class="form-horizontal row-fluid" method="post">

              <div class="control-group">
                <label class="control-label" for="uniname"><b>Name of Institutions:</b></label>
                <div class="controls">
                  <input type="text" id="uniname" name="uniname"  class="span12" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="diplomaname"><b>Name of Diploma (for transfer students):</b></label>
                <div class="controls">
                  <input type="text" id="diplomaname" name="diplomaname" placeholder="if from diploma if not leave empty" class="span12" >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="degreename"><b>Name of Degree:</b></label>
                <div class="controls">
                  <input type="text" id="degreename" name="degreename" placeholder="if from degree if not leave empty" class="span12">
                </div>
              </div>


              <div class="control-group">
                <label class="control-label" for="yearstudy"><b>Year of Study:</b></label>
                <div class="controls">
                  <input type="text" id="yearstudy" name="yearstudy"  class="span12" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="reason"><b>Reason for leaving:</b></label>
                <div class="controls">
                  <input type="text" id="reason" name="reason"  class="span12" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="CGPA"><b>Highest Qualification &amp; CGPA (where applicable):</b></label>
                <div class="controls">
                  <input type="text" id="CGPA" name="CGPA"  class="span12" required>
                </div>
              </div>

              <div class="control-group">
                <div class="controls">
                  <button type="submit" name="update"class="btn btn-primary"><center>Add Details</center></button>

                </div>
              </div>
            </form>
            <?php
            if(isset($_POST['update']))
            {
              $matric = $_SESSION['matric'];
              $uniname=$_POST['uniname'];
              $diplomaname=$_POST['diplomaname'];
              $degreename=$_POST['degreename'];
              $yearstudy=$_POST['yearstudy'];
              $reason=$_POST['reason'];
              $CGPA=$_POST['CGPA'];


              // $sql1="insert into ictras.prevuni (uniname,matric,diplomaname,degreename,yearstudy,reason,CGPA)
              // values ('$uniname','$matric','$diplomaname','$degreename','$yearstudy','$reason','$CGPA') ";

              $query = "insert into ictras.prevuni (uniname,matric,diplomaname,degreename,yearstudy,reason,CGPA)
              values (?,?,?,?,?,?,?)";

              if(empty($diplomaname)){
                $diplomaname = 'not applicable';
              }
              if(empty($degreename)){
                $degreename = 'not applicable';
              }

              $stmt = $connect->prepare($query);
              $stmt->bindParam(1,$uniname);
              $stmt->bindParam(2,$matric);
              $stmt->bindParam(3,$diplomaname);
              $stmt->bindParam(4,$degreename);
              $stmt->bindParam(5,$yearstudy);
              $stmt->bindParam(6,$reason);
              $stmt->bindParam(7,$CGPA);
              $check_submit = $stmt->execute();
              $stmt->closeCursor();

              if(isset($check_submit)){
                echo "ade dalam submit";
              // if($con->query($sql1) === TRUE){

                // if(empty($diplomaname)){
                //   $sql2="update ictras.prevuni set diplomaname = 'not applicable' ";
                //   $con->query($sql2);
                // }
                // if(empty($degreename)){
                //   $sql2="update ictras.prevuni set degreename = 'not applicable' ";;
                //   $con->query($sql2);
                // }

                echo "<script type='text/javascript'>
                alert('Success');
                window.location.href = 'application.php';
                </script>";
              }
              else
              {//echo $con->error;
                echo "<script type='text/javascript'>alert('Error');</script>";
              }
            }

            ?>

          </div>
        </div>

          
            <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
            <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="scripts/common.js" type="text/javascript"></script>

          </body>
          </html>

        <?php
      }
      ?>
