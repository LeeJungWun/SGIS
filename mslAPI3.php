<!DOCTYPE html>
<html>
<?
  include ("connect_db.php");
?>
<head>
<title>SOP JavaScript : Marker zIndex sample</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript"
	src="https://sgisapi.kostat.go.kr/OpenAPI3/auth/javascriptAuth?consumer_key=3f9f97438d0a42639210"></script>
</head>

<body>
	<div id="map" style="width: 800px; height: 600px"></div>
	<button id="person1">인구 분포 (20~24세)</button>
	<button id="person2">인구 분포 (24~29세)</button>
	<button id="person3">인구 분포 (30~34세)</button>
	<button id="company">사업체 조사</button>
	<button id="survey">직업 만족도 조사</button>
	<script type="text/javascript">

 var map,idxF, idxS, lenF, lefS,oriArea, sopArea,tmp, x = 35.887543, y = 128.575943;	//대구광역시 위치

 //마커를 표시할 좌표
 <?
    $locationX = array();
    $locationY = array();
 	$location = mysql_query("SELECT * FROM  exel20 ");
 	while ( $result = mysql_fetch_array ( $location ) ) {
			$locationX[]  = $result['posx'];
			$locationY[]  = $result['posy'];
	}
 ?>
 
 map = sop.map("map"); // Map 생성
 map.setView(sop.utmk(x, y), 4); // 지도 중심좌표로 뷰 설정

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

 createServiceRequest(sop.api.boundary.hadmarea, {
	 param: {
		 year: "2010",
		 adm_cd: "22"
	 },

	 datatype: "geojson",
	 success: function (status, res) {
	    oriArea = res;
	    sopArea = sop.geoJson(res).addTo(map);
	    map.fitBounds(sopArea.getBounds());
	 }
})();

 var infoWindow = sop.infoWindow(); // 인포윈도우 생성

 // 컨텐츠 내용 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능
 var contents = '<div style="font-family: dotum, arial, sans-serif;font-size: 18px; font-weight: bold;margin-bottom: 5px;">직업 만족도 조사</div>' +
         '<table style="border-spacing: 2px; border: 0px"><tbody><tr>' +
         '<td style="width: 40px; color:#767676;padding-right:12px">매우 만족</td>' +
         '<td style="width: 40px; color:#767676;padding-right:12px">5%</td></tr>' +
         '<tr><td style="color:#767676;padding-right:12px">만족</td>' +
         '<td style="width: 40px; color:#767676;padding-right:12px">25%</td></tr>' +
         '<tr><td style="color:#767676;padding-right:12px">보통</td>' +
         '<td style="width: 40px; color:#767676;padding-right:12px">40%</td></tr>' +
         '<tr><td style="color:#767676;padding-right:12px">불만족</td>' +
         '<td style="width: 40px; color:#767676;padding-right:12px">20%</td></tr>' +
         '<tr><td style="color:#767676;padding-right:12px">매우 불만족</td>' +
         '<td style="width: 40px; color:#767676;padding-right:12px">10%</td>' +
         '</tr></tbody></table>';

 infoWindow.setutmk([35.887543, 128.575943]); // 인포윈도우 중심좌표 설정

 infoWindow.setContent(contents); // 인포윈도우 컨텐츠 설정

 infoWindow.openOn(map); // 지도에 표출
//


</script>
</body>
</html>