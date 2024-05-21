<?php
@session_start();
include('../conn.php');

if(!isset($_SESSION['sup_email'])){
  header('location:../index.php');
}

$sup_email = $_POST['sup_email'];




//login to student table
$sql = "SELECT * FROM supervisor WHERE sup_email = '{$sup_email}' ;" ;

$run = mysqli_query($conn, $sql);

$row = mysqli_num_rows($run);

    while($data = mysqli_fetch_assoc($run)){
        $fname = $data['fname'];
        $mname = $data['mname'];
        $surname = $data['lname'];
        $contact = $data['contact'];
        $gender = $data['gender'];
        $dept_name = $data['dept_name'];
        $user_type  = $data['user_type'];
        $citizenship = $data['citizenship'];
        $image = $data['co_image'];
        $physical_address = $data['physical_address'];
        $dob = $data['dob'];
    }
        $_SESSION['sup_image'] = $image; //this used on photo uploading 

    $path = "../supervisor/profile/".$image;
    if(!file_exists($path) or empty($image)){
        $path = "../supervisor/profile/user.ico";
    }

echo<<<EOF
<br>  
    <div class="col-lg-10 text-right" >
        <button type="button" onclick = "window.location.reload()"  class="btn btn-info btn-sm">back</button>
    </div>
    <div class="col-lg-3 text-center" style="float:left">
        <img src="$path"  title="click to upload image" style="width:80%; height:80%; border-radius:10px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity">    
        <br><hr><br>
    </div>
    <div class="col-lg-7" style="float:left"> 
            <div>    
                Full name : <span class="normal"><a> {$fname} {$mname}  {$surname} </a> </span>
                <br />
                Gender : <span class="normal"> <a > {$gender}</a></span>
                <br />
                Supervisor ID : <a > $sup_email</a><br />
                my privallege : <a > $user_type</a><br />
            
            </div>
            <br>
            <div class="otherInfo">
                <span class="ask"> Date of birth :</span> 
                    <span class="normal"> <a> $dob </a></span>
                        <br>
                <span class="ask"> Citizenship :</span> 
                    <span class="normal"><a> $citizenship</a></span>
                        <br>
                
                <span class="ask"> Contact : </span> 
                    <span class="normal"><a> $contact </a></span>
                        <br>
                <span class="ask"> Physical Address : </span> 
                    <span class="normal"><a> $physical_address </a></span>
                        <br>
                <span class="ask">  Dipartment : </span> 
                    <span class="normal"><a> $dept_name</a></span>
                    <br>
            </div>
    </div>
EOF;



	

?>



