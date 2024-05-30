<?php

    session_start();
    if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}


  
?>


<html>
<?php 
        $conn = mysqli_connect("localhost", "root", "", "testwb1") or die(mysqli_connect_error());
        $pet = mysqli_real_escape_string($conn, $_GET['q']);
        $_SESSION['pet']= $pet;


        $query = "SELECT * FROM pets_adoption WHERE pet = '$pet'"; // la variabile $pet va messa tra apici perché è una stringa, (e per evitare vulnerabilità)
        $pet=  str_replace('_', ' ', $pet); 
        $res_1 = mysqli_query($conn, $query);

        if ($res_1) {
            $petinfo = mysqli_fetch_assoc($res_1);   
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        



    ?>
<head>
    <META NAME="GENERATOR" Content="Microsoft Visual Studio">
    <TITLE>Adozioni-WWF</TITLE>
    <link rel="icon" type="image/png" href="immagini/Emblem-WWF.jpg">


    <link rel="stylesheet" href="mhw3.css" />
    <link rel="stylesheet" href="adoptions.css" />

    <script src="mhw3.js" defer></script>
    <script src="adoptions.js" defer></script>

    <!-- intestazione per bebas neue-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- intestazione per roboto-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- intestazione per wwf regular-->
    <link href="https://db.onlinewebfonts.com/c/596b9b0742c4fb004a2adcaf9861a128?family=WWF+Regular" rel="stylesheet">
    <!-- intestazione per icone dropbox e frecce-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    <!-- intestazione per mobile-->
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

</head>

<BODY>
    <header>
        <div id="overlay"></div>

        <img id="sfondo-mobile" src="immagini/backgorund-image-elephant-1-1.jpg" data-id="elephant" />
        <img id="sfondo-header"src=" <?php echo $petinfo['sfondo'] ?> "></img>


        <span id="arrow-mobile">
            <span class="material-symbols-outlined   right"> arrow_circle_right </span>
            <span class="material-symbols-outlined   left"> arrow_circle_left </span>
        </span>

        <nav>

            <img id="logo_wwf" src="immagini\wwf_logo.jpg.webp" />


            <div id="links">
                <a>DONAZIONI</a>
                <a>ADOZIONI</a>
                <a>ISCRIZIONI</a>
                <a>JUNIOR</a>
                <a>ALTRI MODI PER DONARE</a>

            </div>

            <div id="dropbox">
                <a class="dropbox-items">
                    <span> SOSTIENI WWF</span>  <span class="material-symbols-outlined"> add </span>
                </a>

                <div id="dropbox-hidden" class="hidden">

                    <a class="dropbox-items" href="profile.php">
                        <span> PROFILE </span>  <span class="material-symbols-outlined">account_circle</span>
                    </a>

                    <a class="dropbox-items" href="mhw3-Page2.php">
                        <span> WIKI </span>  <span class="material-symbols-outlined">language</span>
                    </a>

                    <a class="dropbox-items" href="mhw3-Page3.php">
                        <span> NEWS </span>  <span class="material-symbols-outlined"> id_card </span>
                    </a>

                    <a class="dropbox-items" href='logout.php'>
                        <span> LOGOUT </span>  <span class="material-symbols-outlined">logout</span>
                    </a>

                </div>
            </div>

            <div id="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>




        </nav>

        <section id="corpo_header">
            <p><strong> <a>WWF SOSTIENI</a> > <a>ADOZIONI</a> >  <?php echo $pet  ?></strong></p>

            <h1>ADOTTA </h1>
            <h1>UN <?php echo $pet ?></h1>

          
        </section>
    </header>





        <section id="corpo_pagina">

            <div id="introduzione">
                <p> <?php echo $petinfo['introduzione']  ?></p>
            </div>

            <div id="welcome-kit">
                <h1> ADOTTA UN <?php echo $pet  ?> E RICEVI IL NOSTRO <br> WELCOME KIT</h1>
                <p>Scegliendo l’adozione con peluche WWF riceverai il Welcome Kit direttamente a casa tua. Con<br>
                l’adozione digitale farai una scelta completamente paper-free e riceverai il tuo welcome kit via email.</p>
                <div id="kits-box">
                    <div class="kit">
                        <img src=" <?php echo $petinfo['Welcome_Kit_con_Peluche'] ?> "></img>
                        <span>Welcome Kit con Peluche</span>
                        <a><span>COSA CONTIENE IL TUO KIT</span> <span class="material-symbols-outlined" > expand_more </span> </a>
                    </div>

                    <div class="kit">
                        <img src="<?php echo $petinfo['Welcome_Kit_digitale'] ?>"></img>
                        <span>Welcome Kit digitale</span>
                        <a><span>COSA CONTIENE IL TUO KIT</span><span class="material-symbols-outlined" >expand_more</span></a>
                    </div>

                    <div class="kit">
                        <img src="<?php echo $petinfo['Kit_Peluche_Junior'] ?>"></img>
                        <span>Kit Peluche Junior</span>
                        <a><span>COSA CONTIENE IL TUO KIT</span><span class="material-symbols-outlined" > expand_more</span></a>
                    </div>

                    <div class="kit">
                        <img src="<?php echo $petinfo['Kit_Digitale_Junior'] ?>"></img>
                        <span>Kit Digitale Junior</span>
                        <a><span>COSA CONTIENE IL TUO KIT</span><span class="material-symbols-outlined" > expand_more</span></a>
                    </div>
                </div>
            </div>

            <div id="minacce-div">
                <h1>LE MINACCE CHE DEVE AFFRONTARE IL <?php echo $pet  ?></h1>
                <p><?php echo $petinfo['minacce_introduzione']  ?></p>
                <div id="minacce-box">

                    <div class="minaccia" id="minaccia1">
                        <img src="<?php echo $petinfo['minacce_1_immagine'] ?>"></img>
                        <h2><?php echo $petinfo['minacce_1_titolo'] ?></h2>
                        <p><?php echo $petinfo['minacce_1_contenuto'] ?></p>
                    </div>

                    <div class="minaccia" id="minaccia2">
                        <img src="<?php echo $petinfo['minacce_2_immagine'] ?>"></img>
                        <h2><?php echo $petinfo['minacce_2_titolo'] ?></h2>
                        <p><?php echo $petinfo['minacce_2_contenuto'] ?></p>
                    </div>

                </div>

            </div>

            <div id="adozione">

                <div id="grazie_alla_donazione">

                    <img src="<?php echo $petinfo['grazie_alla_donazione_img'] ?>"></img>

                    <div class="adozione-paragrafo">
                        <h2>Cosa faremo grazie alla tua adozione</h2>
                        <p><?php echo $petinfo['grazie_alla_donazione'] ?></p>
                    </div>

                </div>

                
                <div id="regalo_donazione">

                    <div class="adozione-paragrafo">
                        <h2>Regala l’adozione di un <?php echo $pet ?></h2>
                        <p><?php echo $petinfo['regalo_adozione'] ?></p>
                    </div>

                    <img src="<?php echo $petinfo['regalo_adozione_img'] ?>"></img>

                </div>


            </div>


            <div id="vantaggi_adozione">
                <h1>I VANTAGGI DELL'ADOZIONE REGOLARE</h1>
                <p>Con un'adozione regolare rimani al fianco della specie adottata ogni giorno: come ringraziamento riceverai tantissimi vantaggi</p>
                <div id="vantaggi_adozione_flex">
                    <div class="vantaggi_adozione_flex_box" id="vantaggi_adozione_sx">
                        <img src="immagini2/PizzoMarcello-Visitare-gratuitamente-oasi-WWF.jpg.webp"></img>
                        <h3>Accedere gratuitamente alle oasi WWF</h3>
                        <p>Grazie alla tua card avrai l’accesso gratuito ai 35.000 ettari di natura incontaminata su tutto il territorio nazionale che il WWF tutela e difende grazie al tuo aiuto</p>
                    </div>
                    <div class="vantaggi_adozione_flex_box" id="vantaggi_adozione_dx">
                        <img src="immagini2/ValoreOasi-492.jpg.webp"></img>
                        <h3>Accedere all'area riservata</h3>
                        <p>Avrai un’area riservata con contenuti esclusivi da dove poter scaricare anche la tua certificazione fiscale per la dichiarazione dei redditi</p>


                    </div>


                </div>

            </div>

        </section>

        <section id="form-section"  class='form-start-position'>
            <h2>Aiutaci a salvare il <?php echo $pet  ?></h2>
            <p>La tua adozione contribuisce ai progetti sul campo del WWF in difesa della specie</p>
            <div id="form-corpo">
                <div id="tipo-donazione">
                    <h3>Scegli il tipo di donazione</h3>
                    <button class="button-tipo selected current" >Donazione singola</button>
                    <button class="button-tipo unselected" >Donazione mensile</button>
                </div>

                <div id="quantita-donazione">
                    <h3>Scegli quanto donare</h3>
                    <button class="button-quantita1 selected current">30€</button>
                    <button class="button-quantita1 unselected ">50€</button>
                    <button class="button-quantita1 unselected">80€</button>
                </div>
                

                <div id="kit-buttons">
                    <h3>Che kit di benvenuto desideri ricevere? <span class="material-symbols-outlined">help</span> </h3>
                    <button class="button-kit selected current" >Welcome Kit con Peluche</button>
                    <button class="button-kit unselected" >Welcome Kit Digitale</button>

                    <input type="checkbox" id="checkbox">Desidero la versione Junior del Welcome Kit scelto
                </div>
            </div>

            <div id="form-fine">
                <input type="checkbox" id="checkbox-regalo"checked>Questa adozione è un regalo<br>
                <a>METTI NEL CARRELLO</a>
            </div>

        </section>








    <section id="fondo">
        <h1><strong>Più forti, con te al nostro fianco.</strong></h1>
        <span>
            Grazie alla <a>tua donazione</a> inizierai a tracciare una strada nuova fatta di consapevolezza e azioni concrete per la difesa della nostra straordinaria biodiversità.  In ogni progetto del WWF Italia <br />
            ci sarà la tua scelta di agire, di stare in prima linea nella battaglia per la protezione degli animali a rischio e della Natura
        </span>
    </section>

    <footer>

        <div id="footer_titolo">
            <h1>Puoi fidarti di WWF</h1>
        </div>


        <div class="footer_sezione">
            <div id="Come_usiamo_i_fondi_raccolti">
                <img src="immagini\grafico_fondi.png" />
                <div>
                    <h2><strong>Come usiamo i fondi raccolti</strong></h2><br /><br />
                    <a>Scopri di più</a><br /><br />
                    <div class="righe-grafico"> <span class="Blocco verde"> 73% </span> <span> Attività di programma</span></div><br />
                    <div class="righe-grafico"> <span class="Blocco arancione"> 22% </span> <span> Attività di raccolta fondi</span></div><br />
                    <div class="righe-grafico"> <span class="Blocco grigio"> 2% </span> <span> Attività di supporto generale</span></div><br />
                    <div class="righe-grafico"> <span class="Blocco ocra"> 3% </span> <span> Altri oneri</span></div>
                </div>
            </div>

            <div id="Pagamenti_sicuri">
                <h2><strong>Pagamenti sicuri</strong></h2>
                <p>
                    Le donazioni fatte con carta di credito transitano
                    su una piattaforma sicura GestPay di Banca Sella
                    che garantisce la massima sicurezza.
                </p>
                <div id="loghi">
                    <img src="immagini\mastercard-logo-black-and-white.png" />
                    <img src="immagini\visa_logo_icon_144755.png" />
                    <img src="immagini\512px-Apple_Pay_logo.svg.png" />
                    <br />
                    <img src="immagini\google-pay-icon-2048x769-4r31dwl3.png" />
                    <img src="immagini\paypal-back-white-38971.png" />
                    <img src="immagini\kisspng-centurion-card-american-express-credit-card-logo-5af54e270e2fb1.7490624015260257670581.jpg" />
                </div>


            </div>


            <div id="Detrazioni">
                <h2><strong>Detrazioni</strong></h2>
                <div>
                    <img src="immagini\receipt-icon.PNG" />
                    <p>Tutte le donazioni a WWF Italia sono deducibili</p>
                </div>


            </div>

        </div>


        <div class="footer_sezione">

            <div id="WWF_italia_ets">

                <h2><strong>WWF Italia ETS</strong></h2>
                <span>
                    Via Po 25/c 00198 Roma<br />
                    P.Iva: IT 02121111005<br />
                    C.F: 80078430586
                </span><br />
                <h2><strong>Servizio Sostenitori</strong></h2>
                <span>
                    Lun-Ven dalle 9:30 alle 18;<br />
                    Segreteria: 0684497500<br />
                    Numero Verde: 800990099<br />
                    Email :<a>soci@wwf.it</a><br />
                </span>

                <div class="flex-mobile">
                    <p>
                        <a>Vai a wwf.it</a>
                    </p>

                    <a class="tasto">AREA SOSTENITORI</a>
                </div>

            </div>


            <div id="donazioni">
                <div class="flex-expand">  <h2><strong>Donazioni</strong></h2> <span class="material-symbols-outlined">expand_more</span></div>
                <div class="contenuto hidden-mobile">
                    <a>Donazione al WWF</a>
                    <a>WWF for Italy</a>
                    <a>For Nature For Us</a>
                    <a>Renature</a>
                    <a>GenerAzione Mare</a>
                    <a>Sustainable Future</a>
                </div>
            </div>



            <div id="adozioniEiscrizioni">
                <div id="adozioni">
                    <div class="flex-expand"> <h2><strong>Adozioni</strong></h2> <span class="material-symbols-outlined">expand_more</span></div>
                    <div class="contenuto hidden-mobile">
                        <a>Adozione animali</a>
                        <a>Adozione regalo</a>
                    </div>
                </div>

                <div id="iscrizioni">

                    <div class="flex-expand"> <h2><strong>Iscrizioni</strong></h2> <span class="material-symbols-outlined">expand_more</span></div>
                    <div class="contenuto hidden-mobile">
                        <a>Socio</a>
                        <a>Socio Junior</a>
                        <a>Socio Famiglia</a>
                    </div>

                </div>
            </div>


            <div id="altri_modi_per_donare">
                <div class="flex-expand"> <h2><strong>Altri modi per donare</strong></h2> <span class="material-symbols-outlined">expand_more</span></div>
                <div class="contenuto hidden-mobile">
                    <a>Donazioni in memoria</a>
                    <a>Lasciti testamentari</a>
                    <a>Regali solidali</a>
                    <a>5x1000</a>
                    <a>Grandi Donatori</a>
                </div>
            </div>


            <div id="wwf_italia">
                <div class="flex-expand"> <h2><strong>WWF Italia</strong></h2> <span class="material-symbols-outlined">expand_more</span></div>
                <div class="contenuto hidden-mobile">
                    <a>Chi siamo</a>
                    <a>Domande Frequenti</a>
                    <a>Contattaci</a>
                </div>
            </div>


            <div id="seguici">
                <h2><strong>Seguici</strong></h2>
                <img src="immagini\pngegg.png" />
                <img src="immagini\instagram-white-icon.webp" />
                <img src="immagini\x-social-media-white-icon.png" />
                <img src="immagini\youtube-app-white-icon.webp" />
                <br />

                <a class="tasto">AREA SOSTENITORI</a><br />

                <p>
                    <a>Privacy Policy |</a>
                    <a>Termini e condizioni</a>
                </p>


            </div>


        </div>

        <div id="fine">
            <span>© 2023 WWF Italia ETS Costruiamo un mondo in cui le persone possano vivere in armonia con la natura.</span>
        </div>


    </footer>

    <div id="links-menu" class="hidden"> 

        <div class="colonna-laterale"></div>
        <div id="colonna-uno"></div>
        <div id="colonna-due"></div>
        <div id="colonna-tre"></div>
        <div class="colonna-laterale"></div>
    </div>
    
</BODY>

</html>



