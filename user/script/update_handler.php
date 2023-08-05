<?php
    
    require '../../connection.php';
    session_start();

    if (isset($_POST['update'])){
    
        $current_matric = $_SESSION['matric'];
        
        $matric = $_POST['matric'];
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $level = $_POST['level'];
        
        
        $passport = $_FILES['passport']['name'];
        $extension = explode('.', $passport);
        $newFileName = $matric. '.'.end($extension);

        $temp_name = $_FILES['passport']['tmp_name'];


        $path ="../../images/". $newFileName;  

        $sql = "UPDATE `user` SET `fullname` ='$fullname', `matric_number` = '$matric', `gender`='$gender', `level`='$level', `passport` = '$path' WHERE `matric_number` = '$current_matric'";

        $uploadToDb = move_uploaded_file($temp_name, $path);

        $update = mysqli_query($conn, $sql);
 
     
        if($update && $uploadToDb){
            echo "Record and passport has been updated";
            header('location: ../dashboard.php');
        }else{
            
            echo "error";
        }
    }
?>