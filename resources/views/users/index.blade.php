
<h1>ALL USERS- index page- for only admin privilege</h1>
@foreach ($users as $user)
    <div>
        <!-- List all users except for logined admin -->
        <div>
            <label>Name: <a href="{{ url('users/'.$user->id.'/edit') }}">{{ $user->name }}</a></label>
            <label>Email: {{ $user->email }}</label>
            <label>Role: {{ $user->role }}</label><br>
        </div>

        <!-- List courses of tutors -->
        <div>
            <p>Courses</p>
            @foreach ($user->courses as $course)
                ID: {{ $course->id }}
                Name:
                <a href="{{ url('courses/'.$course->id.'/edit') }}"> {{ $course->name }}</a><br>

            @endforeach
        </div>

        <!-- Delete tutor button -->
        <form method="POST" action="/users/{{ $user->id }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Delete tutor</button>
        </form>
    </div>

@endforeach

{{ $users->links() }}
{{ $users->total() }}

<br>

https://laravel.com/docs/5.6/pagination#paginator-instance-methods