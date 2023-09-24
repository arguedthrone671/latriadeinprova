<?php 
   $conn = mysqli_connect('localhost', 'Lorenzo', 'Lollofp', 'latriade');

    //check connection
    if(!$conn) {
        echo 'connection error: ' . mysqli_connect_error();
    }
?>