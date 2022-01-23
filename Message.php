<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
    	@media (min-width: 995px) {
		    body{
			    height:100vh
		    }
		    .footer{
			    position: absolute;
			    bottom:0;
		    }
	    }
        .back{
            position:absolute;
            right:1.5rem;
            top:1.1rem;
            color:white;
        }
        .back:hover{
            color:whitesmoke
        }
        td{
            padding:1rem !important
        }
    </style>
    <script>
        function setImage(){
var img = document.querySelector('.img-circle')
img.style= "border-radius:100%;border:2px solid white;"
if(img.src.endsWith('/')){
    img.src = 'images/avatar.png'
}
        }
</script>
</head>
<body onload="setImage()">
	<?php
        include "navbar.php";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webproject";
        $conn = new mysqli($servername, $username, $password, $dbname);
        
	    
        $receiver = $_GET['receiver'];
        $stat= $_GET['stat']; 
        $getReceiver = "SELECT * FROM person WHERE ID_Person = '$receiver'";
        $getReceiverResult = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
        $getReceiverRow = mysqli_fetch_array($getReceiverResult);
        
        $readMessage = "UPDATE `messages` SET stat = '1' WHERE Receiver_ID = '".$_SESSION['ID_Person']."' AND  Sender_ID = '".$receiver."' OR Sender_ID = ".$_SESSION['ID_Person']." AND Receiver_ID = '$receiver'";
        mysqli_query($conn,$readMessage) or die(mysqli_error($conn));
   ?>
   <div class='col-10 my-5 mx-auto rounded shadow' style="overflow:hidden;">
       <div class='col-12 px-4 py-2 text-light position-relative' style="background-color:#2a718e">
        <img src="<?=$getReceiverRow['Profile_Picture']?>" class="img-circle" width = "40"/>
        <span class='fs-5 ms-2'><?=$getReceiverRow['Username']?></span>
        <a class='back' href='messages.php'><i class="fas fa-chevron-right"></i></a>
    </div>
        <table class="table table-striped mb-4">  
    <?php

        $getMessage = "SELECT  messages.* ,person.Username FROM messages INNER JOIN person on Sender_ID=person.ID_Person  WHERE Sender_ID = '$receiver' AND Receiver_ID  = ".$_SESSION['ID_Person']." OR Sender_ID = ".$_SESSION['ID_Person']." AND Receiver_ID = '$receiver' ORDER BY 	Message_Time asc";
        $getMessageResult = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
        if(mysqli_num_rows($getMessageResult) > 0) {
	        while($getMessageRow = mysqli_fetch_array($getMessageResult)) {	?>
	            <tr><div style = "margin: 10;">
	                <td><b style = "color:#2a718e;display:inline"><?=$getMessageRow['Username']?></b></td>
	                <td><p class="text-center" style = "display:inline"><?=$getMessageRow['Message']?></p></td>
		         </div>
		        </tr>
      <?php } 
        } 
        else { 
	        echo "<tr><td><p>No messages yet! Say 'Hi'</p></td></tr>";
        }
    ?>
        </table>
        <form class="form-inline" action="" method = "POST">
	        <input type="hidden" name = "sent_by" value = "<?=$_SESSION['ID_Person']?>"/>
	        <input type="hidden" name = "received_by" value = "<?=$receiver?>"/>
	        <div class='d-flex px-5 pb-4'>
            <input type="text" name = "message" class="form-control" placeholder = "Type your message here" required/>
	        <input type = "submit" value='Send' name='submit' class="btn btn-dark ms-4 px-4">
            <div>
        </form>
    <?php
        if(isset($_POST['submit'])) {
	        $createdAt = date("Y-m-d h:i:sa");
	        $sent_by = $_POST['sent_by'];
	        $receiver = $_POST['received_by'];
	        $message = $_POST['message'];
	        $sendMessage = "INSERT INTO `messages`(`Sender_ID`, `Receiver_ID`, `Message`, `Message_Time`,stat) VALUES('$sent_by','$receiver','$message','$createdAt',0)";
	        mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
            // $readMessage2 = "UPDATE `messages` SET `stat` = '0' WHERE Receiver_ID = '".$_SESSION['ID_Person']."' AND  Sender_ID = '".$receiver."' OR Sender_ID = ".$_SESSION['ID_Person']." AND Receiver_ID = '$receiver'";
            // mysqli_query($conn,$readMessage2) or die(mysqli_error($conn));
        }
        // if(isset($_POST['back'])) {
        //     $readMessage2 = "UPDATE `messages` SET `stat` = '0' WHERE Receiver_ID = '".$_SESSION['ID_Person']."' AND  Sender_ID = '".$receiver."' OR Sender_ID = ".$_SESSION['ID_Person']." AND Receiver_ID = '$receiver'";
        //     mysqli_query($conn,$readMessage2) or die(mysqli_error($conn));
        //     // header("Location:Messages.php");
        //     echo '<script>window.location="messages.php"</script>';
        // }
        // include "footer.php";        
    ?>
    </div>
</body>
</html>