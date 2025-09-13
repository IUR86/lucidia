@props(['name', 'label'])

<label for="{{ $name }}">{{ $label }}</label>
<textarea id="{{ $name }}" name="{{ $name }}">{{ old($name) }}</textarea>

<x-admin.form.message.error name="{{ $name }}" />