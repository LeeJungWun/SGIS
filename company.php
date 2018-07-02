<?php
	include ("connect_db.php");
	
	$DBMARKER = $_GET["name"];
	
	$DBchart = "SELECT * FROM sgis_company WHERE name= '$DBMARKER'";
	$result = mysql_query($DBchart) or die (mysql_error());
	$cp_data = mysql_fetch_array($result);

 echo $cp_data[cp1]."//".$cp_data[cp_n1]."//".$cp_data[cp2]."//".$cp_data[cp_n1]."//".$cp_data[cp3]."//".$cp_data[cp_n3]."//".$cp_data[cp4]."//".$cp_data[cp_n4]."//".$cp_data[cp5]."//".$cp_data[cp_n5]."//".$cp_data[cp6]."//".$cp_data[cp_n6];
 
?>