<?php
    //update the user profile in the adminUsers.php
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['updateData'])){
            $id = $_POST['owner_id'];
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
            $postal = $_POST['Postal'];

            $query = "UPDATE ownermasterlist SET Lastname='$lastname', Firstname='$firstname', MI='$MI', Email='$email', Password='$password', ContactNo=$contactno, Street='$street', City='$city', State='$state', PostalCode=$postal WHERE OwnerID=$id";
            echo $query;
            $query_run = mysqli_query($con,$query);
            
            if ($query_run){
                echo "<script> alert('User updated'); </script>";
                header("location:../../admin/adminUsers.php");
            } else 
                echo "<script> alert ('Data not updated'); </script>";
             
         }

     }
    

?>