<!DOCTYPE html>
<html>
<head>
  <title>Edit Equipment</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <style>
        input{
            margin-bottom: 50px;
        }
        body{
            background-image: url("images/108.jpg");
            background-size: contain;
            background-repeat: no-repeat;   
            background-position-y: bottom;
            height:150vh;
        }
       .container{
            background-color: #ffffffad;
        }
    </style>
</head>
<body>

    <?php
    include "navbar.php";
    $conn= new mysqli("localhost","root","","webproject");
         if($conn -> connect_error)
       die("fatal error - cannot connect to DB ");
          $edited=$_GET['id'];
          $s = " SELECT * FROM equipment WHERE Item_Code =".$edited;
          $result = mysqli_query ($conn ,$s);
           
        if($result->num_rows >0){
          $data=$result->fetch_assoc();
          $Equipment_image = $data['Equipment_image'];
          $Equipment_Name = $data['Equipment_Name'];
          $Product_Type = $data['Product_Type'];
          $Item_Price= $data['Item_Price'];
          $Brief_Description=$data['Brief_Description'];
          $Full_Description=$data['Full_Description'];
        }
        
        echo"<div class='col-10 col-md-8 col-lg-6 container p-4 my-5 mx-auto'>";
        echo"<h1 class='display-6 mb-3'>Edit your Trips</h1>";
        echo"<form action='' method='post' enctype='multipart/form-data'>";

        echo"Equipment: <input type= 'text'  name= 'Equipment_Name' value=".$Equipment_Name."><br>";

        echo"Type: <input type= 'text'  name= 'Product_Type' value=".$Product_Type."><br>";

        echo"Price: <input type= 'text'  name= 'Item_Price' value=".$Item_Price."><br>";

        echo"Brief Description: <input type= 'text'  name= 'Brief_Description' value=".$Brief_Description."><br>";

        echo"Full Description: <input type= 'text'  name= 'Full_Description' value=".$Full_Description."><br>";
        
        echo"<div style='text-align:center'><input type='submit' class='btn btn-primary px-5 mt-4' name='submit' value='Save'>";

        echo"<input type='reset' class='btn btn-outline-dark px-5 ms-3 mt-4' value='Reset'></div>";
        echo"</form>";
        echo"</div>";
        
        if(isset($_POST['submit'])){
            $Equipment_Name=$_POST['Equipment_Name'];
            $Product_Type=$_POST['Product_Type'];
            $Item_Price=$_POST['Item_Price'];
            $Brief_Description=$_POST['Brief_Description'];
            $Full_Description=$_POST['Full_Description'];
            

            $sql="UPDATE `equipment` SET `Equipment_Name`='$Equipment_Name',`Product_Type`='$Product_Type',`Item_Price`='$Item_Price',`Brief_Description`='$Brief_Description',`Full_Description`='$Full_Description' WHERE Item_Code ='".$edited."'";

         $result=mysqli_query($conn,$sql);
           if($result){
            header("Location:Equipment.php");
          }
        }
        $conn->close();
        include "footer.php";
    ?>
    
  
  
</body>
</html>