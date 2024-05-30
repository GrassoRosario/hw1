<?php

    session_start();
    if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}
  
?>


<HTML>
<HEAD>
    <META NAME="GENERATOR" Content="Microsoft Visual Studio">

    <TITLE>Pagina-Principale-WWF</TITLE>
    <link rel="icon" type="image/png" href="immagini/Emblem-WWF.jpg">

    <link rel="stylesheet" href="mhw3.css" />
    <script src="mhw3.js" defer></script>
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

</HEAD>

<BODY>
    <header>
        <div id="overlay"></div>

        <img id="sfondo-mobile" src="immagini/backgorund-image-elephant-1-1.jpg" data-id="elephant" />

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
            <p><strong> <a>WWF SOSTIENI</a> > <a>ADOZIONI</a> > ADOZIONE ANIMALI</strong></p>

            <h1>ADOTTA UNA SPECIE </h1>
            <h1>A RISCHIO </h1>

            <p>
                Circa un milione di specie animali e' a rischio estinzione: un numero
                drammatico e preoccupante se pensiamo che il nostro benessere dipende
                soprattutto da loro. Abbiamo bisogno di te per proteggere questa
                straordinaria fonte di vita.
            </p>
        </section>
    </header>


    <section id="adotta_animale">

        <div id="panda", class="animali">
            <img class="pet_image" src="immagini\masthead-1-1-scaled.jpg" />
            <img class="heart" src="immagini/heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Panda</p>
            <a  href="adoptions.php?q=panda">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="koala" , class="animali">
            <img class="pet_image" src="immagini\Masthead-koala-1-1-scaled.jpg" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Koala</p>
            <a  href="adoptions.php?q=koala">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="tigre" , class="animali">
            <img class="pet_image" src="immagini\masthead-tiger-1-1-scaled.jpg" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Tigre</p>
            <a  href="adoptions.php?q=tigre">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="pinguino" , class="animali">
            <img class="pet_image" src="immagini\masthead-penguin-1-1.jpg" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Pinguino</p>
            <a  href="adoptions.php?q=pinguino">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>


        <div id="lupo" , class="animali">
            <img class="pet_image" src="immagini\©Michele-Bavassano-Masthead-648x432.jpg.webp" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Lupo</p>
            <a  href="adoptions.php?q=lupo">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="orso_bruno" , class="animali">
            <img class="pet_image" src="immagini\Immagini-orso-bruno-scaled.jpg" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Orso Bruno</p>
            <a  href="adoptions.php?q=orso_bruno">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="leopardo_delle_nevi" , class="animali">
            <img class="pet_image" src="immagini\snow-leopard-1-1.jpg" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Leopardo delle Nevi</p>
            <a  href="adoptions.php?q=leopardo_delle_nevi">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="orso_polare" , class="animali">
            <img class="pet_image" src="immagini\adotta-un-orso-polare-1-1.jpeg.jpg" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Orso polare</p>
            <a  href="adoptions.php?q=orso_polare">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="elefante" , class="animali">
            <img class="pet_image" src="immagini\elephant-1-1.jpg" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Elefante</p>
            <a  href="adoptions.php?q=elefante">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="giaguaro" , class="animali">
            <img class="pet_image" src="immagini\jaguar-1-1.jpg" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Giaguaro</p>
            <a  href="adoptions.php?q=giaguaro">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="leone" , class="animali">
            <img class="pet_image" src="immagini\lion-1-1.jpg" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Leone</p>
            <a  href="adoptions.php?q=leone">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="orango" , class="animali">
            <img class="pet_image" src="immagini\orangutan-1-1.webp" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Orango</p>
            <a  href="adoptions.php?q=orango">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="tartaruga" , class="animali">
            <img class="pet_image" src="immagini\Tartaruga_masthead-496x432.jpg.webp" />
            <img class="heart" src="immagini\heart_icon.png"  data-stato="NonPreferito"/>
            <p class="nome">Tartaruga</p>
            <a  href="adoptions.php?q=tartaruga">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="Balena" , class="animali">
            <img class="pet_image" src="immagini\1-496x432.jpg.webp" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Balena</p>
            <a  href="adoptions.php?q=balena">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
        </div>

        <div id="foca" , class="animali">
            <img class="pet_image" src="immagini\Immagini-new-sostieni-5800-x-4182-px-26-599x432.jpg.webp" />
            <img class="heart" src="immagini\heart_icon.png" data-stato="NonPreferito"/>
            <p class="nome">Foca</p>
            <a  href="adoptions.php?q=foca">
                <span>ADOTTA ORA</span> <span class="material-symbols-outlined">arrow_right_alt</span>
            </a>
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

</HTML>



