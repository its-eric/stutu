@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Dashboard</h1></div>

                <div class="card-body">
                    Welcome {{ $user->name }} !<br>
                    Role: {{ $user->role }}<br>
                    ID: {{ $user->id }}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <!-- Form filter -->
                <div class="card-body">
                    Filter
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

                <!-- Profile -->
                <div class="card-body">
                    <a href="{{ url('users/'.$user->id) }}">Profile</a>
                    <br>

                    <a href="{{ url('courses') }}" value="all-courses">All Courses</a>
                    <br>

                    @if ($user->role == 'tutor')
                        <a href="{{ url('tutor-courses') }}" value="all-courses">Your Courses</a>
                    @endif
                    <br>

                    @if ($user->role == 'admin')
                        <a href="{{ url('users') }}">All Users</a>
                    @endif
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
