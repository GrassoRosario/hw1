<?php

      session_start();
      if(!isset($_SESSION["username"])){
            exit;
      }

      if(isset($_GET["q"])  ){
            $conn = mysqli_connect("localhost", "root", "", "testwb1");
            $pet =  mysqli_real_escape_string($conn, $_GET["q"]);

            $res = mysqli_query($conn, "SELECT id FROM pets_adoption WHERE pet =  \"$pet\" " );

            while($row = mysqli_fetch_assoc($res)){
                  $idpet=$row['id'];
            }
            
            $user = $_SESSION["username"];
            $res = mysqli_query($conn, "SELECT id FROM users WHERE username =  \"$user\" " );

            while($row = mysqli_fetch_assoc($res)){
                  $iduser=$row['id'];
            }
            
            $query = "INSERT INTO  preferences(id_user,id_pet) VALUES
                        (\"$iduser\", \"$idpet\")";

             if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
                  echo json_encode(array('ok' => true));
                  mysqli_free_result($res);
                  exit;
              }
      
              mysqli_close($conn);
              echo json_encode(array('ok' => false));
              
      }

?>