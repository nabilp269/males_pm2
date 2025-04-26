<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <title>Login Page</title>

</head>
<body>
    <div class="login-container">
        <div class="image-container">
            <div class="blob-shape"></div>
            <img src="https://i.postimg.cc/VvFmSXrH/hot-air-balloon.jpg" alt="Hot Air Balloon" class="balloon-image">
        </div>
        <div class="form-container">
            <h1 class="login-heading">Login</h1>
        <form action="{{ route('login') }}" method="POST">
                @csrf
            <div class="input-group">
                <label class="input-label">Email</label>
                <input type="email" class="input-field" name="email" placeholder="Enter your Full Name here">
            </div>
            <div class="input-group">
                <label class="input-label">Password</label>
                <input type="password" class="input-field" name="password" placeholder="Enter your Password here">
            </div>
            <button class="create-account-btn" type="submit" >Login Account</button>
        </form>
            <p class="already-account">Already have a account? <a href="{{ route('register') }}" class="register-link">Register</a></p>
        </div>
    </div>
</body>
</html>
