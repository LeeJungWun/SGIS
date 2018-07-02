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
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['bar']}]}"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" type="text/css" href="index.css"/>
</head>
<style type="text/css">

</style>

<body>
		<div id="header"><a href="http://mslsgis.dothome.co.kr/index.php" style="margin-left:auto;margin-right:auto;"><img src="/image/타이틀.jpg" border="0"></a></div>
		<div id="map"></div>
		<div id="side" style="position:absolute; top:100px; right:0px;">
				
			<div id="" class = "elem" >
				지역 선택 : 

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
				<div class="navigationButton" >
				<label class="switch switch-slide" style="position:absolute; top:-5px; left : 39%;right:10%; width: 160px; height: 30px; font-size: 12px;">
					<input class="switch-input" name="test" onclick='navigatormanagment(this);' type="checkbox" />
					<span class="switch-label" data-on="2PAGE" data-off="1PAGE"></span> 
				</label>
				</div>
			</div>
				<div class="menuSelectBar1" id="menuSelectBar1">
					<div class="test1">
						<label class="switch switch-slide" style="float:right;">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,"인구");' value="인구" type="checkbox" />
							<span class="switch-label" data-on="인구" data-off="인구"></span> 
						</label>
					</div>
					<div class="test2" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,"사업체");' value="사업체" type="checkbox" />
							<span class="switch-label" data-on="사업체" data-off="사업체"></span> 
							
						</label>
					</div>
					<div class="test3" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,3);' type="checkbox" />
							<span class="switch-label" data-on="33" data-off="33"></span> 
							
						</label>
					</div>
					<div class="test4" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,4);' type="checkbox" />
							<span class="switch-label" data-on="44" data-off="44"></span> 
							
						</label>
					</div>
					<div class="test5" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,5);' type="checkbox" />
							<span class="switch-label" data-on="55" data-off="55"></span> 
							
						</label>
					</div>
					<div class="test6" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,6);' type="checkbox" />
							<span class="switch-label" data-on="66" data-off="66"></span> 
							
						</label>
					</div>
					<div class="test7" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,7);' type="checkbox" />
							<span class="switch-label" data-on="77" data-off="77"></span> 
							
						</label>
					</div>
					<div class="test8" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,8);' type="checkbox" />
							<span class="switch-label" data-on="88" data-off="88"></span> 
							
						</label>
					</div>
					<div class="test9" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,8);' type="checkbox" />
							<span class="switch-label" data-on="99" data-off="99"></span> 
							
						</label>
					</div>
					<div class="test10" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,8);' type="checkbox" />
							<span class="switch-label" data-on="00" data-off="00"></span> 
							
						</label>
					</div>
				</div>
				<div class="menuSelectBar2" id="menuSelectBar2">
					<div class="test1">
						<label class="switch switch-slide" style="float:right;">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,1);' type="checkbox" />
							<span class="switch-label" data-on="인구2" data-off="인구2"></span> 
						</label>
					</div>
					<div class="test2" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,2);' type="checkbox" />
							<span class="switch-label" data-on="사업체2" data-off="사업체2"></span> 
							
						</label>
					</div>
					<div class="test3" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,3);' type="checkbox" />
							<span class="switch-label" data-on="333" data-off="333"></span> 
							
						</label>
					</div>
					<div class="test4" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,4);' type="checkbox" />
							<span class="switch-label" data-on="444" data-off="444"></span> 
							
						</label>
					</div>
					<div class="test5" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,5);' type="checkbox" />
							<span class="switch-label" data-on="555" data-off="555"></span> 
							
						</label>
					</div>
					<div class="test6" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,6);' type="checkbox" />
							<span class="switch-label" data-on="666" data-off="666"></span> 
							
						</label>
					</div>
					<div class="test7" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,7);' type="checkbox" />
							<span class="switch-label" data-on="777" data-off="777"></span> 
							
						</label>
					</div>
					<div class="test8" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,8);' type="checkbox" />
							<span class="switch-label" data-on="888" data-off="888"></span> 
							
						</label>
					</div>
					<div class="test9" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,8);' type="checkbox" />
							<span class="switch-label" data-on="999" data-off="999"></span> 
							
						</label>
					</div>
					<div class="test10" style="float:right;">
						<label class="switch switch-slide">
							<input class="switch-input" name="category[]" onclick='managementMenuBar(this,8);' type="checkbox" />
							<span class="switch-label" data-on="000" data-off="000"></span> 
							
						</label>
					</div>
				</div>
			<div id="chart_div" ></div>
			<div id= "MapText"></div>
			<div id= "Logo">
				<a href="http://sgis.kostat.go.kr/html/index.html"><img src="/image/SGIS_logo.png" border="0"></a>
				<a href="http://cms.daegu.ac.kr/chaka/"><img src="/image/MSL.jpg" border="0"></a>
		
		</div>
		
		
