<?php
require('connection.php');
$db = mysqli_connect('localhost', 'root', '', 'dating_app');
$temp = null;
if (isset($_GET['id'])) {
    if (!empty($_SESSION['email']))
        $temp = $_SESSION['email'];
    $Query = mysqli_query($db, "SELECT * FROM users where Email='$temp'");
    $UserId = mysqli_fetch_row($Query);
    $FavoriteUserId = $_GET['id'];
    $query = "INSERT INTO favorites (UserId, FavoriteUserId) 
  			  VALUES('$UserId[0]', '$FavoriteUserId')";
    $result = mysqli_query($db, $query);
    if ($result)
        echo "<script>alert('User added to favorites!'); </script>";
    else
        echo "<script>alert('User is already added to favorites!'); </script>";
    header("refresh:0;url=index.php");
}


if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $query = "DELETE from favorites WHERE FavoriteUserId='$id'";
    $result1 = mysqli_query($db, $query);
    if ($result1)
        echo "<script>alert('User removed from favorites!'); </script>";
    header("refresh:0;url=favorite_view.php");
}
?>
