<?php

session_start();
if(isset($_SESSION["username"])){
    header("Location: mhw3.php");
    exit;
}

// Verifica se l'utente ha inserito dati 
if(!empty($_POST["username"]) && !empty($_POST["password"])){

    //Verifica se sono stati inseriti correttamente (verifica ridondante)
    if(!preg_match('/^[a-zA-Z0-9!£$%&()?]{1,15}$/', $_POST['username']) || !preg_match('/^(?=.*\d)(?=.*[!£$&()?^#@*]).{8,}$/', $_POST['password'])) {
        $errore = true;
    } else{
        $conn = mysqli_connect("localhost", "root", "", "testwb1");

        $username = mysqli_real_escape_string($conn, $_POST["username"]);


        $query = "SELECT * FROM users WHERE username = '".$username."'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) > 0) {
            
            $entry = mysqli_fetch_assoc($res);
                        
            if (password_verify($_POST['password'], $entry['password'])) {

                $_SESSION["username"] = $_POST['username'];
                header("Location: mhw3.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
       
        else{
            //se non sono presenti nel database le credenziali non sono valide
            $errore = true;

        }

    } 


}


?>

<html>
    <head>
    <title>Accesso-WWF</title>
    <link rel="icon" type="image/png" href="immagini/Emblem-WWF.jpg">


    <link rel='stylesheet' href='login.css'>
    <script src='login.js' defer></script>
         
    <!-- intestazione per roboto-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- intestazione per icone dropbox e frecce-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    <!-- intestazione per mobile-->
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    </head>
    <body>
        
       
        
        <main>
           <img  id="sfondo" src="immagini/panda-carousel.jpg" data-id="panda" /> 

            <section>
            <img id="logo_wwf" src="immagini\wwf_logo.jpg.webp" />
            <h1> BENVENUTO <br>
                NELL'AREA RISERVATA  <br>
                AI SOCI E AI SOSTENITORI WWF</h1>
                <form  method='post'>
                <p class="username">
                    <label>Inserisci la tua username <input type="text" class="form-input" name="username" placeholder="USERNAME"  required></label>
                </p>
                <p>
                    <label>Inserisci la tua password <input type="password" class="form-input" name="password" placeholder="PASSWORD" required></label>
                </p>
                <p class="password">
                    <input id="form-submit" class="form-input" type='submit' value="AVANTI">
                </p>
                </form>

                <?php

                    if(isset($errore)){
                    echo "<div class='errore'>";
                    echo "Credenziali non valide.";
                    echo "</div>";
                }

                ?>

                <a>Hai dimenticato l'username? <span class="material-symbols-outlined">key</span></a>
                <div id="reindirizzamento">
                    <p>Non sei ancora un socio WWF?</p>
                    <a  href="signup.php">ISCRIVITI AL WWF</a>
                </div>
            </section>
        </main>
    </body>
</html>