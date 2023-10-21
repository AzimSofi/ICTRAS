<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{

$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
header("location:change-password.php");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";

header("location:index.php");
exit();
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/css/style.css" rel="stylesheet" />

    <style>

    .suprise-item{
      background-color: #ee4d2d;
    }
    </style>


</head>
<body>
    <?php include('includes/header.php');?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="page-head-line">Please Login To Enter </h4>

                </div>
                <div class="col-md-2">
                  hello
                </div>
                <div class="col-md-4 suprise-item">
                  wwahhhh
                </div>
            </div>
             <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label>ID No. : </label>
                        <input type="text" name="username" class="form-control" required />
                        <label>Password :  </label>
                        <input type="password" name="password" class="form-control" required />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Login </button>&nbsp;
                </div>
                </form>
                <div class="col-md-6">
                    <div class="alert alert-info">

                         <strong> For lost/wrong PINs and any registration/non-technical issues, please contact :-</strong>
                        <ul>
                            <li>
                            AMAD (Undergraduate students only) at 03-6421 3014 Ext
                            4028/4025/4048/3990
                            or Center for Postgraduate Studies(Postgraduate students only) at 03-6421 4995 Ext 3258,3360,3361
                            or your kulliyyah
                            </li>

                        </ul>

                    </div>
                                    </div>

            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
