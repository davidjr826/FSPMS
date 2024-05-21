<?php
@session_start();
include('../conn.php');

if(!isset($_SESSION['sup_email'])){
  header('location:../index.php');
}

//$sup_email = $_SESSION['sup_email'];




//login to student_project table
$sql = "SELECT * FROM supervisor WHERE 1 ;" ;
$run = mysqli_query($conn, $sql);

$row = mysqli_num_rows($run);


echo<<<EOF
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>image </th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>

EOF;
    while($data = mysqli_fetch_assoc($run)){
        $sup_email = $data['sup_email'];
        $fname = $data['fname'];
        $mname = $data['mname'];
        $surname = $data['lname'];
        $contact = $data['contact'];
        $image = $data['co_image'];
        
        $path = "../supervisor/profile/".$image;
        if(!file_exists($path) or empty($image)){
            $path = "../supervisor/profile/user.ico";
        }

    
echo<<<EOF
                <tr onclick="openSupervisor('$sup_email')">
                    <td>
                        <img src="$path" title="click to upload image" style="width:80px; height:80px; border-radius:10px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity">
                    </td>
                    <td>$fname $mname $surname</td>
                    <td>$sup_email</td>
                    <td>$contact</td>
                    <td class="lastCol"> </td>
                </tr>

EOF;
               
           

    }
echo<<<EOF

</tbody>
</table>


EOF;

?>



