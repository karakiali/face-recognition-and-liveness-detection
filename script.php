
<?php
session_start();
 require_once 'C:\xampp\htdocs\PhpProject2\connection.php';
 $ID =$_SESSION['ID'];
 $time=$_POST['Date'];
 $desc= $_POST['desc'];
  $query = "insert into image(Sid,time,descriptor)values('$ID','$time','$desc')";
  (mysqli_query($con, $query));
 $last_id =$con->insert_id;
 $im = "$last_id.png";
  $l = "UPDATE image SET `image`= '$im' WHERE `ID` = '$last_id'";
  (mysqli_query($con, $l));

// Requires php5
define('UPLOAD_DIR', 'images/');
$img = $_POST['imgBase64'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . $last_id .'.png';
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';
//
//?>


