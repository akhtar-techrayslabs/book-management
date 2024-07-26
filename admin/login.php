<?php
  session_start();
  require 'db.php';
  if(isset($_POST['login']))
{
   $username=$_POST['username'];
   $password=$_POST['password'];
   $query=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' and password='$password'");
    $num=mysqli_fetch_array($query);
      if($num>0){
        $_SESSION['login']=$_POST['username'];
        $_SESSION['id']=$num['id'];
        $_SESSION['username']=$num['username'];
        header("location:index.php");
        exit();
      }else{
        header('location:login.php?invalide=Please Enter Valide Details to Login');
      }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
        <div class="container mt-5">
            <h1 class="text-center">Admin Login</h1>
            <form action="#" method="POST">
                <div class="mb-3 col-md-6 border-dark">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required placeholder = "Username">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder = "Password">
                </div>
                <button type="submit" class="btn btn-primary col-md-6" name="login">Login</button>
            </form><br><br>
            <?php
                     if(isset($_GET['invalide'])){
                           echo "<h6 class='text text-danger'>" . $_GET['invalide'] . "</h6>";
                       }
                  ?>
            <a href="../index.php">iBook Store</a>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
 