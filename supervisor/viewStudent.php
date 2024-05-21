<?php
@session_start();
include('../conn.php');

if(!isset($_SESSION['sup_email'])){
  header('location:../index.php');
}

//$sup_email = $_SESSION['sup_email'];




//login to student_project table
$sql = "SELECT * FROM student WHERE 1 ;" ;
$run = mysqli_query($conn, $sql);

$row = mysqli_num_rows($run);


echo<<<EOF
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Full name</th>
                    <th>ID</th>
                    <th>Study year</th>
                    <th style="width:35px;"></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Full name</th>
                    <th>ID</th>
                    <th>Study year</th>
                    <th style ="width:35px;"></th>
                  </tr>
                </tfoot>
                <tbody>

EOF;
    while($data = mysqli_fetch_assoc($run)){
        $st_ID = $data['st_ID'];
        $fname = $data['fname'];
        $mname = $data['mname'];
        $surname = $data['lname'];
        $study_year = $data['study_year'];
    
echo<<<EOF
                <tr onclick="">
                    <td>$fname $mname $surname</td>
                    <td>$st_ID</td>
                    <td>$study_year</td>
                    <td class="lastCol"><a style="color:white;"> view </a> </td>
                </tr>

EOF;
               
           

    }
echo<<<EOF

</tbody>
</table>


EOF;

?>



