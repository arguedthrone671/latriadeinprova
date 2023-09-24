<?php 
    include('config/db_connect.php');

    if(isset($_POST['accept'])) {
        insert($_POST['id'], $conn);
    }

    function insert($id, $conn) {
        $insertQuery = "INSERT INTO prenotazioni SELECT * FROM prenotazioniprovvisorie WHERE id = '$id'";
        mysqli_query($conn, $insertQuery);

        $deleteQuery = "DELETE FROM prenotazioniprovvisorie WHERE id = '$id'";
        mysqli_query($conn, $deleteQuery);
    }

    header('location: areariservata.php');
?>