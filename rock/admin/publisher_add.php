<?php
    require_once("config.php");

    session_start();

    if (isset($_POST['place']) && isset($_POST['rating']))
    {
        $place = $_POST['place'];
        $rating = $_POST['rating'];
        $query = "INSERT INTO `publisher`(`Publisher_ID`, `PlaceOfOrigin`, `AlbumsPublished`, `Rating`) VALUES (NULL, '".  $_POST['place'] ."', '0', '". $_POST['rating'] ."')";

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
<html>
    <head>
        <title>Add Publisher</title>
    </head>
    <body>
        <h2>Add a publisher</h2>
        
        <form method="POST" action="publisher_add.php">
            Place of Origin: <input type="text" id="place" name="place"><br />
            Rating: <input type="number" id="place" name="rating"> <br />
            <br />            
            <button type="submit" name="submitBtn" value="Submit">Submit</button>
        </form>


    </body>
</html>