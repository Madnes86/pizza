<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Заказ</title>
  @vite('resources/css/global.css')
</head>
<body>
  <div class="app">
    <x-header :pizzas="$pizzas" />
    <x-input :pizzas="$pizzas" />
</body>
</html>