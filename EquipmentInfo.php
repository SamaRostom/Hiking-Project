<!DOCTYPE html>
<html>
<head>
    
    <style>
        #tripimage{
            width:700px;
            height:500px;
        }
    </style>
    <script>
        var Cart;
        function addarray(){
            //alert("hi");
            //Cart.push(Trip_Code);
        }
    </script>
</head>
<body>
<?php
include "Menu.php";
// $id = $_GET['id'];
// echo $id;
if($_SESSION['ID_Type'] == "1"){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webproject";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $Item_Code = $_GET['id'];
    $s = " SELECT * FROM equipment WHERE Item_Code='".$Item_Code."'";
    $result = mysqli_query ($conn ,$s);
    if($result->num_rows >0){
        $data=$result->fetch_assoc();
        $Equipment_Image = $data['Equipment_Image'];
        $Equipment_Name = $data['Equipment_Name'];
        $Equipment_Price= $data['Equipment_Price'];
        $Brief_Description=$data['Brief_Description'];
        $Full_Description=$data['Full_Description'];
    }
    // echo $Trip_Code." ".$Trip_Image." ".$Trip_Price." ".$City." ".$Hiking_Place." ";
?>
    <br><br>
    <img src="<?php echo $Equipment_Image ?>" id="equipimage" />

    <?php echo "Equipment: ".$Equipment_Name ?><br>
    <?php echo "Price: ".$Equipment_Price ?><br>
    <?php echo "Brief Description: ".$Brief_Description ?><br>
    <?php echo "Full Description: ".$Full_Description ?><br>
    <a href="DeleteEquipment.php?id=<?php echo $data['Item_Code']; ?>" class="btn ntm-danger mt-3"><i class="btn btn-default" >Delete</i></a>
          <form >
          <button type="submit" formaction="EditEquipment.php"id="editequipment">Edit Equipment</button>
          </form>
        
<?php
}
 else if($_SESSION['ID_Type'] == "2"){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webproject";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $Item_Code = $_GET['id'];
    $s = " SELECT * FROM equipment WHERE Item_Code='".$Item_Code."'";
    $result = mysqli_query ($conn ,$s);
    if($result->num_rows >0){
        $data=$result->fetch_assoc();
        $Equipment_Image = $data['Equipment_Image'];
        $Equipment_Name = $data['Equipment_Name'];
        $Equipment_Price= $data['Equipment_Price'];
        $Brief_Description=$data['Brief_Description'];
        $Full_Description=$data['Full_Description'];
    }
    // echo $Trip_Code." ".$Trip_Image." ".$Trip_Price." ".$City." ".$Hiking_Place." ";
?>
    <br><br>
    <img src="<?php echo $Equipment_Image ?>" id="equipmentimage" />

    <?php echo "Equipment: ".$Equipment_Name ?><br>
    <?php echo "Price: ".$Equipment_Price ?><br>
    <?php echo "Brief Description: ".$Brief_Description ?><br>
    <?php echo "Full Description: ".$Full_Description ?><br>
    
          <form action="EquipmentInfo.php">
          <button type="submit" id="addcart" onclick="addarray()">Add Cart</button>
          </form>
        
<?php
}
?>  

</body>
</html>