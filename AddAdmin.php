<!DOCTYPE html>
<html>
<head>
  <title>Add Admin</title>
  <script>
function ShowPassword() {
  var x = document.getElementById("Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
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
if(isset($_POST['Add_Admin'])){

   $sql="INSERT INTO person(Username,Email,Password,ID_Type,City,Gender,Phone_Number, Emergency_Number) VALUES ('".$_POST['Username']."','".$_POST["Email"]."','".$_POST["Password"]."','"."1"."','".$_POST["City"]."','".$_POST["Gender"]."','".$_POST["Phone_Number"]."','".$_POST["Emergency_Number"]."')";

    if($conn->query($sql) === TRUE){
      echo '<script> alert("Admin Added successfully");</script>';
      header("Location:History.php");
    }
}
  ?>
  <center><h1>Add Admin</h1>
<form method="post" action=""> 
   <input type="text"  placeholder= "Username" name="Username"><br><br>
   <input type="text" placeholder= "Email" name="Email"><br><br>
   <input type="Password" placeholder= "Password" id="Password" name="Password"><br><br>
   <input type="checkbox" onclick="ShowPassword()">Show Password<br><br>
   <input type="text" placeholder= "City" name="City"><br>
   <h3>Choose the gender:</h3>  
   <input type="radio" name="Gender" <?php if (isset($Gender) && $Gender == "Male") echo "checked";?> value = "Male"> Male
   <input type="radio" name="Gender" <?php if (isset($Gender) && $Gender == "Female") echo "checked";?> value = "Female"> Female<br><br>
   <input type="text" placeholder= "Phone Number" name="Phone Number"><br><br>
   <input type="text" placeholder= "Emergency Number" name="Emergency Number"><br><br>
   <input type="submit" value="Add" name="Add_Admin">
   <input type="reset">

</form>
</center>
</body>
</html>
