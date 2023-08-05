<?php
    require '../../connection.php';
    session_start();

    if(!isset($_GET['matric'])){
        header('location: ../index.php');
    }

    $current_matric = $_GET['matric'];
    $sql = "SELECT * FROM `user` WHERE matric_number = $current_matric";
    $getStudent =  mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
  rel="stylesheet"
/>
    <title>IDcard</title>
</head>
<body class="bg-light">
    <?php
    while ($row = mysqli_fetch_array($getStudent)):
        $passport = $row['passport'];
        $level = $row['level'];
        $gender = $row['gender'];
        $fullname = $row['fullname'];
        $matric = $row['matric_number'];
       

    
    ?>
   <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 mt-5 pt-5">
            <div class="row z-depth-3">
                <div class="col-sm-4 bg-info rounded-left">
                <div class="card-block text-center text-white">
                    <img src="<?php echo $passport ?>" alt="passport" class="img-fluid rounded mt-5">
                    <!-- <i class="fas fa-user-tie fa-7x mt-5"></i> -->
                    <h2 class="fontweight-bold mt-4"><?php echo $fullname; ;?></h2>
                    <p>Web developer</p>
                    <i class="far fa-edit fa-2x mb-4"></i>
                </div>
                </div>
                <div class="col-sm-8 bg-white rounded-right">
                    <h3 class="mt-3 text-center text-decoration-underline">Information</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="font-weight-bold">Fullname</p>
                            <h6 class="text-muted"><?php echo $fullname; ?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="font-weight-bold">matric</p>
                            <h6 class="text-muted"><?php echo $matric; ?></h6>
                        </div>
                    </div>
        
                    <hr class="bg-primary">
                    <div class="row">
                    <div class="col-sm-6">
                            <p class="font-weight-bold">gender</p>
                            <h6 class="text-muted"><?php echo $gender; ?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="font-weight-bold">level</p>
                            <h6 class="text-muted"><?php echo $level; ?></h6>
                        </div>
                    </div>
                    <hr class="bg-primary">
                    <ul class="list-unstyled d-flex justify-content-center mt-4">
                        <li><a href=""><i class="fab fa-facebook-f px-3 h4 text-info"></i></a></li>
                        <li><a href=""><i class="fab fa-youtube px-3 h4 text-info"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter px-3 h4 text-info"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   </div>
   <?php
   endwhile;
   ?>
</body>
</html>