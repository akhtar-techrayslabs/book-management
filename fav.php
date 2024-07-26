<?php
session_start();
require 'db.php';
$uid = $_SESSION['id'];

$sql = "SELECT book.title, book.author,book.description, book.isbn, book.year, favourite.book_id 
        FROM book 
        INNER JOIN favourite ON book.id = favourite.book_id 
        WHERE favourite.user_id = $uid";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php require 'views/nav.php' ?>
    <center>
        <div class="container mt-5 d-flex justify-content-center align-items-center">
            <?php echo "<h4>Hello &nbsp&nbsp " . "<h3><a href='index.php' class='text text-decoration-none'>" . $_SESSION['username'] . "</a></h3>" . "<h4>&nbsp&nbsp This is  Your Favourite Books </h4>" . "</h4>"; ?><br><br>
        </div>
    </center>
    <!-- <h1 align="center">Favourite Books</h1> -->
    <div class="container">     
        <table class="table table-borderd border-dark">
            <thead class="mt-3">
              <tr>
                    <!-- <th scope="col">Id</th> -->
                    <!-- <th scope="col">User_ID</th> -->
                    <!-- <th scope="col">Book_ID</th> -->
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Auther</th>
                    <th scope="col">Year</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        <tbody>
        <?php if(!$result->num_rows > 0): ?>
            <tr>
                <td colspan="6" class="text-center"><?php echo '<h5>Data No Found</h5>';?></td>
            </tr>
        <?php endif; ?>
        <?php foreach ($result as $row): ?>
            <tr>
                <!-- <td><?php echo $row['id']; ?></td> -->
                <!-- <td><?php echo $row['user_id']; ?></td> -->
                <!-- <td><?php echo $row['book_id']; ?></td> -->
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['isbn']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['year']; ?></td>
                <td><?php echo $row['action']; ?>
                <a href="deletefav.php?id=<?php echo $row['book_id']; ?>" class="text-danger"><i class="bi bi-trash3"></i></a></td>
            </tr>
         <?php endforeach; ?>
        </tbody>
        </table>
        <?php
             if(isset($_GET['delete_msg'])){
               echo "<h6 class='text text-danger'>" . $_GET['delete_msg'] . "</h6>";
             }
         ?>
   </div>
</body>
</html>