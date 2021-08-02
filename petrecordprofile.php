<!-- 
  Pet Record Profile: displays all the records that the pet has undergo 
-->

<!DOCTYPE html>
<html lang="en">
<?php
   $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
   session_start();
   
    //checking if the session is already there
   if(!isset($_SESSION['login'])) {
      header("location:/Pettastic Veterinary/opening/index.html");
    } else {
      $Email = $_SESSION['login'];
    }
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Veterinary Services">
  <meta name="author" content="Corral, Rabanes, Villacarlos">

  <!-- Font Style-->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">
  
  <!-- Logo of the website-->
  <link rel="shortcut icon" href="assets/images/logo-icon.ico" />

  <title>Admin - Pettastic Veterinary Services</title>

  <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/template.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
</head>
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

 <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index2.php" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index2.php#welcome">Home</a></li>
                            <li class="submenu">
                                <a href="javascript:;">About</a>
                                <ul>
                                    <li><a href="index2.php#about">About Us</a></li>
                                    <li ><a href="index2.php#testimonials">Testimonials</a></li>
                                </ul>
                            </li>
                          
                            <li class="submenu">
                                <a href="javascript:;">Services</a>
                                <ul>
                                    <li><a href="services.php" >Services Offered</a></li>
                                   <li><a href="terms.php">Book Appointment</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#contact-us" class="menu-item">Contact Us</a></li>
                            <li class="submenu">
                                <a href="javascript:;" style="color: #fba70b;">Profile</a>
                                <ul>
                                    <li><a href="userprofile.php">User</a><li></li>
                                    <li><a href="petprofile.php" >Pets</a></li>
                                    <li><a href="logout.php" >Sign Out</a></li>
                                </ul>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

<!--Table Starts-->
<div class="container-xl padding">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Record Details
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>PetId</th>
                  </tr>
                </thead>
                  <tbody>
                  <?php
                    if($con){
                      //fetching the data 
                      if(!empty($_SESSION['record'])) {
                        $petid = $_SESSION['record'];
                        $query2="select * from record where petid = $petid";
                        $result2 = mysqli_query($con,$query2);
                        $count = mysqli_num_rows($result2);
                        while($row2 = mysqli_fetch_assoc($result2)){
                          echo"<tr>
                            <td>".$row2['RecordId']."</td>
                            <td>".$row2['Date']."</td>
                            <td>".$row2['Service']."</td>
                            <td>".$row2['Status']."</td>
                            <td>".$row2['PetId']."</td>
                            </tr>";
                        }
                    }
                }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!--Table Ends-->

    <div class="left-image-decor"></div>

    <!-- ***** Footer Start ***** -->
    <footer id="contact-us">
      <div class="container">
        <div class="footer-content"></div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="sub-footer">
            <p>Phone: (212) 430-8335
              <br> Location: Punta Princessa, Garden Side, Cebu City
              <br><br>Copyright &copy; 2021 All Rights Reserved
            </p>

          </div>
        </div>
      </div>
      </div>
    </footer>

    <!-- jQuery -->
   <script src="assets/js/jquery-2.1.0.min.js"></script>

   <!-- Bootstrap -->
   <script src="assets/js/popper.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>

   <!-- Plugins -->
   <script src="assets/js/owl-carousel.js"></script>
   <script src="assets/js/scrollreveal.min.js"></script>
   <script src="assets/js/waypoints.min.js"></script>
   <script src="assets/js/jquery.counterup.min.js"></script>
   <script src="assets/js/imgfix.min.js"></script>

   <!-- Global Init -->
   <script src="assets/js/custom.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>


<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin.js"></script>

<!-- Demo scripts for this page-->
<script src="assets/js/demo/datatables-demo.js"></script>

  </body>

</html>