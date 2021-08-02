<!-- 
    Terms: contains the terms and conditions in booking an appointment
-->

<!DOCTYPE html>
<html lang="en">
<?php
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices") or die("error");
     session_start();
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
                                <li ><a href="index2.php#testimonials">Testimonials</a></li>
                            </ul>
                        </li>
                      
                        <li class="submenu">
                            <a href="javascript:;" style="color: #fba70b;">Services</a>
                            <ul>
                                <li><a href="services.php" >Services Offered</a></li>
                               <li><a href="terms.php">Book Appointment</a></li>
                            </ul>
                        </li>
                        <li><a href="#contact-us">Contact Us</a></li>
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
        <!-- ***** Terms and Condition Start ***** -->
                       <div class="container" style=" position: relative; z-index: 10; padding: 45px; border-radius: 5px; background-color: #fff; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);margin-top:150px"> </b>
                        Welcome! From here you can create an appointment for yourself. Before you begin, please take a moment to read the Terms and Conditions for this service:<br><br>
            
						<center><b>TERMS AND CONDITIONS</b></center><br>
						This appointment and scheduling system allocates slots on a first come, first served basis. Limited slots are available per office and there is no guarantee that a slot will always be available for a user's first choice for an appointment schedule.<br><br>
						Users accept the responsibility for supplying, checking, and verifying the accuracy and correctness of the information they provide on this system in connection with their application, and consent to the collection and use of their personal information for Government to conduct checks and validation against existing records.<br><br>
						Deliberate multiple attempts to circumvent the system to secure a schedule for the purpose of blocking several dates in advance is detrimental to public service. Users who are found to have abused the system will be blocked from securing an appointment.<br><br>
						<b>Booked appointments shall be forfeited for the following:</b><br><br>
						1. Applicants who failed to show up on their confirmed appointment;<br>
						2. Applicants who cancelled their appointment without setting an alternative appointment;<br>
						3. Applicants whose application was rejected due to inconsistency or incorrect details indicated in their application form and in the supporting documents presented; and<br>
						4. Applicants who present discrepant or fake documentary requirements.<br>   
						<br><center><form action="#" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
						
						<input type="checkbox" name="checkbox" value="check" id="agree" required autofocus> I have read and understood the instructions and information on this page, and agree to the Terms and Conditions on the use of this online appointment system.
						</form><br><br>
						<a href="appointment.php"><button type="button" id="" class="main-button">Start Appointment</button><br> <br> </a>
						</center>

						</div>
                    <!-- ***** Terms and Condition End ***** -->
                    	
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
</html>