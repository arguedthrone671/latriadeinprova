<?php 
    include('config/db_connect.php');

    $query = 'SELECT * FROM prenotazioni ORDER BY -datee';

    $result = mysqli_query($conn, $query); // this ain't an array

    $prenotazioni = mysqli_fetch_all($result, MYSQLI_ASSOC); //now it's associative array

    $queryP = 'SELECT * FROM prenotazioniprovvisorie ORDER BY -datee';

    $resultP = mysqli_query($conn, $queryP); // this ain't an array

    $prenotazioniP = mysqli_fetch_all($resultP, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);
    mysqli_free_result($resultP);
    mysqli_close($conn);

    $precedentDate = "";
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
            <h1>La Triade</h1>
    </header>
    <div class="navbar" >
            <a href="prenotazione.html" class="navbarItem">Prenotazioni</a>
            <a href="menu.php" class="navbarItem">Asporto</a>
            <a class="navbarItem" href="chisiamo.html">Chi siamo</a>
            <a href="lavoraconnoi.html" class="navbarItem">Lavora con noi</a>  
            <a href="index.html" class="navbarItem">Home</a>          
          <!--è il cosino per il menù da telefono -->
            <div class="navMenu" style="background-color: white;"onclick="animateMenuBtn(this)">
                <div id="bar1" class="bar1"></div>
                <div id="bar2" class="bar2"></div>
                <div id="bar3" class="bar3"></div>
            </div>
        </div> 
        <!-- visibile solo su mobile -->
        <div class="altNavBar" id="altNavBar">
                <a href="prenotazione.html" >Prenotazioni</a>
                <!-- <div class="divSepare"></div> -->
                <a href="menu.php" >Asporto</a>
                <!-- <div class="divSepare"></div> -->
                <a  href="chisiamo.html">Chi siamo</a>
                <!-- <div class="divSepare"></div> -->
                <a href="lavoraconnoi.html" >Lavora con noi</a>
                <!-- <div class="divSepare"></div> -->
                <a href="index.html">Home</a>
        </div>

        <div style="margin-left:auto;margin-right:auto" id="noContent"></div>
        <div style="background-color:var(--secondaryVar);display:flex;flex-flow:column wrap;align-items:center; margin-left:auto; margin-right:auto; padding:5px;">
            
                <!-- oggetti da validare  (db latriade tab prenotazioniprovvisorie) -->
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
                    <!-- create div to display -->
                    <?php if($precedentDate != $p['datee']){ ?>
                                <div class="dateSepare" onclick="showPrenotazioni(this)">
                                    <h1 style="font-size: 54px"><?php echo 'Prenotazioni per il ' . $p['datee']; ?></h1>
                                
                    <?php $precedentDate = $p['datee']; ?>

                    <div class="hide" style="width: 75%">
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
                </div> <!-- closes line 78 -->
                    <?php } ?>
                <?php } ?>

                
        </div>
    </body>
    <script>

    </script>
    <script src="scripts.js"></script>
</html>