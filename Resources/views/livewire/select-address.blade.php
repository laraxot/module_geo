<div>
    @if ($is_with_countries)
        <label for="country" class="selected-menu">Regione</label>
        <select class="form-select" wire:model="form_data.country" wire:change="countrySelected">
            @foreach ($countries_list as $itemKey => $itemVal)
                <option value="{{ $itemKey }}">{{ $itemVal }}</option>
            @endforeach
        </select>
    @endif
    @if ($is_with_regions)
        <label for="region" class="selected-menu">Regione</label>
        @if (count($regions_list) === 0)
            <input type="text" wire:model="form_data.region" class="form-control" value="">
        @else
            <select class="form-select" wire:model="form_data.region" wire:change="regionSelected">
                @foreach ($regions_list as $itemKey => $itemVal)
                    <option value="{{ $itemKey }}">{{ $itemVal }}</option>
                @endforeach
            </select>
        @endif
    @endif
    <label for="province" class="selected-menu">Provincia</label>
    @if (count($provinces_list) === 0)
        <input type="text" wire:model="form_data.province" class="form-control" value="">
    @else
        <select class="form-select" wire:model="form_data.province" wire:change="provinceSelected">
            @foreach ($provinces_list as $itemKey => $itemVal)
                <option value="{{ $itemKey }}">{{ $itemVal }}</option>
            @endforeach
        </select>
    @endif
    <label for="municipality" class="selected-menu">Comune</label>
    @if (count($municipalities_list) === 0)
        <input type="text" wire:model="form_data.municipality" class="form-control" value="">
    @else
        <select class="form-select" wire:model="form_data.municipality" wire:change="municipalitySelected">
            @foreach ($municipalities_list as $itemKey => $itemVal)
                <option value="{{ $itemKey }}">{{ $itemVal }}</option>
            @endforeach
        </select>
    @endif
    <label for="postal_code" class="selected-menu">CAP</label>
    <input type="text" wire:model="form_data.postal_code" class="form-control" value="{{ $postal_code }}">
</div>
