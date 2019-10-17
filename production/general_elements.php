<?php
    session_start();
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/mku1.jpg" type="image/ico" />
    <title>MKU</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div> -->

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/mku2.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['username'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Mount Kenya University</h3>
                <ul class="nav side-menu">
                  <li><a href="projects.php"><i class="fa fa-list-ol"></i>View Applicants </a></li>
                   
                  
                  <li><a><i class="fa fa-folder"></i> Report </a>
                   
                  </li>
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/mku1.jpg" alt=""><?php echo $_SESSION['username']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>General Elements</h3>
              </div>


            </div>

            <div class="clearfix"></div>

            <div class="">
 



              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-file-text"></i> students documents </h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#home" data-toggle="tab">National id</a>
                        </li>
                        <li><a href="#profile" data-toggle="tab">Diploma</a>
                        </li>
                        <li><a href="#messages" data-toggle="tab">course choice</a>
                        </li>

                      </ul>
                    </div>
                      <?php 
                        if(isset($_GET['edit']))
                        {
                          $id = $_GET['edit'];
                        }

                        $query = "select * from applications where id = '$id'";
                        $result = mysqli_query($connection,$query);
                        $row = mysqli_fetch_assoc($result);
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $nationalid = $row['nationalid'];
                        $diploma = $row['diploma'];
                        $department = $row['department'];
                        $faculty = $row['faculty'];
                        $program = $row['program'];
                        $username = $row['username'];
                      ?>
                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="home">
                        <div class="ui card" style="width:500px;">
                            <a class="image" href="#">
                              <img src="images/id.jpg">
                            </a>
                          <div class="content">
                              <a class="header" href="#"><?php echo $firstname . " " . $lastname ?></a>
                              <div class="meta">
                                <a><?php echo $username; ?></a>
                              </div>
                          </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="profile">
                        <div class="ui card" style="width:500px;">
                            <a class="image" href="#">
                              <img src="images/diploma.jpg">
                            </a>
                          <div class="content">
                              <a class="header" href="#"><?php echo $firstname . " " . $lastname ?></a>
                              <div class="meta">
                                <a><?php echo $username; ?></a>
                              </div>
                          </div>
                        </div>
                        </div>
                        <div class="tab-pane" id="messages">
                          <h2><strong>department:</strong></h2>
                          <p><?php echo $department; ?></p>
                          <br>
                          <h2><strong>faculty:</strong></h2>
                          <p><?php echo $faculty; ?></p>
                          <br>
                          <h2><strong>program:</strong></h2>
                          <p><?php echo $program; ?></p>
                          <br>
                          <a href="projects.php"><button style="float:right;" class="btn btn-primary">checked</button></a>
                        </div>
                      
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>

                  </div>
                </div>
              </div>


              <div class="clearfix"></div>


                        </div>
          <div class="clearfix"></div>
        </div>
        <!-- /page content -->

        <!-- footer content -->

        <!-- /footer content -->
      </div>
    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
      <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
      </ul>
      <div class="clearfix"></div>
      <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
  

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>