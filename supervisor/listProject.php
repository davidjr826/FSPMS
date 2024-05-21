<?php
@session_start();
include('../conn.php');

if(!isset($_SESSION['sup_email'])){
  header('location:../index.php');
}

//$sup_email = $_SESSION['sup_email'];




//login to student_project table
$sql = "SELECT * FROM project WHERE 1 ;" ;
$run = mysqli_query($conn, $sql);

$row = mysqli_num_rows($run);


echo<<<EOF
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>project Title</th>
                    <th>year</th>
                    <th>student ID</th>
                    <th>full name</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>project Title</th>
                    <th>year</th>
                    <th>student ID</th>
                    <th>full name</th>
                  </tr>
                </tfoot>
                <tbody>

EOF;
    while($data = mysqli_fetch_assoc($run)){
        $st_ID = $data['st_ID'];
        $year = $data['year'];
        $projectID = $data['projectID'];
        //to every comming projectID and student ID

            //get student name
            $sqlStudent = "SELECT * FROM student WHERE st_ID = '{$st_ID}'; ";
            $run_sqlStudent = mysqli_query($conn, $sqlStudent);
            while($student = mysqli_fetch_assoc($run_sqlStudent)){
                $fullName = $student['fname']." ".$student['mname']." ".$student['lname'];
            }

            //get Project name
            $sqlProject = "SELECT * FROM project WHERE projectID = '{$projectID}'; ";
            $run_sqlProject = mysqli_query($conn, $sqlProject);
            while($project = mysqli_fetch_assoc($run_sqlProject)){
                $projectName = $project['tittle'];
            }
echo<<<EOF
                <tr onclick="openProject($projectID)">
                    <td>$projectName</td>
                    <td>$year</td>
                    <td>$st_ID</td>
                    <td>$fullName</td>
                </tr>

EOF;
               
           

    }
echo<<<EOF

</tbody>
</table>


EOF;

?>



