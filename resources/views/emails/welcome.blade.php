@component('mail::message')
# Welcome

Welcome to the forum, {{$user->name}}.
You can start using your account now.

@component('mail::button', ['url' => '#'])
Start browsing
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
