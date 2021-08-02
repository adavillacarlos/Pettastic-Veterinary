<?php
    //Displaying records in the adminPetRecords.php
    $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['deletePet'])){
            $id = $_POST['deletepet_id'];
            echo $id;
            $query = "DELETE FROM pet WHERE PetId=$id";
            echo $query;
            $query_run = mysqli_query($con,$query);
            
            if ($query_run){
                echo "<script> alert('Pet delete'); </script>";
                header("location:/Pettastic Veterinary/admin/adminPets.php");
            } else 
                echo "<script> alert ('Data not deleted'); </script>";
         }

     }
?>