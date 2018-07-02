<?
  include ("connect_db.php");
?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>지도 마커 예제</title>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>	<?/*구글 맵 부분*/?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
 
var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
		new google.maps.Size(32, 32), new google.maps.Point(0, 0),
		new google.maps.Point(16, 32));
var center = null;
var map = null;
var currentPopup;
var markers = [];
var bounds = new google.maps.LatLngBounds();
var infowindow  = new google.maps.InfoWindow();

 
function show_checked(marker) {
	//Post 형식 참고 사이트 : http://www.ajax-tutor.com/post-data-server.html
	var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
		//alert("통신준비");
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
		//alert("엑티브엑스");
    }
    else {
        throw new Error("Ajax is not supported by this browser");
		alert("error not supported by browser");
    }
    // 1. Create XHR instance - End
    
    // 2. Define what to do when XHR feed you the response from the server - Start
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300) {
             // document.getElementById('myform').innerHTML = xhr.responseText;
			 
            }
        }
    }
    // 2. Define what to do when XHR feed you the response from the server - Start
	//info 버스노선번호
	//info3 버스정류장번호 station
	//info2 정류장이름
	//<?=$qustitle[0]?> 질문 "가"
	//<?=$qustitle[1]?> 질문 "나"
	
	
	//버스라인 13-1
	//q1 에 해당하는 값 1~5중 하나

