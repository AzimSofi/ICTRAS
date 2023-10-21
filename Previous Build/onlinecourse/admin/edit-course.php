<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
  $id=intval($_GET['id']);
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
  $universities=$_POST['universities'];
  $programme=$_POST['programme'];
  $department=$_POST['department'];
  $coursecodeB=$_POST['coursecodeB'];
  $coursecodeA=$_POST['coursecodeA'];
  $status=$_POST['status'];
  
$ret=mysqli_query($con,"update data set programme='$programme',department='$department',coursecodeB='$coursecodeB',coursecodeA='$coursecodeA',status='$status',updationDate='$currentTime' where id='$id'");
if($ret)
{
$_SESSION['msg']="Data Updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Data not Updated";
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
    <title>Admin | Data</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Data </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Data
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
<?php
$sql=mysqli_query($con,"select * from data where id='$id'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<p><b>Last Updated at</b> :<?php echo htmlentities($row['updationDate']);?></p>
   <div class="form-group">
    <label for="universities">Universities  </label>
    <input type="text" class="form-control" id="universities" name="universities" placeholder="Universities" value="<?php echo htmlentities($row['universities']);?>" required />
  </div>

<div class="form-group">
    <label for="programme">Programme </label>
    <input type="text" class="form-control" id="programme" name="programme" placeholder="Programme" value="<?php echo htmlentities($row['programme']);?>" required />
  </div> 

<div class="form-group">
    <label for="department">Department </label>
    <input type="text" class="form-control" id="department" name="department" placeholder="Department" value="<?php echo htmlentities($row['department']);?>" required />
  </div> 

<div class="form-group">
    <label for="coursecodeB">Course Code Before </label>
    <input type="text" class="form-control" id="coursecodeB" name="coursecodeB" placeholder="Course Code Before" value="<?php echo htmlentities($row['coursecodeB']);?>" required />
  </div>  

<div class="form-group">
    <label for="coursecodeA">Course Code After </label>
    <input type="text" class="form-control" id="coursecodeA" name="coursecodeA" placeholder="Course Code After" value="<?php echo htmlentities($row['coursecodeA']);?>" required />
  </div>  

<div class="form-group">
    <label for="status">Status</label>
    <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="<?php echo htmlentities($row['status']);?>" required />
  </div>  

<?php } ?>
 <button type="submit" name="submit" class="btn btn-default"><i class=" fa fa-refresh "></i> Update</button>
</form>
                            </div>
                            </div>
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
<?php } ?>
