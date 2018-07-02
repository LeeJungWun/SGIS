<?php 
    $conn = mysql_connect("localhost","mslsgis","msl123456") or die (mysql_error()); //host,id,passwd
	mysql_select_db("mslsgis",$conn);
	mysql_query('set names utf8');	
	
?>