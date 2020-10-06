<?php
$db = mysqli_connect('localhost', 'root', '', 'dating_app');
$email = null;
if (!empty($_SESSION['email']))
    $email = $_SESSION['email'];
$select_query = " select * from users where Email != '$email'";
$result = mysqli_query($db, $select_query);
$target_dir = "assets/img/profiles/";


while ($row1 = mysqli_fetch_array($result)) {
    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            #d1 {
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

            /*  wink  */
            .img_wink {
                position: relative;
                display: inline-block;

            }

            .img_wink .img_wink_text {
                font-weight: bolder;
                visibility: hidden;
                width: 120px;
                background-color: yellow;
                color: black;
                text-align: center;
                padding: 5px 0;

                position: absolute;
                z-index: 1;
            }

            .img_wink:hover {
                cursor: pointer;
            }

            .img_wink:hover .img_wink_text {
                visibility: visible;

            }
        </style>
    </head>
    <body>
    <div id="d1">
        <div class="card">
            <img src="<?php echo $target_dir . $row1['Photo']; ?>" alt="" width="100%" height="200">
            <h1><?php echo $row1['FirstName'] . " " . $row1['LastName']; ?></h1>
            <p class="title"><?php echo $row1['Email']; ?></p>


            <div>
                <a href="https://www.facebook.com/">
                    <img src="assets/img/fb.JPG" alt="" height="25" width="25"></a>
                <a href="https://www.instagram.com/">
                    <img src="assets/img/ig.JPG" alt="" height="25" width="25">
                </a>
                <a href="https://www.twitter.com/">
                    <img src="assets/img/t.JPG" alt="" height="25" width="25">
                </a>
                <br><br>
                <div class="div_favorite">

                    <?php
                    if ((!empty($_SESSION['role'])) && $_SESSION['role'] == 2)
                        echo '<a href="favorites.php?id=' . $row1['UserId'] . '"><img id="toggleImage" class="img_favorite" src="assets/img/love.jpg" alt="" height="35" width="35"></a>';
                    else if ((!empty($_SESSION['role'])) && $_SESSION['role'] == 1)
                        echo '<a href="#" data-target="#profile" data-toggle="modal"><img id="toggleImage" class="img_favorite" src="assets/img/love.jpg" alt="" height="35" width="35" onclick="alert(\'You have to buy premium to perform this action!\')"></a>';
                    else
                        echo '<a href="#" data-target="#login" data-toggle="modal"><img id="toggleImage" class="img_favorite" src="assets/img/love.jpg" alt="" height="35" width="35" onclick="alert(\'You must have to login first!\')"></a>';

                    ?>
                    <div class="img_wink">
                        <?php
                        if (isset($_SESSION['email']))
                            echo '<img src="assets/img/wink.png" height="35" width="35" onclick="alert(\'You winked!\')">';
                        else
                            echo '<a href="#" data-target="#login" data-toggle="modal"> <img src="assets/img/wink.png" height="35" width="35" onclick="alert(\'You must have to login first!\')"></a>';
                        ?>
                        <p class="img_wink_text">Wink me!</p>
                    </div>

                </div>
            </div>
            <br><br>
            <?php
            if (isset($_SESSION['email']))
                echo '<a href="chat.php?id=' . $row1['UserId'] . '" <p><button>Message</button></p></a>';
            else
                echo '<a href="#" data-target="#login" data-toggle="modal"> <p><button onclick="alert(\'You must have to login first!\')">Message</button></p></a>';
            ?>


        </div>
    </div>

    </body>
    </html>


    <?php
}
mysqli_close($db);

?>