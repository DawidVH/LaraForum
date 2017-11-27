@component('mail::message')
# Welcome

Welcome to the forum, {{$user->name}}

@component('mail::button', ['url' => '#'])
Start browsing
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
