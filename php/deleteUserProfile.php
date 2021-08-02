<?php
//delete the user profile in the userprofile.php
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['deleteUser'])){
            $id = $_POST['deleteowner_id'];
            $query = "DELETE FROM ownermasterlist WHERE OwnerId=$id";
            echo $query;
            $query_run = mysqli_query($con,$query);
            
            if ($query_run){
                echo "<script> alert('User updated'); </script>";
                header("location:/Pettastic Veterinary/opening/index.html");
            } else 
                echo "<script> alert ('Data not updated'); </script>";
         }

     }
    

?>