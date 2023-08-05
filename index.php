<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Index</title>
      
<body>
<div>
        <form action="login_handler.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                <h1>Registration</h1>
                <p>Fill up the form with the correct values</p>
                <hr class="mb-3">
                <label for="matric">Matric Number</label>
                <input class="form-control" type="text" name="matric" required>
               
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password"  required>
                <hr class="mb-3">
                <input class="btn btn-primary"  name="login"  type="submit" value="Login"><br>
                <a class= "link-primary " href="register.php">dont have an account register</a>
                </div>
                
            </div>
        </div>
        </form>
        
    </div>
</body>
</html>