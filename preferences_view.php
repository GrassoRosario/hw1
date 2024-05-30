<?php

      session_start();
      if(!isset($_SESSION["username"])){
            exit;
      }


        $conn = mysqli_connect("localhost", "root", "", "testwb1");

        $user = $_SESSION["username"];
        $res = mysqli_query($conn, "SELECT id FROM users WHERE username =  \"$user\" " );

        while($row = mysqli_fetch_assoc($res)){
                $iduser=$row['id'];
        }
        $pet= array();
        // per ottenere i nomi dei pet con preferences a partire dall'id facciamo una join tra preferences e pets_adoption
        $query = "SELECT id_user, id_pet, pet FROM preferences p JOIN pets_adoption a on p.id_pet=a.id WHERE id_user = \"$iduser\" ";

        $res = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_assoc($res)){
            $pet[]=$row['pet'];
        }
            mysqli_free_result($res);
            mysqli_close($conn);
            echo json_encode($pet);

      

?>