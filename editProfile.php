<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<style>
		input{
			margin-bottom: 10px;
		}
		body{
			background-image: url("images/edit.png");
			background-size: contain;
			background-repeat: no-repeat;	
			background-position-y: bottom;
			height:100vh;
		}
		.container{
			background-color: #ffffffad;
		}
		.showBtn{
position: absolute;
  right:15px;
  top:8px;
  color: rgb(128, 128, 128);
  cursor: pointer;
  z-index: 99999;
}
		</style>
</head>
<script>
	  function ShowPassword() {
  var pass = document.querySelector('input[name="Password"]');
  var icon = document.querySelector('.showBtn i');
  if (pass.type === "password") {
    pass.type = "text";
    icon.setAttribute('class','far fa-eye-slash');
  } else {
    pass.type = "password";
    icon.setAttribute('class','far fa-eye');
  }

}
</script>
<body>

	<?php
	session_start();
	    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webproject";

        $conn = new mysqli($servername, $username, $password, $dbname);


		echo"<div class='col-10 col-md-8 col-lg-6 container p-4 my-5 mx-auto'>
		<h1 class='display-6 mb-3 text-center'>Edit your Profile</h1>
	    <form action='' method='post' enctype='multipart/form-data'>
		Username: <input type= 'text' class='form-control' name= 'Username'  value=".$_SESSION['Username'].">
		Email: <input type= 'text'  class='form-control' name= 'Email' value=".$_SESSION['Email'].">
		Password:
		<div class='input-group mb-3'>
		<input type= 'password' class= 'form-control' name='Password' value=".$_SESSION['Password'].">
		<div class='showBtn' onclick='ShowPassword()'><i class='far fa-eye'></i></div>
		</div>
		City:<select class='form-select' name='City'>
        <option selected disabled hidden>".$_SESSION['City']."</option>
        <option value='Cairo'>Cairo</option>
        <option value='Alexandria'>Alexandria</option>
        <option value='Luxor'>Luxor</option>
        <option value='Aswan'>Aswan</option>
        <option value='Asyut'>Asyut</option>
        <option value='Sohag'>Sohag</option>
        <option value='Port Said'>Port Said</option>
        <option value='Behira'>Behira</option>
        <option value='Faiyum'>Faiyum</option>
        <option value='Giza'>Giza</option>
        <option value='Ismailia'>Ismailia</option>
        <option value='Kafr El Sheikh'>Kafr El Sheikh</option>
        <option value='Red Sea'>Red Sea</option>
        <option value='Matruh'>Matruh</option>
    </select>
		Gender: <input type= 'text'  class='form-control' name= 'Gender' value=".$_SESSION['Gender'].">
		Phone Number: <input type= 'text'  class='form-control' name= 'Phone_Number' value=".$_SESSION['Phone_Number'].">
		Emergency Number: <input type= 'text'  class='form-control' name= 'Emergency_Number' value=".$_SESSION['Emergency_Number'].">
		Profile Picture: <input type= 'file'  class='form-control' name= 'Profile_Picture' id ='Profile_Picture'>
		<div style='text-align:center'><input type='submit' class='btn btn-primary px-5 mt-4' name='submit' value='Save'>
		<input type='button' class='btn btn-outline-dark px-5 ms-3 mt-4' onclick='history.back();' value='Cancel'></div>
		</form>
		</div>";

		if(isset($_POST['submit'])){

		$dir="images/";
		$filename=$dir.basename($_FILES['Profile_Picture']['name']);
		move_uploaded_file($_FILES['Profile_Picture']['tmp_name'], $filename);

		$Username = $_POST['Username'];
		$_SESSION['Username'] = $Username;
		$Email = $_POST['Email'];
		$_SESSION['Email'] = $Email;
		$Password = $_POST['Password'];
		$_SESSION['Password'] = $Password;
		$City = $_POST['City'];
		$_SESSION['City'] = $City;
		$Gender = $_POST['Gender'];
		$_SESSION['Gender'] = $Gender;
		$Phone_Number = $_POST['Phone_Number'];
		$_SESSION['Phone_Number'] = $Phone_Number;
		$Emergency_Number = $_POST['Emergency_Number'];
		$_SESSION['Emergency_Number'] = $Emergency_Number;
		$ID_Person = $_SESSION['ID_Person'];
		

		$sql="UPDATE person SET Username = '$Username', Email ='$Email', Password ='$Password', City = '$City', Gender = '$Gender', Phone_Number = '$Phone_Number', Emergency_Number = '$Emergency_Number', Profile_Picture = '$filename' WHERE ID_Person='".$_SESSION['ID_Person']."'";

		$result=mysqli_query($conn,$sql);
		if($result){
		header("Location:Profile.php");
		}
	}	
	?>
</body>
<?php include('footer.php') ?>

</html>