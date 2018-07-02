<!DOCTYPE html>
<html>
<?
  include ("connect_db.php");
?>
<head>
<title>SOP JavaScript : Marker zIndex sample</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="https://sgisapi.kostat.go.kr/OpenAPI3/auth/javascriptAuth?consumer_key=590a2718c58d41d9ae3b"></script>
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart']}]}"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" type="text/css" href="index.css"/>
</head>
<style type="text/css">

</style>

<body>
		<div id="header"><a href="http://mslsgis.dothome.co.kr/index3.php" style="margin-left:auto;margin-right:auto;"><img src="/image/타이틀.jpg" border="0"></a></div>

		<!----------------------- 본문 시작 ---------------------------------->
		<div id="all_div">
			<div id="all_div_inner">
			<div id="left_div">
				<!-- 왼쪽 div, SGIS의 소개 및 링크 그리고 메뉴얼 항목 추가-->
				<iframe src="http://mslsgis.dothome.co.kr/test6.php" width=250 height=760 frameborder=0>
				</iframe>
			</div><!-- left_div 끝 -->
			<div id="center_div">
					<div id="center_up_div">
					<!--중앙 상단 div 지도 항목 추가-->
					<div id="map"></div>
					</div><!-- center_up_div 끝 -->
					<div id="center_down_div">
					<!-- 중앙 하단 div 그래프 및 설명 항목 추가 -->
					<div id="side">
				<a style="font-size: 15px;">원하는 지역 선택 :</a> 

			 	<select id="mySelect" onchange = "javascript:didSelectBox(this.value);">	
			 		<option value="22" selected="selected" >전체 보기</option>
					<option value="22040">남구</option>
			    	<option value="22070">달서구</option>
			    	<option value="22310">달성군</option>
			    	<option value="22020">동구</option>
			    	<option value="22050">북구</option>
			    	<option value="22030">서구</option>
			    	<option value="22060">수성구</option>
			    	<option value="22010">중구</option>
		    	</select>
			
			<div id= "MapText"  style="text-align: center; margin:0 auto; width :650px;"></div>
			<div id="chart_div" style="text-align: center; margin:0 auto; width :90%;"></div>
			</div>
					</div><!-- center_down_div 끝 -->
			</div><!-- center_div 끝 -->

			<div id="right_div">
				<!-- 오른쪽 div 제어버튼 항목 추가-->
				<div class="menuSelectBar1" id="menuSelectBar1"">
				<form name="redZone">
				<div class="test1" style="float:left; margin: 0 auto; " >
					<label class="switchRED switchRED-slide">
						<input class="switchRED-input" name="category1[]" onclick='REDbtn(0,"인구");' value="인구" type="checkbox" />
						<span class="switchRED-label" data-on="인구" data-off="인구"></span> 
					</label>
				</div>
				<div class="test2" style="float:left;margin: 0 auto; ">
					<label class="switchRED switchRED-slide">
						<input class="switchRED-input" name="category1[]" onclick='REDbtn(1,"사업체");' value="사업체" type="checkbox" />
						<span class="switchRED-label" data-on="사업체수" data-off="사업체수"></span> 
						
					</label>
				</div>
				<div class="test3" style="float:left;margin: 0 auto; ">
					<label class="switchRED switchRED-slide">
						<input class="switchRED-input" name="category1[]" onclick='REDbtn(2,"토지");'value="토지" type="checkbox" />
						<span class="switchRED-label" data-on="부동산 중개업" data-off="부동산 중개업"></span> 
						
					</label>
				</div>
				</form>
				<div class="test4" style="float:left;margin: 0 auto; ">
					<label class="switch switch-slide">
						<!--<input class="switch-input" name="category2[]" onclick='BLUEbtn(0,"종사자");' type="checkbox" />!-->
						<input class="switch-input" type="checkbox" id="bluebtn1" onclick="BLUEbtnView('학생');">
						<span class="switch-label" data-on="고등학생 현황" data-off="고등학생 현황"></span> 
						
					</label>
				</div>
				<div class="test5" style="float:left;margin: 0 auto; ">
					<label class="switch switch-slide">
						<!--<input class="switch-input" name="category2[]" onclick='BLUEbtn(1,"차량단속");' type="checkbox" />!-->
						<input class="switch-input" type="checkbox" id="bluebtn2" onclick="BLUEbtnView('차량단속');">
						<span class="switch-label" data-on="차량 단속 성과" data-off="차량 단속 성과"></span> 
						
					</label>
				</div>
				<div class="test6"style="float:left;margin: 0 auto; ">
					<label class="switch switch-slide">
						<!--<input class="switch-input" name="category2[]" onclick='BLUEbtn(2,"차량등록");' type="checkbox" />!-->
						<input class="switch-input" type="checkbox" id="bluebtn3" onclick="BLUEbtnView ('종사자');">
						<span class="switch-label" data-on="산업별 종사자" data-off="산업별 종사자"></span> 
						
					</label>
				</div>
				<div class="test7" style="float:left;margin: 0 auto; ">
					<label class="switch switch-slide">
						<!--<input class="switch-input" name="category2[]" onclick='BLUEbtn(3,"학생");' type="checkbox" />!-->
						<input class="switch-input" type="checkbox" id="bluebtn4" onclick="BLUEbtnView('차량등록');">
						<span class="switch-label" data-on="차량 등록 현황" data-off="차량 등록 현황"></span> 
						
					</label>
				</div>
				<div class="test8" style="float:left;margin: 0 auto; ">
					<label class="switch switch-slide">
						<!--<input class="switch-input" name="category2[]" onclick='BLUEbtn(4,"국민연금");' type="checkbox" /> !-->
						<input class="switch-input" type="checkbox" id="bluebtn6" onclick="BLUEbtnView('국민연금');">
						<span class="switch-label" data-on="국민연금 지급현황" data-off="국민연금 지급현황"></span> 
						
					</label>
				</div>
				
				<div class="test9"style="float:left;margin: 0 auto; ">
					<label class="switch switch-slide">
						<!--<input class="switch-input" name="category2[]" onclick='BLUEbtn(5,"개발제한지역");' type="checkbox" /> !-->
						<input class="switch-input" type="checkbox" id="bluebtn7" onclick="BLUEbtnView('개발제한지역');">
						<span class="switch-label" data-on="개발제한 지역현황" data-off="개발제한 지역현황"></span> 
						
					</label>
				</div>
				
				<div class="test10" style="float:left;margin: 0 auto; ">
					<label class="switch switch-slide">
						<!--<input class="switch-input" name="category2[]" onclick='BLUEbtn(6,"통근,통학 유형현황");' type="checkbox" /> !-->
						<input class="switch-input" type="checkbox" id="bluebtn8" onclick="BLUEbtnView('통근통학');">
						<span class="switch-label" data-on="통근,통학 유형현황" data-off="통근,통학 유형현황"></span> 
						
					</label>
				</div>
							<div id= "Logo" >
				<a href="http://sgis.kostat.go.kr/html/index.html"><img src="/image/SGIS_logo.png" border="0"></a>
				<a href="http://cms.daegu.ac.kr/chaka/"><img src="/image/MSL.jpg" border="0"></a>
			</div>
			</div>
			


			</div><!-- right_div 끝 -->
			</div>
		</div><!-- all_div 끝 -->

				<!----------------------- 본문 끝 ---------------------------------->
<script type="text/javascript">

var Temp_adm_cd = 22;
test = null;
firstSequence = null;
$(document).ready(function () {
	createMap();	//지도생성
	//reqOpenApiBoundaryHadmarea("22", "2013", "1"); //대구광역시 경계호출 (22: 대구광역시코드, 2013:최신경계년도, "1": 하위경계단계)
	drawChart(22);
	test = true;
});



var map = null;				//지도객체
var mapOptions = null; 		//지도생성 옵션
var accessToken = null; 	//엑세스토큰
var marker = null; 			//마커객체
var geojson = null; 		//경계정보	
var data = []; 				//통계정보
var valPerSlice = [];		//범례기준정보 
var legendValue = [];		//범례정보
var selectValue = 22;		//셀렉트 박스 선택값
var LegendText = "<div id='legend'></div>";
firstStart = null;
var ShowData, RedButton;					// 통계데이터 중 화면에 표출한 정보 파라미터명, 버튼 카운터
var BlueButton1 = null,BlueButton2 = null,BlueButton3 = null;	// 그래프로만 나오는 버튼
var BlueCount = 0;							// BlueButton의 선택된 수
var maxChecked = 2;  						// 체크박스를 선택 가능한 갯수
var regionalspecific = null;
testAreaValue = 22;
var Xaxis1,Xaxis2,Xaxis3,Xaxis4,Xaxis5,Xaxis6,Xaxis7,Xaxis8,Xaxis9,Xaxis10;	//X축 항목

var checkboxs1 = document.getElementsByName("category1[]"); 
var BLUEcheckboxs1 = document.getElementById("bluebtn1"); 
var BLUEcheckboxs2 = document.getElementById("bluebtn2"); 
var BLUEcheckboxs3 = document.getElementById("bluebtn3"); 
var BLUEcheckboxs4 = document.getElementById("bluebtn4"); 
var BLUEcheckboxs5 = document.getElementById("bluebtn6"); 
var BLUEcheckboxs6 = document.getElementById("bluebtn7"); 
var BLUEcheckboxs7 = document.getElementById("bluebtn8"); 
var CallStaticCodeTemp = null;


var REDbtn = function(BTdata, ctgName){
		var REDbox_count=0;
		var REDFbox_count=0;
		
		//alert('test' + checkboxs1.length);
		var tempBefore = 0;
		//최소 RED 버튼 1개 이상 활성화
		
		//-----------------------------------------RED BUTTON 제어 시작
        for (var i = 0; i < checkboxs1.length; i++){ 
            if(eval(checkboxs1[i].checked) == true){
            //box_count++;
			//alert("테스트 1 : " + REDbox_count);
				
				//box_count++;
				checkboxs1[i].checked = false;
				//alert("테스트 2 : " + tempbefore + " : " + i);
				if(i == BTdata){
				checkboxs1[i].checked = true;
				tempBefore = i;
				REDbtnView(ctgName);
				}  
			}
			else if(eval(checkboxs1[i].checked) == false){
				REDFbox_count++;
					if(REDFbox_count == 3){
					alert("최소 1개 이상 선택하여 주십시오");
					checkboxs1[BTdata].checked = true;						
					}
				}
		}
		//-----------------------------------------RED BUTTON 제어 종료

		//
	
		//alert("테스트 3 : " + REDFbox_count);
		//box_count++;
		//alert(REDbox_count);
		//alert(checkArray);

		//모든 버튼의 활성화 여부를 검사 하고, 활성화된 값만을 사용하여 그래프에 표시한다.
}

