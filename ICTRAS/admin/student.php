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
    <title>Student Management </title>
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
                  <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home</a></li>
                  <li><a href="userlog.php"><i class="menu-icon icon-book"></i>Userlog </a></li>
                  <li><a href="ecourse.php"><i class="menu-icon icon-book"></i>Endorsed Courses</a></li>
                  <li><a href="student.php"><i class="menu-icon icon-tasks"></i>Student Management</a></li>
                  <li><a href="printapplication.php"><i class="menu-icon icon-list"></i>Print Out</a></li></ul>
                  <ul class="widget widget-menu unstyled">
                    <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                  </ul>
                </div>
                <!--/.sidebar-->
              </div>
              <!--/.span3-->

              <div class="span9">
                <form class="form-horizontal row-fluid" action="student.php" method="post">
                  <div class="control-group">
                    <label class="control-label" for="Search"><b>Search:</b></label>
                    <div class="controls">
                      <input type="text" id="name" name="name" placeholder="Enter Name/Matric Number of Student" class="span8" required>
                      <button type="submit" name="submit"class="btn">Search</button>
                    </div>
                  </div>
                </form>
                <br>
                <?php
                if(isset($_POST['submit']))
                {  $s=$_POST['name'];

              
                  $query = "select * from ictras.user where (matric like ''%$s%'' or name like '%$s%') and (matric<>'121212'or name <>'ADMIN');";
                  $stmt = $connect->prepare($query);
                  $stmt->execute();
                  $userreqlist = $stmt->fetchAll();
                  $stmt->closeCursor();
                }
                else{
                  $query = "select * from ictras.user where matric<>'121212';";
                  $stmt = $connect->prepare($query);
                  $stmt->execute();
                  $userreqlist = $stmt->fetchAll();
                  $stmt->closeCursor();
                }



                  ?>
                  <table class="table" id = "tables">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Matric No.</th>
                        <th>Email </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($userreqlist as $row)
                      {
                        $email=$row['email'];
                        $name=$row['name'];
                        $matric=$row['matric'];

                          ?>
                          <tr>
                            <td><?php echo $name  ?></td>
                            <td><?php echo $matric ?></td>
                            <td><?php echo $email ?></td>
                            <td><center>

                              <a href="studentdetail.php?id=<?php echo $matric; ?>"  class="btn btn-success">Details</a>
                              <button class="btn btn-danger" id="deleteBtn" onclick="deleteAction('<?php echo $matric ?>');event.preventDefault();">Remove</button>
                              <a href="resetpassword.php?id2=<?php echo $matric; ?>"  class="btn btn-danger">Reset </a>
                              <!-- <button class="btn btn-danger" id='refreshbtn' onclick="refreshTable(); event.preventDefault();">Refresh</button> -->
                            </center></td>

                            <?php  } ?>

                    </tbody>
                  </table>
                </div>
                <!--/.span9-->
              </div>
            </div>
            <!--/.wrapper-->
          </div>

          <!-- Default to the left -->
          <strong><a href="http://www.iium.edu.my/">International Islamic University Malaysia </a>
          <!--/.wrapper-->
          <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
          <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
          <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
          <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
          <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
          <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
          <script src="scripts/common.js" type="text/javascript"></script>

        </body>
        <script>

        function loadCourseTable(){
          $('#deleteBtn').load("student.php",{
            matric: matricNum
          });
        }


        function deleteAction(matricNum){

          console.log(matricNum);
          $.ajax({
            url: 'removestudent.php',
            type: 'post',
            data: {

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



        </script>
        </html>
