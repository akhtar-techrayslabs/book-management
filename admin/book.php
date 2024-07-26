<?php
    require 'conn.php';

    try {
        $stmt = $pdo->query("SELECT * FROM book");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        exit();
    }
?>

<?php
     session_start();
     require 'db.php';
     if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
      }
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
    <h1 align="center">All Books</h1>
    <div class="container">     
        <table class="table table-bordered border-dark">
            <form action="create.php">
                <button class="btn btn-outline-primary float:right mb-3"><i class="bi bi-plus-circle"></i>&nbsp&nbsp Add</button></br>
            </form>
         <thead class="mt-3">
                <tr>
                    <th scope="col">Id</th>
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
                <td><a href="" class="text-danger"><i class="bi bi-trash3"></i></a>&nbsp&nbsp&nbsp<a href="" class="text-dark"><i class="bi bi-pencil-square"></i></a></td>
                <td><a href=""><i class="bi bi-pencil-square"></i></a></td>
            </tr> -->
            <?php if(!$data > 0): ?>
                <tr>
                    <td colspan="7" class="text-center"><?php echo '<h5>Data No Found</h5>';?></td>
                </tr>
            <?php endif; ?>
            <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="text-danger"><i class="bi bi-trash3"></i></a>
            &nbsp&nbsp&nbsp<a href="update.php?id=<?php echo $row['id']; ?>" class="text-dark"><i class="bi bi-pencil-square"></i></a></td>

        </tr>
    <?php endforeach; ?>
        </tbody>
        </table>
        <?php
            if(isset($_GET['add_msg'])){
                echo "<h6 class='text text-success'>" . $_GET['add_msg'] . "</h6>";
            }
        ?>
        <?php
            if(isset($_GET['delete_msg'])){
                echo "<h6 class='text text-danger'>" . $_GET['delete_msg'] . "</h6>";
            }
        ?>
         <?php
            if(isset($_GET['update'])){
                echo "<h6 class='text text-success'>" . $_GET['update'] . "</h6>";
            }
        ?>
          <?php
            if(isset($_GET['delete'])){
                echo "<h6 class='text text-danger'>" . $_GET['delete'] . "</h6>";
            }
        ?>
    </div>
</body>
</html>