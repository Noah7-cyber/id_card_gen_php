<?php
    session_start();
    require '../../connection.php';

    if (isset($_GET['matric'])) {
        $current_matric = $_GET['matric'];

        $sql = "UPDATE `user` SET `request`= '1' WHERE matric_number = $current_matric";
        
        $updateRequest = mysqli_query($conn, $sql);

        if($updateRequest){
            header('location: ../dashboard.php');
        }else{
            echo "error";
        }
    }
?>