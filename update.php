<?php
    include "curdop.php";

    if(isset($_POST['update'])){
        $firstname = $_POST['firstname'];
        $user_id = $_POST['id'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        $sql = "UPDATE users SET 'firstname'= '$firstname', 'lastname' = '$lastname', 'email'='$email', 'password'='$password', 'gender'= 'gender' WHERE 'id'='$user_id' ";
        $result = $conn->query($sql);
        if($result == true){
            echo "Record Updated Succesfull";
        }
        else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $sql = "SELECT *FROM 'uesrs' WHERE 'id'='$user_id' ";
        $result = $conn->query($sql);

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $firstname = $row['firstname'];
                $user_id = $row['id'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $password = $row['password'];
                $gender = $row['gender'];
                $id = $row['id'];
            }
            ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>update</title>
        </head>
        <body>
        <h2>User Update Form</h2>
        <form action="" method="POST">
        <fieldset>
            <legend>Personal Information</legend>
            First Name:<br>
            <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br>
            <input type="hidden" name="user_id" value="<?php echo $id; ?>"><br>
            last Name:<br>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br>
            E-mail:<br>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>
            
            Password:<br>
            <input type="password" name="password" value="<?php echo $password; ?>"><br>
            
            Gender:<br>
            <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){echo "checked";} ?> >Male
            <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){echo "checked";} ?>>Female<br><br>
            <input type="submit" name="update" value="update">
        </fieldset>
        </form>
        </body>
        </html>
        <?php
        }else{
        //if  the value is not valid, it will redirect to "view.php" page
        header('Location: viewpage.php');
        }
    }
?>


