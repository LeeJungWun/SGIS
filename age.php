<?php
	include ("connect_db.php");
	
	$DBMARKER = $_GET["name"];
	
	$DBchart = "SELECT * FROM sgis_person WHERE name= '$DBMARKER'";
	$result = mysql_query($DBchart) or die (mysql_error());
	$data = mysql_fetch_array($result);

 echo $data[age20]."//".$data[age25]."//".$data[age30];
 
?>

