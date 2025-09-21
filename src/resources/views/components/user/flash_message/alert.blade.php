@session('flash_message')
    <div class="alert alert-danger" role="alert">
        {{ session('flash_message') }}
    </div>
@endsession