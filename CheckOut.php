<!DOCTYPE html>
<html>
<head>
	<title>check out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url("images/w.jpg");
            background-size:  cover;
            background-repeat: no-repeat;
        }

    </style>
</head>
<body>
<div class="placeorder content-wrapper"><center>
    <br>
    <h3>Your Order Has Been Placed Successfully!</h3>
    <h4>Thank you!</h4><br>
    <form method="post" action="CheckOut.php?action=view">
    <button type="submit" name="home"  class="btn btn-outline-dark px-5 ms-2 mb-3" formaction="Home.php">Back to home</button>  
    <button type="submit" name="survey"  class="btn btn-outline-dark px-5 ms-2 mb-3" formaction="Survey.php">Take the survey</button><br>
        <button type="submit" name="view"  class="btn btn-dark"><i class='fas fa-receipt'></i> Veiw Order Details</button>                                     
    </form>
    
    
</center>
</div>
<?php
session_start();
if (isset($_POST["view"])){
    echo "<br><center><h4>Order Number: " . $_SESSION['last_id']."</h4></center><br>";
    ?>
    <div style="clear: both"></div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
            <tr>
                <th width="10%">Trip Code</th>
                <th width="25%">Trip Name</th>
                <th width="25%">Trip Price</th>
            </tr>
           

            <?php

                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        
                        ?>
                        <tr>
                            <td><?php echo $value["Trip_Code"]; ?></td>
                            <td><?php echo $value["Trip_Name"]; ?></td>
                            <td><?php echo $value["Trip_Price"]; ?> L.E </td>
                        </tr>
                        <?php
                        $total = $total +  $value["Trip_Price"];
                        $_SESSION['Total_Price']=$total;
                    }
                    ?>
                        <tr>
                            <td colspan="2" align="right"><b>Total</b></td>
                            <th width="15%" align="left"><?php echo number_format($total, 2); ?> L.E </th>
                        </tr>
                        <?php
                    }
                    ?>
            </table>
        </div>
    </div>
    <?php
    unset($_SESSION['cart']);
}
else{
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webproject";
    
    $Total_Price=$_SESSION["Total_Price"];
    $currentDateTime = date('Y-m-d H:i:s');
    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach ($_SESSION["cart"] as $key => $value) {
        $Trip_Code = $value["Trip_Code"];
        $ID_Person = $value["ID_Person"];
        $sql = "INSERT INTO `order`(`ID_Person`, `Trip_Code`, `Order_Date`, `Total_Price`) VALUES ('$ID_Person','$Trip_Code','$currentDateTime','$Total_Price')";
        $r2=mysqli_query($conn,$sql);
    }  
    if ($r2) {
        $last_id = mysqli_insert_id($conn);  
        $_SESSION['last_id']=$last_id;
    } 
}
?>
</body>
</html>