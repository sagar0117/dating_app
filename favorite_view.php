<div class="div_fav">List of Favorites!</div>
<?php
require('connection.php');
$db = mysqli_connect('localhost', 'root', '', 'dating_app');
$temp_f = null;
if (!empty($_SESSION['UserId']))
    $temp_f = $_SESSION['UserId'];
$select_query = "SELECT u.UserId, u.Email, u.FirstName, u.LastName, u.Photo, f.FavoriteUserId as fav FROM users u JOIN favorites f ON u.UserId=f.FavoriteUserId where f.UserId='$temp_f'";
$result = mysqli_query($db, $select_query);
$target_dir = "assets/img/profiles/";
while ($row1 = mysqli_fetch_array($result)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Welcome to Heartstrings</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/img4.jpg"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
          rel="stylesheet" type="text/css"/>
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
          rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>

    <style>
        #d1 {
            padding-bottom: 135px;
            width: 50%;
            margin-left: 330px;
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

        #remove_btn {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #ff8178;
            text-align: center;
            cursor: pointer;
            font-size: 18px;
            margin-left: 189px;
            margin-top: -45px;
            width: 44%;
        }

        #back_btn1 {
            margin-left: 600px;
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #ff8178;
            text-align: center;
            cursor: pointer;
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
<body id="page-top">

<div id="d1">


    <br><br>
    <div class="card">
        <img src="<?php echo $target_dir . $row1['Photo']; ?>" alt="" width="100%" height="200">
        <h1><?php echo $row1['FirstName'] . " " . $row1['LastName']; ?></h1>
        <p class="title"><?php echo $row1['Email']; ?></p>
    </div>
    <br><br>
    <a href="favorites.php?Id=<?php echo $row1['fav']; ?>">
        <button id="remove_btn">Remove</button>
    </a></div>
</div>


<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
<?php
}
mysqli_close($db);

?>

<a href="index.php">
    <button id="back_btn1">Back</button>
</a>

</html>
