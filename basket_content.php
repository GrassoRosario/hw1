<?php

    //CONTROLLO
    session_start();

    if(!isset($_SESSION["username"])){
         exit;
    }

    //CONNESSIONE
    $conn = mysqli_connect("localhost", "root", "", "testwb1");
    $basket_content = array();


    $iduser = $_SESSION["username"];
    $res = mysqli_query($conn, "SELECT id FROM users WHERE username =  \"$iduser\" " );

    while($row = mysqli_fetch_assoc($res)){
            $iduser=$row['id'];
    }


    $res = mysqli_query($conn, "SELECT * FROM basket WHERE id_user = \"$iduser\" ");

    while($row = mysqli_fetch_assoc($res)){
          $basket_content[] = $row; //riempiamo un array a indici numerici che diventerà in js una lista
    }


    mysqli_free_result($res);
    mysqli_close($conn);


    echo json_encode($basket_content);


?>