<script type="text/javascript">

google.setOnLoadCallback(drawChart);

$(document).ready(function () {

	//초기화
	createMap();	//지도생성
	reqOpenApiBoundaryHadmarea("22", "2013", "1"); //대구광역시 경계호출 (22: 대구광역시코드, 2013:최신경계년도, "1": 하위경계단계)
	
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

var checkcategory = function(){
 var box_count=0;
        var checkboxs = document.getElementsByName("category[]"); 
        for (var i = 0; i < checkboxs.length; i++) 
            if(eval(checkboxs[i].checked) == true){
            box_count++;
			//alert(checkboxs[i].value);
			if (box_count<=3) {
			checkboxs[i].checked = false;
			alert(checkboxs[i].value);
			return;
          } 
        }
          if (box_count<=3) {
           return;
          }  
}


var managementMenuBar = function(BTdata,Num){
//	alert(BTdata.checked+" : "+Num);
	//여기서 메뉴에 있는 버튼들을 관리 한다.
	//각 버튼 클릭 시, 각 View를 담당하는 함수로 해당 정보를 넘길 것.
	//지역 선택 시 자료를 분석하여, 각 지역에 해당하는 특징에 해당하는 "버튼" 을 활성화
	//버튼이 선택한 상태로 지역이 변경되어도 유지가 되어야 한다.

	//현재 초기에는 인구와 사업체가 선택되어 있어야함
	//인구를 비활성화 했을 때, 사업체 정보만 나타나도록 해야 함.
	checkcategory();
//	document.getElementById("menuSelectBar1").style.display="none";


}

var navigatormanagment = function(BTdata){
	alert(BTdata.checked);
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

	map = sop.map("map", mapOptions);
	map.setView([1096230, 1759759], 4);

	//인구정보 요청
	doReqPopulation();

	var Prefix = "<font size = 2>총인구통계</font>";

	var attr = sop.control.attribution({
		  position:"topright",
		  prefix: Prefix
	});

	 attr.addAttribution(LegendText); // attribution 추가

    attr.addTo(map);
	alert(aa);

};



//인구통계정보를 요청한다.
function doReqPopulation(){
	reqOpenApiPopulation("22", successCallback);	//대구광역시 인구통계정보요청 

	function successCallback(tmpData) {
		data = tmpData;
		for (var i=0; i<data.length; i++) {
			data[i]["showData"] = "population";	// 통계데이터 중 화면에 표출한 정보 파라미터명
			data[i]["unit"] = "명";				// 표출정보 단위
		}
		reqOpenApiBoundaryHadmarea("22", "2013", "1");
	}
};


//초기화한다.
var doClear = function() {
	alert('Clear');
	doRemoveMarker();
	reqOpenApiBoundaryHadmarea("22", "2013", "1");
	map.setView([1096230, 1759759], 5);
}; 

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
				
				break;
			}
		}
	}else {
		html += "<tr>";
		html += "<td>" + layer.properties.adm_nm + "</td>";
		html += "</tr>";
	}
	html += "</table>";
	event.target.bindToolTip(html, {
		direction: 'right',
		noHide:true,
		opacity: 1
	}).addTo(map)._showToolTip(event);
	
};

