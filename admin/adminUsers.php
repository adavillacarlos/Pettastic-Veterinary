<!-- 
  Admin user: shows the users in a table where the admin can edit and delete the owners' accounts
-->

<?php

   $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
   session_start();
   
    //checking if the session is already there
    if(!isset($_SESSION['login'])) {
      header("location:/Pettastic Veterinary/opening/index.html");
    } else {
      $Email = $_SESSION['login'];
    }
   $query = "SELECT * from ownermasterlist";
   $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Veterinary Services">
  <meta name="author" content="Corral, Rabanes, Villacarlos">
  
  <!-- Font style -->
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
              <li></li><li></li><li></li>
              <li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="adminAppointment.php" >Appointments</a></li>
              <li><a href="adminUsers.php" style="color: #fba70b;">Users</a></li>
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
            User Details
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Last Name</th>
                    <th>First Name </th>
                    <th>MI</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Contact No.</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Postal Code</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //getting the data from the ownermasterlist
                    while($row = mysqli_fetch_assoc($result)){
                      echo"<tr>
                        <td>".$row['OwnerID']."</td>
                        <td>".$row['Lastname']."</td>
                        <td>".$row['Firstname']."</td>
                        <td>".$row['MI']."</td>
                        <td>".$row['Email']."</td>
                        <td>".$row['Password']."</td>
                        <td>".$row['ContactNo']."</td>
                        <td>".$row['Street']."</td>
                        <td>".$row['City']."</td>
                        <td>".$row['State']."</td>
                        <td>".$row['PostalCode']."</td>
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
                <form method="POST" action="adminPHP/updateUser.php">
                    <div class="modal-header text-center">
                        <h3 class="w-100" id="myModalLabel"><strong>Edit Profile</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-4">
                    <!--Body-->
                    <div class="form-label-group">
                            <input type="hidden" id="owner_id" class="form-control" placeholder="Owner ID" name="owner_id" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="Firstname" class="form-control" placeholder="First Name" name="Firstname" required autofocus>
                            <label for="inputFirstNameProfile">First Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="MI" class="form-control" placeholder="Middle Name" name="MI" required autofocus>
                            <label for="inputMiddleNameProfile">Middle Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="Lastname" class="form-control" placeholder="Last Name" name="Lastname" required autofocus>
                            <label for="inputLastNameProfile">Last Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="Email" class="form-control" placeholder="Email Address" name="Email" required autofocus>
                            <label for="inputEmailProfile">Email Address</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="Password" class="form-control" placeholder="Password" name="Password" required autofocus>
                            <label for="inputPasswordProfile">Password</label>
                        </div>
                        <div class="form-label-group">
                            <input type="tel" id="Contact" class="form-control" placeholder="ContactNo" name="ContactNo" required autofocus>
                            <label for="inputContactNoProfile">Contact No.</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="Street" class="form-control" placeholder="Street" name="Street" required autofocus>
                            <label for="inputStreetProfile">Street</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="City" class="form-control" placeholder="City" name="City" required autofocus>
                            <label for="inputCityProfile">City</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="State" class="form-control" placeholder="State" name="State" required autofocus>
                            <label for="inputStateProfile">State</label>
                        </div>
                        <div class="form-label-group">
                            <input type="postal" id="Postal" class="form-control" placeholder="Postal" name="Postal" required autofocus>
                            <label for="inputPostalProfile">Postal</label>
                        </div>
                       
                    </div>
                    <div class="text-center mb-3  pt-3">
                            <button type="submit" name="updateData" class="main-button" id="modal-edit">Save</button>
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
                <form method="POST" action="adminPHP/deleteUser.php">
                    <div class="modal-header text-center">
                        <h3 class="w-100" id="myModalLabel"><strong>Delete User</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-label-group">
                            <input type="hidden" id="deleteowner_id" class="form-control" placeholder="Owner ID" name="deleteowner_id">
                        </div>
                        <div class="form-label-group">
                            <p>Do you want to delete this user?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                          <button type="submit" name="deleteUser" class="main-button" id="modal-delete">Yes</button>
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
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

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
          $tr = $(this).closest('tr');
          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();
          console.log(data);
          $('#deleteowner_id').val(data[0]);
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
          $('#owner_id').val(data[0]);
          $('#Lastname').val(data[1]);
          $('#Firstname').val(data[2]);
          $('#MI').val(data[3]);
          $('#Email').val(data[4]);
          $('#Password').val(data[5]);
          $('#Contact').val(data[6]);
          $('#Street').val(data[7]);
          $('#City').val(data[8]);
          $('#State').val(data[9]);
          $('#Postal').val(data[10]);
      });
    });
  
  </script>



</body>

</html>