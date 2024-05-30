<?php

session_start();
if(isset($_SESSION["username"])){
    header("Location: mhw3.php");
    exit;
}


if (!empty($_POST["email"]) && !empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["ntelefono"]) && 
    !empty($_POST["datanascita"]) && !empty($_POST["username"]) && !empty($_POST["password"])){

    $error = array();
    $conn = mysqli_connect("localhost", "root", "", "testwb1");

    // CONTROLLO FORMATO DATI

    if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $_POST['email'])){
        $error[] = "Email non valida";
    }else {
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
        $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Email già utilizzata";
        }
    }

    if (!preg_match('/^[a-zA-Z]{1,15}$/', $_POST['nome']) ) {
        $error[] = "Nome non valido";
    } 

    if (!preg_match('/^[a-zA-Z]{1,15}$/', $_POST['cognome']) ) {
        $error[] = "Cognome non valido";
    } 

    if (!preg_match('/^\d{3} \d{3} \d{4}$/', $_POST['ntelefono']) ) {
        $error[] = "numero di telefono non valido";
    } 


    if(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $_POST['datanascita'])){
        $error[] = "data di nascita non valida";
        $_POST['datanascita'] = '2000-01-01';
    } else{
        list($day, $month, $year) = explode('/', $_POST['datanascita']); // explode restituisce un array che list distribuisce nelle variabili indicate
        if ($day<0 || $day>30 || $month<0 || $month>12 || $year<1923 || $year>2006){  // controllo basico di correttezza, l'utente deve essere maggiorenne
            $error[] = "data di nascita non valida";
        }
        $_POST['datanascita'] = sprintf('%04d-%02d-%02d', $year, $month, $day);
    }




    if (!preg_match('/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/', $_POST['codicefiscale']) && strlen($_POST["codicefiscale"]) !== 0) {
        $error[] = "codice fiscale non valido";
    } 

    if(!preg_match('/^[a-zA-Z0-9!£$%&()?]{1,15}$/', $_POST['username'])) {
        $error[] = "Username non valido";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query = "SELECT username FROM users WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username già utilizzato";
        }
    }
                                                                                            
    if (!preg_match('/^(?=.*\d)(?=.*[!£$&()?^#@*]).{8,}$/', $_POST['password']) ) {
        $error[] = "Password non valida";
    } 

    if (count($error) == 0) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
        $ntelefono = mysqli_real_escape_string($conn, $_POST['ntelefono']);
        $datanascita = mysqli_real_escape_string($conn, $_POST['datanascita']);
        $codicefiscale = mysqli_real_escape_string($conn, $_POST['codicefiscale']);
        $username= mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $password = password_hash($password, PASSWORD_BCRYPT);

        
        $query = "INSERT INTO users(email, nome, cognome, ntelefono, datanascita, codicefiscale, username, password) VALUES('$email', '$nome', '$cognome', '$ntelefono', '$datanascita', '$codicefiscale', '$username', '$password')";

        if (mysqli_query($conn, $query)) {
           $_SESSION["username"] = $_POST["username"];
           mysqli_close($conn);
           header("Location: mhw3.php");
           exit;
        } else {
            $error[] = "Errore di connessione al Database";
        }
    }

    mysqli_close($conn);

} 

?>










<html>
    <head>
        <title>Iscrizione-WWF</title>        
        <link rel="icon" type="image/png" href="immagini/Emblem-WWF.jpg">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">


        <link rel='stylesheet' href='login.css'>
        <link rel="stylesheet" href="signup.css">
        <script src='signup.js' defer></script>
        
        <!-- intestazione per roboto-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
        <!-- intestazione per icone dropbox e frecce-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


        

    </head>
    <body>
        
        <main>
           <img  id="sfondo" src="immagini/panda-carousel.jpg" data-id="panda" /> 

            <section> 
            <img id="logo_wwf" src="immagini\wwf_logo.jpg.webp" />
            <h1> AIUTACI<br>
                A CAMBIARE IL MONDO <br>
                DIVENTANDO SOCIO WWF</h1>
                <form  method='post'>
                    <div class="form-arguments">
                        <p class="email">
                            <label>Email*<input type="text" class="form-input" name="email" placeholder="EMAIL" required <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></label>
                        </p>
                        <p class="nome">
                            <label>Nome*<input type="text" class="form-input" name="nome" placeholder="NOME" required <?php if(isset($_POST["nome"])){echo "value=" . $_POST["nome"];} ?>></label>
                        </p>
                        <p class="cognome">
                            <label>Cognome* <input type="text" class="form-input" name="cognome" placeholder="COGNOME" required <?php if(isset($_POST["cognome"])){echo "value=".$_POST["cognome"];} ?>></label>
                        </p>
                        <p class="ntelefono">       

                            <label>Numero di telefono*<input type="text" class="form-input" name="ntelefono" placeholder="+39 000 000 0000" required <?php if (isset($_POST["ntelefono"])) { echo 'value="' . $_POST["ntelefono"] . '"'; } ?>></label>
                        </p>
                        <p class="datanascita">      

                            <label>Data di nascita* <input type="text" class="form-input" name="datanascita" placeholder="gg/mm/aaaa" required <?php if(isset($_POST["datanascita"])){echo "value=".    sprintf('%02d/%02d/%04d', explode('-', $_POST['datanascita'])[2], explode('-', $_POST['datanascita'])[1], explode('-', $_POST['datanascita'])[0]);} ?>></label>
                        </p>
                        <p class="codicefiscale">
                            <label>Codice Fiscale (opzionale) <input type="text" class="form-input" name="codicefiscale" placeholder="AAAAAA00A00A000A" <?php if(isset($_POST["codicefiscale"])){echo "value=".$_POST["codicefiscale"];} ?>></label>
                        </p>
                        <p class="username">
                            <label>Username*<input type="text" class="form-input" name="username" placeholder="USERNAME" required <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></label>
                        </p>

                        <p class="password">
                            <label>Password* <input type="password" class="form-input" name="password" placeholder="PASSWORD" required <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></label>
                        </p>
                    </div>
                    <p>
                        <input id="form-submit" class="form-input" type='submit' value="ISCRIVITI AL WWF">
                    </p>
                
                </form>
                <div class="errore hidden" ></div>

                
                <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errore'><span>".$err."</span></div>";
                    }
                } ?>

               
            </section>
        </main>
    </body>
</html>