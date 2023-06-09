(function($){
	$(document).ready(function(){
		var $lat = $("#mapScriptTag").data("lat"); //id deki data-lat a girilen sayıyı $lat değişkenine attım
		var $long = $("#mapScriptTag").data("long"); //id deki data-long a girilen sayıyı $long değişkenine attım

		// Google Haritalar
		//-----------------------------------------------
		if ($("#map-canvas").length>0) {
			var map, myLatlng, myZoom, marker;
			// Set the coordinates of your location
			myLatlng = new google.maps.LatLng($lat, $long); //burada da googlenin istediği değerleri gönderdim

			myZoom = 12;
			function initialize() {
				var mapOptions = {
					zoom: myZoom,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					center: myLatlng,
					scrollwheel: false
				};
				map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
				marker = new google.maps.Marker({
					map:map,
					draggable:true,
					animation: google.maps.Animation.DROP,
					position: myLatlng
				});
				google.maps.event.addDomListener(window, "resize", function() {
					map.setCenter(myLatlng);
				});
			}
			google.maps.event.addDomListener(window, "load", initialize);
		}
	}); // End document ready

})(this.jQuery);		