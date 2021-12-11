<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('frontend.layouts.head')

</head>

<body>
    <main>
        <!-- Header -->
        <header id="js-header" class="u-header u-header--static u-shadow-v19">
            <!-- Top Bar -->
            @include('frontend.layouts.topbar')
            <!-- End Top Bar -->

            @include('frontend.layouts.navigation')
        </header>
        <!-- End Header -->
        {{-- <div id="pjax-container"> --}}
        @yield('content')
        {{-- </div> --}}

        {{-- Feature web --}}
        @include('frontend.layouts.features')

        @include('frontend.layouts.footer')

        @include('frontend.layouts.gototop')

        @include('frontend.layouts.modal')
    </main>

    <div class="u-outer-spaces-helper"></div>

    @include('frontend.layouts.script')
</body>


</html>
