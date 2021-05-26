<?php
    session_start();

	//require_once("config.php");
	
	if (!isset($_SESSION['logged_in'])) 
	{
		header("Location: login.php");
	}

	if(isset($_POST['Buy']))
	{
		$conn =mysqli_connect("localhost","root","","musicShop");
		$query = "SELECT * FROM cart WHERE customer_Id = ".$_SESSION['id'];
		$cartres = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($cartres);

		$query = "SELECT * FROM cartalbum WHERE albumList = ".$_POST['Buy']." AND cart_id = ".$row['Cart_ID'];
		$albmres = mysqli_query($conn,$query);
		
		if($songs = mysqli_fetch_assoc($albmres))
		{
			echo '<script type="application/javascript">alert("You already added this song to the cart.");</script>';
		}
		else
		{
			$query = "INSERT INTO cartalbum VALUES(".$row['Cart_ID'].",".$_POST['Buy'].")";
			$insAlbm = mysqli_query($conn,$query);

			if($insAlbm)
			{
				echo '<script type="application/javascript">alert("Success.");</script>';
			}
			else
			{
				echo '<script type="application/javascript">alert("Something went wrong, please try again.");</script>';
			}
		}
	}
?>