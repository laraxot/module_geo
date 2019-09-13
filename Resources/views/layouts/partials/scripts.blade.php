{{--
<script src="js/leaflet.js"></script>
    <script src="js/leaflet.permalink.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="css/leaflet.extra-markers.min.css">
    <script src="js/leaflet.extra-markers.min.js"></script>
    <script src="js/leaflet.markercluster.js"></script>
    <script src="js/leaflet-sidebar.js"></script>
    <script src="js/L.Control.Locate.min.js"></script>
    <script src="js/opening_hours+deps.min.js"></script>
    <script src="js/popupcontent.js"></script>
    <script src="js/direktvermarkter.js"></script>
--}}
@php
    if(0){
        Theme::add('geo::js/jquery-3.3.1.js');
        Theme::add('geo::js/leaflet.js');
        Theme::add('geo::js/leaflet.permalink.min.js');
        Theme::add('geo::js/leaflet.extra-markers.min.js');
        Theme::add('geo::js/leaflet.markercluster.js');
        Theme::add('geo::js/leaflet-sidebar.js');
        Theme::add('geo::js/L.Control.Locate.min.js');
        Theme::add('geo::js/opening_hours+deps.min.js');
        Theme::add('geo::js/popupcontent.js');
        Theme::add('geo::js/direktvermarkter.js');
    }else{
        Theme::add('geo::js/geo.js');
    }
    Theme::add('geo::js/popupcontent.js'); //Uncaught ReferenceError: popupcontent is not defined
@endphp
{!! Theme::showScripts(false) !!}