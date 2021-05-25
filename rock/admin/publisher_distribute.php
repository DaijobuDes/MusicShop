<html>
<?php
    require_once("../config.php");

    session_start();

    if ($_SESSION['login'] != 'admin')
    {
        header("Location: logout.php");
    }

    if (isset($_POST['number']))
    {
        $i = 1;

        $result = mysqli_query($conn, "SELECT * FROM song");

        while (mysqli_fetch_assoc($result))
            $i++;


        $song = $_POST['number'];
        $art = $_POST['name'];
        $pub = $_POST['publisher'];
        $gen = $_POST['genre'];
        $pubd = $_POST['pubd'];
        $query = "INSERT INTO `song`(
            `Song_ID`, `SongLength`, 
            `BandArtist`, `Publisher`, 
            `Genre`, `PublishingDate`, 
            `Author_ID`, `Album_ID`, 
            `Publisher_ID`) VALUES (
                ". $i .",
                ".$song.",
                '".$art."',
                '".$pub."',
                '".$gen."',
                '".$pubd."',
                0,
                0,
                0)";

        if (!mysqli_query($conn, $query))
        {
            // echo '<script type="application/javascript">alert("Failure.");</script>';
            echo mysqli_error($conn);
        }
        else
        {
            echo '<script type="application/javascript">alert("Success.");</script>';
        }   
    }


?>
    <head>
        <title>Publisher Distribution</title>
    </head>
    <body>
        <h2>Add publisher data</h2>

        <form method="POST" action="publisher_distribute.php">
            Album Length: <input type="number" name="number"><br />
            Band Artist: <input type="text" name="name"><br />
            Number of Tracks: <input type="number" name="tracks"><br />
            Publisher: <input type="text" name="publisher"><br />
            Genre: <input type="text" name="genre"><br />
            Publishing Date: <input type="number" name="pubd"><br />

            <button type="submit" name="submitBtn" value="Submit">Submit</button>
        </form>



    </body>
</html>