<?php require('connection.php');


if (isset($_GET['logout'])) {
    session_destroy();
    $_SESSION['email'] = null;
    header("location: index.php");
} ?>
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
</head>
<body id="page-top">


<!-- Chat -->


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">

            <div class="container h-100">
                <h4 class="h4">Message</h4>
                <div style="font-weight: bolder; color: white; background-color: #ff8178; width: 200px; height: 45px; padding: 10px; margin: auto; border-radius: 50%;">
                    Enjoy Chatting!
                </div>
                <br>
                <form method="post">
                    <?php
                    if (isset($_GET['id'])) {
                        $_SESSION['UserID'] = $_GET['id'];
                    }
                    if (isset($_GET['id'])) {
                        header('location: chat.php');
                    }
                    while ($row1 = mysqli_fetch_array($result1)){

                    ?>
                    To: <input type="text" name="to" class="username form-control" readonly
                               value="<?php echo $row1["FirstName"] . ' ' . $row1["LastName"];
                               } ?>"/>
                    <br><br>
                    Message: <br>
                    <textarea cols="40" name="msg" rows="7"></textarea> <br><br>
                    <button class="btn login" id="b2" type="submit" name="send_msg">Send</button>

                    <a href="index.php" class="btn login" id="back_btn" type="submit"> Back </a><br><br>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- End Of Chat -->


<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>