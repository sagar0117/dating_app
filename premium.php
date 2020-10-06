<?php
require('connection.php');
$db = mysqli_connect('localhost', 'root', '', 'dating_app');

if (isset($_SESSION['UserId'])) {
    $id = $_SESSION['UserId'];
    $query1 = "Select RoleId from users where UserId='$id'";
    $result = mysqli_query($db, $query1);
    $temp = mysqli_fetch_row($result);
    if ($temp[0] == 2) {

    }
    $query = "UPDATE users SET RoleId='2' WHERE UserId='$id'";
    $result1 = mysqli_query($db, $query);
    if ($result1) {
        echo "<script>alert('User upgraded to premium successfully!'); </script>";
    }
    header("refresh:0;url=index.php");
}
?>
