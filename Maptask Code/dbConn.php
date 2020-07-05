<?php
$connection = mysqli_connect("localhost","root","","");
$db = mysqli_select_db($connection,'test');


if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
