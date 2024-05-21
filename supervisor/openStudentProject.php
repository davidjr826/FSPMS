<?php
@session_start();
include('../conn.php');

if(!isset($_SESSION['sup_email'])){
  header('location:../index.php');
}

//$sup_email = $_SESSION['sup_email'];

$projectID  = mysqli_real_escape_string($conn,$_POST['projectID']);


//login to student table
$sql = "SELECT * FROM project WHERE projectID = '{$projectID}' ;" ;
$run = mysqli_query($conn, $sql);

    while($data = mysqli_fetch_assoc($run)){
        $st_ID = $data['st_ID'];
        $sup_email = $data['sup_email'];
        $year = $data['year'];
        $tittle = $data['tittle'];
        $proposal = $data['proposal'];
        $final_project = $data['final_project'];
        $domain_name = $data['domain_name'];
        $project_type = $data['project_type'];

                        //check document and links if present
                        $folder = "student_Document/".str_replace('/','-',$st_ID)."/";
                        $proposalLink = $folder.$proposal;
                        if(!file_exists($proposalLink) or empty($proposal)){
                            $proposalLink = "NO";
                        }
                        $projectLink = $folder.$final_project;
                        if(!file_exists($projectLink) or empty($final_project)){
                            $projectLink = "NO";
                        }
                    //check if this is web based 
                    if($project_type == "Activity" or $project_type == "ACTIVITY" or $project_type == "WORK"){
                        $domain_name = "Not a web-based ";
                    }else{
                        $domain_name = $domain_name;
                    }


            //get supervisor name
            $sqlSupervisor= "SELECT * FROM  supervisor  WHERE sup_email = '{$sup_email}'; ";
            $run_sqlSupervisor= mysqli_query($conn, $sqlSupervisor);
            while($sup = mysqli_fetch_assoc($run_sqlSupervisor)){
                $super_Name = $sup['fname']." ".$sup['mname']." ".$sup['lname'];
            }
            //get student name
            $sqlStudent = "SELECT * FROM student WHERE st_ID = '{$st_ID}'; ";
            $run_sqlStudent = mysqli_query($conn, $sqlStudent);
            while($student = mysqli_fetch_assoc($run_sqlStudent)){
                $fname = $student['fname'];
                $mname = $student['mname'];
                $surname = $student['lname'];
                $contact = $student['contact'];
                $gender = $student['gender'];
                $prog_ID = $student['prog_ID'];
                $study_year   = $student['study_year'];
                $citizenship = $student['citizenship'];
                $image = $student['image'];
                $dob = $student['dob'];
            }



                    //get program name
                    $sqlProg= "SELECT * FROM  Program  WHERE prog_ID = '{$prog_ID}'; ";
                    $run_sqlProg= mysqli_query($conn, $sqlProg);
                    while($prog = mysqli_fetch_assoc($run_sqlProg)){
                        $ProgramFullName = $prog['ProgramFullName'];
                        $dept_name = $prog['dept_name'];
                    }
            
            $path = "student_profile/".$image;
            if(!file_exists($path) or empty($image)){
                $path = "student_profile/person.png";
            }
        

        echo<<<EOF
        <br>  
            <div class="col-lg-10 text-right" >
                <button type="button" onclick = "window.location.reload()"  class="btn btn-info">back</button>
            </div>
            <div class="col-lg-3 text-center" style="float:left">
                <img src="$path" onclick="upload()" title="click to upload image" style="width:80%; height:80%; border-radius:10px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity">
            <br><hr><br>
            </div>
            <div class="col-lg-7" style="float:left">
                    <div class="otherInfo">
                        Full name : <span  ><a> {$fname} {$mname}  {$surname} </a> </span>
                        <br />
                        Gender : <span  > <a > {$gender}</a></span>
                        <br />
                         Date of birth :  <span  > <a> $dob </a></span>
                             <br><hr>
                        Registration Number : <span  ><a> {$st_ID}</a> </span>
                        <br />
                        Program Code: <span  ><a> {$prog_ID} </a> </span>
                        <br />
                        Program name <span  ><a> {$ProgramFullName} </a> </span>
                        <br />
                        Department Code: <span  ><a> {$dept_name} </a> </span>
                        <br />
                        Study Year: <span  ><a> {$study_year} </a> </span>
                        <br /><hr>
                        
                        Supervisor ID : <a > $sup_email</a><br />
                        Supervisor name : <a > $super_Name</a><br />
                    
                    </div>
                    <br>
                    <div class="otherInfo">
                        
                        <span class="ask"> Citizenship :</span> 
                            <span  ><a> $citizenship</a></span>
                                <br>
                        <span class="ask"> Contact : </span> 
                            <span  ><a> $contact </a></span>
                                <br><br>
                    </div>
            </div>
            <div class="col-lg-10" >
                <h4 class="text-center" style="font-family:verdana; color:green;"> Student Project Documents and Link </h4>
                
                <table class="table table-hover" style="max-width:700px; margin:auto;">
                <thead>
                <tr>
                    <th>Document</th>
                    <th> Option </th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Project proposal</th>
                        <td><a style="color:blue;">Proposal for $tittle</a></td>
                        <td>
                            <button type="button"  data-toggle="modal" data-target="#downloadDIV"  class="btn btn-success">Download</button>
                        </td>
                    </tr>
                   
                    <tr>
                        <th>final Project</th>
                        <td><a style="color:blue;">$tittle</a></td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#downloadDIV2"  class="btn btn-success">Download</button>
                        </td>
                    </tr>

                    <tr>
                        <th>Domain name</th>
                        <td><a>$domain_name</a></td>
                        <td></td>
                    </tr>

                
                </tbody>
          </table>             
            </div>
EOF;

    }


echo<<<EOF
  <div class="modal fade" id="downloadDIV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Download project propasal file</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Student and University are right owner of this work, using without permition is against university law.
            Do you still want to download
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" data-dismiss="modal"  onclick = "downloadDoc('$proposalLink')">Yes</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="downloadDIV2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Download project file</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Student and University are right owner of this work, using without permition is against university law.
            Do you still want to download?
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" data-dismiss="modal"  onclick = "downloadDoc('$projectLink')">Yes</a>
        </div>
      </div>
    </div>
  </div>

EOF;

	

?>



