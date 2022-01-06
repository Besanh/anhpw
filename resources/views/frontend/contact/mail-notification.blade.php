@component('mail::message')
@lang('# Introduction')

@lang('Information Client Contact')<br>
<b>{{__('Subject')}}:</b>&nbsp;{{$contact->subject}}<br>
<b>{{__('Type')}}:</b>&nbsp;{{$contact->type}}<br>
<b>{{__('Name')}}:</b>&nbsp;{{$contact->name}}<br>
<b>{{__('Email')}}:</b>&nbsp;{{$contact->email}}<br>
<b>{{__('Phone')}}:</b>&nbsp;{{$contact->phone}}<br>
<b>{{__('Address')}}:</b>&nbsp;{{$contact->address}}<br>
<b>{{__('Content')}}:</b>&nbsp;{{$contact->content}}<br>

@lang('Thanks'),<br>
{{ config('app.name') }}
@endcomponent
