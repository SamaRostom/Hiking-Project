<!DOCTYPE html>
<html>
<head>
	<title>Sign Out</title>
</head>
<body>
<?php
session_start();
session_destroy();

header("Location: Home.php");

?>
</body>
</html>

