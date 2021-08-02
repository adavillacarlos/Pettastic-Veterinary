<?php
//when pressed logout, will direct you to the index. 
    session_start();
    session_destroy();
    header("location:/Pettastic Veterinary/opening/index.html");

?>