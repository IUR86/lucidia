@props(['name'])

@error($name)
    <div class="error-message text-red-500 text-sm">{{ $message }}</div>
@enderror