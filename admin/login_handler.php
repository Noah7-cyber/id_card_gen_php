<?php
    session_start();
    require '../connection.php';

    if(isset($_POST['login'])){
        $matric = $_POST['username'];
        $password = $_POST['password'];

        $success = "Welcome Admin";
        $error = "Password or Matric is not correct or you havent registered";

        $sql = "SELECT * FROM `admin` WHERE `matric_number` = '$username' AND `password`= '$password'";
        $userLogin = mysqli_query($conn, $sql);

        if($userLogin){
            $_SESSION['success']= $success;
            $_SESSION['matric'] = $matric;
            header('location:dashboard.php');
        }else{
            $_SESSION['error'] = $error;
            
            header('location:index.php');
            echo $error;
        }
    }
?>