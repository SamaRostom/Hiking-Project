<!DOCTYPE html>
<html>
<head>
    <title>Trip Info</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<style>
        img{
            
            float: left;
        }
        body{

         background-image: url("images/w.jpg");
         background-size: 100% 100%;
         background-repeat: no-repeat;   
        }

        /* css in case of a short page */
        @media (min-width: 995px) {
        body{
            height:100vh
        }
        .footer{
            position: absolute;
            bottom:0;
        }
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
include "navbar.php";

if($_SESSION['ID_Type'] == "1"){
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webproject";

    $conn = new mysqli($servername, $username, $password, $dbname);
	$Trip_Code = $_GET['id'];
    $s = " SELECT * FROM trips WHERE Trip_Code='".$Trip_Code."'";
    $ss= " SELECT * FROM ratingtrip WHERE Trip_Code='".$Trip_Code."'";
    $result = mysqli_query ($conn ,$s);
    $rresult= mysqli_query ($conn ,$ss);
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
    if ($rresult->num_rows >0) {
        $data=$rresult->fetch_assoc();
        $rating=$data['rating'];
    }
	
?>

    <br><br>
    
    <img src="<?php echo $Trip_Image ?>" style="width:600px;height:600px;margin-right:15px;" /><br>

<h1><b>Trips Highlights</b></h1>
        
        <p  style="float: center;">
    <?php echo "Trip Name: ".$Hiking_Place ?><br>
    <?php echo "City: ".$City ?><br>
    <?php echo "Trip Price: ".$Trip_Price ?><br>
    <?php echo "Start Date: ".$Start_Date ?><br>
    <?php echo "End Date: ".$End_Date ?><br>
    <?php echo "Description: ".$Description_Trip ?><br>
    <?php echo "Rating: ".$rating?><br>
   </p>
          <div style="float: center;">
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
    $ss= " SELECT * FROM ratingtrip WHERE Trip_Code='".$Trip_Code."'";
    $result = mysqli_query ($conn ,$s);
    $rresult= mysqli_query ($conn ,$ss);
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
    if ($rresult->num_rows >0) {
        $data=$rresult->fetch_assoc();
        $rating=$data['rating'];
    }
 
?>
    <br><br>
 <img src="<?php echo $Trip_Image ?>" style="width:500px;height:500px;margin-right:15px;" /><br>
<h1 ><b>Trips Highlights</b></h1>
        <p  class=" try" style="float: center;">
        
    <?php echo "Trip Name: ".$Hiking_Place ?><br>
    <?php echo "City: ".$City ?><br>
    <?php echo "Trip Price: ".$Trip_Price ?><br>
    <?php echo "Start Date: ".$Start_Date ?><br>
    <?php echo "End Date: ".$End_Date ?><br>
    <?php echo "Description: ".$Description_Trip ?><br>
    <?php echo "Rating: ".$rating ?><br>
    </p>
          <!-- <form action="TripInfo.php">
          <button  type="submit" onclick="addarray()">Add Cart</button>
          </form> -->
        
<?php
}
 include "footer.php";
?>	

</body>
</html>
