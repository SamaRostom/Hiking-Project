<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

	<title>About Us</title>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<style>
	@import url('https://fonts.googleapis.com/css2?family=Overlock&display=swap');
	*{
		scroll-behavior: smooth;
	}
	body{
		background-color: white;
	}
	h1{
		color: black;
		font-family: "Sofia", sans-serif;
	}
	p{
		color: black;
		font-family: "Overlock", cursive;
		font-size: 20px;
	}
	img{
		background-size: cover;
	}

.container {
  position: relative;
  text-align: center;
  color: white;
}
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>

</head>
<body>
	<?php
// session_start();
include "Menu.php"; 
?>
<br><br>
<!-- <img src="hiking2.jpg"></img> -->

<center>

<div class="container">
  <img src="hiking2.jpg" style="width:100%;">
  <div class="centered">
<h1>Who we are ?</h1>
<p><b>
We believe that it’s in the wild, untamed and natural places that we find our best selves, so our purpose is to awaken a lifelong love of the outdoors, for all.
</b>
</p>
<p>
<b>
Since 1938, we have been your local outdoor co-op, working to help you experience the transformational power of nature. We bring you top-quality gear and apparel, expert advice, rental equipment, inspiring stories of life outside and outdoor experiences to enjoy alone or share with your friends and family. And because we have no shareholders, with every purchase you make with REI, you are choosing to steward the outdoors, support sustainable business and help the fight for life outside.

So whether you’re new to the outdoors or a seasoned pro, we hope you’ll join us.
</b>
</p>

<h1>Our history: It all started with an ice axe</h1>
<p>
<b>
	We’ve been your outdoor co-op for 82 years. REI was founded in 1938 when a group of 23 climbing friends, united by their love for the outdoors, decided to source quality and affordable gear for their adventures.<br>
	<!-- <a href='ReadAbout.php'>Read about how it all started.</a><br><br> -->

Today the REI community has 20 million lifetime members, nearly 15,000 employees and 168 locations in 39 states and the District of Columbia.<br><br>

While much has changed since REI’s beginnings, our passion for life outside lives on in everything we do.
</b>
</p>

<h1>Co-op: A different kind of company</h1>
<p>
<b>
Being a member-owned co-operative allows us to focus on shared values, not share value.<br><br>

Annually, more than 70 percent of our annual profits are invested back into the outdoor community through dividends to REI members, employee profit-sharing and retirement, and investments in nonprofits dedicated to the outdoors.<br><br>

<a href='Gallery.php'>#OptOutside</a> We believe in putting purpose before profits. More than 700 organizations and millions of people have joined us. We hope you will, too.<br><br>
</b>
</p>
</center>
</div>
</div>

</body>
</html>