<h1>PROFILE PAGE</h1>

<ul>
    <li>{{ $user->name }}</li>
    <li>{{ $user->email }}</li>
    <li>{{ $user->role }}</li>
</ul>

@if ( $user->role === 'tutor' )
    <div>{{ $user->experience }}</div>
@endif

<div>
    <a href="{{ url('home') }}">DASHBOARD</a>
    <br>
    <a href="{{ url('users/'.$user->id.'/edit') }}">Edit profile</a>
    <br>
    <a href="{{ url('users/'.$user->id.'/change-password') }}">Change password</a>
</div>