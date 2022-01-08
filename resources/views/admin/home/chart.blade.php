<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">@lang('Profit')</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart" data-url="{{ route('chart-bill') }}"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">@lang('Top view products')</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart" data-url="{{ route('chart-top-view-product') }}"></canvas>
                </div>
                <div class="mt-4 small row">
                    @if ($chart_pie)
                        @foreach ($chart_pie as $k => $pie)
                            @switch($k)
                                @case(0)
                                    <span class="col-md-6">
                                        <i class="fas fa-circle text-danger"></i> {{ subString($pie->name, 3) }}
                                    </span>
                                @break
                                @case(1)
                                    <span class="col-md-6">
                                        <i class="fas fa-circle text-primary"></i> {{ subString($pie->name, 3) }}
                                    </span>
                                @break
                                @case(2)
                                    <span class="col-md-6">
                                        <i class="fas fa-circle text-success"></i> {{ subString($pie->name, 3) }}
                                    </span>
                                @break
                                @case(3)
                                    <span class="col-md-6">
                                        <i class="fas fa-circle text-info"></i> {{ subString($pie->name, 3) }}
                                    </span>
                                @break
                                @case(4)
                                    <span class="col-md-6">
                                        <i class="fas fa-circle text-warning"></i> {{ subString($pie->name, 3) }}
                                    </span>
                                @break
                                @default
                                    <span class="col-md-6">
                                        <i class="fas fa-circle text-primary"></i> {{ subString($pie->name, 3) }}
                                    </span>
                            @endswitch
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
