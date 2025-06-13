<?php
$servername = "localhost";
$username = "1223600";
$password = "231fa04a52";
$dbname = "1223600";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
    // echo "Not_Connect";
    echo "Not_Connected...!!!".mysqli_error_count();
}

?>