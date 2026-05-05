<?php
include "LT01.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];

$sql = "UPDATE students 
        SET name='$name', email='$email', department='$department'
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $conn->error;
}
?>