@unless($breadcrumbs->isEmpty())
    <section class="g-brd-bottom g-brd-gray-light-v4 g-py-30">
        <div class="container">
            <ul class="u-list-inline">
                @foreach ($breadcrumbs as $breadcrumb)

                    @if ($breadcrumb->url && !$loop->last)
                        <li class="list-inline-item g-mr-5">
                            <a class="u-link-v5 g-color-text" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                            <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
                        </li>
                    @else
                        <li class="list-inline-item g-color-primary">
                            <span>{{ $breadcrumb->title }}</span>
                        </li>
                    @endif

                @endforeach
            </ul>
        </div>
    </section>
@endunless
{{-- <section class="g-brd-bottom g-brd-gray-light-v4 g-py-30">
    <div class="container">
        <ul class="u-list-inline">
            <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-text" href="#">Home</a>
                <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
            </li>
            <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-text" href="#">Pages</a>
                <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
            </li>
            <li class="list-inline-item g-color-primary">
                <span>Category Left Sidebar</span>
            </li>
        </ul>
    </div>
</section> --}}
