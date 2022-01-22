<!DOCTYPE html>
<html>
<head>
  <?php
     include "navbar.php";
  ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
 @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap');

/* *{
  box-sizing:border-box;
} */

.container {
  padding: 64px;
}

.column-66 {
  float: left;
  width: 66.66666%;
  padding: 20px;
  font-family: 'Roboto Mono', monospace;
}

.column {
  float: left;
  width: 33.33333%;
  height: 40%;
  padding: 20px;
}

img {
  display: block;
  height: auto;
  max-width: 100%;
}
</style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="column-66">
      <h1 style=" font-size:40px; color:#2a718e;">Who we are</h1>
      <p><span style="font-size:20px">We bring you top-quality gear and apparel, expert advice, rental equipment, inspiring stories of life outside and outdoor experiences to enjoy alone or share with your friends and family. With every purchase you make with Take A Hike, you are choosing to steward the outdoors, support sustainable business and help the fight for life outside. So whether you are new to the outdoors or a seasoned pro, we hope you will join us.
    </div>
    <div class="column">
        <img src="images/9.jpg">
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="column">
      <img src="images/6.jpg">
    </div>
    <div class="column-66">
    <h1 style=" font-size:40px; color:#2a718e;">Our history</h1>
      <p><span style="font-size:20px"> It all started with an ice axe. Take A Hike was founded in 2022 when a group of 23 climbing friends, united by their love for the outdoors, decided to source quality and affordable gear for their adventures.</p>
    </div>
  </div>
</div>

<?php
  include "footer.php";
?>

</body>
</html>
