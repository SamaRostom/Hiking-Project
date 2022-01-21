<!DOCTYPE html>
<html>
<head>
	<title>Equipment</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
	<?php
     	$servername="localhost";
		$username="root";
		$password="";
		$DB="webproject";

	$conn=mysqli_connect($servername,$username,$password,$DB);
	if(!$conn){
		die("Connection Failed<br>");
	}
	else{
		echo "Connected Successfully.<br>";
	}
    
    if(isset($_POST['submit'])){
	$dir="images/";
		$filename=$dir.basename($_FILES['image']['name']);
		move_uploaded_file($_FILES['image']['tmp_name'], $filename);

		$sql="INSERT INTO equipment (Equipment_Name, Product_Type,Item_Price,Brief_Description, Full_Description,Equipment_image)VALUES ('".$_POST['name']."','".$_POST['type']."','".$_POST['price']."','".$_POST['briefdescription']."','".$_POST['fulldescription']."','".$filename."')";

	if($conn->query($sql) === TRUE){
		echo "New record created successfully<br><hr>";
		header("Location:Equipment.php");
	}
	// else{
	// 	echo "Error: ".$sql."<br>".$conn->error;
	// }

	// $result=mysqli_query($conn,$sql);
	
	//$conn->close();
    }
	?>
	<h1>Insert An Item</h1>
	<h2>(Administrator)</h2>
<form method="post" action="" enctype="multipart/form-data">
	<input type="text" name="name" placeholder="Item Name"><br><br>

	<input type="text" name="type" placeholder="Product Type"><br><br>

	<input type="text" name="price" placeholder="Price"><br><br>

	<input type="text" name="briefdescription" placeholder="Brief Description"><br><br>

	<input type="text" name="fulldescription" placeholder="Full Description"><br><br>

	Attach Item's Image<br><input type="file" name="image" id="image"><br><br>

	<input type="submit" name="submit" value="Save">
</form>


</body>
</html>