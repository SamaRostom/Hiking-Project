<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>       
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <style>
		/* css in case of a short page */
		body{
			height:100vh
		}
		.footer{
			position: absolute;
			bottom:0;
		}
        hr{
            height: 0.7px !important;
            color:#787878 !important;
        }
	}
    
	</style>
    <script>
        //default image
        function setImage(){
            var img = document.querySelectorAll('.img-circle')
            for(var i=0; i<img.length;i++){
                if(img[i].src.endsWith('/')){
                    img[i].src = 'images/avatar.png'
                }
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
if($_SESSION['ID_Type'] == "1" || $_SESSION['ID_Type'] == "2"){


  ?>     
  <div class='col-10 mx-auto mt-5 row'>
      <div class='px-4 col-7'>
        <div class="input-group mt-4 mb-3 search-box">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
        <input type="text" class="form-control" placeholder="Search..">
    </div>
    <div id="searchresult"></div>
    </div>

    <div class='col-4 offset-1 bg-light p-3 rounded'>
    <h4 class='fw-lighter'>Conversations</h4>
    <hr>
     <?php
        
        
        $lastMessage = "SELECT DISTINCT Sender_ID FROM messages WHERE Receiver_ID = ".$_SESSION['ID_Person'];
        $lastMessageResult = mysqli_query($conn,$lastMessage) or die(mysqli_error($conn));

if(mysqli_num_rows($lastMessageResult) > 0) {
    while($lastMessageRow = mysqli_fetch_array($lastMessageResult)) {
        $sent_by = $lastMessageRow['Sender_ID'];
        $getSender = "SELECT * FROM person WHERE ID_Person = '$sent_by'";
        $getSenderResult = mysqli_query($conn,$getSender) or die(mysqli_error($conn));
        $getSenderRow = mysqli_fetch_array($getSenderResult);
        $lastMessage2 = "SELECT DISTINCT stat FROM messages WHERE Receiver_ID = '".$_SESSION['ID_Person']."' AND  Sender_ID = '".$sent_by."'";
        $lastMessageResult2 = mysqli_query($conn,$lastMessage2) or die(mysqli_error($conn));
        $row2=mysqli_fetch_array($lastMessageResult2);  
        $lastMessage3 = "SELECT * FROM messages WHERE Receiver_ID = '".$_SESSION['ID_Person']."' AND  Sender_ID = '".$sent_by."' OR Sender_ID = ".$_SESSION['ID_Person']." AND Receiver_ID = '$sent_by' HAVING MAX(Message_Code)";
        $lastMessageResult3 = mysqli_query($conn,$lastMessage3) or die(mysqli_error($conn));
        $row3 = mysqli_fetch_array($lastMessageResult3); 
        if($row3['stat'] == 1){
            $readMessage2 = "UPDATE `messages` SET `stat` = '0' WHERE Receiver_ID = '".$_SESSION['ID_Person']."' AND  Sender_ID = '".$sent_by."' OR Sender_ID = ".$_SESSION['ID_Person']." AND Receiver_ID = '$sent_by'";
            mysqli_query($conn,$readMessage2) or die(mysqli_error($conn));
        }
        if($row2['stat']==0){
            $status="unread";
            ?>
            <div>
            <img src = "<?php echo $getSenderRow['Profile_Picture']?>" class="img-circle" width = "40"/> &nbsp;
        <b><a href="./message.php?receiver=<?=$sent_by?>&stat=<?=$row2['stat']?>" style="color:black;">
        <?=$getSenderRow['Username'];?></a></b>
        </div><br>
        <?php
        }
        else{
            $status="read";
            ?>
            <div>
            <img src = "<?php echo $getSenderRow['Profile_Picture']?>" class="img-circle" width = "40"/> &nbsp;
            <em><a href="./message.php?receiver=<?=$sent_by?>&stat=<?=$row2['stat']?>" style="text-decoration:none;color:black;">
        <?=$getSenderRow['Username'];?></a></em>
        </div><br>
        <?php
        }
     }
} 
else {
    echo "No conversations yet!";
}
     ?>
    <script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        if(inputVal!=""){
            $.ajax({
                       url:"livesearch.php",
					   method:"POST",
					   data:{term:inputVal}, 
					   success:function(data){
						   $("#searchresult").html(data);
					   }
            });
        } else{
            $("#searchresult").empty();
        }
    });
    
    // Set search input value on click of result item
    // $(document).on("click", ".result p", function(){
    //     $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
    //     $(this).parent(".result").empty();
    // });
});
</script>
</div> </div> 
	<?php
    }
    if($_SESSION['ID_Type'] == "3"){
        ?>
    <div id="message">
  <table class="table table-hover table-striped table-bordered">  
        <thead>
            <tr>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Conversation</th>
            </tr>
        </thead>
        <tbody>
        <?php
       

        $sql="SELECT * FROM messages";
        $result=mysqli_query($conn,$sql);
        while($data = $result->fetch_array(MYSQLI_ASSOC)){
        $si = $data['Sender_ID'];
        $ri= $data['Receiver_ID'];
        $mess= $data['Message'];
    ?>
    <tr>
    <td><?php echo $si; ?></td>
    <td><?php echo $ri; ?></td>
    <td><?php echo $mess; ?></td>
    </tr>
<?php
}
?>
    
</tbody>
</table>
</div>
<?php

    }
// include "footer.php";
?>
</body>
</html>