
<h1>List of Courses</h1>
@foreach ($courses as $course)
    <div>
        {{ $course->id }}
        <a href="{{ url('courses/'.$course->id) }}">{{ $course->name }}</a>
        {{ $course->description }}
        {{ $course->discount }}
    </div>
@endforeach

{{ $courses->links() }}
{{ $courses->total() }}
<br>
<a href="{{ url('home') }}">Dashboard</a>

<!-- Only show 'Create' button for tutor -->
<br>
@if (!empty($yourCourses))
    <a href="{{ url('courses/create') }}">Create course</a>
@endif
