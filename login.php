<?php
include('includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            background-image: url('images/school.jpg');
        }
       .title{
        text-align:center;
        margin-top:5%;
       }
       

        .login-form input {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            margin-left:50px;
            box-sizing: border-box;
            border-radius: 8px;
        }
        .container{
background:#fff;
 margin: 7%;
 width: 70%;
 height: 70vh;
 border-radius: 10px;
 box-sizing: border-box;
 
}
        
    </style>
</head>
<body>
<div class="container">
<img src="images/teaching.jpg" class="img">
    <div class="thumbnail">
      <h1>Unlocking Learning Potential: Connecting teachers and students for collaborative learning success.</h1>
      <h3>A Collaboration Site</h3>
    </div>

    <form action="" class="button" style=" display: flex;">
    <input  class="btn" type="submit" name="student" value="STUDENT">
    <input class="btn"type="submit" name="teacher" value="TEACHER">
  </form>
    <?php
        if(isset($_GET['student']))
        {
            
            echo "<h2 class='title' >Student Login</h2>
            <form class='login-form' method='post'>
            <input type='text' placeholder='Username' name='stu_username' required>
            <input type='password' placeholder='Password' name='stu_password' required>
            <input class='btn2' type='submit' name='stu_login' value='Login'>
           
        </form>";
        }
        if(isset($_GET['teacher']))
        {
            echo "<h2  class='title' >Teacher Login</h2>
            <form class='login-form' method='post'>
            <input type='text' placeholder='Username' name='tea_username' required>
            <input type='password' placeholder='Password' name='tea_password' required>
            <input class='btn2' type='submit' name='tea_login' value='Login'>
            </form>";
        }
   ?>  
</div>
</body>
</html>
 <?php
        if(isset($_POST['stu_login']))
        {
            $username = $_POST['stu_username'];
            $password = $_POST['stu_password'];
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            if($username=='student' && $password=='pcce'){
                 echo "<script>window.open('student.php','_self')</script>"; 
                 echo "<script>alert('login sucess')</script>";
            }
            else{
                echo "<script>alert('invalid credentials')</script>";
                echo "<script>window.open('login.php','_self')</script>"; 
            }
            
            
        }
        if(isset($_POST['tea_login']))
        {
            $username = $_POST['tea_username'];
            $password = $_POST['tea_password'];
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            if($username=='teacher' && $password=='pcce'){
                 echo "<script>window.open('teacher.php','_self')</script>"; 
                 echo "<script>alert('login sucess')</script>";
            }
            else{
                echo "<script>alert('invalid credentials')</script>";
                echo "<script>window.open('login.php','_self')</script>"; 
            }
            
        }
        ?>