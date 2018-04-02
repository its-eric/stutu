<h1>Create Course</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/courses">
    {{ csrf_field() }}
    <label>Name: </label>
    <input type="text" name="name" value=""><br>
    <label>description: </label>
    <input type="text" name="description" value=""><br>
    <label>discount: </label>
    <input type="text" name="discount" value=""><br>
    <label>tuition_fee: </label>
    <input type="text" name="tuition_fee" value=""><br>
    <input type="submit" name="submit" value="Submit">
</form>