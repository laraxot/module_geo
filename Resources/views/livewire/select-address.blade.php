<div>
    <label for="province" class="selected-menu">Provincia</label>
    <select class="form-select" wire:model="form_data.province" wire:change="provinceSelected">
        @foreach ($provinces_list as $itemKey => $itemVal)
            <option value="{{ $itemKey }}">{{ $itemVal }}</option>
        @endforeach
    </select>
    <label for="municipality" class="selected-menu">Comune</label>
    <select class="form-select" wire:model="form_data.municipality">
        @foreach ($municipalities_list as $itemKey => $itemVal)
            <option value="{{ $itemKey }}">{{ $itemVal }}</option>
        @endforeach
    </select>
    <input type="text" wire:model="form_data.postal_code" class="form-control" value="{{ $postal_code }}" readonly>
</div>
