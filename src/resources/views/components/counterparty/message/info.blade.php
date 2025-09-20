@if(session('message_info'))
    <div class="alert alert-info">
        <span>{{ session('message_info') }}</span>
    </div>
@endif