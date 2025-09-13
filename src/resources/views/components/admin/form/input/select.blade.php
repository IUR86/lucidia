@props(['name', 'label'])

<label for="{{ $name }}">{{ $label }}</label>
<select id="{{ $name }}" name="{{ $name }}">
    <option value="1">公開</option>
    <option value="0">非公開</option>
</select>

<x-admin.form.message.error name="{{ $name }}" />