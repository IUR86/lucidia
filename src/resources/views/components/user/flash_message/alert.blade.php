@props(['alert_message' => null])

@session('alert_flash_message')
    <div class="alert alert-danger" role="alert">
        {{ session('alert_flash_message') }}
    </div>
@endsession

@if ($alert_message)
    <div class="alert alert-danger" role="alert">
        {{ $alert_message }}
    </div>
@endif