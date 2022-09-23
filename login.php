<?php
  include"navbar.php";
  include"connection.php";
?>
<!DOCTYPE html>
<html>
<head>
  
  <title> Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport"content="width=device-width,initial-scale=1">
    <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">

    <style type="text/css">
.box1
{
    height: 450px;
    width: 450px;
    background-color:#030002;
    margin:70px auto ;
    opacity: .6;
    color: white;
    padding: 20px;
}
label
{
  font-size: 18px;
  font-weight: 600;
}
       
    </style>
  
  </header>
<style type="text/css">
  nav
  {
    margin: 0px 0px 0px   ;
  }
  section
  {
    margin-top: -70px;
  }
  </style>
  
</head>
<body>
 
  <section>
    <div class="box1">
        <br><br>
        <h1 style=";font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
                <h1 style=";font-size: 25px;">User Login Form</h1>

        <form class="Login" action=""method="post">
          <b><p style="padding-left: 50px;font-size: 15px;font-weight: 700;"> Login as:</p></b>
          <input style="margin-left: 50px;width: 18px;" type="radio" name="user" id="admin" value="admin">
          <label for="Admin">Admin</label>
          <input style="margin-left: 50px;width: 18px;"  type="radio" name="user" id="student" value="student" checked>
          <label for="Student">Student</label>
        <div class="Login">
    <input class="form-control" type="text" name="username"placeholder="Username"required=""><br>
    <input class="form-control" type="password" name="password"placeholder="Password"required=""><br>
    <input class ="btn btn-default"type="submit" name="submit"value="Login" style="color: black;width: 30x;height: 30px;" >
  </div>
  <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color:yellow;text-decoration: none;"href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp  
        New to this website?<a style="color: yellow; text-decoration: none;" href="registration.php">&nbspSign Up</a>
      </p>
</form>
</section>
<?php

    if(isset($_POST['submit']))
    {
      if($_POST['user']=='admin')
      {
 $count=0;
      $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]'&& password='$_POST[password]';");
      $row=mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match</strong>
          </div>    
        <?php
      }
      else 
     {
      /*----------if username and password matches---*/

      $_SESSION['login_user']=$_POST['username'];
      $_SESSION['pic']=$row['pic'];
        ?>
          <script type="text/javascript">
            window.location="Admin/profile.php"
          </script>
        <?php
      
      }
    }
    else
      {
        $count=0;
      $res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]'&& password='$_POST[password]';");
      $row=mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match</strong>
          </div>    
        <?php
      }
      else 
     {
      $_SESSION['login_user']=$_POST['username'];
        ?>
          <script type="text/javascript">
            window.location="Student/profile.php"
          </script>
        <?php
      }
    }
  }

  ?>
<footer>
  
</footer>