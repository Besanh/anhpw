<div class="container g-pt-100 g-pb-70">
    <div class="row g-mx-minus-10">
        @if ($cates)
            @foreach ($cates as $c)
                <div class="col-sm-6 col-md-4 g-px-10 g-mb-30">
                    <article class="u-block-hover">
                        <img class="img img-thumbnail w-100 u-block-hover__main--zoom-v1 g-mb-minus-8"
                            src="{{ asset($c->image) }}" alt="Image Description">
                        <div class="g-pos-abs g-bottom-30 g-left-30">
                        <span class="d-block g-color-black">{{__('Collections')}}</span>
                            <h2 class="h1 mb-0">{{ $c->name_seo }}</h2>
                        </div>
                        <a class="u-link-v2" href="{!! route('cate', $c->alias) !!}"></a>
                    </article>
                </div>
            @endforeach
        @endif
    </div>
</div>
