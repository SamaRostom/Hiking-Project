<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- https://www.youtube.com/watch?v=eAK8uYtNTy4 -->
<!-- https://stackoverflow.com/questions/49250955/better-way-to-make-the-shopping-cart-table-with-mysql
https://www.onlyxcodes.com/2020/10/add-to-cart-and-checkout-in-php.html
https://resources.fabric.inc/blog/answers/shopping-cart-database-design -->
	<?php 
	include "Menu.php";
// 	$servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "webproject";

// $conn = new mysqli($servername, $username, $password, $dbname);
// $s = " SELECT * FROM trips" ;
// $result = mysqli_query ($conn ,$s);
// while($data = $result->fetch_array(MYSQLI_ASSOC)){
	?>


<table class="table table-hover table-bordered">	
        <thead>
            <tr>
                <th>Trip_Code</th>
                <th>Trip_Price</th>
                <th>Hiking_Place</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</body>
</html>