<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .containerx{
          
            background:url('images/loginbg.jpg');background-size: cover;background-position: center;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <?php
   include "database.php";
    $username="";
    $password="";
    $invalid=false;
    session_start();
    if(isset($_SESSION['logout'])&&$_SESSION['logout'] == false){ 
        header("location:index.php");
        exit; 
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $verify_sql="SELECT * from user where username='{$username}' and password='{$password}'";
        $result=$conn->query($verify_sql);
        if($result->num_rows>0){
            $_SESSION["login"]=true;
            $_SESSION["logout"]=false;
            $_SESSION["registered"]=false;
            $_SESSION["documentuploaded"]=false;
            $_SESSION["username"]=$username;
            header("location:index.php");
        }
        else{
            $invalid=true;
        }
    }
    ?>
<div class="containerx">
    <form class="item" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="input">
            <label for="username">Username:</label>
            <input style="width: 80%;"  class="form-control" type="text" name="username" required placeholder="Username" id="username" maxlength="30">
            
        </div>
        <div class="input">
            <label for="password">Password:</label>
            <input style="width: 80%;"  class="form-control" type="password" name="password" required id="password" placeholder="Password" maxlength="32">
        </div>
        <div class="input"><a href="forgot.php" >Forgot Password?</a></div>
        <div class="input" style="justify-content:center; gap: 3rem;">
            <div ><button class="btn btn-success" type="submit">Login</button></div>
            <div class="btn btn-success"><a href="signup.php" style="color: white;font-weight: normal;">Sign Up</a></div>
        </div>
    </form>`
    <?php
        if($invalid){
                echo " <div class='alert alert-danger' style='width:35%;z-index:1;'>
                &#9888; Invalid Username or Password!!
            </div>";
            }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>