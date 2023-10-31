@component('mail::message')

<h1>Contact Form</h1>

@component('mail::panel')
**Name:** {{ $data['first_name'] }} {{ $data['last_name'] }}
**Phone:** {{ $data['phone'] }}
**Email:** {{ $data['email'] }}

**Message:**
{!! nl2br(e($data['message'])) !!}
@endcomponent

<p>Thank you for using our application!</p>
@endcomponent
