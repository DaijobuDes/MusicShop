<!DOCTYPE html>
<html lang="en">

<?php

    require_once("config.php");

    session_start();

    if ($_SESSION['login'] != 'admin')
    {
        header("Location: ../home.php");
    }

    if (isset($_POST['albumName']) && isset($_POST['artist']))
    {
        $query ="INSERT INTO `album`(`Album_ID`, `albumName`, `FullLength`, `BandArtist`, `NumberOfSongs`, `Publisher`, `Rating`, `Author_ID`, `Publisher_ID`) VALUES (NULL,'{$_POST['albumName']}',{$_POST['length']},'{$_POST['artist']}',{$_POST['noSongs']},'{$_POST['publisher']}',{$_POST['rating']},0, 0)";

		//die($query);
        if (!mysqli_query($conn, $query))
        {
            echo '<script type="application/javascript">alert("Failure.");</script>';
        }
        else
        {
            echo '<script type="application/javascript">alert("Success.");</script>';
        }
    }

?>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Add Publisher</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout contact-page">
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="../images/logo.jpg" alt="logo" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <!-- <li> <a href="index.html">Home</a> </li>
                                        <li> <a href="about.html">about</a> </li>
                                        <li> <a href="album.html"> Albums</a> </li>
                                        <li> <a href="songs.html">Songs</a> </li>
                                        <li> <a href="contact.html">Contact</a> </li>
                                        <li class="active"> <a href="login.php">Login</a> </li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <!-- <form class="search">
                            <input class="form-control" type="text" placeholder="Search">
                            <button><img src="../images/search_icon.png"></button>
                        </form> -->
                    </div>
                </div>
            </div>
            <!-- end header inner -->
    </header>
    <!-- end header -->

    <div class="contactbg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contacttitlepage">
                        <h2>Add Album</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class=" col-md-6 offset-md-3">
                <div class="address">
                    <form method="POST" action="album_add.php">
                        <div class="row">
                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Album Name" type="text" name="albumName" required>
                            </div>
                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Band/Artist" type="text" name="artist" required>
                            </div>
                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Publisher" type="text" name="publisher" required>
                            </div>
                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Rating" type="number" name="rating" required>
                            </div>
                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Number of Songs" type="number" name="noSongs" required>
                            </div>
                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Total Length" type="number" name="length" required>
                            </div>
                            <div class="col-sm-12">
                                <!-- <button class="send">Login</button> -->
                                <input type="submit" class="send" id="submitBtn" value="Add to Database"></input>
                            </div>
                        </div>
                    </form>
                    <div>
                        <!-- <br />
                        <p>No account yet? Register <a href="register.php">here.</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  footer -->

    <!-- <div class="copyright">
        <div class="container">
            <p>© 2019 All Rights Reserved. <a href="https://html.design/">Free html Templates</a></p>
        </div>
    </div> -->

    <!-- end footer -->
    <!-- Javascript files-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.0.0.min.js"></script>
    <script src="../js/plugin.js"></script>
    <!-- sidebar -->
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>