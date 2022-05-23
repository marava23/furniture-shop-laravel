@component('mail::message')
    # {{ $subject }}

    {{ $message }}
    Sent from: {{$name}} - {{ $email }}
@endcomponent
