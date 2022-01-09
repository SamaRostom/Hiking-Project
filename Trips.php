<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>
  <script>
    function addtosession(){
      $_SESSION['Trip_Image'] = $t;
      $_SESSION['Trip_Price'] = $tp;
            $_SESSION['City'] = $c;
            $_SESSION['Description_Trip']=$d;
            $_SESSION['Hiking_Place'] = $hp;
            $_SESSION['Start_Date'] = $std;
            $_SESSION['End_Date'] = $end;

    }
  </script>

<?php
include "Menu.php";
if($_SESSION['ID_Type'] == "1"){
  ?>
   <br><br>
    <form method="post" action="AddTrip.php"> <input type="submit" name="addtrip" value="Add Trip"></form>
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
      <div class="card h-100"> 
        <a href="#"><img src="<?php echo $t ?>" width=400px height=200px class="card-img-top" /></a>
        <div class="card-body">
          <h4 class="card-title text-primary"><b>Place: </b><?php echo $hp; ?></h4>
          <h4 class="card-title text-primary"><b>Price: </b><?php echo $tp; ?></h4>
          <h4 class="card-title text-primary"><b>Start date: </b><?php echo $std; ?></h4>
          <h4 class="card-title text-primary"><b>End date: </b><?php echo $end; ?></h4>
          <h4 class="card-title text-primary"><b>City: </b><?php echo $c; ?></h4>

          <a href="TripInfo.php?id=<?php echo $data['Trip_Code']; ?>" class="btn ntm-danger mt-3">See more</a>
        </div>
         <a href="DeleteTrips.php?id=<?php echo $data['Trip_Code']; ?>" class="btn ntm-danger mt-3"><i class="btn btn-default" >Delete</i></a>
         <a href="EditTrips.php?id=<?php echo $data['Trip_Code']; ?>" class="btn ntm-danger mt-3"><i class="btn btn-default" >Edit</i></a>
        <!-- <form >
         
          <button type="submit" formaction="EditTrips.php"id="editTrip">Edit Trip</button>
          </form> -->
      </div>
    </div>
    

<?php
}
$conn->close();

 }
   
 
  else if ($_SESSION['ID_Type'] == "2") {
  ?>
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
  $Trip_Code=$data['Trip_Code'];
  $t = $data['Trip_Image'];
  $tp= $data['Trip_Price'];
  $c= $data['City'];
  $hp=$data['Hiking_Place'];
  $std=$data['Start_Date'];
  $end=$data['End_Date'];
?>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100"> 
        <a href="#"><img src="<?php echo $t ?>" width=400px height=200px class="card-img-top" /></a>
        <div class="card-body">
          <h4 class="card-title text-primary"><b>Place: </b><?php echo $hp; ?></h4>
          <h4 class="card-title text-primary"><b>Price: </b><?php echo $tp; ?></h4>
          <h4 class="card-title text-primary"><b>Start date: </b><?php echo $std; ?></h4>
          <h4 class="card-title text-primary"><b>End date: </b><?php echo $end; ?></h4>
          <h4 class="card-title text-primary"><b>City: </b><?php echo $c; ?></h4>
         <a href="TripInfo.php?id=<?php echo $data['Trip_Code']; ?>" class="btn ntm-danger mt-3">See more</a>
        </div>
        <script>
        // var Cart=[];
        var Cart=new Array();
        function addarray(Trip_Code){
            //alert("hi");
            Cart.push(Trip_Code);
            alert(Cart);
        }
    </script>
        <form >
          <button type="submit" formaction="" id="addcart" onclick="addarray('<?php  echo $data['Trip_Code'] ?>')">Add Cart</button>
          </form>
      </div>
    </div>
    

<?php
}
$conn->close();

  
}

?>
</div>
</body>
</html>