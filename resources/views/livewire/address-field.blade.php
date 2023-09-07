@if (count($select_list) === 0)
    <input type="text" wire:model="form_data.{{ $name }}" class="form-control" value="">
@else
    <select class="form-select" wire:model="form_data.{{ $name }}" wire:change="selected">
        @foreach ($select_list as $itemKey => $itemVal)
            <option value="{{ $itemKey }}">{{ $itemVal }}</option>
        @endforeach
    </select>
@endif
