<?php
@session_start();
include('../conn.php');

if(!isset($_SESSION['sup_email'])){
  header('location:../index.php');
}

$sup_email = $_SESSION['sup_email'];

$fname  = mysqli_real_escape_string($conn,$_POST['fname']);
$mname  = mysqli_real_escape_string($conn,$_POST['mname']);
$surname  = mysqli_real_escape_string($conn,$_POST['surname']);
$contact  = mysqli_real_escape_string($conn,$_POST['contact']);
$gender  = mysqli_real_escape_string($conn,$_POST['gender']);
$citizenship  = mysqli_real_escape_string($conn,$_POST['citizenship']);
$dob  = mysqli_real_escape_string($conn,$_POST['dob']);
$dept_name  = mysqli_real_escape_string($conn,$_POST['dept_name']);
$physical_address  = mysqli_real_escape_string($conn,$_POST['physical_address']);
$Action  = mysqli_real_escape_string($conn,$_POST['Action']);

$email  = mysqli_real_escape_string($conn,$_POST['sup_email']);
$user_type  = mysqli_real_escape_string($conn,$_POST['user_type']);

if($Action == 'register'){
  $sql = "INSERT INTO `supervisor` (`sup_email`, `fname`, `mname`, `lname`, `gender`, `contact`,
                 `password`, `co_image`, `user_type`, `dept_name`, `citizenship`, `physical_address`, `dob`)
         VALUES ('{$email}', '{$fname}', '{$mname}', '{$surname}', '{$gender}', '{$contact}', MD5('1234'),
          'user.ico', '{$user_type}', '{$dept_name}', '{$citizenship}', '{$physical_address}', '{$dob}');";

}
if($Action == 'edit'){
  $sql = "UPDATE `supervisor` SET `fname` = '{$fname}', `mname` = '$mname', `lname` = '{$surname}',
         `gender` = '{$gender}', `contact` = '{$contact}', `dept_name` = '{$dept_name}',
          `citizenship` = '{$citizenship}', `physical_address` = '{$physical_address}', `dob` = '{$dob}' WHERE `supervisor`.`sup_email` = '{$sup_email}';";

}
$run_query = mysqli_query($conn, $sql);
if($run_query == false){
echo<<<EOF
    <div class="alert alert-danger">
         <strong>Oopss !</strong> Error occured while processing  supervisor...
    </div>

EOF;
}else{
echo<<<EOF
    <div class="alert alert-success">
         <strong> _</strong> change made Successful...
    </div>

EOF;
}
?>