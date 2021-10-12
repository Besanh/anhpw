<?php
use App\Models\Category;

$limits = [9, 18, 27, 36];
?>
<div class="d-flex justify-content-end align-items-center g-brd-bottom g-brd-gray-light-v4 g-pt-40 g-pb-20">
    <!-- Show -->
    <div class="g-mr-60">
        <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel g-top-1 mb-0">
            Show:</h2>

        <!-- Secondary Button -->
        <div class="d-inline-block btn-group g-line-height-1_2">
            <button type="button"
                class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $limit }}
            </button>
            <div class="dropdown-menu rounded-0">
                @if ($limits)
                    @foreach ($limits as $l)
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                            href="{{ route('cate', ['alias' => $alias, 'limit' => $l]) }}">{!! $l !!}</a>
                    @endforeach
                @endif
            </div>
        </div>
        <!-- End Secondary Button -->
    </div>
    <!-- End Show -->

    <!-- Sort By -->
    <div class="g-mr-60">
        <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel g-top-1 mb-0">
            Sort by:</h2>

        <!-- Secondary Button -->
        <div class="d-inline-block btn-group g-line-height-1_2">
            <button type="button"
                class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {!! 'Default' !!}
            </button>
            <div class="dropdown-menu rounded-0">
                @if (Category::arrayFilterProduct())
                    @foreach (Category::arrayFilterProduct() as $k => $item)
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                            href="{!! route('cate', ['alias' => $alias, 'limit' => $limit]) . '/' . $k !!}">{!! $item !!}</a>
                    @endforeach
                @endif
            </div>
        </div>
        <!-- End Secondary Button -->
    </div>
    <!-- End Sort By -->

    <!-- Sort By -->
    <ul class="list-inline mb-0">
        <li class="list-inline-item">
            <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v3 g-brd-black--hover g-color-gray-dark-v5 g-color-black--hover"
                href="page-list-filter-left-sidebar-1.html">
                <i class="icon-list"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="u-icon-v2 u-icon-size--xs g-brd-primary g-color-primary"
                href="page-grid-filter-left-sidebar-1.html">
                <i class="icon-grid"></i>
            </a>
        </li>
    </ul>
    <!-- End Sort By -->
</div>
