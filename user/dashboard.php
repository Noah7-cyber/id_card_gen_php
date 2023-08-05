<?php
    session_start();
    require '../connection.php';
    if (!isset($_SESSION['matric'])) {
        header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
    <title>Document</title>
    <style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

 
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field, select {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

</style>
</head>
<body>
<div class="main">
<div class="sidebar">
  <a class="active" href="#home">Dashboard</a>
  <a href="#update" id="myBtn">Update</a>
  <a href="script/logout.php">Logout</a>
</div>
<div class="content">

        <?php
           $current_matric = $_SESSION['matric'];
           $sql = "SELECT * FROM `user` WHERE `matric_number` = '$current_matric'";
           $getUser = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($getUser)):
                    $fullname = $row['fullname'];
                    $gender = $row['gender'];
                    $level = $row['level'];
                    $passport = $row['passport'];
                    $request  = $row['request'];
                    $status = $row['status'];
        ?>
        <h2>Welcome <span style="color:#4caf50"><?php echo $fullname;?></span></h2>
        <?php          
          // $checkpassport  = "SELECT `passport` FROM `user` WHERE matric_number= '$current_matric'";
          // $verify = mysqli_query($conn, $checkpassport);
          if (empty($passport)):
            $style = "color:red";
            $link = "#";
              echo "<p style = $style>Please click on <a href=$link>update</a>  to upload your passport </p>";
          
          else:
            $color = "color:#4caf50";
              echo "here are your records";  
              echo  "<p>Your matric number <span style=$color> $current_matric</span></p>";
              echo  "<p>Your gender <span style=$color>$gender</span></p>";
              echo  "<p>Your level <span style=$color> $level</span><p>";
          
          if($request == '0'){
            echo "Click to <a href='script/request.php? matric=$current_matric'>request</a> for ID card";

          }else if(($request == '1') && ($status== 'not approved')){
            echo "Your id card is being processed";
          }else if(($request == '1') && ($status == 'approved')){
            echo "Click to <a href ='script/idcard.php? matric=$current_matric'>print</a> your ID card";
          }
          
        endif;  
      ?>
        
     
    </div>
    
    <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
    <span class="close">&times;</span>
    <h2>Modal Header</h2>
  </div>
  <div class="modal-body">
  <form action="./script/update_handler.php" method="post" style="max-width:500px;margin:auto" enctype ="multipart/form-data">
  <h2>Register Form</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Fullname" name="fullname" value ="<?php echo $fullname;?>">
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Matric" name="matric" value="<?php echo $current_matric?>">
  </div>
  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <select name="gender" id="" value = "<?php echo $gender?>">
      <option name="gender"  value="">Select gender</option>
      <option name="gender"  value="Male" <?php if ($gender == 'Male') echo "selected";?>>Male</option>
      <option name="gender"  value="Female"<?php if ($gender == 'Female') echo "selected";?>>Female</option>
    </select>
  </div>
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="file" placeholder="image" name="passport">
  </div>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <select  name="level">
        <option name="level"   value="">Select level</option>
        <option  name="level" value="100"<?php if ($level == '100') echo "selected";?> >100</option>
        <option name="level"  value="200"<?php if ($level == '200') echo "selected";?>>200</option>
        <option  name="level" value="300"<?php if ($level == '300') echo "selected";?>>300</option>
        <option  name="level" value="400"<?php if ($level == '400') echo "selected";?>>400</option>
        <option name="level"  value="500"<?php if ($level == '500') echo "selected";?>>500</option>
        <option  name="level" value="600"<?php if ($level == '600') echo "selected";?>>600</option>
       </select>
  </div>
  <button type="submit" name="update" class="btn">Update </button>
</form>

  </div>
  <div class="modal-footer">
    <h3>Modal Footer</h3>
  </div>
</div>

</div>
<?php
    endwhile;
    ?>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
    