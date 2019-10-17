<?php
    session_start();
    include "connection.php";

    if(isset($_GET['approve']))
    {
      $id = $_GET['approve'];
      $query = "insert into approved(id,username,firstname,lastname,gender,department,faculty,program) select id,username,firstname,lastname,gender,department,faculty,program from applications where id = '$id'";
      $select = mysqli_query($connection,$query);

      $query3 = "insert into allapplications(id,username,firstname,lastname,gender,department,faculty,program) select id,username,firstname,lastname,gender,department,faculty,program from applications where id = '$id'";
      $select3 = mysqli_query($connection,$query3);
      
      $query2 = "delete from applications where id = '$id'";
      $select2 = mysqli_query($connection,$query2);

    }

    if(isset($_GET['decline']))
    {
      $id = $_GET['decline'];
      $query = "insert into rejected(id,username,firstname,lastname,gender,department,faculty,program) select id,username,firstname,lastname,gender,department,faculty,program from applications where id = '$id'";
      $select = mysqli_query($connection,$query);

      $query3 = "insert into allapplications(id,username,firstname,lastname,gender,department,faculty,program,status = '0') select id,username,firstname,lastname,gender,department,faculty,program from applications where id = '$id'";
      $select3 = mysqli_query($connection,$query3);
      
      $query2 = "delete from applications where id = '$id'";
      $select2 = mysqli_query($connection,$query2);

    }
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
    <title>MKU </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

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
                <h2>Admin</h2>
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
                   
                  
                  <li><a href="report.php"><i class="fa fa-folder"></i> Report </a>
                   
                  </li>
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
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
                    <img src="images/mku1.jpg" alt="">Admin
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
           
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of applicants</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 20%">student names</th>
                          <th>Gender</th>
                          <th>Documents</th>
                          <th style="width: 20%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $query = "select * from applications";
                          $select = mysqli_query($connection,$query);

                          while($row = mysqli_fetch_assoc($select))
                          {
                            $id = $row['id'];
                            $fname = $row['firstname'];
                            $lname = $row['lastname'];
                            $middlename = $row['middlename'];
                            $gender = $row['gender'];
                            

                        ?>
                        <tr>
                          
                          <td>
                            <a><?php echo $fname . " " . $lname . " " . $middlename ?></a>
                            <!-- <br />
                            <small>Created 01.01.2015</small> -->
                          </td>
                          <td>
                          <?php echo $gender ?>
                          </td>
                          
                          <td>
                          <a href='general_elements.php?edit=<?php echo $id; ?>' class="btn btn-info btn-xs"><i class="fa fa-folder"></i> view documents </a>
                          </td>
                          <td>
                            
                            <a href='projects.php?approve=<?php echo $id; ?>' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> approve </a>
                            <a href='projects.php?decline=<?php echo $id; ?>' class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> reject </a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            2019 <a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
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
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>