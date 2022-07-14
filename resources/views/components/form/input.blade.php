@props(['name', 'type' => 'text', 'value' => ''])
<x-form.input-warapper>
    <x-form.label-form :name="$name" />
    <input type="{{ $type }}" name="{{ $name }}"  class="form-control"
        value="{{ old($name, $value) }}" id="{{ $name }}">
</x-form.input-warapper>

<x-error name="{{ $name }}" />
