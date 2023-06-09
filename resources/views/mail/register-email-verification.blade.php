@component('mail::message')
# Introduction

The body of your message.

{{ $user->email_verified_code}}

@component('mail::button', ['url' => '#'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
