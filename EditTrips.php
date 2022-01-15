<!DOCTYPE html>
<html>
<head>
	<title>Edit Trips</title>
</head>
<body>

		<?php
		$conn= new mysqli("localhost","root","","webproject");
         if($conn -> connect_error)
 	     die("fatal error - cannot connect to DB ");
           $edited=$_GET['id'];
         $s = " SELECT * FROM trips WHERE Trip_Code =".$edited;
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
        echo "<form action='' method='post'>";
        echo "Trip_Price: <input type= 'text'  name= 'Trip_Price'  value=".$Trip_Price."><br>";
        echo "Start_Date: <input type= 'text'  name= 'Start_Date' value=".$Start_Date."><br>";
        echo "End_Date: <input type= 'text'  name= 'End_Date' value=".$End_Date."><br>";
        echo "Description_Trip: <input type= 'text'  name= 'Description_Trip' value=".$Description_Trip."><br>";
        echo "City: <input type= 'text'  name= 'City' value=".$City."><br>";
        echo "Hiking_Place: <input type= 'text'  name= 'Hiking_Place' value=".$Hiking_Place."><br>";
        echo "<input type= 'submit' id='submit' name= 'submit'  value= 'Edit Trip' ><br>";
        echo"</form>";
        if(isset($_POST['submit'])){
            $Trip_Price=$_POST['Trip_Price'];
            $Start_Date=$_POST['Start_Date'];
            $End_Date=$_POST['End_Date'];
            $City=$_POST['City'];
            $Hiking_Place=$_POST['Hiking_Place'];
            $Description_Trip=$_POST['Description_Trip'];

         $sql="UPDATE `trips` SET `Trip_Price`='$Trip_Price',`Start_Date`='$Start_Date',`End_Date`='$End_Date',`Description_Trip`='$Description_Trip',`City`='$City',`Hiking_Place`='$Hiking_Place' WHERE Trip_Code ='".$edited."'" ;
           echo $Trip_Code;
       

         $result=mysqli_query($conn,$sql);
           if($result){
            header("Location:Trips.php");
        }
        }
        $conn->close();
		?>
		
	
  
</body>
</html>