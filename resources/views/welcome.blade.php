<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      background: #FFBF9B;
      padding: 4vw;
      font-family: "Nunito", sans-serif;
    }
    input[type='checkbox'] {
      accent-color: #FE5F00; 
      transform: scale(1.3);
    }
    input[type='radio'] {
      accent-color: #FE5F00; 
      transform: scale(1.3);
    }

    .app {
      background: #FFFFFF;
      border-radius: 15px;
      margin: auto;
      max-width: 1200px;
    }
    .app__box {
      display: flex;
      margin: 4vw;
      gap: 4vw;
    }
    @media (min-width: 1000px) {
      .app__box {
        margin: 30px;
        gap: 30px;
      }
    }
    @media (max-width: 600px) {
      .app__box {
        flex-flow: column;
      }
    }
  </style>
</head>
<body>
  <div class="app">
    <x-header />
    <x-sort />
    <div class="app__box">
      <x-sidesort />
      <x-pizza />
    </div>
  </div>
</body>
</html>