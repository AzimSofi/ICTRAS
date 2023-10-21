<?php
include("connection.php");
error_reporting(0);
?>
<?php if($_SESSION['login']!="")
{?>

<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Welcome: </strong><?php echo htmlentities($_SESSION['sname']);?>
                    &nbsp;&nbsp;



                    <strong>Last Login:<?php
        $ret=mysqli_query($con,"SELECT  * from userlog where studentRegno='".$_SESSION['login']."' order by id desc limit 1,1");
                    $row=mysqli_fetch_array($ret);
                    echo $row['userip']; ?> at <?php echo $row['loginTime'];?></strong>
                </div>

            </div>
        </div>
    </header>
    <?php } ?>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="right-div">
                <a class="navbar-text" href="#" style="color:#fff; font-size:24px;4px; line-height:10px; ">
                <img src="studentphoto/UIAAAA.png" width="100" height="100">
                I-CTRAS (IIUM Credit Transfer Application System)
                </a>


            </div>
        </div>
    </div>
