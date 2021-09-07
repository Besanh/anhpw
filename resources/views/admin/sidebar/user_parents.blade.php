@if ($users)
    @foreach ($users as $item)
        <a class="nav-link collapsed" href="{{ $item->url }}" data-toggle="collapse"
            data-target="#{{ $item->note }}" aria-expanded="true" aria-controls="{{ $item->note }}">
            <i class="{{ $item->icon }}"></i>
            <span>{{ $item->name }}</span>
        </a>
        @include('admin.sidebar.user_childs', ['anchor' => $item->note, 'parent_id' => $item->id])
    @endforeach
@endif
