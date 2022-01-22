<!DOCTYPE html>
<html>
<head>
	<title>rate</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<style>

   .rating input[type="radio"]:not(:nth-of-type(0)){
    position: absolute;
    width: 1px;
  } 
  .rating [type="radio"]:not(:nth-of-type(0)) + label {
      display: none;
    }
    
   .rating .stars label:before {
    content: "★";
  }
    
  .stars label {
    color: lightgray;
    font-size:2.5rem;
  }
    
  .stars label:hover {
  color: grey;
}

   .rating [type="radio"]:nth-of-type(1):checked ~ .stars label:nth-of-type(-n+1),
   .rating [type="radio"]:nth-of-type(2):checked ~ .stars label:nth-of-type(-n+2),
   .rating [type="radio"]:nth-of-type(3):checked ~ .stars label:nth-of-type(-n+3),
   .rating [type="radio"]:nth-of-type(4):checked ~ .stars label:nth-of-type(-n+4),
   .rating [type="radio"]:nth-of-type(5):checked ~ .stars label:nth-of-type(-n+5) {
   color: orange;
  }
  body{
  background-image: url("images/surveybg.jpg");
    background-size: cover;
    background-repeat: no-repeat;
}
.header{
  background-color: #00000063;
  height:100vh
}
form{
  position: absolute;
  top: 200px;
}
</style>


<body>
<?php
 $Trip_Code=$_GET['id'];
 session_start();

 $servername='localhost';
 $username='root';
 $password='';
 $dbname = "webproject";


 $conn=mysqli_connect($servername,$username,$password,$dbname);
 if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
 }

if(isset($_POST['Submit'])){
 $rating = $_POST['demo'];
 $ID_Person = $_SESSION['ID_Person'];
 $currentDateTime = date('Y-m-d H:i:s');
 $sql="INSERT INTO `ratingtrip`(`Trip_Code`, `ID_Person`, `rating`, `Rating_Time`) VALUES ('$Trip_Code','$ID_Person','$rating','$currentDateTime')";

  if($conn->query($sql) === TRUE){
      header("Location: Trips.php");
  }
}
?>
<div class='col-12 p-5 header text-light'>
	<br>
  <h1 class='fw-bold display-5'>Tell Us What You Think About The Trip</h1>

 <form class="col-9 col-md-8 col-lg-6" method="post" action="">
  <p class='fs-5 mb-0'>Rate your experience with the trip</p>
  <div class="rating mb-5">
  <input id="demo-1" type="radio" name="demo" value="1"> 
  <input id="demo-2" type="radio" name="demo" value="2">
  <input id="demo-3" type="radio" name="demo" value="3">
  <input id="demo-4" type="radio" name="demo" value="4">
  <input id="demo-5" type="radio" name="demo" value="5">
        
 <div class="stars">
  <label for="demo-1" name="1 star" title="1 star"></label>
  <label for="demo-2" name="2 stars" title="2 stars"></label>
  <label for="demo-3" name="3 stars" title="3 stars"></label>
  <label for="demo-4" name="4 stars" title="4 stars"></label>
  <label for="demo-5" name="5 stars" title="5 stars"></label>   
 </div>
  </div>

  <br><br>

  <input type="submit" class='btn btn-primary px-5 mt-4' value="Submit"name="Submit">

</form>
</div>
<?php include('footer.php') ?>
</body>
</html>