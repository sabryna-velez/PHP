<?php

session_start();

include("includes/openDbConn.php");

$sql = "DELETE FROM Assign06Projects WHERE ProjectID=46";
//echo($sql);

$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: select.php");
?>
