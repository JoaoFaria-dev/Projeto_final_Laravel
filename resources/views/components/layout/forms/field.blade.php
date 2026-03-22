@props([
    'name' => '',
    'label' => '',
    'type' => 'text'
])


<div class="space-y-2">
    <label for="{{ $name }}" class="label">{{$label}}</label>
    <input name= "{{ $name }}" id="{{ $name }}" class="input" type="{{ $type }}" />
    <x-layout.forms.error :name="$name" />
</div>
