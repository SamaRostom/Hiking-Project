<!-- <!DOCTYPE html>
<html>
<head>
	<script> src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Contact US</title>
	<style type="text/css">
body{
    background-image: url("images/MAPp.jpg");
    background-size: cover;
    background-repeat: no-repeat;
   }
   #googleMap{
         width: 80%;
         position: absolute;
         left: 0px;
         height: 50%;
   }
   .m{
  	     width: 50%;
         position: absolute;
         right: 0px;
         height: 100%;
         }
        
	</style>

</head>
<body>
	<?php
       include "navbar.php";
	?>
<div class="m">
<h3><strong>Contact Us</strong></h3>
<form>
	<i class="glyphicon glyphicon-phone"></i>
	<label for="phone">Tel:01113529156 </label>
	<a href="tel:01113529156">Call US!</a><br>
   <i class="fa fa-map-marker" style="font-size:15px;color:black"></i>
    <label>Address: Infront of Americana Plaza, Building 2 Floor 3.
 </label>
    <h6><b>Our Location :</b></h6>
<button style="font-size:15px">Button <i class="fa fa-map-marker"></i></button>
</form>
</div>
<div  id="googleMap" style="width:400px;height:200px;"></div>

	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d55271.181644427685!2d31.4913547!3d30.0239782!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145822f178d5a445%3A0x367e3f4e23eaf846!2sConcord%20Plaza%20Mall!5e0!3m2!1sen!2seg!4v1641769368156!5m2!1sen!2seg" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

</body>
</html> -->


<!DOCTYPE html>
<html>
<head>
	<script> src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Contact US</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("images/MAPp.jpg");

  min-height: 380px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}


input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>
	<?php
	include "navbar.php";
    ?>

<div class="bg-img">
  <form action="/action_page.php" class="container">
    <h1>Contact Us</h1>

    <label for="email"><b>Phone</b></label>
    

    <label for="psw"><b>Address</b></label>
    

    <button type="submit" class="btn">Login</button>
  </form>
</div>



</body>
</html>