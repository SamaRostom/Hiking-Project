<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        $receiver = $_GET['receiver'];
        $getReceiver = "SELECT * FROM person WHERE ID_Person = '$receiver'";
        $getReceiverResult = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
        $getReceiverRow = mysqli_fetch_array($getReceiverResult);
    ?>
        <img src="./images/<?=$getReceiverRow['Profile_Picture']?>" class="img-circle" width = "40"/>
        <strong><?=$getReceiverRow['Username']?></strong>
        <table class="table table-striped">  
    <?php

        $getMessage = "SELECT  messages.* ,person.Username FROM messages INNER JOIN person on Sender_ID=person.ID_Person  WHERE Sender_ID = '$receiver' AND Receiver_ID  = ".$_SESSION['ID_Person']." OR Sender_ID = ".$_SESSION['ID_Person']." AND Receiver_ID = '$receiver' ORDER BY 	Message_Time asc";
        $getMessageResult = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
        if(mysqli_num_rows($getMessageResult) > 0) {
	        while($getMessageRow = mysqli_fetch_array($getMessageResult)) {	?>
	            <tr><div style = "margin: 10;">
	                <td><h4 style = "color: #007bff;display:inline"><?=$getMessageRow['Username']?></h4></td>
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
	        <input type="text" name = "message" class="form-control" placeholder = "Type your message here" required/>
	        <input type = "submit" value='send' name='submit' class="btn btn-default">
        </form>
    <?php
        if(isset($_POST['submit'])) {
	        $createdAt = date("Y-m-d h:i:sa");
	        $sent_by = $_POST['sent_by'];
	        $receiver = $_POST['received_by'];
	        $message = $_POST['message'];
	        $sendMessage = "INSERT INTO `messages`(`Sender_ID`, `Receiver_ID`, `Message`, `Message_Time`) VALUES('$sent_by','$receiver','$message','$createdAt')";
	        mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
        }
        include "footer.php";        
    ?>
</body>
</html>