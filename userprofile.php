<!-- 
    User Profile: display the information of the user that includes the number of appointments and pets the users have and as well as the user's appointments present and previous appointments. 
-->

<!DOCTYPE html>
<html lang="en">
<?php
    $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
    session_start();
    if(!isset($_SESSION['login'])) {
        header("location:/Pettastic Veterinary/opening/index.html");
     } else {
        $Email = $_SESSION['login'];
     }

    $query = "SELECT * FROM ownermasterlist WHERE Email='".$_SESSION['login']."'";
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
    if($count==0)
        echo "No record found";
    else {
        while($row = mysqli_fetch_assoc($result)){
           $ID = $row['OwnerID'];
           $Lastname = $row['Lastname'];
           $Firstname = $row['Firstname'];
           $MI = $row['MI'];
           $Email = $row['Email'];
           $Password = $row['Password'];
           $ContactNo = $row['ContactNo'];
           $Street = $row['Street'];
           $City = $row['City'];
           $State = $row['State'];
           $PostalCode = $row['PostalCode'];
        }
    }

    $_SESSION['ID'] = $ID;

    $pet_query = "SELECT * FROM pet WHERE OwnerId='$ID'";
    $pet_result = mysqli_query($con,$pet_query);
    $count_pet = mysqli_num_rows($pet_result); 
    if($count_pet==0){
        $count_pet="No Pets Found";
    }

    $appointment_query = "SELECT * from appointment  WHERE OwnerId='$ID'";
    $appointment_result = mysqli_query($con,$appointment_query);
    $count_appointment = mysqli_num_rows($appointment_result); 
    if($count_appointment==0){
        $count_appointment="No Appoinments Found";
    }
   

