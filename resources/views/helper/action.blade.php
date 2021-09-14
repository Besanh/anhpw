<a class="btn btn-success" href="{{ route($uri . '.edit', $id) }}">
    <i class="fa fa-paint-brush" aria-hidden="true"></i>
</a>
<a class="btn btn-warning" href="{{ route($uri . '.show', $id) }}">
    <i class="fa fa-eye" aria-hidden="true"></i>
</a>
<a class="delete-item btn btn-danger" data-id={{ $id }} onclick="return confirm('Are you sure?')"
    href="{{ route($uri . '.destroy', $id) }}">
    <i class="fa fa-trash"></i>
</a>
