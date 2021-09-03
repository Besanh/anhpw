<a class="btn btn-success" href="{{ route($uri . '.edit', $t->id) }}">
    <<i class="fa fa-paint-brush" aria-hidden="true"></i>
</a>
<a class="btn btn-warning" href="{{ route($uri . '.show', $t->id) }}">
    <i class="fa fa-eye" aria-hidden="true"></i>
</a>
<a class="delete-item btn btn-danger" data-id={{ $t->id }} onclick="return confirm('Are you sure?')"
    href="{{ route($uri . '.destroy', $t->id) }}">
    <i class="fa fa-trash"></i>
</a>
