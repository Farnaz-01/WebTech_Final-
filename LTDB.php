<?php
include "LT01.php";

$success = "";
$error = "";

if($_SERVER["REQUEST_METHOD"]=="POST") {

    $name = $_POST["username"];
    $email = $_POST["email"];
    $registration_no = $_POST["registration_no"];
    $department = $_POST["department"];

    if (empty($name) || empty($email) || empty($registration_no) || empty($department)) {
        $error = "Please fill all fields";
    } else {
        $sql = "INSERT INTO students(name, email, registration_no, department) 
                VALUES ('$name', '$email', '$registration_no', '$department')";

        if($conn->query($sql) === TRUE)
            $success = "Registration complete";
        else
            $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    Name: <input type="text" name="username"><br><br>
    Email: <input type="email" name="email"><br><br>
    Registration No: <input type="text" name="registration_no"><br><br>
    Department: <input type="text" name="department"><br><br>
    <input type="submit" value="Register">
</form>
</body>
</html>