<!DOCTYPE html>
<html>
<head>
	<title>e</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<script>
	//a3mel edit: kol haga hatetbe3
  function addtosession(){
    $_SESSION['Equipment_Name'] = $e;
    $_SESSION['Item_Price'] = $ep;
    $_SESSION['Brief_Description'] = $c;
    $_SESSION['Equipment_image'] = $i;
    }
  </script>

<?php
include "Menu.php";
if($_SESSION['ID_Type'] == "1"){
  ?>
   <br><br>
<form method="post" action="AddEquipment.php"> <input type="submit" name="addequipment" value="Add Equipment"></form>
     <br><br>
     <div class="row">

<?php
 	$servername="localhost";
	$username="root";
	$password="";
	$DB="hiking";

//Connection to database
	$conn=mysqli_connect($servername,$username,$password,$DB);
	if(!$conn){
		die("Connection Failed<br>");
	}
	$s="SELECT * FROM equipment";
	$res=mysqli_query($conn,$s);

while($data = $res->fetch_array(MYSQLI_ASSOC)){
	$e = $data['Equipment_Name'];
	$ep= $data['Item_Price'];
	$c= $data['Brief_Description'];
	$i= $data['Equipment_image'];
?>
<div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100"> 
        <a href="#"><img src="<?php echo $i ?>" width=200px height=200px class="card-img-top" /></a>
        <div class="card-body">
          <h4 class="card-title text-primary"><b>Equipment: </b><?php echo $e; ?></h4>
          <h4 class="card-title text-primary"><b>Price: </b><?php echo $ep; ?></h4>
          <h4 class="card-title text-primary"><b>Description: </b><?php echo $c; ?></h4>
          <!-- <a href="TripInfo.php">See more</a> -->
        </div>
        <div class="card-footer">
          	<form class="form-submit">
                <button id="deleteEquipment" class="btn btn-success btn-md">Delete Equipment</button>
          	<button id="editEquipment" class="btn btn-success btn-md">Edit Equipment
          </form>
        </div>
      </div>
    </div>

<?php
	}
$conn->close();
}

else if($_SESSION['ID_Type'] == "2"){
  ?>
   <br><br>
     <div class="row">

<?php
 	$servername="localhost";
	$username="root";
	$password="";
	$DB="hiking";

//Connection to database
	$conn=mysqli_connect($servername,$username,$password,$DB);
	if(!$conn){
		die("Connection Failed<br>");
	}
	$s="SELECT * FROM equipment";
	$res=mysqli_query($conn,$s);

while($data = $res->fetch_array(MYSQLI_ASSOC)){
	$e = $data['Equipment_Name'];
	$ep= $data['Item_Price'];
	$c= $data['Brief_Description'];
	$i= $data['Equipment_image'];
?>
<div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100"> 
        <a href="#"><img src="<?php echo $i ?>" width=200px height=200px class="card-img-top" /></a>
        <div class="card-body">
          <h4 class="card-title text-primary"><b>Equipment: </b><?php echo $e; ?></h4>
          <h4 class="card-title text-primary"><b>Price: </b><?php echo $ep; ?></h4>
          <h4 class="card-title text-primary"><b>Description: </b><?php echo $c; ?></h4>
          <!-- <a href="TripInfo.php">See more</a> -->
        </div>
        <div class="card-footer">
          	<form class="form-submit" onsubmit="addtosession()" action="EquipmentInfo.php">
                <button id="addtocart" class="btn btn-success btn-md">Add To Cart</button>
                <input type="submit" value="View" name="view"><br><br>
          </form>
        </div>
      </div>
    </div>

<?php
		}
$conn->close();
	}
?>

</body>
</html>