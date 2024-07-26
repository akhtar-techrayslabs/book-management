<?php
     require 'conn.php';
     session_start();
     if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
      }

    try {
        $stmt = $pdo->query("SELECT * FROM book");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php require 'views/nav.php' ?>
    <h2 align="center">All Books</h2>
    <?php echo "<h2 align='center'>Hello @ ". $_SESSION['username'] . "</h2>"; ?><br><br>
    <!-- <h2 align="center"><a href="logout.php">Logout</a></h2> -->
    <div class="container">     
     <table class="table table-borderd border-dark">
        <thead>
            <tr>
            <!-- <th scope="col">Id</th> -->
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">ISBN</th>
            <th scope="col">Author</th>
            <th scope="col">Year</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr>
            <th scope="row">1</th>
            <td>Dark-Kight</td>
            <td>Based On True Story</td>
            <td>IBSN</td>
            <td>Unknown</td>
            <td>2014</td>
            <td><a href="" class=""><i class="icon-link icon-link-hover bi bi-bookmark-heart-fill h-5"></i></a></td>
            <td><a href=""><i class="bi bi-pencil-square"></i></a></td>
            </tr> -->
            <?php foreach ($data as $row): ?>
                 <tr>
                     <!-- <td><?php echo $row['id']; ?></td> -->
                     <td><?php echo $row['title']; ?></td>
                     <td><?php echo $row['description']; ?></td>
                     <td><?php echo $row['isbn']; ?></td>
                     <td><?php echo $row['author']; ?></td>
                     <td><?php echo $row['year']; ?></td>
                     <td><a href="addfav.php?bid=<?php echo $row['id'] ?>" class="text text-decoration-none">
                        <i class="icon-link icon-link-hover bi bi-bookmark-heart-fill h-5"></i>&nbsp&nbsp Add Favourite</a></td>
                 </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
            <?php
                if(isset($_GET['added'])){
                    echo "<h6 class='text text-success'>" . $_GET['added'] . "</h6>";
                }
            ?>
               <?php
             if(isset($_GET['already'])){
               echo "<h6 class='text text-warning'>" . $_GET['already'] . "</h6>";
             }
         ?>
    </div>
</body>
</html>
