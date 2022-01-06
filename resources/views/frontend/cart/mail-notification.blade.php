@component('mail::message')
@lang('Thank you for your order! Your order is being processed and will be completed within 3-6 hours. You will receive an email confirmation when your order is completed.')<br>
@lang('Your track number is: '.$bill_no.'. <a href="">Track Order</a>')<br>
@lang('View more our products')<br>
@component('mail::button', ['url' => route('frontend.default')])
@lang('Visit')
@endcomponent

@lang('Thanks'),<br>
{{ config('app.name') }}
@endcomponent
