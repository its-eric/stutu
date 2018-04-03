@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Result of filter</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>

                <!-- Form filter -->
                <div class="card-body">
                    <form method="POST" action="/filter">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input name="filterStr" class="form-control" required></input>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>

                <!-- Result of filter -->
                <div class="card-body">
                    @if (empty($data))

                    @else
                        <h1>Users</h1>
                        @if ($data['users']->isEmpty())
                            No users
                        @else
                            @foreach ($data['users'] as $user)
                                <div>
                                    <a href="{{ url('tutors/'.$user->id.'/detail') }}">{{ $user->name }}</a>

                                    {{ $user->email }}
                                </div>
                            @endforeach
                        @endif

                        <h1>Courses</h1>
                        @if ($data['courses']->isEmpty())
                            No courses
                        @else
                            @foreach ($data['courses'] as $course)
                                <div>
                                    <a href="{{ url('courses/'.$course->id.'/detail') }}">{{ $course->name }}</a>
                                    {{ $course->description }}
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>
                <div class="card-body">
                    <a href="{{ url('home') }}">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
