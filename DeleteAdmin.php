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
$sql ="DELETE FROM `person` WHERE ID_Person =".$deleted;
  
if($conn->query($sql) === TRUE){
    echo '<script> alert("Admin deleted successfully");</script>';
    header("Location:History.php");
}

  ?>
</body>
</html>
