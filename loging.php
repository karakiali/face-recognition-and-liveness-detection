<?php
require_once "connection.php";
 session_start();
if(isset($_POST["em"], $_POST["pw"])){
    $pw= $_POST["pw"];
    $em= $_POST["em"];
$query="select * from students where email='$em'";
$result= mysqli_query($con,$query); 
    $row = mysqli_fetch_row($result);
    if($row !=0){
    if($pw==$row[3]){
        $id= $row[0];
        $_SESSION['id']=$id;
    $query="select * from image where Sid='$id'";
$result= mysqli_query($con,$query); 
    $r = mysqli_fetch_row($result);
    $_SESSION['desc'] = $r[4];
//    if ($_SESSION['desc']==null){
//        include_once 'search.php';;   
//    }else{
//    include_once "Q1.php";}
    include_once "exam.php";
}else{
    echo 'incorrect pasword';
}
}else{
    echo 'incorrect email';
}
}else{
    echo 'required';
}