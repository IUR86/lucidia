@props(['name', 'label'])

<label for="{{ $name }}">{{ $label }}</label>
<input type="number" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}">

<x-admin.form.message.error name="{{ $name }}" />