<!DOCTYPE html>
<html>
<head>
    
	<style>
        #tripimage{
            width:700px;
            height:500px;
        }
    </style>
    <script>
        var Cart;
        function addarray(){
            //alert("hi");
            //Cart.push(Trip_Code);
        }
    </script>
</head>
<body>
<?php
include "Menu.php";

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
    <img src="<?php echo $Trip_Image ?>" id="tripimage" />

    <?php echo "Trip Name: ".$Hiking_Place ?><br>
    <?php echo "City: ".$City ?><br>
    <?php echo "Trip Price: ".$Trip_Price ?><br>
    <?php echo "Start Date: ".$Start_Date ?><br>
    <?php echo "End Date: ".$End_Date ?><br>
    <?php echo "Description: ".$Description_Trip ?><br>
   
          <a href="DeleteTrips.php?id=<?php echo $data['Trip_Code']; ?>" class="btn ntm-danger mt-3"><i class="btn btn-default" >Delete</i></a>
         <a href="EditTrips.php?id=<?php echo $data['Trip_Code']; ?>" class="btn ntm-danger mt-3"><i class="btn btn-default" >Edit</i></a>
        
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
    <img src="<?php echo $Trip_Image ?>" id="tripimage" />

    <?php echo "Trip Name: ".$Hiking_Place ?><br>
    <?php echo "City: ".$City ?><br>
    <?php echo "Trip Price: ".$Trip_Price ?><br>
    <?php echo "Start Date: ".$Start_Date ?><br>
    <?php echo "End Date: ".$End_Date ?><br>
    <?php echo "Description: ".$Description_Trip ?><br>
    
          <form action="TripInfo.php">
          <button type="submit" id="addcart" onclick="addarray()">Add Cart</button>
          </form>
        
<?php
}
?>	

</body>
</html>