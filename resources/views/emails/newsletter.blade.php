@component('mail::message')
# Welcome to our Newsletter

We are happy to have you among us!
<br>
<br>
In this newsletter we will keep you updated with all the information you'd need about the Learn2Gether application, including updates on our app, and/or future promotions.
<br>
<br>
We hope you have you with us for a long time!

Thank you from:<br>
The {{ config('app.name') }} Team.

@component('mail::button', ['url' => 'https://fp-learn2gether.test/usbc'])
Unsubscribe
@endcomponent

@endcomponent
