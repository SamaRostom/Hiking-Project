<!DOCTYPE html>
<html>
<head>
	<title>FeedBack</title>
 <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>

<h1>FeedBack Form</h1>

<style>

   .rating input[type="radio"]:not(:nth-of-type(0)){
    position: absolute;
    width: 1px;
  }
   /*.rating [type="radio"]:not(:nth-of-type(0)) + label {
    display: none;
  }*/
    
    
   .rating .stars label:before {
    content: "☆";
  }
    
  .stars label {
    color: lightgray;
  }
    
  .stars label:hover {
     text-shadow: 1px darkorange;
  }

   .rating [type="radio"]:nth-of-type(1):checked ~ .stars label:nth-of-type(-n+1),
   .rating [type="radio"]:nth-of-type(2):checked ~ .stars label:nth-of-type(-n+2),
   .rating [type="radio"]:nth-of-type(3):checked ~ .stars label:nth-of-type(-n+3),
   .rating [type="radio"]:nth-of-type(4):checked ~ .stars label:nth-of-type(-n+4),
   .rating [type="radio"]:nth-of-type(5):checked ~ .stars label:nth-of-type(-n+5) {
   color: orange;
  }
</style>


<body>
<?php
 session_start();

 $servername='localhost';
 $username='root';
 $password='';
 $dbname = "webproject";


 $conn=mysqli_connect($servername,$username,$password,"webproject");
 if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
 }

if(isset($_POST['Submit'])){
  echo "ok";
 $rating = $_POST['demo'];
 $Feedback = $_POST['Feedback'];
 $ID_Person = $_SESSION['ID_Person'];
 $currentDateTime = date('Y-m-d H:i:s');
  // $sql="INSERT INTO survey('Rating','Feedback','ID_Person','Date') VALUES ('$rating', '$Feedback', '$ID_Person','$currentDateTime')";
 $sql="INSERT INTO `survey`(`Rating`, `Feedback`, `ID_Person`, `Date`) VALUES ('$rating','$Feedback','$ID_Person','$currentDateTime')";
  echo $sql;

  if($conn->query($sql) === TRUE){
      echo '<script> alert("FeedBack submitted successfully");</script>';
      header("Location: Home.php");
  }
}
else{
  echo "not ok";
}
?>

 <!-- <form class="rating" method="post">
  <b>Rating:<b>
  <input id="demo-1" type="radio" name="demo" value="1"> 
  <label for="demo-1">1 star</label>
  <input id="demo-2" type="radio" name="demo" value="2">
  <label for="demo-2">2 stars</label>
  <input id="demo-3" type="radio" name="demo" value="3">
  <label for="demo-3">3 stars</label>
  <input id="demo-4" type="radio" name="demo" value="4">
  <label for="demo-4">4 stars</label>
  <input id="demo-5" type="radio" name="demo" value="5">
  <label for="demo-5">5 stars</label>
        
 <div class="stars">
  <label for="demo-1" name="1 star" title="1 star"></label>
  <label for="demo-2" name="2 stars" title="2 stars"></label>
  <label for="demo-3" name="3 stars" title="3 stars"></label>
  <label for="demo-4" name="4 stars" title="4 stars"></label>
  <label for="demo-5" name="5 stars" title="5 stars"></label>   
 </div> -->

 <form class="rating" method="post" action="">
  <b>Rating:<b>
  <input id="demo-1" type="radio" name="demo" value="1"> 
  <!-- <label for="demo-1">1 star</label> -->
  <input id="demo-2" type="radio" name="demo" value="2">
  <!-- <label for="demo-2">2 stars</label> -->
  <input id="demo-3" type="radio" name="demo" value="3">
  <!-- <label for="demo-3">3 stars</label> -->
  <input id="demo-4" type="radio" name="demo" value="4">
  <!-- <label for="demo-4">4 stars</label> -->
  <input id="demo-5" type="radio" name="demo" value="5">
  <!-- <label for="demo-5">5 stars</label> -->
        
 <div class="stars">
  <label for="demo-1" name="1 star" title="1 star"></label>
  <label for="demo-2" name="2 stars" title="2 stars"></label>
  <label for="demo-3" name="3 stars" title="3 stars"></label>
  <label for="demo-4" name="4 stars" title="4 stars"></label>
  <label for="demo-5" name="5 stars" title="5 stars"></label>   
 </div>

  <br>

  <textarea name="Feedback" rows="5" cols="50" placeholder="">
    Write your review here....
  </textarea>

 <!--  <br><br> -->

  <!-- Today's Date:<br>
  <input type="date" name="Date"> -->

  <br><br>

  <input type="submit" name="Submit">

</form>
</body>
</html>