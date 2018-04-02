
<h1>ALL USERS- index page</h1>
@foreach ($users as $user)
    <div>
        <label>Name: {{ $user->name }}</label>
        <label>Email: {{ $user->email }}</label>
        <label>Role: {{ $user->role }}</label>

        <form method="POST" action="/users/{{ $user->id }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>
    </div>

@endforeach

{{ $users->links() }}
{{ $users->total() }}

<br>

https://laravel.com/docs/5.6/pagination#paginator-instance-methods