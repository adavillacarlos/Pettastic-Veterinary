<?php
    //Delete pet using the pet ID 
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['deletePet'])){
            $id = $_POST['deletepet_id'];
            echo $id;
            $query = "DELETE FROM pet WHERE PetId=$id";
            echo $query;
            $query_run = mysqli_query($con,$query);
            
            if ($query_run){
                echo "<script> alert('Pet deleted'); </script>";
                header("location:/Pettastic Veterinary/admin/adminPets.php");
            } else 
                echo "<script> alert ('Pet not deleted'); </script>";
         }

     }
    

?>