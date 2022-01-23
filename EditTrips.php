<!DOCTYPE html>
<html>
<head>
	<title>Edit Trips</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        input{
            margin-bottom: .5rem;
            border-radius: 5px;
        }
        body{
            background-image: url("images/mm.jpg");
            background-size: 100% 100%;
            background-repeat: no-repeat;   
           
        }
       .container{
            background-color: #ffffffad;
        }
       
        </style>
        <script>
            function validate(form,e){
        var fail="";
      var alertBox = document.querySelector('.alert')
      if(form.Trip_Price.value ==""){
            fail+="Please fill the Trip Price field\n";
        }
        if(form.Start_Date.value ==""){
            fail+="Please fill the Start Date field\n";
        }
        if(form.End_Date.value ==""){
            fail+="Please fill the End Date field\n";
        }
        if(form.Description_Trip.value ==""){
        fail+="Please fill the Description Trip field\n";
          }
        if(form.City.value ==""){
        fail+="Please fill the City field\n";
          }
        if(form.Hiking_Place.value ==""){
        fail+="Please fill the Hiking Place field\n";
          }
        if(fail==""){
            return true;
        }
        else{
        alertBox.querySelector('span').innerText = fail
            alertBox.style.display = 'block';
            setTimeout(function(){alertBox.style.display = 'none';},5000)
            e.preventDefault()
        }
    }
        </script>
</head>
<body>

		<?php
        include "navbar.php";
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
         echo"<div class='col-10 col-md-8 col-lg-6 container p-4 my-5 mx-auto'>
        <h1 class='display-6 mb-3 text-center'><b>Edit Trips</b></h1>
        <form action='' method='post' enctype='multipart/form-data' onsubmit= 'validate(this,event)'>

        <form action='' method='post' >
        The Price: <input type= 'text' class='form-control' name= 'Trip_Price'  value=".$Trip_Price.">
        Start Date: <input type= 'text' class='form-control' name= 'Start_Date' value=".$Start_Date.">
        End Date: <input type= 'text' class='form-control' name= 'End_Date' value=".$End_Date.">
        Description: <input type= 'text'  class='form-control' name= 'Description_Trip' value=".$Description_Trip.">
        Hiking City: <input type= 'text' class='form-control' name= 'City' value=".$City.">
        Hiking Place: <input type= 'text' class='form-control' name= 'Hiking_Place' value=".$Hiking_Place.">
        Trip Image: <input type='file' class='form-control' name='Trip_Img' id='Trip_Img' >
        <div class='alert alert-warning' role='alert'>
    <i class='fas fa-exclamation-triangle'></i> 
    <span></span>
</div>
         <div style='text-align:center'><input type='submit' class='btn btn-primary px-5 mt-4' name='submit' value='Edit'>
        <input type='button' class='btn btn-outline-dark px-5 ms-3 mt-4' onclick='history.back();' value='Cancel'></div>

        </form>
        </div>";
        ?>
         
       
       
        <?php
        if(isset($_POST['submit'])){
            $Trip_Price=$_POST['Trip_Price'];
            $Start_Date=$_POST['Start_Date'];
            $End_Date=$_POST['End_Date'];
            $City=$_POST['City'];
            $Hiking_Place=$_POST['Hiking_Place'];
            $Description_Trip=$_POST['Description_Trip'];
            $dir="images/";
            $filename=$dir.basename($_FILES['Trip_Img']['name']);
         move_uploaded_file($_FILES['Trip_Img']['tmp_name'], $filename);

         $sql="UPDATE `trips` SET `Trip_Price`='$Trip_Price',`Start_Date`='$Start_Date',`End_Date`='$End_Date',`Description_Trip`='$Description_Trip',`City`='$City',`Hiking_Place`='$Hiking_Place',`Trip_Image`='$filename' WHERE Trip_Code ='".$edited."'" ;
           
       

         $r=mysqli_query($conn,$sql);
           if($r){
            echo '<script>window.location="Trips.php"</script>';
        }

        }
        $conn->close();
		?>
		
	
  
</body>
<?php include('footer.php') ?>
</html>