//	  $line = $_POST['line'];
//  $station = $_POST['station'];
//  $q1 = $_POST['ans1'];	//질문의 대한 버튼 값
//  $q2 = $_POST['ans2'];	//질문의 대한 버튼 값
    var line = document.getElementById("line").value;
    var bustitle = document.getElementById("bustitle").value;
	var station = document.getElementById("station").value;
	var q1title = document.getElementById("q1").value;
	//var q2title = document.getElementById("q2").value;
    var q1 = $("input[name='ans1']:checked").val();

	//alert("변수 준비 : " + line);
	//alert("변수 준비 : " + station);
	//alert("변수 준비 : " + q1title);
	//alert("변수 준비 : " + q1);


    // 3. Specify your action, location and Send to the server - Start 
    xhr.open('POST', 'test5.php');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("line=" + line+"&station=" + station+ "&q1="+q1);
   //xhr.send("line=" + line+ ",station=" + bustation + ",ans1="+q1);
	//xhr.send("station=" + bustation);

    // 3. Specify your action, location and Send to the server - End

    alert("저장되었습니다");

	//initialize();

		alert("chart test : " + this);
		document.all("infowin").innerHTML="";

		<?
			$chart_query =  "SELECT * FROM  userans WHERE bustation = '3'";
			$chart_result = mysql_query($chart_query);
			while ( $result = mysql_fetch_array ( $chart_result ) ) {
				$answer_line = $result['busline'];		//버스 노선
				$answer_qustitle = $result['qustitle'];	//설문 내용
			  	$db_ans1  = $result['ans1'];	//DB에 저장된 답변값
			  	$db_ans2  = $result['ans2'];	//DB에 저장된 답변값
			  	$db_ans3  = $result['ans3'];	//DB에 저장된 답변값
			  	$db_ans4  = $result['ans4'];	//DB에 저장된 답변값
			  	$db_ans5  = $result['ans5'];	//DB에 저장된 답변값
			  	
			}
		?>
		
	// Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['전혀 그렇지 않다', <?=$db_ans1?>],
          ['대체로 그렇지 않다', <?=$db_ans2?>],
          ['보통이다', <?=$db_ans3?>],
          ['대체로 그렇다', <?=$db_ans4?>],
          ['매우 그렇다', <?=$db_ans5?>]
        ]);

		var data2 = new google.visualization.DataTable();
		data2.addColumn('string', 'Topping');
        data2.addColumn('number', 'Slices');
        data2.addRows([
          ['전혀 그렇지 않다', 25],
          ['대체로 그렇지 않다', 12],
          ['보통이다', 25],
          ['대체로 그렇다', 8],
          ['매우 그렇다', 9]
        ]);
        // Set chart options


            
        var node1        = document.createElement('div'), // chart1 div
			node2        = document.createElement('div'), // chart2 div
			allnode		= document.getElementById('infowin'),  // chart1 + chart2 div
            chart       = new google.visualization.PieChart(node1),
            chart2      = new google.visualization.PieChart(node2);
            
			allnode.appendChild(node1);
			allnode.appendChild(node2);

            chart.draw(data, {'title':'<?=$answer_line?> <?=$answer_qustitle?>',
                       'width':400,
                       'height':150});

			chart2.draw(data2, {'title':'13-1  가. 통학버스 정거장의 배차시간은 적절한가?',
                       'width':400,
                       'height':150});

            infoWindow.setContent(allnode);
            infoWindow.open(marker.getMap(),marker);
	
	//drawChart(this);
}


 
function addMarker(lat, lng, info,info2,info3) {
	var pt = new google.maps.LatLng(lat, lng);
	bounds.extend(pt);
	
	var marker = new google.maps.Marker({
		position: pt,
		map: map,
		icon: icon,
		title:"마커"
	});

	<?
		$ans1 = array();
		$query2 = mysql_query("SELECT * FROM  quslist ");
		while ( $row2 = mysql_fetch_array ( $query2 ) ) {
			$qustitle[]  = $row2['qustitle'];
			$ans1[] = $row2['ans1'];
			$ans2[] = $row2['ans2'];
			$ans3[] = $row2['ans3'];
			$ans4[] = $row2['ans4'];
			$ans5[] = $row2['ans5'];
		}
	?>
	
	
	//info 버스노선번호
	//info3 버스정류장번호
	//info2 정류장이름
	//<?=$qustitle[0]?> 질문 "가"
	//<?=$qustitle[1]?> 질문 "나"
	
	infowindow = new google.maps.InfoWindow({
		content: '<form id="myform" method = "POST">'
			+info+" "+ info3+"."+info2
    		+'<div id ="infowin"><p><?=$qustitle[0]?></p>'
    		+'<input type="hidden" id = "line" name = "line" value= '+info+' /><br>'
    		+'<input type="hidden" id = "bustitle" name = "bustitle" value= '+info2+' /><br>'
    		+'<input type="hidden" id = "station" name = "station" value= '+info3+' /><br>'
    		+'<input type="hidden" id = "q1" name = "q1" value= <?=$qustitle[0]?> /><br>'
    		+'<input type="hidden" id = "q2" name = "q2" value= <?=$qustitle[1]?> /><br>'
    		+'<input type="radio" name = "ans1"  class="q1" value="ans1"/><?=$ans1[0]?><br>'
			+'<input type="radio" name = "ans1"  class="q1" value="ans2"/><?=$ans2[0]?><br>'
			+'<input type="radio" name = "ans1"  class="q1" value="ans3"/><?=$ans3[0]?><br>'
			+'<input type="radio" name = "ans1"  class="q1" value="ans4"/><?=$ans4[0]?><br>'
			+'<input type="radio" name = "ans1"  class="q1" value="ans5"/><?=$ans5[0]?><br><br>'
			+'<p><?=$qustitle[1]?></p><br>'
			+'<input type="radio" name = "ans2"  class="q2" value="ans1"/><?=$ans1[1]?><br>'
			+'<input type="radio" name = "ans2"  class="q2" value="ans2"/><?=$ans2[1]?><br>'
			+'<input type="radio" name = "ans2"  class="q2" value="ans3"/><?=$ans3[1]?><br>'
			+'<input type="radio" name = "ans2"  class="q2" value="ans4"/><?=$ans4[1]?><br>'
			+'<input type="radio" name = "ans2"  class="q2" value="ans5"/><?=$ans5[1]?><br><br>'
			+'<input type="submit" id = "submit" class="subit" name ="submit" value ="확인" onclick="show_checked();"/> </div></form>',
		maxWidth: 600
	});
 
	google.maps.event.addListener(marker, 'click', function() {
		if (currentPopup != null) {
			 currentPopup.close();
			 currentPopup = null;
		}
 
		infowindow.open(map, marker);
		currentPopup = infowindow;
		//show_checked(marker)
	});
 
	
 
	markers.push(marker);
	clearMarkers();
}
 
 
function setAllMap(map) {
	  for (var i = 0; i < markers.length; i++) {
	    markers[i].setMap(map);
	  }
	}
 
