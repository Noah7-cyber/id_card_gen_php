<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #51e2f5;
        }
        main{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
        }

        form{
            background-color: #fff;
            padding: 30px;
            width: 35%;
            height: auto;
            text-align: center;
            border-radius: 15px;
        }

        .form_content{
            margin-top: 20px;

        }

        .input-box{
            margin-bottom: 30px;
        }

        input[type="submit"]{
            width: 100%;
         
            background-color: #51e2f5;
            padding: 10px;
            text-decoration: none;
            border: none;
            border-radius: 15px;
            color: #fff;
            font-size: 1em;
        }

        input[type="submit"]:hover{
            cursor: pointer;
        }

        input[type="text"], input[type="password"], select{
            width: 100%;
            padding: 10px;
            border-radius: 15px;
            border: 1px solid #f1f1f1;
        }
        
        input[type="text"]:focus{
           background: #f1f1f1;
           border: 4px solid #fff;
           outline: none;
           box-shadow: 0px 0px 5px #f1f1f1;
        }

        h2{
            color: rgb(102, 102, 153);
            font-family: sans-serif;
        }

        input[type="radio"]{
            text-align: left;
            width:
        }

        .radio{
            display: flex;
            flex-direction: row;
            margin-bottom: 20px;
            font-family: sans-serif;
        }

        .female{
            margin-left: 40px;
            margin-right: 7px;
        }

        .male{
            margin-right: 7px;
        }
    </style>
</head>
<body>
    <main>
    <form action="register_handler.php" method="post">
        <header>
            <h2>ID Card Generator</h2>
        </header>
        <?php
        if(isset($_SESSION['error'])){
            echo "<p style='color:red'>".$_SESSION['error']."</p>";
        }
        ?>
        <section class="form_content">
        <section class="input-box">
        <section class="input-box">
        <label for="fullname" style="float: left; font-family: sans-serif; font-size: 0.9em; margin-bottom: 10px; margin-left: 10px;">Fullname</label>
        <input type="text" name="fullname" id="fullname" required>
        </section>
        <label for="matric_number" style="float: left; font-family: sans-serif; font-size: 0.9em; margin-bottom: 10px; margin-left: 10px;">Matric Number</label>
        <input type="text" name="matric" required>
        </section>
        <section class="radio">
            <section>
        <input type="radio" name="gender" id="male" class="male" value="Male">
        <label for="male">Male</label>
            </section>
         <section>
        <input type="radio" name="gender" id="female" class="female" value="Female">
        <label for="female">Female</label>
            </section>
        </section>
        <section class="input-box">
        <label for="password" style="float: left; font-family: sans-serif; font-size: 0.9em; margin-bottom: 10px; margin-left: 10px;">Password</label>
        <input type="password" name="password" required>
        </section>
        <section class="input-box">
        <label for="level" style="float: left; font-family: sans-serif; font-size: 0.9em; margin-bottom: 10px; margin-left: 10px;">Level</label>
       <select name="level" id="">
        <option name="level"  value="">Select level</option>
        <option name="level"  value="100">100</option>
        <option name="level"  value="200">200</option>
        <option name="level"  value="300">300</option>
        <option name="level"  value="400">400</option>
        <option name="level"  value="500">500</option>
        <option name="level"  value="600">600</option>
       </select>
        </section>
        </section>
        <input type="submit" name="register" value="Register">
    </form>
    </main>
</body>
</html>
<?php

?>