<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<style>
        #tripimage{
            width:50%;
            height:50%;
        }
        body{

         background-image: url("images/w.jpg");
         background-size: 100% 100%;
            background-repeat: no-repeat;   
        }
         .container{
            background-color: #ffffffad;
           
        }


    </style>
    <script>

      
    </script>
</head>
<body>
<?php
include "navbar.php";

if($_SESSION['ID_Type'] == "1"){
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webproject";

    $conn = new mysqli($servername, $username, $password, $dbname);
	$Trip_Code = $_GET['id'];
    $s = " SELECT * FROM trips WHERE Trip_Code='".$Trip_Code."'";
    $result = mysqli_query ($conn ,$s);
	if($result->num_rows >0){
		$data=$result->fetch_assoc();
        $Trip_Image = $data['Trip_Image'];
        $Trip_Price= $data['Trip_Price'];
        $City= $data['City'];
        $Hiking_Place=$data['Hiking_Place'];
        $Start_Date=$data['Start_Date'];
        $End_Date=$data['End_Date'];
        $Description_Trip=$data['Description_Trip'];
	}
	
?>
    <br><br>
    
    <img src="<?php echo $Trip_Image ?>" id="tripimage" /><br>

<div class='col-10 col-md-8 col-lg-3 container p-4 my-3 mx-auto'>
        <h1 class='display-6 mb-3 text-center'><b>Trips Highlights</b></h1>
    <?php echo "Trip Name: ".$Hiking_Place ?><br>
    <?php echo "City: ".$City ?><br>
    <?php echo "Trip Price: ".$Trip_Price ?><br>
    <?php echo "Start Date: ".$Start_Date ?><br>
    <?php echo "End Date: ".$End_Date ?><br>
    <?php echo "Description: ".$Description_Trip ?><br>
   
          <div style="text-align: center">
      <a href="DeleteTrips.php?id=<?php echo $data['Trip_Code']; ?>" class="btn btn-secondary ">Delete</a>
         <a href="EditTrips.php?id=<?php echo $data['Trip_Code']; ?>" class="btn btn-secondary ">Edit</a>
     </div>
<?php
}
 else if($_SESSION['ID_Type'] == "2"){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webproject";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $Trip_Code = $_GET['id'];
    $s = " SELECT * FROM trips WHERE Trip_Code='".$Trip_Code."'";
    $result = mysqli_query ($conn ,$s);
    if($result->num_rows >0){
        $data=$result->fetch_assoc();
        $Trip_Image = $data['Trip_Image'];
        $Trip_Price= $data['Trip_Price'];
        $City= $data['City'];
        $Hiking_Place=$data['Hiking_Place'];
        $Start_Date=$data['Start_Date'];
        $End_Date=$data['End_Date'];
        $Description_Trip=$data['Description_Trip'];
    }
 
?>
    <br><br>
<div class="col-sm-15">
    <img src="<?php echo $Trip_Image ?>" id="tripimage" />
    </div>
<div class='col-10 col-md-8 col-lg-3 container p-4 my-3 mx-auto'>
        <h1 class='display-6 mb-3 text-center'><b>Trips Highlights</b></h1>
    <?php echo "Trip Name: ".$Hiking_Place ?><br>
    <?php echo "City: ".$City ?><br>
    <?php echo "Trip Price: ".$Trip_Price ?><br>
    <?php echo "Start Date: ".$Start_Date ?><br>
    <?php echo "End Date: ".$End_Date ?><br>
    <?php echo "Description: ".$Description_Trip ?><br>
    </div>
          <form action="TripInfo.php">
            <div style='text-align:center'>
          <button  type="submit" id="addcart" onclick="addarray()">Add Cart</button>
          </div>
          </form>
        
<?php
}
include "footer.php";
?>	

</body>
</html>