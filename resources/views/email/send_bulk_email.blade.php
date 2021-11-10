@component('mail::message')
{{-- # Introduction --}}

{{ $mail_data['body'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
