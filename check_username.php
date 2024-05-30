<?php

    if (!isset($_GET["q"])) {    // se non sono presenti i dati esce
        exit;
    }

    header('Content-Type: application/json');  

    // Connessione al database
    $conn = mysqli_connect("localhost", "root", "", "testwb1");

    //sanificazione dei dati
    $username = mysqli_real_escape_string($conn, $_GET["q"]);

    $query = "SELECT email FROM users WHERE username = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // crea un array con la chiave exists che ha come valore vero se la mail è già presente, falso altrimenti
    // verrà tradotto in un ogetto in js
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false)); 
    
    //chiusura connessione
    mysqli_free_result($res);
    mysqli_close($conn); 
?>