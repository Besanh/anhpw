<div class='loader-{{ $id }}' style='display: none;'>
    <img src='{{ asset('img/loading-gif.gif') }}' width='15px' height='15px'>
</div>
@if ($status == 1)
    <a class="update-status" href="{!! $uri !!}">
        <span hidden>{{ $status }}</span>
        <i class="status status-{{ $id }} fa fa-check text-success" data-id="{!! $id !!}"></i>
    </a>
@else
    <a class="update-status" href="{!! $uri !!}">
        <span hidden>{{ $status }}</span>
        <i class="status status-{{ $id }} fa fa-times text-danger" data-id="{!! $id !!}"></i>
    </a>
@endif
