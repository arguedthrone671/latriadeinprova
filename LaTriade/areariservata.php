<?php 
    include('config/db_connect.php');

    $query = 'SELECT * FROM prenotazioni';

    $result = mysqli_query($conn, $query); // this ain't an array

    $prenotazioni = mysqli_fetch_all($result, MYSQLI_ASSOC); //now it's associative array

    $queryP = 'SELECT * FROM prenotazioniprovvisorie';

    $resultP = mysqli_query($conn, $queryP); // this ain't an array

    $prenotazioniP = mysqli_fetch_all($resultP, MYSQLI_ASSOC);

    // free result from memory
    // mysqli_free_result($result);
    // mysqli_free_result($resultP);
    // mysqli_close($conn);

    function lol($id) {
        echo 'id is ' . $id;
        // $query = "SELECT FROM prenotazioniprovvisorie WHERE id = '$id'";
        // $toMove = mysqli_query($conn, $query);
        // $toMoveAssoc = mysqli_fetch_all($toMove, MYSQLI_ASSOC);
        
        // foreach($toMoveAssoc as $t) {
        //     $moveQuery = "INSERT INTO prenotazioni(phone,nome,cognome,luogo,menu,datee,persone) VALUES phone = " . $t['phone'] . ", nome = ". $t['nome']. ", cognome = " . $t['cognome']. ", luogo = " . $t['luogo'] . ", menu = " . $t['menu'] . ", datee = " . $t['datee'] . ", persone = " . $t['persone'];
        //     $deleteQuery = "DELETE FROM prenotazioniprovvisorie(id,phone,nome,cognome,luogo,menu,datee,persone) WHERE id = " . $t['id'];

        //     //query
        //     mysqli_query($conn, $moveQuery);
        //     // echo 'moved';

        //     mysqli_query($conn, $deleteQuery);
        // }
    }
?>




<!DOCTYPE html>
<html lang="it-IT">
    <head>
        <title>Area riservata La Triade</title>
        <meta name="viewport" content="width = device-width, initial-scale = 1.0" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header style="width: 100%">
            <div class="headImg">
                <h1>Area riservata</h1>
            </div>
        </header>
        <div style="margin-left:auto;margin-right:auto" id="noContent"></div>
        <div style="background-color:var(--secondaryVar);display:flex;flex-flow:column wrap;align-items:center; margin-left:auto; margin-right:auto; padding:5px;">
            
                <!-- oggetti da validare  (db latriade tab prenotazioniProvvisorie) -->
                    <?php foreach($prenotazioniP as $p) { ?>
                        <div class="scrittura" style="width: 75%">
                            <h3 id="nomeCognome">Prenotazione di <?php echo $p['nome'] . ' ' . $p['cognome']; ?> per il <?php echo $p['datee']; ?></h3>
                            <div class="divSepare" style="border: 1px solid var(--primaryColor)"></div>
                            <p>Numero persone: <?php echo $p['persone']; ?></p>
                            <div class="divSepare" style="border: 1px solid var(--primaryColor)"></div>
                            <p>Men&ugrave:</p><br>
                            <p style="text-align: left"><?php echo $p['menu'];?></p>
                            <div class="divSepare" style="border: 1px solid var(--primaryColor)"></div>
                            <p>Numero di telefono: <?php echo $p['phone']; ?></p>
                            <div class="divSepare" style="border: 1px solid var(--primaryColor);"></div>
                            <p>Preferirebbe stare: <?php echo $p['luogo']; ?></p>
                            <div class="divSepare"></div>
                            <div style="display:flex;flex-flow: row wrap;width:100%;justify-content:center">

                            <!-- accept -->
                                <form action="insert.php" method="POST" style="width:35%;margin:5px">
                                    <input type="text" class="hide" value="<?php echo $p['id']; ?>" name="id">
                                    <input class="okBtn" type="submit" name="accept" value="Accetta">
                                </form>
                            <!-- refuse -->
                                <form action="delete.php" method="POST" style="width:35%;margin:5px">
                                    <input type="text" class="hide" value="<?php echo $p['id']; ?>" name="id">
                                    <input class="noBtn" type="submit" name="refuse" value="Rifiuta">
                                </form>

                            </div>
                        </div>
                    <?php } ?>
                
             <!-- oggetti validati (db latriade tab prenotazioni) -->
                <?php foreach($prenotazioni as $p) { ?>
                    <div class="scrittura" style="width: 75%">
                        <h3 id="nomeCognome">Prenotazione di <?php echo $p['nome'] . ' ' . $p['cognome']; ?> per il <?php echo $p['datee']; ?></h3>
                        <div class="divSepare" style="border: 1px solid var(--primaryColor)"></div>
                        <p>Numero persone: <?php echo $p['persone']; ?></p>
                        <div class="divSepare" style="border: 1px solid var(--primaryColor)"></div>
                        <p>Men&ugrave:</p><br>
                        <p style="text-align: left"><?php echo $p['menu'];?></p>
                        <div class="divSepare" style="border: 1px solid var(--primaryColor)"></div>
                        <p>Numero di telefono: <?php echo $p['phone']; ?></p>
                        <div class="divSepare" style="border: 1px solid var(--primaryColor);"></div>
                        <p>Preferirebbe stare: <?php echo $p['luogo']; ?></p>
                        <div class="divSepare"></div>
                        <div style="display:flex;flex-flow: row wrap;width:100%;justify-content:center">
                            <button class="button1Ps" style="font-family: 'anton';">Completata</button>
                        </div>
                    </div>
                <?php } ?>

                
        </div>
    </body>
    <script>

    </script>
    <script src="scripts.js"></script>
</html>