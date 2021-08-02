<!-- 
  Sign in page used by both the admin and the owner to get into the websites. 
-->

<!DOCTYPE html>
<html lang="en">
<?php
    $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
    session_start();
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

  <!-- Registration-->
    <div class="container-fluid">
        <div class="row no-gutter">
          <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h2 class="h2Bold">Welcome!</h2>
                        <p>Not a member? <a href="signup.php">Register</a></p>
                    <form method="POST">
                        <br>
                      <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="Email" required autofocus>
                        <label for="inputEmail">Email address</label>
                      </div>
      
                      <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="Password" required>
                        <label for="inputPassword">Password</label>
                      </div>
      
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                      </div>
                      <button type="submit" id="form-submit" class="main-button btn-block" name="btnSignIn">Sign in</button>
                      <div class="text-center">
                        <a class="small" href="#">Forgot password?</a></div>
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
  $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
  $err="";
  if($con){
    if(isset($_POST['btnSignIn'])){
      $email = $_POST['Email'];
      $password = $_POST['Password'];
      $query = "SELECT * FROM ownermasterlist WHERE Email ='$email' and Password='$password'";
      $result = mysqli_query($con,$query);
      $count = mysqli_num_rows($result);
      //checking if the account existed in the database if then redirect to the index
      if($count==0)
        echo "<script language='javascript'> alert('Incorrect email or password'); </script>";
      else{
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $row['Email'];
        $_SESSION['ownerid'] = $row['OwnerID'];
        if($email=="admin@gmail.com"){
          echo "<script language='javascript'> window.location.href='/Pettastic Veterinary/admin/dashboard.php';</script>";
        } else {
          echo "<script language='javascript'> window.location.href='index2.php';</script>";
        }
      }  
    }
  }

?>


</html>