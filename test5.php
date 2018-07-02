<?php
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
 
  $line=$_POST["line"];
  $station=$_POST["station"];
  $q1=$_POST["q1"];
  $answer1 = $_GET["answer1"];
  
  //만약 13-1 노선의 3번째 정류장의 가,나 질문이 있을 경우 중복처리 해줘야함.
  //q1의 값이 ans1 ~ ans5 로 들어오는데, ans1이 들어올 경우 해당 컬럼의 값을 +1 해줘야 함.
  //q2도 마찬가지
  
  $query=mysql_query("INSERT INTO userans(busline,bustation,qustitle,ans1) values('$line','$station','$qustitle[0]','$q1') ");
  $query=mysql_query("INSERT INTO userans(busline,bustation,qustitle,ans1) values('$line','$station','$qustitle[1]','$q1') ");

  /*if($answer1 == 1)
  {
  	$query=mysql_query("INSERT INTO userans(busline,bustation,qustitle) values('$line','$station','$q1','$answer1') ");
  	mysql_query($query);
  }
  
  else if($answer1 == 2)
  {
  	$query=mysql_query("INSERT INTO userans(busline,bustation,qustitle,ans2) values('$line','$station','$q1','$answer1') ");
  	mysql_query($query);
  }
  
  else if($answer1 == 3)
  {
  	$query=mysql_query("INSERT INTO userans(busline,bustation,qustitle,ans3) values('$line','$station','$q1','$answer1') ");
  	mysql_query($query);
  }
  
  else if($answer1 == 4)
  {
  	$query=mysql_query("INSERT INTO userans(busline,bustation,qustitle,ans4) values('$line','$station','$q1','$answer1') ");
  	mysql_query($query);
  }
  
  else if($answer1 == 5)
  {
  	$query=mysql_query("INSERT INTO userans(busline,bustation,qustitle,ans5) values('$line','$station','$q1','$answer1') ");
  	mysql_query($query);
  }*/
  
  echo $line;
?>