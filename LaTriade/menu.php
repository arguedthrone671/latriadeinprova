<?php
    $connection = mysqli_connect('localhost', 'Lorenzo', 'Lollofp', 'laTriade'); //Il database locale è pw Lollofp, nome laTriade user Lorenzo

    //check connection
    if(!$connection) {
        echo 'connection error: ' . mysqli_connect_error();
    }

    $sql = 'SELECT * FROM pizze ORDER BY id';
    $result = mysqli_query($connection, $sql); // this ain't an array

    $pizze = mysqli_fetch_all($result, MYSQLI_ASSOC); //now it's associative array
    $paniniResult = mysqli_query($connection, 'SELECT * FROM panini ORDER BY id');
    $panini = mysqli_fetch_all($paniniResult, MYSQLI_ASSOC);
    
    //free result from memory
    mysqli_free_result($result);
    mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="it-IT">
    <head>
        <meta name="viewport" content="width = device-width, initial-scale = 1.0" />
        <title>Men&ugrave</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <h1 style="text-align:center">Men&ugrave<h1>
        </header>
        <div class="navbar" >
            <a href="prenotazione.html" class="navbarItem">Prenotazioni</a>
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
                <a href="index.html"> Home </a>
                <a href="prenotazione.html" >Prenotazioni</a>
                <!-- <div class="divSepare"></div> -->
                <a  href="chisiamo.html">Chi siamo</a>
                <!-- <div class="divSepare"></div> -->
                <a href="lavoraconnoi.html" >Lavora con noi</a>
                <!-- <div class="divSepare"></div> -->
                <a href="areaLogin.html" >Area riservata</a>
        </div>
        <div class="parallaxdiv">
        <div style="min-height:10px"></div>
            <div class="menutext" id="pizze">
                Pizze
            </div>
            <div class="menuItems">
                <?php foreach($pizze as $pizza) { ?>
                    <!-- <button class="button1" onclick="showMore(this)"><?php //echo htmlspecialchars($pizza['title']) ?></button> -->
                    <!-- <div class="hide"> -->
                        <div class="divDellaTendina">
                            <img class= "tendina" src="img/<?php echo $pizza['photo'] ?>">
                            <div class="tastini">
                                    
                                <p class="testoTendina">
                                    <?php echo $pizza['ingredients'] ?>
                                </p>
                                
                                <button class="button2Ps" onclick="order('<?php echo $pizza['title'] ?>', this)">
                                    Ordina                            
                                </button>
                            </div>
                        </div>
                    <!-- </div> -->
                <?php } ?>
            </div>
            <div style="min-height:10px"></div>
            <div class="menutext" id="panini">
                Panini
            </div>            
            <div class="menuItems">
                <?php foreach($panini as $panino) { ?>
                        <!-- <button class="button1" onclick="showMore(this)"><?php //echo htmlspecialchars($panino['title']) ?></button> -->
                        <div class="menu">
                            <div class="divDellaTendina">
                                <img class= "tendina" src="img/<?php echo $panino['photo'] ?>">
                                <div class="tastini">
                                    <p class="testoTendina">
                                        <?php echo $panino['ingredients'] ?>
                                    </p>

                                    <button class="button2Ps" onclick="order('<?php echo $panino['title'] ?>', this)">
                                        Ordina                            
                                    </button>
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </div>
            <div class="menuContent" id="menuContainer"> 
                <button class="button2Ps" onclick="scrollToView(this)"> Pizze </button>
                <button class="button2Ps" onclick="scrollToView(this)"> Pinse </button>
                <button class="button2Ps" onclick="scrollToView(this)"> Panini </button>
                <button class="button2Ps" onclick="scrollToView(this)"> Fritti </button>
                <button class="vieworder" onclick="showUnshowOrder()">Visualizza il tuo ordine</button>
            </div>
            <div class="hide" id="orderbg"></div> <!-- black-see-through background -->
            <div id="order" class="hide">
                <div id="orderToPut" class="verticalflex">
                    <!-- ordered thingies here -->
                </div>
                <div style="display:flex;flex-flow:row wrap;width: 100%;align-items:center;justify-content:center;">
                    <input id="nome" class="prenotazioniFields" type="text" placeholder="Nome" style="width:25%;text-align:center;"required>
                    <input id="telefono" class="prenotazioniFields" type="tel" placeholder="Numero telefono" style="width:25%;text-align:center;"required>
                </div>
                <div style="display:flex;flex-flow:row wrap;width: 100%;align-items:center;justify-content:center;">
                    <input id="data" class="prenotazioniFields" type="date" placeholder="inserisci la data del tuo ordine" style="width:25%;text-align:center;"required>
                    <input id="ora" class="prenotazioniFields" type="time" placeholder="inserisci l ora in cui vorrai ritirare il tuo ordine" style="width:25%;text-align:center;" required>
                </div>      
                <input id="indetroBtn" class="button2" style="width:25%;" onclick="showUnshowOrder()" value="Indietro">
                <button id="takeaway" class="button1" style="width:25%;"><a href="ricevuto.html" style="color:black;">Prenota takeaway</a></button>
            </div>
            <div style="min-height:150px"></div>
        </div>
        <footer class="indicazioni">
            <a class="infoLink" href="tel:0774 511356"> 0774 511356 </a>
            <a class="infoLink" href="https://maps.app.goo.gl/sKx1cThwKsT1VdV89?g_st=com.hammerandchisel.discord.Share" target="_blank"> Piazza San Giovanni, 30 &#149 Montecelio (RM)</a> 
            <a href="https://www.facebook.com/latriade2016" class="infoLink">Seguici su Facebook</a>
        </footer>
    </body>
    <script type="text/javascript">
        let phpPaniniText = <?php echo json_encode($panino['title']) ?>;
    </script>
    <script type="text/javascript" src="scripts.js"></script>
<html>