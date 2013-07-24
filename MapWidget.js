var GoogleMapWidget = {
	maps: {}
};
GoogleMapWidget.createmap = function createmap(options) {
	var center = new google.maps.LatLng(options.latitude, options.longitude);
	var mapOptions = {
		zoom: options.zoom,
		center: center,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: options.disableUI,
		scrollwheel: false //TODO: make this optional
	};
	var map = new google.maps.Map(document.getElementById(options.canvasid), mapOptions);
	GoogleMapWidget.maps[options.canvasid] = map; //store reference to each map
	var marker = new google.maps.Marker({
      position: center,
      map: map
	});
	map.marker = marker; //store a reference to marker
}