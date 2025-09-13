@props(['name', 'label'])

<label for="{{ $name }}">{{ $label }}</label>
<input type="date" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}">

@error($name)
    <div class="error-message text-red-500 text-sm">{{ $message }}</div>
@enderror

<x-admin.form.message.error name="{{ $name }}" />