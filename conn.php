<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "projects";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if(!$conn){
      session_start();
      $_SESSION['erroMsg'] = "fail to connect to db";
      header("location:../404.php");
    }

?>