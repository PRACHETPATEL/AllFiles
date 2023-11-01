<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>
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
</head>
<body>
    <?php
    session_start();  
    include "database.php";
    if(!isset($_SESSION['login']) || $_SESSION['login'] != true){ 
        header("location:login.php");
        exit; 
    }
    $add_student=true;
    include "navbar.html";
    $check_sql="SELECT * from studentregistration where username='{$_SESSION["username"]}'";
    $result=$conn->query($check_sql);
    if($result->num_rows==0){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username=$_POST['username'];
            $fullname=$_POST['fullname'];
            $gender=$_POST['gender'];
            $dob=$_POST['dob'];
            $contact=$_POST['contact'];
            $email=$_POST['email'];
            $percentage=$_POST['percentage'];
            $address=$_POST['address'];
            $course=$_POST['course'];
            $check_password=1;
            $query= "INSERT INTO studentregistration(username,fullname,gender,dateofbirth,contact, email, percentage,address,course) VALUES('{$username}','{$fullname}','{$gender}','{$dob}','{$contact}','{$email}','{$percentage}','{$address}','{$course}')";
            $add_student = mysqli_query($conn,$query);
            header("location:registerstudent.jsp");
        } 
        $add_student = false;
    }else{
        $_SESSION["registered"]=true;
    }
        if(!$add_student){
            echo '     <div class="container my-5">
            <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" class="py-2" method="post">
                <h3 class="text-center">Register</h3>
                <div class="my-2">
                    <label for="username" style=" width: 25%">Username:</label>
                    <input class="form-control" type="text" name="username" id="enroll_no" value="'. $_SESSION["username"].'" readonly>
                </div>
                <div class="my-2">
                    <label for="name" style=" width: 25%">Full Name:</label>
                    <input class="form-control" type="text" placeholder="LastName MiddleName FirstName" maxlength="50" name="fullname"
                           id="name" required>
                </div>

                <div class="my-2" style="justify-content:space-between;">
                    <label for="sem" style=" width: 25%">Gender:</label>
                    <input type="radio" name="gender" value="male" id="male" checked>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="female" >
                    <label for="female">Female</label>
                </div>
                <div class="my-2">
                    <label for="dob" style=" width: 25%">Date Of Birth:</label>
                    <input class="form-control" type="date"  name="dob" id="dob" required>
                </div>
                <div class="my-2">
                    <label for="contact" style=" width: 25%">Contact:</label>
                    <input class="form-control" type="number" minlength="10" maxlength="10"
                           placeholder="0123456789"
                           name="contact" id="contact" required>
                </div>
                <div class="my-2">
                    <label for="email" style=" width: 25%">Email:</label>
                    <input class="form-control"   placeholder="mail@domainname.domain" type="email" maxlength="50" name="email"
                           id="email" required>
                </div>
                <div class="my-2">
                    <label for="percentage" style=" width: 25%">Percentage:</label>
                    <input class="form-control" type="text" minlength="2" maxlength="6" placeholder="100.00"
                           name="percentage" id="percentage" required>
                </div>
                <div class="my-2">
                    <label for="address" style=" width: 25%">address:</label>
                    <textarea class="form-control"   placeholder="Address" type="text" maxlength="300" name="address"
                           id="address" required></textarea>
                </div>
                <div class="my-2">
                    <label for="course" style=" width: 25%">course:</label>
                    <select class="form-control" maxlength="300" name="course"
                           id="course" required>
                        <option value="Computer Engineering">Computer Engineering</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Civil Engineering">Civil Engineering</option>
                        <option value="Electronics Engineering">Electronics Engineering</option>
                        <option value="Machnical Engineering">Machnical Engineering</option>
                        </select>
                </div>
                <div class="my-3 text-center" style="display: flex;gap: 10%;">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>';
        }
        else{
            $sql = "SELECT * FROM studentregistration where username='{$_SESSION['username']}'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo '<table class="table container my-5" style="width: 70%;">

                    <tr>
                        <th>Username</th>
                        <th>Fullame</th>
                        <th>Gender</th>
                        <th>DateOfBirth</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Percentage</th>
                        <th>Address</th>
                        <th>Course</th>
                    </tr>
                    
                        <tr>
                    
                            <td>'.$row['username'].'</td>
                            <td>'.$row['fullname'].'</td>
                            <td>'.$row['gender'].'</td>
                            <td>'.$row['dateofbirth'].'</td>
                            <td>'.$row['contact'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['percentage'].'</td>
                            <td>'.$row['address'].'</td>
                            <td>'.$row['course'].'</td>
                        </tr>l̥     
                        </table>';
                }

            }
           

        }
    ?>

</body>
</html>