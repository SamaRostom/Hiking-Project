<!DOCTYPE html>
<html>
<head>
  <title>Add Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="style/login.css">
  <style>
    body{
      background-image: url("Images/add.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>  
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
  function validate(form,e){
    	var fail="";
      var alertBox = document.querySelector('.alert')
      if(form.Username.value ==""){
    		fail+="Please fill the Username field\n";
    	}
    	if(form.Email.value ==""){
    		fail+="Please fill the email field\n";
    	}
    	if(form.Password.value ==""){
    		fail+="Please fill the password field\n";
    	}
      if(form.Password.value.length<6){
        fail+="The password must be 6-25 character\n";
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
</script>
</head>
<body>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";

$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['Submit'])){

   $sql="INSERT INTO person(Username,Email,Password,ID_Type,City,Gender,Phone_Number, Emergency_Number) VALUES ('".$_POST['Username']."','".$_POST["Email"]."','".$_POST["Password"]."','"."1"."','".$_POST["City"]."','".$_POST["Gender"]."','".$_POST["Phone_Number"]."','".$_POST["Emergency_Number"]."')";

    if($conn->query($sql) === TRUE){
      echo '<script> alert("Admin Added successfully");</script>';
      header("Location:History.php");
    }
}
  ?>
  <div class='col-10 col-md-7 col-lg-6 col-xl-5 m-auto form-container px-5 py-4 my-5'>
        <h1 class='display-6 text-center'>Add Admin</h1>
<form action="" method="post" onsubmit="validate(this,event)">
    <div class="input-group mt-4 mb-3">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Username" name="Username">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-at"></i></span>
        <input type="email" class="form-control" placeholder="Email" name="Email">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control" placeholder="Password" name="Password">
        <div class='showBtn' onclick="ShowPassword()"><i class='far fa-eye'></i></div>
    </div>
    <select class="form-select" name='City'>
        <option selected disabled hidden>Choose a city</option>
        <option value="Cairo">Cairo</option>
        <option value="Alexandria">Alexandria</option>
        <option value="Luxor">Luxor</option>
        <option value="Aswan">Aswan</option>
        <option value="Asyut">Asyut</option>
        <option value="Sohag">Sohag</option>
        <option value="Port Said">Port Said</option>
        <option value="Behira">Behira</option>
        <option value="Faiyum">Faiyum</option>
        <option value="Giza">Giza</option>
        <option value="Ismailia">Ismailia</option>
        <option value="Kafr El Sheikh">Kafr El Sheikh</option>
        <option value="Red Sea">Red Sea</option>
        <option value="Matruh">Matruh</option>
    </select>
    <p class='mt-3 mb-2'>Choose the gender:</p>  
    <div class='mb-2'><input class="form-check-input" type="radio" name="Gender" id='male' value="Male" checked>
      <label class="form-check-label" for="male">Male</label>
    </div>
    <div><input class="form-check-input" type="radio" name="Gender" id='female' value="Female">
      <label class="form-check-label" for="female">Female</label>
    </div>
    <p class='mt-3 mb-2'>Insert contact info:</p>
    <input type="number" class="form-control d-sm-inline mb-3" placeholder="Personal number" name="Phone Number"> 
    <input type="number" class="form-control d-sm-inline mb-3" placeholder="Emergency number" name="Emergency Number"> 
    
    <div class="alert alert-warning" role="alert">
    <i class="fas fa-exclamation-triangle"></i> 
    <span></span>
</div>
    <div class='mt-4 text-center'>
    <input type="submit" class='btn btn-primary px-5 mb-3' value="Add" name="Submit">
   <input type="reset" class='btn btn-outline-dark px-5 ms-2 mb-3'>
  </div>
   
</form>
</body>
</html>
