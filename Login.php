<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style/login.css">
    <style>
		/* css in case of a short page */
		@media (min-width: 995px) {
		body{
			height:100vh
		}
		.footer{
			position: absolute;
			bottom:0;
		}
	}
	</style>
	<script>
	// 	function validate(form){
	// 		console.log(form)
	// 		console.log(form.Email)
    // 	fail="";
    // 	if(form.Email.value ==""){
    // 		fail+="Please fill the email field\n";
    // 	}
    // 	if(form.Password.value ==""){
    // 		fail+="Please fill the password field\n";
    // 	}
    // 	if(fail==""){
    // 		return true;
    // 	}
    // 	else{
    // 		alert(fail);
    // 		return false;
    // 	}
    // }
	function validate(form,e){
    	var fail="";
      var alertBox = document.querySelector('.alert')
    		if(form.Email.value ==""){
    		fail+="Please fill the email field\n";
    	}
    	if(form.Password.value ==""){
    		fail+="Please fill the password field\n";
    	}
    	if(fail==""){
    		return true;
    	}
    	else{
        alertBox.querySelector('span').innerText = fail
    		alertBox.style.display = 'block';
            setTimeout(function(){alertBox.style.display = 'none';},5000)
            e.preventDefault()
    	}
    }
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
</head>
<body>
<?php
session_start();
include "footer.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";

$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['Submit'])){
	$sql="SELECT * FROM person WHERE Email='".$_POST['Email']."' AND Password='".$_POST['Password']."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result); 
    if($row){
    	$_SESSION['ID_Person']=$row[0];
		$_SESSION['Username']=$row[1];
		$_SESSION['Email']=$row[2];
		$_SESSION['Password']=$row[3];
		$_SESSION['ID_Type']=$row[4];
		$_SESSION['City']=$row[5];
		$_SESSION['Gender']=$row[6];
		$_SESSION['Phone_Number']=$row[7];
		$_SESSION['Emergency_Number']=$row[8];
		header("Location:Home.php");
    } 
    else {
		echo "Invalid Email or Password";
	}
}

?>
<div class='col-10 col-md-7 col-lg-6 col-xl-5 m-auto form-container px-5 py-4 my-5'>
        <h1 class='display-6 text-center'>Log in</h1>
		<p class='text-center'>Dive in adventures with us</p>
<form method="POST" action="" onsubmit="validate(this,event)">
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-at"></i></span>
        <input type="email" class="form-control" placeholder="Insert your email" name="Email">
    </div>
	<div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control" placeholder="Insert your password" name="Password">
        <div class='position-absolute showBtn' onclick="ShowPassword()"><i class='far fa-eye'></i></div>
    </div>
	<div class="alert alert-warning" role="alert">
    <i class="fas fa-exclamation-triangle"></i> 
    <span></span>
</div>
	<div class='mt-4 text-center'>
    <input type="submit" class='btn btn-primary px-5 mb-3' value="Log in" name="Submit">
   <input type="reset" class='btn btn-outline-dark px-5 ms-2 mb-3'>
   <p>Don't have an account? <a class='linkClick' href="SignUp.php">Sign up for free</a></p>
  </div>
</form>
</div>
</body>
</html>