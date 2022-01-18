<?php
session_start();

//Clear session variables
$_SESSION["name"]             ="";
$_SESSION["address"]          ="";
$_SESSION["city"]             ="";
$_SESSION["state"]            ="";
$_SESSION["zip"]              ="";
$_SESSION["country"]          ="";
$_SESSION["phone"]            ="";
$_SESSION["email"]            ="";
$_SESSION["comments"]         ="";
$_SESSION["Sname"]            ="";
$_SESSION["Saddress"]         ="";
$_SESSION["Scity"]            ="";
$_SESSION["Sstate"]           ="";
$_SESSION["Szip"]             ="";
$_SESSION["Scountry"]         ="";
$_SESSION["errorMessage"]     ="";

session_unset(); //fress all session variables
session_destroy(); //destroys all data associated with current session
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assign04 - finishedUpdate Page</title>
</head>

<body>
	<h1 style="font-size:14pt; text-indent:360px;">Assign04 - finishedUpdate Page</h1>
	
	<p>Your information has been successfully updated in our database.</p>
	
</body>
</html>