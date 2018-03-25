
<h1>ALL USERS- index page</h1>
@foreach ($users as $user)
    <div>
        {{ $user->name }}
        {{ $user->email }}
        {{ $user->role }}
    </div>
@endforeach

{{ $users->links() }}
{{ $users->total() }}

<br>

https://laravel.com/docs/5.6/pagination#paginator-instance-methods