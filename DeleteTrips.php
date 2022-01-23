<!DOCTYPE html>
<html>
<head>
  <title>Delete Admin</title>
</head>
<body>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";

$conn = new mysqli($servername, $username, $password, $dbname);

$deleted=$_GET['id'];
$sql ="DELETE FROM `trips` WHERE Trip_Code =".$deleted;
  
if($conn->query($sql) === TRUE){
    echo '<script> alert("Admin deleted successfully");</script>';
    header("Location:Trips.php");
}

  ?>
</body>
</html>
