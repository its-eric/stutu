<h1>Change Password</h1>
<!-- show error message of validation -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- show message -->
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<!-- Change Password form -->
<form method="POST" action="/users/{{ $user->id }}/change-password">
    {{ csrf_field() }}
    <label>Old Password: </label>
    <input type="password" name="oldPassword"><br>
    <label>New Password: </label>
    <input type="password" name="newPassword"><br>
    <label>Confirm New Password: </label>
    <input type="password" name="confirmNewPassword"><br>
    <input type="submit" name="change-password" value="Change Password">
</form>