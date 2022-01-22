<!DOCTYPE html>
<html>
<head>
	<title>e</title>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="icon.png">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>

  #equipcard{
  background-color: white;
  /*from em to px (value*16)*/
  /*width: 800px;*/
  width: 30em;
  height: 35em;
  /*lw 3ayza shadow fo2 aw ta7t yeb2a awel value n7otaha be ay rakham ana 3ayzah w ymen aw shemal yeb2a tany value (+ve or -ve)->for the direction talet value hya el blur w rabe3 value color of shadow*/
  /*rgb-> red green blue, a-> for opacity of color*/
  box-shadow: 0 5px 25px rgba(1 1 1 / 9%);
  /*border lines teb2a curved*/
  /*border-radius: 10px;*/
  padding: 10px;
  margin: 5px;
  transition: 0.7s ease;
  text-align: center;
}
 #equipcard:hover{
  /*color: white;*/
  transform: scale(0.9);
}
.card-body{
  margin: 5px;
}
h4{
  color: #2a718e;
}
#addequipbtn{
  text-align: right;
  font-size: 20px;
}
#addtocartbtn{
  background-color: #2a718e;
  color: white;
}
/*#fullcard{
  padding: 10px;
  margin: 20px;
}*/
/*body{
  text-align: center;
}*/
    </style>
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
  include "navbar.php";
 // include "Menu.php";
if($_SESSION['ID_Type'] == "1"){
  ?>
   <br><br>
<!-- <form method="post" action="AddEquipment.php"> <input type="submit" name="addequipment" value="Add Equipment"></form> -->
<a href="AddEquipment.php" class="btn ntm-danger mt-3" id="addequipbtn">
            <!-- <i class="fas fa-plus-circle"></i> -->
            <i class="fas fa-plus-square"></i> New
          </a>
     <br><br>

<?php

 	$servername="localhost";
	$username="root";
	$password="";
	$DB="webproject";

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

<div class="col-lg-4 col-md-6 mb-4" id="fullcard">
      <div class="card h-100"  id="equipcard"> 
        <a href="#"><img src="<?php echo $i ?>" width=200px height=200px class="card-img-top" /></a>
        <div class="card-body">
          <h4 class="card-title text-primary"><b>Equipment: </b><?php echo $e; ?></h4>
          <h4 class="card-title text-primary"><b>Price: </b><?php echo $ep; ?></h4>
          <h4 class="card-title text-primary"><b>Description: </b><?php echo $c; ?></h4>
        </div>

        <a href="EquipmentInfo.php?id=<?php echo $data['Item_Code']; ?>" class="btn ntm-danger mt-3">
          More <i class="fas fa-angle-double-right"></i>
        </a>
          
        <br>
        <a href="DeleteEquipment.php?id=<?php echo $data['Item_Code']; ?>" class="btn ntm-danger mt-3">
          <!-- <i class="btn btn-default" >Delete</i> -->
            <i class="fas fa-trash-alt"></i>
          </a>

         <a href="EditEquipment.php?id=<?php echo $data['Item_Code']; ?>" class="btn ntm-danger mt-3">
          <!-- <i class="btn btn-default" >Edit</i> -->
          <i class="fas fa-edit"></i>
        </a>

       

        <!-- <div class="card-footer">
          	<form class="form-submit">
                <button id="deleteEquipment" class="btn btn-success btn-md">Delete Equipment</button>
          	<button id="editEquipment" class="btn btn-success btn-md">Edit Equipment
          </form>
        </div> -->
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
	$DB="webproject";

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
      <div class="card h-100"  id="equipcard"> 
        <a href="#"><img src="<?php echo $i ?>" width=100% class="card-img-top" /></a>
        <div class="card-body">
          <h4 class="card-title text-primary"><b>Equipment: </b><?php echo $e; ?></h4>
          <h4 class="card-title text-primary"><b>Price: </b><?php echo $ep; ?></h4>
          <h4 class="card-title text-primary"><b>Description: </b><?php echo $c; ?></h4>
        </div>
<a href="EquipmentInfo.php?id=<?php echo $data['Item_Code']; ?>" class="btn ntm-danger mt-3">
  More <i class="fas fa-angle-double-right"></i>
</a>
          <!-- <i class="fas fa-angle-double-right"></i> -->


        <div class="card-footer">
          	<!-- <form class="form-submit" onsubmit="addtosession()" action="EquipmentInfo.php">
                <input type="submit" value="View" name="view"><br><br>
          </form> -->
           <form method="post" action="Equipment.php?action=add&id=<?php echo $Item_Code; ?> ">

            <div class="product">
              <input type="hidden" name="ID_Person" value="<?php echo $_SESSION["ID_Person"]; ?>">
              <input type="hidden" name="Item_Price" value="<?php echo $ep; ?>">
              <input type="submit" name="add"  class="btn btn-success" id="addtocartbtn" value="Add to Cart">
                           
            </div>                
          </form>

        </div>
      </div>
    </div>
  <?php
		}
$conn->close();
	}
  // include "footer.php";
?>
</body>
</html>