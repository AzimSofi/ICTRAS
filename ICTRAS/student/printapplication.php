<?php
session_start();
error_reporting(0);
include("include/connection.php");
$matric= $_SESSION['matric']
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Print Form</title>

  <style>
  .invoice-box{
    max-width:1100px;
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
    text-align:left;
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

    <!-- MENU SECTION END-->

    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <img src="images/headerr.png" width="1100" height="300">
          </div>

          <div class="col-md-12">
            <div class="alert alert-info">

            <strong> ____________________________________________________________________________________________________________________________</strong>
            <br>
            <br>
            <strong> CRITERIA FOR TRANSFER OF CREDIT
            <br>
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
            <br>
            <strong> ____________________________________________________________________________________________________________________________</strong>
            </div>

            <div class="row" >
              <div class="col-md-3"></div>
                <div class="col-md-12">
                  <div class="panel panel-primary class">
                  <br>
                  <div align="center">
                    <strong> APPLICATION FORM</strong>
                  </div>

                  <div class="panel-body">
                    <form name="dept" method="post" enctype="multipart/form-data">
                    <br>
                    <strong> PART A: PERSONAL DETAILS OF STUDENT</strong>
                  </div>


                  <?php

                  $query = "select * from ictras.user where matric=?;";
                  $stmt = $connect->prepare($query);
                  $stmt->bindParam(1,$matric);
                  $check_submit=$stmt->execute();
                  $printinfouser= $stmt->fetchAll();
                  $stmt->closeCursor();
                  $cnt=1;


                  $query = "select * from ictras.prevuni where matric=?;";
                  $stmt = $connect->prepare($query);
                  $stmt->bindParam(1,$matric);
                  $check_submit=$stmt->execute();
                  $printinfouni = $stmt->fetchAll();
                  $stmt->closeCursor();


                  foreach ($printinfouser as $row)
                  { ?>


                        <!-- <div class="form-group"> -->

                        <div class="form-group">
                          <label for="name">Student Name:   </label>
                          <td><?php echo ($row['name']);?></td>
                        </div>

                        <div class="form-group">
                          <label for="studentregno">Matric No:   </label>
                          <td><?php echo htmlentities($row['matric']);?></td>
                        </div>

                        <div class="form-group">
                          <label for="programme">Department:    </label>
                          <td><?php echo htmlentities($row['department']);?></td>
                        </div>
                        <div class="form-group">
                          <label for="email">Email: </label>
                          <td><?php echo htmlentities($row['email']);?></td>
                        </div>
                        <div class="form-group">
                          <label for="handphonenum">Tel/HP No:    </label>
                          <td><?php echo htmlentities($row['phonenum']);?></td>
                        </div>
                        <div class="form-group">
                          <label for="address">Address:   </label>
                          <td><?php echo htmlentities($row['address']);?></td>
                        </div>

                        <div class="panel-body">
                          <form name="dept" method="post" enctype="multipart/form-data">
                          <br>
                          <strong> PART B: INFORMATION ON PREVIOUS INSTITUTION</strong>
                        </div>


                          <?php }
                          foreach ($printinfouni as $row1){
                          ?>


                          <div class="form-group">
                            <label for="institution">Name of Institutions:   </label>
                            <td><?php echo htmlentities($row1['uniname']);?></td>
                          </div>
                          <div class="form-group">
                            <label for="diploma"> Name of Diploma (for transfer students):    </label>
                            <td><?php echo htmlentities($row1['diplomaname']);?></td>
                          </div>
                          <div class="form-group">
                            <label for="degree">Name of Degree:  </label>
                            <td><?php echo htmlentities($row1['degreename']);?></td>
                          </div>
                          <div class="form-group">
                            <label for="yearofstudy">Year of Study:   </label>
                            <td><?php echo htmlentities($row1['yearstudy']);?></td>
                          </div>
                          <div class="form-group">
                            <label for="reason">Reason of Leaving:   </label>
                            <td><?php echo htmlentities($row1['reason']);?></td>
                          </div>
                          <div class="form-group">
                            <label for="CGPA"> Highest Qualification & CGPA (where applicable):   </label>
                            <td><?php echo htmlentities($row1['CGPA']);?></td>
                          </div>
                        </div>

                        <?php } ?>


                        <br>
                        <strong> PART C: LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER</strong>
                        <div class="form-group">
                          <label for="studentname">(Please attach ALL copies of the relevant course outlines/syllabus/description/subjects taken in previous institution (Please fill in the information accordingly)) </label>
                          <strong> ____________________________________________________________________________________________________________________________</strong>
                        </div>


                        <?php
                        $query = "select a.coursecode, a.coursename, a.credithr, a.grade, b.approval
                                  from ictras.coursereq a Inner join ictras.status b
                                  on a.coursecode = b.coursecode and a.matric = b.matric
                                  where a.matric = ? order by a.coursename ASC;";

                        $stmt = $connect->prepare($query);
                        $stmt->bindParam(1,$matric);
                        $stmt->execute();
                        $printinfocourse = $stmt->fetchAll();
                        $stmt->closeCursor();
                        ?>

                        <table class="table" >

                        <tr>
                        <th >Course Code <br/>(as stated in the applicant’s transcript)</th>
                        <th >Course Title <br/>(as stated in the applicant’s transcript)</th>
                        <th >Credit Hours</th>
                        <th >Grade Obtained</th>
                        </tr>


                        <?php  foreach ($printinfocourse as $row2){

                        $coursecode =$row2['coursecode'];
                        $coursename=$row2['coursename'];
                        $credithr=$row2['credithr'];
                        $grade=$row2['grade'];


                        ?>

                        <tr>
                        <td><?php echo $coursecode ?></td>
                        <td><?php echo $coursename ?></td>
                        <td><?php echo $credithr   ?></td>
                        <td><?php echo $grade      ?></td>

                        <td><center>

                        <?php } ?>

                        </table>
                        </div>
                      <br>
                      <strong> ____________________________________________________________________________________________________________________________</strong>
                      <br>
                      <br>
                      <br>
                      <br>
                      <img src="images/footer.png" width="800" height="170">

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
