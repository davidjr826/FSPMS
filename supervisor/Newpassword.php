<?php
@session_start();
include('../conn.php');

if(!isset($_SESSION['sup_email'])){
  header('location:../index.php');
}

$sup_email = $_SESSION['sup_email'];

    $oldpass = mysqli_real_escape_string($conn, $_POST["oldpass"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);


    //check if oldpassword is correct
    $oldpass = md5($oldpass);
    $pass2 = MD5($password);
    
    $sqli = "SELECT * FROM `supervisor` WHERE `sup_email` = '{$sup_email}' AND `password` = '{$oldpass}' ; ";
    $runi = mysqli_query($conn, $sqli);
    //count number of row returned
    $rowi = mysqli_num_rows($runi);
    if($rowi == 0){
        echo "2";
        
        exit();
    }
    $sql7 = "UPDATE `supervisor` SET `password` = '{$pass2}' WHERE sup_email = '{$sup_email}';";
    $run7 = mysqli_query($conn, $sql7);
    
    
    echo "1";


?>