@foreach (['danger', 'warning', 'success', 'info'] as $message)
@if(Session::has('alert-' . $message))
<div class="alert alert-{{ $message }} alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @if ($message == 'success')
    <h5><i class="icon fas fa-check"></i> Yeay!</h5>
    @elseif($message == 'danger')
    <h5><i class="icon fas fa-ban"></i> Auch!</h5>
    @elseif($message == 'warning')
    <h5><i class="icon fas fa-exclamation-triangle"></i> Oops!</h5>
    @elseif($message == 'info')
    <h5><i class="icon fas fa-info"></i> Info!</h5>
    @endif
    {{ Session::get('alert-' . $message) }}
</div>
@endif
@endforeach