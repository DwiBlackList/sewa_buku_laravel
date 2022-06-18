@if(Session::has('flash_message'))
<div class="alert alert-dark alert-dismissible {{ Session::has('penting') ? 'alert-important' : '' }}">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{ Session::get('flash_message') }}
</div>
@endif