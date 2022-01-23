<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
// https://www.tutorialrepublic.com/php-tutorial/php-mysql-ajax-live-search.php
echo "<script>
var img = document.querySelectorAll('.img-circle')
for(var i=0; i<img.length;i++){
    if(img[i].src.endsWith('/')){
        img[i].src = 'images/avatar.png'
    }
}
</script>
<style>
.user{position:relative}
.msg{
    text-decoration: none;
    color: #2a718e;
    position:absolute;
    right: 1.5rem;
    top: 1.2rem;
}
</style>
";
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
            <div class='bg-light user mb-3 rounded p-3'>
                 <img src = "<?=$row['Profile_Picture']?>" class="img-circle mx-3" width = "40"/>
        <?=$row['Username']?>
        <a class='msg fs-5' href="./message.php?receiver=<?=$row['ID_Person']?>"><i class="fas fa-comment"></i></a>
        </div>
                    <?php
                }
            } else{
                echo "<div class='alert alert-warning'>No matches found</div>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}

?>