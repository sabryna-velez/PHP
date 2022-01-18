<?php

session_start();

$CarID     = $_POST["carID"];                      //can only be a number,there is a check below
$CarMake   = ($_POST["carMake"]);                 //drop down box, don't need addslashes
$CarModel  = addslashes($_POST["carModel"]);
$CarYear   = ($_POST["carYear"]);                //drop down box, don't need addslashes
$CarColor  = addslashes($_POST["carColor"]);
$CarHybrid = ($_POST["carHybrid"]);				//yes, no radio, do not need addslashes

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$CarModel = str_replace($removeThese, "", $CarModel);
$CarColor       = str_replace($removeThese, "", $CarColor);

if(empty($CarID))
	header("Location:select.php");

if(($CarID=="") || ($CarMake=="- Make -") || ($CarModel=="")  || ($CarYear=="- Year -")  || ($CarColor=="")  || ($CarHybrid==""))
{
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: updateCar.php");
	exit;
}
else if(!is_numeric($CarID))
{
	$_SESSION["errorMessage"] = "You must enter a number for CarID!";
	header("Location: updateCar.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");

$sql = "UPDATE Assign06Cars SET CarMake='".$CarMake."', CarModel ='".$CarModel."', CarYear='".$CarYear."', CarColor='".$CarColor."', CarHybrid='".$CarHybrid."' WHERE CarID=".$CarID;

$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: select.php");
exit;
?>
