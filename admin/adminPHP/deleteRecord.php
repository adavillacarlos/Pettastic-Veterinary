<?php
    //Deletes a record using the record id
    session_start();
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['deleteRecord'])){
            $id = $_POST['deleterecordid'];
            echo $id;
            $query = "DELETE FROM record WHERE RecordId=$id";
            echo $query;
            $query_run = mysqli_query($con,$query);
            
            if ($query_run){
                echo "<script> alert('Record delete'); </script>";
                header("location:/Pettastic Veterinary/admin/adminPetRecord.php");
            } else 
                echo "<script> alert ('Record not deleted'); </script>";
         }

     }
    

?>