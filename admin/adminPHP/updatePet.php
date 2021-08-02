<?php
    //Update the pet profile when the updateData button in adminPet.php gets clicked
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['updateData'])){
            $id = $_POST['pet_id'];
            echo $id;
            $name = $_POST['Name'];
            $species = $_POST['Species'];
            $breed = $_POST['Breed'];
            $age = (int) $_POST['Age'];
            $sex = $_POST['Sex'];

            $query = "UPDATE pet SET Name='$name', Species='$species', Breed='$breed', Age=$age, Sex='$sex' WHERE PetId=$id ";
            echo $query;
            $query_run = mysqli_query($con,$query);
            
            if ($query_run){
                echo "<script> alert('User updated'); </script>";
                header("location:/Pettastic Veterinary/admin/adminPets.php");
            } else 
                echo "<script> alert ('Data not updated'); </script>";
             
         }

     }
    

?>