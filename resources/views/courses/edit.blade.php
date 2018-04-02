@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>EDIT "{{ $course->name }}" page</h1>

<div>
    <a href="{{ url('tutor-courses') }}">Back to my list</a>
    <br>
    <a href="{{ url('courses/'.$course->id) }}">Back to my Course</a>
</div>
<br>
<div>
    <form method="POST" action="/courses/{{ $course->id }}">
        {{ method_field('PATCH')}}
        {{ csrf_field() }}
        Name:
        <input type="text" name="name" value="{{ $course->name }}"><br>
        Description:
        <input type="text" name="description" value="{{ $course->description }}"><br>
        Discount:
        <input type="text" name="discount" value="{{ $course->discount }}"><br>
        <input type="submit" value="Submit">
    </form>
</div>


