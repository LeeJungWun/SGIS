<?php
include ("connect_db.php");

$DBMARKER = $_GET["num"];						//행정코드
$graph_type = $_GET["type"];					//선택된 빨간 버튼 (그래프,지도)
$BlueButton1 = $_GET["item1"];					//선택된 파란 버튼(그래프)
$BlueButton2 = $_GET["item2"];					//선택된 파란 버튼(그래프)
$BlueCount = $_GET["BlueCount"];				//선택된 파란 버튼 카운터 
$regionalspecific = $_GET["regionalspecific"];	//셀렉트박스를 통해 선택된 지역

$MapDB_name; //빨간 버튼에 연동될 DB이름(그래프,지도)
$GraphDB_name1; //파란 버튼에 연동될 DB이름(그래프)
$GraphDB_name2; //파란 버튼에 연동될 DB이름(그래프)

if($graph_type == "population"){$MapDB_name = graph;}
if($graph_type == "company"){$MapDB_name = sgis_company;}
if($graph_type == "ground"){$MapDB_name = sgis_ground;}

switch ($BlueButton1){
	case sgis_school : 
		$GraphDB_name1 = sgis_school;
		break;
	case sgis_car :
		$GraphDB_name1 = sgis_car;
		break;
	case sgis_practician :
		$GraphDB_name1 = sgis_practician;
		break;
	case sgis_carenroll :
		$GraphDB_name1 = sgis_carenroll;
		break;
	case sgis_house :
		$GraphDB_name1 = sgis_house;
		break;
	case sgis_pension :
		$GraphDB_name1 = sgis_pension;
		break;
	case sgis_limited :
		$GraphDB_name1 = sgis_limited;
		break;
	case sgis_commute :
		$GraphDB_name1 = sgis_commute;
		break;
}

switch ($BlueButton2){
	case sgis_school :
		$GraphDB_name2 = sgis_school;
		break;
	case sgis_car :
		$GraphDB_name2 = sgis_car;
		break;
	case sgis_practician :
		$GraphDB_name2 = sgis_practician;
		break;
	case sgis_carenroll :
		$GraphDB_name2 = sgis_carenroll;
		break;
	case sgis_house :
		$GraphDB_name2 = sgis_house;
		break;
	case sgis_pension :
		$GraphDB_name2 = sgis_pension;
		break;
	case sgis_limited :
		$GraphDB_name2 = sgis_limited;
		break;
	case sgis_commute :
		$GraphDB_name2 = sgis_commute;
		break;
}

	if($BlueCount == 0){
		$DBchart = "SELECT * FROM $MapDB_name WHERE num= '$DBMARKER'";
		$result = mysql_query($DBchart) or die (mysql_error());
		$data = mysql_fetch_array($result);
		
		echo $data[name]."//".$data[value1]."//".$data[value2]."//".$data[value3]."//".$data[value4];
	}
	
	if($BlueCount == 1){
		$DBchart = "SELECT * FROM $MapDB_name WHERE num= '$DBMARKER'";
		$result = mysql_query($DBchart) or die (mysql_error());
		$data = mysql_fetch_array($result);
		
		$DBchartzz = "SELECT * FROM $GraphDB_name1 WHERE num= '$DBMARKER'";
		$resultzz = mysql_query($DBchartzz) or die (mysql_error());
		$datazz = mysql_fetch_array($resultzz);
	
		echo $data[name]."//".$data[value1]."//".$data[value2]."//".$data[value3]."//".$data[value4]."//".$datazz[value1]."//".$datazz[value2]."//".$datazz[value3];
	}
	
	if($BlueCount == 2){
		$DBchart = "SELECT * FROM $MapDB_name WHERE num= '$DBMARKER'";
		$result = mysql_query($DBchart) or die (mysql_error());
		$data = mysql_fetch_array($result);
	
		$DBchartzz = "SELECT * FROM $GraphDB_name1 WHERE num= '$DBMARKER'";
		$resultzz = mysql_query($DBchartzz) or die (mysql_error());
		$datazz = mysql_fetch_array($resultzz);
		
		$DBchartxx = "SELECT * FROM $GraphDB_name2 WHERE num= '$DBMARKER'";
		$resultxx = mysql_query($DBchartxx) or die (mysql_error());
		$dataxx = mysql_fetch_array($resultxx);
	
		echo $data[name]."//".$data[value1]."//".$data[value2]."//".$data[value3]."//".$data[value4]."//".$datazz[value1]."//".$datazz[value2]."//".$datazz[value3]."//".$dataxx[value1]."//".$dataxx[value2]."//".$dataxx[value3];
	}


