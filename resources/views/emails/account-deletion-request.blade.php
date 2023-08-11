<x-mail::message>

# NAME: {{ $name }} <br>
# EMAIL ADDRESS: {{ $email }} <br>
# PHONE NUMBER: {{ $phone }} <br>
# REASON: <br>{{ $reason }} <br>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
