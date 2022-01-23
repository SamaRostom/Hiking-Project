<!DOCTYPE html>
<html>
<head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Contact US</title>
   <style type="text/css">
body{
    background-color: lightblue;
    background-size: 100% 100%;
    background-repeat: no-repeat;
   }

    #equipcard{
      background-image: url("images/c.jpg");
  width: 60%;
  box-shadow: 0 5px 25px rgba(1 1 5 / 9%);
  padding: 5px;
  margin: 3rem auto;
  transition: 0.7s ease;
  text-align: center;
}
 #equipcard:hover{
  transform: scale(0.9);
}
.networks a{
            text-decoration: none;
            color: black;
            padding: 0rem .5rem;
        }
        iframe{
            width: 60%;
            height:400px;
            margin-bottom:3rem;
        }
   </style>

</head>
<body>
<?php
     include "navbar.php";
  ?>
  
   <div class="card"  id="equipcard">
      <br><br>
      <h3> <b>CONTACT US:</b></h3><br>
   <b><i style='font-size:24px' class='fas'>&#xf095;</i>  Our Phone number : 01113529156</b>
   <br><br>
   <b><i style="font-size:24px" class="fa">&#xf041;</i>  The Address : infront of Americana Plaza, Building 2 Floor 3.</b>
   <br><br>
   <b><i style="font-size:24px" class="fa">&#xf0e0;</i>  Our Mail : TakeAhike@gmail.com</b>
   <hr>
  </p>
   <div class='networks fs-2 text-center'>
    <a href='www.facebook.com/take-a-hike' target='blank'><i class="fab fa-facebook"></i></a>
    <a href='www.instagram.com/take-a-hike' target='blank'><i class="fab fa-instagram"></i></a>
    <a href='www.twitter.com/take-a-hike' target='blank'><i class="fab fa-twitter"></i></a>
    </div>
</div>


<div class='text-center'>
    <h1 class='display-6 mb-5'>Waiting for your visit</h1>
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d55271.181644427685!2d31.4913547!3d30.0239782!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145822f178d5a445%3A0x367e3f4e23eaf846!2sConcord%20Plaza%20Mall!5e0!3m2!1sen!2seg!4v1641769368156!5m2!1sen!2seg"></iframe>
<div>
<?php
include "footer.php";
?>
</body>
</html>
