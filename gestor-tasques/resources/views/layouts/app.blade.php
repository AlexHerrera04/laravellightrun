<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tasques</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f5f5;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #0d6efd;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 16px;
            background: #0d6efd;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn-warning {
            background: #ffc107;
            color: black;
        }

        .message {
            padding: 10px;
            background: #d1e7dd;
            color: #0f5132;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        .inline-form {
            display: inline;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="{{ route('tasques.index') }}">Tasques</a>
            <a href="{{ route('categories.index') }}">Categories</a>
        </nav>

        <hr>

        @if(session('success'))
            <div class="message">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>