var didSelectBox = function(selValue){
	var type = "data";
	if (type == "data") {
		var adm_cd = selValue;
		reqOpenApiPopulation(adm_cd, successCallback);
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = "population";	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
		};
		
		var didZoomMap;
		var didZoomLevel;
		
		if(adm_cd == 22){didZoomMap = [[1096230, 1759759]]; didZoomLevel = 4;}
		if(adm_cd == 22010){didZoomMap = [[1098714, 1763917]]; didZoomLevel = 7;}
		if(adm_cd == 22020){didZoomMap = [[1106970, 1771533]]; didZoomLevel = 6;}
		if(adm_cd == 22030){didZoomMap = [[1094746, 1764813]]; didZoomLevel = 6;}
		if(adm_cd == 22040){didZoomMap = [[1095957, 1759959]]; didZoomLevel = 6;}
		if(adm_cd == 22050){didZoomMap = [[1097210, 1770765]]; didZoomLevel = 6;}
		if(adm_cd == 22060){didZoomMap = [[1104890, 1760397]]; didZoomLevel = 6;}
		if(adm_cd == 22070){didZoomMap = [[1092903, 1759497]]; didZoomLevel = 6;}
		if(adm_cd == 22310){didZoomMap = [[1088410, 1757389]]; didZoomLevel = 5;}
		
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

	if (type == "data") {
		if(map.getZoom() == 6 || map.getZoom() == 7 ||"22310" == layer.properties.adm_cd){
		var adm_cd = "22";
		map.setView([1096230, 1759759], 5);
		}else{
		var adm_cd = layer.properties.adm_cd;
		}
		//달서구 표시 오류 문제 해결해야 함.

		reqOpenApiPopulation(adm_cd, successCallback);
		function successCallback(tmpData) {
			data = tmpData;
			for (var i=0; i<data.length; i++) {
				data[i]["showData"] = "population";	// 통계데이터 중 화면에 표출한 정보 파라미터명
				data[i]["unit"] = "명";				// 표출정보 단위
			}
			reqOpenApiBoundaryHadmarea(adm_cd, "2013", "1");
		};

		//alert(event.target.getBounds().getSouthWest());

		if(map.getZoom() == 6 || map.getZoom() == 7){

		}else{
		map.fitBounds(event.target.getBounds(), {
			maxZoom : 6,
			animate : true
		});
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
};

//경계정보를 요청한다.
var reqOpenApiBoundaryHadmarea = function(adm_cd, year, low_search) {
	reqOpenAPIAuth("590a2718c58d41d9ae3b", "ab7fe94f9fb64336abd3", success);
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

	drawChart(adm_cd);
};


function drawChart(adm_cd) {
	 var XMLHttp;
	 var graph_value = adm_cd;
	 var Toppopulation;

	 if(window.XMLHttpRequest) {
		 XMLHttp = new XMLHttpRequest();
	 } else {
		 XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
	 }

	 XMLHttp.onreadystatechange=function () {
		if(XMLHttp.readyState==4 && XMLHttp.status==200) {

			var DB_Date = XMLHttp.responseText;
			var array_data = DB_Date.split("//");
			var DB_cp1 = array_data[0];
			var DB_cp2 = array_data[1];
			var DB_cp3 = array_data[2];
			var DB_cp4 = array_data[3];
			var DB_cp5 = array_data[4];
			var DB_name = array_data[5];

			DB_cp1*=1;
			DB_cp2*=1;
			DB_cp3*=1;
			DB_cp4*=1;
			DB_cp5*=1;
		   //분류 뒤에 변수를 두고 버튼의 활성화에 따라 달라져야 함.
		   var valuename = "인구";
		   var data = google.visualization.arrayToDataTable([
		     ["분류 : "+valuename, "통계", '직업만족도' ],
		     ["20세", DB_cp1, 0],
		     ["25세", DB_cp2, 0],
		     ["30세", DB_cp3, 0],
		     ["사업체", DB_cp4, 0],
		     ["직업만족도(%)", ,DB_cp5]
		   ]);
		
		   var options = {
		     title: DB_name+" 종합 통계 그래프"+"\n"+"(대구전체: 천단위, 구군별: 백단위)",
		     width: 400,
		     height: 650,
		     bar: {groupWidth: "70%"},
		     legend: { position: "none" },
		     series: {
		            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
		            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
		          },
		          axes: {
		            y: {
		              distance: {label: '인구'}, // Left y-axis.
		              brightness: {side: 'right', label: '만족도(%)'} // Right y-axis.
		            }
		          }
		   };
		   var chart = new google.charts.Bar(document.getElementById("chart_div"));
		   chart.draw(data, options);
		}

		Toppopulation = Math.max(DB_cp1,DB_cp2,DB_cp3);

		document.getElementById("MapText").innerHTML = "현재 <font size=5>"+DB_name+"</font>의 가장 많은 인구 연령대는 <font size=5>"+Toppopulation+"</font>명 이며 사업체수는 <font size=5>"+DB_cp4+"</font>개이다. 또한 직업만족도에 대한 설문으로는 보통 이상을 답한 분포가 <font size=5>"+DB_cp5+"% </font>로 나타났다.</font>";
	 }

	 XMLHttp.open("GET", "servey.php?num="+graph_value, true);
	 XMLHttp.send();
	
}

</script>
</body>
</html>