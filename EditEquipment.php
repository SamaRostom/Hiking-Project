<!DOCTYPE html>
<html>
<head>
	<title>Edit Trips</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

		<?php
    session_start();
		$servername = "localhost";
        $username = "root";
        $password = "";
        $DB = "webproject";

        $conn = new mysqli($servername, $username, $password, $DB);

echo "<form action='' method='post' enctype='multipart/form-data'>";

echo "Equipment Name: <input type= 'text'  name= 'Equipment_Name'  value=".$_SESSION['Equipment_Name']."><br>";

echo "Item Price: <input type= 'text'  name= 'Item_Price'  value=".$_SESSION['Item_Price']."><br>";

echo "Brief Description: <input type= 'text'  name= 'Brief_Description'  value=".$_SESSION['Brief_Description']."><br>";

echo "Full Description: <input type= 'text'  name= 'Full_Description'  value=".$_SESSION['Full_Description']."><br>";


echo "Equipment's Picture: <input type= 'file' name= 'Equipment_image' id ='Equipment_image'><br>";

echo "<input type= 'submit'  name= 'submit'  value= 'Submit' ><br>";

echo"</form>";

if(isset($_POST['submit'])){

    $dir="images/";
    $filename=$dir.basename($_FILES['Equipment_image']['name']);
    move_uploaded_file($_FILES['Equipment_image']['tmp_name'], $filename);

    $Equipment_Name = $_POST['Equipment_Name'];
    $_SESSION['Equipment_Name'] = $Equipment_Name;

    $Item_Price = $_POST['Item_Price'];
    $_SESSION['Item_Price'] = $Item_Price;

    $Brief_Description = $_POST['Brief_Description'];
    $_SESSION['Brief_Description'] = $Brief_Description;

    $Full_Description = $_POST['Full_Description'];
    $_SESSION['Full_Description'] = $Full_Description;

    $Item_Code = $_SESSION['Item_Code'];

    $sql="UPDATE equipment SET Equipment_Name = '$Equipment_Name', Item_Price ='$Item_Price', Brief_Description = '$Brief_Description',Full_Description = '$Full_Description',Equipment_image = '$filename' WHERE Item_Code='".$_SESSION['Item_Code']."'";
    
    $result=mysqli_query($conn,$sql);
    if($result){
    header("Location:Equipment.php");
    }
  } 
		?>
</body>
</html>