var managementMenuBar = function(BTdata,Num){
	//alert("버튼이 체크 되었음 : " + BTdata +" : "+Num);
	//여기서 메뉴에 있는 버튼들을 관리 한다.
	//각 버튼 클릭 시, 각 View를 담당하는 함수로 해당 정보를 넘길 것.
	//지역 선택 시 자료를 분석하여, 각 지역에 해당하는 특징에 해당하는 "버튼" 을 활성화
	//버튼이 선택한 상태로 지역이 변경되어도 유지가 되어야 한다.

	//현재 초기에는 인구와 사업체가 선택되어 있어야함
	//인구를 비활성화 했을 때, 사업체 정보만 나타나도록 해야 함.
	//checkcategory(BTdata);
	//document.getElementById("menuSelectBar1").style.display="none";
	

}



var REDbtnView = function(ctgName){
	//alert("red zone " + ctgName);
	//alert('이거 값 나오면 되는건데? : ' + testAreaValue);
	firstStart = true;
	if(regionalspecific != null)
	{
		var AreaCode = regionalspecific;
	}else{
		var AreaCode = 22;
	}

	if(ctgName == "사업체")
	{
	RedButton = "company";
	ShowData == "corp_cnt";
	drawChart(testAreaValue);
	reqOpenApiCompany(testAreaValue, successCallback);	//대구광역시 사업체통계정보요청 
	function successCallback(tmpData) {
		data = tmpData;
		for (var i=0; i<data.length; i++) {
			data[i]["showData"] = "corp_cnt";	// 통계데이터 중 화면에 표출한 정보 파라미터명
			data[i]["unit"] = "개";				// 표출정보 단위
		}
		reqOpenApiBoundaryHadmarea(testAreaValue, "2013", "1");
	}

	}
	else if(ctgName == "인구")
	{
		drawChart(testAreaValue);
	reqOpenApiPopulation(testAreaValue, successCallback);	//대구광역시 인구통계정보요청 
	function successCallback(tmpData) {
		data = tmpData;
		for (var i=0; i<data.length; i++) {
			data[i]["showData"] = "population";	// 통계데이터 중 화면에 표출한 정보 파라미터명
			data[i]["unit"] = "명";				// 표출정보 단위
		}
		reqOpenApiBoundaryHadmarea(testAreaValue, "2013", "1");
	}

	ShowData = "population";
	RedButton = "population";
	doReqPopulation();
	
	}

	else if (ctgName == "토지")
	{

	drawChart(testAreaValue);
	reqOpenApiGround(testAreaValue, successCallback);	//대구광역시 토지통계정보요청 
	function successCallback(tmpData) {
		data = tmpData;
		for (var i=0; i<data.length; i++) {
			data[i]["showData"] = "corp_cnt";	// 통계데이터 중 화면에 표출한 정보 파라미터명
			data[i]["unit"] = "개";				// 표출정보 단위
		}
		reqOpenApiBoundaryHadmarea(testAreaValue, "2013", "1");
	}

	ShowData = "corp_cnt";
	RedButton = "ground";


	}
	
}

var BLUEbtnView = function(CallStaticCode, AreaCode){
	//alert("red zone " + ctgName);
	//alert('블루버튼 뷰에서 받은 에리어 코드 : ' + testAreaValue);
	firstStart = true;
	var innerAreaCode = 0;
	if(CallStaticCodeTemp != null){
	innerAreaCode = CallStaticCodeTemp;
	//alert('나와야 한다 : ' + innerAreaCode);
	}else{
	
		if(AreaCode == null)
		{
			//AreaCode = 22;
			innerAreaCode = 22;
			//alert('내부 if 에리어 : '+ testAreaValue);
		}
	}
	
	//CallStaticCodeTemp = CallStaticCode;
	//alert(BlueCount);
	if(testAreaValue == null)
	{
		switch(CallStaticCode){
		case "학생":
			doReqSchool(innerAreaCode);
			break;
		case "차량단속":
			doReqCar(innerAreaCode);
			break;
		case "종사자":
			doReqPractician(innerAreaCode);
			break;
		case "차량등록":
			doReqCarEnroll(innerAreaCode);
			break;
		case "국민연금":
			doReqPension(innerAreaCode);
			break;
		case "개발제한지역":
			doReqLimitedDevelop(innerAreaCode);
			break;
		case "통근통학":
			doReqCommute(innerAreaCode);
			break;
		}
	}else{
		switch(CallStaticCode){
		case "학생":
			doReqSchool(testAreaValue);
			break;
		case "차량단속":
			doReqCar(testAreaValue);
			break;
		case "종사자":
			doReqPractician(testAreaValue);
			break;
		case "차량등록":
			doReqCarEnroll(testAreaValue);
			break;
		case "국민연금":
			doReqPension(testAreaValue);
			break;
		case "개발제한지역":
			doReqLimitedDevelop(testAreaValue);
			break;
		case "통근통학":
			doReqCommute(testAreaValue);
			break;
		}
	}
}


var navigatormanagment = function(BTdata){
	//alert(BTdata.checked);
	if(BTdata.checked){
		document.getElementById("menuSelectBar2").style.display="block";
		document.getElementById("menuSelectBar1").style.display="none";
	}
	if(!BTdata.checked){
		document.getElementById("menuSelectBar1").style.display="block";
		document.getElementById("menuSelectBar2").style.display="none";
	}
	//여기서 메뉴에 있는 버튼들을 관리 한다.
	//각 버튼 클릭 시, 각 View를 담당하는 함수로 해당 정보를 넘길 것.
	//지역 선택 시 자료를 분석하여, 각 지역에 해당하는 특징에 해당하는 "버튼" 을 활성화
	//버튼이 선택한 상태로 지역이 변경되어도 유지가 되어야 한다.

	//json 방식으로 인구정보 나타내는 부분(지도) 붉은색 토글 버튼
	//서버 파싱 방식으로 사업체 및 인구정보 나타내는 부분(그래프) 푸른색 토글 버튼
}

//지도생성

var createMap = function() {
	mapOptions = {
		ollehTileLayer: true,
		measureControl: false,
		zoomSliderControl: false,
		panControl: false,
		attributionControl: false
	};

	checkboxs1[0].checked = true;
	map = sop.map("map", mapOptions);
	map.setView([1096230, 1759759], 4);

	//-----초기 인구 설정 불러오기
	reqOpenApiPopulation("22", successCallback);	//대구광역시 인구통계정보요청 
	function successCallback(tmpData) {
		data = tmpData;
		for (var i=0; i<data.length; i++) {
			data[i]["showData"] = "population";	// 통계데이터 중 화면에 표출한 정보 파라미터명
			data[i]["unit"] = "명";				// 표출정보 단위
		}
		//reqOpenApiBoundaryHadmarea("22", "2013", "1");
	}



	ShowData = "population";
	RedButton = "population";
	doReqPopulation();

	var Prefix = "<font size = 2>범례</font>";

	var attr = sop.control.attribution({
		  position:"bottomleft",
		  prefix: Prefix
	});
	//-----초기 인구 설정 불러오기
	 attr.addAttribution(LegendText); // attribution 추가

    attr.addTo(map);
	//alert(aa);

};



//인구통계정보를 요청한다.
function doReqPopulation(){
	if(testAreaValue == null){
	reqOpenApiPopulation("22", successCallback);	//대구광역시 인구통계정보요청 
	function successCallback(tmpData) {
		data = tmpData;
		for (var i=0; i<data.length; i++) {
			data[i]["showData"] = "population";	// 통계데이터 중 화면에 표출한 정보 파라미터명
			data[i]["unit"] = "명";				// 표출정보 단위
		}
		reqOpenApiBoundaryHadmarea("22", "2013", "1");
		}
	}else{
	reqOpenApiPopulation(testAreaValue, successCallback);	//대구광역시 인구통계정보요청 
	function successCallback(tmpData) {
		data = tmpData;
		for (var i=0; i<data.length; i++) {
			data[i]["showData"] = "population";	// 통계데이터 중 화면에 표출한 정보 파라미터명
			data[i]["unit"] = "명";				// 표출정보 단위
		}
		reqOpenApiBoundaryHadmarea(testAreaValue, "2013", "1");
		}
	}
	//drawChart(testAreaValue);
	
};


//초기화한다.
var doClear = function() {
	//alert('Clear');
	doRemoveMarker();
	reqOpenApiBoundaryHadmarea("22", "2013", "1");
	map.setView([1096230, 1759759], 5);
}; 


//학교통계정보를 요청한다.
function doReqSchool(AreaCode){
		
		if(bluebtn1.checked == 1){
			BlueCount++;

			if (BlueCount > maxChecked) {
				alert ("최대 2개 까지만 가능합니다.");
				bluebtn1.checked = false;
			    BlueCount--;
			}
			
			if(BlueButton1 == null){BlueButton1 = "sgis_school";}
			if(BlueButton1 != null && BlueButton2 == null && BlueButton1 != "sgis_school"){BlueButton2 = "sgis_school";}
			else{BlueButton3 = "sgis_school";}
		}
	
		else{
			BlueCount--;
			if(BlueButton1 == "sgis_school"){
				BlueButton1 = BlueButton2; BlueButton2 = null;
				}
			else{BlueButton2 = null;}
		}

		//현재 선택되어진 지도&그래프 항목 확인
		//행정코드를 22로 하여 대구광역시 전체가 보이도록 초기화
		if(ShowData == "population" && RedButton == "population")
		{
			reqOpenApiPopulation(AreaCode, successCallback);
		}
		else if(ShowData == "corp_cnt" && RedButton == "company")
		{
			reqOpenApiCompany(AreaCode, successCallback);
		}
		else if(ShowData == "corp_cnt" && RedButton == "ground")
		{
			reqOpenApiGround(AreaCode, successCallback);
		}

		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(AreaCode, "2013", "1");
		}
	
		drawChart(AreaCode);
}

