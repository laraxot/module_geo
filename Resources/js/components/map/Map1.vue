<template>
    <div class="container">
         <div id="mapid" class="center-block" style="width: 100%; height: 400px;"></div>
    </div>
</template>

<script>
    //import {L} from 'leaflet';
    //var L = require('leaflet');
    import "leaflet/dist/leaflet.css";
    import * as L from 'leaflet';


    export default {
        data() {
            return {
                map: null
            };
        },
        mounted() {

            this.map = L.map('mapid').setView([51.959, -8.623], 12);
            //var icon = L.icon({iconUrl: "{{asset('/images/vendor/leaflet/dist/marker-icon.png') }}"});
            /*
            //icon.options.shadowSize = [0,0];
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 19,
                //id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
            }).addTo(mymap);
            mymap.setView(new L.LatLng(53.4053, -6.3784), 13);
            */
            L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(this.map);
        },
        beforeDestroy() {
            if (this.map) {
                this.map.remove();
            }
        }
    }
</script>

<style>
    #map { height: 180px; }
</style>
