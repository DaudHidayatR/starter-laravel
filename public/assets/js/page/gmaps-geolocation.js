"use strict";

// initialize map
var map = new GMaps({
  div: '#map',
  lat: -6.5637928,
  lng: 106.7535061
});
// initialize map geolocation
GMaps.geolocate({
  // when geolocation is allowed by users
  success: function(position) {
    // set center map according to users position
    map.setCenter(position.coords.latitude, position.coords.longitude);
    // add a marker to the map
    map.addMarker({
      lat: position.coords.latitude,
      lng: position.coords.longitude,
      title: 'You'
    });
  },
  // when geolocation is blocked by the users
  error: function(error) {
    toastr.error('Geolocation failed: '+error.message);
  },
  // when the users's browser does not support
  not_supported: function() {
    toastr.error("Your browser does not support geolocation");
  }
});
