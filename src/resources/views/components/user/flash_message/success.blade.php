@props(['success_message' => null])

@session('success_flash_message')
    <div class="alert alert-success" role="alert">
        {{ session('success_flash_message') }}
    </div>
@endsession

@if ($success_message)
    <div class="alert alert-success" role="alert">
        {{ $success_message }}
    </div>
@endif