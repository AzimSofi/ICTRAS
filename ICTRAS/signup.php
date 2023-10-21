<?php
session_start();
error_reporting(0);

include("include/connection.php");
include("include/functions.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Signup</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>

  <div class="content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-head-line"><P style="color:#189D9A">Registration<p></h1>
          </div>
        </div>

        <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
        <div class=" container">
          <form action="signup.php" method="post">
            <div class="row">
              <div class="col-md-6">
                <input type="text" Name="name" placeholder="Name" required class="form-control"><hr>
                <input type="text" Name="matric" placeholder="Matric Number" required  class="form-control" ><hr>
                <input type="password" Name="password" placeholder="Password" required class="form-control"><hr>
                <input type="text" Name="email" placeholder="Email" required  class="form-control"><hr>
                <select name="department" id="department" class="form-control">
          					<option value="CIE">CIE</option>
          					<option value="CIV">CIV</option>
          					<option value="MECH">MECH</option>
          					<option value="COMM">COMM</option>
                    <option value="BIO">BIO</option>
                    <option value="AERO">AERO</option>
                    <option value="MANU">MANU</option>
        				</select><hr>
                <input type="text" Name="semester" placeholder="Semester" required class="form-control"><hr>

                <input type="text" Name="phonenum" placeholder="Phone No." required class="form-control"><hr>
                <input type="text" Name="address" placeholder="Address" required  class="form-control"><hr>
                <button type="submit" name="signup" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Signup </button>&nbsp; <hr>

              </div>
            </form>


            <div class="col-md-6">
              <div class="alert alert-info">
                <strong>Note: Student is required to signup to use the credit transfer system. Make sure to fill the particular carefully to make sure the in formation is correct and up to date. </strong>
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
      </div>
    </div>
  </div>

  <?php
  if(isset($_POST['signup']))
  {
    $user_name=$_POST['name'];
    $matric=$_POST['matric'];
    $password=($_POST['password']);
    $email=$_POST['email'];
    $department=($_POST['department']);
    $sem=$_POST['semester'];

    $phonenum=$_POST['phonenum'];
    $address=$_POST['address'];

    if(!empty($user_name) && is_numeric($matric) && !empty($matric) && !empty($password) && !empty($email) && !empty($department)&& !empty($sem) )
    {
      $query = "insert into ictras.user (name,matric,password,email,department,semester,phonenum,address)
                values ('$user_name','$matric','$password','$email','$department','$sem','$phonenum','$address')";
      mysqli_query($con, $query);
      $_SESSION['success'] = 1;
      header('location:index.php');
      die;
    
    }else
		{
			echo '<div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">please insert valid information</div>';
		}

  }

  ?>
  <?php include('includes/footer.php');?>
  <script src="assets/js/jquery-1.11.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>
