<?php
session_start();
error_reporting(0);

include("include/connection.php");
include("include/functions.php");

if(isset($_SESSION['success'])){
   echo '<div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">Registration is Successful head to login</div>';
   unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Student Login</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>

  <!-- navigationbar -->
  <div class="navbar navbar-inverse set-radius-zero">
      <div class="container">
          <div class="right-div">
              <a class="navbar-text" href="#" style="color:#fff; font-size:24px;4px; line-height:10px; ">
              <img src="assets/img/UIAAAA.png" width="100" height="100">
               I-CTRAS (IIUM Credit Transfer Application System)
              </a>

          </div>
      </div>
  </div>
  <!-- navigationbar close -->

  <div class="content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4 class="page-head-line"><P style="color:#189D9A">Please login using your matric no and password to enter<p></h4>
          </div>
        </div>
        <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>

        <form name="admin" method="post">
          <div class="row">
            <div class="col-md-6">
              <label>Matric No. : </label>
              <input type="text" name="matric" class="form-control"  />
              <label>Password :  </label>
              <input type="password" name="password" class="form-control"  />
              <hr>
              <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Login </button>&nbsp;
              <button type="submit" name="signup" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Signup </button>&nbsp;
            </div>
          </form>

          <div class="col-md-6">
            <div class="alert alert-info">
              <strong>Note: Students who wish to apply for credit transfer must do so at the point of application for admission or the latest by the FOURTH WEEK of their first regular semester</strong>
              <br>
              <br><p>Academic Management and Admission Division
                International Islamic University Malaysia, Gombak, Selangor Darul Ehsan
                <br>Tel: 03-6196 4045/4043
                <br>Fax: 03-6196 4724</p>
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- check login -->
      <?php if(isset($_POST['submit']))
      {


        $matric=$_POST['matric'];
        $password=($_POST['password']);
        $uip=$_SERVER['REMOTE_ADDR'];
        $status=1;

        $query = "select * from ictras.user where matric =? ;";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(1,$matric);
        $stmt->execute();
        $user = $stmt->fetch();
        $stmt->closeCursor();

        $query = "insert into userlog(matric,userip,status) values(?,?,?);";
        $stmt = $connect->prepare($query);
        $stmt->bindParam(1,$matric);
        $stmt->bindParam(2,$uip);
        $stmt->bindParam(3,$status);
        $stmt->execute();
        $stmt->closeCursor();

        // check admin login
            if($user['password'] == 'admin')
                    {
                      if($user['name'] == 'ADMIN')
                      {
                        $_SESSION['matric'] = $user['matric'];
                        header("Location:admin/index.php");
                      }

                      }
                      elseif($user['password'] === $password){
                        $_SESSION['matric'] = $user['matric'];
                        header("Location:student/index.php");
                    }
                    else {
                      echo "wrong username or password !";
                    }

                  }

// direct to signup
      if(isset($_POST['signup']))
      {
        header("Location:signup.php");
        die;
      }

  ?>

      <!-- CONTENT-WRAPPER SECTION END-->
      <!-- FOOTER SECTION END-->
      <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
      <!-- CORE JQUERY SCRIPTS -->
      <script src="assets/js/jquery-1.11.1.js"></script>
      <!-- BOOTSTRAP SCRIPTS  -->
      <script src="assets/js/bootstrap.js"></script>
    </body>
    </html>
