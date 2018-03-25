@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/users/{{ $user->id }}">
    {{ method_field('PATCH')}}
    {{ csrf_field() }}
    <input type="text" name="name" value="{{ $user->name }}"><br>
    <input type="text" name="email" value="{{ $user->email }}"><br>
    <input type="text" name="experience" value="{{ $user->experience }}"><br>
    <input type="submit" value="Submit">
</form>

