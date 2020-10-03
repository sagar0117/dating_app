<?php require('connection.php');


if (isset($_GET['logout'])) {
    session_destroy();
    $_SESSION['email']=null;
    header("location: index.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Welcome to Heartstrings</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/img4.jpg" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">HEARTSTRINGS</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <?php if(isset($_SESSION['email'])) :
                    echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" style="display: none" href="#register">Register</a></li>';
                else :
                    echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#register">Register</a></li>';
                endif;
                ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Events</a></li>
                <?php if (isset($_SESSION['email']))
                    echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#" data-target="#profile" data-toggle="modal">My Profile</a></li>';
                ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">See Profiles</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Chats</a></li>
                <?php if(isset($_SESSION['email'])) :
                    echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?logout=1">Logout</a></li>';
                else :
                    echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#" data-target="#login" data-toggle="modal">Login</a></li>';
                endif;
                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- Login form-->
<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-body">
                <button data-dismiss="modal" class="close">&times;</button>
                <h4 class="h4">Login</h4>
                <?php include('errors.php'); ?>
                <form method="post">
                    <input type="text" name="email" class="username form-control" placeholder="Email"/>
                    <input type="password" name="password" class="password form-control" placeholder="Password"/>
                    <button class="btn login" id="b2" type="submit" name="login_user">Login</button><br><br>
                    <p>
                        New account? <br><a class="nav-link js-scroll-trigger" href="#register"> Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Edit Profile-->
<div id="profile" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button data-dismiss="modal" class="close">&times;</button>
                <h4 class="h4">Edit Profile</h4>
                <form action="index.php" method="post" enctype="multipart/form-data">

                    <?php include('errors.php'); ?>
                    <div class="hiddenFileInputContainter">
                        <?php while($row=mysqli_fetch_array($result)) {?>
                        <img class="fileDownload" name="profile_photo" src="assets/img/profiles/<?php echo $row["Photo"]; ?>">
                        <input type="file" name="fileUp" class="hidden" accept="image/*">
                    </div>
                    <div class="input-group">
                        <label>Firstname</label>
                        <br>
                        <input type="text" name="firstname1" value="<?php echo $row["FirstName"]; ?>">

                    </div>
                    <div class="input-group">
                        <label>Lastname</label>
                        <br>
                        <input type="text" name="lastname1" value="<?php echo $row["LastName"]; ?>">
                    </div>
                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email1" value="<?php echo $row["Email"]; }?>" readonly>
                    </div>
                    <div class="input-group">
                        <button type="submit" id="b1" class="btn" name="edit_profile">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Masthead-->
<header class="masthead">
</header>
<!-- Register-->
<?php  if (isset($_SESSION['email'])) :
    echo '<section class="page-section bg-primary" id="register" style="display: none">';
else :
    echo '<section class="page-section bg-primary" id="register">';
endif;
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">

                <div class="container h-100">
                    <form action="index.php" method="post" enctype="multipart/form-data">

                    <div class="header">
                        <h2>Register</h2>
                    </div>
                    <?php include('errors.php'); ?>
                    <div class="input-group">
                        <label>Firstname</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <br>
                        <input type="text" name="firstname" value="">
                    </div>
                    <div class="input-group">
                        <label>Lastname</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <br>
                        <input type="text" name="lastname" value="">
                    </div>
                    <div class="input-group">
                        <label>Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="email" name="email" value="">
                    </div>
                    <div class="input-group">
                        <label>Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="password" name="password_1">
                    </div>
                    <div class="input-group">
                        <label>Confirm password</label>&nbsp;
                        <input type="password" name="password_2">
                    </div>
                    <div class="input-group">
                        <label>Select image to upload</label>&nbsp;
                    </div>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <div class="input-group">
                        <button type="submit" id="b1" class="btn" name="reg_user">Register</button>
                    </div>
                    <p>
                        Already a member? <a href="#" data-target="#login" data-toggle="modal">Sign in</a>
                    </p>
                    </form>
                </div>

                <!--  <h2 class="text-white mt-0">We've got what you need!</h2>
                <hr class="divider light my-4" />
                <p class="text-white-50 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a> -->
            </div>
        </div>
    </div>


<?php echo "</section>"; ?>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <h2 class="text-center mt-0">Heartstrings Events</h2>
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <img src="assets/img/img2.png" height="100" width="130"> <br><br>
                    <p class="text-muted mb-0">Come and share your love story with others in our Heartstring Events.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <!--      <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>  -->
                    <img src="assets/img/img1.png" height="100" width="120"> <br><br>
                    <p class="text-muted mb-0">Make room in your calendars! Come to our parties and activities dedicated to singles of your age near you.</p>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <img src="assets/img/img3.jpg" height="100" width="130">
                    <br><br>
                    <p class="text-muted mb-0">Every year nearly 10,000 people meet each other and found their perfect match.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <img src="assets/img/img4.jpg" height="100" width="110">
                    <br><br>
                    <p class="text-muted mb-0">
                        Life without love is like a tree without blossoms or fruit.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio -->
<div id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
                    <?php include('see_profile.php'); ?>
        </div>
    </div>
</div>
<!-- Call to action-->
<section class="page-section bg-dark text-white">
    <div class="container text-center">
        <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
        <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a>
    </div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="mt-0">Let's Get In Touch!</h2>
                <hr class="divider my-4" />
                <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                <div>+1 (555) 123-4567</div>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div></div>
</footer>
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