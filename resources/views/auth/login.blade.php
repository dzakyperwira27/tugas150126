<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

{{-- PESAN ERROR LOGIN --}}
@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

{{-- VALIDASI FORM --}}
@if($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('login') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <br><br>
    <input type="password" name="password" placeholder="Password">
    <br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
