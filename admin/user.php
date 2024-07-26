<?php
  require 'conn.php';

    try {
        $stmt = $pdo->query("SELECT * FROM user");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    <?php require 'views/nav.php' ?>
    <h1 align="center">All Users</h1>
    <div class="container">
        
        <table class="table table-bordered border-dark">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Fisrt Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <!-- <th scope="col">Password</th> -->
          <th scope="col">DOB</th>
        </tr>
      </thead>
      <tbody>
        <!-- <tr>
          <th scope="row">1</th>
          <td>Akhtar</td>
          <td>akhtar@gmail.com</td>
          <td>9316604045</td>
          <td>3141</td>
          <td>15/09/2003</td>
        </tr> -->

    <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <!-- <td><?php echo $row['password']; ?></td> -->
            <td><?php echo $row['dob']; ?></td>
        </tr>
    <?php endforeach; ?>
   </tbody>
    </table>
    </div>
</body>
</html>