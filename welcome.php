<?php
session_start();
require 'db_connection.php';

// Проверка, вошел ли пользователь
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Получение данных пользователя
$username = $_SESSION['username'];
$stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
$stmt->bind_param('s', $username);
$stmt->execute();
$userResult = $stmt->get_result();

if ($userResult->num_rows > 0) {
    $user = $userResult->fetch_assoc();
    $role = $user['role'];
} else {
    echo "Ошибка авторизации!";
    exit;
}

// Функция для отображения блюд
function showDishes($role) {
    global $conn;
    echo "<h3>Меню:</h3>";
    if ($role === 'manager') {
        $stmt = $conn->prepare('SELECT * FROM dishes');
    } else {
        $stmt = $conn->prepare('SELECT * FROM dishes WHERE available = 1');
    }
    $stmt->execute();
    $result = $stmt->get_result();
    echo "<div class='menu-grid'>";
    while ($row = $result->fetch_assoc()) {
        $availability = $row['available'] ? 'В наличии' : 'Недоступно';
        echo "<div class='menu-item'>";
        echo "<h4>{$row['name']}</h4>";
        echo "<p>{$row['description']}</p>";
        echo "<p class='price'>{$row['price']} руб.</p>";
        echo "<span class='availability'>{$availability}</span>";
        echo "</div>";
    }
    echo "</div>";
}

// Функция для отображения контента по ролям
function showContentForRole($role) {
    global $conn;
    switch ($role) {
        case 'manager':
            echo "<h2>Панель менеджера</h2>";
            echo "<p>Управление ресторанами, заказами и пользователями.</p>";
            $stmt = $conn->prepare('SELECT * FROM restaurants');
            $stmt->execute();
            $result = $stmt->get_result();
            echo "<h3>Рестораны:</h3>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['name']} - {$row['address']}</li>";
            }
            echo "</ul>";
            showDishes($role);
            break;

        case 'customer':
            echo "<h2>Добро пожаловать, покупатель</h2>";
            echo "<p>Просмотрите доступные блюда и сделайте заказ.</p>";
            showDishes($role);
            break;

        case 'courier':
            echo "<h2>Панель курьера</h2>";
            echo "<p>Ваши текущие заказы на доставку.</p>";
            $stmt = $conn->prepare('SELECT o.* FROM orders o JOIN couriers c ON o.id = c.assigned_order_id WHERE c.user_id = ?');
            $stmt->bind_param('i', $user['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            echo "<h3>Назначенные заказы:</h3>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>Заказ #{$row['id']} на адрес: {$row['delivery_address']} - Статус: {$row['status']}</li>";
            }
            echo "</ul>";
            showDishes($role);
            break;

        case 'kitchen':
            echo "<h2>Панель повара</h2>";
            echo "<p>Заказы, ожидающие приготовления:</p>";
            $stmt = $conn->prepare("SELECT * FROM orders WHERE status = 'на кухне'");
            $stmt->execute();
            $result = $stmt->get_result();
            echo "<h3>Заказы:</h3>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>Заказ #{$row['id']} - Статус: {$row['status']} - Комментарий: {$row['comments']}</li>";
            }
            echo "</ul>";
            showDishes($role);
            break;

        default:
            echo "<p>Неизвестная роль пользователя!</p>";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@400;700&display=swap');
        
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #141E30, #243B55);
            color: #fff;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: rgba(22, 33, 62, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
        }
        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 42px;
            text-align: center;
            color: #FF9800;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        h2 {
            color: #FFC300;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
            font-size: 32px;
            margin-bottom: 15px;
        }
        h3 {
            color: #FF5733;
            font-size: 28px;
            margin-top: 30px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            transition: background 0.3s ease;
        }
        ul li:hover {
            background-color: #FF5733;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .menu-item {
            background-color: #3C4A60;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
        }
        .menu-item:hover {
            transform: translateY(-12px);
            background-color: #5C6F92;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }
        .menu-item h4 {
            color: #FFC300;
            margin-bottom: 12px;
            font-size: 26px;
        }
        .menu-item p {
            font-size: 16px;
            color: #eee;
        }
        .menu-item .price {
            color: #FF9800;
            font-size: 20px;
            font-weight: bold;
        }
        .menu-item .availability {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 14px;
            background-color: #16213E;
            padding: 6px 12px;
            border-radius: 5px;
            color: #fff;
        }
        .container p {
            color: #ddd;
            line-height: 1.8;
        }
        /* Световые эффекты */
        .menu-item::before {
            content: "";
            position: absolute;
            top: -60px;
            left: -60px;
            width: 220px;
            height: 220px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15), transparent);
            border-radius: 50%;
            opacity: 0.6;
            animation: pulse 4s infinite;
        }
        @keyframes pulse {
            0% {
                transform: scale(0.8);
                opacity: 0.6;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
            100% {
                transform: scale(0.8);
                opacity: 0.6;
            }
        }
        /* Кнопки */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FF9800;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn:hover {
            background-color: #FF5733;
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Добро пожаловать на портал доставки еды</h1>
        <?php showContentForRole($role); ?>
    </div>
</body>
</html>
