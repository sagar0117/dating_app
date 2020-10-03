<?php
$db = mysqli_connect('localhost', 'root', '', 'dating_app');
$select_query =" select * from users";
$result = mysqli_query($db, $select_query);
$target_dir = "assets/img/profiles/";


while ($row1 = mysqli_fetch_array($result)) {


/*$connection = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysqli_select_db("company", $connection); // Selecting Database
//MySQL Query to read data

$query1 = mysqli_query("select * from users", $connection);
    while ($row1 = mysqli_fetch_array($query1)) {
        ?>
        <div class="form">
            <h2>---Details---</h2>
            <!-- Displaying Data Read From Database -->
            <span>Name:</span> <?php echo $row1['firstname']; ?>
            <span>E-mail:</span> <?php echo $row1['employee_email']; ?>
            <span>Contact No:</span> <?php echo $row1['employee_contact']; ?>
            <span>Address:</span> <?php echo $row1['employee_address']; ?>
        </div>
        <?php
    }
}  */
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #d1{
            padding-bottom: 135px;
            width: 33.3%;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
            width: 100%;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #ff8178;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover, a:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
<div id="d1">
<div class="card">
    <img src="<?php echo $target_dir.$row1['Photo']; ?>" alt="" width="100%" height="200">
    <h1><?php echo $row1['FirstName'] . " ". $row1['LastName'];  ?></h1>
    <p class="title"><?php echo $row1['Email']; ?></p>


        <div>
        <a href="https://www.facebook.com/">
            <img id="i1" src="assets/img/fb.JPG" alt="" height="25" width="25"></a>
        <a href="https://www.instagram.com/">
            <img id="i2" src="assets/img/ig.JPG" alt="" height="25" width="25">
        </a>
        <a href="https://www.twitter.com/">
            <img id="i3" src="assets/img/t.JPG" alt="" height="25" width="25">
        </a>

        </div>
   <br><br> <p><button>Message</button></p>
</div>
</div>

</body>
</html>


<?php
}
mysqli_close($db);

?>