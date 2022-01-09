<!DOCTYPE html>
<html>
<head>
	<title>History</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php
        include "Menu.php";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webproject";

        $conn = new mysqli($servername, $username, $password, $dbname);
    ?>
    <br><br>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#hikers">Hikers</a></li>
    <li><a data-toggle="tab" href="#admins">Admins</a></li>
    <li><a data-toggle="tab" href="#orders">Orders</a></li>
    <li><a data-toggle="tab" href="#messages">Messages</a></li>
    <li><a data-toggle="tab" href="#rating">Rating</a></li>
  </ul>

  <div class="tab-content">
    <div id="hikers" class="tab-pane fade in active">
      <!-- <h3>Hiker's Info</h3> -->
      <br>
      <table class="table table-hover table-striped table-bordered">	
        <thead>
            <tr>
                <th>ID_Person</th>
                <th>Username</th>
                <th>Email</th>
                <th>City</th>
                <th>Gender</th>
                <th>Phone_Number</th>
                <th>Emergency_Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $s = " SELECT * FROM person WHERE ID_Type=2"  ;
                $result = mysqli_query ($conn ,$s);
                while($data = $result->fetch_array(MYSQLI_ASSOC)){
                   echo"<tr><td> ".$data['ID_Person']."</td>";
                   echo"<td>".$data['Username']."</td>";
                   echo"<td>".$data['Email']."</td>";
                   echo"<td>".$data['City']."</td>";
                   echo"<td>".$data['Gender']."</td>";
                   echo"<td>".$data['Phone_Number']."</td>";
                   echo"<td>".$data['Emergency_Number']."</td></tr>";
               }
            ?>
        </tbody>
      </table>
      
    </div>
    <div id="admins" class="tab-pane fade">
      <!-- <h3>Admin's History</h3> -->
      <br>
      <form action="AddAdmin.php">
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</button>
      </form>
      <br>
      <table class="table table-hover table-striped table-bordered">	
        <thead>
            <tr>
                <th>ID_Person</th>
                <th>Username</th>
                <th>Email</th>
                <th>City</th>
                <th>Gender</th>
                <th>Phone_Number</th>
                <th>Emergency_Number</th>
                <th>Delete Admin</th>
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
                       <td> <?php echo $data1['Email'] ?></td>
                       <td> <?php echo $data1['City'] ?></td>
                       <td> <?php echo $data1['Gender'] ?></td>
                       <td> <?php echo $data1['Phone_Number'] ?></td>
                       <td> <?php echo $data1['Emergency_Number'] ?></td>
                       <td> <a href=DeleteAdmin.php?id=<?php echo $data1['ID_Person'] ?>><i class="fa fa-trash"></i></a></td>
                   </tr>
                <?php   
               }
            ?>
        </tbody>
      </table>
    </div>
    <div id="orders" class="tab-pane fade">
      <!-- <h3>Order's History</h3> -->
      <br>
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
                   echo"<tr><td> ".$data2['Order_Code']."</td>";
                   echo"<td>".$data2['ID_Person']."</td>";
                   echo"<td>".$data2['Trip_Code']."</td>";
                   echo"<td>".$data2['Order_Date']."</td>";
                   echo"<td>".$data2['Total_Price']."</td></tr>";
               }
            ?>
        </tbody>
      </table>
    </div>
    <div id="messages" class="tab-pane fade">
      <!-- <h3>Message's History</h3> -->
      <br>
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
                $s2 = "SELECT * FROM `message`" ;
                $r2 = mysqli_query ($conn ,$s2);
                while($data3 = $r2->fetch_array(MYSQLI_ASSOC)){
                   echo"<tr><td> ".$data3['Sender_ID']."</td>";
                   echo"<td>".$data3['Receiver_ID']."</td>";
                   echo"<td>".$data3['Message']."</td>";
                   echo"<td>".$data3['Message_Code']."</td>";
                   echo"<td>".$data3['Message_Time']."</td></tr>";
               }
            ?>
        </tbody>
      </table>
      
    </div>
    <div id="rating" class="tab-pane fade">
      <!-- <h3>Rating's History</h3> -->
      <br>
      <table class="table table-hover table-striped table-bordered">	
        <thead>
            <tr>
                <th>Rating</th>
                <th>Feedback</th>
                <th>ID_Person</th>
                <th>Date</th>
                <th>Survey_ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $s4 = "SELECT * FROM `survey`" ;
                $r4 = mysqli_query ($conn ,$s4);
                while($data4 = $r4->fetch_array(MYSQLI_ASSOC)){
                   echo"<tr><td> ".$data4['Rating']."</td>";
                   echo"<td>".$data4['Feedback']."</td>";
                   echo"<td>".$data4['ID_Person']."</td>";
                   echo"<td>".$data4['Date']."</td>";
                   echo"<td>".$data4['Survey_ID']."</td></tr>";
               }
            ?>
        </tbody>
      </table>
    </div>
   </div>
  </div>
</body>
</html>