<!DOCTYPE html>
<html>
<head>
	<title>Add Trips</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    input{
            margin-bottom: 50px;
            border-radius: 5px;
        }
        body{
            background-image: url("images/j.jpg");
            background-size: 100% 100%;
            background-repeat: no-repeat;   
           
        }
        .container{
            background-color: #ffffffad;
        }
  </style>
</head>
<body>
	<?php
  include "navbar.php";
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
	
  <div class='col-10 col-md-8 col-lg-6 container p-4 my-5 mx-auto'>
        <h1 class='display-6 mb-3 text-center'><b>Add Trips</b></h1>
<form method="post" action="" enctype="multipart/form-data"> 
 The Price: <input type="text" class='form-control' placeholder= "Price" name="TripPrice"><br><br>

  The Start Date: <input type="text" class='form-control' placeholder= "start date" name="StartDate"><br><br>

  The End Date: <input type="text" class='form-control' placeholder= "end date" name="EndDate"><br><br>

   The Description: <input type="text" class='form-control' placeholder= "description trip" name="DescriptionTrip"><br><br>

   The City: <input type="text" class='form-control' placeholder= "city" name="HikingCity"><br><br>

   The Hiking Place:  <input type="text" class='form-control' placeholder= "Hiking place" name="HikingPlace"><br><br>
    Image: <input type="file" class='form-control' name="Trip_Img" id="Trip_Img" ><br><br>
   <div style='text-align:center'><input type='submit' class='btn btn-primary px-5 mt-4' name='submit' value='Add Trip'>
        <input type='button' class='btn btn-outline-dark px-5 ms-3 mt-4' onclick='history.back();' value='Reset'></div>

 </div>

</form>

</body>
<?php include('footer.php') ?>
</html>