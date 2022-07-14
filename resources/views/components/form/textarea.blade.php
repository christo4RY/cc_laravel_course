@props(['name','value' => ''])
<x-form.input-warapper>
    <x-form.label-form :name="$name" />
    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="8" class="form-control editor">{{ old($name,$value) }}</textarea>
    <x-error name="{{ $name }}" />
</x-form.input-warapper>
