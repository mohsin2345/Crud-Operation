<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];



 $sql="insert into `crud` (name,email,mobile,password)
 values('$name','$email','$mobile','$password')";
 $result=mysqli_query($con,$sql);
 if ($result){
    // echo "Data inserted successfully!";
    header('location:display.php');
 }else{
    die(mysqli_error($con));
 }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet"> <!-- Link to your custom CSS file -->
</head>
<body>
    <div class="container mt-5">
        <h2>User Registration</h2>
        <form action="user.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile No</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
