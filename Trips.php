<!DOCTYPE html>
<html>
<head>
  <title>Trips</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style type="text/css">

      body{
         background-image: url("images/w.jpg");
         background-size: 100% 100%;
            background-repeat: no-repeat;   
         text-align: center;
        
      }
      
/*.container{
       padding: 0 15px;
        content: " ";
        clear: both;
        display: table;
         border-radius: 25px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 100, 0.2);
        max-width: 455px;
        margin: auto;
        text-align: center;
        
}*/
#equipcard{
  background-color: white;
  width: 30em;
  height: 35em;
  /*lw 3ayza shadow fo2 aw ta7t yeb2a awel value n7otaha be ay rakham ana 3ayzah w ymen aw shemal yeb2a tany value (+ve or -ve)->for the direction talet value hya el blur w rabe3 value color of shadow*/
  /*rgb-> red green blue, a-> for opacity of color*/
  box-shadow: 0 5px 25px rgba(1 1 1 / 9%);
  /*border lines teb2a curved*/
  /*border-radius: 10px;*/
  padding: 10px;
  margin: auto;
  transition: 0.7s ease;
  text-align: center;
}
 #equipcard:hover{
  /*color: white;*/
  transform: scale(0.9);
}
        
#addtocartbtn{
  background-color: #2a718e;
  color: white;
}
      
.price {
      color: grey;
      font-size: 22px;
}
#addequipbtn{
  text-align: right;
  font-size: 20px;
}

    </style>
</head>
<body>
  

<?php
include "navbar.php";
if($_SESSION['ID_Type'] == "1"){
  ?>
   <br><br>
   
    <a href="AddTrip.php" class="btn ntm-danger mt-3" id="addequipbtn">
            <i class="fas fa-plus-square"></i> New
          </a>
     <br><br>
  
     <div class="row">
      <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webproject";

$conn = new mysqli($servername, $username, $password, $dbname);
$s = " SELECT * FROM trips" ;
$result = mysqli_query ($conn ,$s);
while($data = $result->fetch_array(MYSQLI_ASSOC)){
  $t = $data['Trip_Image'];
  $tp= $data['Trip_Price'];
  $c= $data['City'];
  $hp=$data['Hiking_Place'];
  $std=$data['Start_Date'];
  $end=$data['End_Date'];
  $d=$data['Description_Trip'];
?>
   <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100"  id="equipcard">
        <a href="#"><img src="<?php echo $t ?>" width=100%  class="card-img-top" /></a>
        
          <h4 class="card-title text-primary"><b>Place: </b><?php echo $hp; ?></h4>
          <h4 class="card-title text-primary"><b>In </b><?php echo $c; ?></h4>
          
          <h4 class="price"><?php echo $tp." L.E"; ?></h4>
          
          <h4 class="card-title text-primary"><b>From </b><?php echo $std; ?></h4>
          <h4 class="card-title text-primary"><b>to </b><?php echo $end; ?></h4>

          <a href="TripInfo.php?id=<?php echo $data['Trip_Code']; ?>"class="btn ntm-danger mt-3">
          More <i class="fas fa-angle-double-right"></i></a>
        <div style="text-align: center">
      <a href="DeleteTrips.php?id=<?php echo $data['Trip_Code']; ?>" class="btn ntm-danger mt-3">
            <i class="fas fa-trash-alt"></i></a>
         <a href="EditTrips.php?id=<?php echo $data['Trip_Code']; ?>"  class="btn ntm-danger mt-3">
          <i class="fas fa-edit"></i></a>
     </div>
      </div>

    </div>
    

<?php
}
$conn->close();

 }
   

  else if ($_SESSION['ID_Type'] == "2") {
  ?>
  <!-- <form class="form-inline" method = "POST" action = "">
	  <input type="text" name = "name" placeholder="Search" class="form-control">
	  <input type="submit" value='Search' name='search' class="btn btn-default">
  </form> -->
  <br><br>
     <div class="row">
      <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webproject";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST["add"])){
$sql = " SELECT * FROM trips WHERE Trip_Code='".$_GET["id"]."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result); 
if($row){
  $Trip_Name =$row['Hiking_Place'];
}
  if (isset($_SESSION["cart"])){
      $item_array_id = array_column($_SESSION["cart"],"Trip_Code");
      if (!in_array($_GET["id"],$item_array_id)){
          $count = count($_SESSION["cart"]);
          $item_array = array(
              'Trip_Code' => $_GET["id"],
              'ID_Person' => $_POST["ID_Person"],
              'Trip_Price' => $_POST["Trip_Price"],
              'Trip_Name' => $Trip_Name,
          );
          $_SESSION["cart"][$count] = $item_array;
          echo '<script>window.location="Trips.php"</script>';
      }else{
          echo '<script>alert("Trip is already Added to Cart")</script>';
          echo '<script>window.location="Trips.php"</script>';
      }
  }else{
      $item_array = array(
        'Trip_Code' => $_GET["id"],
        'ID_Person' => $_POST["ID_Person"],
        'Trip_Price' => $_POST["Trip_Price"],
        'Trip_Name' => $Trip_Name,
      );
      $_SESSION["cart"][0] = $item_array;
  }
}

$s = " SELECT * FROM trips" ;
$result = mysqli_query ($conn ,$s);
while($data = $result->fetch_array(MYSQLI_ASSOC)){
  $Trip_Code=$data['Trip_Code'];
  $t = $data['Trip_Image'];
  $tp= $data['Trip_Price'];
  $c= $data['City'];
  $hp=$data['Hiking_Place'];
  $std=$data['Start_Date'];
  $end=$data['End_Date'];
?>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100"  id="equipcard">
        <a href="#"><img src="<?php echo $t ?>" width=400px height=200px class="card-img-top" /></a>
        <div class="card-body">
          <h4 class="card-title text-primary"><b>Place: </b><?php echo $hp; ?></h4>
          <h4 class="card-title text-primary"><b>In </b><?php echo $c; ?></h4>
          
          <h4 class="price"><?php echo $tp. " L.E"; ?></h4>
          <h4 class="card-title text-primary"><b>From </b><?php echo $std; ?></h4>
          <h4 class="card-title text-primary"><b>to </b><?php echo $end; ?></h4>

          <a href="Rate.php?id=<?php echo $data['Trip_Code']; ?>"class="btn ntm-danger mt-3">
          <i class="fas fa-star-half-alt"></i> Rate Trip</a>
        <br>
         <a href="TripInfo.php?id=<?php echo $data['Trip_Code']; ?>"class="btn ntm-danger mt-3">
          More <i class="fas fa-angle-double-right"></i></a>
        </div>
      
          <form method="post" action="Trips.php?action=add&id=<?php echo $Trip_Code; ?> ">

            <div class="product">
              <input type="hidden" name="ID_Person" value="<?php echo $_SESSION["ID_Person"]; ?>">
              <input type="hidden" name="Trip_Price" value="<?php echo $tp; ?>">
               <input type="submit" name="add"  class="btn btn-success" id="addtocartbtn" value="Add to Cart">
                           
            </div>                
          </form>
      </div>
    </div>
    

<?php
}
$conn->close();

  
}

?>
</div>
<?php
     include "footer.php";
  ?>
</body>
</html>