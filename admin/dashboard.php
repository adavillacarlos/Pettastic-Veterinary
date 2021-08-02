<!-- 
  Dashboard: Shows the summary of the entire system including the number of appointments, pets and users of the websites as well as the schedule in a calendar
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
  <!-- Font Style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">

  <!-- Logo -->  
  <link rel="shortcut icon" href="../assets/images/logo-icon.ico" />

  <title>Admin - Pettastic Veterinary Services</title>

  <!-- Additional CSS Files -->
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

  <link rel="stylesheet" href="../assets/css/template.css">

  <link rel="stylesheet" href="../assets/css/owl-carousel.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/evo-calendar.min.css">
  <link rel="stylesheet" href="../assets/css/evo-calendar.orange-coral.min.css">
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

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
            <a href="dashboard.php" class="logo">
              <img src="../assets/images/logo.png">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li></li>
              <li></li>
              <li></li>
              <li><a href="dashboard.php" style="color: #fba70b;">Dashboard</a></li>
              <li><a href="adminAppointment.php">Appointments</a></li>
              <li><a href="adminUsers.php">Users</a></li>
              <li><a href="adminPets.php">Pets</a></li>
              <li><a href="/Pettastic Veterinary/logout.php">Sign Out</a></li>
            </ul>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- Dashboard Starts-->
  <div class="container-fluid" style="position: relative; top: 100px; width: 90%;">
  <!-- Breadcrumbs Title for overview-->
          <ol class="bg-c-lite-green breadcrumb">
            <li class="breadcrumb-item">
              <a href="#" style="color: black;">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" style="color: white;">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-4 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-calendar-check"></i>
                  </div>
                  <!--Appointments Icon Card Starts -->
                  <div style=" text-align: center; font-size: 20px;">Appointments</div>
                  <div style=" text-align: center; font-size: 40px; font-weight: bolder;"><?php
                      $query = "select COUNT(*) from appointment";
                      $result = mysqli_query($con,$query);
                      $row = mysqli_fetch_assoc($result);
                      $numbers = $row['COUNT(*)'];
                      echo "$numbers";
                    ?></div>
                  </div>
                <a class="card-footer text-white clearfix small z-1" href="adminAppointment.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
               <!--Appointments Icon Card End-->
            <!-- Users Icon Card Starts-->
            <div class="col-xl-4 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <div style=" text-align: center; font-size: 20px;">Users</div>
                  <div style=" text-align: center; font-size: 40px; font-weight: bolder;"><?php
                      $query2 = "select COUNT(*) from ownermasterlist";
                      $result2 = mysqli_query($con,$query2);
                      $row2 = mysqli_fetch_assoc($result2);
                      $numbers2 = $row2['COUNT(*)'];
                      echo "$numbers2";
                    ?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="adminUsers.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <!-- Users Icon Card Ends-->
            <!-- Pet Icon Card Starts-->
            <div class="col-xl-4 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-paw"></i>
                  </div>
                  <div style=" text-align: center; font-size: 20px;">Pets</div>
                  <div style=" text-align: center; font-size: 40px; font-weight: bolder;"><?php
                      $query3 = "select COUNT(*) from pet";
                      $result3 = mysqli_query($con,$query3);
                      $row3 = mysqli_fetch_assoc($result3);
                      $numbers3 = $row3['COUNT(*)'];
                      echo "$numbers3";
                    ?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="adminPets.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
              <!-- Pet Icon Card Ends-->
          </div>
          <!-- Icon Cards Ends-->
<!-- Dashboard for Overview Ends -->
          
  <!-- Breadcrumbs Title-->
          <ol class="bg-c-lite-green breadcrumb">
            <li class="breadcrumb-item">
              <a href="#" style="color: black;">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" style="color: white;">Appointment Date</li>
          </ol>
</div>



  <!--Calendar Start-->
      <div class="padding">
        <div class="justify-content-center">
          <div id="calendar"></div>
        </div>
      </div>
  <!--Calendar End-->

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
  <script src="../assets/js/jquery-2.1.0.min.js"></script>

  <!-- Bootstrap -->
  <script src="../assets/js/popper.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>

  <!-- Plugins -->
  <script src="../assets/js/owl-carousel.js"></script>
  <script src="../assets/js/scrollreveal.min.js"></script>
  <script src="../assets/js/waypoints.min.js"></script>
  <script src="../assets/js/jquery.counterup.min.js"></script>
  <script src="../assets/js/imgfix.min.js"></script>

  <!-- Global Init -->
  <script src="../assets/js/custom.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
  <script src="../assets/js/evo-calendar.min.js"></script>
  
  <!-- Getting information for the Calendar and setting it up-->
  <script>
    $(document).ready(function() {
    $('#calendar').evoCalendar({
      theme: "Orange Coral",
      eventHeaderFormat: 'MM d, yyyy',
      calendarEvents: [
        <?php 
          $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
          $query = "select * from appointment, ownermasterlist where appointment.OwnerId = ownermasterlist.OwnerID";
          $result = mysqli_query($con,$query);
          while($row = mysqli_fetch_assoc($result)){
            echo "{
              id: '".$row['AppointmentId']."', 
              name: '', 
              date: '".$row['Date']."', 
              description: 'Owner: ".$row['Lastname'].", ".$row['Firstname']." ".$row['MI'].". <br>Timeslot: ".$row['TimeSlot']."<br>Service: ".$row['Service']."',
              type: 'event', 
            },";
          }
          ?>
      ]
    })
})
  </script>
</body>

</html>