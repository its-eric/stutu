
<h1>ALL Courses</h1>
@foreach ($courses as $course)
    <div>
        {{ $course->name }}
        {{ $course->description }}
        {{ $course->discount }}
    </div>
@endforeach

{{ $courses->links() }}
{{ $courses->total() }}

<br>
