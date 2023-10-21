<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

}
?>


<?php
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}

else{
   

if(isset($_POST['submit']))
{
$reference=$_POST['reference'];
$studentregno=$_POST['studentregno'];
$date=$_POST['date'];
$ret=mysqli_query($con,"insert into details(reference,studentRegno,date) values('$reference','$studentregno','$date')");
if($ret)
{
$_SESSION['msg']="Data Inserted Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Data not created";
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
    <title>Admin | Generate Letter</title>
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

<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">Generate Letter</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Data Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        
          
                    </div>
                </div>
                <div class="form-group">
                <div>
                <a href="print.php?id=<?php echo $row['cid']?>" target="_blank">
  <button class="btn btn-danger btn-l pull-right"><i class="fa fa-print "></i> Print</button> </a>  
</div>
<a href="manage-students.php?id=<?php echo $row['StudentRegno']?>">
<button class="btn btn-primary btn-l pull-right"><i class="glyphicon glyphicon-menu-left"></i> Back</button> </a>   

                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-12">
                        <div class="panel panel-info class">
                        <div class="panel-heading">
                           Generate Letter
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


  <div class="panel-body">
   <form name="dept" method="post">
   <div class="form-group">
    <label for="reference">Reference  </label>
    <input type="text" class="form-control" id="reference" name="reference" placeholder="Reference" required />
  </div>

 <div class="form-group">
    <label for="date">Date </label>
    <input type="text" class="form-control" id="date" name="date" placeholder="Date" required />
  
  <br>
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </div>
  

  <br>
  <label for="studentname"> LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER</label>
  <div class="form-group">
  <label for="studentname">(Please use this table only. (Copy all the data other than THE FIRST TABLE and paste it in the table below.))</label>

<?php 
$sql=mysqli_query($con, "SELECT * FROM itemm ORDER BY item_idd DESC");

while($row=mysqli_fetch_array($sql))
{ ?>
   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="20%">Course Code <br/>(as stated in the applicant’s transcript)</th>
      <th width="35%">Course Title <br/>(as stated in the applicant’s transcript)</th>
      <th width="5%">Credit Hours</th>
      <th width="5%">Grade Obtained</th>
      <th width="25%">Course Code <br/>(as offered by IIUM)</th>
      <th width="10%">Status</th> 
     </tr>
     <tr>
    
    
     <td contenteditable="true" class="coursecode"><?php echo htmlentities($row['coursecodeee']);?></td>
     <td contenteditable="true" class="coursetitle"><?php echo htmlentities($row['coursetitlee']);?></td>
     <td contenteditable="true" class="credithours"><?php echo htmlentities($row['credithourss']);?></td>
     <td contenteditable="true" class="gradeobtained"><?php echo htmlentities($row['gradeobtainedd']);?></td>
     <td contenteditable="true" class="coursecodee"><?php echo htmlentities($row['coursecodeeee']);?></td>
     <td contenteditable="true" class="status"><?php echo htmlentities($row['status']);?></td>
     
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


   <?php } ?>

   
  </div>
  
  
  


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
   html_code += "<td contenteditable='true' class='coursecode'></td>";
   html_code += "<td contenteditable='true' class='coursetitle'></td>";
   html_code += "<td contenteditable='true' class='credithours'></td>";
   html_code += "<td contenteditable='true' class='gradeobtained' ></td>";
   html_code += "<td contenteditable='true' class='coursecodee'></td>";
   html_code += "<td contenteditable='true' class='status'></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var coursecode = [];
  var coursetitle = [];
  var credithours = [];
  var gradeobtained = [];
  var coursecodee = [];
  var status = [];
  $('.coursecode').each(function(){
   coursecode.push($(this).text());
  });
  $('.coursetitle').each(function(){
   coursetitle.push($(this).text());
  });
  $('.credithours').each(function(){
   credithours.push($(this).text());
  });
  $('.gradeobtained').each(function(){
   gradeobtained.push($(this).text());
  });
  $('.coursecodee').each(function(){
   coursecodee.push($(this).text());
  });
  $('.status').each(function(){
   status.push($(this).text());
  });
  $.ajax({
   url:"check_availabilityy.php",
   method:"POST",
   data:{coursecode:coursecode, coursetitle:coursetitle, credithours:credithours, gradeobtained:gradeobtained, coursecodee:coursecodee, status:status},
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
   url:"fetchhh.php",
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

