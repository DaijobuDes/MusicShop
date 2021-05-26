<!DOCTYPE html>
<html lang="en">
<?php
	session_start();

	require_once("config.php");
	
	if (!isset($_SESSION['logged_in'])) 
	{
		header("Location: login.php");
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
    <title>Rock</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout album-page">
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
                                    <a href="index.html"><img src="images/logo.jpg" alt="logo" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                <ul class="menu-area-main">
                                        <li> <a href="home.php">Home</a> </li>
                                        <li> <a href="about.php">about</a> </li>
                                        <li> <a href="album.php"> Albums</a> </li>
                                        <li> <a href="songs.php">Songs</a> </li>
                                        <li class="active"> <a href="cart.php">Cart</a> </li>
                                        <li> <a href="logout.php"><?php echo $_SESSION['name']; ?></a> </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <form class="search">
                            <input class="form-control" type="text" placeholder="Search">
                            <button><img src="images/search_icon.png"></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
    </header>
    <!-- end header -->

    <div class="Albumsbg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="Albumstitlepage">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

	<!-- Albums -->
	<link rel="stylesheet" href="css/tables.css" />
    <div class="Albums">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
						<span>Here's the summary of things you have to pay us. No refunds.</span>
						<?php
							$query = "SELECT * FROM cart";
							$result = mysqli_query($conn,$query);
							$count = mysqli_num_rows($result);

							if($count)
							{
								$price = 0;
								$query = "SELECT AlbumList FROM cart, cartAlbum WHERE cart.cart_id = cartAlbum.cart_id AND cart.customer_id = ".$_SESSION['id'];
								$result = mysqli_query($conn,$query);
								$count = mysqli_num_rows($result);
								
								if($count > 0)
								{
									?>
									<br>
									<br>
									<br>
									<h1 align="left">Album</h1>
									<table class="table">
										<thead class="thead-primary">
											<tr>
												<th>Album Name</th>
												<th>Number of songs</th>
												<th>Price</th>
											</tr>
										</thead>
										<tbody>
									<?php

									while($row = mysqli_fetch_assoc($result))
									{
										$query = "SELECT * FROM album WHERE album_id = ".$row['AlbumList'];
										$alres = mysqli_query($conn,$query);
										$albums = mysqli_fetch_assoc($alres);

										echo
										"<tr>
											<td>".$albums['albumName']."</td>
											<td>".$albums['NumberOfSongs']."</td>
											<td style=\"text-align: right;\">Php 250</td>
										</tr>";
										$price += 250;
									}
									?>
									</tbody>
									</table>
									<?php
								}
								
								$query = "SELECT SongList FROM cart, cartSong WHERE cart.cart_id = cartSong.card_id AND cart.customer_id = ".$_SESSION['id'];
								$result = mysqli_query($conn,$query);
								$count = mysqli_num_rows($result);
								
								if($count > 0)
								{
									?>
									<br>
									<h1 align="left">Songs</h1>
									<table class="table">
										<thead class="thead-primary">
											<tr>
												<th>Song Name</th>
												<th></th>
												<th>Price</th>
											</tr>
										</thead>
										<tbody>
									<?php
										while($row = mysqli_fetch_assoc($result))
										{
											$query = "SELECT * FROM song WHERE song_id = ".$row['SongList'];
											$songres = mysqli_query($conn,$query);
											$songs = mysqli_fetch_assoc($songres);

											echo
											"<tr>
												<td>".$songs['songName']."</td>
												<td></td>
												<td style=\"text-align: right;\">Php 20</td>
											</tr>";
											$price += 20;
										}
									?>
									</tbody>
									</table>
									<?php
								}
								?>

								<div align="right">
									<h3>Total Price: <?php echo $price ?></h3>
									<form method="POST" action="cart.php">
										<button type="submit" name="Buy" value="Buy" formaction="cart.php">Checkout</button>
									</form>
								</div>
								<?php
							}
						?>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <!-- end Albums -->

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
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
        function addToCart() {
            alert("Please Login First");
        }
    </script>
</body>

</html>