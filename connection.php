<?php
session_start();
// initializing variables
$firstname = "";
$lastname = "";
$email = "";
$error_login = array();
$error_register = array();
$error_profile = array();

$target_dir = "assets/img/profiles/";
$uploadOk = 1;

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'dating_app');
$temp = null;
if (!empty($_SESSION['email']))
    $temp = $_SESSION['email'];
$fetch_profile_query = "SELECT * FROM users WHERE Email='$temp' LIMIT 1";
$result = mysqli_query($db, $fetch_profile_query);

$temp1 = null;
if (!empty($_SESSION['UserID']))
    $temp1 = $_SESSION['UserID'];
$fetch_profile_query1 = "SELECT * FROM users WHERE UserId='$temp1' LIMIT 1";
$result1 = mysqli_query($db, $fetch_profile_query1);

if (isset($_POST['send_msg'])) {
    $msg = mysqli_real_escape_string($db, $_POST['msg']);
    if (empty($msg)) {
        echo "<script>alert('Message can not be empty!'); </script>";
    } else {
        $Query = mysqli_query($db, "SELECT * FROM users where Email='$temp'");

        $SenderId = mysqli_fetch_row($Query);
        $query = "INSERT INTO messages (SenderId, ReceiverId, Content) 
  			  VALUES('$SenderId[0]', '$temp1', '$msg')";
        $result = mysqli_query($db, $query);
        if ($result)
            echo "<script>alert('Message sent!'); </script>";
        header("refresh:0;url=index.php");
    }

}

//Edit profile
if (isset($_POST['edit_profile'])) {
    // receive all input values from the form
    $target_file = $target_dir . basename($_FILES["fileUp"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $firstname = mysqli_real_escape_string($db, $_POST['firstname1']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname1']);
    $photo = mysqli_real_escape_string($db, $_FILES['fileUp']['name']);
    $email = mysqli_real_escape_string($db, $_POST['email1']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($firstname)) {
        array_push($error_profile, "Firstname is required");
    }
    if (empty($lastname)) {
        array_push($error_profile, "Lastname is required");
    }
    if (empty($photo)) {
        while ($row = mysqli_fetch_array($result)) {
            $photo = $row["Photo"];
        }
    }

    // Finally, edit user information if there are no errors in the form
    if (count($error_profile) == 0) {

        $query = "UPDATE users
                    SET FirstName='$firstname', LastName='$lastname', Photo='$photo'
                    WHERE Email='$email'";
        mysqli_query($db, $query);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Your profile details are changed";

        $check = getimagesize($_FILES["fileUp"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileUp"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileUp"]["name"])) . " has been uploaded.";
                header('location: index.php');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        header('location: index.php');
    }
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $photo = mysqli_real_escape_string($db, $_FILES['fileToUpload']['name']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($firstname)) {
        array_push($error_register, "Firstname is required");
    }
    if (empty($lastname)) {
        array_push($error_register, "Lastname is required");
    }
    if (empty($email)) {
        array_push($error_register, "Email is required");
    }
    if (empty($password_1)) {
        array_push($error_register, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($error_register, "The two passwords do not match");
    }
    if (empty($photo)) {
        array_push($error_register, "Profile photo is required");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE Email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists

        if ($user['email'] === $email) {
            array_push($error_register, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($error_register) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (FirstName, LastName, RoleId, Email, Password, Photo) 
  			  VALUES('$firstname', '$lastname', 1, '$email', '$password', '$photo')";
        mysqli_query($db, $query);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        $temp3 = mysqli_fetch_row($result);
        $_SESSION['role'] = $temp3[3];
        $_SESSION['UserId'] = $temp3[0];
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                header('location: index.php');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        header('location: index.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email_login = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email_login)) {
        array_push($error_login, "Email is required");
    }
    if (empty($password)) {
        array_push($error_login, "Password is required");
    }

    if (count($error_login) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE Email='$email_login' AND Password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $email_login;
            $_SESSION['success'] = "You are now logged in";
            $temp3 = mysqli_fetch_row($results);
            $_SESSION['role'] = $temp3[3];
            $_SESSION['UserId'] = $temp3[0];
            header('location: index.php');
        } else {
            array_push($error_login, "Wrong username/password combination");
        }
    }
}

?>
