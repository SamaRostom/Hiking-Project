<!DOCTYPE html>
<html>
	<head>
		<style>
			.navbar a i,.seperator , .navbar a{
				color: #2a718e !important;
			}
      .logo{
    border-radius: 100%;
    /* border: 5px solid white; */
    width: 53px;
    height: 53px;
}
		</style>
	</head>
<body>
  <?php
   session_start();
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="home.php"><img src="images/Logo.jpg" alt="Logo" class="logo" ></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	  <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link about" href="aboutus.php">About Us</a>
        </li>
		<li class="nav-item">
          <a class="nav-link contact" href="contactus.php">Contact Us</a>
        </li>
		<li class="nav-item">
          <a class="nav-link trips" href="trips.php">Trips</a>
        </li>
		<li class="nav-item">
          <a class="nav-link history" href="history.php">History</a>
        </li>
      </ul>
      <div class="d-flex">
    <a class= "message text-decoration-none me-3" href= 'Messages.php'><i class="far fa-comment"></i>
	  <a class="cart text-decoration-none me-3" href='cart.php'><i class="fas fa-shopping-cart"><span class="badge rounded-pill bg-danger"><?php echo $num_items_in_cart; ?></span></i></a>
	  <a class="profile text-decoration-none me-3" href='profile.php'><i class="fas fa-user-alt"></i></a>
		<a class="text-decoration-none signup me-3" href='signup.php'>Sign up</a>
		<span class='seperator me-3'>|</span>
        <a class="text-decoration-none me-3 signin" href='login.php'>Sign in</a>
        <a class="signout text-decoration-none me-3" href='signout.php'>Sign out</a>
</div>
    </div>
  </div>
</nav>

<?php

if(isset($_SESSION['Username'])){ //if logged in
echo "<script>
console.log('Username: ".$_SESSION['Username']."')
document.querySelector('.signin').style.display = 'none'
document.querySelector('.signup').style.display = 'none'
</script>";
  if($_SESSION['ID_Type'] == "1"){ //Administrator
	//home, profile, about, trips, equipment, contact us, history, sign out
	echo "<script>
	document.querySelector('.cart').style.display = 'none'
	</script>";
  }
  if($_SESSION['ID_Type'] == "2"){ //Hiker
	//home, profile, about, trips, equipment, contact us, cart, sign out
	echo "<script>
	document.querySelector('.history').style.display = 'none'
	</script>";
  }

  if($_SESSION['ID_Type'] == "3"){ //Auditor
	//home, profile, contact us, history, sign out
	echo "<script>
	document.querySelector('.trips').style.display = 'none'
	document.querySelector('.equip').style.display = 'none'
	</script>";
  }

  if($_SESSION['ID_Type'] == "4"){ //HR
	//home, profile, history, sign out
 }
}

//not logged in
else{
	//home, about, login, sign up, contact us, equipment, gallery
	echo "<script>
document.querySelector('.signout').style.display = 'none'
document.querySelector('.profile').style.display = 'none'
document.querySelector('.cart').style.display = 'none'
document.querySelector('.message').style.display = 'none'
</script>";
}
?>
</body>
</html>