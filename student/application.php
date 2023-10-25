<?php
ob_start();
include("include/connection.php");
include("include/functions.php");

if ($_SESSION['matric']) {

  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I-CTRAS</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="assets/css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
    rel='stylesheet'>
    <title>Application Form</title>
  </head>
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
            <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php"><img src=images/logo.png alt="lOGO" width="50" height="60"> I-CTRAS</a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
              <ul class="nav pull-right">
                <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="images/profile3.png" class="nav-avatar" />
                  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php">Your Profile</a></li>
                    <!--li><a href="#">Edit Profile</a></li>
                    <li><a href="#">Account Settings</a></li-->
                    <li class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- /.nav-collapse -->
          </div>
        </div>
        <!-- /navbar-inner -->
      </div>


      <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="span3">
              <div class="sidebar">
                <ul class="widget widget-menu unstyled">
                  <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                  </a></li>
                  <li><a href="application.php"><i class="menu-icon icon-inbox"></i>Application</a>
                  </li>
                  <li><a href="status.php"><i class="menu-icon icon-tasks"></i>Status</a></li>
                  <li><a href="printapplication.php"><i class="menu-icon icon-list"></i>Print Form</a></li>
                </ul>
                <ul class="widget widget-menu unstyled">
                  <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                </ul>
              </div>
              <!--/.sidebar-->
            </div>


            <div class="span9">
              <center>
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



                  <div class="span9">
                    <div class="module">
                      <div class="module-head">
                        <h3>INFORMATION ON PREVIOUS INSTITUTION</h3>
                      </div>
                      <div class="module-body">

                        <br >
                        <div class="control-group">
                          <div class="controls">
                            <a href="adduni.php"><button type="submit" name="submit"class="btn btn-primary">Add Information</button></a>
                            <!-- <a href="edituni.php"><button type="submit" name="submit"class="btn btn-primary">Edit Information</button></a> -->
                          </div>
                        </div>
                        <?php
                        $matric = $_SESSION['matric'];
                        $sql="select * from ictras.prevuni where matric ='$matric' order by uniname ASC";
                        $result=$con->query($sql);
                        //$result=$conn->query($sql);
                        $row=$result->fetch_assoc();


                        $uniname=$row['uniname'];
                        $diplomaname=$row['diplomaname'];
                        $degreename=$row['degreename'];
                        $yearstudy=$row['yearstudy'];
                        $reason=$row['reason'];
                        $CGPA=$row['CGPA'];
                        ?>
                        <label class="control-label" for="uniname"><b>Name of Institutions: <?php echo $uniname ?></b></label>
                        <label class="control-label" for="diplomaname"><b>Name of Diploma (for transfer students): <?php echo $diplomaname ?></b></label>
                          <label class="control-label" for="degreename"><b>Name of Degree: <?php echo $degreename ?></b></label>
                          <label class="control-label" for="yearstudy"><b>Year of Study: <?php echo $yearstudy ?></b></label>
                          <label class="control-label" for="reason"><b>Reason of Leaving: <?php echo $reason ?></b></label>
                          <label class="control-label" for="CGPA"><b>CGPA:<?php echo $CGPA ?></b></label>

                        </div>
                      </div>



                          <div class="module">
                            <div class="module-head">
                          <label for="studentname"> <b>LIST OF COURSES TO BE CONSIDERED FOR CREDIT TRANSFER</b></label>
                        </div>
                        <div class="module-body">

                          <table class="table" id = "tables">
                            <thead>
                              <tr>
                                <th width="25%">Course Code</th>
                                <th width="40%">Course name</th>
                                <th width="5%">Credit Hours</th>
                                <th width="5%">Grade Obtained</th>


                              </tr>
                            </thead>
                            <tbody>
                              <?php

                              $query = "select * from ictras.coursereq where matric =?;";
                              $stmt = $connect->prepare($query);
                              $stmt->bindParam(1,$matric);
                              $check_submit=$stmt->execute();
                              $applicationlist = $stmt->fetchAll();
                              $stmt->closeCursor();

                              foreach ($applicationlist as $row)
                              {
                                $coursecode =$row['coursecode'];
                                $coursename=$row['coursename'];
                                $credithr=$row['credithr'];
                                $grade=$row['grade'];
                                ?>

                                <tr>
                                  <td><?php echo $coursecode  ?></td>
                                  <td><?php echo $coursename ?></td>
                                  <td><?php echo $credithr ?></td>
                                  <td><?php echo $grade ?></td>

                                <?php } ?>
                                <div class="control-group">
                                  <div class="controls">
                                    <a href="addcourse.php"><button type="submit" name="submit"class="btn btn-primary">Add Courses</button></a>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </tbody>
                        </table>


                          </div >
                        </div>
                      </div>
                    </div>
                  </div>
                  <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
                  <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
                  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                  <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
                  <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
                  <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
                  <script src="scripts/common.js" type="text/javascript"></script>

                </body>
                </html>

                <?php
              }
              ?>
