<?php

session_start();

$ProjectID     = $_POST["projectID"];                      //can only be a number,there is a check below
$ProjName   = addslashes($_POST["projName"]);                 //drop down box, don't need addslashes
$ProjCategory  = $_POST["projCategory"];
$ProjDescript   = addslashes($_POST["projDescription"]);                //drop down box, don't need addslashes
$StartMonth  = $_POST["startMonth"];
$StartDay = $_POST["startDay"];				//yes, no radio, do not need addslashes
$EndMonth  = $_POST["endMonth"];
$EndDay = $_POST["endDay"];

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$ProjName = str_replace($removeThese, "", $ProjName);
$ProjDescript       = str_replace($removeThese, "", $ProjDescript);

if(($ProjectID=="") || ($ProjName=="") || ($ProjCategory=="- Category -")  || ($ProjDescript=="")  || ($StartMonth=="- Month -")  || ($StartDay=="- Day -") || ($EndMonth=="- Month -")  || ($EndDay=="- Day -"))
{
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insertProject.php");
	exit;
}
else if(!is_numeric($ProjectID))
{
	$_SESSION["errorMessage"] = "You must enter a number for Project ID!";
	header("Location: insertProject.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

include("includes/openDbConn.php");

$sql = "SELECT ProjectID FROM Assign06Projects  WHERE ProjectID=".$ProjectID;

$result = mysqli_query($db, $sql);

if(empty($result))
	$num_results = 0;
else
	$num_results = mysqli_num_rows($result);

if($num_results != 0)
{
	$_SESSION["errorMessage"] = "The ProjectID you entered already exists!";
	header("Location: insertProject.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] = "";
}

$StartDate = $StartMonth." ".$StartDay;
$EndDate = $EndMonth." ".$EndDay;

$sql = "INSERT INTO Assign06Projects(ProjectID, ProjName, ProjCategory, ProjDesc, StartDate, EndDate) VALUES(".$ProjectID.", '".$ProjName."', '".$ProjCategory."', '".$ProjDescript."', '".$StartDate."', '".$EndDate."')";

$result = mysqli_query($db, $sql);

include("includes/closeDbConn.php");

header("Location: select.php");
exit;
?>
