@component('mail::message')

    Hi, {{$data['friend_name']}}, {{$data['your_name']}}({{ $data['your_email'] }}) has referred you this job.

@component('mail::button', ['url' => $data['jobUrl']])
Show Job
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
