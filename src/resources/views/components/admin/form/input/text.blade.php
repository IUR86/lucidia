@props(['name', 'label'])

<label for="{{ $name }}">{{ $label }}</label>
<input type="text" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}">

<x-admin.form.message.error name="{{ $name }}" />