<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .btn{
            background-color: #143974;
        }
        .btn:hover{
            background-color:#0663D1;
        }
        #success{
            color: #143974;
            font-weight:700;
        }
        label{
            color: #143974;
        }
        .containerx{
            flex-direction:column;
            background:url('images/signupbg.jpg');background-size: cover;background-position:top;
        }
    </style>
    <title>Signup</title>
</head>
<body>
<?php
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
    include "database.php";
    session_start();
    if(isset($_SESSION['logout'])&&$_SESSION['logout'] == false){ 
        header("location:index.php");
        exit; 
    }
    $username=$email=$password="";
    $add_user=false;
    $check_user=-1;
    $check_password=-1;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $check_sql="SELECT username from user where username='{$username}'";
    $result=$conn->query($check_sql);
    if($result->num_rows==0){
        $check_user=1;
        if(validate_password($password)){

            $check_password=1;
            $query= "INSERT INTO user(username, email, password) VALUES('{$username}','{$email}','{$password}')";
            $add_user = mysqli_query($conn,$query);
            header("location:login.php");
        }
        else{
            $check_password=0;
        }
    }
    else{
        $check_user=0;
    }
}
    ?>
<div class="containerx">
    <form class="item" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <?php
        if($check_user==-1||$check_user==1){
            echo "<div class='input'>
            <label for='username' >Username:</label>
            <input style='width: 80%;' class='form-control' required type='text' name='username' placeholder='Username_123/Unique' id='username' maxlength='30'>
        </div>";
        }
        else{
            echo "<div class='input alert alert-danger'>
            <label for='username' >Username:</label>
            <input style='width: 80%;' class='form-control' required type='text' name='username' placeholder='Username Already Exists!!' id='username' maxlength='30'>
        </div>";
        }
    ?>
        
        <div class="input">
            <label for="password">Email:</label>
            <input style="width: 80%;" class="form-control" required type="email" name="email" id="email" placeholder="mail@domainname.domain" maxlength="50">
        </div>
        <?php
        if($check_password==-1||$check_password==1){
            echo " <div class='input'>
            <label for='password'>Password:</label>
            <input style='width: 80%;' minlength='8' class='form-control' required type='text' name='password' id='password' placeholder='Password@123' maxlength='32'>
        </div>";
        }
        else{
            echo " <div class='input alert alert-danger'>
            <label for='password'>Password:</label>
            <input style='width: 80%;' minlength='8' class='form-control' required type='text' name='password' id='password' placeholder='Password@123' maxlength='32'>
        </div>";
        }
    ?>
       
        <?php
            if($add_user) {
                echo "<div class='text-center' id='success'>Registered Successfully!!</div>";
            }
        ?>
        <div class="input" style="justify-content:center; gap: 3rem;">
            <div class="btn btn-success"><a href="login.php" style="color: white;font-weight: normal;">Login</a></div>
            <div ><button class="btn btn-success" type="submit">Signup</button></div>
        </div>
        
       
    </form>
    <?php
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