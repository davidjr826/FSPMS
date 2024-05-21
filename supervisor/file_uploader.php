<?php
@session_start();
include('../conn.php');

if(!isset($_SESSION['sup_email'])){
  header('location:../index.php');
}

$sup_email = $_SESSION['sup_email'];

		$ImageName = $_FILES['photo']['name'];
		$path = 'profile/'; 
		$location = $path .$ImageName; 
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $location) ){ 
			$image = $_SESSION['sup_image'];
				//test if there is no image on db then put something as name
				if(empty($image)){
					$image = "none.png";
				}

			$currentPhoto = $path .$image;

			if(file_exists($currentPhoto) and $image != "user.ico"){
				unlink("$currentPhoto");
			}else{  }
			
			$sql = "UPDATE `supervisor` SET `co_image` = '{$ImageName}' WHERE sup_email = '{$sup_email}'; ";
			mysqli_query($conn, $sql);
			$_SESSION['sup_image'] = $ImageName;
			header( "Location:index.php");;
				exit();	

		}else
		{
			$_SESSION['uploadMSG']= "<a style='color:red; font-size:14px;''>fail to upload</a>";
			header("Location:index.php");
								exit();
		}
		
	
	
?>
