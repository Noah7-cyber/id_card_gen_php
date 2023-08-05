<?php 
session_start();
    require 'connection.php';

    if (isset($_POST['register'])){
        // echo "Your form is set";

        $matric = $_POST['matric'];
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $level = $_POST['level'];
        $sucess ="Register successful";
        $error = "Error Registering";

        // echo $matric ."<br>". $fullname ."<br>". $password ."<br>". $gender ."<br>". $level;

        $sql = "INSERT INTO `user` (`fullname`, `matric_number`, `gender`, `level`, `password`) VALUES('$fullname', '$matric', '$gender', '$level', '$password')";

        $registerUser = mysqli_query($conn, $sql);
      

        if($registerUser){
           echo "Data Submitted Successfully";
           $_SESSION['success'] = $sucess;
           header('location:index.php');
        }else {
            $_SESSION['error']=$error;
            header('location:register.php');
        }
    }
?>