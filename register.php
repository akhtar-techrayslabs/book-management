<?php
    // session_start();    
    require 'db.php';

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['bdate'];
    $password=$_POST['password'];
    $hpassword=password_hash($password, PASSWORD_DEFAULT);
    $fname=$_POST['fname'];
    $lname = $_POST['lname'];
   
    $len = strlen($phone);

    if ($len > 10) {
        header('location:register.php?invalide=Please Enter Valide Phone Number');
        header('location:register.php'); 
    }
    if ($len < 10) {
             header('location:register.php?invalide=Please Enter Valide Phone Number');
             $conn->close();
    }

        $check = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn,$check);
        $num = mysqli_fetch_array($result);

        if($num > 0){
            header('location:register.php?registerd=Username or Email Already Exist.! Please Choose Another One...');
            $conn->close();
        }else{
            $query=mysqli_query($conn,"INSERT INTO `user`(`fname`, `lname`, `username`, `email`, `phone`, `dob`, `password`) VALUES
                                                         ('$fname', '$lname', '$username','$email','$phone', '$dob', '$hpassword')");
             if($query)
             {
                   header('location:register.php?success=Registration Process Completed Successfully');
              }
            }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'views/nav.php'  ?>
    <div class="container mt-2">
        <h1 class="text-center">SignUp to Our Website....!!</h1>
        <!-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. -->
                    <?php
                     if(isset($_GET['invalide'])){
                           echo "<h6 class='text text-danger'>" . $_GET['invalide'] . "</h6>";
                       }
                   ?>
                  
                   <?php
                     if(isset($_GET['registerd'])){
                           echo "<h6 class='text text-danger'>" . $_GET['registerd'] . "</h6>";
                       }
                 ?>
                     <?php
                     if(isset($_GET['success'])){
                           echo "<h6 class='text text-success'>" . $_GET['success'] . "</h6>";
                       }
                  ?>
        <form action="" method="POST">
        <div class="mb-3 col-md-6">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp" required placeholder = "First Name">
            </div>
            <div class="mb-3 col-md-6">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" aria-describedby="emailHelp" required placeholder = "Last Name">
            </div>
            <div class="mb-3 col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required placeholder = "UserName">
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder = "Email">
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder = "Password">
            </div>
            <div class="mb-3 col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required maxlength="10" placeholder = "Phone Number">
            </div>
            <div class="mb-3 col-md-6">
                <label for="bdate" class="form-label">DOB</label>
                <input type="date" class="form-control" id="bdate" name="bdate" required placeholder = "Date of Birth">
            </div>
            <button type="submit" class="btn btn-primary col-md-6" name="submit">Signup</button>
        </form><br>
        <a href="login.php">Login</a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>