?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Veterinary Services">
    <meta name="author" content="Corral, Rabanes, Villacarlos">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/logo-icon.ico"/>

    <title>Pettastic Veterinary Services</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/template.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

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
                                <li><a href="index2.php#testimonials" class="menu-item">Testimonials</a></li>
                            </ul>
                        </li>
                      
                        <li class="submenu">
                            <a href="javascript:;" >Services</a>
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

    <!--PROFILE Start-->
    <!-- Fetched the specific user's information then displayed them-->
    <div class="container">
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-10 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                        <h6 class="f-w-600"><?php echo $Lastname .", ". $Firstname ." ". $MI ."."; ?></h6>
                                        <p><?php echo $ID; ?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400"><?php echo $Email;?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Contact No.</p>
                                                <h6 class="text-muted f-w-400"><?php echo $ContactNo;?></h6>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Address</p>
                                                <h6 class="text-muted f-w-400"><?php echo $Street .", ". $City .", ". $State ." ". $PostalCode?></h6>
                                            </div>
                                           
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Pets</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Number of Pets</p>
                                                <?php
                                                    echo "<h6 class='text-muted f-w-400'>$count_pet</h6>"; 
                                                ?>
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Number of Appointments</p>
                                                <?php
                                                    echo "<h6 class='text-muted f-w-400'>$count_appointment</h6>"; 
                                                ?>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Appointment</h6>
                                        <div class="row">
                                        <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:left;">Date</th>
                                                <th scope="col"style="text-align:left;">Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = "SELECT * from appointment WHERE OwnerId='$ID'";
                                                 $result = mysqli_query($con,$query);
                                                while($row = mysqli_fetch_assoc($result)){
                                                echo"<tr>
                                                    <td style="."text-align:left;".">".$row['Date']."</td>
                                                    <td style="."text-align:left;".">".$row['TimeSlot']."</td>
                                                    </tr>";
                                                }
                                            ?>
                                        </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <br>
                                  
                                    <div class="float-right">
                                        <button type="submit" id="form-submit" class="secondary-button text-left" data-toggle="modal" data-target="#profileModal">Edit Profile</button>
                                        <button type="submit" id="form-submit" class="secondary-button text-left" data-toggle="modal" data-target="#addPet">Add Pet</button>
                                        <br><br>
                                       
                                    </div>
                                    <button type="submit" class="secondary-button text-left" data-toggle="modal" data-target="#deletemodal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--PROFILE End-->
    </div>
   
    <!--Modal for Editing Profile-->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
                <!--Header-->
                <form method="POST" action="php/updateUserProfile.php">
                    <div class="modal-header text-center">
                        <h3 class="w-100" id="myModalLabel"><strong>Edit Profile</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-4">
                    <!--Body-->
                    <div class="form-label-group">
                            <input type="hidden" id="owner_id" class="form-control" placeholder="Owner ID" value="<?php echo $ID; ?>" name="owner_id" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="FirstName" class="form-control" placeholder="FirstName" name="Firstname" value="<?php echo $Firstname; ?>" required autofocus>
                            <label for="FirstName">First Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="inputMiddleNameProfile" name="MI" value="<?php echo $MI; ?>" class="form-control" placeholder="Middle Name" required autofocus>
                            <label for="inputMiddleNameProfile">Middle Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="inputLastNameProfile" name="Lastname" value="<?php echo $Lastname; ?>" class="form-control" placeholder="Last Name" required autofocus>
                            <label for="inputLastNameProfile">Last Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="email" id="inputEmailProfile" class="form-control" name="Email" value="<?php echo $Email; ?>" placeholder="Email Address" required autofocus>
                            <label for="inputEmailProfile">Email Address</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputPasswordProfile" class="form-control" name="Password" value="<?php echo $Password; ?>" placeholder="Password" required autofocus>
                            <label for="inputPasswordProfile">Password</label>
                        </div>
                        <div class="form-label-group">
                            <input type="tel" id="inputContactNoProfile" name="ContactNo" value="<?php echo $ContactNo; ?>" class="form-control" placeholder="ContactNo" required autofocus>
                            <label for="inputContactNoProfile">Contact No.</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="inputStreetProfile" name="Street" value="<?php echo $Street; ?>" class="form-control" placeholder="Street" required autofocus>
                            <label for="inputStreetProfile">Street</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="inputCityProfile" name="City" class="form-control" value="<?php echo $City; ?>" placeholder="City" required autofocus>
                            <label for="inputCityProfile">City</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="inputStateProfile" name="State" class="form-control" value="<?php echo $State; ?>" placeholder="State" required autofocus>
                            <label for="inputStateProfile">State</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="inputPostalProfile" name="Postal" class="form-control" value="<?php echo $PostalCode; ?>"  placeholder="Postal" required autofocus>
                            <label for="inputPostalProfile">Postal</label>
                        </div>
                        
                    </div>
                    <div class="text-center mb-3  pt-3">
                            <button type="submit" class="main-button" name="updateData">Edit</button>
                            
                </div>
                </form>
               
            </div>
        </div>
    </div>

     <!-- Modal for Adding-->
    <div class="modal fade" id="addPet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content form-elegant">
            <form method="POST" action="php/insertPet.php">
              <!--Header-->
              <div class="modal-header text-center">
                    <h3 class="w-100" id="myModalLabel"><strong>Add Pet</strong></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body mx-4">
                    <div class="form-label-group">
                        <input type="text" id="inputPetName" class="form-control" placeholder="Pet Name" name="Name" required autofocus>
                        <label for="inputPetName">Pet Name</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputPetSpecies" class="form-control" placeholder="Pet Species" name="Species" required autofocus>
                        <label for="inputPetSpecies">Pet Species</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputPetBreed" class="form-control" placeholder="Pet Breed" name="Breed" required autofocus>
                        <label for="inputPetBreed">Pet Breed</label>
                    </div>
                    <div class="form-label-group">
                        <input type="number" id="inputPetAge" class="form-control" placeholder="Pet Age" name="Age" required autofocus>
                        <label for="inputPetAge">Pet Age</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputPetSex" class="form-control" placeholder="Pet Sex" name="Sex" required autofocus>
                        <label for="inputPetSex">Pet Sex</label>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="main-button" name="btnAddPet">Add</button>
                 </div>
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
                <form method="POST">
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
                            <p>Do you want to delete this user? You would lose all your data :(</p>
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


    <!-- ***** Footer Start ***** -->
    <footer id="contact-us">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="contact-form">
                            <form id="contact" action="" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <fieldset>
                                            <input name="name" type="text" id="name" placeholder="Full Name" required=""
                                                style="background-color: rgba(250,250,250,0.3);">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <fieldset>
                                            <input name="email" type="text" id="email" placeholder="E-Mail Address"
                                                required="" style="background-color: rgba(250,250,250,0.3);">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" rows="6" id="message" placeholder="Your Message"
                                                required="" style="background-color: rgba(250,250,250,0.3);"></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Send Message
                                                Now</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ***** Contact Form End ***** -->
                    <div class="right-content col-lg-6 col-md-12 col-sm-12">
                        <h2>More About <em>Pettastic</em></h2>
                        <p>We speak up, we do what we say, and we’re transparent and honest. We value clear, simple communication, and we pride ourselves on our deep knowledge of animal health and commitment to better care.
                            <br><br>If you need this contact form to send email to your inbox, you may follow our <a
                                rel="nofollow" href="https://google.com" target="_parent">contact</a> page
                            for more detail.</p>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="sub-footer">
                        <p>Phone: (212) 430-8335 
                        <br> Location: Punta Princessa, Garden Side, Cebu City
                        <br><br>Copyright &copy; 2021 All Rights Reserved</p>

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

</body>

<?php
    //deleting the account
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['deleteUser'])){
            $query = "DELETE FROM ownermasterlist WHERE OwnerId=$ID";
            echo $query;
            $query_run = mysqli_query($con,$query);
            
            if ($query_run){
                echo "<script> alert('User deleted'); </script>";
                echo "<script language='javascript'>window.location.href='opening/index.html'; </script>";
            } else 
                echo "<script> alert ('Data not updated'); </script>";
         }

     }
    

?>

</html>