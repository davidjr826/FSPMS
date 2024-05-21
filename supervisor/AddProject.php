<?php
session_start();
include('../conn.php');
if(!isset($_SESSION['sup_email'])){
    header('location:../index.php');
}

if(!isset($_SESSION["Admin_SESSION"])){
    header("location: index.php");
}
if(!isset($_SESSION['Studentprocessing'])){
  $_SESSION['Studentprocessing'] = "";
}


?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FSPMS</title>
  <link rel="shortcut icon" href="../images/LOGO2" type="image/vnd.microsoft.icon" />

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

  <style>
    table tr:hover .lastCol{
      background-color:green;
      width:35px;
    }
  </style>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark  static-top" style="background-color:#006400;">

    <a class="navbar-brand mr-1" href="index.php"><span>
      <img src="../images/LOGO2" alt=""style="width:50px; border-radius:10px;  height:30px;"></span> FSPMS
    </a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <span style="color:white; font-weight:600; font-family:Gentona;">
          Finalist Student Project Managment System
        </span>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      <li class="nav-item dropdown no-arrow  mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="badge badge-danger">ON</span>
          <i class="fas fa-user-circle fa-fw"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="index.php">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <?php echo $_SESSION["Admin_SESSION"]; ?>
      <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="project.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Projects</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="change_pass.php">
          <i class="fas fa-fw fa-lock"></i>
          <span>Change password</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">FSPMS</a>
          </li>
          <li class="breadcrumb-item active">Managing projects</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage project
          </div>
          
          <div class="card-body" id="projectDiv">
            <div class="table-responsive " id="tabletable">
                        <?php echo $_SESSION['Studentprocessing']; unset($_SESSION['Studentprocessing']); ?>
                        <form class="form-horizontal" action="projectProcessing.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group" style=" margin-top:20px; margin-left:1%;">
                            <div class="form-group">
                                <label class="col-sm-4" >Project tittle:</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="tittle" placeholder="Enter project tittle" required>
                                </div>
                            </div>
                        </div>
                        

                        <div class="form-group" style=" margin-top:20px; margin-left:1%;">
                            <div class="form-group">
                                <label class="col-sm-4" >Type of project:</label>
                                <div class="col-sm-9">
                                    <select name="project_type" class="form-control" required>
                                            <?php
                                              $d_query = "SELECT * FROM project_type WHERE 1 ORDER BY project_type ASC;";
                                              $run_d_query = mysqli_query($conn,$d_query);
                                              while($st = mysqli_fetch_assoc($run_d_query)){
                                                  $project_type = $st['project_type'];
                                                  echo "<option value='{$project_type}'>{$project_type} </option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style=" margin-top:20px; margin-left:1%;">
                            <div class="form-group">
                                <label class="col-sm-4" >Year of project:</label>
                                <div class="col-sm-9">
                                <input type="number" class="form-control" name="year" placeholder="Enter project year" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style=" margin-top:20px; margin-left:1%;">
                            <div class="form-group">
                                <label class="col-sm-4" >Domain name:</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="domain" placeholder="What is system domain name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style=" margin-top:20px; margin-left:1%;">
                            <div class="form-group">
                                <label class="col-sm-4" >Student:</label>
                                <div class="col-sm-9">
                                    <select name="st_ID" class="form-control" required>
                                            <?php
                                              $d_query = "SELECT * FROM student WHERE 1 ORDER BY fname ASC;";
                                              $run_d_query = mysqli_query($conn,$d_query);
                                              while($st = mysqli_fetch_assoc($run_d_query)){
                                                  $st_ID = $st['st_ID'];
                                                  $fname = $st['fname'];
                                                  $mname = $st['mname'];
                                                  $lname = $st['lname'];
                                                  echo "<option value='{$st_ID}'>{$st_ID} : {$fname} {$mname} {$lname} </option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style=" margin-top:20px; margin-left:1%;">
                            <div class="form-group">
                                <label class="col-sm-4" >Supervisor:</label>
                                <div class="col-sm-9">
                                    <select name="sup_email" class="form-control" required>
                                            <?php
                                              $d_query = "SELECT * FROM supervisor WHERE 1 ORDER BY fname ASC;";
                                              $run_d_query = mysqli_query($conn,$d_query);
                                              while($st = mysqli_fetch_assoc($run_d_query)){
                                                  $sup_email = $st['sup_email'];
                                                  $fname = $st['fname'];
                                                  $mname = $st['mname'];
                                                  $lname = $st['lname'];
                                                  echo "<option value='{$sup_email}'>{$sup_email} : {$fname} {$mname} {$lname} </option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <h5> Upload files <h5><hr>
                        <div class="form-group" style=" margin-top:20px; margin-left:1%;">
                            <div class="form-group">
                                <label class="col-sm-4" >Project Propasal file:</label>
                                <div class="col-sm-9">
                                <input type="file"   name="document[]" placeholder="project propasal files" required>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group" style=" margin-top:20px; margin-left:1%;">
                            <div class="form-group">
                                <label class="col-sm-4" >final Project file:</label>
                                <div class="col-sm-9">
                                <input type="file"  name="document[]" placeholder="project propasal files" required>
                                </div>
                            </div>
                        </div>

                  

                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" name="create" class="btn btn-success btn-sm"> save project</button>
                        </div>
                    </div>

                </form>

            </div>
          </div>
          <div class="card-footer small text-muted">project</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em></em>
        </p>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer" style="background-color:#006400; color:white;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © FSPMS 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="supervisor.js"></script>

</body>

</html>
