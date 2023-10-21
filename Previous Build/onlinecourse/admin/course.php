<?php
session_start();
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}

else{

    

if(isset($_POST['submit']))
{
$universities=$_POST['universities'];
$programme=$_POST['programme'];
$department=$_POST['department'];
$coursecodeB=$_POST['coursecodeB'];
$coursecodeA=$_POST['coursecodeA'];
$status=$_POST['status'];
$ret=mysqli_query($con,"insert into data(universities, programme, department, coursecodeB, coursecodeA, status) values('$universities','$programme','$department','$coursecodeB','$coursecodeA','$status')");
if($ret)
{
$_SESSION['msg']="Data Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Data not created";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from data where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Data deleted !!";
      }
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Database</title>
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
                        <h1 class="page-head-line">Database </h1>
                    </div>
                </div>
                <div class="form-group">
				



                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Insert Data
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="universities">Universities </label>
    <input type="text" class="form-control" id="universities" name="universities" placeholder="Universities" required />
  </div>

 <div class="form-group">
    <label for="programme">Programme  </label>
    <input type="text" class="form-control" id="programme" name="programme" placeholder="Programme" required />
  </div>

<div class="form-group">
    <label for="department">Department </label>
    <input type="text" class="form-control" id="department" name="department" placeholder="Department" required />
  </div> 

<div class="form-group">
    <label for="coursecodeB">Course Code Before</label>
    <input type="text" class="form-control" id="coursecodeB" name="coursecodeB" placeholder="Course Code Before" required />
  </div>   

  <div class="form-group">
    <label for="coursecodeA">Course Code After</label>
    <input type="text" class="form-control" id="coursecodeA" name="coursecodeA" placeholder="Course Code After" required />
  </div>  

  <div class="form-group">
    <label for="status">Status</label>
    <input type="text" class="form-control" id="status" name="status" placeholder="Status" required />
  </div>  

 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Database
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Universitites</th>
                                            <th>Programme</th>
                                            <th>Department</th>
                                            <th>Course Code Before</th>
                                             <th>Course Code After</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>



<?php
$sql=mysqli_query($con,"select * from data");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['universities']);?></td>
                                            <td><?php echo htmlentities($row['programme']);?></td>
                                            <td><?php echo htmlentities($row['department']);?></td>
                                             <td><?php echo htmlentities($row['coursecodeB']);?></td>
                                            <td><?php echo htmlentities($row['coursecodeA']);?></td>
                                            <td><?php echo htmlentities($row['status']);?></td>
                                            <td>
                                            <a href="edit-course.php?id=<?php echo $row['id']?>">
  <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>                                        
  <a href="course.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>


                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
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
