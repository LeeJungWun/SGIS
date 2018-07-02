function addMarker(lat, lng, info,info2,info3) {
	var pt = new google.maps.LatLng(lat, lng);
	bounds.extend(pt);
	
	var marker = new google.maps.Marker({
		position: pt,
		map: map,
		icon: icon,
		title:"마커"
	});

	var infowindow = new google.maps.InfoWindow({
		content: '<form id="test">'
			+info+" "+ info3+"."+info2
    		+'<div id ="infowin"><p><?=$qustitle[0]?></p>'
    		+'<input type="hidden" name = "line" value= '+info+' /><br>'
    		+'<input type="hidden" name = "station" value= '+info3+' /><br>'
    		+'<input type="radio" name = "ans1"  class="q1" value="1"/><?=$ans1[0]?><br>'
			+'<input type="radio" name = "ans1"  class="q1" value="2"/><?=$ans2[0]?><br>'
			+'<input type="radio" name = "ans1"  class="q1" value="3"/><?=$ans3[0]?><br>'
			+'<input type="radio" name = "ans1"  class="q1" value="4"/><?=$ans4[0]?><br>'
			+'<input type="radio" name = "ans1"  class="q1" value="5"/><?=$ans5[0]?><br><br>'
			+'<p><?=$qustitle[1]?></p><br>'
			+'<input type="radio" name = "ans2"  class="q2" value="1"/><?=$ans1[1]?><br>'
			+'<input type="radio" name = "ans2"  class="q2" value="2"/><?=$ans2[1]?><br>'
			+'<input type="radio" name = "ans2"  class="q2" value="3"/><?=$ans3[1]?><br>'
			+'<input type="radio" name = "ans2"  class="q2" value="4"/><?=$ans4[1]?><br>'
			+'<input type="radio" name = "ans2"  class="q2" value="5"/><?=$ans5[1]?><br><br>'
			+'<input type="submit" id = "submit" class="subit" name ="submit" value ="확인" onclick="show_checked();"/></form>',
		maxWidth: 600
	});
	<?
		$query_search = "";

	?>
	//DB에 저장 시키고
	//파이차트를 그리기 위한 함수 호출
	google.maps.event.addListener(marker, 'click', function() {
		if (currentPopup != null) {
			 currentPopup.close();
			 currentPopup = null;
		}

		infowindow.open(map, marker);
		currentPopup = infowindow;
	});

	

	markers.push(marker);
	clearMarkers();
}