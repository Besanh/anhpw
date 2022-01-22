<div class="row">
    <!-- Tong bill hang thang-->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <a href="{{ route('bill.index') }}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                @lang('Total Bill (Monthly)')
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 total-bill-realtime"
                                        data-value="{{ Arr::get($bill, '0.count_bill') }}">
                                        {{ Arr::get($bill, '0.count_bill') }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="h5 mb-0 font-weight-bold text-danger total-price-realtime">
                                {{ getPrice(Arr::get($bill, '0.sum_bill')) }}</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Top 5 sp xem nhieu nhat -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <a href="{{ route('product.index') }}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                @lang('Most view product (Monthly)')
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 view-realtime"
                                data-value="{{ $total_view }}">
                                {{ $total_view }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Contact pending -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <a href="{{ route('contact.index') }}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                @lang('Pending Requests')
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 contact-realtime"
                                data-value="{{ Arr::get($contact, '0.count_contact') }}">
                                {{ Arr::get($contact, '0.count_contact') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Subscriber -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <a href="{{ route('subscriber.index') }}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                @lang('Subscriber')
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 subscriber-realtime"
                                data-value="{{ $subscriber }}">
                                {{ $subscriber }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <!-- Task -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            @lang('Taks')
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 task-realtime">
                            {{ 0 }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
