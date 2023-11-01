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
   function validate_password($password){
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if(!$uppercase || !$lowercase || !$number || !$specialChars ) {
        return false;
    }else{
        return true;
    }
    }   
    $username="";
    $password="";
    $check_password=-1;
    $invalid=false;
    session_start();
    if(isset($_SESSION['logout'])&&$_SESSION['logout'] == false){ 
        header("location:index.php");
        exit; 
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $verify_sql="SELECT * from user where username='{$username}'";
        $result=$conn->query($verify_sql);
        if($result->num_rows>0){
            if(validate_password($password)){
                $check_password=1;
                $query= "UPDATE user set password='{$password}' where username='{$username}'";
                $add_user = mysqli_query($conn,$query);
                $conn->query($verify_sql);
                header("location:login.php");
            }
            else{
                $check_password=0;
            }
           
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
            <input style="width: 70%;"  class="form-control" type="text" name="username" required placeholder="Username" id="username" maxlength="30">
        </div>
        <?php
        if($check_password==-1||$check_password==1){
            echo " <div class='input'>
            <label for='password'>New Password:</label>
            <input style='width: 70%;' minlength='8' class='form-control' required type='text' name='password' id='password' placeholder='Password@123' maxlength='32'>
        </div>";
        }
        else{
            echo " <div class='input alert alert-danger'>
            <label for='password'>New Password:</label>
            <input style='width: 70%;' minlength='8' class='form-control' required type='text' name='password' id='password' placeholder='Password@123' maxlength='32'>
        </div>";
        }
    ?>
        <div class="input" style="justify-content:center; gap: 3rem;">
            <div ><button class="btn btn-success" type="submit">Change</button></div>
        </div>
    </form>
    <?php
        if($invalid){
                echo " <div class='alert alert-danger' style='width:35%;z-index:1;'>
                &#9888; Invalid Username!!
            </div>";
            }
            if($check_password==0){
                echo " <div class='alert alert-danger' style='width:35%;z-index:1;'>
                Password must be at least 8 characters in length.<br>
                Password must include at least one upper case letter.<br>
                Password must include at least one number.<br>
                Password must include at least one special character.
            </div>";
            }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>