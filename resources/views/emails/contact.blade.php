@component('mail::message')
# Thank you for reaching out {{ $user['name'] }},

This is a confirmation email to inform that we received your message. With the message number being: #{{ $number }}.
<br>
<br>
We will do our best to reach back out to you as soon as possible.

Thanks,
<br>
The {{ config('app.name') }} Team.
@endcomponent
