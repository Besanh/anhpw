<?php
use Illuminate\Support\Facades\Cache; ?>
<div class="col-sm-auto g-pos-rel g-py-14">
    <!-- List -->
    <ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">
        {!! Cache::get('TREE_TOPBAR') !!}
    </ul>
    <!-- End List -->
</div>
