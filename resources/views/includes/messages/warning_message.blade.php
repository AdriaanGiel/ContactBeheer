@if(Session::has('warning_message'))
<div class="alert alert-warning">
    {{ Session::get('warning-message') }}
</div>
@endif