<?php 
$userID = $_POST["userID"];
$passwd = $_POST["passwd"];

//example 1 (this is the shortened version and you can keep all the rest becasue it will be the first one processed)
if(($userID=="page1") && ($passwd=="alpha"))
	header("Location:page1.php");
else if(($userID=="page2") && ($passwd=="beta"))
	header("Location:page2.php");
else if(($userID=="page3") && ($passwd=="gamma"))
	header("Location:page3.php");
else
	header("Location:error.php");


//example 2
if( ($userID == "page1") && ($passwd == "alpha") )
{
	header("Location:page1.php");
}
else if( ($userID == "page2") && ($passwd == "beta") )
{
	header("Location:page2.php");
}
else if( ($userID == "page3") && ($passwd == "gamma") )
{
	header("Location:page3.php");
}
else{
	header("Location:error.php");
}


//example 3 longest version, this is the full breakdown of what it is doing.
if($userID == "page1")
{
	if($passwd == "alpha")
	{
		header("Location:page1.php");
	}
	else{
		header("Location:error.php");
	}
}
else if($userID == "page2")
{
	if($passwd == "beta")
	{
		header("Location:page2.php");
	}
	else{
		header("Location:error.php");
	}
}
else if($userID == "page3")
{
	if($passwd == "gamma")
	{
		header("Location:page3.php");
	}
	else{
		header("Location:error.php");
	}
}
else
{
	header("Location:error.php");
}
?>