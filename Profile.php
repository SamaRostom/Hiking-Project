<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.avatar {
            vertical-align: middle;
            width: 250px;
            height: 250px;
        }
        .p{
        	margin-left: 30px; 
        	margin-top: 40px;
        }
        .p1{
        	margin-left: 400px; 
        	margin-top: -250px;
        	font-size: 25px;
        }
	</style>
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

	<div class="p">
		<img src="images/img_avatar.png" alt="Avatar" class="avatar">
	</div>
	<div class="container">
		<p>Edit:
        <a href="editProfile.php">
          <span class="glyphicon glyphicon-edit"></span>
        </a>
      </p>
	</div>
	<div class="p1">
		<b>Username <?php echo $data['Username'] ?>
<br><br><hr>
		   Email <?php echo $data['Email'] ?><br><br><hr>
		   City <?php echo $data['City'] ?><br><br><hr>
		   Gender <?php echo $data['Gender'] ?><br><br><hr>
		   Phone Number <?php echo $data['Phone_Number'] ?><br><br><hr>
		   Emergency Number <?php echo $data['Emergency_Number'] ?><br><br><hr>
	    </b>
	</div>

	
</body>
</html>