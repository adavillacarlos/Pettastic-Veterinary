<!-- 
    Services: display all the services that the clinic has to offer
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

  <div class="right-image-decor"></div>

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

 
 <!-- ***** Services Starts ***** -->
     <section style="margin-top:150px"class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="center-heading">
                        <h2>We offer you all kinds of <em>Services</em></h2>
                        <p>Our mission is to strengthen the human-animal bond through better pet care. Our compassionate, highly-skilled veterinarian is here for all of your pet's needs from urgent care to wellness checkups.
                        </p>
                    </div>
                </div>
            </div>
        </div>
  

        <div class="container">
            <div class="row">
                
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <h2>01</h2>
                            <img src="assets/images/features-icon-1.png" alt="">
                            <h4>Exams and Diagnostics</h4>
                            <p>Veterinarians use a variety of veterinary tools to diagnose disease, to monitor disease and to screen for the presence of underlying diseases.</p>
                        </div>
                    </div>
					
                </div> 
				
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <h2>02</h2>
                            <img src="assets/images/features-icon-2.png" alt="">
                            <h4>Microchipping</h4>
                            <p>Microchips help identify your pet. It is a permanent identification that cannot be lost, altered or destroyed. It will stay with your pets for life.</p>
                        </div>
                    </div>
                </div>
				
                <div  class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <h2>03</h2>
                            <img src="assets/images/features-icon-3.png" alt="">
                            <h4>Dog Vaccinations</h4>
                            <p>Puppy vaccinations are most effective when given at fixed dates with boosters. We will provide you with a vaccination schedule for your puppy.</p>	
                        </div>
                    </div>
                </div>
			
				 <div  style="margin-top: 20px" class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <h2>04</h2>
                            <img src="assets/images/features-icon-1.png" alt="">
                            <h4>Cat Vaccinations</h4>
                            <p>Vaccinating your kitten helps protect their health, making it so important they are placed on the right vaccination programme at the appropriate age.</p>
                        </div>
                    </div>
                </div>
				
				 <div  style="margin-top: 20px" class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <h2>05</h2>
                            <img src="assets/images/features-icon-2.png" alt="">
                            <h4>Pet Grooming</h4>
                            <p>Better hygiene and smell!Early detection of any skin and health issues. Healthy and shiny coats which shed a lot less. Get rid of pulling matts. Makes them look better.</p>
                        </div>
                    </div>
                </div>
				                                                                                                                                                                                                                                                                                                         
				 <div  style="margin-top: 20px" class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <h2>06</h2>
                            <img src="assets/images/features-icon-3.png" alt="">
                            <h4>Spay and Neuter</h4>
                            <p>Spaying your pet before her first heat offers the best protection from these diseases. Neutering your male companion prevents testicular cancer and some prostate problems.</p>
                        </div>
                    </div>
                </div>
				
				
				
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->
  

    <div class="left-image-decor"></div>
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