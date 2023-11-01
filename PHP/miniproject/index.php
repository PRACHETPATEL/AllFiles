<?php
    session_start();
    $register=false;
    $documents=false;
     if(!isset($_SESSION['login']) || $_SESSION['login'] != true){ 
        header("location:login.php");
        exit; 
    }
    if(!isset($_SESSION['registered']) || $_SESSION['registered'] == true){ 
        $register=$_SESSION['registered'] ;
    }
    if(!isset($_SESSION['documentuploaded']) || $_SESSION['documentuploaded'] == true){ 
        $documents=$_SESSION['documentuploaded'] ;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Student Dashboard</title>
</head>
<body>
   <?php
   include "navbar.html"; 
   include "database.php";
   if($register){
     echo '<div class="container my-3">
     <h3 class="text-center text-success">
         Registered Successfully &#10003;
     </h3>
 </div>';
   }else{
    echo '<div class="container my-3">
    <h3 class="text-center text-danger ">
        Not Registered Yet 	&#10060;!!
    </h3>
</div>';
   }
   if($documents){
    echo '<div class="container my-3">
    <h3 class="text-center text-success">
        Documents Uploaded Successfully &#10003;
    </h3>
</div>';
   }
   else{
    echo '<div class="container my-3">
    <h3 class="text-center text-danger ">
        Not Recieved Documents Yet 	&#10060;!!
    </h3>
</div>';
   }
   ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>