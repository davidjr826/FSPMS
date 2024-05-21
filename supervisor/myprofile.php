<?php
@session_start();
include('../conn.php');

if(!isset($_SESSION['sup_email'])){
  header('location:../index.php');
}

$sup_email = $_SESSION['sup_email'];




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
    <div class="col-lg-3 text-center" style="float:left">
        <img src="$path" onclick="upload()" title="click to upload image" style="width:80%; height:80%; border-radius:10px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity">
            <form action="file_uploader.php" method="POST" id="upload" enctype="multipart/form-data">
                <input type="file"   name="photo" style="max-width:200px; height:35px; font-size:12px;" required>
                <button type="submit" style="margin-left:4px" class="btn btn-info btn-sm" >upload </button>
            </form>
    <br><hr><br>
    
    </div>
    <div class="col-lg-7" style="float:left">                                 
            <form  onsubmit="return saveEdit()" >
            <div class="otherInfo">
                Full name : <span class="normal"><a> {$fname} {$mname}  {$surname} </a> </span>
                <span class="editMode"> <input type="txt" value="{$fname}" name = "fname" id = "fname"  style="width:90px;" placeholder="first name" required>
                                    <input type="txt" value="{$mname}" name = "mname" id = "mname" style="width:90px;" placeholder="middle name" required>
                                    <input type="txt" value="{$surname}" name = "surname" id = "surname" style="width:100px;" placeholder="surname" required>
                </span>
                <br />
                Gender : <span class="normal"> <a > {$gender}</a></span>
                    <span class="editMode">    <select name="gender" class="form-control" id="sex" width="100px" required>
                                                <option value="{$gender}" selected> {$gender}</option>
                                                <option value="male" >male</option>
                                                <option value="female">female</option> 
                                            </select>
                    </span>
                <br />
                Supervisor ID : <a > $sup_email</a><br />
                my privallege : <a > $user_type</a><br />
            
            </div>
            <br>
            <div class="otherInfo">
                <span class="ask"> Date of birth :</span> 
                    <span class="normal"> <a> $dob </a></span>
                        <span class="editMode">
                    <input type="txt" value="$dob" name = "dob"  style="width:100px;" placeholder="birth year" required>
                    </span>
                        <br>
                <span class="ask"> Citizenship :</span> 
                    <span class="normal"><a> $citizenship</a></span>
                    <span class="editMode">
                        <input type="txt" value="$citizenship" name = "citizenship"  style="width:100px;" placeholder="citizenship" required>
                    </span>
                        <br>
                
                <span class="ask"> Contact : </span> 
                    <span class="normal"><a> $contact </a></span>
                    <span class="editMode">
                        <input type="number" value="$contact" name = "contact"  style="width:150px;" placeholder="CONTACT" required>
                    </span>
                        <br>
                <span class="ask"> Physical Address : </span> 
                    <span class="normal"><a> $physical_address </a></span>
                    <span class="editMode">
                        <input type="text" value="$physical_address" name = "physical_address"  style="width:150px;" placeholder="CONTACT" required>
                    </span>
                        <br>
                <span class="ask">  Dipartment : </span> 
                    <span class="normal"><a> $dept_name</a></span>
                    <span class="editMode">
                        <select name="dept_name" class="form-control" id="sex" width="100px" required>
                            <option value="{$dept_name}" selected> {$dept_name}</option>
                            
EOF;
                    $sql = "SELECT * FROM department WHERE 1";
                    $runMin = mysqli_query($conn, $sql);
                    while($data = mysqli_fetch_assoc($runMin)){
                        $dep = $data['dept_name'];
                        echo "<option value='{$dep}' >{$dep}</option> ";
                    }
echo<<<EOF
                        </select>  
                    </span>
                    <br>
                    <div id="Response"></div>
                    <br>

                    <button class="btn btn-primary editMode" type="submit" style="border:0.3px solid blue; margin-left:30%; height:40px; ">save changes</button>
                    
            </div>
            </form>
            <button class="btn btn-success btn-sm" onclick="toggleprofile()" style="margin-right:30%;  ">Edit Mode</button>
    </div>
EOF;



	

?>



