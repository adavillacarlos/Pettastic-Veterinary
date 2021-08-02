<!-- 
    Appointment Page: where the user can book their appointments by choosing a date and time but they can only limit to 3 appointments per day
-->

<!DOCTYPE html>
<html lang="en">
<?php
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices") or die("error");
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
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    
    <!-- Logo -->
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
                                    <li><a href="index2.php#testimonials">Testimonials</a></li>
                                </ul>
                            </li>
                          
                            <li class="submenu">
                                <a href="javascript:;" style="color: #fba70b;">Services</a>
                                <ul>
                                    <li><a href="services.php" >Services Offered</a></li>
                                   <li><a href="terms.php">Book Appointment</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#contact-us" class="menu-item">Contact Us</a></li>
                            <li class="submenu">
                                <a href="javascript:;" >Profile</a>
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

    <div class="right-image-decor"></div>
    <!--Body starts-->
    <div class="container padding">
        <div class="page-content page-container" id="page-content">
                <div class="row container d-flex justify-content-center" >
                    <div class="col-xl-10 col-md-11 " >
                        <div class="card user-card-full padding" >
                            <div class="row col d-flex justify-content-center" >
                                <div class="col-sm-10">
                                        <h3 class="w-100 py-3" id="myModalLabel"><strong>Appointment</strong></h3>
                                        <form method="POST">
                                            <div class="form-label-group">
                                                <input type="date" id="date" class="form-control" placeholder="Appointment Date"  name="date"  required autofocus>
                                                <label style="text-align:left"for="inputAppointmentDate">Appointment Date</label>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="time" id="time" class="form-control" placeholder="Time" name="time" required autofocus>
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

                                            <div class="form-label-group">
                                            <p>Pet Name</p>
                                                <select name="petid" id="petid"  class="form-control">
                                                    <?php
                                                        //fetching the data of the pet
                                                    $ownerid = $_SESSION['ownerid'];
                                                    $query="select * from pet where pet.OwnerId = $ownerid";
                                                    $result=mysqli_query($con,$query);
                                                    $count = mysqli_num_rows($result);
                                                    while ($row=mysqli_fetch_assoc($result)){
                                                        echo "<option value=".$row['PetId'].">".$row['Name']."</option>";
                                                        } 
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            <div class="text-center mb-3">
                                                <button type="submit" id="form-submit" class="main-button btn-block"  name="insertData">Book Now</button>
                                                
                                                <a href="userprofile.php"><button style="margin-top:15px;" type="button" id="back-button" class="main-button btn-block">See Records</button></a>
                                        </form>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!--PROFILE End-->
    </div>
    <!--Body ends-->

    <!-- ***** Footer Start ***** -->
    <footer id="contact-us">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="contact-form" >
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


<?php
    if(isset($_POST['insertData'])){
        $date = $_POST['date'];
        $time = $_POST['time'];          

        //getting the count of the date 
        $query2 = "select COUNT(*) from appointment where OwnerId = $ownerid and Date = '$date'";
        $result2 = mysqli_query($con,$query2);
        $row2 = mysqli_fetch_assoc($result2);
        $datecount = $row2['COUNT(*)'];

        //getting the count of time
        $query3 = "select COUNT(*) from appointment where OwnerId = $ownerid and Date = '$date' and TimeSlot ='$time'";
        $result3 = mysqli_query($con,$query3);
        $row3 = mysqli_fetch_assoc($result3);
        $timecount = $row3['COUNT(*)'];
  
        //if the appointment does not happen more than 3x and so as the time
        if($datecount<3 && $timecount<1){  
            $service = $_POST['service'];
            $petid = $_POST['petid']; 

            //insert the appointment in the database
            $insert = "INSERT INTO appointment(Date,TimeSlot,Service,OwnerId,PetId) VALUES('$date','$time','$service',$ownerid,$petid)";
            mysqli_query($con,$insert);
            $insert2 = "INSERT INTO record(Date,Service,Status,PetId) VALUES('$date','$service','Pending',$petid)";
            mysqli_query($con,$insert2);
            echo "<script language='javascript'>alert('Appointment was sent')</script>";
      
        } else if($timecount > 0){
            echo "<script language='javascript'>alert('You already have an appointment on that time slot on that date')</script>";
        } else {
            echo "<script language='javascript'>alert('You already have 3 appointments on that day. Please choice another day!')</script>";
        }
    }
?>

</body>
</html>


