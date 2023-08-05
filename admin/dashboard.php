<?php
    require '../connection.php';
    session_start();
    $sql = "SELECT * FROM `user`";
    $allStudent =  mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
    <title>Document</title>
</head>
<body>
   
    
<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Fullname</th>
      <th>Matric</th>
      <th>Gender</th>
      <th>Level</th>
      <th>Passport</th>
      <th>Request</th>
      <th>Status</th>
      
    </tr>
    <?php 
    while ($row = mysqli_fetch_array($allStudent)):
        $fullname = $row['fullname'];
        $matric = $row['matric_number'];
        $level = $row['level'];
        $passport = $row['passport'];
        $gender = $row['gender'];
        $status = $row['status'];
        $request = $row['request'];
        ?>
    <tr>
      <td><?php echo $fullname ?></td>
      <td><?php echo $matric ?></td>
      <td><?php echo $gender ?></td>
      <td><?php echo $level ?></td>
      <td><?php echo $passport?></td>
      <td><?php echo $request?></td>
      <td>
        <?php 
        if($status == 'approved'){
            echo "<a href='script/approve.php?userstatus=$status&&usermatric=$matric&&userrequest=$request'>Disapprove</a>";
        }else{
            echo "<a href='script/approve.php?usermatric=$matric&&userstatus=$status&&userrequest=$request'>Approve</a>";
        }
        ?>
    </td>

      
    </tr>
    <?php
  endwhile
  ?>
  </table>
  
</div>

</body>
</html>