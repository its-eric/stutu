
<h1>ALL Tutors</h1>
@foreach ($users as $user)
    <div>
        <label>Name:
            <a href="{{ url('tutors/'.$user->id.'/detail') }}">
                {{ $user->name }}
            </a>
        </label>
        <label>Email: {{ $user->email }}</label>
        <label>Role: {{ $user->role }}</label>
    </div>

@endforeach

{{ $users->links() }}
{{ $users->total() }}