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
* {
  box-sizing:border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.container {
  padding: 64px;
}

.row:after {
  content: "";
  display: table;
  clear: both
}

.column-66 {
  float: left;
  width: 66.66666%;
  padding: 20px;
}

.column-33 {
  float: left;
  width: 33.33333%;
  padding: 20px;
}

.large-font {
  font-size: 48px;
}

.xlarge-font {
  font-size: 64px
}

.button {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  background-color: #04AA6D;
}

img {
  display: block;
  height: auto;
  max-width: 100%;
}

@media screen and (max-width: 1000px) {
  .column-66,
  .column-33 {
  width: 100%;
  text-align: center;
  }
  img {
    margin: auto;
  }
  p{
    font-family: 'Montserrat', sans-serif;
  }
}
</style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="column-66">
      <h1 class="xlarge-font">
      <h1 class="large-font" style="color:#2a718e;"><b>Who we are</b></h1>
      <p><span style="font-size:26px">We bring you top-quality gear and apparel, expert advice, rental equipment, inspiring stories of life outside and outdoor experiences to enjoy alone or share with your friends and family. With every purchase you make with Take A Hike, you are choosing to steward the outdoors, support sustainable business and help the fight for life outside.So whether you’re new to the outdoors or a seasoned pro, we hope you’ll join us.
    </div>
    <div class="column-33">
        <img src="images/Bedouin.jpg" width="435" height="571">
    </div>
  </div>
</div>

<div class="container" style="background-color:#f1f1f1">
  <div class="row">
    <div class="column-33">
      <img src="images/hikingtrail.jpg" alt="App" width="335" height="471">
    </div>
    <div class="column-66">
      <h1 class="xlarge-font" style="color:#2a718e;"><b>Our history: It all started with an ice axe</b></h1>
      <!-- <h1 class="large-font" style="color:red;"><b>Our history: It all started with an ice axe</b></h1> -->
      <p><span style="font-size:24px">We’ve been your outdoor co-op for 82 years. Take A Hike was founded in 1938 when a group of 23 climbing friends, united by their love for the outdoors, decided to source quality and affordable gear for their adventures.Today the Take A Hike community has 20 million lifetime members, nearly 15,000 employees and 168 locations in 39 states.</p>
<!--       <button class="button" style="background-color:red">Read More</button> -->
    </div>
  </div>
</div>

</div>
<?php
     include "footer.php";
  ?>
</body>
</html>
