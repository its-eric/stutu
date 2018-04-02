@if (!empty($course))

    <h1>{{ $course->name }}</h1>
    <a href="{{ url('tutor-courses') }}">Back to my list</a>
    <div>
        Id: {{ $course->id }}
        <br>
        Description: {{ $course->description }}
        <br>
        Discount: {{ $course->discount }}
    </div>

    <div>
        <a href="{{ url('courses/'.$course->id.'/edit') }}">Edit course</a>
    </div>
    <div>
        <form method="POST" action="/courses/{{ $course->id }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>
    </div>
@else
    Course is not exist!
@endif