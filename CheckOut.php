<!DOCTYPE html>
<html>
<head>
	<title>check out</title>
</head>
<body>
<!-- h3ml eno yetba3 order detials el hos el recipt -->
<div class="placeorder content-wrapper"><center>
    <h1>Your Order Has Been Placed</h1>
    <p>Thank you!</p>
    <a href="Home.php">Back to home</a>
    <a href="Survey.php">Take the survey</a>
    
</center>
</div>
<?php
session_start();
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
    $currentDateTime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `order`(`ID_Person`, `Trip_Code`, `Order_Date`, `Total_Price`) VALUES ('$ID_Person','$Trip_Code','$currentDateTime','$Total_Price')";
    }  
    
?>
<!-- <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class='print' style="border: 1px solid #a1a1a1; width: 300px; background: white; padding: 10px; margin: 0 auto; text-align: center;">

                    <div class="invoice-title" align="center">

                        <h1>Order Details</h1>
                    </div>

                    <div class="invoice-title" align="left">
                        Order # <b> 11111</b>
                    </div>
                    </br>
                    </br>

                    <div>
                        <div>
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td class="text-center"><strong>No</strong></td>
                                    <td class="text-center"><strong>Pname</strong></td>
                                    <td class="text-center"><strong>Qty</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                                </thead>

                                <tr>
                                    <td class="text-center">
                                        1
                                    </td >
                                    <td class="text-center">
                                        Cake
                                    </td >
                                    <td class="text-center">
                                        2
                                    </td >
                                        <td class="text-center">120</td>
                                        <td class="text-right">240</td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div  align="right">
                        Sub Total &nbsp;&nbsp;<b>240</b>
                    </div>
                    <div align="right">
                        Pay  &nbsp;&nbsp; <b>220</b>
                    </div>
                    <div align="right">
                        Due &nbsp;&nbsp;   <b>20</b>
                    </div>
                    <input style="padding:5px;" value="Print Document" type="button" onclick="myFunction()" class="button"></input>
                </div>
                <div>
                    <div>
                    </div> -->


</body>
</html>