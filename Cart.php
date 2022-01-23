<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* css in case of a short page */
        @media (min-width: 995px) {
        body{
            height:100vh
        }
        .footer{
            position: absolute;
            bottom:0;
        }
    }
    body {background-color: #f5f6f7;}
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
    if (isset($_GET["actioni"]))
    {
        if ($_GET["action"] == "delete")
        {
            foreach ($_SESSION["e"] as $keys => $value)
            {
                if ($value["Item_Code"] == $_GET["id"])
                {
                    unset($_SESSION["e"][$keys]);
                    echo '<script>alert("Trip has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
    ?>
    <br>
    <div style="clear: both"></div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
            <tr>
                <th width="10%">Trip Code</th>
                <th width="25%">Trip Name</th>
                <th width="25%">Trip Price</th>
                <th width="25%">Remove Trip</th>
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
                            <td><a class="text-decoration-none" href="Cart.php?action=delete&id=<?php echo $value["Trip_Code"]; ?>"><span
                                        class="text-danger">Remove Trip</span></a></td>

                        </tr>     

                        <?php
                        $total = $total +  $value["Trip_Price"];
                        // $_SESSION['Total_Price']=$total;
                    }
                    
                    $_SESSION['Total_Price']=$total;
                    ?>
                        <tr>
                            <td colspan="2" align="right"><b>Total</b></td>
                            <th width="15%" align="left"><?php echo number_format($_SESSION['Total_Price'], 2); ?> L.E </th>
                            <th width="15%">   <a href="CheckOut.php"> <input type="button" class="btn btn-dark" name="submit" value="Checkout"></th>
                        </tr>
                        <?php

                    }

                    ?>
                    
            </table>
        </div>
    </div>
    <?php
       // include "footer.php";
    ?>
</body>
</html>