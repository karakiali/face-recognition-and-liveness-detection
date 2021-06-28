<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="shortcut icon" href="#">
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.0.0/dist/tf.min.js"></script>
        
<!--<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest"></script>-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/face-api.js"></script>
  <script defer src="js/det.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>



    <title>Document</title>
</head>

<body>
    
   <div id="camera" ></div>
   <!--<input type="hidden" id="camera">-->
<!--   <img src="images/fake.png" id="img1"/>-->
<!--   <button onclick="take_snapshot()" class="button1">Take Snapshot</button>-->
   <div id="results"></div>
   <div id="s" ></div>
   <canvas id="reflay" class="overlay"></canvas>


   <h1>Choose the correct answer </h1>
        
        <h2>Q1) 1 + 3 = ??</h2>
        <input type="radio" name="q1" onclick="take_snapshot()" id="1">
<label for="1">"4"</label><br>
<input type="radio"  name="q1" onclick="take_snapshot()" id="2">
<label for="2">"1"</label><br>

      <h2>Q2) 2 + 3 = ??</h2>
        <input type="radio" name="q2" onclick="take_snapshot()" id="3">
<label for="3">"5"</label><br>
<input type="radio"  name="q2" onclick="take_snapshot()" id="4" >
<label for="4">"3"</label><br>

<h2>Q3) 1 + 2 = ??</h2>
<input type="radio" name="q3" onclick="take_snapshot()" id="5">
<label for="5">"0"</label><br>
<input type="radio"  name="q3" onclick="take_snapshot()"id="6" >
<label for="6">"3"</label><br>

<h2>Q4) 4 - 0 = ??</h2>
<input type="radio" name="q4" onclick="take_snapshot()" id="7">
<label for="7">"4"</label><br>
<input type="radio"  name="q4" onclick="take_snapshot()" id="8">
<label for="8">"0"</label><br>


</body>


</html>
<?php
//session_start();
$desc=$_SESSION['desc'];
$id = $_SESSION['id'];
echo ""
. "<form action='index.php' method='post' >"
        . "<button type='submit' >finish</button> </form>"
        . "<input type='hidden' id='desc'  value='$desc'>"
        . "<input type='hidden' id='id' name='id'  value='$id'>"
        . "<input type='hidden' id='rec' name='rec' value='no face detected'>"
        . "<input type='hidden' id='live' name='live' value='no face detected'>"
        . "<input type='hidden' id='time' name='time' value='-'>";


?>
<script>
    function aj(){
        var  my_time = new Date();
        const live = document.getElementById('live').value;
        const rec = document.getElementById('rec').value;
        const id = document.getElementById('id').value;
$.ajax({
							type: "POST",
							url: "finish.php",
							data: { 
                                                                time : my_time,
								rec: rec,
                                                                live: live,
                                                                id: id
							}
						})
    
}</script>
<style>
#camera{
    
    cursor: pointer;
    display: block;
    float: right;  
    z-index: 3;
    position: absolute; /*newly added*/
    right: 5px; /*newly added*/
    top: 5px;/*newly added*/


    }
  .button1{
    
    cursor: pointer;
    display: block;
    float: right;  
    z-index: 3;
    position: absolute; /*newly added*/
    right: 40%; /*newly added*/
    top: 5px;/*newly added*/


    }
      #element {
    position: absolute;
    top: 50px;
    left: 200px;
    z-index: 10;
}
</style>
<style>
  #overlay, .overlay {
      position: absolute;
      top: auto;
      left: auto;
      bottom: 50%;
      }
  </style>