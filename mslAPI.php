<!DOCTYPE html>
<html>
<?
  include ("connect_db.php");
?>
<head>
<title>SOP JavaScript : Marker zIndex sample</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="https://sgisapi.kostat.go.kr/OpenAPI3/auth/javascriptAuth?consumer_key=08669cbdfef243f6a643"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<style type="text/css">
	#header	{width:100%; height:100px;}
	
	#map { width: 65%;
	       height: 800px;
	       float:left;}
	       
    #side { width: 30%;
    		height: 800px;
	        padding: 10px;
	        float: Right;
	        border: 1px solid #bcbcbc;}    
       	   
</style>

<body>
		<div id="header"></div>
		<div id="map"></div>
		<div id="side">
			<div id="" class = "elem">
				지역 선택 : 
			 	<select id="mySelect" onchange = "select_list()">	
			 		<option value="대구광역시" selected="selected" >전체 보기</option>
					<option value="남구">남구</option>
			    	<option value="달서구">달서구</option>
			    	<option value="달성군">달성군</option>
			    	<option value="동구">동구</option>
			    	<option value="북구">북구</option>
			    	<option value="서구">서구</option>
			    	<option value="수성구">수성구</option>
			    	<option value="중구">중구</option>
		    	</select>
			</div>
			
			<div id="chart_div" ></div>
		</div>
		
<script type="text/javascript">

google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
google.setOnLoadCallback(drawChart2);

 var map,tmp, x = 1095869, y = 1760171;	//대구광역시 위치
 var idxF, idxS, oriArea, sopArea, oriArea1, sopArea1;
 var adm_cdd = 22;
 var select_name;
 
 chage_line(adm_cdd);
 
 map = sop.map("map"); // Map 생성
 map.setView(sop.utmk(x, y), 5); // 지도 중심좌표로 뷰 설정
//지역선택시 행정코드 바꾸기
 function select_list(){
	 var x = document.getElementById("mySelect").selectedIndex + 1;
	 
	 switch(x){

	 	case 1:
	    	adm_cdd = 22;
	    	zzz = 1;
	        break;
	        
	    case 2:
	    	adm_cdd = 22040;
	    	zzz = 2;
	        break;

		case 3:
	    	adm_cdd = 22070;
	    	zzz = 3;
	        break;

		case 4:
	    	adm_cdd = 22310;
	    	zzz = 4;
	        break;
	        
	    case 5:
	    	adm_cdd = 22020;
	    	zzz = 5;
	        break;
	        
	    case 6:
	    	adm_cdd = 22050;
	    	zzz = 6;
	        break;
	        
	    case 7:
	    	adm_cdd = 22030;
	    	zzz = 7;
	        break;
	        
	    case 8:
	    	adm_cdd = 22060;
	    	zzz = 8;
	        break;
	        
	    case 9:
	    	adm_cdd = 22010;
	    	zzz = 9;
	        break;
 
	    default:
		    zzz = 1;
		    break;
	}

	 chage_line(adm_cdd);
	 drawChart(zzz);
 }
 
