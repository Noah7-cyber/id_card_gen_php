<?php
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "idcard_gen";


    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if(!$conn){
        die("connection failed: " . mysqli_connect_error());
    }
?>