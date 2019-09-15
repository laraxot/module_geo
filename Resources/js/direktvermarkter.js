console.log("        @ @ @\n       []___\n      /    /\\____\n(~)  /_/\\_//____/\\ \n |   | || |||__|||\n     farmshops.eu \n Interesse am Code, Bug gefunden oder eine Verbesserungsidee? Schau vorbei auf GitHub! \n https://github.com/CodeforKarlsruhe/direktvermarkter");
var mappos = L.Permalink.getMapLocation();
var map = L.map('map', {
    center: mappos.center,
    zoom: mappos.zoom,
    minZoom: 2,
    maxZoom: 18,
    zoomControl: false
});
L.Permalink.setup(map);

var tiles = L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: "&copy; <a target='_blank' href='https://www.openstreetmap.org/copyright'>OpenStreetMap</a>"
});
var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
});

var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});



var farmMarker = L.ExtraMarkers.icon({
    icon: 'fa-number',
    markerColor: 'green-light',
    shape: 'square',
    prefix: 'fa',
});

var machineMarker = L.ExtraMarkers.icon({
    icon: 'fa-number',
    markerColor: 'cyan',
    shape: 'square',
    prefix: 'fa',
});

var beekeeperMarker = L.ExtraMarkers.icon({
    icon: 'fa-number',
    markerColor: 'yellow',
    shape: 'square',
    prefix: 'fa'
});

var marketMarker = L.ExtraMarkers.icon({
    icon: 'fa-coffee',
    markerColor: 'orange',
    shape: 'square',
    prefix: 'fa'
});

var blackMarker = L.ExtraMarkers.icon({
    icon: 'fa-number',
    markerColor: 'black',
    shape: 'circle',
    number: '?',
    prefix: 'fa',
});


//Darstellung

//Marker 
var geojson1;
var json = require('./resto.json'); 
console.log(json);
showMarker(json.data);
///showMarker(farmshopGeoJson);
/*
axios.get("http://multih.local/it/restaurant?format=transform&name=map")
.then(function (response) {
    console.log('farmshopGeoJson');
    console.log(farmshopGeoJson);
    console.log('response.data.data')
    console.log(response.data.data);
    //showMarker(response.data.data);
}).catch(function (err){
    console.log(err);
});
*/
//var data = L.GeoJSON.AJAX("data.json");

function showMarker($data){
    geojson1 = L.geoJson($data, {
    pointToLayer: function pointToLayer(feature, latlng) {
        if (feature.properties.p === 'beekeeper') {
            return L.marker(latlng, { icon: beekeeperMarker });
        }
        else if (feature.properties.p === 'farm') {
            return L.marker(latlng, { icon: farmMarker });
        } 
        else if (feature.properties.p === 'marketplace') {
            return L.marker(latlng, { icon: marketMarker });
        } else if (feature.properties.p === 'vending_machine') {
            return L.marker(latlng, { icon: machineMarker });
        } else {
            console.log("nicht bekannte Daten verwendet");
            return L.marker(latlng, { icon: blackMarker });
        }
    },

    onEachFeature: function onEachFeature(feature, layer) {
        layer.once("click", function () {
            /*
            $.getJSON('../data/' + feature.properties.id + '/details.json', function (data) {
                layer.bindPopup(popupcontent(data, layer)).openPopup();
            });
            */
            $.getJSON(feature.properties.url + '?format=json', function (data) {
                layer.bindPopup(popupcontent(data, layer)).openPopup();
            });

        });
    }
}).addLayer(tiles);
}
//Changing Cluster radius based on zoom level
var GetClusterRadius = function (zoom) { 
    if (zoom < 12){
        return 80;
    }
    else{
        return 45;
    }
}

var markers = L.markerClusterGroup({
    iconCreateFunction: function (cluster) {
        var markers = cluster.getAllChildMarkers();

        function markerTypen (markers){
            var returnWert;
            var farmsInCluster = false;
            var marketsInCluster = false;
            var machinesInCluster = false;
            var beekeepersInCluster = false;

           
            for (var c = 0; c < markers.length; c++) {
                switch(markers[c].feature.properties.p){
                    case 'farm': farmsInCluster = true; break;
                    case 'beekeeper': beekeepersInCluster = true; break;
                    case 'marketplace': marketsInCluster = true; break;
                    case 'vending_machine':machinesInCluster = true; break;
                    default:
                        console.log("else schleife");
                    break;
                }

                //console.log("f " +farmsInCluster +" m " +marketsInCluster +" a " +machinesInCluster)
              
              }

              function farmsAreInCluster (farmsInCluster) {
                  if (farmsInCluster) {
                      return "<img src='../img/hof.png' style='height: 14px;'> "
                  }
                  else {
                      return ""
                  }
              }

              function marketsAreInCluster (marketsInCluster) {
                if (marketsInCluster) {
                    return "<img src='../img/markt.png' style='height: 14px;'> "
                }
                else {
                    return ""
                }
            }

            function beekeepersAreInCluster (beekeepersInCluster) {
                if (beekeepersInCluster) {
                    return "<img src='../img/imker.png' style='height: 14px;'> "
                }
                else {
                    return ""
                }
            }

            function machinesAreInCluster (machinesInCluster) {
                if (machinesInCluster) {
                    return "<img src='../img/automat.png' style='height: 14px;'> "
                }
                else {
                    return ""
                }
            }

            //change cluster content based on zoom level
            if (map.getZoom() >= 8){
                returnWert = markers.length +"<div style='padding-top:2px;'>" +farmsAreInCluster(farmsInCluster) +marketsAreInCluster(marketsInCluster) +machinesAreInCluster (machinesInCluster) +beekeepersAreInCluster(beekeepersInCluster) +"</div>";
            }
            else{
                returnWert = "<div style='padding:8px;'>" +markers.length +"</div>";
            }
        
            return returnWert;
        }
        // console.log("markerS: " +markers)
        var html = '<div class="circle"><strong>' +markerTypen(markers) + '</strong></div>';
        return L.divIcon({ html: html, className: 'test', iconSize: L.point(80,80) });
    },
    spiderfyOnMaxZoom: true,
    maxClusterRadius: GetClusterRadius,
    showCoverageOnHover: true,
    zoomToBoundsOnClick: true,
    removeOutsideVisibleBounds: true,
});

markers.addLayer(geojson1);
map.addLayer(markers);
console.log(lastUpdate);

var sidebar = L.control.sidebar('sidebar').addTo(map);

var tilesAuswahl = {
    "Wikipedia Kartenstil": tiles,
    "Openstreetmap": OpenStreetMap_Mapnik,
    "Satelit": Esri_WorldImagery,
};

var overlays = {
    "Marker": markers,
};
L.control.scale({position: 'topright'}).addTo(map);

L.control.layers(tilesAuswahl,overlays).addTo(map);



L.control.zoom({
    position: 'bottomright'
}).addTo(map);


L.control.locate({
    position: 'bottomright',
    drawMarker: true,
    drawCircle: true,
    flyTo: true,
    keepCurrentZoomLevel: false,
    strings: {
        title: "Karte auf meine aktuelle Position zentrieren!"
    },
    locateOptions: {
        maxZoom: 12
    },
    clickBehavior: {
        inView: 'setView', 
        outOfView: 'setView'
    }
}
).addTo(map);
