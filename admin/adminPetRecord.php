  <!--- 
    Admin Pet Record: shows data of the pet records where you can edit and delete their profiles
  --->
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

  <!-- Font style-->
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
              <li><a href="adminAppointment.php">Appointments</a></li>
              <li><a href="adminUsers.php">Users</a></li>
              <li><a href="adminPets.php" style="color: #fba70b;">Pets</a></li>
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
                    <th>Action</th>
                  </tr>
                </thead>
                  <tbody>
                  <?php
                    if($con){
                      //fetching and displaying the data
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
                          "; 
                        ?>
                      <td>
                          <button type="button" class="btn btn-success editbtn" >Edit</button>
                          <button type="button" class="btn btn-danger deletebutton">Delete</button>
                          </td>
                          <?php
                          echo"</tr>";
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

 <!--Modal for Editing REcord-->
 <div class="modal fade" id="editrecordmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <form method="POST" action="adminPHP/updateRecord.php">
                    <div class="modal-header text-center">
                        <h3 class="w-100" id="myModalLabel"><strong>Edit Record</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-4">
                    <!--Body-->
                    <div class="form-label-group">
                            <input type="hidden" id="recordid" class="form-control" placeholder="Record ID" name="recordid" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <input type="date" id="date" class="form-control" placeholder="Date" name="date" required autofocus>
                            <label >Date</label>
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
                        <div class="form-label-group">
                          <p>Status</p>
                            <select name="status" id="status"  class="form-control">
                              <option value="Pending">Pending</option>
                              <option value="Confirmed">Confirmed</option>
                              <option value="Expired">Expired</option>
                           </select>
                        </div>
                      
                    </div>
                    <div class="text-center mb-3  pt-3">
                            <button type="submit" name="updateData" class="main-button" id="modal-edit">Save</button>
                </div>
                </form>
            </div>
        </div>
  </div>
  <!--Modal for Editing End -->

   <!--Modal for Deleting -->
  <div class="modal fade" id="deleterecordmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <form method="POST" action="adminPHP/deleteRecord.php">
                    <div class="modal-header text-center">
                        <h3 class="w-100" id="myModalLabel"><strong>Delete Record</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-label-group">
                            <input type="hidden" id="deleterecordid" class="form-control" placeholder="Record ID" name="deleterecordid">
                        </div>
                        <div class="form-label-group">
                            <p>Do you want to delete this user?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                          <button type="submit" name="deleteRecord" class="main-button" id="modal-delete">Yes</button>
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

  <!-- Deleting the pets record-->
  <script>
     $(document).ready(function() {
      $('.deletebutton').on('click',function(){
        $('#deleterecordmodal').modal('show');
          $tr = $(this).closest('tr');
          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();
          console.log(data);
          $('#deleterecordid').val(data[0]);
      });
    });
  
  </script>

  <!--Retrieving data and setting the data in the modal-->
  <script>
      $(document).ready(function() {
        $('.editbtn').on('click',function(){
          $('#editrecordmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#recordid').val(data[0]);
            $('#date').val(data[1]);
            $('#service').val(data[2]);
            $('#status').val(data[3]);
        });
      });
    
    </script>
  </body>

</html>