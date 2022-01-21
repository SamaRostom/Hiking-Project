<?php
include'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Equipment</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
	<?php
     	$servername="localhost";
		$username="root";
		$password="";
		$DB="webproject";

	$conn=mysqli_connect($servername,$username,$password,$DB);
	if(!$conn){
		die("Connection Failed<br>");
	}
    
    if(isset($_POST['submit'])){
	$dir="images/";
		$filename=$dir.basename($_FILES['equipimage']['name']);
		move_uploaded_file($_FILES['equipimage']['tmp_name'], $filename);

		$sql="INSERT INTO equipment (Equipment_Name, Product_Type,Item_Price,Brief_Description, Full_Description,Equipment_image)VALUES ('".$_POST['name']."','".$_POST['type']."','".$_POST['price']."','".$_POST['briefdescription']."','".$_POST['fulldescription']."','".$filename."')";

	if($conn->query($sql) === TRUE){
		header("Location:Equipment.php");
	}
  }
	?>

<div class='col-10 col-md-7 col-lg-6 col-xl-5 m-auto form-container px-5 py-4 my-5'>
        <h1 class='display-6 text-center'>Insert Equipment</h1>
 <form action="" method="post" enctype="multipart/form-data">    
	<div class="input-group mt-4 mb-3">
        <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
        <input type="text" class="form-control" placeholder="Item Name" name="name">
    </div>
    
   	<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Product Type" name="type">
    </div>

   <!--  <div>
    <select class="form-select" name='type'>
        <option selected disabled hidden>Choose Category</option>
        <option value="boots">Boots</option>
        <option value="backpack">BackPack</option>
        <option value="clothes">Clothes</option>
    </select>
    </div>
    <br>--> 

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Brief Description" name="briefdescription">
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Full Description" name="fulldescription">
    </div>
    <div class="input-group mb-3 mb-2">
        <input type="text" class="form-control" placeholder="Price" name="price">
    </div>
    Attach Item's Image<input type= 'file'  class='form-control' name= 'equipimage' id ='equipimage'>

    <div style='text-align:right'><input type='submit' class='btn btn-primary px-5 mt-4' name='submit' value='Save'>
	<input type='reset' class='btn btn-outline-dark px-5 ms-3 mt-4' value='Reset'></div>

</form>

</body>
</html>
<?php
include'footer.php';
?>