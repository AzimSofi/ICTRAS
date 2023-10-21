<?php
ob_start();
include("include/connection.php");
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
                <li><a href="printapplication.php"><i class="menu-icon icon-list"></i>Print Form</a></li>
              </ul>
              <ul class="widget widget-menu unstyled">
                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
              </ul>
            </div>
            <!--/.sidebar-->
          </div>
          <!--/.span3-->
          <div class="span9">
            <div class="module">
              <div class="module-head">
                <h3>Update Details</h3>
              </div>
              <div class="module-body">

                <?php
                $matric = $_SESSION['matric'];
                $sql="select * from user where matric='$matric'";
                $result=$con->query($sql);
                $row=$result->fetch_assoc();

                $name=$row['name'];
                $department=$row['department'];
                $email=$row['email'];
                $semester=$row['semester'];
                $password=$row['password'];
                ?>

                <form  action="editprofile.php?id=<?php echo $matric ?>" method="post">

                  <div class="control-group">
                    <label class="control-label" for="name"><b>Name:</b></label>
                    <div class="controls">
                      <input type="text" id="name" name="name" value= "<?php echo $name?>" class="span8" required>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="department"><b>Department:</b></label>
                    <div class="controls">
                      <select name = "department" tabindex="1" value="SC" data-placeholder="Select department" class="span8">
                        <option value="<?php echo $department?>"><?php echo $department ?> </option>
                        <option value="CIE">CIE</option>
                        <option value="CIV">CIV</option>
                        <option value="MECH">MECH</option>
                        <option value="COMM">COMM</option>
                        <option value="BIO">BIO</option>
                        <option value="AERO">AERO</option>
                        <option value="MANU">MANU</option>
                      </select>

                    </div>
                  </div>


                  <div class="control-group">
                    <label class="control-label" for="email"><b>Email:</b></label>
                    <div class="controls">
                      <input type="text" id="email" name="email" value= "<?php echo $email?>" class="span8" required>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="semester"><b>semester:</b></label>
                    <div class="controls">
                      <input type="text" id="semester" name="semester" value= "<?php echo $semester?>" class="span8" required>
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="password"><b>New Password:</b></label>
                    <div class="controls">
                      <input type="password" id="password" name="password"  value= "<?php echo $password?>" class="span8" required>
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="controls">
                      <button type="submit" name="update"class="btn-primary"><center>Update Details</center></button>
                    </div>
                  </div>

                </form>

              </div>
            </div>
          </div>
          <!--/.span9-->
        </div>
      </div>
      <!--/.container-->
    </div>

    <?php
    if(isset($_POST['update']))
    {
        $rollno = $_GET['id'];
        $name=$_POST['name'];
        $department=$_POST['department'];
        $email=$_POST['email'];
        $semester=$_POST['semester'];
        $password=$_POST['password'];

    $query="update user
            set name='$name', department='$department', email='$email', semester='$semester', password='$password'
            where matric='$rollno'";



    if($con->query($query) === TRUE){
    echo "<script type='text/javascript'>alert('Success')</script>";
    header( "Refresh:0.01; url=index.php", true, 303);
    }
    else
    {//echo $con->error;
    echo "<script type='text/javascript'>alert('Error')</script>";
    }
    }
    ?>


    <div class="footer">
      <div class="container">
        <b class="copyright">&copy; 2018 Library Management System </b>All rights reserved.
      </div>
    </div>

    <!--/.wrapper-->

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="scripts/common.js" type="text/javascript"></script>

  </body>

  </html>
