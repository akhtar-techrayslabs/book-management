<?php
    require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $isbn = $_POST['isbn'];
    $auther = $_POST['auther'];
    $year = $_POST['year'];
        $len = strlen($isbn);
     
    try {
        $stmt = $pdo->prepare("INSERT INTO book (title, description, isbn, author, year ) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $desc, $isbn, $auther, $year]);
        
        header('location:book.php?add_msg=You Have Book Added Successfully');
    } catch (PDOException $e) {
        if($len > 13){       
            header('location:create.php?long=Please Enter ISBN number Between 1 to 13');
        }       
     
    }
}

session_start();
require 'db.php';
if (!isset($_SESSION['username'])) {
   header('Location: login.php');
   exit;
 }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add-Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'views/nav.php'  ?>
    <div class="container mt-5">
        <h1 class="text-center">Add New Books</h1>
        <?php
                if(isset($_GET['long'])){
                    echo "<h6 class='text text-danger'>" . $_GET['long'] . "</h6>";
                }
            ?>
        <form action="create.php" method="POST">
            <div class="mb-3 col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Book Title" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="desc" class="form-label">Description</label>
                <input type="text" class="form-control" id="desc" name="desc" placeholder="Book Description" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Book ISBN" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="auther" class="form-label">Author</label>
                <input type="text" class="form-control" id="auther" name="auther" placeholder="Book Author" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="year" class="form-label">Year</label>
                <input type="year" class="form-control" id="year" name="year" placeholder="Book Release Year" required>
            </div>
            <button type="submit" class="btn btn-primary col-md-2">Add</button>
            <a href="book.php" class="text text-decoration-none text-danger p-5 g-col-6">Cancle</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>