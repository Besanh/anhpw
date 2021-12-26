<div class="container">
    <div id="carousel-slide-product" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @if ($image)
                <li data-target="#carousel-slide-product" data-slide-to="0" class="active"></li>
            @endif
            @if ($galleries && is_array(json_decode($galleries)))
                @foreach (json_decode($galleries) as $k => $item)
                    <?php $k++; ?>
                    <li data-target="#carousel-slide-product" data-slide-to="{{ $k }}"></li>
                @endforeach
            @endif
        </ol>
        <div class="carousel-inner">
            @if ($image)
                <div class="carousel-item active">
                    <img class="img-thumbnail d-block w-100" src="{{ getImage($image) }}"
                        alt="{{ config('app.name') }}">
                </div>
            @endif
            @if ($galleries && is_array(json_decode($galleries)))
                @foreach (json_decode($galleries) as $item)
                    <div class="carousel-item">
                        <img class="img-thumbnail d-block w-100" src="{{ getImage($item) }}"
                            alt="{{ config('app.name') }}">
                    </div>
                @endforeach
            @endif
        </div>
        <a class="carousel-control-prev" href="#carousel-slide-product" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('Previous') }}</span>
        </a>
        <a class="carousel-control-next" href="#carousel-slide-product" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">{{ __('Next') }}</span>
        </a>
    </div>
</div>
