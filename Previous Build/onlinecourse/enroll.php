<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0 )
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$studentname=$_POST['studentname'];
$studentregno=$_POST['studentregno'];
$programme=$_POST['programme'];
$email=$_POST['email'];
$handphonenum=$_POST['handphonenum'];
$addresss=$_POST['addresss'];
$institution=$_POST['institution'];
$diploma=$_POST['diploma'];
$degree=$_POST['degree'];
$yearofstudy=$_POST['yearofstudy'];
$reason=$_POST['reason'];
$CGPA=$_POST['CGPA'];
$ret=mysqli_query($con,"INSERT into courseenrolls(studentname,studentRegno,programme,email,handphonenum,addresss,institution,diploma,degree,yearofstudy,reason,CGPA) values('$studentname','$studentregno','$programme','$email','$handphonenum','$addresss','$institution','$diploma','$degree','$yearofstudy','$reason','$CGPA')");

if($ret)
{
$_SESSION['msg']="Enroll Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Not Enroll";
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
    <link href="l/assets/css/style.css" rel="stylesheet" />
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
                    <img src="studentphoto/headerr.png" width="1100" height="300">
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
                            <br><strong> PLEASE MAKE SURE TO PRINT FIRST THE FORM BEFORE YOU CLICK THE 'ENROLL' & 'SAVE' BUTTON (Submit the printed form at AMAD)</strong>

                </div>
                
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-12">
                        <div class="panel panel-primary class">
                        <div class="panel-heading">
                        APPLICATION FORM
                        </div>
                                             
                        
                        
           
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php $sql=mysqli_query($con,"select * from students where StudentRegno='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

  <div class="panel-body">
    <form name="dept" method="post" enctype="multipart/form-data">

    <label for="studentname"> PART A: PERSONAL DETAILS OF STUDENT</label>
    <div class="form-group">
  
    <div class="form-group">
    <label for="studentname">Student Name:</label>
    <input type="text" class="form-control" id="studentname" name="studentname" placeholder="Student Name" required />
  </div>

 <div class="form-group">
    <label for="studentregno">Matric No:</label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['StudentRegno']);?>"  placeholder="Student Reg no" readonly />
    
  </div>
 
 <?php } ?>

 <div class="form-group">
    <label for="programme">Programme: </label>
    <input type="text" class="form-control" id="programme" name="programme" placeholder="Programme" required />
  </div>

  <div class="form-group">
    <label for="email">Email: </label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required />
  </div>

  <div class="form-group">
    <label for="handphonenum">Tel/HP No: </label>
    <input type="text" class="form-control" id="handphonenum" name="handphonenum" placeholder="Handphone Number" required />
  </div>

  <div class="form-group">
    <label for="addresss">Address: </label>
    <input type="text" class="form-control" id="addresss" name="addresss" placeholder="Address" required />
  </div>
  
  <br>
    <label for="studentname"> PART B: INFORMATION ON PREVIOUS INSTITUTION</label>
    <div class="form-group">
    <label for="institution">Name of Institutions:  </label>
    <input type="text" class="form-control" id="institution" name="institution" placeholder="Your Previous Institution" required />
  </div>

  <div class="form-group">
    <label for="diploma"> Name of Diploma (for transfer students):</label>
    <input type="text" class="form-control" id="diploma" name="diploma" placeholder="Your Previous Diploma" required />
  </div>

  <div class="form-group">
    <label for="degree">Name of Degree:</label>
    <input type="text" class="form-control" id="degree" name="degree" placeholder="Name of Degree" required />
  </div>

  <div class="form-group">
    <label for="yearofstudy">Year of Study:</label>
    <input type="text" class="form-control" id="yearofstudy" name="yearofstudy" placeholder="Year of Study" required />
  </div>

  <div class="form-group">
    <label for="reason">Reason of Leaving:</label>
    <input type="text" class="form-control" id="reason" name="reason" placeholder="Reason of Leaving" required />
  </div>

  <div class="form-group">
    <label for="CGPA"> Highest Qualification & CGPA (where applicable):</label>
    <input type="text" class="form-control" id="CGPA" name="CGPA" placeholder="CGPA" required />
  </div>


  <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>
  <br>
  <br>
  <br>
  
  <label for="studentname"> PART C: LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER</label>
  <div class="form-group">
  <label for="studentname">(Please attach ALL copies of the relevant course outlines/syllabus/description/subjects taken in previous institution (Please fill in the information accordingly)) </label>

   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="25%">Course Code <br/>(as stated in the applicant’s transcript)</th>
      <th width="40%">Course Title <br/>(as stated in the applicant’s transcript)</th>
      <th width="5%">Credit Hours</th>
      <th width="5%">Grade Obtained</th>
      <th width="25%">Course Code <br/>(as offered by IIUM)</th>
     </tr>
     <tr>

      <td contenteditable="true" class="coursecodeee"></td>
      <td contenteditable="true" class="coursetitlee"></td>
      <td contenteditable="true" class="credithourss"></td>
      <td contenteditable="true" class="gradeobtainedd"></td>
      <td contenteditable="true" class="coursecodeeee"></td>
      <td></td>
     </tr>
    </table>
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>
    <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div> 
    
   
  </div>
  
  <img src="studentphoto/footer.png" width="900" height="200">
  


</form>
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
    <script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='coursecodeee'></td>";
   html_code += "<td contenteditable='true' class='coursetitlee'></td>";
   html_code += "<td contenteditable='true' class='credithourss'></td>";
   html_code += "<td contenteditable='true' class='gradeobtainedd' ></td>";
   html_code += "<td contenteditable='true' class='coursecodeeee'></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var coursecodeee = [];
  var coursetitlee = [];
  var credithourss = [];
  var gradeobtainedd = [];
  var coursecodeeee = [];
  $('.coursecodeee').each(function(){
   coursecodeee.push($(this).text());
  });
  $('.coursetitlee').each(function(){
   coursetitlee.push($(this).text());
  });
  $('.credithourss').each(function(){
   credithourss.push($(this).text());
  });
  $('.gradeobtainedd').each(function(){
   gradeobtainedd.push($(this).text());
  });
  $('.coursecodeeee').each(function(){
   coursecodeeee.push($(this).text());
  });
  $.ajax({
   url:"check_availability.php",
   method:"POST",
   data:{coursecodeee:coursecodeee, coursetitlee:coursetitlee, credithourss:credithourss, gradeobtainedd:gradeobtainedd, coursecodeeee:coursecodeeee},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
 
});
 
</script>

</body>
</html>
<?php } ?>
