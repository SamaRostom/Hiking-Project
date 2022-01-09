<!DOCTYPE html>
<html>
<head>
	<title>Add Trips</title>
</head>
<body>
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";

$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['Trip_Btn'])){
   $dir="images/";
    $filename=$dir.basename($_FILES['Trip_Img']['name']);
    move_uploaded_file($_FILES['Trip_Img']['tmp_name'], $filename);

	 $sql="INSERT into trips(`Trip_Price`, `Start_Date`, `End_Date`, `Description_Trip`, `City`, `Hiking_Place`, `Trip_Image`) values ('".$_POST['TripPrice']."','".$_POST["StartDate"]."','".$_POST["EndDate"]."','".$_POST["DescriptionTrip"]."','".$_POST["HikingCity"]."','".$_POST["HikingPlace"]."' ,'".$filename."')";
     //echo $sql;
    if($conn->query($sql) === TRUE){
      echo '<script> alert("Trip Added successfully");</script>';
      header("Location:Trips.php");
    }
}
	?>
	<h2>Trip Details</h2>
<form method="post" action="" enctype="multipart/form-data"> 
<input type="text"  placeholder= "Price" name="TripPrice"><br><br>

   <input type="text" placeholder= "start date" name="StartDate"><br><br>

   <input type="text" placeholder= "end date" name="EndDate"><br><br>

   <input type="text" placeholder= "description trip" name="DescriptionTrip"><br><br>

   <input type="text" placeholder= "city" name="HikingCity"><br><br>

   <input type="text" placeholder= "Hiking place" name="HikingPlace"><br><br>
    <input type="file" name="Trip_Img" id="Trip_Img" ><br><br>
   <input type="submit" value="Add Trip" name="Trip_Btn">
   <input type="reset">

</form>

</body>
</html>