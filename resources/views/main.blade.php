<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
  <script src="{{ asset('js/global.js') }}" defer></script>
  <style>
    .app {
      background: #FFF;
    }
  </style>
</head>
<body>
  <div class="app">
    <x-header :pizzas="$pizzas" />
    <x-sort />
    <div class="app__box">
      <x-sidesort />
      <x-pizza :pizzas="$pizzas" />
    </div>
  </div>
</body>
</html>