<?php

require_once "connection.php";
session_start();

    $p= $_GET['rn'];
    $query="delete from `image` where ID='$p'";
    mysqli_query($con,$query);
    header('location:table.php');
