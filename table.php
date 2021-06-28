<html>
    <head>   
        <style>

@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

button[type=submit]:hover, button[type=submit]:focus {
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 -10px 10px rgba(255,255,255,0.1);
}

button[type=submit] {
  background: #fb0;
  border: 1px solid rgba(0,0,0,0.4);
  border-radius: .3em;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 10px 10px rgba(255,255,255,0.1);
  color: #873C00;
  cursor: pointer;
  font-size: 13px;
  font-weight: bold;
  height: 40px;
  padding: 5px 20px;
  width: 100%;
}

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}
        </style>
    
        
    
    
    </head>
    <body>
         
        
<?php
session_start();
if(!isset($_POST['s'])){
    $id = $_SESSION['ID'];
}else{
 $id = $_POST['s'];   
}

require_once "connection.php";

    $query1="select * from students where Sid = '$id'";
    $result1= mysqli_query($con,$query1);
     $row= mysqli_fetch_row($result1);
     $name = $row[1];
   $query="select * from image where Sid = '$id'";
        $result= mysqli_query($con,$query);
        $r=mysqli_num_rows($result);
        $_SESSION['ID']= $id;
        if (!$row){
        echo 'NO SUCH ID <br>'
            . '<form action="logout.php" method="post" align="center">
            <button type="submit">logout</button>
        </form>'
            ;}
        else {
        echo "<form action='detect.php' method='post'><table border='2' align='center' class='container'>";
        echo "<tr>
            <th align='center'>ID</th>
        <th align='center'>Name</th>
        <th align='center'>Image</th>
        <th align='center'>Operation</th></tr>";
        for($i=0; $i<$r; $i++){
            
            
            
            $row = mysqli_fetch_row($result);
//            $_SESSION['n']=$row[0];
            echo "<tr>"
                    . "<th align='center'>$row[1]</th>"
                    . "<th align='center'>$name</th>"
                    . "<th align='center'><img src='images/$row[2]'  width='275px' height='200px'></th>"
                    . "<th align='center'><a href='del.php?rn=$row[0]'>DELETE</a></th></tr> ";
                    
        }
        echo '</table>';
        echo '<br><button type="submit" style="float: right; width: 150px; height: 50px" align="center">NEXT</button></form>';
        
        }
 
?>
 
  </body>
</html>
