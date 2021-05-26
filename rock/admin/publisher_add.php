<?php
    require_once("config.php");

    session_start();

    if (isset($_POST['place']) && isset($_POST['rating']))
    {
        $query = "INSERT INTO `publisher`(`Publisher_ID`, `PublisherName`, `PlaceOfOrigin`, `AlbumsPublished`, `Rating`) VALUES (NULL, '" . $_POST['publisher'] ."','".  $_POST['place'] ."', '".  $_POST['albums'] ."', '". $_POST['rating'] ."')";

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
            Publisher Name: <input type="text" id="place" name="publisher"><br />
            Place of Origin: <input type="text" id="place" name="place"><br />
            Albums Published: <input type="number" id="place" name="albums"><br />
            Rating: <input type="number" id="place" name="rating"> <br />
            <br />            
            <button type="submit" name="submitBtn" value="Submit">Submit</button>
        </form>


    </body>
</html>