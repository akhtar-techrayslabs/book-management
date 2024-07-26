
<!-- For Selecting The Data From Database into Form For Update...!!! -->

<?php

    require 'db.php';

    if (isset($_GET['id'])) {

        $id = $_GET['id'];
    
        $select = "SELECT * FROM `book` WHERE `id` = '$id'";
        
        $result = mysqli_query($conn,$select);

        if (!$result) {
            die('Book Not Updated');
        }else{
            $row = mysqli_fetch_assoc($result);
        }
    }

?>
    <!-- For Updating Books Data...!! -->
<?php

    if (isset($_POST['update'])) {

        if (isset($_GET['id_new'])) {

            $newid = $_GET['id_new'];
        }

        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $isbn = $_POST['isbn'];
        $auther = $_POST['auther'];
        $year = $_POST['year'];

        $update = "UPDATE `book` SET `title` = '$title', `description` = '$desc', `isbn` = '$isbn', `author` = '$auther', `year` = '$year' WHERE `id` = '$newid'";

        $result = mysqli_query($conn,$update);

        if (!$result) {
            die('Book Not Updated');
        }else{
            header('location:book.php?update=You Have Updated a Book Successfully.');
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update-Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'views/nav.php'  ?>
    <div class="container">
        <h1 class="text-center">Update Books</h1>
        <form action="update.php?id_new=<?php echo $id; ?>" method="POST">
        <div class="mb-3 col-md-6">
                <label for="id" class="form-label">Id</label>
                <input type="text" class="form-control" id="id" name="id" aria-describedby="emailHelp" value="<?php echo $row['id'] ?>" readonly>
            </div>
            <div class="mb-3 col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="<?php echo $row['title'] ?>" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="desc" class="form-label">Description</label>
                <input type="text" class="form-control" id="desc" name="desc"value="<?php echo $row['description'] ?>" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $row['isbn'] ?>"required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="auther" class="form-label">Auther</label>
                <input type="text" class="form-control" id="auther" name="auther" value="<?php echo $row['author'] ?>"required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control" id="year" name="year" value="<?php echo $row['year'] ?>"required>
            </div>
            <button type="submit" class="btn btn-primary col-md-2" name="update" value="update">Update</button>
            <a href="book.php" class="text text-decoration-none text-danger p-5 g-col-6">Cancle</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>