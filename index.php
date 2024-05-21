<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FSPMS</title>
  <link rel="shortcut icon" href="images/LOGO2" type="image/vnd.microsoft.icon" />

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <style>
    #log_error, #log_success{
      display:none;
    }
  </style>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark  static-top" style="background-color:#006400;">

    <a class="navbar-brand mr-1" href="index.php"><span>
      <img src="images/LOGO2" alt=""style="width:50px; border-radius:10px;  height:30px;"></span> FSPMS
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
          <span class="badge badge-danger">OFF</span>
          <i class="fas fa-user-circle fa-fw"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Home</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Log Status</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="forgot-password.php">
          <i class="fas fa-fw fa-lock"></i>
          <span>forget password</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">FSPMS</a>
          </li>
          <li class="breadcrumb-item active">Guest login</li>
        </ol>

               <!-- Login div-->
              <div class="card card-login mx-auto mt-8 ">
                  <div class="card-header">
                    <span>
                        <img src="images/LOGO2" alt=""style="width:50px; border-radius:10px;  height:30px;">
                    </span>Login to FSPMS
                  </div>
                  <div class="card-body">


                    <form onsubmit="return sup_login()">
                      <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control"  name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control"  name="password" required>
                      </div>

                        <div class="form-group">
                                            <!-- this is loading div -->
                                            <div id= "wait" style="position:absolute; display: none;  top:0px; left:0px; width:100%; height:100%;background-color: rgba(0, 0, 0, 0.1); z-index: 11; ">
                                                <span style="position: absolute; top:50%; left:40%; width:60px; height:60px;">
                                                    <img src="images/wait.gif" alt="" style="width:100%; height:100%">
                                                </span>
                                            </div>
                                              <!-- login alert messages -->
                                              <div class="alert alert-danger" id="log_error">
                                                <b>Error! </b><span id= "MSGtext_error"></span>
                                              </div>
                                              <div class="alert alert-success" id="log_success">
                                                  <b>_ </b><span id= "MSGtext_success"></span>
                                              </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" style="border-radius:10px;">Login</button>
                    </form>
                    <div class="taext-center">
                      <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
                    </div>
                  </div>
                </div>
              </div>


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
          <h5 class="modal-title" id="exampleModalLabel">Are you a supervisor?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Your current on guest page. login and start access system based on your prevaleges.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Login now</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- for login purpose-->
  <script src="js/home.js"></script>

</body>

</html>