/*
//항목선택이 아닌 지역 특색을 볼 경우
else{
	switch ($regionalspecific){
		
		case 22010 :	//중구
			//사업체(금융및보험)
			$DBchartJungGu1 = "SELECT * FROM sgis_company WHERE num= '$DBMARKER'";
			$resultJungGu1 = mysql_query($DBchartJungGu1) or die (mysql_error());
			$dataJungGu1 = mysql_fetch_array($resultJungGu1);
			
			//종사자(금융및보험)
			$DBchartJungGu2 = "SELECT * FROM sgis_practician WHERE num= '$DBMARKER'";
			$resultJungGu2 = mysql_query($DBchartJungGu2) or die (mysql_error());
			$dataJungGu2 = mysql_fetch_array($resultJungGu2);
			
			echo $dataJungGu1[name]."//".$dataJungGu1[value1]."//".$dataJungGu1[value2]."//".$dataJungGu1[value3]."//".$dataJungGu1[value4]."//".$dataJungGu2[value1]."//".$dataJungGu2[value2]."//".$dataJungGu2[value3];
			break;
			
		case 22020 :	//동구
			//국민연금(사망연금)
			$DBchartDongGu1 = "SELECT * FROM sgis_pension WHERE num= '$DBMARKER'";
			$resultDongGu1 = mysql_query($DBchartDongGu1) or die (mysql_error());
			$dataDongGu1 = mysql_fetch_array($resultDongGu1);
			
			echo $DBchartDongGu1[name]."//".$dataDongGu1[value1]."//".$dataDongGu1[value2]."//".$dataDongGu1[value3];
			break;
			
		case 22030 :	//서구
			break;
			
		case 22040 :	//남구
			//토지(대지)
			$DBchartNamGu1 = "SELECT * FROM sgis_ground WHERE num= '$DBMARKER'";
			$resultNamGu1 = mysql_query($DBchartNamGu1) or die (mysql_error());
			$dataNamGu1 = mysql_fetch_array($resultNamGu1);
			
			//자동차단속(신호위반)
			$DBchartNamGu2 = "SELECT * FROM sgis_car WHERE num= '$DBMARKER'";
			$resultNamGu2 = mysql_query($DBchartNamGu2) or die (mysql_error());
			$dataNamGu2 = mysql_fetch_array($resultNamGu2);
			
			echo $DBchartNamGu1[name]."//".$dataNamGu1[value1]."//".$dataNamGu1[value2]."//".$dataNamGu1[value3]."//".$dataNamGu1[value4]."//".$dataNamGu2[value1]."//".$dataNamGu2[value2]."//".$dataNamGu2[value3];
			break;
			
		case 22050 :	//북구
			
			//사업체(제조업, 도소매업)
			$DBchartBukGu1 = "SELECT * FROM sgis_company WHERE num= '$DBMARKER'";
			$resultBukGu1 = mysql_query($DBchartBukGu1) or die (mysql_error());
			$dataBukGu1 = mysql_fetch_array($resultBukGu1);
			
			//자동차단속(속도위반, 안전띠)
			$DBchartBukGu2 = "SELECT * FROM sgis_car WHERE num= '$DBMARKER'";
			$resultBukGu2 = mysql_query($DBchartBukGu2) or die (mysql_error());
			$dataBukGu2 = mysql_fetch_array($resultBukGu2);
			
			//종사자(도소매업)
			$DBchartBukGu3 = "SELECT * FROM sgis_practician WHERE num= '$DBMARKER'";
			$resultBukGu3 = mysql_query($DBchartBukGu3) or die (mysql_error());
			$dataBukGu3 = mysql_fetch_array($resultBukGu3);
				
			//국민연금(장애연금)
			$DBchartBukGu4 = "SELECT * FROM sgis_pension WHERE num= '$DBMARKER'";
			$resultBukGu4 = mysql_query($DBchartBukGu4) or die (mysql_error());
			$dataBukGu4 = mysql_fetch_array($resultBukGu4);
			
			echo $DBchartBukGu1[name]."//".$dataBukGu1[value1]."//".$dataBukGu1[value2]."//".$dataBukGu2[value1]."//".$dataBukGu2[value3]."//".$dataBukGu3[value2]."//".$dataBukGu4[value2];
			break;
			
		case 22060 :	//수성구
			//토지거래(상업지역), 학생(학생수,진학자,입학자), 자동차단속(신호위반), 국민연금(노령연금)
			$DBchartSuseongGu1 = "SELECT * FROM sgis_ground WHERE num= '$DBMARKER'";
			$resultSuseongGu1 = mysql_query($DBchartSuseongGu1) or die (mysql_error());
			$dataSuseongGu1 = mysql_fetch_array($resultSuseongGu1);
			
			$DBchartSuseongGu2 = "SELECT * FROM sgis_school WHERE num= '$DBMARKER'";
			$resultSuseongGu2 = mysql_query($DBchartSuseongGu2) or die (mysql_error());
			$dataSuseongGu2 = mysql_fetch_array($resultSuseongGu2);
			
			$DBchartSuseongGu3 = "SELECT * FROM sgis_car WHERE num= '$DBMARKER'";
			$resultSuseongGu3 = mysql_query($DBchartSuseongGu3) or die (mysql_error());
			$dataSuseongGu3 = mysql_fetch_array($resultSuseongGu3);
			
			$DBchartSuseongGu4 = "SELECT * FROM sgis_pension WHERE num= '$DBMARKER'";
			$resultSuseongGu4 = mysql_query($DBchartSuseongGu4) or die (mysql_error());
			$dataSuseongGu4 = mysql_fetch_array($resultSuseongGu4);
			
			echo $dataSuseongGu1[name]."//".$dataSuseongGu1[value2]."//".$dataSuseongGu2[value1]."//".$dataSuseongGu2[value2]."//".$dataSuseongGu2[value3]."//".$dataSuseongGu3[value2]."//".$dataSuseongGu4[value1];
			break;
			
		case 22070 :	//달서구
			//사업체(운수업), 토지거래(주거지역), 종사자(제조업)
			$DBchartDalseoGu1 = "SELECT * FROM sgis_company WHERE num= '$DBMARKER'";
			$resultDalseoGu1 = mysql_query($DBchartDalseoGu1) or die (mysql_error());
			$dataDalseoGu1 = mysql_fetch_array($resultDalseoGu1);
			
			$DBchartDalseoGu2 = "SELECT * FROM sgis_ground WHERE num= '$DBMARKER'";
			$resultDalseoGu2 = mysql_query($DBchartDalseoGu2) or die (mysql_error());
			$dataDalseoGu2 = mysql_fetch_array($resultDalseoGu2);
			
			$DBchartDalseoGu3 = "SELECT * FROM sgis_practician WHERE num= '$DBMARKER'";
			$resultDalseoGu3 = mysql_query($DBchartDalseoGu3) or die (mysql_error());
			$dataDalseoGu3 = mysql_fetch_array($resultDalseoGu3);
			
			echo $dataDalseoGu1[name]."//".$dataDalseoGu1[value3]."//".$dataDalseoGu2[value1]."//".$dataDalseoGu3[value1];
			break;
			
		case 22310 :	//달성군
			//토지거래(공업지역)
			$DBchartDalseongGun1 = "SELECT * FROM sgis_ground WHERE num= '$DBMARKER'";
			$resultDalseongGun1 = mysql_query($DBchartDalseongGun1) or die (mysql_error());
			$dataDalseongGun1 = mysql_fetch_array($resultDalseongGun1);
			
			echo $dataDalseongGun1[name]."//".$dataDalseongGun1[value1]."//".$dataDalseongGun1[value2]."//".$dataDalseongGun1[value3]."//".$dataDalseongGun1[value4];
			break;
	}
}
*/

?>