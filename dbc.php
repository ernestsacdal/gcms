<?php
$link = mysqli_connect("localhost", "root", "", "gcms");

if($link === false){
    die("Error".mysqli_connect_error());
}
?>