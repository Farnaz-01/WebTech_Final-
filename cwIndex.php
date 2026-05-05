
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Form Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: "cyan";
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        input {
            margin: 8px 0;
            padding: 8px;
            width: 320px;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
 
    <h2>Registration Form - PHP Validation</h2>
 
    <?php
   
    // variables
    $name = $age = $email = $password = $phone = $NIDnum = $gender = $nationality = $regligion = $Uname = $cpasswordErr ="";
    $nameErr = $ageErr = $emailErr = $passwordErr = $phoneErr = $NIDErr = $genderErr = $nationalityErr = $regligionErr = $UnameErr = $cpasswordErr ="";
    $success = "";
 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
 
        // name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }


 
        // age
        if (empty($_POST["age"])) {
            $ageErr = "Age is required";
        } else {
            $age = test_input($_POST["age"]);
            if (!is_numeric($age)) {
                $ageErr = "Age must be a number";
            } elseif ($age < 10 || $age > 100) {
                $ageErr = "Age must be between 10 and 100";
            }
        }
 
        // email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {// Problem Identified : FILTER_VALIDATE_EMAIL
                $emailErr = "Invalid email format (must contain @)";
            }
        }
 
        // password
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = $_POST["password"];
            if (strlen($password) < 8) {
                $passwordErr = "Password must be at least 8 characters";
            }
        }
 
   

    

         if (empty($_POST["gender"])) {
            $nameErr = "gender is required";
        } else {
            $name = test_input($_POST["nationality"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $nationality)) {
                $nationalityErr = "Only letters and white space allowed";
            }
        }


 
     
        if (empty($nameErr) && empty($ageErr) && empty($emailErr) && empty($passwordErr) && empty($phoneErr)) {
            $success = "Form submitted successfully! All fields are valid.";
        }
    }
 
   
    function test_input($data) {
        $data = trim($data);      
        return $data;
    }
 
 
 
    ?>
 
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
 
        <label>Full Name:</label><br>
        <input type="text" name="name" value="<?php echo $name; ?>" >
        <span class="error">* <?php echo $nameErr; ?></span><br><br>

        <label>User Name:</label><br> <!-- modfied -->
        <input type="text" name="Uname" value="<?php echo $Uname; ?>" >
        <span class="error">* <?php echo $UnameErr; ?></span><br><br>
 
        <label>Age:</label><br>
        <input type="number" name="age" value="<?php echo $age; ?>" min="10" max="100" >
        <span class="error">* <?php echo $ageErr; ?></span><br><br>
 
        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $email; ?>" >
        <span class="error">* <?php echo $emailErr; ?></span><br><br>
 
        <label>Password:</label><br>
        <input type="password" name="password" >
        <span class="error">* <?php echo $passwordErr; ?></span><br><br>

        <label>Confirm Password:</label><br> <!-- modfied -->
        <input type="cpassword" name="cpassword" >
        <span class="error">* <?php echo $cpasswordErr; ?></span><br><br>
 
        <label>Gender:</label><br>
        <input type="text" name="gender" value="<?php echo $gender; ?>" >
        <span class="error">* <?php echo $genderErr; ?></span><br><br>

        <input type="submit" value="Submit" style="padding: 12px 25px; font-size: 16px;">
    </form>
 
    <?php if ($success) echo "<p class='success'>$success</p>"; ?>
 
</body>
</html>