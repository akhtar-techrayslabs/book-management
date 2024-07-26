<h1>Hello This Is Your Delete Page..</h1>

<?php
    // session_start(); 
     require 'db.php';

    if (isset($_GET['id'])) {

        $bid = $_GET['id'];
        echo "</br>";
        print_r($bid);

        $delete = "DELETE FROM `favourite` WHERE `book_id` = '$bid'";
        
        $result = mysqli_query($conn,$delete);

        if (!$result) {
            die('Book Not Deleted'.mysqli_error);
        }else{
            header('location:fav.php?delete_msg=You Deleted Your Favourite Book');
        }
    }
    

?>