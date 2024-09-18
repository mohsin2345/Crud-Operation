<?php
include 'connect.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM `crud` WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password']; // Hash the password here

    $sql = "UPDATE `crud` SET name=?, email=?, mobile=?, password=? WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssi", $name, $email, $mobile, $password, $id);

    if ($stmt->execute()) {
        header('location:display.php');
    } else {
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
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>User Registration</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile No</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" required value="<?php echo $mobile; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password" required value="<?php echo $password; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>
</html>
