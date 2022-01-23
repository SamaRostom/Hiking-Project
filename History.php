<!DOCTYPE html>
<html>
<head>
	<title>History</title>
  <link rel='icon' type="image/x-icon" href='images/logo.ico'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    thead{
      color: white;
      background-color:  #2a718e;
    }
    .nav-link, .count{
      color: #2a718e
    }
    .toptrip{
      overflow:hidden;
    }
  </style>
</head>
<body>
	<?php
        include "navbar.php";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webproject";

        $conn = new mysqli($servername, $username, $password, $dbname);
        
    ?>
    <div class='m-5'>
    <ul class="nav nav-tabs" id="myTab">
  <li class="nav-item dashboard">
    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#dashboard" type="button">Dashboard</button>
  </li>
  <li class="nav-item hikers">
    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#hikers" type="button">Hikers</button>
  </li>
  <li class="nav-item admins">
    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#admins" type="button">Admins</button>
  </li>
  <li class="nav-item orders">
    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#orders" type="button">Orders</button>
  </li>
  <!-- <li class="nav-item messages">
    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#messages" type="button">Messages</button>
  </li> -->
  <li class="nav-item rating">
    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#rating" type="button">Rating</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <!-- -------------DASHBOARD CONTAINER-------------- -->
  <div class="tab-pane fade show active py-5" id="dashboard">
  <div class='row col-12 mx-auto'>
  <div class='p-3 col-4 mx-3 rounded shadow text-center'>
            <?php
                $ss = " SELECT COUNT(ID_Person) AS TotalNumberofHikers FROM person WHERE ID_Type=2"  ;
                $rr = mysqli_query ($conn ,$ss);
                $dd =  mysqli_fetch_assoc($rr);
                $TotalNumberofHikers=$dd['TotalNumberofHikers'];
            ?>
      <h1 class='fs-3'>Total Number of Hikers</h1>
      <h1 class='count'><i class="fas fa-hiking"></i> <?php echo $TotalNumberofHikers; ?> </h1>
    </div>
    <div class='p-3 col-3 mx-3 rounded shadow text-center'>
            <?php
                $sss = " SELECT COUNT(Trip_Code) AS TotalNumberofTrips FROM trips"  ;
                $rrr = mysqli_query ($conn ,$sss);
                $ddd =  mysqli_fetch_assoc($rrr);
                $TotalNumberofTrips=$ddd['TotalNumberofTrips'];
            ?>
      <h1 class='fs-3'>Total Number of Trips</h1>
      <h1 class='count'><i class="fas fa-mountain"></i> <?php echo $TotalNumberofTrips; ?> </h1>
    </div>
            <?php
                $TotalRevenue=0;
                $sq = "SELECT * FROM `order`" ;
                $r = mysqli_query ($conn ,$sq);
                while($data2 = $r->fetch_array(MYSQLI_ASSOC)){
                  $TotalRevenue+=$data2['Total_Price'];
               }
            ?>
    <div class='p-3 col-4 mx-3 rounded shadow text-center'>
      <h1 class='fs-3'>Total Revenue</h1>
      <h1 class='count'><i class="fas fa-coins"></i> <?php echo $TotalRevenue; ?> </h1>
    </div>
  </div>

  <!-- highest trip in orders table -->
  <div class='toptrip row col-10 rounded shadow mx-auto mt-4'>
    <img src='images/hiking2.jpg' class='p-0 col-5'>
    <div class='col-5 m-5'>
            <?php
                 // $TotalCount;
                // // $sq = "SELECT * FROM `order`" ;
                // $sq = "SELECT COUNT(Trip_Code) AS TripCount, Trip_Code FROM order GROUP BY Trip_Code ORDER BY TripCount DESC LIMIT 1";
                // $r = mysqli_query ($conn ,$sq);
                // $data2 =  mysqli_fetch_assoc($r);
                // while($data2 = $r->fetch_array(MYSQLI_ASSOC)){
                  // $TotalCount=$data2['TripCount'];
              //  }
            ?>
    <h1 class='fs-3'>Trip name</h1>
    <p class='count'><i class="fas fa-star"></i> Our top reserved trip!</p>
    <br>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt blanditiis dolore rerum corporis doloremque, nesciunt harum, architecto nulla expedita ipsam cumque fugit labore, temporibus animi adipisci at delectus sapiente molestiae!</p>
    </div>
  </div>

  </div>


  <!-- -------------HIKERS CONTAINER-------------- -->
  <div class="tab-pane fade  py-5" id="hikers">
  <table class="table table-hover table-striped table-bordered">	
        <thead>
            <tr>
                <th>ID_Person</th>
                <th>Username</th>
                <th>Profile</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $s = " SELECT * FROM person WHERE ID_Type=2"  ;
                $result = mysqli_query ($conn ,$s);
                while($data = $result->fetch_array(MYSQLI_ASSOC)){
                   echo"<tr><td> ".$data['ID_Person']."</td>
                   <td>".$data['Username']."</td>";
                   ?>
                   <td> <a href='ViewProfile.php?id=<?php echo $data['ID_Person'] ?>'><i class="fas fa-user-alt"></i></a> </td></tr>
                   <?php
               }
            ?>
        </tbody>
      </table>
  </div>

  <!-- -------------ADMINS CONTAINER-------------- -->
  <div class="tab-pane fade py-5" id="admins">
  <form action="AddAdmin.php">
        <button type="submit" class="btn btn-dark px-3">Add <i class="fas fa-user-plus"></i></button>
      </form>
      <br>
      <table class="table table-hover table-striped table-bordered">	
        <thead>
            <tr>
                <th>ID_Person</th>
                <th>Username</th>
                <th>Profile</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $s = " SELECT * FROM person WHERE ID_Type=1" ;
                $result = mysqli_query ($conn ,$s);
                while($data1 = $result->fetch_array(MYSQLI_ASSOC)){
                ?>
                   <tr>
                   	   <td> <?php echo $data1['ID_Person'] ?></td>
                       <td> <?php echo $data1['Username'] ?></td>
                       <td> <a href='ViewProfile.php?id=<?php echo $data1['ID_Person'] ?>'><i class="fas fa-user-alt"></i></a> </td>
                       <td> <a href="DeleteAdmin.php?id=<?php echo $data1['ID_Person'] ?>"><i class="fa fa-trash text-danger"></i></a></td>
                   </tr>
                <?php   
               }
            ?>
        </tbody>
      </table>
  </div>

  <!-- -------------ORDERS CONTAINER-------------- -->
  <div class="tab-pane fade py-5" id="orders">
  <table class="table table-hover table-striped table-bordered">	
        <thead>
            <tr>
                <th>Order_Code</th>
                <th>ID_Person</th>
                <th>Trip_Code</th>
                <th>Order_Date</th>
                <th>Total_Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sq = "SELECT * FROM `order`" ;
                $r = mysqli_query ($conn ,$sq);
                while($data2 = $r->fetch_array(MYSQLI_ASSOC)){
                   echo"<tr><td> ".$data2['Order_Code']."</td>
                   <td>".$data2['ID_Person']."</td>
                   <td>".$data2['Trip_Code']."</td>
                   <td>".$data2['Order_Date']."</td>
                   <td>".$data2['Total_Price']."</td></tr>";
               }
            ?>
        </tbody>
      </table>
  </div>

    <!-- -------------MESSAGES CONTAINER-------------- -->
    <!-- <div class="tab-pane fade py-5" id="messages">
    <table class="table table-hover table-striped table-bordered">	
        <thead>
            <tr>
                <th>Sender_ID</th>
                <th>Receiver_ID</th>
                <th>Message</th>
                <th>Message_Code</th>
                <th>Message_Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
              //   $s2 = "SELECT * FROM `message`" ;
              //   $r2 = mysqli_query ($conn ,$s2);
              //   while($data3 = $r2->fetch_array(MYSQLI_ASSOC)){
              //      echo"<tr><td> ".$data3['Sender_ID']."</td>";
              //      echo"<td>".$data3['Receiver_ID']."</td>";
              //      echo"<td>".$data3['Message']."</td>";
              //      echo"<td>".$data3['Message_Code']."</td>";
              //      echo"<td>".$data3['Message_Time']."</td></tr>";
              //  }
            ?>
        </tbody>
      </table>
    </div> -->

      <!-- -------------RATING CONTAINER-------------- -->
  <div class="tab-pane fade py-5" id="rating">
  <table class="table table-hover table-striped table-bordered">	
        <thead>
            <tr>
                <th>ID_Person</th>
                <th>Survey_ID</th>
                <th>Date</th>
                <th>Rating</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $s4 = "SELECT * FROM `survey`" ;
                $r4 = mysqli_query ($conn ,$s4);
                while($data4 = $r4->fetch_array(MYSQLI_ASSOC)){
                   echo"<tr><td> ".$data4['ID_Person']."</td>";
                   echo"<td>".$data4['Survey_ID']."</td>";
                   echo"<td>".$data4['Date']."</td>";
                   echo"<td>".$data4['Rating']."</td>";
                   echo"<td>".$data4['Feedback']."</td></tr>";
               }
            ?>
        </tbody>
      </table>
    </div>
</div>
</div>
<?php

  if($_SESSION['ID_Type'] == "3" || $_SESSION['ID_Type'] == "4"){ //Auditor HR
	echo "<script>
	document.querySelector('.hikers').style.display = 'none'
	document.querySelector('.orders').style.display = 'none'
	</script>";
  }
 include('footer.php');
  ?>
</body>
</html>