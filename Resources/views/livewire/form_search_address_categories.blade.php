<div>
    @php($name = 'address')
    <div class="home-address-container delay-1s fadeInUp animated">
        <div class="home-address">
            <form name="address" wire:submit.prevent="search()">
                <div class="home-address-group" id="address-group" wire:ignore>

                    <!--id="form_search_address_categories_json"-->
                    <input type="hidden" wire:model.lazy="form_data.{{ $name }}" {{-- wire:change="test" --}} />

                    <input type="text" data-google-address="{&quot;field&quot;: &quot;{{ $name }}&quot;}"
                        class="input home-address-input" autocomplete="off"
                        wire:model.lazy="form_data.{{ $name }}_value" {{-- wire:keydown="test"wire:change="test" --}} />

                    <input type="text" name="civic" placeholder="N°" wire:model.lazy="form_data.{{ $civic_number }}"
                        class="home-address-input home-civic-input ng-pristine ng-valid ng-touched d-none"
                        {{-- wire:keydown="test" --}}>

                    <button class="home-address-button home-geolocalize-button" type="button">
                        <img src="{{ Theme::asset('pub_theme::assets/img/svg/navigate.svg') }}" />
                    </button>
                </div>
                <button class="home-address-button home-search-address-button" type="submit" wire:click="search()">
                    Cerca
                </button>
                <div style="clear:both;"></div>
            </form>
            <br />
            @if ($warningCivicNumber)
                <div class="only-desktop home-error-popup home-address-messages home-error-popup-civic">
                    Per favore inserisci anche il numero civico
                </div>
            @endif


            @if ($warningSuggestedAddresses)
                <div class="only-desktop home-error-popup home-address-messages">
                    Per favore inserisci la via e il comune, poi scegli tra gli indirizzi suggeriti
                </div>
            @endif

        </div>
    </div>
    @if ($showActivityTypes)
        <div class="activities-categories-home-container text-center fadeInUp animated">
            <div class="activities-categories-home">
                @foreach ($enabledTypes as $type)
                    <a class="activities-categories-home-item" href="{{ $type['url'] }}">
                        <img src="{{ $type['img_src'] }}" /><br />
                        <p>{{ $type['title'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif



</div>

@push('styles')
    <style>
        .ap-input-icon.ap-icon-pin {
            right: 5px !important;
        }

        .ap-input-icon.ap-icon-clear {
            right: 10px !important;
        }

        .pac-container {
            z-index: 10000 !important;
        }

    </style>
@endpush

@push('scripts')
    <script>
        //Function that will be called by Google Places Library
        function initAutocomplete() {

            $('[data-google-address]').each(function() {
                var $this = $(this);
                var $addressConfig = $this.data('google-address');
                var $field = $('[name="' + $addressConfig.field + '"]');

                if ($field.val().length) {
                    //console.log($field.val());
                    var existingData = JSON.parse($field.val());
                    $this.val(existingData.value);
                }

                var $autocomplete = new google.maps.places.Autocomplete(
                    ($this[0]), {
                        types: ['geocode']
                    });

                $autocomplete.addListener('place_changed', function fillInAddress() {

                    var place = $autocomplete.getPlace();

                    var value = $this.val();
                    var latlng = place.geometry.location;
                    var data = {
                        "value": value,
                        "latlng": latlng
                    };

                    for (var i = 0; i < place.address_components.length; i++) {
                        var addressType = place.address_components[i].types[0];
                        data[addressType] = place.address_components[i]['long_name'];
                        data[addressType + '_short'] = place.address_components[i]['short_name'];
                    }



                    $val = JSON.stringify(data);
                    $field.val($val);
                    @this.set('form_data.' + $addressConfig.field, $val);
                    @this.set('form_data.' + $addressConfig.field + '_value', value);

                    // $('#form_search_address_categories_json').trigger('change');
                });

                $this.change(function() {
                    if (!$this.val().length) {
                        $field.val("");
                    }
                });


            });

        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places&callback=initAutocomplete"
        async defer></script>
@endpush
