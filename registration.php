<?php
session_start();
require 'db_connection.php'; // Подключение к базе данных

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Проверка, существует ли пользователь
    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Пользователь с таким именем уже существует!";
    } else {
        // Хеширование пароля
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Вставка нового пользователя
        $stmt = $conn->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
        $stmt->bind_param('ss', $username, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            $success = "Регистрация прошла успешно!";
        } else {
            $error = "Ошибка регистрации, попробуйте позже.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            background: linear-gradient(135deg, #131862 0%, #3a0d5f 100%);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .register-container {
            background: rgba(23, 23, 23, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255, 153, 51, 0.6), 0 0 40px rgba(255, 153, 51, 0.4);
            width: 400px;
            position: relative;
            overflow: hidden;
        }

        .register-container::before {
            content: "";
            position: absolute;
            top: -20px;
            right: -30px;
            width: 200px;
            height: 200px;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.2), rgba(255, 153, 51, 0.7));
            border-radius: 50%;
            z-index: 0;
            filter: blur(30px);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #ff9c00;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 1;
            position: relative;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #ff9c00;
            text-transform: uppercase;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ff9c00;
            border-radius: 8px;
            background-color: #1c1c38;
            color: white;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: #ff6b01;
            background-color: #27285c;
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: #ff9c00;
            border: none;
            color: #1c1c38;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 1;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background-color: #ff6b01;
            box-shadow: 0 0 15px rgba(255, 153, 51, 0.6), 0 0 30px rgba(255, 153, 51, 0.4);
        }

        p {
            text-align: center;
            margin-top: 20px;
            z-index: 1;
            position: relative;
        }

        p a {
            color: #ff9c00;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        p a:hover {
            color: #ff6b01;
        }

        .error, .success {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
            z-index: 1;
            position: relative;
        }

        .error {
            background-color: #f44336;
            color: white;
        }

        .success {
            background-color: #4CAF50;
            color: white;
        }

        /* Футуристическая подсветка и анимация */
        .register-container::after {
            content: "";
            position: absolute;
            top: -50px;
            left: -50px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 153, 51, 0.2), rgba(255, 153, 51, 0.7));
            border-radius: 50%;
            filter: blur(100px);
            z-index: 0;
            opacity: 0.5;
            animation: pulse 5s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
        }

        @media (max-width: 400px) {
            .register-container {
                width: 100%;
                padding: 20px;
            }

            h2 {
                font-size: 22px;
            }

            button {
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <form action="registration.php" method="POST">
            <h2>Регистрация</h2>

            <?php if ($error): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>

            <div class="input-group">
                <label for="username">Имя пользователя:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Зарегистрироваться</button>
        </form>
        <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
    </div>
</body>
</html>