//자동차통계정보를 요청한다.
function doReqCar(AreaCode){

		if(bluebtn2.checked == 1){
			BlueCount++;

			if (BlueCount > maxChecked) {
				alert ("최대 2개 까지만 가능합니다.");
				bluebtn2.checked = false;
			    BlueCount--;
			}
			
			if(BlueButton1 == null){BlueButton1 = "sgis_car";}
			if(BlueButton1 != null && BlueButton2 == null && BlueButton1 != "sgis_car"){BlueButton2 = "sgis_car";}
			else{BlueButton3 = "sgis_car";}
		}
	
		else{
			BlueCount--;
			if(BlueButton1 == "sgis_car"){BlueButton1 = BlueButton2; BlueButton2 = null;}
			else{BlueButton2 = null;}
		}

		//현재 선택되어진 지도&그래프 항목 확인
		//행정코드를 22로 하여 대구광역시 전체가 보이도록 초기화\

		if(ShowData == "population" && RedButton == "population"){reqOpenApiPopulation(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "company"){reqOpenApiCompany(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "ground"){reqOpenApiGround(AreaCode, successCallback);}

		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(AreaCode, "2013", "1");
		}
	drawChart(AreaCode);
}

//종사자통계정보를 요청한다.
function doReqPractician(AreaCode){

		if(bluebtn3.checked == 1){
			BlueCount++;

			if (BlueCount > maxChecked) {
				alert ("최대 2개 까지만 가능합니다.");
				bluebtn3.checked = false;
			    BlueCount--;
			}
			
			if(BlueButton1 == null){BlueButton1 = "sgis_practician";}
			if(BlueButton1 != null && BlueButton2 == null && BlueButton1 != "sgis_practician"){BlueButton2 = "sgis_practician";}
			else{BlueButton3 = "sgis_practician";}
		}
	
		else{
			BlueCount--;
			if(BlueButton1 == "sgis_practician"){BlueButton1 = BlueButton2; BlueButton2 = null;}
			else{BlueButton2 = null;}
		}
		//현재 선택되어진 지도&그래프 항목 확인
		//행정코드를 22로 하여 대구광역시 전체가 보이도록 초기화
		if(ShowData == "population" && RedButton == "population"){reqOpenApiPopulation(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "company"){reqOpenApiCompany(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "ground"){reqOpenApiGround(AreaCode, successCallback);}

		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(AreaCode, "2013", "1");
		}
drawChart(AreaCode);

}

//자동차등록통계정보를 요청한다.
function doReqCarEnroll(AreaCode){

		if(bluebtn4.checked == 1){
			BlueCount++;

			if (BlueCount > maxChecked) {
				alert ("최대 2개 까지만 가능합니다.");
				bluebtn4.checked = false;
			    BlueCount--;
			}
			
			if(BlueButton1 == null){BlueButton1 = "sgis_carenroll";}
			if(BlueButton1 != null && BlueButton2 == null && BlueButton1 != "sgis_carenroll"){BlueButton2 = "sgis_carenroll";}
			else{BlueButton3 = "sgis_carenroll";}
		}
	
		else{
			BlueCount--;
			if(BlueButton1 == "sgis_carenroll"){BlueButton1 = BlueButton2; BlueButton2 = null;}
			else{BlueButton2 = null;}
		}
		
		//현재 선택되어진 지도&그래프 항목 확인
		//행정코드를 22로 하여 대구광역시 전체가 보이도록 초기화
		if(ShowData == "population" && RedButton == "population"){reqOpenApiPopulation(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "company"){reqOpenApiCompany(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "ground"){reqOpenApiGround(AreaCode, successCallback);}

		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(AreaCode, "2013", "1");
		}
drawChart(AreaCode);
}

//주택종류통계정보를 요청한다.
function doReqHouse(){

		if(bluebtn5.checked == 1){
			BlueCount++;

			if (BlueCount > maxChecked) {
				alert ("최대 2개 까지만 가능합니다.");
				bluebtn5.checked = false;
			    BlueCount--;
			}
			
			if(BlueButton1 == null){BlueButton1 = "sgis_house";}
			if(BlueButton1 != null && BlueButton2 == null && BlueButton1 != "sgis_house"){BlueButton2 = "sgis_house";}
			else{BlueButton3 = "sgis_house";}
		}
	
		else{
			BlueCount--;
			if(BlueButton1 == "sgis_house"){BlueButton1 = BlueButton2; BlueButton2 = null;}
			else{BlueButton2 = null;}
		}

		//현재 선택되어진 지도&그래프 항목 확인
		//행정코드를 22로 하여 대구광역시 전체가 보이도록 초기화
		if(ShowData == "population" && RedButton == "population"){reqOpenApiPopulation("22", successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "company"){reqOpenApiCompany("22", successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "ground"){reqOpenApiGround("22", successCallback);}

		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(AreaCode, "2013", "1");
		}


}


//---연금정보
function doReqPension(AreaCode){

		if(bluebtn6.checked == 1){
			BlueCount++;

			if (BlueCount > maxChecked) {
				alert ("최대 2개 까지만 가능합니다.");
				bluebtn6.checked = false;
			    BlueCount--;
			}
			
			if(BlueButton1 == null)
			{
				BlueButton1 = "sgis_pension";
			}
			if(BlueButton1 != null && BlueButton2 == null && BlueButton1 != "sgis_pension"){BlueButton2 = "sgis_pension";}
			else{BlueButton3 = "sgis_pension";}
		}
	
		else{
			BlueCount--;
			if(BlueButton1 == "sgis_pension"){BlueButton1 = BlueButton2; BlueButton2 = null;}
			else{BlueButton2 = null;}
		}
		//현재 선택되어진 지도&그래프 항목 확인
		//행정코드를 22로 하여 대구광역시 전체가 보이도록 초기화
		if(ShowData == "population" && RedButton == "population"){reqOpenApiPopulation(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "company"){reqOpenApiCompany(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "ground"){reqOpenApiGround(AreaCode, successCallback);}
																			//22가 아닌 내가 선택한 구의 인자를 받을 것.
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(AreaCode, "2013", "1");
		}
drawChart(AreaCode);
}

//개발제한지역
function doReqLimitedDevelop(AreaCode){

		if(bluebtn7.checked == 1){
			BlueCount++;

			if (BlueCount > maxChecked) {
				alert ("최대 2개 까지만 가능합니다.");
				bluebtn7.checked = false;
			    BlueCount--;
			}
			
			if(BlueButton1 == null){BlueButton1 = "sgis_limited";}
			if(BlueButton1 != null && BlueButton2 == null && BlueButton1 != "sgis_limited"){BlueButton2 = "sgis_limited";}
			else{BlueButton3 = "sgis_limited";}
		}
	
		else{
			BlueCount--;
			if(BlueButton1 == "sgis_limited"){BlueButton1 = BlueButton2; BlueButton2 = null;}
			else{BlueButton2 = null;}
		}

		//현재 선택되어진 지도&그래프 항목 확인
		//행정코드를 22로 하여 대구광역시 전체가 보이도록 초기화\

		if(ShowData == "population" && RedButton == "population"){reqOpenApiPopulation(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "company"){reqOpenApiCompany(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "ground"){reqOpenApiGround(AreaCode, successCallback);}

		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(AreaCode, "2013", "1");
		}
	drawChart(AreaCode);
}

//개발제한지역
function doReqCommute(AreaCode){

		if(bluebtn8.checked == 1){
			BlueCount++;

			if (BlueCount > maxChecked) {
				alert ("최대 2개 까지만 가능합니다.");
				bluebtn8.checked = false;
			    BlueCount--;
			}
			
			if(BlueButton1 == null){BlueButton1 = "sgis_commute";}
			if(BlueButton1 != null && BlueButton2 == null && BlueButton1 != "sgis_commute"){BlueButton2 = "sgis_commute";}
			else{BlueButton3 = "sgis_commute";}
		}
	
		else{
			BlueCount--;
			if(BlueButton1 == "sgis_commute"){BlueButton1 = BlueButton2; BlueButton2 = null;}
			else{BlueButton2 = null;}
		}

		//현재 선택되어진 지도&그래프 항목 확인
		//행정코드를 22로 하여 대구광역시 전체가 보이도록 초기화\

		if(ShowData == "population" && RedButton == "population"){reqOpenApiPopulation(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "company"){reqOpenApiCompany(AreaCode, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "ground"){reqOpenApiGround(AreaCode, successCallback);}

		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(AreaCode, "2013", "1");
		}
	drawChart(AreaCode);
}

//---
//경계설 설정한다.
var setPolygonGeojson = function(geoData) {
	var type = "normal"; //일반경계일 경우
	//기존에 살아있는 경계를 지운다.
	if (geojson) {
		geojson.remove();
		geojson = null;
	}

	// 경계데이터에 통계정보를 병합하고, 경계를 그린다.
	if (data.length > 0) {					
		type = "data"; //데이터가 있을경우 타입
		geoData = combineStatsData(geoData);
	}
				
	addPolygonGeojson(geoData, type);
	select_list();
	data = [];	
};

//지도경계를 그린다.
var addPolygonGeojson = function(geo, type) {
	if (geojson != null) {
		geojson.remove();
	}
	var tmpGeojson = sop.geoJson(geo, {
		style : setPolygonGeoJsonStyle(type),
		onEachFeature : function (feature, layer) {
			setLayerColor(feature, layer);

			//곙계의 이벤트를 설정한다.
			layer.on({
			
				//mouseover 이벤트 : 경계에 마우스를 올렸을 때 호출
				mouseover : function (e) {
					var layer = e.target;
					layer.setStyle({
						weight : 3.5,
						color : "#0086c6",
						dashArray : layer.options.dashArray,
						fillOpacity : layer.options.fillOpacity,
						fillColor : layer.options.fillColor
					});
				
					if (!sop.Browser.ie) {
						layer.bringToFront();
					}
					
					didMouseOverPolygon(e, feature, layer.options.type);
					
				},
				
				//mouseout 이벤트 : 경계에서 마우스가 벗어났을 때 호출
				mouseout : function (e) {
					var layer = e.target;
					var color = "#666666";
					var weight = 2.5;
					
					if (layer.options.type == "data") {
						color = "white";
					}
					
					layer.setStyle({
						weight : weight,
						color : color,
						dashArray : layer.options.dashArray,
						fillOpacity : layer.options.fillOpacity,
						fillColor : layer.options.fillColor
					});
					
					if (!sop.Browser.ie) {
						layer.bringToBack();
					}
					
					didMouseOutPolygon(e, feature, layer.options.type);
				},
				
				//click 이벤트 : 경계를 선택했을 때 이벤트
				click : function (e) {
					var layer = e.target;
					if (!sop.Browser.ie) {
						layer.bringToFront();
					}	
					
					didSelectedPolygon(e, feature, layer.options.type);
					
					
				},
						
			});
		},
		type : type
	});
	console.log(tmpGeojson);
	geojson = tmpGeojson;
	geojson.addTo(map);
};

//지도경계의 스타일을 지정한다.
var setPolygonGeoJsonStyle = function(type) {
	var fillOpacity = 0;
	var color = "#666666";
	
	//통계정보가 있을경우
	if (type == "data") {
		fillOpacity = 0.7;
		color = "white";
	}
	
	return {
		weight : 2.5,
		opacity : 1,
		color : color,
		dashArray: '3',
		fillOpacity : fillOpacity,
		fillColor : "white"
	};
};


//각 경계별로 색상을 지정한다.
var setLayerColor = function(feature, layer) {
	if (feature.info) {
		for ( var x = 0; x < feature.info.length; x++) {
			if (feature.info[x].showData) {
				for (param in feature.info[x]) {
					if (param == feature.info[x].showData) {
						layer.setStyle({
							weight : layer.options.weight,
							color : layer.options.color,
							dashArray : layer.options.dashArray,
							fillOpacity : layer.options.fillOpacity,
							fillColor : getColor(feature.info[x][param], valPerSlice)[0]
						});
						break;
					}
				}
			}
		}
	}
};

//통계정보를 지도경계에 병합한다.
var combineStatsData = function (boundData) {
	for ( var k = 0; k < data.length; k++) {
		for ( var i = 0; i < boundData.features.length; i++) {
			var adm_cd = boundData.features[i].properties.adm_cd;
				if (boundData.features[i].info == null) {
					boundData.features[i]["info"] = [];
				}
						
			if (data != null) {
				for ( var x = 0; x < data.length; x++) {
					for (key in data[x]) {
						if (key == "adm_cd") {
							if (adm_cd == data[x].adm_cd) {
								data[x]["showData"] = data[k].showData;
								data[x]["unit"] = data[k].unit;
								boundData.features[i].info.push(data[x]);
								break;
							}
							break;
						}
					}
				}
			}
		}
	}

	//범례지정
	setLegendForStatsData();
	
	return boundData;
				
};

//범례를 설정한다.
var setLegendForStatsData = function() {
	var arData = new Array();
	if (data.length > 0) {
		var tmpData = new Array();
		for ( var k = 0; k < data.length; k++) {
			for (key in data[k]) {
				if (key == data[k].showData) {
					arData.push(parseFloat(data[k][key]));
					break;
				}
			}			
		}
	}
	valPerSlice = calculateLegend(arData);
};


//범례 색상을 가져온다.(범례는 5단계로 설정)
var getColor = function (value, valPerSlice) {
	
	return value < valPerSlice[0] ? [ "#ffddd7", 1 ] : 
		   value < valPerSlice[1] ? [ "#ffb2a5", 2 ] : 
		   value < valPerSlice[2] ? [ "#ff806c", 3 ] : 
		   value < valPerSlice[3] ? [ "#ff593f", 4 ] :
			                        [ "#ff2400", 5 ];	  
};
var commaNum = function (num) {  
        var len, point, str;  
  
        num = num + "";  
        point = num.length % 3  
        len = num.length;  
  
        str = num.substring(0, point);  
        while (point < len) {  
            if (str != "") str += ",";  
            str += num.substring(point, point + 3);  
            point += 3;  
        }  
        return str;  
};  

//범례 알고리즘을 통해 범례 기준을 계산한다. 
var calculateLegend = function(arData) {	
				
	//균등분할방식				
	legendValue.equal = [];

	for ( var k = 0; k < arData.length; k++) {
		var min = Math.min.apply(null, arData);
		var max = Math.max.apply(null, arData);
		var result = Math.round((min + max) / 5);
		if (result == 0) {
			result = 1;
		}
					
		var tmpResult = new Array();
		for ( var y = 1; y <= 5; y++) {
			if (result == 1) {
				tmpResult.push(result);
			}else {
				tmpResult.push(result * y);
			}
		}

		if (tmpResult.length < 5) {
			for ( var x = 0; x < 5 - tmpResult.length; x++) {
				tmpResult.push("");
			}
		}
	}

	var LegendRange1 = tmpResult[0];
	var LegendRange2 = tmpResult[1];
	var LegendRange3 = tmpResult[2];
	var LegendRange4 = tmpResult[3];
	var LegendRange5 = tmpResult[4];

	var divLegendText = document.getElementById('legend');
	divLegendText.innerHTML = "";
	divLegendText.innerHTML += "<table><div id = 'rage1'></div>"+commaNum(LegendRange1)+"미만</table>";
	divLegendText.innerHTML += "<div id = 'rage2'></div>"+commaNum(LegendRange2)+"미만";
	divLegendText.innerHTML += "<div id = 'rage3'></div>"+commaNum(LegendRange3)+"미만";
	divLegendText.innerHTML += "<div id = 'rage4'></div>"+commaNum(LegendRange4)+"미만";
	divLegendText.innerHTML += "<div id = 'rage5'></div>"+commaNum(LegendRange5)+"이상";

	legendValue.equal = tmpResult;	

	return legendValue.equal;

	

};




//************************************************************************//
//********************** Map Control Start *******************************//
//************************************************************************//

//mouse over callback
var didMouseOverPolygon = function(event, layer, type) {
	var infoWindow = sop.infoWindow();
	var html = "<table style='margin:10px;'>";
	if (type == "data") {
		for (var i=0; i<layer.info.length; i++) {
			if (layer.properties.adm_cd == layer.info[i].adm_cd) {
				html += "<tr>";
				html += "<td>" + layer.properties.adm_nm +"</td>";
				html += "</tr>";
				html += "<tr>";
				html += "<td>" + layer.info[i][layer.info[i].showData] +" ("+layer.info[i].unit +")</td>";
				html += "</tr>";

				//인포윈도우에 항목 넣기
				switch(layer.properties.adm_cd){
				case "22010" : html += "<tr>";
							 html += "<td>★특색있는 통계</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>금융 및 보험업 사업체, 종사자</td>";
							 html += "</tr>";
							 
							 infoWindow.setUTMK([1098788,1764781]); // 인포윈도우 중심좌표 설정
							 infoWindow.setContent(html); // 인포윈도우 컨텐츠 설정
							 infoWindow.openOn(map); // 지도에 표출
							 break;

				case "22020" : html += "<tr>";
							 html += "<td>★특색있는 통계</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>사망연금</td>";
							 html += "</tr>";
							 infoWindow.setUTMK([1105638,1777767]); // 인포윈도우 중심좌표 설정
							 infoWindow.setContent(html); // 인포윈도우 컨텐츠 설정
							 infoWindow.openOn(map); // 지도에 표출
							 break;
							 
				case "22030" : html += "<tr>";
							 html += "<td>★특색있는 통계</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>고등학교 학생, 진학자, 입학자</td>";
							 html += "</tr>";
							 infoWindow.setUTMK([1094462,1766320]); // 인포윈도우 중심좌표 설정
							 infoWindow.setContent(html); // 인포윈도우 컨텐츠 설정
							 infoWindow.openOn(map); // 지도에 표출
							 break;

				case "22040" : html += "<tr>";
							 html += "<td>★특색있는 통계</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>대지 거래, 신호위반 단속</td>";
							 html += "</tr>";
							 infoWindow.setUTMK([1097232,1761717]); // 인포윈도우 중심좌표 설정
							 infoWindow.setContent(html); // 인포윈도우 컨텐츠 설정
							 infoWindow.openOn(map); // 지도에 표출
							 break;

				case "22050" : html += "<tr>";
							 html += "<td>★특색있는 통계</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>제조업·도소매업 사업체, 장애연금</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>도소매업 종사자, 속도위반·안전띠 단속</td>";
							 html += "</tr>";
							 infoWindow.setUTMK([1095350,1773759]); // 인포윈도우 중심좌표 설정
							 infoWindow.setContent(html); // 인포윈도우 컨텐츠 설정
							 infoWindow.openOn(map); // 지도에 표출
							 break;

				case "22060" : html += "<tr>";
							 html += "<td>★특색있는 통계</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>상업지역 거래, 속도위반 단속</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>고등학교 학생, 진학자, 입학자</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>노령연금</td>";
							 html += "</tr>";
							 infoWindow.setUTMK([1105481,1764091]); // 인포윈도우 중심좌표 설정
							 infoWindow.setContent(html); // 인포윈도우 컨텐츠 설정
							 infoWindow.openOn(map); // 지도에 표출
							 break;

				case "22070" : html += "<tr>";
							 html += "<td>★특색있는 통계</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>운수업 사업체, 주거지역 거래, 제조업 종사자</td>";
							 html += "</tr>";
							 infoWindow.setUTMK([1090577,1762785]); // 인포윈도우 중심좌표 설정
							 infoWindow.setContent(html); // 인포윈도우 컨텐츠 설정
							 infoWindow.openOn(map); // 지도에 표출
							 break;
				 
				case "22310" : html += "<tr>";
							 html += "<td>★특색있는 통계</td>";
							 html += "</tr>";
							 html += "<tr>";
							 html += "<td>공업지역거래</td>";
							 html += "</tr>";
							 infoWindow.setUTMK([1082072,1753137]); // 인포윈도우 중심좌표 설정
							 infoWindow.setContent(html); // 인포윈도우 컨텐츠 설정
							 infoWindow.openOn(map); // 지도에 표출
					 		break;

			}

				break;
			}
		}
	}else {
		html += "<tr>";
		html += "<td>" + layer.properties.adm_nm + "</td>";
		html += "</tr>";

		html += "</table>";
		event.target.bindToolTip(html, {
			direction: 'right',
			noHide:true,
			opacity: 1
		}).addTo(map)._showToolTip(event);
	}
	
	
};

var didSelectBox = function(selValue){
	var type = "data";
	if (type == "data") {
		if(map.getZoom() == 6 || map.getZoom() == 7 ||"22310" == selValue){
		var adm_cd = "22";
		map.setView([1096230, 1759759], 5);
		}else{

		var adm_cd = selValue;

		}
		//var adm_cd = selValue;
		//빨간 버튼 선택에 따라 통계요청을 다르게 함
		if(ShowData == "population" && RedButton == "population"){reqOpenApiPopulation(adm_cd, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "company"){reqOpenApiCompany(adm_cd, successCallback);}
		if(ShowData == "corp_cnt" && RedButton == "ground"){reqOpenApiGround(adm_cd, successCallback);}
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
		};
		
		var didZoomMap;
		var didZoomLevel;
		
		if(adm_cd == 22){didZoomMap = [[1096230, 1759759]]; didZoomLevel = 4; regionalspecific = null;}
		if(adm_cd == 22010){didZoomMap = [[1098714, 1763917]]; didZoomLevel = 7; regionalspecific = adm_cd;}
		if(adm_cd == 22020){didZoomMap = [[1106970, 1771533]]; didZoomLevel = 6; regionalspecific = adm_cd;}
		if(adm_cd == 22030){didZoomMap = [[1094746, 1764813]]; didZoomLevel = 6; regionalspecific = adm_cd;}
		if(adm_cd == 22040){didZoomMap = [[1095957, 1759959]]; didZoomLevel = 6; regionalspecific = adm_cd;}
		if(adm_cd == 22050){didZoomMap = [[1097210, 1770765]]; didZoomLevel = 6; regionalspecific = adm_cd;}
		if(adm_cd == 22060){didZoomMap = [[1104890, 1760397]]; didZoomLevel = 6; regionalspecific = adm_cd;}
		if(adm_cd == 22070){didZoomMap = [[1092903, 1759497]]; didZoomLevel = 6; regionalspecific = adm_cd;}
		if(adm_cd == 22310){didZoomMap = [[1088410, 1757389]]; didZoomLevel = 5; regionalspecific = adm_cd;}

		map.fitBounds(didZoomMap, {
			maxZoom : didZoomLevel,
			animate : true
		});
	}
}

//mouse out callback
var didMouseOutPolygon = function(event, layer, type) {
};

//mouse click callback
var didSelectedPolygon = function(event, layer, type) {
//	alert(layer.properties.adm_cd);
	//alert('현재 줌 레벨 : ' + map.getZoom());
	if (type == "data") {
		//달성군일 경우
		if(map.getZoom() == 6 || map.getZoom() == 7 ||"22310" == layer.properties.adm_cd){
		var adm_cd = "22";
		
		//alert('초기화');
		testAreaValue = null;
		doReqPopulation();

		map.setView([1096230, 1759759], 5);
		}else{

		var adm_cd = layer.properties.adm_cd;

		}
		
		//alert('레이아웃 값 : ' + Number(layer.properties.adm_cd) + '  줌레벨은 ? : ' +  map.getZoom());
		
		
		//달서구 표시 오류 문제 해결해야 함.

		//빨간 버튼 선택에 따라 통계요청을 다르게 함
		//alert('Show : ' + ShowData + '  : '  + RedButton );

		if(adm_cd == 22){
			regionalspecific = null;
			testAreaValue = 22;
			//BlueButton1 = null;
			//BlueButton2 = null;
			drawChart(testAreaValue);
			
		}
		if(adm_cd == 22010)
		{
			regionalspecific = adm_cd;
			testAreaValue = adm_cd;
			drawChart(testAreaValue);
		}
		if(adm_cd == 22020)
		{
			regionalspecific = adm_cd;
			testAreaValue = adm_cd;
			drawChart(testAreaValue);

		}
		if(adm_cd == 22030)
		{
			regionalspecific = adm_cd;
			testAreaValue = adm_cd;
			drawChart(testAreaValue);
		}
		if(adm_cd == 22040)
		{
			regionalspecific = adm_cd;
			testAreaValue = adm_cd;
			drawChart(testAreaValue);
		}
		if(adm_cd == 22050)
		{
			regionalspecific = adm_cd;
			testAreaValue = adm_cd;
			drawChart(testAreaValue);
		}
		if(adm_cd == 22060)
		{
			regionalspecific = adm_cd;
			testAreaValue = adm_cd;
			drawChart(testAreaValue);
		}
		if(adm_cd == 22070)
		{
			regionalspecific = adm_cd;
			testAreaValue = adm_cd;
			drawChart(testAreaValue);
		}
		if(adm_cd == 22310)
		{
			regionalspecific = adm_cd;
			testAreaValue = adm_cd;
			drawChart(testAreaValue);
		}
		//여기서 구 선택 시 행정코드가 각 함수로 넘어오게
		//alert(regionalspecific);
		//alert(event.target.getBounds().getSouthWest());
		
		if(map.getZoom() == 6 || map.getZoom() == 7){

		}else{
		map.fitBounds(event.target.getBounds(), {
			maxZoom : 6,
			animate : true
		});
			//testAreaValue = null;
		}
	}
};


//************************************************************************//
//********************** Map Control End *********************************//
//************************************************************************//


//************************************************************************//
//********************** request functions Start *************************//
//************************************************************************//

//OpenAPI를 사용하기 위한 accesstoken 정보를 요청한다.
var reqOpenAPIAuth = function(serviceId, secretKey, callback) {
	$.ajax({
		type: "GET",
		url: "https://sgisapi.kostat.go.kr/OpenAPI3/auth/authentication.json",
		data : {"consumer_key" : serviceId, "consumer_secret" : secretKey},
		success: function(res) {
			accessToken = res.result.accessToken;
			callback.call(undefined, accessToken);
		} ,
		dataType: "json",
		error:function(e){  
		}  
	});
};



//인구통계정보를 요청한다.
var reqOpenApiPopulation = function(adm_cd, callback) {
	reqOpenAPIAuth("590a2718c58d41d9ae3b", "ab7fe94f9fb64336abd3", success);
	function success(accessToken) {
		$.ajax({
		type: "GET",
		url: "https://sgisapi.kostat.go.kr/OpenAPI3/stats/searchpopulation.json",
		data : {"accessToken" : accessToken, "adm_cd" : adm_cd, "year" : "2010", "low_search" : 1, "area_type" : "0", "gender" : "0", "bnd_year" : "2013"},
		success: function(res) {
			callback.call(undefined, res.result);
		} ,
		dataType: "json",
		error:function(e){
			data = [];
		}  
	});
	} 

	//개발제한지역 버튼 비활성화
	if(adm_cd == "22010" || adm_cd == "22030"|| adm_cd == "22040"|| adm_cd == "22070"){
		bluebtn7.disabled = true;
	}
	else{
		bluebtn7.disabled = false;
	}
	//통근,출근 버튼 비활성화
	if(adm_cd == "22" || adm_cd == "22040"|| adm_cd == "22310"){
		bluebtn8.disabled = true;
	}
	else{
		bluebtn8.disabled = false;
	}
};

//사업체통계정보를 요청한다.
var reqOpenApiCompany = function(adm_cd, callback) {
	reqOpenAPIAuth("590a2718c58d41d9ae3b", "ab7fe94f9fb64336abd3", success);
	function success(accessToken) {
		$.ajax({
		type: "GET",
		url: "https://sgisapi.kostat.go.kr/OpenAPI3/stats/company.json",
		data : {"accessToken" : accessToken, "adm_cd" : adm_cd, "year" : "2010", "low_search" : 1, "area_type" : "0", "class_deg" : "9", "bnd_year" : "2013"},
		success: function(res) {
			callback.call(undefined, res.result);
		} ,
		dataType: "json",
		error:function(e){
			data = [];
		}  
	});
	}

	//개발제한지역 버튼 비활성화
	if(adm_cd == "22010" || adm_cd == "22030"|| adm_cd == "22040"|| adm_cd == "22070"){
		bluebtn7.disabled = true;
	}
	else{
		bluebtn7.disabled = false;
	}
	//통근,출근 버튼 비활성화
	if(adm_cd == "22" || adm_cd == "22040"|| adm_cd == "22310"){
		bluebtn8.disabled = true;
	}
	else{
		bluebtn8.disabled = false;
	}
};

//토지통계정보를 요청한다.
var reqOpenApiGround = function(adm_cd, callback) {
	reqOpenAPIAuth("590a2718c58d41d9ae3b", "ab7fe94f9fb64336abd3", success);
	function success(accessToken) {
		$.ajax({
		type: "GET",
		url: "https://sgisapi.kostat.go.kr/OpenAPI3/stats/company.json",
		data : {"accessToken" : accessToken, "adm_cd" : adm_cd, "year" : "2010", "low_search" : 1, "area_type" : "0", "class_deg" : "9", "class_code" : "L", "bnd_year" : "2013"},
		success: function(res) {
			callback.call(undefined, res.result);
		} ,
		dataType: "json",
		error:function(e){
			data = [];
		}  
	});
	} 

	//개발제한지역 버튼 비활성화
	if(adm_cd == "22010" || adm_cd == "22030"|| adm_cd == "22040"|| adm_cd == "22070"){
		bluebtn7.disabled = true;
	}
	else{
		bluebtn7.disabled = false;
	}
	//통근,출근 버튼 비활성화
	if(adm_cd == "22" || adm_cd == "22040"|| adm_cd == "22310"){
		bluebtn8.disabled = true;
	}
	else{
		bluebtn8.disabled = false;
	}
};

//경계정보를 요청한다.
var sum = 0;

var reqOpenApiBoundaryHadmarea = function(adm_cd, year, low_search) {

	reqOpenAPIAuth("590a2718c58d41d9ae3b", "ab7fe94f9fb64336abd3", success);
	//alert('에리어 호출 : ' + adm_cd + " year ? : " + year + "  lowsearch : " + low_search);
	function success(accessToken) {
		$.ajax({
		type: "GET",
		url: "https://sgisapi.kostat.go.kr/OpenAPI3/boundary/hadmarea.geojson",
		data : {"accessToken" : accessToken, "adm_cd" : adm_cd, "year" : year, "low_search" : low_search},
		success: function(res) {
			setPolygonGeojson(res);
		} ,
		dataType: "json",
		error:function(e){  
		}  
	});
	}
	
	//초기 실행시 4번 실행 됨.
	//drawChart(adm_cd);


};

function drawChart(adm_cd) {
	 var XMLHttp;
	 var graph_value = adm_cd;
	 var Topitem1,Topitem2,Topitem3;		//가장 높은 통계값
	 var Lowitem1,Lowitem2,Lowitem3;		//가장 낮은 통계값
	 var TopTitle1,TopTitle2,TopTitle3;		//가장 높은 통계 이름, 낮은 통계 이름
	 var LowTitle1,LowTitle2,LowTitle3;		//가장 낮은 통계 이름
	 var measure1,measure2,measure3;		//선택된 통계값의 단위	
	 var shellText1,shellText2,shellText3;  //선택된 통계항목 이름

	 var graph_type = RedButton; //선택된 통계 항목

	 if(window.XMLHttpRequest) {
		 XMLHttp = new XMLHttpRequest();
	 } else {
		 XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
	 }

	 XMLHttp.onreadystatechange=function () {
		if(XMLHttp.readyState==4 && XMLHttp.status==200) {

			var DB_Date = XMLHttp.responseText;
			var array_data = DB_Date.split("//");
			var DB_name = array_data[0];
			var DB_cp1 = array_data[1];
			var DB_cp2 = array_data[2];
			var DB_cp3 = array_data[3];
			var DB_cp4 = array_data[4];
			var DB_cp5 = array_data[5];
			var DB_cp6 = array_data[6];
			var DB_cp7 = array_data[7];
			var DB_cp8 = array_data[8];
			var DB_cp9 = array_data[9];
			var DB_cp10 = array_data[10];

			DB_cp1*=1;
			DB_cp2*=1;
			DB_cp3*=1;
			DB_cp4*=1;
			DB_cp5*=1;
			DB_cp6*=1;
			DB_cp7*=1;
			DB_cp8*=1;
			DB_cp9*=1;
			DB_cp10*=1;


			//alert('블루버튼1 : '+ BlueButton1 + ',,,' + '블루버튼2' + BlueButton2 + '레드버튼' + RedButton);

			
			//셀렉트 박스로 지역선택을 안 했을 경우
			//**********이 아래부터 x,y축의 항목 이름들을 수정해야함***********//
			if(regionalspecific == null){	

				//alert('ShowData  ' + ShowData + ' ---- ' + ' Red버튼 ' + RedButton);
				 if(ShowData == "population" && RedButton == "population")
				{
					 //alert('뭐지?');
					 Xaxis1 = "2,30대 거주인구";Xaxis2 = "4,50대 거주인구";Xaxis3 = "6,70대 거주인구";Xaxis4 = "80세이상 거주인구";
					 measure1 = "명";
					 shellText1 = "인구";
				}
				 if(ShowData == "corp_cnt" && RedButton == "company")
				{
					 //alert('뭐지?');
					 Xaxis1 = "제조업수";Xaxis2 = "도소매업수";Xaxis3 = "운수업수";Xaxis4 = "금융및보험수";
					 measure1 = "개";
					 shellText1 = "사업체수";
				}
				 if(ShowData == "corp_cnt" && RedButton == "ground")
				{
					 //alert('뭐지?');
					 Xaxis1 = "주거지역 거래건수";Xaxis2 = "상업지역 거래건수";Xaxis3 = "공업지역 거래건수";Xaxis4 = "대지 거래건수";
					 measure1 = "건";
					 shellText1 = "부동산 거래현황";
				}
			
				 switch(BlueButton1){
				 	case "sgis_school" :
				 		Xaxis5 = "고등학생"; Xaxis6 ="진학자"; Xaxis7 ="입학자";
				 		measure2 = "명";
				 		shellText2 = "고등학생 현황";
				 		break;
				 	case "sgis_car" :
				 		Xaxis5 = "속도위반 단속건수"; Xaxis6 ="신호위반 단속건수"; Xaxis7 ="안전띠미착용 단속건수";
				 		measure2 = "건";
				 		shellText2 = "차량 단속 성과";
				 		break;
				 	case "sgis_practician" :
				 		Xaxis5 = "제조업 종사자"; Xaxis6 ="도소매업 종사자"; Xaxis7 ="금융및보험업 종사자";
				 		measure2 = "명";
				 		shellText2 = "산업별 종사자";
				 		break;
				 	case "sgis_carenroll" :
				 		Xaxis5 = "관용 등록"; Xaxis6 ="자가용 등록"; Xaxis7 ="영업용 등록";
				 		measure2 = "대";
				 		shellText2 = "차량 등록 현황";
				 		break;
				 	case "sgis_pension" :
				 		Xaxis5 = "노령연금"; Xaxis6 ="장애연금"; Xaxis7 ="사망연금";
				 		measure2 = "백만원";
				 		shellText2 = "국민연금 지급 현황";
				 		break;
				 	case "sgis_limited" :
				 		Xaxis5 = "거주가구"; Xaxis6 ="거주인구"; Xaxis7 ="구역내 건축물";
				 		shellText2 = "개발제한 지역현황";
				 		break;
				 	case "sgis_commute" :
				 		Xaxis5 = "거주하는 동"; Xaxis6 ="같은 시군구 다른 동"; Xaxis7 ="다른 시군구";
				 		measure2 = "명";
				 		shellText2 = "통근,통학 유형현황";
				 		break;
				 }
			
				 switch(BlueButton2){
				 	case "sgis_school" :
				 		Xaxis8 = "고등학생"; Xaxis9 ="진학자"; Xaxis10 ="입학자";
				 		measure3 = "명";
				 		shellText3 = "고등학생 현황";
				 		break;
				 	case "sgis_car" :
				 		Xaxis8 = "속도위반 단속건수"; Xaxis9 ="신호위반 단속건수"; Xaxis10 ="안전띠 단속건수";
				 		measure3 = "건";
				 		shellText3 = "차량 단속 성과";
				 		break;
				 	case "sgis_practician" :
				 		Xaxis8 = "제조업 종사자"; Xaxis9 ="도소매업 종사자"; Xaxis10 ="금융및보험업 종사자";
				 		measure3 = "명";
				 		shellText3 = "산업별 종사자";
				 		break;
				 	case "sgis_carenroll" :
				 		Xaxis8 = "관용 등록"; Xaxis9 ="자가용 등록"; Xaxis10 ="영업용 등록";
				 		measure3 = "대";
				 		shellText3 = "차량 등록 현황";
				 		break;
				 	case "sgis_pension" :
				 		Xaxis8 = "노령연금"; Xaxis9 ="장애연금"; Xaxis10 ="사망연금";
				 		measure3 = "백만원";
				 		shellText3 = "국민연금 지급 현황";
				 		break;
				 	case "sgis_limited" :
				 		Xaxis8 = "거주가구"; Xaxis9 ="거주인구"; Xaxis10 ="구역내 건축물";
				 		shellText3 = "개발제한 지역현황";
				 		break;
				 	case "sgis_commute" :
				 		Xaxis8 = "거주하는 동"; Xaxis9 ="같은 시군구 다른 동"; Xaxis10 ="다른 시군구";
				 		measure3 = "명";
				 		shellText3 = "통근,통학 유형현황";
				 		break;
			}

					//항목 중 가장 높은 값, 낮은 값 선정	
			   Topitem1 = Math.max(DB_cp1,DB_cp2,DB_cp3,DB_cp4);
			   Topitem2 = Math.max(DB_cp5,DB_cp6,DB_cp7);
			   Topitem3 = Math.max(DB_cp8,DB_cp9,DB_cp10);
			   
			   Lowitem1 = Math.min(DB_cp1,DB_cp2,DB_cp3,DB_cp4);
			   Lowitem2 = Math.min(DB_cp5,DB_cp6,DB_cp7);
			   Lowitem3 = Math.min(DB_cp8,DB_cp9,DB_cp10);

			   //가장 높은 값이 속해있는 통계이름 선정
			   switch(Topitem1){
			   	case DB_cp1:	TopTitle1 = Xaxis1; break;
			   	case DB_cp2:	TopTitle1 = Xaxis2; break;
			   	case DB_cp3:	TopTitle1 = Xaxis3; break;
			   	case DB_cp4:	TopTitle1 = Xaxis4; break;
			   }

			   switch(Topitem2){
			   	case DB_cp5:	TopTitle2 = Xaxis5; break;
			   	case DB_cp6:	TopTitle2 = Xaxis6; break;
			   	case DB_cp7:	TopTitle2 = Xaxis7; break;
			   }

			   switch(Topitem3){
			   	case DB_cp8:	TopTitle3 = Xaxis8; break;
			   	case DB_cp9:	TopTitle3 = Xaxis9; break;
			   	case DB_cp10:	TopTitle3 = Xaxis10; break;
			   }

			   switch(Lowitem1){
			   	case DB_cp1:	LowTitle1 = Xaxis1; break;
			   	case DB_cp2:	LowTitle1 = Xaxis2; break;
			   	case DB_cp3:	LowTitle1 = Xaxis3; break;
			   	case DB_cp4:	LowTitle1 = Xaxis4; break;
			   }

			   switch(Lowitem2){
			   	case DB_cp5:	LowTitle2 = Xaxis5; break;
			   	case DB_cp6:	LowTitle2 = Xaxis6; break;
			   	case DB_cp7:	LowTitle2 = Xaxis7; break;
			   }

			   switch(Lowitem3){
			   	case DB_cp8:	LowTitle3 = Xaxis8; break;
			   	case DB_cp9:	LowTitle3 = Xaxis9; break;
			   	case DB_cp10:	LowTitle3 = Xaxis10; break;
			   }

			   
	 
				if(BlueCount == 0){		//그래프만 나오는 파란버튼 클릭 수 확인
					   var data = google.visualization.arrayToDataTable([
							["분류", "통계", { role: "style" }],
							[Xaxis1, DB_cp1, "#00ffff"],
							[Xaxis2, DB_cp2,"#00ffff"],
							[Xaxis3, DB_cp3,"#00ffff"],
							[Xaxis4, DB_cp4,"#00ffff"]
					   ]);

			
					   var options = {
					     title: "",
					     width: '180%',
					     height: '30%',
					     bar: {groupWidth: "70%"},
					     legend: { position: "none" },
					     tooltip: {textStyle:  {fontName: 'TimesNewRoman',fontSize: 18,bold: true}}
					   };
					   
					   var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
					   chart.draw(data, options);
					   
					   document.getElementById("MapText").innerHTML = "<table border='0' style='width:100%'>"+
																	   "<tr>"+
																	   "<th></th>"+
																	   "<th>최대값</th>"+	
																	   "<th>최저값</th>"+
																	   "</tr>"+
																	   "<tr>"+
																	   "<td>"+shellText1+"</td>"+
																	   "<td>"+TopTitle1+"<br>("+Topitem1+measure1+")</td>"+		
																	   "<td>"+LowTitle1+"<br>("+Lowitem1+measure1+")</td>"+
																	   "</tr>"+
																	   "</table>";
				}
	
				if(BlueCount == 1){		//그래프만 나오는 파란버튼 클릭 수 확인
					var data = google.visualization.arrayToDataTable([
					     ["분류", "통계", { role: "style" }],
					     [Xaxis1, DB_cp1, "#00ffff"],
					     [Xaxis2, DB_cp2,"#00ffff"],
					     [Xaxis3, DB_cp3,"#00ffff"],
					     [Xaxis4, DB_cp4,"#00ffff"],
					     [Xaxis5, DB_cp5,"#ff0000"],
						 [Xaxis6, DB_cp6,"#ff0000"],
						 [Xaxis7, DB_cp7,"#ff0000"] 
					]);                    					
			
				   var options = {
				     title: "",
				     width: '150%',
				     height: '30%',
				     bar: {groupWidth: "70%"},
				     legend: { position: "none" },
				     tooltip: {textStyle:  {fontName: 'TimesNewRoman',fontSize: 18,bold: true}}
				   };


				   var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
				   chart.draw(data, options);

				   if(BlueButton1 == "sgis_limited"){
				   	document.getElementById("MapText").innerHTML = "<table border='0' style='width:100%'>"+
																   "<tr>"+
																   "<th></th>"+
																   "<th>최대값</th>"+	
																   "<th>최저값</th>"+
																   "</tr>"+
																   "<tr>"+
																   "<td>"+shellText1+"</td>"+
																   "<td>"+TopTitle1+"<br>("+Topitem1+measure1+")</td>"+		
																   "<td>"+LowTitle1+"<br>("+Lowitem1+measure1+")</td>"+
																   "</tr>"+
																   "<tr>"+
																   "<td>"+shellText2+"</td>"+
																   "<td>"+TopTitle2+"<br>("+Topitem2+"명)</td>"+		
																   "<td>"+LowTitle2+"<br>("+Lowitem2+"가구)</td>"+
																   "</tr>"+
																   "</table>";
				   }
				   else{
				   	document.getElementById("MapText").innerHTML = "<table border='0' style='width:100%'>"+
																   "<tr>"+
																   "<th></th>"+
																   "<th>최대값</th>"+	
																   "<th>최저값</th>"+
																   "</tr>"+
																   "<tr>"+
																   "<td>"+shellText1+"</td>"+
																   "<td>"+TopTitle1+"<br>("+Topitem1+measure1+")</td>"+		
																   "<td>"+LowTitle1+"<br>("+Lowitem1+measure1+")</td>"+
																   "</tr>"+
																   "<tr>"+
																   "<td>"+shellText2+"</td>"+
																   "<td>"+TopTitle2+"<br>("+Topitem2+measure2+")</td>"+		
																   "<td>"+LowTitle2+"<br>("+Lowitem2+measure2+")</td>"+
																   "</tr>"+
																   "</table>";
				   }
				}
	
				if(BlueCount == 2){		//그래프만 나오는 파란버튼 클릭 수 확인
					   var data = google.visualization.arrayToDataTable([
					     ["분류", "통계", { role: 'style' }],
					     [Xaxis1, DB_cp1, "#00ffff"],
					     [Xaxis2, DB_cp2, "#00ffff"],
					     [Xaxis3, DB_cp3, "#00ffff"],
					     [Xaxis4, DB_cp4, "#00ffff"],
					     [Xaxis5, DB_cp5, '#ff0000'],
					     [Xaxis6, DB_cp6, '#ff0000'],
					     [Xaxis7, DB_cp7, '#ff0000'],
					     [Xaxis8, DB_cp8, '#00ff00'],
					     [Xaxis9, DB_cp9, '#00ff00'],
					     [Xaxis10, DB_cp10, '#00ff00']
					   ]);
			
					   var options = {
					     title: "",
					     width: '150%',
					     height: '30%',
					     bar: {groupWidth: "70%"},
					     legend: { position: "none" },
					     tooltip: {textStyle:  {fontName: 'TimesNewRoman',fontSize: 18,bold: true}}
					   };
					   
					   var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
					   chart.draw(data, options);

					   if(BlueButton1 == "sgis_limited"){
						   document.getElementById("MapText").innerHTML = "<table border='0' style='width:100%'>"+
																		   "<tr>"+
																		   "<th></th>"+
																		   "<th>최대값</th>"+	
																		   "<th>최저값</th>"+
																		   "</tr>"+
																		   "<tr>"+
																		   "<td>"+shellText1+"</td>"+
																		   "<td>"+TopTitle1+"<br>("+Topitem1+measure1+")</td>"+		
																		   "<td>"+LowTitle1+"<br>("+Lowitem1+measure1+")</td>"+
																		   "</tr>"+
																		   "<tr>"+
																		   "<td>"+shellText2+"</td>"+
																		   "<td>"+TopTitle2+"<br>("+Topitem2+"명)</td>"+		
																		   "<td>"+LowTitle2+"<br>("+Lowitem2+"가구)</td>"+
																		   "</tr>"+
																		   "<tr>"+
																		   "<td>"+shellText3+"</td>"+
																		   "<td>"+TopTitle3+"<br>("+Topitem3+measure3+")</td>"+		
																		   "<td>"+LowTitle3+"<br>("+Lowitem3+measure3+")</td>"+
																		   "</tr>"+
																		   "</table>";
					   }
					   else if(BlueButton2 == "sgis_limited"){
						   document.getElementById("MapText").innerHTML = "<table border='0' style='width:100%'>"+
																		   "<tr>"+
																		   "<th></th>"+
																		   "<th>최대값</th>"+	
																		   "<th>최저값</th>"+
																		   "</tr>"+
																		   "<tr>"+
																		   "<td>"+shellText1+"</td>"+
																		   "<td>"+TopTitle1+"<br>("+Topitem1+measure1+")</td>"+		
																		   "<td>"+LowTitle1+"<br>("+Lowitem1+measure1+")</td>"+
																		   "</tr>"+
																		   "<tr>"+
																		   "<td>"+shellText2+"</td>"+
																		   "<td>"+TopTitle2+"<br>("+Topitem2+measure2+")</td>"+		
																		   "<td>"+LowTitle2+"<br>("+Lowitem2+measure2+")</td>"+
																		   "</tr>"+
																		   "<tr>"+
																		   "<td>"+shellText3+"</td>"+
																		   "<td>"+TopTitle3+"<br>("+Topitem3+"명)</td>"+		
																		   "<td>"+LowTitle3+"<br>("+Lowitem3+"가구)</td>"+
																		   "</tr>"+
																		   "</table>";
					   	}
					   else{
						   document.getElementById("MapText").innerHTML = "<table border='0' style='width:100%'>"+
																		   "<tr>"+
																		   "<th></th>"+
																		   "<th>최대값</th>"+	
																		   "<th>최저값</th>"+
																		   "</tr>"+
																		   "<tr>"+
																		   "<td>"+shellText1+"</td>"+
																		   "<td>"+TopTitle1+"<br>("+Topitem1+measure1+")</td>"+		
																		   "<td>"+LowTitle1+"<br>("+Lowitem1+measure1+")</td>"+
																		   "</tr>"+
																		   "<tr>"+
																		   "<td>"+shellText2+"</td>"+
																		   "<td>"+TopTitle2+"<br>("+Topitem2+measure2+")</td>"+		
																		   "<td>"+LowTitle2+"<br>("+Lowitem2+measure2+")</td>"+
																		   "</tr>"+
																		   "<tr>"+
																		   "<td>"+shellText3+"</td>"+
																		   "<td>"+TopTitle3+"<br>("+Topitem3+measure3+")</td>"+		
																		   "<td>"+LowTitle3+"<br>("+Lowitem3+measure3+")</td>"+
																		   "</tr>"+
																		   "</table>";
					   }
				}
			}
			//*************************************************************************//
			
			//셀렉트 박스로 지역 선택했을 경우
			//중구 선택시 아래의 소스로 그래프를 새롭게 그림
			//**********이 아래부터 x,y축의 항목 이름들을 수정해야함***********//
			//**********서구,달성군은 일단 눈에 띄는 부분이 없어 일단은 빈 공간 처리***********//
			
			
		}
	}

	// 셀렉트 박스로 선택안할 경우 그래프만 나오는 파란 버튼의 수를 통해 데이터 수신
	if(regionalspecific == null){	
		 if(BlueCount == 0){
			 XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&BlueCount="+BlueCount, true);
			 XMLHttp.send();
		 }
	
		 if(BlueCount == 1){
			 XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&item1="+BlueButton1+"&BlueCount="+BlueCount, true);
			 XMLHttp.send();
		 }
	
		 if(BlueCount == 2){
			 XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&item1="+BlueButton1+"&item2="+BlueButton2+"&BlueCount="+BlueCount, true);
			 XMLHttp.send();
		 }
	}

	// 구글지도와 셀렉트 박스로 지역 선택했을 경우
	//alert('ShowData  ' + ShowData + ' ---- ' + ' Red버튼 ' + RedButton);
	switch(regionalspecific){
		
	case "22010" :
		//중구
		//사업체, 종사자 수 버튼 활성화
		ShowData = "corp_cnt";
		RedButton = "company";
		
		graph_type = "company";
		BlueButton1 = "sgis_practician";
		//REDbtn(0,"사업체");
		BlueCount = 1;
		checkboxs1[0].checked = false;
		checkboxs1[1].checked = true;
		checkboxs1[2].checked = false;

		BLUEcheckboxs3.checked = true;
		
		BLUEcheckboxs1.checked = false;
		BLUEcheckboxs2.checked = false;
		BLUEcheckboxs4.checked = false;
		BLUEcheckboxs5.checked = false;

		//CallStaticCodeTemp = graph_value;
		//alert('test : ' + CallStaticCodeTemp +' 아오 ' + graph_value);
		
		XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&item1="+BlueButton1+"&BlueCount="+BlueCount, true);
		XMLHttp.send();

		regionalspecific = null;
		var adm_cd = 22010;
		if(ShowData == "population" && RedButton == "population"){
			reqOpenApiPopulation(adm_cd, successCallback);
			//alert('인구');
			}
		else if(ShowData == "corp_cnt" && RedButton == "company"){
			reqOpenApiCompany(adm_cd, successCallback);
			//alert('사업체');
			}
		else if(ShowData == "corp_cnt" && RedButton == "ground"){
			reqOpenApiGround(adm_cd, successCallback);
			//alert('토지');
			}

		//2015. 12. 03. 새벽 6시 40분에 발생한 오류 
		//구 선택 후 마우스를 움직으면 구 정보가 사라지는데, 아마 밑에 있는 콜백함수 때문이라 생각함.
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
					
		};

		break;

	case "22020" :
		//동구
		//인구, 국민연금 버튼 활성화
		ShowData = "population";
		RedButton = "population";
		
		
		graph_type = "population";
		BlueButton1 = "sgis_pension";
		BlueCount = 1;
		
		checkboxs1[0].checked = true;
		checkboxs1[2].checked = false;
		checkboxs1[1].checked = false;

		BLUEcheckboxs5.checked = true;

		BLUEcheckboxs1.checked = false;
		BLUEcheckboxs2.checked = false;
		BLUEcheckboxs3.checked = false;
		BLUEcheckboxs4.checked = false;

		XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&item1="+BlueButton1+"&BlueCount="+BlueCount, true);
		XMLHttp.send();

		regionalspecific = null;

		var adm_cd = 22020;
		if(ShowData == "population" && RedButton == "population"){
			reqOpenApiPopulation(adm_cd, successCallback);
			//alert('인구');
			}
		else if(ShowData == "corp_cnt" && RedButton == "company"){
			reqOpenApiCompany(adm_cd, successCallback);
			//alert('사업체');
			}
		else if(ShowData == "corp_cnt" && RedButton == "ground"){
			reqOpenApiGround(adm_cd, successCallback);
			//alert('토지');
			}

		//2015. 12. 03. 새벽 6시 40분에 발생한 오류 
		//구 선택 후 마우스를 움직으면 구 정보가 사라지는데, 아마 밑에 있는 콜백함수 때문이라 생각함.
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
					
		};

		break;

	case "22030" :
		//서구
		//학생과 인구 활성화		
		ShowData = "population";
		RedButton = "population";

		graph_type = "population";
		BlueButton1 = "sgis_school";
		BlueCount = 1;
		
		checkboxs1[0].checked = true;
		checkboxs1[2].checked = false;
		checkboxs1[1].checked = false;
		BLUEcheckboxs1.checked = true;

		BLUEcheckboxs2.checked = false;
		BLUEcheckboxs3.checked = false;
		BLUEcheckboxs4.checked = false;
		BLUEcheckboxs5.checked = false;

		XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&item1="+BlueButton1+"&BlueCount="+BlueCount, true);
		XMLHttp.send();
		regionalspecific = null;

		var adm_cd = 22030;
		if(ShowData == "population" && RedButton == "population"){
			reqOpenApiPopulation(adm_cd, successCallback);
			//alert('인구');
			}
		else if(ShowData == "corp_cnt" && RedButton == "company"){
			reqOpenApiCompany(adm_cd, successCallback);
			//alert('사업체');
			}
		else if(ShowData == "corp_cnt" && RedButton == "ground"){
			reqOpenApiGround(adm_cd, successCallback);
			//alert('토지');
			}

		//2015. 12. 03. 새벽 6시 40분에 발생한 오류 
		//구 선택 후 마우스를 움직으면 구 정보가 사라지는데, 아마 밑에 있는 콜백함수 때문이라 생각함.
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
					
		};

		break;

	case "22040" :
		//남구
		//토지, 차량단속 버튼 활성화
		ShowData = "corp_cnt";
		RedButton = "ground";

		graph_type = "ground";
		BlueButton1 = "sgis_car";
		BlueCount = 1;
		checkboxs1[0].checked = false;
		checkboxs1[2].checked = true;
		checkboxs1[1].checked = false;
		BLUEcheckboxs2.checked = true;

		BLUEcheckboxs1.checked = false;
		BLUEcheckboxs3.checked = false;
		BLUEcheckboxs4.checked = false;
		BLUEcheckboxs5.checked = false;

		
		XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&item1="+BlueButton1+"&BlueCount="+BlueCount, true);
		XMLHttp.send();

		regionalspecific = null;

		var adm_cd = 22040;
		if(ShowData == "population" && RedButton == "population"){
			reqOpenApiPopulation(adm_cd, successCallback);
			//alert('인구');
			}
		else if(ShowData == "corp_cnt" && RedButton == "company"){
			reqOpenApiCompany(adm_cd, successCallback);
			//alert('사업체');
			}
		else if(ShowData == "corp_cnt" && RedButton == "ground"){
			reqOpenApiGround(adm_cd, successCallback);
			//alert('토지');
			}

		//2015. 12. 03. 새벽 6시 40분에 발생한 오류 
		//구 선택 후 마우스를 움직으면 구 정보가 사라지는데, 아마 밑에 있는 콜백함수 때문이라 생각함.
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
					
		};

		break;

	case "22050" :
		//북구
		//사업체, 종사자, 국민연금 활성화
		ShowData = "corp_cnt";
		RedButton = "company";

		graph_type = "company";
		BlueButton1 = "sgis_practician";
		BlueButton2 = "sgis_pension";
		BlueCount = 2;
		checkboxs1[0].checked = false;
		checkboxs1[1].checked = true;
		checkboxs1[2].checked = false;
		BLUEcheckboxs3.checked = true;
		BLUEcheckboxs5.checked = true;

		BLUEcheckboxs1.checked = false;
		BLUEcheckboxs2.checked = false;
		BLUEcheckboxs4.checked = false;
		BLUEcheckboxs6.checked = false;
		BLUEcheckboxs7.checked = false;

		XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&item1="+BlueButton1+"&item2="+BlueButton2+"&BlueCount="+BlueCount, true);
		XMLHttp.send();

		regionalspecific = null;

		var adm_cd = 22050;
		if(ShowData == "population" && RedButton == "population"){
			reqOpenApiPopulation(adm_cd, successCallback);
			//alert('인구');
			}
		else if(ShowData == "corp_cnt" && RedButton == "company"){
			reqOpenApiCompany(adm_cd, successCallback);
			//alert('사업체');
			}
		else if(ShowData == "corp_cnt" && RedButton == "ground"){
			reqOpenApiGround(adm_cd, successCallback);
			//alert('토지');
			}

		//2015. 12. 03. 새벽 6시 40분에 발생한 오류 
		//구 선택 후 마우스를 움직으면 구 정보가 사라지는데, 아마 밑에 있는 콜백함수 때문이라 생각함.
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
					
		};

		break;

	case "22060" :
		//수성구
		//토지, 학생, 차량단속 활성화
		ShowData = "corp_cnt";
		RedButton = "ground";

		graph_type = "ground";
		BlueButton1 = "sgis_school";
		BlueButton2 = "sgis_car";
		BlueCount = 2;
		checkboxs1[0].checked = false;
		checkboxs1[2].checked = true;
		checkboxs1[1].checked = false;
		BLUEcheckboxs1.checked = true;
		BLUEcheckboxs2.checked = true;
		
		BLUEcheckboxs3.checked = false;
		BLUEcheckboxs4.checked = false;
		BLUEcheckboxs5.checked = false;
		BLUEcheckboxs6.checked = false;
		BLUEcheckboxs7.checked = false;

		XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&item1="+BlueButton1+"&item2="+BlueButton2+"&BlueCount="+BlueCount, true);
		XMLHttp.send();

		regionalspecific = null;

				var adm_cd = 22060;
		if(ShowData == "population" && RedButton == "population"){
			reqOpenApiPopulation(adm_cd, successCallback);
			//alert('인구');
			}
		else if(ShowData == "corp_cnt" && RedButton == "company"){
			reqOpenApiCompany(adm_cd, successCallback);
			//alert('사업체');
			}
		else if(ShowData == "corp_cnt" && RedButton == "ground"){
			reqOpenApiGround(adm_cd, successCallback);
			//alert('토지');
			}

		//2015. 12. 03. 새벽 6시 40분에 발생한 오류 
		//구 선택 후 마우스를 움직으면 구 정보가 사라지는데, 아마 밑에 있는 콜백함수 때문이라 생각함.
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
					
		};


		break;

	case "22070" :
		//달서구
		//사업체, 종사자
		ShowData = "corp_cnt";
		RedButton = "company";
	
		graph_type = "company";
		BlueButton1 = "sgis_practician";
		BlueCount = 1;
		checkboxs1[0].checked = false;
		checkboxs1[1].checked = true;
		checkboxs1[2].checked = false;
		BLUEcheckboxs1.checked = false;
		BLUEcheckboxs2.checked = false;
		BLUEcheckboxs4.checked = false;
		BLUEcheckboxs5.checked = false;
		BLUEcheckboxs3.checked = true;
		BLUEcheckboxs6.checked = false;
		BLUEcheckboxs7.checked = false;
		
		XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&item1="+BlueButton1+"&BlueCount="+BlueCount, true);
		XMLHttp.send();

		regionalspecific = null;

				var adm_cd = 22070;
		if(ShowData == "population" && RedButton == "population"){
			reqOpenApiPopulation(adm_cd, successCallback);
			//alert('인구');
			}
		else if(ShowData == "corp_cnt" && RedButton == "company"){
			reqOpenApiCompany(adm_cd, successCallback);
			//alert('사업체');
			}
		else if(ShowData == "corp_cnt" && RedButton == "ground"){
			reqOpenApiGround(adm_cd, successCallback);
			//alert('토지');
			}

		//2015. 12. 03. 새벽 6시 40분에 발생한 오류 
		//구 선택 후 마우스를 움직으면 구 정보가 사라지는데, 아마 밑에 있는 콜백함수 때문이라 생각함.
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
					
		};

		break;

	case "22310" :
		//달성군
		// 토지정보만
		ShowData = "corp_cnt";
		RedButton = "ground";

		graph_type = "ground";
		BlueCount = 0;

		checkboxs1[0].checked = false;
		checkboxs1[1].checked = false;
		checkboxs1[2].checked = true;


		XMLHttp.open("GET", "graph.php?num="+graph_value+"&type="+graph_type+"&BlueCount="+BlueCount, true);
		XMLHttp.send();

		regionalspecific = null;

				var adm_cd = 22310;
		if(ShowData == "population" && RedButton == "population"){
			reqOpenApiPopulation(adm_cd, successCallback);
			//alert('인구');
			}
		else if(ShowData == "corp_cnt" && RedButton == "company"){
			reqOpenApiCompany(adm_cd, successCallback);
			//alert('사업체');
			}
		else if(ShowData == "corp_cnt" && RedButton == "ground"){
			reqOpenApiGround(adm_cd, successCallback);
			//alert('토지');
			}

		//2015. 12. 03. 새벽 6시 40분에 발생한 오류 
		//구 선택 후 마우스를 움직으면 구 정보가 사라지는데, 아마 밑에 있는 콜백함수 때문이라 생각함.
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = ShowData;	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
					
		};

		break;
		}

	
}



</script>
</body>
</html>