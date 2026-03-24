@props([
    'name' => '',
    'label' => '',
    'type' => 'text'
])

<div class="space-y-2">
    <label for="{{ $name }}" class="label">{{ $label }}</label>

    @if($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" class="input" {{ $attributes }}></textarea>

    @else
        <input name="{{ $name }}" id="{{ $name }}" class="input" type="{{ $type }}" {{ $attributes }} />
    @endif

    <x-layout.forms.error :name="$name" />
</div>
