<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">  
</head>
<body>
    <div class="login-container">
        <div class="image-container">
            <div class="blob-shape"></div>
            <img src="https://i.postimg.cc/VvFmSXrH/hot-air-balloon.jpg" alt="Hot Air Balloon" class="balloon-image">
        </div>
        <div class="form-container">
            <h1 class="login-heading">Register</h1>
            
            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group">
                    <label class="input-label" for="name">Nama</label>
                    <input type="text" class="input-field" name="name" id="name" value="{{ old('name') }}" placeholder="Enter your Full Name here">
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label class="input-label" for="email">Email</label>
                    <input type="email" class="input-field" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your Email here">
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label class="input-label" for="password">Password</label>
                    <input type="password" class="input-field" name="password" id="password" placeholder="Enter your Password here">
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label class="input-label" for="password_confirmation">Confirm Password</label>
                    <input type="password" class="input-field" name="password_confirmation" id="password_confirmation" placeholder="Confirm your Password">
                </div>
                <button type="submit" class="create-account-btn">Create Account</button>
            </form>
            

        </div>
    </div>
</body>
</html>