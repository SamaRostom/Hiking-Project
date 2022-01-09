<!DOCTYPE html>
<html>
<head>
	<title>Menu Page</title>
	<style>
		a:link{
			color: green;
		}
		a:visited{
			color: green;
		}
		a:hover{
			color: darkgreen;
		}
		a:active{
			color: lightgreen;
		}
		.topnav{
	background-color: white;
	overflow: hidden;
	/*float: left;*/
	/*height: 400px;
	width: 200px;*/
}
.topnav a{
	/*float: center;*/
    /*on the top*/
    float: left;
	/*display: block;*/
	color: 	#228B22;
	background-color: black;
	text-align: center;
	padding: 5px 16px;
	text-decoration: none;
	font-size: 14px;
}
.topnav a:hover{
	background-color: green;
	color: white;
}
.topnav a:active{
	background-color: green;
	color: white;
}
h4,h3{
	color: 	#556B2F;

	/*font-size: 17px;*/
}

	</style>
</head>
<body>
	<div class="topnav" id=myTopnav>
<?php
session_start();
if(isset($_SESSION['Username'])){
	echo "<h3>HIKING ALL OVER THE WORLD</h3><h4>Welcome ".$_SESSION['Username']."</h4>";
	

  if($_SESSION['ID_Type'] == "1"){
    echo "<a href='Home.php'>Home </a>";
    echo "<a href='Profile.php'> Profile </a>";
    echo "<a href='AboutUs.php'> About Us</a>";
    echo "<a href='Trips.php'> Trips </a>";
	echo "<a href='Equipment.php'> Equipment </a>";
	echo "<a href='ContactUs.php'> Contact Us</a>";
	echo "<a href='History.php'>History </a>";
	echo "<a href='SignOut.php'> Sign Out</a>";
  }
  if($_SESSION['ID_Type'] == "2"){
  	echo "<a href='Home.php'>Home </a>";
    echo "<a href='Profile.php'> Profile </a>";
  	echo "<a href='AboutUs.php'> About Us</a>";
	echo "<a href='Trips.php'> Trips </a>";
	echo "<a href='Equipment.php'> Equipment </a>";
	echo "<a href='ContactUs.php'> Contact Us</a>";
	echo "<a href='Cart.php'> Cart</a>";
	echo "<a href='SignOut.php'> Sign Out</a>";
  }

  if($_SESSION['ID_Type'] == "3"){
  	echo "<a href='Home.php'>Home </a>";
  	echo "<a href='ContactUs.php'> Contact HR</a>";
	echo "<a href='History.php'>History </a>";
	echo "<a href='SignOut.php'> Sign Out</a>";
  }

  if($_SESSION['ID_Type'] == "4"){
  	echo "<a href='Home.php'>Home </a>";
  	echo "<a href='History.php'>History </a>";
	echo "<a href='SignOut.php'> Sign Out</a>";

 }
}

else{
	echo "<h2>HIKING ALL OVER THE WORLD </h2>";
	echo "<a href='Home.php'>Home</a>";
	echo "<a href='AboutUs.php'> About Us</a>";
	echo "<a href='Login.php'> Login </a>";
	echo "<a href='SignUp.php'> Sign Up</a>";
	echo "<a href='Gallery.php'> Gallery </a>";
	echo "<a href='Trips.php'> Trips </a>";
	echo "<a href='Equipment.php'> Equipment </a>";
	echo "<a href='ContactUs.php'> Contact Us</a>";
}
?>
</div>
</body>
</html>