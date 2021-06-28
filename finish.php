<?php
require_once "connection.php";
$rec=$_POST['rec'] ;
$live=$_POST['live'];
$id=$_POST['id'];
$time = $_POST['time'];
$query = "insert into result(Sid,recognized,live,time)values('$id','$rec','$live','$time')";
  (mysqli_query($con, $query));

