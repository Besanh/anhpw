<?php
use Illuminate\Support\Facades\Cache;
$sliders = Cache::get('sliders');
?>
<div class="g-overflow-hidden">
    <div class="container">
        <div id="carousel-slide" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($sliders as $j => $itm)
                    <li data-target="#carousel-slide" data-slide-to="{{ $j }}"
                        class="{{ $j == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @if ($sliders)
                    @foreach ($sliders as $k => $item)
                        <div class="carousel-item {{ $k == 0 ? 'active' : '' }}">
                            <a href="{{ $item->link }}">
                                <img class="d-block w-100" src="{{ $item->image }}" alt="{{ config('app.name') }}">
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
            <a class="carousel-control-prev" href="#carousel-slide" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">{{ __('Previous') }}</span>
            </a>
            <a class="carousel-control-next" href="#carousel-slide" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">{{ __('Next') }}</span>
            </a>
        </div>
    </div>
</div>
