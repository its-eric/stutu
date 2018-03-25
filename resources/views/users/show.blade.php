
{{ $user->name }}
{{ $user->email }}
{{ $user->role }}

@if ( $user->role === 'tutor' )
    <div>{{ $user->experience }}</div>
@endif
