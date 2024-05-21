<?php
@session_start();
include('../conn.php');

if(!isset($_SESSION['sup_email'])){
  header('location:../index.php');
}

//$sup_email = $_SESSION['sup_email'];
$tittle = $_POST['tittle'];
$year = $_POST['year'];
$project_type = $_POST['project_type'];
$sup_email = $_POST['sup_email'];
$st_ID = $_POST['st_ID'];
$domain = $_POST['domain'];

    $sql ="SELECT * FROM project WHERE st_ID = '{$st_ID}';";
    $run = mysqli_query($conn, $sql);
    if(mysqli_num_rows($run) != 0){
        $_SESSION['Studentprocessing'] = '  
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Danger!</strong> This Student already have project, fail to register
            </div>';
        header("location:AddProject.php");
        exit();
    }

if(isset($_POST['create'])){
    $sql = " INSERT INTO `project` (`projectID`, `tittle`, `proposal`, `final_project`, `project_type`,
                             `domain_name`, `st_ID`, `sup_email`, `year`)
                VALUES (NULL, '{$tittle}', '', '', '{$project_type}', '{$domain}', '{$st_ID}', '{$sup_email}', '{$year}'); ";
    $run = mysqli_query($conn, $sql);
}
/*
if(isset($_POST['update'])){
    $sql = " INSERT INTO `project` (`projectID`, `tittle`, `proposal`, `final_project`, `project_type`,
                             `domain_name`, `st_ID`, `sup_email`, `year`)
                VALUES (NULL, '{$tittle}', '', '', '{$project_type}', '{$domain}', '{$st_ID}', '{$sup_email}', '{$year}'); ";
    $run = mysqli_query($conn, $sql);
}
*/

if(!empty($_FILES['document']['name'][0])){
    $proposal = $_FILES['document']['name'][0];
    $path = "student_Document/".str_replace('/','-',$st_ID)."/";
    $realFile = explode(".", $proposal);
    $NewFile = rand(1111,44444).".".$realFile[1];

    $location = $path .$NewFile; 
    if(move_uploaded_file($_FILES['document']['tmp_name'][0], $location) ){ 
            
        $sql22 = "UPDATE `project` SET `proposal` = '{$NewFile}' WHERE `st_ID` = '{$st_ID}';";
        $run = mysqli_query($conn, $sql22);
    }
}

if(!empty($_FILES['document']['name'][1])){
    $project = $_FILES['document']['name'][1];
    $path = "student_Document/".str_replace('/','-',$st_ID)."/";
    $realFile = explode(".", $project);
    $NewFile = rand(11111,55555).".".$realFile[1];

    $location = $path .$NewFile; 
    if(move_uploaded_file($_FILES['document']['tmp_name'][1], $location) ){ 
            
        $sql33 = "UPDATE `project` SET `final_project` = '{$NewFile}' WHERE `st_ID` = '{$st_ID}';";
        $run = mysqli_query($conn, $sql33);
    }
}

$_SESSION['Studentprocessing'] = '  
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Successful!</strong> You Add new student project
            </div>';
header("location:AddProject.php");


?>