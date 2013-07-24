# Google Maps Widget

A google map widget for SilverStripe. This widget has intentially been made simple, leaving out any bloat.

CMS options include:

 * Latitude / Longitude
 * Zoom Level
 * Disable Controls

## Customising the map

You can customise the map via javascript, by accessing stored references to each map, found in the global variable `GoogleMapWidget.maps`.

For example, to style all maps grey, pan left 200px, and add a custom marker:

```javascript
(function($) {
	$(document).ready(function() {
		if(GoogleMapWidget){ //if widget is present
			var style = [
				{
					"stylers": [
						{ "saturation": -100}
					]
				}
			];
			var customMapType = new google.maps.StyledMapType(style);
			var map;
			for (var i in GoogleMapWidget.maps) {
				map = GoogleMapWidget.maps[i]
				map.mapTypes.set("STYLED_MAP", customMapType);
				map.setOptions({
					mapTypeId: "STYLED_MAP"
				});
				map.panBy(200,0);
				map.marker.setIcon("mysite/images/map_marker.png");
			};
		}
	});
})(jQuery);
```

Create a custom map styles here: http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html