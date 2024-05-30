<?php

      session_start();
      if(!isset($_SESSION["username"])){
            exit;
      }
      $id = $_GET['q'];
      $conn = mysqli_connect("localhost", "root", "", "testwb1");
      $res=mysqli_query($conn, " SELECT * FROM basket WHERE id = '".$id ."'");
      

      while($row = mysqli_fetch_assoc($res))
      {

            $iduser = $row['id_user'];
            $idpet = $row['id_pet'];
            $pet = $row['pet'];
            $pet_sfondo = $row['pet_sfondo'];
            $tipo_adozione = $row['tipo_adozione'];
            $quantita_adozione = $row['quantita_adozione'];
            $tipo_kit = $row['tipo_kit'];
            $adozione_regalo = $row['adozione_regalo'];
            $data_corrente = date('Y-m-d H:i:s');
      }
      mysqli_query($conn, "DELETE FROM basket WHERE id = \"$id \" "); //se un elemento viene aggiunto alle adozioni allora va tolto dal carrello



      $query = "INSERT INTO adoptions(id_user,id_pet,pet,pet_sfondo,tipo_adozione,
                        quantita_adozione,tipo_kit,adozione_regalo, data) VALUES
                        (\"$iduser\", \"$idpet\", \"$pet\", \"$pet_sfondo\" , \"$tipo_adozione\", \"$quantita_adozione \",
                         \"$tipo_kit\", \"$adozione_regalo\", \"$data_corrente\" )";

             if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
                  echo json_encode(array('ok' => true));
                  mysqli_free_result($res);
                  exit;
              }
      
              mysqli_close($conn);
              echo json_encode(array('ok' => false));


?>