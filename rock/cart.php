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
										$query = "SELECT * FROM cart";
										$result = mysqli_query($conn,$query);

										if($result)
										{
											$query = "SELECT AlbumList FROM cart, cartAlbum WHERE cart.cart_id = cartAlbum.cart_id AND cart.customer_id = 1";
											$result = mysqli_query($conn,$query);
											$count = mysqli_num_rows($result);
											
											if($count > 0)
											{
												$row = mysqli_fetch_assoc($result);
												$list = explode(",", $row['AlbumList']);

												foreach($list as $album)
												{
													$query = "SELECT * FROM album WHERE album_id = $album";
													$result = mysqli_query($conn,$query);
													$row = mysqli_fetch_assoc($result);

													echo
													"<tr>
														<td>".$row['BandArtist']."</td>
														<td>".$row['NumberOfSongs']."</td>
														<td>Php 250</td>
													</tr>";
												}
											}
										}
									?>
								</tbody>
							</table>
                    	</div>
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