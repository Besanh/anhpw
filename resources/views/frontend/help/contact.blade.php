<?php
use Illuminate\Support\Arr;
use App\Models\Contact;
?>
<div class="row">
    <div class="col-md-4 g-mb-30">
        <!-- Media -->
        <div class="media">
            <div class="d-flex mr-2">
                <span class="u-icon-v3 g-width-20 g-height-20 g-color-white g-bg-primary g-font-size-12 rounded-circle">
                    <i class="fa fa-question"></i>
                </span>
            </div>
            <div class="media-body">
                <a class="u-link-v5 g-color-main g-color-primary--hover g-font-weight-600" href="#">
                    {{ __("Can't find answer?") }}
                </a>
                <p>{!! __('Do not worry. Our support team<br>will help you.') !!}</p>
            </div>
        </div>
        <!-- End Media -->
    </div>

    <div class="col-md-8 g-mb-30">
        @if (Session::has('message'))
            <div class="text-center mx-auto g-mb-70">
                <div class="alert alert-success">
                    {!! Session::get('message') !!}
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="text-center mx-auto g-mb-70">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {!! $error !!}
                    @endforeach
                </div>
            </div>
        @endif
        <!-- Contact Form -->
        <form action="{{ route('contact.post-contact') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="{{ Arr::get(Contact::$types, 'help') }}" />

            <div class="row">
                <div class="col-md-6 form-group g-mb-20">
                    <input
                        class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15"
                        type="text" name="name" placeholder="{{ __('Name') }}" required>
                </div>

                <div class="col-md-6 form-group g-mb-20">
                    <input
                        class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15"
                        type="email" name="email" placeholder="{{ __('Email') }}" required>
                </div>

                <div class="col-md-6 form-group g-mb-20">
                    <input
                        class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15"
                        type="text" name="address" placeholder="{{ __('Address') }}" required>
                </div>

                <div class="col-md-6 form-group g-mb-20">
                    <input
                        class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15"
                        type="tel" name="phone" placeholder="{{ __('Phone') }}" required>
                </div>

                <div class="col-md-12 form-group g-mb-20">
                    <input
                        class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15"
                        type="tel" name="subject" placeholder="{{ __('Subject') }}" required>
                </div>

                <div class="col-md-12 form-group g-mb-40">
                    <textarea
                        class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-resize-none rounded g-py-13 g-px-15"
                        rows="7" name="content" placeholder="{{ __('Content') }}" required></textarea>
                </div>
            </div>

            <div class="text-center">
                <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" type="submit">
                    {{ __('Send Message') }}
                </button>
            </div>
        </form>
        <!-- End Contact Form -->
    </div>
</div>
