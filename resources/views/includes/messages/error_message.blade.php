@if(Session::has('error_message'))
<div class="alert alert-danger">
    {{ Session::get('error-message') }}
</div>
@endif