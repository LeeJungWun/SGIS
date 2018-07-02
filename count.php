
<?php
$query=mysql_connect("localhost","mslsgis","msl123456");
mysql_select_db('mslsgis',$query);

if(isset($_POST['ans1']))
	{
	$choice=$_POST['ans1'];
	mysql_query("insert into userans(ans1) values('$choice')");
	}

?>