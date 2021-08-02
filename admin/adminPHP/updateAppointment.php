<?php
    //Update Appointments everytime the updateAppointment button was triggered in the adminAppointment.php
     $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
     if($con){
         if(isset($_POST['updateAppointment'])){
            $id = $_POST['updateid'];
            $date = $_POST['date'];
            $timeslot = $_POST['timeslot'];
            $service = $_POST['service'];

            $query = "UPDATE appointment SET Date='$date', TimeSlot='$timeslot', Service='$service' WHERE AppointmentId=$id";
            echo $query;
            $query_run = mysqli_query($con,$query);
            
            if ($query_run){
                header("location:/Pettastic Veterinary/admin/adminAppointment.php");
            } else 
                echo "<script> alert ('Data not updated'); </script>";
             
         }

     }
    

?>