<?php
    session_start();
    require '../../connection.php';

    if (isset($_GET['usermatric'])) {
        $current_matric = $_GET['usermatric'];
        $status = $_GET['userstatus'];
        $request = $_GET['userrequest'];
        if(($status=='not approved')&&($request == '1')){
            $sql = "UPDATE `user` SET `status`= 'approved' WHERE matric_number = $current_matric";    
            $updateRequest = mysqli_query($conn, $sql);
            if($updateRequest){
                echo "status has been approved";
            }
        }else if(($status == 'approved')&&($request=='1')){
            $sql = "UPDATE `user` SET `status`= 'not approved' WHERE matric_number = $current_matric";    
            $updateRequest = mysqli_query($conn, $sql);
            if($updateRequest){
                echo "status has been disapproved";
            }
        } else if ($request=='0'){
            $sql = "UPDATE `user` SET `status`= 'not approved' WHERE matric_number = $current_matric";    
            $updateRequest = mysqli_query($conn, $sql);
            if($updateRequest){
                echo "status has been disapproved";
            }
        }
        

       
    }
?>