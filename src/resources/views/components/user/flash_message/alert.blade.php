@session('alert_flash_message')
    <div class="alert alert-danger" role="alert">
        {{ session('alert_flash_message') }}
    </div>
@endsession