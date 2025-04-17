<div>

    @if (count($select_list) === 1 && $name != 'country')
        <input type="text" wire:model.lazy="form_data.{{ $name }}" class="form-control">
    @else
        <select class="form-select" wire:model="form_data.{{ $name }}">
            @foreach ($select_list as $itemKey => $itemVal)
                <option value="{{ $itemKey }}">{{ $itemVal }}</option>
            @endforeach
        </select>
    @endif
</div>
