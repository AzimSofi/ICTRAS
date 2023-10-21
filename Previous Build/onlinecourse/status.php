<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{
  header('location:index.php');
}
else{


}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Credit Transfer - Status</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="onlinecourse/assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <?php include('includes/header.php');?>
  <!-- LOGO HEADER END-->
  <?php if($_SESSION['login']!="")
  {
    include('includes/menubar.php');
  }
  ?>

  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Credit Transfer-Report</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="onlinecourse/assets/css/style.css" rel="stylesheet" />
  </head>

  <body>

    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="page-head-line">Credit Transfer-Report  </h1>
          </div>
          <div align="center">

            <a href="printt.php?id=<?php echo $row['cid']?>" target="_blank">
              <button class="btn btn-primary"><i class="fa fa-print "></i> View & Print </button> </a>

              <div align="center">
                <div class="col-md-12">
                  <img src="studentphoto/home_2.jpg" width="1100" height="300">
                </div>
                <br>
                <div>



                </div>
              </div>
            </div>

          </div>

        </div>





      </div>
    </div>
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>


  </body>
  </html>
  <?php ?>
