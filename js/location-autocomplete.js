$(vojoCdhMonterrey_InitLocationAutocomplete);

var _cdhAddressToLoc = {};

function vojoCdhMonterrey_InitLocationAutocomplete() {
    var boundsCorners = {
        'sw': {'lon':-106.618195,'lat':31.500117},
        'ne': {'lon':-106.230926,'lat':31.834399}
    };
    var googleGeocodingBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(boundsCorners.sw.lat, boundsCorners.sw.lon),
            new google.maps.LatLng(boundsCorners.ne.lat, boundsCorners.ne.lon)
            );
    $('#edit-locations-0-name').autocomplete({
        'minLength': 3,
        /**
         * Hit google to geocode the address the user inputs
         */
         'source': function(req, respcb) {
            var plc = req.term;
            var gc = new google.maps.Geocoder();
            var _cb = respcb;
            gc.geocode({'address': plc,
                'bounds': googleGeocodingBounds
                }, function(results) {
                var sugg = [];
                _cdhAddressToLoc = {};
                if(results && results.length) {
                    for(var i=0; i<results.length; i++) {
                        sugg.push(results[i].formatted_address);
                        _cdhAddressToLoc[results[i].formatted_address] = results[i].geometry.location;
                    }
                }
                return _cb(sugg);
            });
        },
        /**
         * When they select an item from autocomplete, update the map and hidden input fields
         */
        'select': function(event,ui) {
            var loc = _cdhAddressToLoc[ui.item.value];
            var normalLon = loc.lng();
            var normalLat = loc.lat();
            // now update the real fields
            $("#edit-locations-0-locpick-user-latitude").val(normalLat);
            $("#edit-locations-0-locpick-user-longitude").val(normalLon);
        }
    });
}
