<?php
include ("connect_db.php");

$DBMARKER = $_GET["num"];

$DBchart = "SELECT * FROM graph WHERE num= '$DBMARKER'";
$result = mysql_query($DBchart) or die (mysql_error());
$data = mysql_fetch_array($result);

echo $data[value1]."//".$data[value2]."//".$data[value3]."//".$data[value4]."//".$data[good]."//".$data[name];

?>