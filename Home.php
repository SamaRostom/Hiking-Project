<?php
include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>REI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel='icon' type="image/x-icon" href='images/logo.ico'>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 <style>

@import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Patua+One&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Overlock&family=Waterfall&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Overlock&family=Staatliches&family=Waterfall&display=swap');

body{
	box-sizing: border-box;
	scroll-behavior: smooth;
}
section{
	padding: 100px 200px;
}
.main{
	width: 100%;
	height: 90vh;
	display: flex;
	align-items: center;
	background: url(images/Autumn.jpg) no-repeat;
	background-size: cover;
	background-position: center;
	background-attachment: fixed;
}

.main h2{
	color: white;
	font-size: 4em;
	font-weight: 700;
	font-family: 'Righteous', cursive;
}
.main h3{
	color: white;
	font-size: 2em;
	font-weight: 300;
	font-family: 'Patua One', cursive;
}

#social-icons a{
	color: white;
	font-size: 3em;
	padding-right: 30px;
}

.cards h3{
	width: 100%;
	display: flex;
	font-family: 'Courgette', cursive;
	font-size: 35px;
	justify-content: center;
}
.title{
	width: 100%;
	display: flex;
	font-size: 35px;
	justify-content: center;
	margin-bottom: 30px;
}
.content{
	display: flex;
	justify-content: center;
	flex-direction: row;
}
.card{
	background-color: white;
	/*from em to px (value*16)*/
	width: 21.25em;
	/*lw 3ayza shadow fo2 aw ta7t yeb2a awel value n7otaha be ay rakham ana 3ayzah w ymen aw shemal yeb2a tany value (+ve or -ve)->for the direction talet value hya el blur w rabe3 value color of shadow*/
	/*rgb-> red green blue, a-> for opacity of color*/
	box-shadow: 0 5px 25px rgba(1 1 1 / 15%);
	/*border lines teb2a curved*/
	border-radius: 8px;
	/*lw value wa7da bs yeb2a kol el directions teb2a 25px top bottom right and left*/
	/*padding-> by3mel mesa7a gwa el element nafso ely hwa el card 3andy dlwa2ty
	margin->by3mel el mesa7a ben el elements w ba3daha*/
	padding: 25px;
	margin: 15px;
	
	transition: 0.6s;
}
.card:hover{
	color: white;
	background-color: #2a718e;
	transform: scale(1.1);
}

.icon{
	/*color: black;*/
	font-size: 8em;
	text-align: center;
}
.info{
	text-align: center;
	/*font-family: 'Righteous', cursive;*/
	font-family: 'Didact Gothic', sans-serif;
}
.info h3{
	/*color: black;*/
/*	font-size: 1.2em;
	font-weight: 700;*/
	margin: 10px;
}

#columnvideo video{
	float: left;
}

#columntext h3{
	color: black;
	font-size: 4em;
	font-weight: 700;
	font-family: 'Righteous', cursive;
}
#columntext p{
	color: black;
	font-size: 2em;
	font-weight: 300;
	font-family: 'Patua One', cursive;
}

</style>

</head>
<body>

<section class="main">
<div>
	<center>
	<h2>THE MOUNTAINS</h2>
	<h3>ARE CALLING..AND I MUST GO</h3>
<div class="social-icons" id="social-icons">
	<a href="#github"><i class="fab fa-github"></i></a>
	<a href="#instagram"><i class="fab fa-instagram"></i></a>
	<a href="#facebook"><i class="fab fa-facebook"></i></a>
</div>
</center>
</div>
</section>


<section class="part3">
<div class="row">
  <div id="columnvideo">

  <video width="520" height="440" autoplay muted="1">
  	<source src="images/Egypt.mp4">
  </video>

  </div>
  <div id="columntext">
  	<h3>Hiking Deals</h3>
			<p>Travel Styles collect tours based around common themes together. No matter what kind of traveller you are, we’ve got a tour (or a dozen) that’ll fit you just right.</p>
  </div>
</div>
</section>




<section class="cards" id="services">
<div>
	<h2 class="title">Mountains are the beginnig!</h2>
	<!-- <h3><b>are the beginnig</b></h3> -->
<div class="content">
	
	<div class="card">
		<div class="icon">
			<i class="fas fa-mountain"></i>
		</div>
		<div class="info">
			<h3>Hike Styles</h3>
			<p>Travel Styles collect tours based around common themes together. No matter what kind of traveller you are, we’ve got a tour (or a dozen) that’ll fit you just right.</p>
		</div>
	</div>

	<div class="card">
		<div class="icon">
			<i class="fas fa-map-marked"></i>
		</div>
		<div class="info">
			<h3>Destination</h3>
			<p>Vast, wide, bottomless, and limitless: Welcome to Earth, the universe’s #1 travel destination. There’s more to see, do, touch, smell, and taste on this wondrous</p>
		</div>
	</div>

	<div class="card">
		<div class="icon">
			<i class="fas fa-hiking"></i>
		</div>
		<div class="info">
			<h3>Hiking Deals</h3>
			<p>Travel Styles collect tours based around common themes together. No matter what kind of traveller you are, we’ve got a tour (or a dozen) that’ll fit you just right.</p>
		</div>
	</div>
</div>
</div>
</section>

<?php
include "footer.php";
?>



</body>
</html>