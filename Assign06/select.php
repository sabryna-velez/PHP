<?php
session_start();
include("includes/openDbConn.php");
$_SESSION["errorMessage"] = "";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assign06 - Select</title>
</head>

<body>
<?php
	$sql = "SELECT ProjectID, ProjName, ProjCategory, ProjDesc, StartDate, EndDate FROM Assign06Projects ORDER BY ProjectID ASC"; 
	
	$result = mysqli_query($db, $sql);
	
	if( empty($result) )
		$num_results =0;
	else
		$num_results = mysqli_num_rows($result);
?>
<h1 style="text-align: center">Assign06 - Select</h1>
<?php
	include("includes/menu.php");
?>
	
<table style="border: 0px; width: 700px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Listing of Projects">
	<thead>
		<tr>
			<th colspan="6" style="font-weight: bold; background-color: #add8e6; text-align:center; text-decoration:underline;"> Assign06Projects Table</th>
		</tr>
		<tr>
			<th style="background-color: #add8e6; font-weight: bold;">ProjectID</th>
			<th style="background-color: #add8e6; font-weight: bold;">ProjName</th>
			<th style="background-color: #add8e6; font-weight: bold;">ProjCategory</th>
			<th style="background-color: #add8e6; font-weight: bold;">ProjDesc</th>
			<th style="background-color: #add8e6; font-weight: bold;">StartDate</th>
			<th style="background-color: #add8e6; font-weight: bold;">EndDate</th>

		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="6" style="text-align: center; font-style:italic;">Information pulled from MySQL database</td>
		</tr>
	</tfoot>
	<tbody>
		<?php
		
		for( $i=0; $i<$num_results; $i++ )
		{
			$row = mysqli_fetch_array($result);
		?>
		<tr>
			<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["ProjectID"] ) ); ?></td>
			<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["ProjName"] ) ); ?></td>
			<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["ProjCategory"] ) ); ?></td>
			<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["ProjDesc"] ) ); ?></td>
			<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["StartDate"] ) ); ?></td>
		    <td><?php echo( trim( $row["EndDate"] ) ); ?></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
	<p>&nbsp;</p>
<?php
	$sql = "SELECT CarID, CarMake, CarModel, CarYear, CarColor, CarHybrid FROM Assign06Cars ORDER BY CarID ASC";
	
	$result = mysqli_query($db, $sql);
	
	if( empty($result) )
		$num_results =0;
	else
		$num_results = mysqli_num_rows($result);
?>
	
<table style="border: 0px; width: 700px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Listing of Cars">
	<thead>
		<tr>
			<th colspan="6" style="font-weight: bold; background-color: #add8e6; text-align:center; text-decoration:underline;"> Assign06Cars Table</th>
		</tr>
		<tr>
			<th style="background-color: #add8e6; font-weight: bold;">CarID</th>
			<th style="background-color: #add8e6; font-weight: bold;">CarMake</th>
			<th style="background-color: #add8e6; font-weight: bold;">CarModel</th>
			<th style="background-color: #add8e6; font-weight: bold;">CarYear</th>
			<th style="background-color: #add8e6; font-weight: bold;">CarColor</th>
			<th style="background-color: #add8e6; font-weight: bold;">CarHybrid</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="6" style="text-align: center; font-style:italic;">Information pulled from MySQL database</td>
		</tr>
	</tfoot>
	<tbody>
		<?php
		
		for( $i=0; $i<$num_results; $i++ )
		{
			$row = mysqli_fetch_array($result);
		?>
		<tr>
			<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["CarID"] ) );?></td>
			<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["CarMake"] ) );?></td>
			<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["CarModel"] ) );?></td>
			<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["CarYear"] ) );?></td>
			<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["CarColor"] ) );?></td>
		    <td><?php echo( trim( $row["CarHybrid"] ) ); ?></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>

	
<?php
	include("includes/closeDbConn.php");
?>
	
</body>
</html>