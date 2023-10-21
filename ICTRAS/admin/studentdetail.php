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
  <title>Admin Student Detail </title>

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

    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="span3">
            <div class="sidebar">
              <ul class="widget widget-menu unstyled">
                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home</a></li>
                <li><a href="userlog.php"><i class="menu-icon icon-book"></i>Userlog </a></li>
                <li><a href="ecourse.php"><i class="menu-icon icon-book"></i>Endorsed Courses</a></li>
                <li><a href="student.php"><i class="menu-icon icon-tasks"></i>Student Management</a></li>
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
                <h3>INFORMATION ON PREVIOUS INSTITUTION</h3>
              </div>
              <div class="module-body">
                <br >

                <?php
                $matric = $_GET['id'];
                // $sql="select * from ictras.prevuni where matric ='$matric' order by uniname ASC";
                // $result=$con->query($sql);

                $query = "select * from ictras.prevuni where matric =? order by uniname ASC";
                $stmt = $connect->prepare($query);
                $stmt->bindParam(1,$matric);
                $stmt->execute();
                $infoPrevUni_ = $stmt->fetch();
                $stmt->closeCursor();
                // print_r($infoPrevUni_);


                $uniname=$infoPrevUni_['uniname'];
                $diplomaname=$infoPrevUni_['diplomaname'];
                $degreename=$infoPrevUni_['degreename'];
                $yearstudy=$infoPrevUni_['yearstudy'];
                $reason=$infoPrevUni_['reason'];
                $CGPA=$infoPrevUni_['CGPA'];
                ?>
                <label class="control-label" for="uniname"><b>Name of Institutions: <?php echo $uniname ?></b></label>
                <label class="control-label" for="diplomaname"><b>Name of Diploma (for transfer students): <?php echo $diplomaname ?></b></label>
                <label class="control-label" for="degreename"><b>Name of Degree: <?php echo $degreename ?></b></label>
                <label class="control-label" for="yearstudy"><b>Year of Study: <?php echo $yearstudy ?></b></label>
                <label class="control-label" for="reason"><b>Reason of Leaving: <?php echo $reason ?></b></label>
                <label class="control-label" for="CGPA"><b>CGPA:<?php echo $CGPA ?></b></label>
              </div>
            </div>


            <div class="module">
              <div class="module-head">
                <label for="studentname"> <b>LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER</b></label>
              </div>
              <div class="module-body">

                <div id='courseList'> </div>

              </div>
            </div>
          </div >
        </div>
      </div>
    </div>


    <!-- Default to the left -->
    <strong><a href="http://www.iium.edu.my/">International Islamic University Malaysia </a></strong>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="scripts/common.js" type="text/javascript"></script>

  </body>
  <script>
  var matric = <?php echo $matric ?>;

  // call function to load course table list
  loadCourseTable();

  // initiate load course table list function
  function loadCourseTable(){
    $('#courseList').load("courselisttable.php",{
      matric: matric
    });
  }

  // call refresh table function when click refresh button
  function refreshTable(){
    loadCourseTable();
  }

  // call this function when click approve button
  function approveAction(courseCode, matricNum){

    console.log(courseCode);
    $.ajax({
      url: 'approvecourse.php',
      type: 'post',
      data: {
        courseCode : courseCode,
        matric : matricNum
      },
      success: function(response){
        console.log(response);
        if(response == 'SUCCESS'){
          loadCourseTable();
        }else{
          alert('Action error, kindly contact system developer.')
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
        console.log(textStatus, errorThrown);
      }
    })

  }

  // call this function when click reject button
  function rejectAction(courseCode, matricNum){

    console.log(courseCode);
    $.ajax({
      url: 'rejectcourse.php',
      type: 'post',
      data: {
        courseCode : courseCode,
        matric : matricNum
      },
      success: function(response){
        console.log(response);
        if(response == 'SUCCESS'){
          loadCourseTable();
        }else{
          alert('Action error, kindly contact system developer.')
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
        console.log(textStatus, errorThrown);
      }
    })

  }

  // window.print();

  </script>



  </html>
