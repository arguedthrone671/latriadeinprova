<?php 
    include('config/db_connect.php');

    if(isset($_POST['refuse'])) {
        del($_POST['id'], $conn);
    }
    // deleting item from provvisory
    function del($id, $conn) {
        $deleteQuery = "DELETE FROM prenotazioniprovvisorie WHERE id = '$id'";
        mysqli_query($conn, $deleteQuery);
    }

    header('location: areariservata.php');
?>