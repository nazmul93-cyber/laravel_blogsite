@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}"/>
    <input name="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' => old($name)]) }} class="border border-gray-200 p-2 w-full rounded">
    <x-form.error name="{{ $name }}"/>
</x-form.field>
