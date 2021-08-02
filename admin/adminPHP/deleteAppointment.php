<?php
    //Deleting an Appointment using the Appointment ID
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['deleteAppointment'])){
            $id = $_POST['deleteid'];
            $query = "DELETE FROM appointment WHERE AppointmentId=$id";
            echo $query;
            $query_run = mysqli_query($con,$query);
            //checks if the query runs successfully.
            if ($query_run){
                echo "<script> alert('Appointment deleted'); </script>";
                header("location:/Pettastic Veterinary/admin/adminAppointment.php");
            } else 
                echo "<script> alert ('Appointment was not deleted'); </script>";
         }

     }
    

?>