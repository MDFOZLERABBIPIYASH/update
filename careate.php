<?php
    include "curdop.php";

    if (isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
    }

    $sql = "INSERT INTO users (firstname, lastname, email, password, gender) VALUES ('$firstname','$lastname','$email','$password','$gender')";

    $result = $conn->query($sql);

    if($result == TRUE){
        echo "New Record Created Succesfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURD Operation</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Personal Information</legend>
            First Name:<br>
            <input type="text" name="firstname"><br>
            last Name:<br>
            <input type="text" name="lastname"><br>
            E-mail:<br>
            <input type="email" name="email"><br>
            Password:<br>
            <input type="password" name="password"><br>
            Gender:<br>
            <input type="radio" name="gender" value="Male">Male
            <input type="radio" name="gender" value="Female">Female<br><br>
            <input type="submit" name="submit" value="submit">
        </fieldset>
    </form>
</body>
</html>