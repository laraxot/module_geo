@extends('geo::layouts.app')
@section('content')
	<script src="{{asset('data/farmshopGeoJson.js')}}"></script>
    <div id="map" class="sidebar-map"></div>
@endsection
