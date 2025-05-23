<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .login-container {
            display: flex;
            width: 100%;
            max-width: 900px;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .image-container {
            position: relative;
            flex: 1;
            background-color: #FFD700;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .blob-shape {
            position: absolute;
            width: 120%;
            height: 120%;
            background-color: #FFD700;
            border-radius: 60% 40% 70% 30% / 60% 30% 70% 40%;
            animation: blob-animation 8s linear infinite;
        }

        @keyframes blob-animation {
            0%, 100% {
                border-radius: 60% 40% 70% 30% / 60% 30% 70% 40%;
            }
            50% {
                border-radius: 30% 60% 40% 70% / 50% 60% 30% 40%;
            }
        }

        .balloon-image {
            position: relative;
            width: 200px;
            height: 200px;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            z-index: 1;
            border-radius: 50%;
        }

        .form-container {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-heading {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-label {
            display: block;
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }

        .input-field {
            width: 100%;
            padding: 12px 15px;
            border: none;
            background-color: #f0f0f0;
            border-radius: 10px;
            font-size: 14px;
            color: #333;
            outline: none;
        }

        .input-field::placeholder {
            color: #aaa;
        }

        .create-account-btn {
            background-color: #FFD700;
            color: #333;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .create-account-btn:hover {
            background-color: #F0C800;
        }

        .already-account {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .register-link {
            color: #FFD700;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 400px;
            }

            .image-container {
                height: 200px;
            }

            .balloon-image {
                width: 150px;
                height: 150px;
            }

            .form-container {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="image-container">
            <div class="blob-shape"></div>
            <img src="https://img.freepik.com/premium-vector/vector-logo-cookies-crunchy-desserts_1121638-47.jpg?semt=ais_hybrid&w=740" 
                 alt="Cookieskis" class="balloon-image">
        </div>
        <div class="form-container">
            <h1 class="login-heading">Login</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label class="input-label">Email</label>
                    <input type="email" class="input-field" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-group">
                    <label class="input-label">Password</label>
                    <input type="password" class="input-field" name="password" placeholder="Enter your password" required>
                </div>
                <button class="create-account-btn" type="submit">Login Account</button>
            </form>
            <p class="already-account">Don’t have an account? <a href="{{ route('register') }}" class="register-link">Register</a></p>
        </div>
    </div>
</body>
</html>
