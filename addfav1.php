<?php

    session_start();
    require 'db.php';

    if (isset($_SESSION['id'])) {
        $uid = $_SESSION['id'];
        $bid = $_GET['bid'];

        // echo "<pre>";
        // print_r($uid);
        // echo "</br>";
        // print_r($bid);
        // echo "</pre>";

        $fvrt = "INSERT INTO `favourite` (`user_id`, `book_id`) VALUES('$uid', '$bid')";
        $result = mysqli_query($conn, $fvrt);

        //  echo "<pre>";
        // print_r($result);
        // echo "</br>";

        if (!$result) {
            echo "Data Not Inserted";
        }else{
            echo "Data Inserted";
        }
    }

?>