function downloadUrl(url,callback) {
    var request = window.ActiveXObject ?
         new ActiveXObject('Microsoft.XMLHTTP') :
         new XMLHttpRequest;
     
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            //request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };
     
    request.open('GET', url, true);
    request.send(null);
}


    function loadMarkers() {
    map.markers = map.markers || []
    downloadUrl('markers.xml', function(data) {
        var xml = data.responseXML;
        markers = xml.documentElement.getElementsByTagName("marker");
        infowindow = new google.maps.InfoWindow();
        for (var i = 0; i < markers.length; i++) {
            var name = markers[i].getAttribute("name");
            var id = markers[i].getAttribute("id");
            var point = new google.maps.LatLng(
                parseFloat(markers[i].getAttribute("lat")),
                parseFloat(markers[i].getAttribute("lng")));
            var html = "<div class='infowindow'><b>" + name + "</b></div>'";
            var marker = new google.maps.Marker({
              map: map,
              position: point, 
              title: name
            });
        
            google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(html);
            infowindow.open(map,marker);

 });
        

        
            
        }
    });
}



