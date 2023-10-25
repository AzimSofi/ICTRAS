<?php
session_start();
error_reporting(0);
include("include/connection.php");

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

          <img src="images/KOE.png" width="800" height="150">
        </div>

        <?php

        $query = "select * from ictras.reference ;";
        $stmt = $connect->prepare($query);
        $check_submit=$stmt->execute();
        $refer= $stmt->fetchAll();
        $stmt->closeCursor();

        $cnt=1;
      foreach ($refer as $row)
      {  ?>

      <br>
      <div class="form-group">
        <strong>Reference:</strong>
        <td><?php echo htmlentities($row['refnum']);?></td>
      </div>

      <div class="form-group">
        <strong>Date:</strong>
        <td><?php echo htmlentities($row['date']);?></td>
      </div>
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
              <label for="studentname">The above matter is kindly referred.</label>
              <br>
              <br>
              <?php
              $matric= $_SESSION['matric'];
              $query = "select * from ictras.user where matric= ?;";
              $stmt = $connect->prepare($query);
              $stmt->bindParam(1, $matric);
              $check_submit=$stmt->execute();
              $refuser= $stmt->fetchAll();
              $stmt->closeCursor();


              foreach ($refuser as $row1) {  ?>
                <div class="panel-body">
                  <form name="dept" method="post" enctype="multipart/form-data">
                    <strong> PART A: PERSONAL DETAILS OF STUDENT</strong>
                  </div>

                  <div class="form-group">
                    <label for="name">Student Name:</label>
                    <td><?php echo htmlentities($row1['name']);?></td>
                  </div>
                  <div class="form-group">
                    <label for="matric">Matric No:</label>
                    <td><?php echo htmlentities($row1['matric']);?></td>
                  </div>

                  <div class="form-group">
                    <label for="department">Department: </label>
                    <td><?php echo htmlentities($row1['department']);?></td>
                  </div>

                  <div class="form-group">
                    <label for="email">Email: </label>
                    <td><?php echo htmlentities($row1['email']);?></td>
                  </div>

                  <div class="form-group">
                    <label for="handphonenum">Tel/HP No: </label>
                    <td><?php echo htmlentities($row1['phonenum']);?></td>
                  </div>

                  <div class="form-group">
                    <label for="address">Address: </label>
                    <td><?php echo htmlentities($row1['address']);?></td>
                  </div>
                <?php } ?>

        <br>
          <strong> PART B: INFORMATION ON PREVIOUS INSTITUTION</strong>


          <?php
          $matric= $_SESSION['matric'];
          $query = "select * from ictras.prevuni where matric= ?;";
          $stmt = $connect->prepare($query);
          $stmt->bindParam(1, $matric);
          $check_submit=$stmt->execute();
          $refuni= $stmt->fetchAll();
          $stmt->closeCursor();

          foreach ($refuser as $row1) { ?>

                <div class="form-group">
                  <label for="institution">Name of Institutions:  </label>
                  <td><?php echo htmlentities($row['uniname']);?></td>
                </div>

                <div class="form-group">
                  <label for="diploma"> Name of Diploma (for transfer students):</label>
                  <td><?php echo htmlentities($row['diplomaname']);?></td>
                </div>

                <div class="form-group">
                  <label for="degree">Name of Degree:</label>
                  <td><?php echo htmlentities($row['degreename']);?></td>
                </div>

                <div class="form-group">
                  <label for="yearofstudy">Year of Study:</label>
                  <td><?php echo htmlentities($row['yearstudy']);?></td>
                </div>

                <div class="form-group">
                  <label for="reason">Reason of Leaving:</label>
                  <td><?php echo htmlentities($row['reason']);?></td>
                </div>

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

            <div class="table-responsive">
            <table class="table table-bordered" id="crud_table">
            <tr>
            <th width="25%">Course Code <br/>(as stated in the applicant’s transcript)</th>
            <th width="35%">Course Title <br/>(as stated in the applicant’s transcript)</th>
            <th width="10%">Credit Hours</th>
            <th width="10%">Grade Obtained</th>
            <th width="10%">Status</th>
            </tr>

            <?php

            $matric= $_SESSION['matric'];
            $query = "select a.coursecode, a.coursename, a.credithr, a.grade, b.approval
                      from ictras.coursereq a Inner join ictras.status b
                      on a.coursecode = b.coursecode and a.matric = b.matric
                      where a.matric = ? order by a.coursename ASC;";
            $stmt = $connect->prepare($query);
            $stmt->bindParam(1, $matric);
            $check_submit=$stmt->execute();
            $refcourse= $stmt->fetchAll();
            $stmt->closeCursor();

            foreach ($refcourse as $row2) {


              $coursecode =$row2['coursecode'];
              $coursename=$row2['coursename'];
              $credithr=$row2['credithr'];
              $grade=$row2['grade'];
              $approval=$row2['approval'];
              if($approval=='0' )
              {
                $Approval = 'PENDING';
              }
              elseif ($approval=='1' ) {
                $Approval = 'APPROVE';
              }
              elseif ($approval=='2' ) {
                $Approval = 'REJECTED';
              }


              ?>


              <tr>
              <td><?php echo $coursecode ?></td>
              <td><?php echo $coursename ?></td>
              <td><?php echo $credithr   ?></td>
              <td><?php echo $grade      ?></td>
              <td><?php echo $Approval      ?></td>
              <tr>
                <td><center>

                <?php } ?>

                </table>

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
