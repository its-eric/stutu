@extends('layouts.app')

@section('content')
<md-card md-with-hover>
    <md-ripple>
        <md-card-header>
        <div class="md-title">Dashboard</div>
        <div class="md-subhead">It also has a ripple</div>
        </md-card-header>

        <md-card-content>
            Welcome {{ $user->name }} !<br>
            Role: {{ $user->role }}<br>
            ID: {{ $user->id }}
            @if (session('status'))
                <div>
                    {{ session('status') }}
                </div>
            @endif
        </md-card-content>

        <md-card-actions>
            <md-button><a href="{{ url('users/'.$user->id) }}">Go to your profile</a></md-button>
            <md-button><a href="{{ url('courses') }}" value="all-courses">See your courses</a></md-button>
            <md-button><a href="{{ url('tutor-courses') }}" value="all-courses">Browse courses</a></md-button>
        </md-card-actions>
    </md-ripple>
</md-card>

<!-- Form filter -->
<div>
    Filter
    <form method="POST" action="/filter">
        {{ csrf_field() }}
        <div class="form-group">
            <input name="filterStr" required></input>
        </div>

        <div class="form-group">
            <button type="submit">Search</button>
        </div>
    </form>
</div>
@endsection