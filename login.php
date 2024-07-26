<?php
  require 'db.php';
  session_start();
  if(isset($_POST['login']))

{
   $username=$_POST['username'];
   $password=$_POST['password'];

   $query=mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");
    $num=mysqli_fetch_array($query);
      
       if(!$num){ 
        header('location:login.php?invalide=Please Enter Valide Details to Login');

        }else{
          if(password_verify($password, $num['password'])){
            $_SESSION['id']=$num['id'];
            $_SESSION['username'] = $num['username'];
    
            header("location:index.php");

            exit(); 
          }  
        }
      
    }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'views/nav.php' ?>
    <div class="container mt-5">
        <h1 class="text-center">Login to Our Website....!!</h1>
        <form action="login.php" method="POST">
            <div class="mb-3 col-md-6 border-dark">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required placeholder = "UserName">
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder = "Password">
            </div>
            <button type="submit" class="btn btn-primary col-md-6" name="login">Login</button>
        </form><br>
                  <?php
                     if(isset($_GET['invalide'])){
                           echo "<h6 class='text text-danger'>" . $_GET['invalide'] . "</h6>";
                       }
                  ?>
        <a href="register.php" class="p-10">Register</a>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>