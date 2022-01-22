<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
// https://www.tutorialrepublic.com/php-tutorial/php-mysql-ajax-live-search.php
if(isset($_POST["term"])){
    // Prepare a select statement
    if($_SESSION['ID_Type'] == "1"){
        $sql = "SELECT * FROM `person` WHERE ID_Type = 2 AND Username LIKE '%".$_POST["term"]."%'";
    }
    else if($_SESSION['ID_Type'] == "2"){
        $sql = "SELECT * FROM `person` WHERE ID_Type = 1 AND Username LIKE '%".$_POST["term"]."%'";
    }
    if($stmt = mysqli_prepare($conn, $sql)){
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    ?>
                    <div>
                 <img src = "images/<?=$row['Profile_Picture']?>" class="img-circle" width = "40"/>
        <?=$row['Username']?>
        <a href="./message.php?receiver=<?=$row['ID_Person']?>">Send message</a>
        </div>
                    <?php
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}

?>