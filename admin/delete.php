<h1>Hello This Is Your Delete Page..</h1>

<?php

    require 'db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];        

        $delete = "DELETE FROM `book` WHERE `id` = '$id'";
        
        $result = mysqli_query($conn,$delete);

        if (!$result) {
            die('Book Not Deleted'.mysqli_error);
        }else{
            header('location:book.php?delete_msg=Book Deleted ');
        }
    }

?>