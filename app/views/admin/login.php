<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администратор - Вход</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        .login-container h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #2D2D2D;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #D4A574;
        }
        
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #E8D0C0;
            border-radius: 8px;
            font-size: 1rem;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #D4A574;
            box-shadow: 0 0 0 3px rgba(212, 165, 116, 0.1);
        }
        
        .btn-login {
            width: 100%;
            padding: 0.75rem;
            background-color: #D4A574;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        
        .btn-login:hover {
            background-color: #C49464;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>🔐 Администратор</h2>
        <form method="POST" action="/admin/login">
            <div class="form-group">
                <label for="username">Имя пользователя</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-login">Вход</button>
        </form>
    </div>
</body>
</html>
