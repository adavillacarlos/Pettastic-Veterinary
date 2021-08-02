<?php
    $con = mysqli_connect("localhost","root","","pettasticveterinaryservices");
    session_start();
    $ID = $_SESSION['ID'];
    if($con){
        if(isset($_POST['btnAddPet'])){  
            $Name = $_POST['Name'];
            $Species = $_POST['Species'];
            $Breed = $_POST['Breed'];
            $Age = (int) $_POST['Age'];
            $Sex = $_POST['Sex'];
            $insert = "INSERT INTO pet (`Name`,`Species`,`Breed`,`Age`,`Sex`,OwnerId) VALUES ('$Name','$Species','$Breed','$Age','$Sex',$ID)"; 
            $query_run = mysqli_query($con,$insert);
            if($query_run){
                echo "<script> alert('Data saved'); </script>";
                header("Location:/Pettastic Veterinary/userprofile.php");
            } else 
                echo "<script> alert('Data not saved'); </script>";
    }
    } else {
        echo "<script> alert('Eror'); </script>";
    }
?>