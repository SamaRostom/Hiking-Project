<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="style/profile.css">
</head>
<body>
	<?php
	include "Menu.php";
	$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webproject";

        $conn = new mysqli($servername, $username, $password, $dbname);

		

	$sql = "SELECT * FROM person WHERE ID_Person='".$_SESSION['ID_Person']."'";
		$result = mysqli_query ($conn ,$sql);

        $data = $result->fetch_array(MYSQLI_ASSOC);
		$conn->close();
	?>
<div class='container my-5 row col-10 col-sm-8 col-lg-7 m-auto rounded py-5 shadow'>
	<div class="imgContainer m-auto col-4">
		<img src="<?php echo $data['Profile_Picture']?>" alt="Avatar" class="avatar">
		<div class="editIcon">
			<a href="editProfile.php">
				<i class="fas fa-pen"></i>
			</a>
		</div>
	</div>

	<div class="userDetails col-10 col-lg-6 m-auto offset-lg-1">
	<i class="fas fa-user"></i><?php echo $data['Username'] ?>
<br><hr>
<i class="fas fa-envelope"></i> <?php echo $data['Email'] ?><br><hr>
<i class="fas fa-map-marker-alt"></i> <?php echo $data['City'] ?><br><hr>
<i class="fas fa-venus-mars"></i> <?php echo $data['Gender'] ?><br><hr>
<i class="fas fa-phone-alt"></i> <?php echo $data['Phone_Number'] ?> - </i> <?php echo $data['Emergency_Number'] ?><br><hr>
	    
	</div>
	
	</div>
</body>
</html>