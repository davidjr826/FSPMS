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
$prog_ID  = mysqli_real_escape_string($conn,$_POST['prog_ID']);
$Action  = mysqli_real_escape_string($conn,$_POST['Action']);

$st_ID  = mysqli_real_escape_string($conn,$_POST['st_id']);
$study_year  = mysqli_real_escape_string($conn,$_POST['study_year']);


if($Action == 'register'){
  $sql = "INSERT INTO `student` (`st_ID`, `fname`, `mname`, `lname`, `gender`, `contact`,
                 `st_pass`, `image`, `study_year`, `prog_ID`, `citizenship`, `dob`)
         VALUES ('{$st_ID}', '{$fname}', '{$mname}', '{$surname}', '{$gender}', '{$contact}', MD5('1234'),
          'user.ico', '{$study_year}', '{$prog_ID}', '{$citizenship}', '{$dob}');";

}

$run_query = mysqli_query($conn, $sql);
if($run_query == false){
echo<<<EOF

    <div class="alert alert-danger">
         <strong>Oopss !</strong> Error occured while registering  student. check student ID if exist already...
    </div>

EOF;
}else{
    $folder = "student_Document/".str_replace('/','-',$st_ID);

    if(!file_exists($folder)){
         mkdir($folder, 0777, true);
    }


echo<<<EOF
    <div class="alert alert-success">
         <strong> _</strong> Registration Successful...
    </div>

EOF;
}
?>