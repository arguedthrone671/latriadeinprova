<?php 
    include('config/db_connect.php');

    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
    $luogo = mysqli_real_escape_string($conn, $_POST['luogo']);
    $data = mysqli_real_escape_string($conn, $_POST['date']);
    $menu = mysqli_real_escape_string($conn, $_POST['menu']);
    $persone = mysqli_real_escape_string($conn, $_POST['persone']);

    $query = "INSERT INTO prenotazioniProvvisorie(phone,nome,cognome,luogo,menu,datee,persone) VALUES('$phone', '$nome', '$cognome', '$luogo', '$menu', '$data', '$persone')";
    
    if(mysqli_query($conn, $query)):
        header('location: ricevuto.html');
    else:
        echo 'connection error: ' . mysqli_error($conn);
    endif;

    mysqli_close($conn);
?>