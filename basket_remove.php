<?php

      session_start();
      if(!isset($_SESSION["username"])){
            exit;
      }

      $id=$_GET['q'];
      $conn = mysqli_connect("localhost", "root", "", "testwb1");
      mysqli_query($conn, "DELETE FROM basket WHERE id = \"$id \" ");

      mysqli_close($conn);


?>