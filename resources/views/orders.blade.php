<!DOCTYPE html>
<html lang="ru">
<head>
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Заказы</title>
  <script src="{{ asset('js/global.js') }}" defer></script>
</head>
<body>
  <div class="app">
    <header class="header">
      <div class="header__logo" onclick="window.location.href='/'">
        <img src="/assets/logo.png" alt="logo" class="header__logo__img">
        <div>
          <strong class="header__title">YUGU PIZZA</strong>
          <p class="header__subtitle">вкусней уже некуда</p>
        </div>
      </div>
      <div style="display: flex; gap: 10px; position: relative;">
        <button class="header__button" id="menu" onclick="window.location.href='{{ route('cuper') }}'">
          <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11.5706 14.2087V12.8198C11.5706 12.0831 11.2921 11.3765 10.7966 10.8556C10.301 10.3347 9.6288 10.042 8.92793 10.042H3.64264C2.94177 10.042 2.2696 10.3347 1.77401 10.8556C1.27842 11.3765 1 12.0831 1 12.8198V14.2087" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M6.28522 7.26405C7.74471 7.26405 8.92787 6.0204 8.92787 4.48627C8.92787 2.95215 7.74471 1.7085 6.28522 1.7085C4.82573 1.7085 3.64258 2.95215 3.64258 4.48627C3.64258 6.0204 4.82573 7.26405 6.28522 7.26405Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Войти
        </button>
        <ul class="header__options">
          <a href="/order">Заказы</a>
          <a href="/cuper">Курьер</a>
          <a href="/kitchen">Кухня</a>
          <a href="">Менеджер</a>
        </ul>
      </div>
    </header>
    <div class="inputs">
      <h1>Мои заказы</h1>
      <div class="input">
        <div class="input__header">
          <h2>Заказ { номер }</h2>
          <p>{ дата }</p>
          <p>{ статус }</p>
          <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10" fill="none">
          <path d="M0.500079 8.45122C0.499498 8.25199 0.537177 8.05514 0.610346 7.87514C0.683514 7.69513 0.790314 7.53655 0.922897 7.41103L7.77939 0.969876C7.98387 0.773731 8.24035 0.666504 8.50504 0.666504C8.76973 0.666504 9.02621 0.773731 9.23068 0.969876L16.0872 7.63774C16.3205 7.8641 16.4673 8.18937 16.4952 8.54201C16.523 8.89464 16.4297 9.24574 16.2357 9.51808C16.0418 9.79042 15.763 9.96168 15.4609 9.99419C15.1587 10.0267 14.8578 9.9178 14.6245 9.69145L8.49932 3.73037L2.37419 9.49141C2.20645 9.65448 2.00219 9.75807 1.78559 9.78991C1.56898 9.82176 1.34909 9.78053 1.15193 9.6711C0.954775 9.56168 0.788606 9.38863 0.673086 9.17244C0.557565 8.95626 0.497528 8.70598 0.500079 8.45122Z" fill="#AEAEAE"/>
          </svg>
        </div>
        <div class="input__body">
          <div class="input__box-1">
            @foreach($pizzas as $pizza)
              <div class="pizza medium">
                <img src="{{ $pizza['image'] }}" alt="pizza" class="pizza__img">
                <div class="pizza__middle">
                  <h2 class="pizza__title">{{ $pizza['title'] }}</h2>
                  <p class="pizza__components">{{ $pizza['components'] }}</p>
                </div>
                <div class="pizza__bottom">
                  <p>от <strong>{{ $pizza['price'] }} ₽</strong></p>
                  <button class="pizza__button">Собрать</button>
                  <div class="pizza__counter">
                    <button class="nav__button decrement">-</button>
                    <strong class="counter">1</strong>
                    <button class="nav__button increment">+</button>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
