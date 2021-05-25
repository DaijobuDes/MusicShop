<html>
<?php
    session_start();

    if ($_SESSION['login'] != 'admin')
    {
        header("Location: logout.php");
    }



?>
    <head>
        <title>Management</title>
    </head>
    <body>
        <h2>Choose an option</h2>
        <a href="./publisher_add.php">Add Publisher</a><br />
        <a href="./publisher_distribute.php">Publisher Distribution</a>

    </body>
</html>