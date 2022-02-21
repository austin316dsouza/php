<?php
$conn = mysqli_connect("localhost","austin","austin","trial");

if(!$conn)
{
    echo "Connection Error:" . mysqli_connect_error();
}
?>