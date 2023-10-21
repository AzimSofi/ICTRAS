<?php
session_start();
include('includes/config.php');
error_reporting(0);


if(isset($_POST['submit']))
{
  $regid=intval($_GET['id']);
  $studentname=$_POST['studentname'];
 
  $programme=$_POST['programme'];
  $email=$_POST['email'];
  $handphonenum=$_POST['handphonenum'];
  $address=$_POST['address'];
  $institution=$_POST['institution'];
  $diploma=$_POST['diploma'];
  $degree=$_POST['degree'];
  $yearofstudy=$_POST['yearofstudy'];
  $reason=$_POST['reason'];
  $CGPA=$_POST['CGPA'];
$ret=mysqli_query($con,"update students set studentName='$studentname',programme='$programme',email='$email',handphonenum='$handphonenum',address='$address',institution='$institution',diploma='$diploma',degree='$degree',yearofstudy='$yearofstudy',reason='$reason',CGPA='$CGPA'  where StudentRegno='$regid'");
if($ret)
{
$_SESSION['msg']="Student Record updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Student Record not update";
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
    <title>Application Form</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
              </div>
                    <div class="col-md-12">
                    <img src="assets/img/headerr.png" width="1100" height="300">
                    </div>  
              
              <div class="col-md-12">
                    <div class="alert alert-info">
                    
                    
                         <strong> CRITERIA FOR TRANSFER OF CREDIT
                          <br/>Please read carefully the following criteria of transfer of credit:-</strong>
                        
                            
                            <br/>1. The institutions/colleges must be recognized by
                            the Malaysian Government and IIUM.
                            <br/>2. Credit/Contact hours/Semester are based on 14
                            lecture weeks.
                            <br/>3. Minimum grade for credit transfer for diploma
                            holders shall be ‘B’ grade or its equivalent and a
                            good pass.
                            <br/> 4. Comparability in terms of depth and content.
                            <br/>5. Maximum credits for transfer is 30% of the total
                            graduation requirements of the programme.
                            <br/> 6. Courses taken within 5 years prior to admission to
                            IIUM/other maximum validity period accepted by
                            Kulliyyah 

                            <br>
                            <br>
                            <strong> This application form will ONLY be processed subject to submission of the following documents:</strong>  

                            <br/>1. Transcript/result slips (showing course title and
                            grade); and
                            <br/> 2. Course outline/syllabus/description/curricular; or
                            <br/>3. University/Institutional prospectus or catalogue

                            <br>
                            <br><strong> Please make sure to print and submit the printed form at AMAD.</strong>

                </div>
                 <a href="manage-students.php?id=<?php echo $row['StudentRegno']?>">
<button class="btn btn-primary btn-l pull-right"><i class="glyphicon glyphicon-menu-left"></i> Back</button> </a>   
                
                
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-12">
                        <div class="panel panel-default class">
                        <div class="panel-heading">
                        APPLICATION FORM
                        </div>
                                  
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php 
$regid=intval($_GET['id']);

$sql=mysqli_query($con,"select * from courseenrolls where StudentRegno='$regid'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

<br>
<div align="center">
<a href="generate-letter.php?id=<?php echo $row['StudentRegno']?>">
<button class="btn btn-default"><i class="fa fa-edit "></i> Generate letter </button> </a>    
</div>

  <div class="panel-body">
    <form name="dept" method="post" enctype="multipart/form-data">
    <label for="studentname"> PART A: PERSONAL DETAILS OF STUDENT</label>
    <div class="form-group">
  
    <div class="form-group">
    <label for="studentname">Student Name:</label>
    <td><?php echo htmlentities($row['studentname']);?></td>

  <div class="form-group">
    <label for="studentregno">Matric No:</label>
    <td><?php echo htmlentities($row['studentRegno']);?></td>
 
  <div class="form-group">
    <label for="programme">Programme: </label>
    <td><?php echo htmlentities($row['programme']);?></td>

  <div class="form-group">
    <label for="email">Email: </label>
    <td><?php echo htmlentities($row['email']);?></td>

  <div class="form-group">
    <label for="handphonenum">Tel/HP No: </label>
    <td><?php echo htmlentities($row['handphonenum']);?></td>

  <div class="form-group">
    <label for="address">Address: </label>
    <td><?php echo htmlentities($row['address']);?></td>
  </div>

  
  <br>
    <label for="studentname"> PART B: INFORMATION ON PREVIOUS INSTITUTION</label>
    <div class="form-group">
    <label for="institution">Name of Institutions:  </label>
    <td><?php echo htmlentities($row['institution']);?></td>

  <div class="form-group">
    <label for="diploma"> Name of Diploma (for transfer students):</label>
    <td><?php echo htmlentities($row['diploma']);?></td>

  <div class="form-group">
    <label for="degree">Name of Degree:</label>
    <td><?php echo htmlentities($row['degree']);?></td>

  <div class="form-group">
    <label for="yearofstudy">Year of Study:</label>
    <td><?php echo htmlentities($row['yearofstudy']);?></td>

  <div class="form-group">
    <label for="reason">Reason of Leaving:</label>
    <td><?php echo htmlentities($row['reason']);?></td>

  <div class="form-group">
    <label for="CGPA"> Highest Qualification & CGPA (where applicable):</label>
    <td><?php echo htmlentities($row['CGPA']);?></td>
  </div>
  </div>
  


  <?php } ?>

  
  <br>
  <label for="studentname"> PART C: LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER</label>
  <div class="form-group">
  <label for="studentname">(Please attach ALL copies of the relevant course outlines/syllabus/description/subjects taken in previous institution (Please fill in the information accordingly)) </label>
  <?php     
$result = mysqli_query($con, "SELECT * FROM itemm ORDER BY item_idd DESC");
$output = '
   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="25%">Course Code <br/>(as stated in the applicant’s transcript)</th>
      <th width="40%">Course Title <br/>(as stated in the applicant’s transcript)</th>
      <th width="5%">Credit Hours</th>
      <th width="5%">Grade Obtained</th>
      <th width="25%">Course Code <br/>(as offered by IIUM)</th>
     </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["coursecodeee"].'</td>
  <td>'.$row["coursetitlee"].'</td>
  <td>'.$row["credithourss"].'</td>
  <td>'.$row["gradeobtainedd"].'</td>
  <td>'.$row["coursecodeeee"].'</td>
 </tr>
 ';


}
  


$output .= '</table>';
echo $output;

?>



 
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>





        </div>
    </div>
  
    <!-- CONTENT-WRAPPER SECTION END-->
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
<?php  ?>