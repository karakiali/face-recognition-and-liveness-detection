<?php
$hostname="localhost";
$user="root";
$pw="";
$db="OnlineRec";
$con=mysqli_connect($hostname, $user, $pw, $db);
if(mysqli_connect_errno()){
    echo "error in connectoin";
}
?>
