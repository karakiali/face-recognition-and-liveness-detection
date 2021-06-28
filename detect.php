<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  
  <title>Document</title>
  <script defer src="js/face-api.min.js"></script>
  <script defer src="js/t.js"></script>
  <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
	</script>
	<script src=
"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
	</script>
  <style>
    body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh; 
      display: flex;
      justify-content: center;
      align-items: center;
background: -webkit-linear-gradient(-45deg,  #cfd8dc 0%,#607d8b 100%,#b0bec5 100%); /* Chrome10-25,Safari5.1-6 */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cfd8dc', endColorstr='#b0bec5',GradientType=1 );
    }

    canvas {
      position: absolute;
    }
  </style>
</head>
<body>
  
    <input type="hidden" id="desc"  value="">
  <video id="video" width="720" height="560" autoplay muted ></video>
  <div id = "captured" width="720" height="560" ></div>
  <ul>
    <li>  <input type="button" value="Capture" id="capture">
    </li>
    <li>  <input type="button" value="Capture till detection" id="detect">
    </li>
    <li>  <button style="position: center;" id="geeks" type="button">save</button>
    </li>
    <li id="message" >____</li>
    
  </ul>


   <script>
        
		$(function() {
			$("#geeks").click(function() {
				html2canvas($("#captured"), {
					onrendered: function(canvas) {
						var imgsrc = canvas.toDataURL("image/png");
						console.log(imgsrc);
                                                var desc = document.getElementById("desc").value
						var dataURL = canvas.toDataURL();
                                                var  my_time = new Date();
						$.ajax({
							type: "POST",
							url: "script.php",
							data: { 
                                                                Date : my_time,
								imgBase64: dataURL,
                                                                desc: desc
							}
						}).done(function(o) {
							console.log('saved');
						});
					}
				});
			});
		});
	</script>

</body>
</html>
