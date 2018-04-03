
<h1>All Courses</h1>
@foreach ($courses as $course)
    <div>
        {{ $course->id }}
        <a href="{{ url('courses/'.$course->id.'/detail') }}">{{ $course->name }}</a>
        {{ $course->description }}
        {{ $course->discount }}
    </div>
@endforeach

{{ $courses->links() }}
{{ $courses->total() }}
<br>
