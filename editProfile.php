<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

	<?php
	session_start();
	    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webproject";

        $conn = new mysqli($servername, $username, $password, $dbname);



	    echo "<form action='' method='post' enctype='multipart/form-data'>";

		

 	  	echo "Username: <input type= 'text'  name= 'Username'  value=".$_SESSION['Username']."><br>";
		echo "Email: <input type= 'text'  name= 'Email' value=".$_SESSION['Email']."><br>";
		echo "City: <input type= 'text'  name= 'City' value=".$_SESSION['City']."><br>";
		echo "Gender: <input type= 'text'  name= 'Gender' value=".$_SESSION['Gender']."><br>";
		echo "Phone Number: <input type= 'text'  name= 'Phone_Number' value=".$_SESSION['Phone_Number']."><br>";
		echo "Emergency Number: <input type= 'text'  name= 'Emergency_Number' value=".$_SESSION['Emergency_Number']."><br>";
		echo "Profile Picture: <input type= 'file' name= 'Profile_Picture' id ='Profile_Picture'><br>";
		echo "<input type= 'submit'  name= 'submit'  value= 'Submit' ><br>";
		echo"</form>";


		if(isset($_POST['submit'])){

		$dir="images/";
		$filename=$dir.basename($_FILES['Profile_Picture']['name']);
		move_uploaded_file($_FILES['Profile_Picture']['tmp_name'], $filename);

		$Username = $_POST['Username'];
		$_SESSION['Username'] = $Username;
		$Email = $_POST['Email'];
		$_SESSION['Email'] = $Email;
		$City = $_POST['City'];
		$_SESSION['City'] = $City;
		$Gender = $_POST['Gender'];
		$_SESSION['Gender'] = $Gender;
		$Phone_Number = $_POST['Phone_Number'];
		$_SESSION['Phone_Number'] = $Phone_Number;
		$Emergency_Number = $_POST['Emergency_Number'];
		$_SESSION['Emergency_Number'] = $Emergency_Number;
		$ID_Person = $_SESSION['ID_Person'];
		

		$sql="UPDATE person SET Username = '$Username', Email ='$Email', City = '$City', Gender = '$Gender', Phone_Number = '$Phone_Number', Emergency_Number = '$Emergency_Number', Profile_Picture = '$filename' WHERE ID_Person='".$_SESSION['ID_Person']."'";

		$result=mysqli_query($conn,$sql);
		if($result){
		header("Location:Profile.php");
		}
	}	
	?>
</body>
</html>