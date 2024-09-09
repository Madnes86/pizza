<?php
$searchInput = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear_search'])) {
    $searchInput = '';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchInput = $_POST['search_input'];
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UGU PIZZA</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* CSS для шапки */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .header__logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header__logo__img {
            width: 40px;
        }

        .header__title {
            font-size: 24px;
            margin: 0;
        }

        .header__subtitle {
            font-size: 12px;
            margin: 0;
        }

        .search {
            display: flex;
            align-items: center;
            background-color: #f0f0f0;
            padding: 5px 10px;
            border-radius: 5px;
            width: 100%;
            max-width: 400px;
        }

        .search__input {
            border: none;
            background: none;
            outline: none;
            font-size: 16px;
            width: 100%;
        }

        .search__cross {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
        }

        .search__cross__line {
            position: relative;
            display: block;
            width: 16px;
            height: 2px;
            background-color: #adadad;
        }

        .search__cross__line:first-child {
            transform: rotate(-45deg);
        }

        .search__cross__line:last-child {
            transform: rotate(45deg);
        }

        .header__button {
            background-color: #fff;
            border: 1px solid #ff6600;
            border-radius: 5px;
            color: #ff6600;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .header__button:hover {
            background-color: #ff6600;
            color: #fff;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="header__logo">
        <img src="src/assets/logo.png" alt="UGU PIZZA Logo" class="header__logo__img">
        <div>
            <strong class="header__title">UGU PIZZA</strong>
            <p class="header__subtitle">вкусней уже некуда</p>
        </div>
    </div>
    
    <div class="search">
        <form method="POST" action="">
            <svg class="search__img" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- SVG code for the search icon -->
            </svg>
            <input type="text" class="search__input" name="search_input" placeholder="Поиск пиццы" value="<?= htmlspecialchars($searchInput); ?>">
            
            <?php if ($searchInput): ?>
            <button type="submit" name="clear_search" class="search__cross">
                <span class="search__cross__line"></span>
                <span class="search__cross__line"></span>
            </button>
            <?php endif; ?>
        </form>
    </div>
    
    <div style="display: flex; gap: 10px;">
        <button class="header__button">
            <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- SVG code for login icon -->
            </svg>
            Войти
        </button>
        <button class="header__button">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- SVG code for cart icon -->
            </svg>
        </button>
    </div>
</header>
</body>
</html>
