@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>EDIT PAGE</h1>

<div>
    <a href="{{ url('home') }}">DASHBOARD</a>
    <br>
    <a href="{{ url('users/'.$user->id) }}">Back to Profile</a>
</div>
<div>
    <form method="POST" action="/users/{{ $user->id }}">
        {{ method_field('PATCH')}}
        {{ csrf_field() }}
        <input type="text" name="name" value="{{ $user->name }}"><br>
        <input type="text" name="email" value="{{ $user->email }}"><br>
        <input type="text" name="experience" value="{{ $user->experience }}"><br>
        <input type="submit" value="Submit">
    </form>
</div>


