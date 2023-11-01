<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .container{
    width:40%;
    margin:auto;
    z-index: 1;
    border-radius: 5px;
    box-shadow:0 8px 56px 0 #666;
}
.container div{
    display: flex;
    flex-direction:row;
    align-items:center;
    justify-content: center;
}
label{
    color:black;
}
nav{
    display: flex; flex-direction: row;height: 10vh;align-items: center;justify-content: space-between;padding: 20px;
}
a{
    font-weight: 250;
    font-size: 1.2em;
    text-decoration: none;
    color: #666;
}
.active{
    font-weight: 700;
}
    </style>
    <title>Upload Documents</title>
</head>
<body>
<?php
error_reporting(E_ERROR | E_PARSE);
include "database.php";
   include "navbar.html"; 
   session_start();  
   if(!isset($_SESSION['login']) || $_SESSION['login'] != true){ 
    header("location:login.php");
    exit; 
}
if(!$add_document){
echo '    <div class="container my-5">
<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" class="py-2" method="post" enctype="multipart/form-data">
    <h3 class="text-center">Upload Documents</h3>
    <div class="my-2">
        <label for="username" style=" width: 25%">Username:</label>
        <input class="form-control" type="text" name="username" id="enroll_no" value="'. $_SESSION["username"].'" readonly>
    </div>
    <div class="my-2">
        <label for="name" style=" width: 25%">12th Mark Sheet:</label>
        <input class="form-control" type="file" name="marksheet" id="marksheet" required>
    </div>
    <div class="my-2">
        <label for="addressproof" style=" width: 25%">Address Proof:</label>
        <input class="form-control" type="file"  name="daddressproofob" id="addressproof" required>
    </div>
    <div class="my-2">
        <label for="income" style=" width: 25%">Income Certificate:</label>
        <input class="form-control" type="file" name="income" id="income" required>
    </div>
    <div class="my-3 text-center" style="display: flex;gap: 10%;">
        <button type="submit"  class="btn btn-success">Upload</button>
    </div>
</form>

</div>';
}
$target_dir = "studentdocuments/";
$target_file =$target_dir .$_SESSION["username"]. basename($_FILES["marksheet"]["name"]);
$file1= $_SESSION["username"].$_FILES["marksheet"]["name"];
$file2= $_SESSION["username"].$_FILES["daddressproofob"]["name"];
$file3= $_SESSION["username"].$_FILES["income"]["name"];
$target_file1 = $target_dir . basename($file1);
$target_file2 = $target_dir . basename($file2);
$target_file3 = $target_dir . basename($file3);

$add_document=false;
echo '<div class="text-center text-success text-bold">';
if (move_uploaded_file($_FILES["marksheet"]["tmp_name"], $target_file1)&&move_uploaded_file($_FILES["daddressproofob"]["tmp_name"] , $target_file2)&&move_uploaded_file($_FILES["income"]["tmp_name"] , $target_file3)) {
    echo "The file " . $target_file1 . " has been uploaded.<br>";
    echo "The file " . $target_file2 . " has been uploaded.<br>";
    echo "The file " . $target_file3 . " has been uploaded.";

    $check_sql="SELECT * from document where username='{$_SESSION["username"]}'";
    $result=$conn->query($check_sql);
    if($result->num_rows==0){
    $query= "INSERT INTO document(username,twelvthmarksheet,addressproff ,incomecertificate) VALUES('{$_SESSION["username"]}','{$file1}','{$file2}','{$file3}')";
    $add_document = mysqli_query($conn,$query);
    }
    else{
        $add_document =true;
    }
    if($add_document){
        $_SESSION['documentuploaded']=true;
    }
} 
echo '</div>';
   ?>

</body>
</html>