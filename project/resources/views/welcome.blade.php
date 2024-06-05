<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #ffffff;
            overflow: hidden; /* Prevent scrolling */
        }
        .container {
            position: relative;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: rgba(0, 0, 0, 0.8);
        }
        h1 {
            font-size: 4rem;
            margin: 0;
            padding: 0;
            color: #ffffff;
            animation: fadeIn 2s ease-in-out;
        }
        p {
            font-size: 1.5rem;
            color: #cccccc;
            animation: fadeIn 2s ease-in-out 1s;
        }
        .buttons {
            margin-top: 2rem;
            animation: bounceIn 2s ease-in-out;
        }
        .buttons a {
            text-decoration: none;
            color: #ffffff;
            background-color: #ff6200;
            padding: 1rem 2rem;
            border-radius: 5px;
            margin: 0 1rem;
            transition: transform 0.3s;
        }
        .buttons a:hover {
            transform: scale(1.1);
        }
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('images/background.png') no-repeat center center fixed;
            background-size: cover;
            z-index: -1;
            animation: moveBackground 30s linear infinite;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes bounceIn {
            0% { transform: translateY(-100%); }
            60% { transform: translateY(10%); }
            80% { transform: translateY(-5%); }
            100% { transform: translateY(0); }
        }
        @keyframes moveBackground {
            0% { background-position: 0 0; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="background"></div>
        <h1>Welcome to Danish Shop Trading</h1>
        <p>Your futuristic experience starts here.</p>
        <div class="buttons">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
