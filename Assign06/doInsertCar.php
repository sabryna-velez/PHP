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

if(($CarID=="") || ($CarMake=="- Make -") || ($CarModel=="")  || ($CarYear=="- Year -")  || ($CarColor=="")  || ($CarHybrid=="")) 
{
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insertCar.php");
	exit;
}
else if(!is_numeric($CarID))
{
	$_SESSION["errorMessage"] = "You must enter a number for CarID!";
	header("Location: insertCar.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");

$sql = "SELECT CarID FROM Assign06Cars  WHERE CarID=".$CarID;

$result = mysqli_query($db, $sql);

if(empty($result))
	$num_results = 0;
else
	$num_results = mysqli_num_rows($result);

if($num_results != 0)
{
	$_SESSION["errorMessage"] = "The CarID you entered already exists!";
	header("Location: insertCar.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

$sql = "INSERT INTO Assign06Cars(CarID, CarMake, CarModel, CarYear, CarColor, CarHybrid) VALUES(".$CarID.", '".$CarMake."', '".$CarModel."', '".$CarYear."', '".$CarColor."', '".$CarHybrid."')";

$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: select.php");
exit;
?>