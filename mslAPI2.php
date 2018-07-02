<!DOCTYPE html>
<?
  include ("connect_db.php");
?>
<html>
<head>
    <title>SOP Javascript : Map create sample</title>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script type="text/javascript" src="https://sgisapi.kostat.go.kr/OpenAPI3/auth/javascriptAuth?consumer_key=08669cbdfef243f6a643"></script>
</head>
<body>

 <div id="map" style="width:650px;height:400px"></div>
 <button id="person">인구 조회</button>
 <script type="text/javascript">
   var map, mapOptions,infoWindow ;
  mapOptions = {
   ollehTileLayer: true
  };

  // 지도 생성
  map = sop.map("map", mapOptions);
  map.setView([1095869, 1760171], 0);

  sop.DomUtil.get("person").onclick = person;

  function person() {

  <? 
	$sql =  mysql_query("SELECT * FROM  exel WHERE adm_nm = '중구'");
	while ( $result = mysql_fetch_array($sql)){
	  	$generation1 = $result['generation'];	//세대
	  	$total1  	 = $result['total'];	//총 인구
	  	$man1 		 = $result['man'];		//남성
	  	$woman1		 = $result['woman'];	//여성
	  	$pkm1 		 = $result['pkm'];		//인구 밀도
	  	$area1		 = $result['area'];	//면적
	  	$old1		 = $result['old'];		//고령
	}
  ?>

  var contents = '<p>안녕하세요</p>';
  
  var contents1 = '<div style="font-family: dotum, arial, sans-serif;font-size: 18px; font-weight: bold;margin-bottom: 5px;">중구</div>'
				 + '<table style="border-spacing: 2px; border: 0px"><tbody><tr>' 
				 + '<tr><td style="width: 100%; color:#767676;padding-right:12px">세대  </td>' 
				 + '<td><span><?=$generation1?></span></td></tr>' 
				 + '<tr><td style="width: 100; color:#767676;padding-right:12px">총 인구  </td>' 
				 + '<td><span><?=$total1?></span></td></tr>' 
				 + '<tr><td style="width: 100; color:#767676;padding-right:12px">남성  </td>' 
				 + '<td><span><?=$man1?></span></td></tr>' 
				 + '<tr><td style="width: 100; color:#767676;padding-right:12px">여성  </td>' 
				 + '<td><span><?=$woman1?></span></td></tr>' 
				 + '<tr><td style="width: 100; color:#767676;padding-right:12px">인구밀도  </td>' 
				 + '<td><span><?=$pkm1?></span></td></tr>' 
				 + '<tr><td style="width: 100; color:#767676;padding-right:12px">면적  </td>' 
				 + '<td><span><?=$area1?></span></td></tr>' 
				 + '<tr><td style="width: 100; color:#767676;padding-right:12px">인구밀도  </td>' 
				 + '<td><span><?=$old1?></span></td></tr>'  

	  			


  var marker1 = sop.marker([1099864, 1764205]) // 중구청
  .bindInfoWindow(contents1) //마커에 인포윈도우 바인드
  .addTo(map); //지도에 마커 추가

  var marker2 = sop.marker([1102495, 1766151]) // 동구청
  .bindInfoWindow(contents) //마커에 인포윈도우 바인드
  .addTo(map); //지도에 마커 추가

  var marker3 = sop.marker([1097744, 1765994]) // 북구청
  .bindInfoWindow(contents) //마커에 인포윈도우 바인드
  .addTo(map); //지도에 마커 추가

  var marker4 = sop.marker([1095616, 1764425]) // 서구청
  .bindInfoWindow(contents) //마커에 인포윈도우 바인드
  .addTo(map); //지도에 마커 추가

  var marker5 = sop.marker([1099128, 1761612]) // 남구청
  .bindInfoWindow(contents) //마커에 인포윈도우 바인드
  .addTo(map); //지도에 마커 추가
  
  var marker6 = sop.marker([1102085, 1762991]) // 수성구청
  .bindInfoWindow(contents) //마커에 인포윈도우 바인드
  .addTo(map); //지도에 마커 추가

  var marker7 = sop.marker([1093285, 1759761]) // 달서구청
  .bindInfoWindow(contents) //마커에 인포윈도우 바인드
  .addTo(map); //지도에 마커 추가

  var marker8 = sop.marker([1084209, 1753569]) // 마커 생성
  .bindInfoWindow(contents) //마커에 인포윈도우 바인드
  .addTo(map); //지도에 마커 추가

  map.setView(sop.utmk(1095869, 1760171), 5); // 지도 중심좌표로 뷰 설정
 }
 </script>
</body>
</html>
