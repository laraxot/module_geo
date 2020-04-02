try {
    window.$ = window.jQuery = require('jquery');
    window.L = window.leaflet = leaflet = require('leaflet');
    require('leaflet-extra-markers');
    require('leaflet.markercluster');
	require('leaflet.locatecontrol');
    require('leaflet-sidebar-v2');
	require('opening_hours');

} catch (e) {
    console.log(e);

}
