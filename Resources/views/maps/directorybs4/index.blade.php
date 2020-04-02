@extends('pub_theme::layouts.app',['body_style'=>'padding-top: 72px;'])
@php
    Theme::add('https://unpkg.com/leaflet@1.5.1/dist/leaflet.css');
    Theme::add('https://unpkg.com/leaflet@1.5.1/dist/leaflet.js');
    $data=request()->all();
    $address=json_decode($data['address']);

    $lat=$address->latlng->lat;
    $lng=$address->latlng->lng;

    $restaurants=Theme::xotModel('restaurant')
                    ->where('locality',$address->city)
                    ->withDistance($lat,$lng)
                    //->inRandomOrder()
                    ->paginate(20);

@endphp
@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 py-5 p-xl-5">
        <h1 class="text-serif mb-4">Eat in {{$address->city}}</h1>
            {{--
                @include('pub_theme::map.index.filter')
                --}}

          <hr class="my-4">
          <div class="d-flex justify-content-between align-items-center flex-column flex-md-row mb-4">
            <div class="mr-3">
              <p class="mb-3 mb-md-0"><strong>{{ $restaurants->total() }}</strong> results found</p>
            </div>
            <div>
              <label for="form_sort" class="form-label mr-2">Sort by</label>
              <select name="sort" id="form_sort" data-style="btn-selectpicker" title="" class="selectpicker">
                <option value="sortBy_0">Most popular   </option>
                <option value="sortBy_1">Recommended   </option>
                <option value="sortBy_2">Newest   </option>
                <option value="sortBy_3">Oldest   </option>
                <option value="sortBy_4">Closest   </option>
              </select>
            </div>
          </div>
          <div class="row">
            @foreach($restaurants as $restaurant)
            @include('pub_theme::restaurant.swiper.item',['row'=>$restaurant])
            @endforeach
          </div>
                {{ $restaurants->links() }}
        </div>
        <div class="col-lg-6 map-side-lg pr-lg-0">
          <div id="categorySideMap" class="map-full shadow-left"></div>
        </div>
      </div>
    </div>
    @endsection

    @push('scripts')
    {{--
        <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
        --}}
    <script>
        var tileLayers = []

        tileLayers[1] = {tiles: 'https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>', subdomains: 'abcd'}
        tileLayers[2] = {tiles: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}
        tileLayers[3] = {tiles: 'https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.png', attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}
        tileLayers[4] = {tiles: 'https://mapserver.mapy.cz/base-m/{z}-{x}-{y}', attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, <a href="https://seznam.cz">Seznam.cz, a.s.</a>'}
        tileLayers[5] = {tiles: 'https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>', subdomains: 'abcd'}
        tileLayers[6] = {tiles: 'https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}{r}.png', attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://wikimediafoundation.org/wiki/Maps_Terms_of_Use">Wikimedia maps</a>'} // Originally used in the theme, but stopped working. Might be just temporary, though.
      </script>
    <script src="{{ Theme::asset('pub_theme::js/map-category.js') }}"></script>
    <script>
        createListingsMap({
            mapId: 'categorySideMap',
            mapZoom: 15,
            mapCenter: [40.732346, -74.0014247],
           /*
            circleShow: true,
            circlePosition: [40.732346, -74.0014247]
            */
            jsonFile: '{{ asset('/json/restaurants-geojson1.json') }}'
        });

      </script>

    @endpush
