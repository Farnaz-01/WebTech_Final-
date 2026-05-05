<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            margin:0;
            padding:40px;
        }

        .container{
            width:500px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            color:#333;
            margin-bottom:25px;
        }

        label{
            font-weight:bold;
            display:block;
            margin-top:12px;
            margin-bottom:5px;
        }

        input[type=text],
        input[type=email],
        input[type=password],
        input[type=number],
        input[type=date],
        select{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:6px;
            box-sizing:border-box;
        }

        input[type=radio],
        input[type=checkbox]{
            width:auto;
            margin-right:5px;
        }

        .error{
            color:red;
            font-size:13px;
        }

        .success{
            color:green;
            font-size:18px;
            font-weight:bold;
            text-align:center;
            margin-top:20px;
        }

        .btn{
            width:100%;
            background:#007bff;
            color:white;
            border:none;
            padding:12px;
            margin-top:20px;
            border-radius:6px;
            cursor:pointer;
            font-size:16px;
        }

        .btn:hover{
            background:#0056b3;
        }
    </style>
</head>

<body>

<div class="container">

<h2>Student Registration Form</h2>

<?php

$fname = $lname = $dept = $gender = $dob = $age = $email = "";
$password = "";
$skills = [];

$fnameErr = $lnameErr = $deptErr = $genderErr = $dobErr = "";
$ageErr = $emailErr = $passwordErr = $skillErr = $agreeErr = "";

$success = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // First Name
    if(empty($_POST["fname"]))
        $fnameErr = "First name required";
    else
        $fname = trim($_POST["fname"]);

    // Last Name
    if(empty($_POST["lname"]))
        $lnameErr = "Last name required";
    else
        $lname = trim($_POST["lname"]);

    // Department
    if(empty($_POST["dept"]))
        $deptErr = "Select department";
    else
        $dept = $_POST["dept"];

    // Gender
    if(empty($_POST["gender"]))
        $genderErr = "Select gender";
    else
        $gender = $_POST["gender"];

    // Skills
    if(empty($_POST["skill"]))
        $skillErr = "Select at least one skill";
    else
        $skills = $_POST["skill"];

    // DOB
    if(empty($_POST["dob"]))
        $dobErr = "Select birth date";
    else
        $dob = $_POST["dob"];

    // Age
    if(empty($_POST["age"]))
        $ageErr = "Enter age";
    else if($_POST["age"] < 10 || $_POST["age"] > 100)
        $ageErr = "Age must be 10-100";
    else
        $age = $_POST["age"];

    // Email
    if(empty($_POST["email"]))
        $emailErr = "Email required";
    else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        $emailErr = "Invalid email format";
    else
        $email = $_POST["email"];

    // Password
    if(empty($_POST["password"]))
        $passwordErr = "Password required";
    else if(strlen($_POST["password"]) < 8)
        $passwordErr = "Minimum 8 characters";
    else
        $password = $_POST["password"];

    // Agree
    if(empty($_POST["agree"]))
        $agreeErr = "Must agree first";

    if(
        empty($fnameErr) && empty($lnameErr) && empty($deptErr) &&
        empty($genderErr) && empty($skillErr) && empty($dobErr) &&
        empty($ageErr) && empty($emailErr) &&
        empty($passwordErr) && empty($agreeErr)
    ){
        $success = "Form Submitted Successfully!";
    }
}

?>

<form method="post">

<label>First Name</label>
<input type="text" name="fname" value="<?php echo $fname; ?>">
<span class="error"><?php echo $fnameErr; ?></span>

<label>Last Name</label>
<input type="text" name="lname" value="<?php echo $lname; ?>">
<span class="error"><?php echo $lnameErr; ?></span>

<label>Department</label>
<select name="dept">
    <option value="">Select</option>
    <option value="CSE">CSE</option>
    <option value="EEE">EEE</option>
    <option value="IPE">IPE</option>
</select>
<span class="error"><?php echo $deptErr; ?></span>

<label>Gender</label>
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<br>
<span class="error"><?php echo $genderErr; ?></span>

<label>Skills</label>
<input type="checkbox" name="skill[]" value="HTML">HTML
<input type="checkbox" name="skill[]" value="CSS">CSS
<input type="checkbox" name="skill[]" value="JS">JavaScript
<br>
<span class="error"><?php echo $skillErr; ?></span>

<label>Date of Birth</label>
<input type="date" name="dob">
<span class="error"><?php echo $dobErr; ?></span>

<label>Age</label>
<input type="number" name="age">
<span class="error"><?php echo $ageErr; ?></span>

<label>Email</label>
<input type="email" name="email" value="<?php echo $email; ?>">
<span class="error"><?php echo $emailErr; ?></span>

<label>Password</label>
<input type="password" name="password">
<span class="error"><?php echo $passwordErr; ?></span>

<br><br>
<input type="checkbox" name="agree"> I agree Terms & Conditions
<br>
<span class="error"><?php echo $agreeErr; ?></span>

<input type="submit" value="Submit" class="btn">

</form>

<?php
if($success){
    echo "<p class='success'>$success</p>";
}
?>

</div>
</body>
</html>