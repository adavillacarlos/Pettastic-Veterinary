<!DOCTYPE html>
  <!--- 
    Admin Appointment: shows data of the user where you can edit and delete their profiles
  --->

<html lang="en">
<?php
    //connecting to the database
   $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
   
   session_start();

   //checking if the session is already there
   if(!isset($_SESSION['login'])) {
      header("location:/Pettastic Veterinary/opening/index.html");
    } else {
      $Email = $_SESSION['login'];
    }

    //get the data in the appointment table
   $query = "SELECT * from appointment";
   $result = mysqli_query($con,$query);

?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Veterinary Services">
  <meta name="author" content="Corral, Rabanes, Villacarlos">
  
  <!-- Font Style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">

  <!--Logo -->  
  <link rel="shortcut icon" href="../assets/images/logo-icon.ico" />

  <title>Admin - Pettastic Veterinary Services</title>

  <!-- Additional CSS Files -->
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

  <link rel="stylesheet" href="../assets/css/template.css">

  <link rel="stylesheet" href="../assets/css/owl-carousel.css">
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
              <li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="adminAppointment.php" style="color: #fba70b;">Appointments</a></li>
              <li><a href="adminUsers.php">Users</a></li>
              <li><a href="adminPets.php">Pets</a></li>
              <li><a href="../logout.php">Sign Out</a></li>
            </ul>
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
            Appointment Details
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Timeslot</th>
                    <th>Service</th>
                    <th>Owner ID </th>
                    <th>Pet ID </th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //fetching the data in the database
                    while($row = mysqli_fetch_assoc($result)){
                      echo"<tr>
                        <td>".$row['AppointmentId']."</td>
                        <td>".$row['Date']."</td>
                        <td>".$row['TimeSlot']."</td>
                        <td>".$row['Service']."</td>
                        <td>".$row['OwnerId']."</td>
                        <td>".$row['PetId']."</td>
                      "; 
                      ?>
                      <td>
                       <button type="button" class="btn btn-success editbtn" >Edit</button>
                       <button type="button" class="btn btn-danger deletebtn">Delete</button>
                      </td>
                      <?php
                      echo"</tr>";
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
  <!--Table Ends-->

  <!--Modal for Editing -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <form method="POST" action="adminPHP/updateAppointment.php">
                    <div class="modal-header text-center">
                        <h3 class="w-100" id="myModalLabel"><strong>Edit Profile</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-4">
                    <!--Body-->
                    <div class="form-label-group">
                            <input type="hidden" id="updateid" class="form-control" placeholder="Appointment ID" name="updateid" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <input type="date" id="date" class="form-control" placeholder="Date" name="date" required autofocus>
                            <label for="inputFirstNameProfile">Date</label>
                        </div>
                        <div class="form-label-group">
                            <input type="time" id="timeslot" class="form-control" placeholder="Time"  name="timeslot" required autofocus>
                            <label  style="text-align:left"for="inputTime">Time</label>
                        </div>
                        <div class="form-label-group">
                                            <p>Services</p>
                                                <select class="form-control" name="service" required>
                                                    <option selected disabled value="">Services</option>
                                                    <option value="Exams and Diagnostics">Exams and Diagnostics</option>
                                                    <option value="Microchipping">Microchipping</option>
                                                    <option value="Vaccinations">Vaccinations</option>
                                                    <option value="Grooming">Grooming</option>
                                                    <option value="Spay and Neuter">Spay and Neuter</option>
                                                </select>
                                            </div>
                    </div>
                    <div class="text-center mb-3  pt-3">
                            <button type="submit" name="updateAppointment" class="main-button" id="modal-edit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<!--Modal for Deleting-->
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <form method="POST" action="adminPHP/deleteAppointment.php">
                    <div class="modal-header text-center">
                        <h3 class="w-100" id="myModalLabel"><strong>Delete User</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-label-group">
                            <input type="hidden" id="deleteid" class="form-control" placeholder="Appointment ID" name="deleteid">
                        </div>
                        <div class="form-label-group">
                            <p>Do you want to delete this user?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                          <button type="submit" name="deleteAppointment" class="main-button" id="modal-delete">Yes</button>
                          <button type="button" class="main-button" data-dismiss="modal">No</button>
                    </div>
                </form>
            </div>
    </div> 
  </div>          

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

  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
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
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../assets/js/demo/datatables-demo.js"></script>

   <!---Deleting the user--->
  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click',function(){
        $('#deletemodal').modal('show');
        //to getting the id of the user in that row and storing its id.
          $tr = $(this).closest('tr');
          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();
          console.log(data);
          $('#deleteid').val(data[0]);
      });
    });
  
  </script>

  <!--Getting and setting the values in the modal-->
  <script>
    $(document).ready(function() {
      $('.editbtn').on('click',function(){
        $('#editmodal').modal('show');
          $tr = $(this).closest('tr');
          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();
          console.log(data);
          $('#updateid').val(data[0]);
          $('#date').val(data[1]);
          $('#timeslot').val(data[2]);
          $('#service').val(data[3]);
      });
    });
  
  </script>
</body>

</html>