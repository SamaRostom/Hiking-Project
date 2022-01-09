<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
    <!-- <link rel='stylesheet' href='bootstrap.min.css'> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
      body{
          background-image: url("Images/signUp.jpg");
          background-size: cover;
          background-repeat: no-repeat;
      }
        input[type="number"]{
        width:48% !important 
    }
    input[name="Emergency Number"]{
        margin-left: 0.5rem;
    }

      @media (max-width: 580px) {
        input[type="number"]{
        width:100% !important 
    }
    input[name="Emergency Number"]{
        margin-left: 0rem;
    }
      }
    
    .linkClick{
        text-decoration: none;
    }

    .alert{
        display: none;
    }

    .form-container{
        background-color: rgba(255, 255, 255, 0.774);
    }

    .showBtn{
        right:15px;
        top:8px;
        color: grey;
        cursor: pointer;
        z-index: 99999;
    }
  </style>

  <script>
    //   var shown = false;
    //   function showBtn(e){
    //       if(!shown){
    //           e.target.setAttribute('class','far fa-eye-slash')
    //           document.querySelector('input[name="Password"]').setAttribute('type','text')
    //           shown = true
    //       }else{
    //           e.target.setAttribute('class','far fa-eye')
    //           document.querySelector('input[name="Password"]').setAttribute('type','password')
    //           shown = false
    //       }
    //   }
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
			console.log(form)
			console.log(form.Email)
    	fail="";
    	if(form.Email.value =="" || form.Password.value ==""){
    		fail+="Please fill the empty fields";
    	}
    	if(fail==""){
    		return true;
    	}
    	else{
    		document.querySelector('.alert').style.display = 'block';
            setTimeout(function(){document.querySelector('.alert').style.display = 'none';},5000)
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
    $database = "webproject";
   
    //Create a connection 
     $conn = mysqli_connect($servername,$username, $password, $database);


    if(isset($_POST['Submit'])){

    $sql="INSERT into person(Username,Email,Password,ID_Type,City,Gender,Phone_Number, Emergency_Number) values ('".$_POST['Username']."','".$_POST["Email"]."','".$_POST["Password"]."','"."2"."','".$_POST["City"]."','".$_POST["Gender"]."','".$_POST["Phone_Number"]."','".$_POST["Emergency_Number"]."')";

    if($conn->query($sql) === TRUE){
      echo '<script> alert("Signed up successfully");</script>';
      header("Location:Login.php");
    }
}

?>

    <div class='col-10 col-md-7 col-lg-6 col-xl-5 m-auto form-container px-5 py-4 my-5'>
        <h1 class='display-6 text-center'>Sign Up</h1>
   <form action="SignUp.php" method="post" onsubmit="validate(this,event)">
    <div class="input-group mt-4 mb-3">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
        <input type="text" class="form-control" placeholder="Insert your username" name="Username">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-at"></i></span>
        <input type="email" class="form-control" placeholder="Insert your email" name="Email">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control" placeholder="Insert your password" name="Password">
        <div class='position-absolute showBtn' onclick="ShowPassword()"><i class='far fa-eye'></i></div>
    </div>


    <select class="form-select" name='City'>
        <option selected disabled>Choose a city</option>
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


   <p class='mt-3 mb-2'>Select your gender:</p>  
    <div class='mb-2'><input class="form-check-input" type="radio" name="Gender" id='male' value="Male" checked>
    <label class="form-check-label" for="male">
      Male
    </label></div>
    <div><input class="form-check-input" type="radio" name="Gender" id='female' value="Female">
        <label class="form-check-label" for="female">
          Female
        </label></div>
    
    <p class='mt-3 mb-2'>Insert your contact info:</p> 

    <input type="number" class="form-control d-sm-inline mb-3" placeholder="Personal number" name="Phone Number"> 
    <input type="number" class="form-control d-sm-inline mb-3" placeholder="Emergency number" name="Emergency Number"> 


    <div class='mt-4 text-center'>
    <input type="submit" class='btn btn-primary px-5 mb-3' value="Sign Up" name="Submit">
   <input type="reset" class='btn btn-outline-dark px-5 ms-2 mb-3'>
   <p>Already have an account? <a class='linkClick' href="Login.php"> Login </a></p>
  </div>
</form> 
<div class="alert alert-warning" role="alert">
    <i class="fas fa-exclamation-triangle"></i> Please fill the empty fields!
</div>
</div>
</body>
</html>