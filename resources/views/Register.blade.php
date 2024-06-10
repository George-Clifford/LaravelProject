<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            display: flex;
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .form-section, .info-section {
            padding: 40px;
            flex: 1;
        }
        .form-section {
            background-color: #fff;
        }
        .info-section {
            background: linear-gradient(to right, #333, black);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        h1 {
            font-size: 24px;
            font-weight: 400;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
            font-size: 12px;
            margin-left: 3px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 12px;
            margin: 5px
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 12px;
        }
        input[type="submit"]:hover {
            background-color: #333;
        }
        .info-section h1 {
            color: #fff;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .info-section p {
            margin: 0;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 8px;
        }
        .info-section a {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            border-radius: 20px;
            text-decoration: none;
            border: 1px solid #ccc;
            transition: background-color 0.3s ease;
            font-size: 12px;
        }
        .info-section a:hover{
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Register</h1>
                <label for="username">USERNAME</label>
                <input type="text" name="username" placeholder="username" id="username" required>

                <label for="email">EMAIL</label>
                <input type="email" name="email" placeholder="Email" id="email" required>

                <label for="password">PASSWORD</label>
                <input type="password" name="password" placeholder="Password" id="password" required>

                <input type="submit" value="Sign Up">
            </form>
        </div>
        <div class="info-section">
            <h1>Welcome to register</h1>
            <p>Already have an account?</p>
            <a href="{{ route('Login.form') }}">Sign In</a>
        </div>
    </div>
</body>
</html>