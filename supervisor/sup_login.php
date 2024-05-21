<?PHP
session_start();	
sleep(2);	
include("../conn.php"); //connect to database

//restrict database injection  by code bellow
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = md5($password);
//test user input value
	
	
//login to student table
$sql = "SELECT * FROM supervisor WHERE password = '{$password}' and sup_email = '{$email}' ;" ;
$run = mysqli_query($conn, $sql);

$row = mysqli_num_rows($run);

	if($row == 0){
		
			echo "2";	

	}else{
		session_destroy();
		session_start();
		while($manager = mysqli_fetch_assoc($run)){
			$user_type = $manager['user_type'];
		}
		if($user_type ==  "ADMIN"){
			$_SESSION["Admin_SESSION"] = <<<EOF
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-fw fa-folder"></i>
				<span>Dashboard</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<div class="dropdown-divider"></div>
					<h6 class="dropdown-header">manages pages:</h6>
					<a class="dropdown-item" href="AddStudent.php">Manage student</a>
					<a class="dropdown-item" href="AddSupervisor.php">Manage supervisor</a>
					<a class="dropdown-item" href="AddProject">Manage project</a>
					<div class="dropdown-divider"></div>
				</div>
			</li>
EOF;
		}
		$_SESSION["sup_email"] = $email;
		echo "1";
	}


		
		
	
	

?>