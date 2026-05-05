<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
</head>
<body>

<h2>Student Grade Calculator</h2>

<form method="post" action="">
    Enter Marks: 
    <input type="number" name="marks" min="0" max="100" required>
    <input type="submit" value="Check Grade">
</form>

<br>

<?php 
if (isset($_POST['marks'])) { 
    
    $marks = (int)$_POST['marks'];  
    $grade = ""; 
 
    if ($marks >= 90) { 
        $grade = "A"; 
    } elseif ($marks >= 80) { 
        $grade = "B"; 
    } elseif ($marks >= 70) { 
        $grade = "C"; 
    } else { 
        $grade = "D"; 
    } 
 
    echo "Marks: " . $marks . "<br>";
    echo "Grade: " . $grade; 

} else { 
    echo "Please enter the marks."; 
} 
?>

</body>
</html>