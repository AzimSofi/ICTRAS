<?php
session_start();
error_reporting(0);
include("../include/connection.php");
include("include/functions.php");




if(isset($_POST["submit"]))
{


  $query = "select * from ictras.user
  where ( matric like '%$search%' or name like '%$search%' or department like'%$search%') and (matric <> '121212');";
  $stmt = $connect->prepare($query);
  $check_submit=$stmt->execute();
  $searchprint = $stmt->fetchAll();
  $stmt->closeCursor();
  if(isset($check_submit)){
    // echo 'query 1';
  }
}
else
{
  $query = "select * from ictras.user where (matric <> '121212')";
  $stmt = $connect->prepare($query);
  $check_submit=$stmt->execute();
  $searchprint = $stmt->fetchAll();
  $stmt->closeCursor();


 if(isset($check_submit)){
   // echo 'query 2';
 }

}


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
          </div>
        </div>
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
              <form class="form-horizontal row-fluid" action="printselect.php" method="post">
                <div  class="control-group">
                  <label class="control-label" for="Search"><b>Search matric:</b></label>
                  <div class="controls">
                    <input type="text" id="text" name="search" placeholder="Enter Matric number " class="span8" required>
                    <button type="submit" name="submit"class="btn btn-primary">Search</button>


                  </div>
                </div>
              </form>
              <div class="module">
                <div class="module-head">
                  <h3>Student List  </h3>
                </div>
                <div class="module-body">
                  <table class="table" id = "tables">
                    <thead>
                      <tr>
                        <th >Matric Number</th>
                        <th >Name</th>
                        <th >Department</th>
                        <th >Print</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      foreach($searchprint as $row)
                      {
                        $matric =$row['matric'];
                        $name =$row['name'];
                        $department =$row['department'];

                       ?>
                      <tr>
                        <td><?php echo $name  ?></td>
                        <td><?php echo $matric  ?></td>
                        <td><?php echo $department  ?></td>

                        <td><a href="printapprove.php?id=<?php echo $matric; ?>"  class="btn btn-primary">print</a></td>

                      <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <strong><a href="http://www.iium.edu.my/">International Islamic University Malaysia </a></strong> -->

        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>


      </body>

      </html>
