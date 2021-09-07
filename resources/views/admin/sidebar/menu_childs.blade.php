@if ($childs)
    <div id="{{ $anchor }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Components:</h6>
            @foreach ($childs as $item)
                @if ($item->parent_id === $parent_id)
                    <a class="collapse-item" href="{{ url($item->url) }}">{{ $item->name }}</a>
                @endif
            @endforeach
        </div>
    </div>
@endif
