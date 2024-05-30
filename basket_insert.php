<?php

      session_start();
      if(!isset($_SESSION["username"])){
            exit;
      }

      if(isset($_GET["tipo_adozione"]) && isset($_GET["quantita_adozione"]) 
      && isset($_GET["tipo_kit"]) && isset($_GET["adozione_regalo"]) ){
            $conn = mysqli_connect("localhost", "root", "", "testwb1");
            $tipo_adozione = mysqli_real_escape_string($conn, $_GET["tipo_adozione"]);
            $quantita_adozione = mysqli_real_escape_string($conn, $_GET["quantita_adozione"]);
            $tipo_kit = mysqli_real_escape_string($conn, $_GET["tipo_kit"]);
            $adozione_regalo = $_GET["adozione_regalo"] === 'true' ? 1 : 0;
            

            $iduser = $_SESSION["username"];
            $res = mysqli_query($conn, "SELECT id FROM users WHERE username =  \"$iduser\" " );

            while($row = mysqli_fetch_assoc($res)){
                  $iduser=$row['id'];
            }
            


            $pet = $_SESSION['pet'];
            $res = mysqli_query($conn, "SELECT id, sfondo FROM pets_adoption WHERE pet =  \"$pet\"  ");
            while($row = mysqli_fetch_assoc($res))
            {
                  $idpet = $row['id'];
                  $pet_sfondo = $row['sfondo'];
            }

            
            $query = "INSERT INTO basket(id_user,id_pet,pet,pet_sfondo,tipo_adozione,
                        quantita_adozione,tipo_kit,adozione_regalo) VALUES
                        (\"$iduser\", \"$idpet\", \"$pet\" , \"$pet_sfondo\", \"$tipo_adozione\", \"$quantita_adozione \",
                         \"$tipo_kit\", \"$adozione_regalo\")";

             if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
                  echo json_encode(array('ok' => true));
                  mysqli_free_result($res);
                  exit;
              }
      
              mysqli_close($conn);
              echo json_encode(array('ok' => false));
              
      }

?>