<?php
/**
 * Map Widget
 */
class MapWidget extends Widget {
	
	static $db = array(
		"Longitude" => "Varchar",
		"Latitude" => "Varchar",
		"Zoom" => "Int",
		"DisableUI" => "Boolean"
	);

	static $defaults = array(
		"Zoom" => 8,
		"Latitude" => -41.292923,
		"Longitude" => 174.779069
	);
	
	static $title = "Map";
	static $cmsTitle = "Google Map";
	static $description = "Inserts a Google Map on your page";

	function WidgetHolder(){
		$this->requirements();
		return parent::WidgetHolder();
	}

	function requirements(){
		Requirements::javascript("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false");
		Requirements::javascript(WIDGETS_GOOGLEMAP_DIR."/MapWidget.js");
		$options = json_encode(array(
			"latitude" => (float)$this->Latitude,
			"longitude" => (float)$this->Longitude,
			"zoom" => (int)$this->Zoom,
			"canvasid" => $this->CanvasID,
			"disableUI" => (bool)$this->DisableUI
		));
		Requirements::customScript("google.maps.event.addDomListener(window, 'load', GoogleMapWidget.createmap($options));");
	}

	function getCanvasID(){
		return "map-canvas-".$this->ID;
	}
		
	function getCMSFields() {
		return new FieldList(
			TextField::create("Latitude", "Latitude Coordinate"),
			TextField::create("Longitude", "Longitude Coordinate"),
		    NumericField::create("Zoom", "Zoom Level"),
		    CheckboxField::create("DisableUI","Disable Controls")
		);

	}
}
