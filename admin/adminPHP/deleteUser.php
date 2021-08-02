<?php
    //Deleteing a user 
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['deleteUser'])){
            $id = $_POST['deleteowner_id'];
            $query = "DELETE FROM ownermasterlist WHERE OwnerId=$id";
            echo $query;
            $query_run = mysqli_query($con,$query);
            
            if ($query_run){
                echo "<script> alert('User deleted'); </script>";
                header("location:/Pettastic Veterinary/admin/adminUsers.php");
            } else 
                echo "<script> alert ('User not deleted'); </script>";
         }

     }
    

?>