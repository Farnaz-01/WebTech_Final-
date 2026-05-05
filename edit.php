<?php
include "LT01.php";

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="post" action="update.php">
    
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

    Registration No: <input type="text" value="<?php echo $row['registration_no']; ?>" disabled><br><br>

    Department: <input type="text" name="department" value="<?php echo $row['department']; ?>"><br><br>

    <input type="submit" value="Update">

</form>

</body>
</html>