//대구 지역 경계 표시
function createServiceRequest(reqFunc, reqParam) {
  return function () {
   // 인증 API
   sop.api.authentication({
    param: {
     consumer_key: "08669cbdfef243f6a643",
     consumer_secret: "cf8e4eb500194c1b975d"
    },
    success: function (status, res) {
     reqParam.accessToken = res.result.accessToken;
     reqFunc(reqParam);
    }
   });
  }
}

 if (sopArea) {
	   sopArea.remove();
	   sopArea = undefined;
	   oriArea = undefined;
 }
 
 function chage_line(adm_cdd){
	 
	 if (sopArea) {
		   sopArea.remove();
		  }
		  sopArea = undefined;
		  oriArea = undefined;
		  
	 createServiceRequest(sop.api.boundary.hadmarea, {
		 param: {
			 year: "2012",
			 adm_cd: adm_cdd
		 },
	
		 datatype: "geojson",
		 success: function (status, res) {
		    oriArea = res;
		    sopArea = sop.geoJson(res).addTo(map);
		    map.fitBounds(sopArea.getBounds());
		 }
	})();
 }
 
 
 
 function drawChart(zzz) {
	 var test;
	 //var url = "servey.php?num="+num;

 	 if(window.XMLHttpRequest) {
 		 test = new XMLHttpRequest();
 	 } else {
 	     test = new ActiveXObject("Microsoft.XMLHTTP");
 	 }

 	 test.onreadystatechange=function () {
 		if(test.readyState==4 && test.status==200) {

 			var DB_Date = test.responseText;
 			var array_data = DB_Date.split("//");
 			var DB_cp1 = array_data[0];
			var DB_cp2 = array_data[1];
			var DB_cp3 = array_data[2];
			var DB_cp4 = array_data[3];
			var DB_cp5 = array_data[4];

			DB_cp1*=1;
			DB_cp2*=1;
			DB_cp3*=1;
			DB_cp4*=1;
			DB_cp5*=1;
	 
		   var data = google.visualization.arrayToDataTable([
		     ["Element", "통계", { role: "style" } ],
		     ["20~24세", DB_cp1, "#b87333"],
		     ["25~29세", DB_cp2, "silver"],
		     ["30~34세", DB_cp3, "gold"],
		     ["사업체", DB_cp4, "color: #e5e4e2"],
		     ["직업만족도(%)", DB_cp5, "red"]
		   ]);
		
		   var view = new google.visualization.DataView(data);
		   view.setColumns([0, 1,
		                    { calc: "stringify",
		                      sourceColumn: 1,
		                      type: "string",
		                      role: "annotation" },
		                    2]);
		
		   var options = {
		     title: "종합 통계 그래프",
		     width: 350,
		     height: 650,
		     bar: {groupWidth: "70%"},
		     legend: { position: "none" },
		   };
		   var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
		   chart.draw(view, options);
 		}
 	 }

 	 test.open("GET", "servey.php?num="+zzz, true);
	 test.send();
 	
 }

 function drawChart2() {
		 var test;
		 //var url = "servey.php?num="+num;

	 	 if(window.XMLHttpRequest) {
	 		 test = new XMLHttpRequest();
	 	 } else {
	 	     test = new ActiveXObject("Microsoft.XMLHTTP");
	 	 }

	 	 test.onreadystatechange=function () {
	 		if(test.readyState==4 && test.status==200) {

	 			var DB_Date = test.responseText;
	 			var array_data = DB_Date.split("//");
	 			var DB_cp1 = array_data[0];
				var DB_cp2 = array_data[1];
				var DB_cp3 = array_data[2];
				var DB_cp4 = array_data[3];
				var DB_cp5 = array_data[4];

				DB_cp1*=1;
				DB_cp2*=1;
				DB_cp3*=1;
				DB_cp4*=1;
				DB_cp5*=1;
		 
			   var data = google.visualization.arrayToDataTable([
			     ["Element", "통계", { role: "style" } ],
			     ["20~24세", DB_cp1, "#b87333"],
			     ["25~29세", DB_cp2, "silver"],
			     ["30~34세", DB_cp3, "gold"],
			     ["사업체", DB_cp4, "color: #e5e4e2"],
			     ["직업만족도(%)", DB_cp5, "red"]
			   ]);
			
			   var view = new google.visualization.DataView(data);
			   view.setColumns([0, 1,
			                    { calc: "stringify",
			                      sourceColumn: 1,
			                      type: "string",
			                      role: "annotation" },
			                    2]);
			
			   var options = {
			     title: "종합 통계 그래프",
			     width: 350,
			     height: 650,
			     bar: {groupWidth: "70%"},
			     legend: { position: "none" },
			   };
			   var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
			   chart.draw(view, options);
	 		}
	 	 }

	 	 test.open("GET", "servey.php?num="+1, true);
		 test.send();
	 	
	 }

 
</script>
</body>
</html>