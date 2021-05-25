<?php

// Supress warnings/errors
error_reporting(E_ERROR | E_PARSE);

$conn = mysqli_connect("localhost", "root", "", "musicshop");

if (!$conn)
{
    header("HTTP/1.1 400 Bad Request");
    die("Cannot connect to database. Reason: ". mysqli_error($conn));
}
else
{
    header("HTTP/1.1 403 Forbidden");
}

?>