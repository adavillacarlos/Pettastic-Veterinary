  <!--- 
    Admin Pets: shows data of the pet where the admin can view their records (re-directing the admin to another page) edit and delete pets' profiles.
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
  $query = "SELECT * from pet";
  $result = mysqli_query($con,$query);
  
  //keeps the content in the server side before redirecting to adminPetRecord.php page
  ob_start();

?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Veterinary Services">
  <meta name="author" content="Corral, Rabanes, Villacarlos">

<!-- Font Style-->
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
            Pet Details
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Pet Name</th>
                    <th>Species</th>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>OwnerId</th>
                    <th >Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    //showing the data in the pet table
                    while($row = mysqli_fetch_assoc($result)){
                      echo"<tr>
                        <td>".$row['PetId']."</td>
                        <td>".$row['Name']."</td>
                        <td>".$row['Species']."</td>
                        <td>".$row['Breed']."</td>
                        <td>".$row['Age']."</td>
                        <td>".$row['Sex']."</td>
                        <td >".$row['OwnerId']."</td>
                      "; 
                      ?>
                      <td>
                      <button type="button" class="btn btn-dark recordbtn">Record</button>
                      <button type="button" class="btn btn-success editbtn" >Edit</button>
                      <button type="button" class="btn btn-danger deletepetbtn">Delete</button>
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
  </div>
  <!--Table Ends-->

<!--Modal for Record -->
  <div class="modal fade" id="recordmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <form method="POST">
                    <div class="modal-header text-center">
                        <h3 class="w-100" id="myModalLabel"><strong>Pet Record</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-label-group">
                            <input type="hidden" id="petid" class="form-control" placeholder="Pet ID" name="petid">
                        </div>
                        <div class="form-label-group">
                            <p>Do you want to see pet records?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                          <button type="submit" name="recordPet" class="main-button" id="modal-delete">Yes</button>
                           <?php
                            
                          ?> 
                          <button type="button" class="main-button" data-dismiss="modal">No</button>
                    </div>
                   
                </form>
                <?php
                  //redirecting the user to another page once you click the button for the specific pet
                  if(isset($_POST['recordPet'])){
                  $_SESSION['record'] = $_POST['petid']; 
                  header("location:../admin/adminPetRecord.php");
                  exit;
                  }
                  ob_end_flush();
                ?>
            </div>
    </div> 
  </div>          
 
 <!--Modal for Editing Profile-->
 <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <form method="POST" action="adminPHP/updatePet.php">
                    <div class="modal-header text-center">
                        <h3 class="w-100" id="myModalLabel"><strong>Edit Pet</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-4">
                    <!--Body-->
                    <div class="form-label-group">
                            <input type="hidden" id="pet_id" class="form-control" placeholder="Pet ID" name="pet_id" required autofocus>
                        </div>
                    <div class="form-label-group">
                            <input type="hidden" id="owner_id" class="form-control" placeholder="Owner ID" name="owner_id" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="Name" class="form-control" placeholder="Pet Name" name="Name" required autofocus>
                            <label for="Petname">Pet Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="Species" class="form-control" placeholder="Species" name="Species" required autofocus>
                            <label for="Species">Species</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="Breed" class="form-control" placeholder="Breed" name="Breed" required autofocus>
                            <label for="Breed">Breed</label>
                        </div>
                        <div class="form-label-group">
                            <input type="num" id="Age" class="form-control" placeholder="Age" name="Age" required autofocus>
                            <label for="Age">Age</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="Sex" class="form-control" placeholder="Sex" name="Sex" required autofocus>
                            <label for="Sex">Sex</label>
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
  <div class="modal fade" id="deletepetmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <form method="POST" action="adminPHP/deletePet.php">
                    <div class="modal-header text-center">
                        <h3 class="w-100" id="myModalLabel"><strong>Delete User</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-label-group">
                            <input type="hidden" id="deletepet_id" class="form-control" placeholder="Pet ID" name="deletepet_id">
                        </div>
                        <div class="form-label-group">
                            <p>Do you want to delete this user?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                          <button type="submit" name="deletePet" class="main-button" id="modal-delete">Yes</button>
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

   <!---Deleting the pet--->
  <script>
      $(document).ready(function() {
        $('.deletepetbtn').on('click',function(){
          $('#deletepetmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#deletepet_id').val(data[0]);
        });
      });
    
  </script>

   <!--Retrieving data and setting the data in the modal-->
  <script>
      $(document).ready(function() {
        $('.editbtn').on('click',function(){
          $('#editmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#pet_id').val(data[0]);
            $('#Name').val(data[1]);
            $('#Species').val(data[2]);
            $('#Breed').val(data[3]);
            $('#Age').val(data[4]);
            $('#Sex').val(data[5]);
        });
      });
    
  </script>

   <!--Retrieving the data and saving the data to be passed-->
  <script>
      $(document).ready(function() {
        $('.recordbtn').on('click',function(){
          $('#recordmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#petid').val(data[0]);
        });
      });  
  </script>

  </body>

</html>