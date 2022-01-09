<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	
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
        	margin-top: -200px;
        	font-size: 25px;
        }
	</style>
</head>
<body>
<!-- <script>
	var loadFile = function (event) {
  	var image = document.getElementById("output");
  	image.src = URL.createObjectURL(event.target.files[0]);
};
</script> -->

	<?php
	session_start();
	    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webproject";

        $conn = new mysqli($servername, $username, $password, $dbname);



	    echo "<form action='' method='post'>";
 	  	echo "Username: <input type= 'text'  name= 'Username'  value=".$_SESSION['Username']."><br>";
		echo "Email: <input type= 'text'  name= 'Email' value=".$_SESSION['Email']."><br>";
		echo "City: <input type= 'text'  name= 'City' value=".$_SESSION['City']."><br>";
		echo "Gender: <input type= 'text'  name= 'Gender' value=".$_SESSION['Gender']."><br>";
		echo "Phone_Number: <input type= 'text'  name= 'Phone_Number' value=".$_SESSION['Phone_Number']."><br>";
		echo "Emergency_Number: <input type= 'text'  name= 'Emergency_Number' value=".$_SESSION['Emergency_Number']."><br>";
		echo "<input type= 'submit'  name= 'submit'  value= 'Submit' ><br>";
		echo"</form>";

		if(isset($_POST['submit'])){
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
		$sql="UPDATE person SET Username = '$Username', Email ='$Email', City = '$City', Gender = '$Gender', Phone_Number = '$Phone_Number', Emergency_Number = '$Emergency_Number' WHERE ID_Person='".$_SESSION['ID_Person']."'";

		$result=mysqli_query($conn,$sql);
		if($result){
		header("Location:Profile.php");
		}
	}	
	?>

<!-- <div class="profile-pic">
    <label class="-label" for="file">
       <span class="glyphicon glyphicon-camera"></span>
       <span>Change Image</span>
    </label>
   <input id="file" type="file" onchange="loadFile(event)"/>
   <img src="images/img_avatar.png" alt="Avatar" class="avatar">
</div> -->
	
	
</body>
</html>