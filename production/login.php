<?php
  session_start();
  include "connection.php";

  if(isset($_POST['submit']))
  {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $selectquery = "select * from users where username='$username'";
    $select_result = mysqli_query($connection,$selectquery);
    $row = mysqli_fetch_assoc($select_result);
     if($row == null)
     {
      $insertquery = "insert into users(username,email,password) values('$username','$email','$password')";
      $result = mysqli_query($connection,$insertquery);
      $messages = "account created successfully, click to login";
     }

     else
     {
      $messages = "this username is already taken";
     }

  }
  else
  {
    $messages = "";
  }

  if(isset($_POST['login']))
  {
    $username = $_POST['username1'];
    $password = $_POST['password1'];

    $viewquery = "select * from users where username='$username'";
    $result1 = mysqli_query($connection,$viewquery);
    $row = mysqli_fetch_assoc($result1);
    
      $user = $row['username'];
      $pass = $row['password'];
      
      if($username == $user && $password == $pass)
    {
      $_SESSION['username']= $user;
      header("Location: index.php");
    }
    else
    {
      $message = "incorrect username or password";
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
              <h1>Login Form</h1>
              <h6 style="color:red;"><?php echo $message; ?></h6>
              <div>
                <input type="text" name="username1" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password1" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" name="login">log in</button>
                <a href="login2.php">Admin panel</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">are you a new user?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
              <div>
                  <h1><img src="images/mku1.jpg" alt=""> Mount Kenya University</h1>
                </div>
            <form method="post" >
              <h1>Create Account</h1>
              <h6><?php echo $messages; ?></h6>
              <div>
                <input type="text" name="username"class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" name = "email"class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" name="submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
