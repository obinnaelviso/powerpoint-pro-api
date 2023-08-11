<x-mail::message>

# Hi {{ $name }},

{!! $messageText !!}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
