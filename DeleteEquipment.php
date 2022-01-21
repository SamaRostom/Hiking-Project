<!DOCTYPE html>
<html>
<head>
  <title>Delete Equipment</title>
</head>
<body>
  <?php
  include 'Menu.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";

$conn = new mysqli($servername, $username, $password, $dbname);

$deleted=$_GET['id'];
$sql ="DELETE FROM `equipment` WHERE Item_Code =".$deleted;

if($conn->query($sql) === TRUE){
    echo '<script> alert("Admin deleted successfully");</script>';
    header("Location:Equipment.php");
}
  ?>
</body>
</html>