//마커 감추기
function clearMarkers() {
	markers.length = 0;
	for (var i = 0; i < markers.length; i++) {
	    markers[i].setMap(null);
	  }
  setAllMap(null);
}
 
//마커 보이기
 
function showMarkers(getselect) {
	initialize();
	<?
	  $query1 = mysql_query("SELECT * FROM  scbusline WHERE bustation = '2' ");
	  $Row = mysql_fetch_row($query1);
	?>
 
	var select = getselect;
	
	initialize();
	//
	if(select == '13-1'){
		initialize();
		var lockml = '1-1';
		//경로 그리기 KML 파일 선택을 위한 변수
	<?
		$query_search = "SELECT * FROM  scbusline WHERE busline = '13-1'";
		//각 버스 노선에 대한 쿼리 정보를 담고 있어야 함.
 
		$query_exec= mysql_query($query_search);
		while ( $row = mysql_fetch_array ( $query_exec ) ) {
	    	$bustitle  = $row ['bustitle'];
			$busline = $row ['busline'];
			$bustation = $row ['bustation'];
			$lat = $row ['lat'];
			$lng = $row ['lng'];
			echo ("addMarker($lat, $lng,'$busline','<b>$bustitle</b>','$bustation');\n");
	    	
		}
	?>
		
	}else if(select == '13-2'){
		initialize();
		var lockml = '1-2';
	<?
		$query_search = "SELECT * FROM  scbusline WHERE busline = '13-2'";
 
		$query_exec= mysql_query($query_search);
		while ( $row = mysql_fetch_array ( $query_exec ) ) {
	    	$bustitle  = $row ['bustitle'];
			$busline = $row ['busline'];
			$bustation = $row ['bustation'];
			$lat = $row ['lat'];
			$lng = $row ['lng'];
			echo ("addMarker($lat, $lng,'$busline','<b>$bustitle</b>','$bustation');\n");
	    	
		}
	?>
	}
 
	var secMarker = new google.maps.LatLng(<?=$Row[3];?>,<?=$Row[4];?>);
	map.setCenter(secMarker);
	setAllMap(map);
		var ctaLayer = new google.maps.KmlLayer({
    url: 'http://mslsgis.dothome.co.kr/loc'+lockml+'.kml',
 
	});
	ctaLayer.setMap(map);
 
 
 
}
 
function initialize() { 
	// 버튼이 눌렸을 떄, 쿼리를 보내서 검색을 하고, 마커와 라인을 그려야 한다.
	clearMarkers();
	//35.890450, 128.590408
	var myLatlng = new google.maps.LatLng(35.890450, 128.590408); 
    var mapOptions = { 
        zoom: 12, 
          center: myLatlng, 
          mapTypeId: google.maps.MapTypeId.ROADMAP 
    } 
 
    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions); 
	
 
    center = bounds.getCenter();
    //map.fitBounds(bounds);
 
} 
 google.load('visualization', '1.0', {'packages':['corechart']});
</script>
 
</head>
 
<body onload="initialize()">
	<div id="map_canvas" style="width: 800px; height: 800px"></div>
	<input type="button" id ="search" value ="13-1버스 노선" onclick="showMarkers('13-1');"/>
	<input type="button" id ="search" value ="13-2버스 노선" onclick="showMarkers('13-2');"/>
 
</body>
</html>