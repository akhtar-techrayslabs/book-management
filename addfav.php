<?php

session_start();
require 'db.php';

    if (isset($_SESSION['username'])) {
      
        $uid = $_SESSION['id'];
      
        $bid = $_GET['bid'];

        $check = "SELECT book_id FROM `favourite` WHERE book_id = '$bid'";
        $query = mysqli_query($conn, $check);
        $result = mysqli_fetch_array($query);
        
        if($result > 0){
            header('location:home.php?already=This Book Already Added into Favourite Section');
            exit;
        }
        
        $insert = mysqli_query($conn,"INSERT INTO favourite(user_id, book_id) VALUES ($uid, $bid)");

        if (!$insert) {
            echo "Not Added";
        } else {
            header('location:home.php?added=Your Favourite Book Saved Successfully In Favourite Section.');
        }
    }else{
        header('location:login.php');
    }

?>
