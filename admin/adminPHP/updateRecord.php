<?php
    //update the pet records in the adminPetRecord.php 
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['updateData'])){
            $id = $_POST['recordid'];
            $date = $_POST['date'];
            $service = $_POST['service'];
            $status = $_POST['status'];

            $query = "UPDATE record SET Date='$date', Service='$service', Status='$status' WHERE RecordId=$id ";
            echo $query;
            $query_run = mysqli_query($con,$query);
            
            if ($query_run){
                echo "<script> alert('Record updated'); </script>";
                header("location:/Pettastic Veterinary/admin/adminPetRecord.php");
            } else 
                echo "<script> alert ('Record not updated'); </script>";
             
         }

     }
    

?>