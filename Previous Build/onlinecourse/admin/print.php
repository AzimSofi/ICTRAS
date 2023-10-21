<?php
session_start();
include('includes/config.php');
error_reporting(0);


?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Approval Letter</title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:20px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:18px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:10px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:30px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
    <?php if($_SESSION['login']!="")
{
 
}
 ?>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <div class="container">
              <div class="left-div">
              </div>
                    <div class="col-md-1">
                    <img src="assets/img/KOE.png" width="700" height="140">
                    </div> 

<?php                                
$sql=mysqli_query($con,"select * from details");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

    <br>
    <div class="form-group">
    
    <strong>Reference:</strong>
    <td><?php echo htmlentities($row['reference']);?></td>

    <div class="form-group">
    <strong>Date:</strong>
    <td><?php echo htmlentities($row['date']);?></td>



  <?php } ?>

              
             

                </div>
                
                <div class="row" >
                  <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="panel panel-primary class">
                        <div class="panel-heading">
                        <br>
                        <strong> Assalamualaikum wrt.wrb.</strong>

                        <br>
                        <br>
                        <strong> Dear Br./Sr.,</strong>
                        </div>

                        
                        <br>
                        <strong> CREDIT TRANSFER AND LETTER OF PERMISSION </strong>
                        </div>

                        <br>
                        <label for="studentname">May this letter reach you while you are in the best of health by the grace of Allah SWT.</label>
 
                        <br>
                        <br>
                        <label for="studentname">The above matter is kindly referred.</label>


<?php                                
$sql=mysqli_query($con,"select * from courseenrolls");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <br>
                        <br>
                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
                       <strong> PART A: PERSONAL DETAILS OF STUDENT</strong>
    
   
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
    <strong> PART B: INFORMATION ON PREVIOUS INSTITUTION</strong>
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
  <strong> PART C: LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER</strong>
  <br>
  <strong> ___________________________________________________________________________________________</strong>
  <br>
  <br>
  <div class="form-group">
  <?php     
$result = mysqli_query($con, "SELECT * FROM item ORDER BY item_id DESC");
$output = '
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
';

while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["coursecode"].'</td>
  <td>'.$row["coursetitle"].'</td>
  <td>'.$row["credithours"].'</td>
  <td>'.$row["gradeobtained"].'</td>
  <td>'.$row["coursecodee"].'</td>
  <td>'.$row["status"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;

?>
<strong> ___________________________________________________________________________________________</strong>
<br>
                        <br>
                        <label for="studentname">For further information kindly contact us at +603-61964000- ext. 3390 or e-mail us at dean.unit@iium.edu.my.</label>
                        <br>
                        <br>
                        <label for="studentname">Thank you. Wassalam.</label>
                        <br>
                        <label for="studentname">Sincerely</label>

                        
                        <br>
                        <br>
                        <br>
                        <strong>ASSOC. PROF. DR SANY IZAN IHSAN</strong>
                        <br>
                        <label for="studentname">Dean</label>
                        <br>
                        <label for="studentname">Kulliyyah of Engineering, International Islamic University Malaysia (IIUM)</label>

 <br>
 <br>
 <br>


 
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
  
</body>
</html>
<?php ?>