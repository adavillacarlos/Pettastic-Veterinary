<!-- 
  Sign up page where the users can register their accounts 
-->
<!DOCTYPE html>
<html lang="en">
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
    
     <!-- ***** Registration Starts ***** -->
     <div class="container-fluid">
        <div class="row no-gutter">
          <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image2"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h2 class="h2Bold">Welcome!</h2>
                        <p>Already a Member? <a href="signIn.php">Sign in</a></p>
                    <form method="POST">
                        <br>
                        <div class="form-label-group">
                            <input type="text" id="inputFirstName" class="form-control" placeholder="First Name" name="Firstname" required autofocus>
                            <label for="inputFirstName">First Name</label>
                          </div>

                          <div class="form-label-group">
                            <input type="text" id="inputMiddleName" class="form-control" placeholder="Middle Name" name="MI"required autofocus>
                            <label for="inputMiddleName">Middle Name</label>
                          </div>
                          <div class="form-label-group">
                            <input type="text" id="inputLastName" class="form-control" placeholder="Last Name" name="Lastname" required autofocus>
                            <label for="inputLastName">Last Name</label>
                          </div>    

                      <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="Email" required autofocus>
                        <label for="inputEmail">Email address</label>
                      </div>
      
                      <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="Password" required>
                        <label for="inputPassword">Password</label>
                      </div>

                      <div class="form-label-group">
                        <input type="tel" id="inputContactNo" class="form-control" placeholder="Contact No." name="ContactNo" required>
                        <label for="inputContactNo">Contact No.</label>
                      </div>
      
                      <div class="form-label-group">
                        <input type="text" id="inputStreet" class="form-control" placeholder="Street" name="Street" required>
                        <label for="inputStreet">Street</label>
                      </div>

                      <div class="form-label-group">
                        <input type="text" id="inputCity" class="form-control" placeholder="City" name="City" required>
                        <label for="inputCity">City</label>
                      </div>

                      <div class="form-label-group">
                        <input type="text" id="inputState" class="form-control" placeholder="State" name="State" required>
                        <label for="inputState">State</label>
                      </div>

                      <div class="form-label-group">
                        <input type="text" id="inputPostalCode" class="form-control" placeholder="Postal Code" name="PostalCode" required>
                        <label for="inputPostalCode">Postal</label>
                      </div>

                      <button type="submit" id="form-submit" class="main-button btn-block" name="btnSignUp">Sign up</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      

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
  $con = mysqli_connect("localhost","root","","pettasticveterinaryservices") or die("error");
  $err="";
  if($con){
    if(isset($_POST['btnSignUp'])){
      $query = "SELECT * from ownermasterlist WHERE Email ='".$_POST['Email']."'";
      // echo $query ."<br>";
      $result = mysqli_query($con,$query);
      $count = mysqli_num_rows($result);
      // echo $count ."<br>"; 
      if($count==0){ 
        $lastname = $_POST['Lastname'];
        $firstname = $_POST['Firstname'];
        $middleName = $_POST['MI'];
        $MI = strtoupper(substr($middleName,0,1));
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $contactno = $_POST['ContactNo'];
        $street = $_POST['Street'];
        $city = $_POST['City'];
        $state = $_POST['State'];
        $postal = $_POST['PostalCode'];
        $insert = "INSERT INTO ownermasterlist(Lastname,FirstName,MI,Email,`Password`,ContactNo,Street,City,`State`,PostalCode) VALUES('$lastname','$firstname','$MI','$email','$hashPassword','$contactno','$street','$city','$state','$postal')";
        // echo $insert ."<br>";
        mysqli_query($con,$insert);
        echo "<script language='javascript'>window.location.href='signin.php'; </script>";
  
      } else {
        echo "<script language='javascript'>alert('Email already exists')</script>";
      }
    }
   
  } else {
    echo "Error";
  }

?>

</html>