<?php
    $host = "localhost";
    $user = "trenddevice2023";
    $pw = "youngsik91!";
    $db = "trenddevice2023";
    
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("UTF-8");

    // if(mysqli_connect_errno()){
    //     echo "DATABASE Connect False";
    // } else {
    //     echo "DATABASE Connect True";
    // }
?>