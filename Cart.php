<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>
<body>
<!-- https://www.youtube.com/watch?v=eAK8uYtNTy4 -->
<!-- https://stackoverflow.com/questions/49250955/better-way-to-make-the-shopping-cart-table-with-mysql
https://www.onlyxcodes.com/2020/10/add-to-cart-and-checkout-in-php.html
https://resources.fabric.inc/blog/answers/shopping-cart-database-design -->
	<?php 
	include "navbar.php";
// 	$servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "webproject";

// $conn = new mysqli($servername, $username, $password, $dbname);
// $s = " SELECT * FROM trips" ;
// $result = mysqli_query ($conn ,$s);
// while($data = $result->fetch_array(MYSQLI_ASSOC)){

    if (isset($_GET["action"]))
    {
        if ($_GET["action"] == "delete")
        {
            foreach ($_SESSION["cart"] as $keys => $value)
            {
                if ($value["Trip_Code"] == $_GET["id"])
                {
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Trip has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
	?>


<!-- <table class="table table-hover table-bordered">	
        <thead>
            <tr>
                <th>Trip_Code</th>
                <th>Trip_Price</th>
                <th>Hiking_Place</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table> -->

    <div style="clear: both"></div>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Trip Code</th>
                <th width="10%">ID Person</th>
                <th width="20%">Trip Price</th>
                <th width="20%">Remove Trip</th>
 <th>   <a href="CheckOut.php"> <input type="button" name="submit" value="Checkout"></th>
             <!-- law 3ayzen nzawed column fl table yb2a mn hena -->
            </tr>
           

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["Trip_Code"]; ?></td>
                            <td><?php echo $value["ID_Person"]; ?></td>
                            <td><?php echo $value["Trip_Price"]; ?> L.E </td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["Trip_Code"]; ?>"><span
                                        class="text-danger">Remove Trip</span></a></td>
                        </tr>
                        <?php
                        $total = $total +  $value["Trip_Price"];
                        $_SESSION['Total_Price']=$total;
                    }
                    ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right"><?php echo number_format($total, 2); ?> L.E </th>
                            <td></td>
                        </tr>
                        <?php
                    }
                    ?>
            </table>
        </div>
    </div>
    <?php
       include "footer.php";
    ?>
</body>
</html>