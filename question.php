<?
  include ("connect_db.php");
  
  $query2 = mysql_query("SELECT * FROM  quslist ");
  while ( $row2 = mysql_fetch_array ( $query2 ) ) {
  	$qustitle[]  = $row2['qustitle'];	//설문지
  }
  
  $query3 = mysql_query("SELECT * FROM  userans ");
  while ( $row3 = mysql_fetch_array ( $query3 ) ) {
  	$db_ans1  = $row3['ans1'];	//DB에 저장된 답변값
  	$db_ans2  = $row3['ans2'];	//DB에 저장된 답변값
  	$db_ans3  = $row3['ans3'];	//DB에 저장된 답변값
  	$db_ans4  = $row3['ans4'];	//DB에 저장된 답변값
  	$db_ans5  = $row3['ans5'];	//DB에 저장된 답변값
  }
  $line = $_POST['line'];
  $station = $_POST['station'];
  $q1 = $_POST['ans1'];	//질문의 대한 버튼 값
  $q2 = $_POST['ans2'];	//질문의 대한 버튼 값
  

  
  if(($_POST['submit']))
  {
  	 
  	 
  	//질문1에는 그에 대한 버튼값과 질문을 대입
  	if($q1 == 1)
  	{
  		$s = "INSERT INTO userans(qustitle) VALUES($qustitle[0]')";
  		mysql_query($s);
  		 
  		$db_ans = "UPDATE userans SET ans1 = ans1 + 1 WHERE ans1 = '$db_ans1'";
  		mysql_query($db_ans);
  	}
  	else if($q1 == 2)
  	{
  		$s = "INSERT INTO userans(busline,qustitle) VALUES('$qustitle[0]')";
  		mysql_query($s);
  	  
  		$db_ans = "UPDATE userans SET ans2 = ans2 + 1 WHERE ans2 = '$db_ans2'";
  		mysql_query($db_ans);
  	}
  	else if($q1 == 3)
  	{
  		$s = "INSERT INTO userans(busline,qustitle) VALUES('$qustitle[0]')";
  		mysql_query($s);
  	  
  		$db_ans = "UPDATE userans SET ans3 = ans3 + 1 WHERE ans3 = '$db_ans3'";
  		mysql_query($db_ans);
  	}
  	else if($q1 == 4)
  	{
  		$s = "INSERT INTO userans(busline,qustitle) VALUES('$qustitle[0]')";
  		mysql_query($s);
  	  
  		$db_ans = "UPDATE userans SET ans4 = ans4 + 1 WHERE ans4 = '$db_ans4'";
  		mysql_query($db_ans);
  	}
  	else if($q1 == 5)
  	{
  		$s = "INSERT INTO userans(busline,qustitle) VALUES('$qustitle[0]')";
  		mysql_query($s);
  	  
  		$db_ans = "UPDATE userans SET ans5 = ans5 + 1 WHERE ans5 = '$db_ans5'";
  		mysql_query($db_ans);
  	}
  
  	//질문2에는 그에 대한 버튼값과 질문을 대입
  	if($q2 == 1)
  	{
  		$s = "INSERT INTO userans(busline,qustitle) VALUES('$qustitle[1]')";
  		mysql_query($s);
  	  
  		$db_ans = "UPDATE userans SET ans1 = ans1 + 1 WHERE ans1 = '$db_ans1'";
  		mysql_query($db_ans);
  	}
  	else if($q2 == 2)
  	{
  		$s = "INSERT INTO userans(busline,qustitle) VALUES('$qustitle[1]')";
  		mysql_query($s);
  	  
  		$db_ans = "UPDATE userans SET ans2 = ans2 + 1 WHERE ans2 = '$db_ans2'";
  		mysql_query($db_ans);
  	}
  	else if($q2 == 3)
  	{
  		$s = "INSERT INTO userans(busline,qustitle) VALUES('$qustitle[1]')";
  		mysql_query($s);
  	  
  		$db_ans = "UPDATE userans SET ans3 = ans3 + 1 WHERE ans3 = '$db_ans3'";
  		mysql_query($db_ans);
  	}
  	else if($q2 == 4)
  	{
  		$s = "INSERT INTO userans(busline,qustitle) VALUES('$qustitle[1]')";
  		mysql_query($s);
  	  
  		$db_ans = "UPDATE userans SET ans4 = ans4 + 1 WHERE ans4 = '$db_ans4'";
  		mysql_query($db_ans);
  	}
  	else if($q2 == 5)
  	{
  		$s = "INSERT INTO userans(busline,qustitle) VALUES('$qustitle[1]')";
  		mysql_query($s);
  	  
  		$db_ans = "UPDATE userans SET ans5 = ans5 + 1 WHERE ans5 = '$db_ans5'";
  		mysql_query($db_ans);
  	}
  }

 echo "abcd";
 echo $line;
 echo $station;
?>