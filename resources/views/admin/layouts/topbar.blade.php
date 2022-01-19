@php
use Illuminate\Support\Arr;
@endphp
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown dropdown-notifications no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw" data-count="{{ $count_unread_notification }}"></i>
                <!-- Counter - Alerts -->
                @if ($count_unread_notification)
                    <span class="badge badge-danger badge-counter badge-counter-notification">
                        {{ $count_unread_notification . ($count_unread_notification > 0 ? '+' : '') }}
                    </span>
                @endif
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in dropdown-menu-center"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    <span>{{ __('Alerts Center') }}</span>
                    <span class="float-right mark-all-read" style="cursor: pointer">{{ __('Mark All Read') }}</span>
                </h6>
                @forelse ($notifications as $k => $n)
                    @switch($n->type)
                        @case($n->type == 'App\Notifications\SubscribeNotification')
                            <a class="dropdown-item d-flex align-items-center mark-as-read"
                                href="{{ route('notification.show', $n->id) }}" data-id="{{ $n->id }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-user-plus text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    @if ($n->read_at)
                                        {!! Arr::get($n->data, 'message') !!}
                                    @else
                                        <span class="font-weight-bold">{!! Arr::get($n->data, 'message') !!}</span>
                                    @endif
                                    <div class="small text-gray-500">{!! Arr::get($n->data, 'created_at') !!}</div>
                                </div>
                            </a>
                        @break
                        @case($n->type == 'App\Notifications\BillNotification')
                            <a class="dropdown-item d-flex align-items-center mark-as-read"
                                href="{{ route('notification.show', $n->id) }}" data-id="{{ $n->id }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-danger">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    @if ($n->read_at)
                                        {!! Arr::get($n->data, 'message') !!}
                                    @else
                                        <span class="font-weight-bold">{!! Arr::get($n->data, 'message') !!}</span>
                                    @endif
                                    <div class="small text-gray-500">{!! Arr::get($n->data, 'created_at') !!}</div>
                                </div>
                            </a>
                        @break
                        @case($n->type == 'App\Notifications\ContactNotification')
                            <a class="dropdown-item d-flex align-items-center mark-as-read"
                                href="{{ route('notification.show', $n->id) }}" data-id="{{ $n->id }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success text-white">
                                        <i class="fa fa-info-circle"></i>
                                    </div>
                                </div>
                                <div>
                                    @if ($n->read_at)
                                        {!! Arr::get($n->data, 'message') !!}
                                    @else
                                        <span class="font-weight-bold">{!! Arr::get($n->data, 'message') !!}</span>
                                    @endif
                                    <div class="small text-gray-500">{!! Arr::get($n->data, 'created_at') !!}</div>
                                </div>
                            </a>
                        @break
                        @case($n->type == 'App\Notifications\TaskNotification')
                            <a class="dropdown-item d-flex align-items-center mark-as-read"
                                href="{{ route('notification.show', $n->id) }}" data-id="{{ $n->id }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-info text-white">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    @if ($n->read_at)
                                        {!! Arr::get($n->data, 'message') !!}
                                    @else
                                        <span class="font-weight-bold">{!! Arr::get($n->data, 'message') !!}</span>
                                    @endif
                                    <div class="small text-gray-500">{!! Arr::get($n->data, 'created_at') !!}</div>
                                </div>
                            </a>
                        @break
                        @default
                            <a class="dropdown-item d-flex align-items-center mark-as-read"
                                href="{{ route('notification.show', $n->id) }}" data-id="{{ $n->id }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    @if ($n->read_at)
                                        {!! Arr::get($n->data, 'message') !!}
                                    @else
                                        <span class="font-weight-bold">{!! Arr::get($n->data, 'message') !!}</span>
                                    @endif
                                    <div class="small text-gray-500">{!! Arr::get($n->data, 'created_at') !!}</div>
                                </div>
                            </a>
                    @endswitch
                    @empty
                        <span class="text-center text-gray-500">{{ __('There are no new notifications') }}</span>
                    @endforelse
                    <a class="dropdown-item text-center small text-gray-500"
                        href="{{ route('notification.index') }}">{{ __('Show All Alerts') }}</a>
                </div>

                <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" title="Message" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter"></span>
                </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        {{ Auth::guard('admin')->user()->name }}
                    </span>
                    <img class="img-profile rounded-circle"
                        src="{{ Auth::guard('admin')->user()->getProfileAdmin->avatar }}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item"
                        href="{{ route('profile.show', Auth::guard('admin')->user()->getProfileAdmin->id) }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('Profile') }}
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('Settings') }}
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('Activity Log') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('Logout') }}
                    </a>
                </div>
            </li>
        </ul>
    </nav>
