<?php
  session_start();
  include "connection.php";


  if(isset($_POST['login']))
  {
    $username = $_POST['username1'];
    $password = $_POST['password1'];
    $role1 = 'admin';
    $viewquery = "select * from users where username='$username'";
    $result1 = mysqli_query($connection,$viewquery);
    $row = mysqli_fetch_assoc($result1);
    
      $user = $row['username'];
      $pass = $row['password'];
      $role = $row['role'];
      
      if($username != $user && $password != $pass)
    {
      header("Location: login2.php");
    }
    elseif($username == $user && $password == $pass && $role1 == $role)
    {
      $_SESSION['role'] = $role;
      $_SESSION['username'] = $username;
      header("Location: projects.php");
    
    }
    else
    {
      header("Location: login2.php");
    
    }
    
    
    if(!$result1)
    {
      die("query failed");
    } 
  }
  else
  {
    $message = "";
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
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <div>
                  <h1><img src="images/mku1.jpg" alt=""> Mount Kenya University</h1>
                </div>
            <form method="post">
              <h1>Admin</h1>
              <h6 style="color:red;"><?php echo $message; ?></h6>
              <div>
                <input type="text" name="username1" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password1" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" name="login">log in</button>
                <a href="login.php">Go back</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
