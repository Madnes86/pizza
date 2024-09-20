<<<<<<<< HEAD:resources/views/main.blade.php
<!DOCTYPE html>
<html lang="ru">
<head>
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная</title>
  <script src="{{ asset('js/global.js') }}" defer></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    /* Потом добавить проверку корзины на наличии пиццы */
    .app {
      background: #FFF;
    }

    /* HEADER */
    .search {
      align-items: center;
      background: #f0efef;
      border-radius: 15px;
      display: flex;
      padding: 12px;
      width: 100%;
      gap: 12px;
    }
    .search__input {
      background: none;
      border: none;
      outline: none;
      font-size: 16px;
      width: 100%;
    }
    /* Здесь должна быть анимация появления и не появления крестика, потом доделать ... */
    .search__cross {
      align-items: center;
      cursor: pointer;
      display: none;
      position: relative;
      justify-content: center;
      width: 20px;
    }
    .search__cross__line {
      background: #bcbcbc;
      border-radius: 2px;
      position: absolute;
      height: 2px;
      width: 16px;
    }
    .search__cross__line:first-child {
      transform: rotate(-45deg);
    }
    .search__cross__line:last-child {
      transform: rotate(45deg);
    }

    .basket {
      background: #00000047;
      box-shadow: -20px 0px 5px 5px #00000047;
      display: none;
      top: 0;
      right: 0;
      position: fixed;
      flex-flow: column;
      height: 100vh;
      width: 400px;
      z-index: 2;
    }
    .basket__cross {
      cursor: pointer;
    }
    .basket__cross:hover {
      stroke: #000;
    }
    .basket__top {
      align-items: center;
      background: #f0efef;
      display: flex;
      padding: 2vw;
      justify-content: space-between;
      font-size: 20px;
    }
    .basket__middle {
      display: flex;
      flex-flow: column;
      height: 100%;
      overflow-x: scroll;
      gap: 10px;
    }
    .basket__bottom {
      background: #FFFFFF;
      display: flex;
      padding: 2vw;
      flex-flow: column;
      gap: 15px;
    }
    .sort {
      margin: 4vw;
    }
    .sort__title {
      font-size: 36px;
      line-height: 1;
      margin-bottom: 1.5vw;
    }
    .sort__row {
      display: flex;
      justify-content: space-between;
    }
    .sort__options {
      background: #f0efef;
      border-radius: 15px;
      display: flex;
    }
    .sort__option {
      border-radius: 15px;
      cursor: pointer;
      padding: 5px 10px;
      margin: 5px 5px;
    }
    .sort__option:hover {
      background: #FFFFFF;
      color: #FE5F00;
    }
    .sort__button {
      align-items: center;
      background: #f0efef;
      border: none;
      border-radius: 15px;
      cursor: pointer;
      display: flex;
      padding: 10px;
      font-size: 16px;
      gap: 10px;
    }
    .button__subtitle {
      color: #FE5F00;
    }
    .sort__button:hover {
      background: #FE5F00;
      color: #FFFFFF;
    }
    .sort__button:hover .button__subtitle {
      color: #FFFFFF;
    }
    @media (min-width: 1000px) {
      .sort {
        margin: 30px;
      }
      .sort__title {
        margin-bottom: 15px
      }
    }
    @media (max-width: 600px) {
      .button__title {
        display: none;
      }
      .sort__button {
        color: #FE5F00;
      }
    }
    /* Radio кнопки не отменяются */
    .side {
      display: flex;
      flex-flow: column;
      gap: 10px;
    }
    .side__checkbox {
      align-items: center;
      display: flex;
      padding: 0 4px;
      gap: 10px;
    }
    .side__checkbox > label, .side__checkbox > input {
      cursor: pointer;
    }

    /* МОДАЛЬНОЕ ОКНО */
    .modal {
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal__content {
      display: flex;
      background-color: #fff;
      padding: 20px;
      border-radius: 15px;
    }
    .modal__close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      background: none;
      border: none;
      font-size: 40px;
      cursor: pointer;
      color: #FFF
    }
    .modal__image {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .modal__image > img {
      border: 1px dashed #0000003f;
      border-radius: 50%;
      max-width: 300px;
      width: 100%;
    }
    .modal__info {
      flex: 1;
      padding: 0 20px;
    }
    .modal__info > h2 {
      font-size: 24px;
      font-weight: bold;
    }
    .modal__info > p {
      font-size: 16px;
      margin-bottom: 20px;
    }
    .pizza-options {
      margin-bottom: 20px;
    }
    .pizza-options__size, .pizza-options__dough {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .pizza-options__size-btn, .pizza-options__dough-btn {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 15px;
      background-color: #f9f9f9;
      cursor: pointer;
      font-size: 15px;
    }

    .pizza-options__size-btn--active {
      background-color: #f0c040;
      color: #FFF;
    }

    .extras {
      display: flex;
      flex-direction: column;
      gap: 10px; /* Отступы между пунктами */
    }

    .extras__item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
    }

    .extras__name {
      font-size: 16px;
      color: #333;
    }

    .extras__price {
      font-size: 14px;
      color: #FF6A00; /* Оранжевый цвет цены */
      margin-right: 10px;
    }

    .extras__counter {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .extras__button {
      background-color: #f5f5f5;
      border: none;
      width: 30px;
      height: 30px;
      font-size: 18px;
      color: #333;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 5px;
    }

    .extras__button--minus {
      background-color: #f5f5f5;
    }

    .extras__button--plus {
      background-color: #f5f5f5;
    }

    .extras__value {
      font-size: 16px;
      min-width: 20px;
      text-align: center;
    }

    .modal__add-button {
      display: block;
      width: 100%;
      padding: 15px;
      background-color: #ff6600;
      color: #fff;
      border: none;
      border-radius: 15px;
      cursor: pointer;
      font-size: 18px;
    }
  </style>
</head>
<body>
  <div class="app">
    <div>
      <header class="header">
        <div class="header__logo" onclick="window.location.href='/'">
          <img src="/assets/logo.png" alt="logo" class="header__logo__img">
          <div>
            <strong class="header__title">YUGU PIZZA</strong>
            <p class="header__subtitle">вкусней уже некуда</p>
          </div>
        </div>
        <div class="search">
          <svg class="search__img" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6.48674 5.25469e-09C7.69591 -4.8654e-05 8.88103 0.337848 9.90836 0.975558C10.9357 1.61327 11.7643 2.52541 12.3008 3.60904C12.8372 4.69267 13.0601 5.90466 12.9443 7.10823C12.8284 8.31181 12.3785 9.45905 11.6453 10.4205L15.7477 14.5245C15.9028 14.6802 15.9929 14.889 15.9996 15.1087C16.0063 15.3283 15.9292 15.5423 15.7838 15.7071C15.6385 15.8719 15.4358 15.9753 15.2171 15.9961C14.9983 16.0169 14.7798 15.9537 14.606 15.8193L14.5247 15.7475L10.4205 11.6452C9.60141 12.2698 8.64535 12.6903 7.63144 12.872C6.61754 13.0537 5.57494 12.9914 4.58992 12.6901C3.60489 12.3889 2.70577 11.8574 1.96693 11.1397C1.2281 10.422 0.670807 9.53868 0.341162 8.56283C0.0115182 7.58698 -0.0809972 6.54665 0.0712713 5.52795C0.22354 4.50924 0.616214 3.54143 1.2168 2.70462C1.81739 1.8678 2.60863 1.18602 3.52504 0.715706C4.44145 0.24539 5.45668 5.43643e-05 6.48674 5.25469e-09ZM6.48674 1.72983C5.22505 1.72983 4.01504 2.23102 3.1229 3.12314C2.23075 4.01525 1.72955 5.22522 1.72955 6.48687C1.72955 7.74851 2.23075 8.95849 3.1229 9.8506C4.01504 10.7427 5.22505 11.2439 6.48674 11.2439C7.74843 11.2439 8.95844 10.7427 9.85058 9.8506C10.7427 8.95849 11.2439 7.74851 11.2439 6.48687C11.2439 5.22522 10.7427 4.01525 9.85058 3.12314C8.95844 2.23102 7.74843 1.72983 6.48674 1.72983Z" fill="#ADADAD"/>
          </svg>
          <input type="text" class="search__input" placeholder="Поиск пиццы">
          <div class="search__cross">
            <span class="search__cross__line"></span>
            <span class="search__cross__line"></span>
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
            <a href="/orders">Заказы</a>
            <a href="/cuper">Курьер</a>
            <a href="/kitchen">Кухня</a>
            <a href="/manager">Менеджер</a>
          </ul>
          <button class="header__button" onclick="switchBasket()">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.33333 16.3332C7.06971 16.3332 7.66667 15.7362 7.66667 14.9998C7.66667 14.2635 7.06971 13.6665 6.33333 13.6665C5.59695 13.6665 5 14.2635 5 14.9998C5 15.7362 5.59695 16.3332 6.33333 16.3332Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14.3333 16.3332C15.0697 16.3332 15.6667 15.7362 15.6667 14.9998C15.6667 14.2635 15.0697 13.6665 14.3333 13.6665C13.597 13.6665 13 14.2635 13 14.9998C13 15.7362 13.597 16.3332 14.3333 16.3332Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4.77984 4.99984H16.3332L15.2132 10.5932C15.1522 10.9001 14.9852 11.1758 14.7415 11.372C14.4977 11.5683 14.1927 11.6725 13.8798 11.6665H6.83317C6.50763 11.6693 6.19232 11.5528 5.94671 11.3391C5.70109 11.1255 5.54215 10.8293 5.49984 10.5065L4.4865 2.8265C4.44448 2.50599 4.28745 2.21167 4.04464 1.99828C3.80182 1.7849 3.48976 1.66699 3.1665 1.6665H1.6665" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </div>
      </header>
      <div class="basket">
        <div class="basket__top">
          <p>В корзине <strong>{{sizeof($basket_Ing)}} товара</strong></p>
          <svg class="basket__cross" onclick="switchBasket()" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path opacity="0.2" d="M11.6328 9.94495L19.7328 1.84495C19.9149 1.63239 20.01 1.35898 19.9992 1.07934C19.9884 0.799697 19.8724 0.534431 19.6746 0.336549C19.4767 0.138666 19.2114 0.0227402 18.9318 0.011939C18.6521 0.00113767 18.3787 0.096256 18.1662 0.278285L10.0662 8.37829L1.96616 0.267174C1.7536 0.0851447 1.48019 -0.00997263 1.20055 0.00082865C0.920905 0.0116299 0.65564 0.127554 0.457757 0.325437C0.259874 0.52332 0.143948 0.788585 0.133147 1.06823C0.122346 1.34787 0.217464 1.62128 0.399494 1.83384L8.49949 9.94495L0.388382 18.045C0.272069 18.1446 0.177602 18.2671 0.11091 18.405C0.044217 18.5428 0.00673853 18.693 0.000827977 18.846C-0.00508257 18.999 0.0207018 19.1516 0.0765624 19.2942C0.132423 19.4368 0.217154 19.5663 0.325438 19.6746C0.433721 19.7828 0.563218 19.8676 0.705801 19.9234C0.848384 19.9793 1.00098 20.0051 1.154 19.9992C1.30702 19.9933 1.45717 19.9558 1.59502 19.8891C1.73287 19.8224 1.85544 19.7279 1.95505 19.6116L10.0662 11.5116L18.1662 19.6116C18.3787 19.7936 18.6521 19.8888 18.9318 19.878C19.2114 19.8672 19.4767 19.7512 19.6746 19.5534C19.8724 19.3555 19.9884 19.0902 19.9992 18.8106C20.01 18.5309 19.9149 18.2575 19.7328 18.045L11.6328 9.94495Z" fill="black"/>
          </svg>
        </div>
        <div class="basket__middle">
          @foreach($basket_Ing as $basket)
            <div class="pizza small" style="background-color: #FFF; padding: 5px;">
              <img src="{{ $basket['image_path'] }}" alt="pizza" class="pizza__img">
              <div class="pizza__middle">
                <h2>{{ $basket['discription'] }}</h2>
                <p class="pizza__components">{{ $basket['ingredients'] }}</p>
              </div>
              <div class="pizza__bottom" x-data="pizza()">
                <p> <strong>{{$basket['price']}}</strong></p>
                <button class="pizza__button" > Собрать</button>
                <div class="pizza__counter">
                  <button class="nav__button decrement">-</button>
                  <strong class="counter">1</strong>
                  <button class="nav__button increment">+</button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="basket__bottom">
          <p class="basket__price">
            <span>Цена</span>
            <span class="basket__line"></span>
            <strong>{{$summ}}</strong>
          </p>
        <a href="/order">  <button class="button__accent" href="/order.blade.php" onclick="window.location.href='{{ route('order') }}'">Заказать</button></a>
        </div>
      </div>
          </div>
    <div class="sort">
      <h3 class="sort__title">Все пиццы</h3>
      <div class="sort__row">
        <nav class="sort__options">
          <p class="sort__option">Все</p>
          <p class="sort__option">Пиццы</p>
          <p class="sort__option">Суши</p>
        </nav>
        <button class="sort__button" onclick="switchSort()" id="sortPrice">
          <svg class="button__svg" width="14" height="14" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M13.7333 13.073C13.8167 12.991 13.8833 12.8929 13.9291 12.7845C13.9749 12.676 13.999 12.5594 14 12.4414C14.001 12.3233 13.9789 12.2063 13.9349 12.097C13.891 11.9878 13.8261 11.8885 13.7441 11.8051C13.6621 11.7216 13.5645 11.6556 13.4572 11.6109C13.3498 11.5662 13.2348 11.5437 13.1187 11.5448C13.0027 11.5458 12.8881 11.5703 12.7815 11.6169C12.6749 11.6635 12.5785 11.7312 12.4979 11.8161L11.3683 12.9655L11.3683 6.22218C11.3683 5.98643 11.2762 5.76033 11.1124 5.59363C10.9486 5.42692 10.7263 5.33327 10.4946 5.33327C10.2629 5.33327 10.0407 5.42692 9.87686 5.59363C9.71302 5.76033 9.62097 5.98643 9.62097 6.22218L9.62097 12.9655L8.49133 11.8161C8.32656 11.6542 8.10587 11.5646 7.8768 11.5666C7.64773 11.5686 7.42861 11.6621 7.26662 11.8269C7.10464 11.9917 7.01276 12.2147 7.01077 12.4477C7.00878 12.6808 7.09684 12.9054 7.25598 13.073L9.87696 15.7397C10.0408 15.9064 10.263 16 10.4946 16C10.7263 16 10.9485 15.9064 11.1123 15.7397L13.7333 13.073ZM6.74402 2.92699C6.90316 3.09464 6.99122 3.31918 6.98923 3.55225C6.98724 3.78532 6.89536 4.00827 6.73338 4.17308C6.57139 4.33789 6.35227 4.43138 6.1232 4.4334C5.89413 4.43543 5.67344 4.34583 5.50867 4.18391L4.37903 3.03455L4.37903 9.77782C4.37903 10.0136 4.28698 10.2397 4.12314 10.4064C3.95929 10.5731 3.73708 10.6667 3.50537 10.6667C3.27366 10.6667 3.05144 10.5731 2.8876 10.4064C2.72376 10.2397 2.63171 10.0136 2.63171 9.77782L2.63171 3.03455L1.50207 4.18391C1.42148 4.26881 1.32507 4.33653 1.21848 4.38311C1.1119 4.4297 0.997254 4.45422 0.88125 4.45525C0.765246 4.45628 0.650204 4.43378 0.542835 4.38909C0.435466 4.34439 0.33792 4.27839 0.25589 4.19493C0.173859 4.11146 0.108987 4.01222 0.0650585 3.90297C0.0211304 3.79373 -0.00097577 3.67668 3.22694e-05 3.55865C0.00104031 3.44062 0.0251425 3.32398 0.0709303 3.21553C0.116718 3.10708 0.183274 3.00899 0.266718 2.92699L2.88769 0.26026C3.05153 0.0936154 3.27371 -4.68861e-07 3.50537 -4.58735e-07C3.73703 -4.48609e-07 3.95921 0.0936154 4.12304 0.26026L6.74402 2.92699Z" fill="currentColor"/>
          </svg>
          <p class="button__title">Сортировка по:</p>
          <p class="button__subtitle">цена</p>
        </button>
      </div>
    </div>
    <div class="app__box">
      <div class="side">
        <h3 class="side__title">Фильтрация</h3>
        <div class="side__checkbox">
          <input type="checkbox" id="input-1">
          <label for="input-1">Можно собрать</label>
        </div>
        <div class="side__checkbox">
          <input type="checkbox" id="input-2">
          <label for="input-2">Новинки</label>
        </div>
        <h3 class="side__title">Ингредиенты</h3>
        <div class="side__checkbox">
          <input type="checkbox" id="input-3">
          <label for="input-3">Сырный соус</label>
        </div>
        <div class="side__checkbox">
          <input type="checkbox" id="input-4">
          <label for="input-4">Моцарелла</label>
        </div>
        <div class="side__checkbox">
          <input type="checkbox" id="input-5">
          <label for="input-5">Чеснок</label>
        </div>
        <div class="side__checkbox">
          <input type="checkbox" id="input-6">
          <label for="input-6">Красный лук</label>
        </div>
        <div class="side__checkbox">
          <input type="checkbox" id="input-7">
          <label for="input-7">Томаты</label>
        </div>
        <div class="side__checkbox">
          <input type="checkbox" id="input-8">
          <label for="input-8">Соленные огурчики</label>
        </div>
        <h3 class="side__title">Тип теста</h3>
        <div class="side__checkbox">
          <input type="radio" id="input-9">
          <label for="input-9">Традиционное</label>
        </div>
        <div class="side__checkbox">
          <input type="radio" id="input-10">
          <label for="input-10">Тонкое</label>
        </div>
        <button class="button__accent">Применить</button>
      </div>
      <div>
        <div class="pizzas pizza-container">
          @foreach($pizzas as $pizza)
            <div class="pizza large">
              <img src="{{ $pizza['image_path'] }}" alt="pizza">
              <div class="pizza__middle">
                <h2 class="pizza__title">{{ $pizza['description'] }}</h2>
                <p>{{ $pizza['ingredients'] }}</p>
              </div>
              <div class="pizza__bottom">
                <p>от <strong>{{ $pizza['price'] }} ₽</strong></p>
                <a href="/add/basket/{{$pizza['id']}}"><button class="pizza__button">Собрать</button></a>
                <div class="pizza__counter">
                  <button class="nav__button decrement">-</button>
                  <strong class="counter">1</strong>
                  <button class="nav__button increment">+</button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="nav">
          <button class="nav__button">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
            <path d="M5.83854 11.9999C5.68912 12.0004 5.54148 11.9721 5.40648 11.9172C5.27147 11.8624 5.15253 11.7823 5.0584 11.6828L0.227529 6.54046C0.0804207 6.3871 0 6.19474 0 5.99622C0 5.7977 0.0804207 5.60534 0.227529 5.45199L5.22843 0.309616C5.3982 0.134589 5.64215 0.0245216 5.90663 0.00362666C6.1711 -0.0172683 6.43443 0.052721 6.63868 0.198197C6.84294 0.343674 6.97138 0.552721 6.99577 0.779351C7.02015 1.00598 6.93848 1.23163 6.76871 1.40665L2.2979 6.00051L6.61868 10.5944C6.74098 10.7202 6.81868 10.8734 6.84256 11.0358C6.86644 11.1983 6.83552 11.3632 6.75345 11.5111C6.67138 11.6589 6.5416 11.7835 6.37946 11.8702C6.21732 11.9568 6.02961 12.0019 5.83854 11.9999Z" fill="#EDEDED"/>
            </svg>
          </button>
          <button class="nav__button">1</button>
          <button class="nav__button">2</button>
          <button class="nav__button">3</button>
          <button class="nav__button">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none">
            <path d="M1.16146 5.86174e-05C1.31088 -0.000377199 1.45852 0.0278821 1.59352 0.0827584C1.72853 0.137636 1.84747 0.217736 1.9416 0.317173L6.77247 5.45954C6.91958 5.6129 7 5.80526 7 6.00378C7 6.2023 6.91958 6.39466 6.77247 6.54801L1.77157 11.6904C1.6018 11.8654 1.35785 11.9755 1.09337 11.9964C0.828898 12.0173 0.56557 11.9473 0.361317 11.8018C0.157063 11.6563 0.028616 11.4473 0.004232 11.2206C-0.020152 10.994 0.061524 10.7684 0.231293 10.5933L4.7021 5.99949L0.381321 1.40564C0.259016 1.27984 0.181325 1.12664 0.157442 0.96419C0.133558 0.801734 0.16448 0.636815 0.246551 0.488948C0.328621 0.341081 0.458405 0.216455 0.620545 0.129815C0.782684 0.0431732 0.970393 -0.00185447 1.16146 5.86174e-05Z" fill="#FE5F00"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
    <!-- <div class="modal" id="modal"> -->
      <div class="modal__content">
        <button class="modal__close-btn" id="closeBtn">×</button>
        <div class="modal__image">
          <div class="modal__image">
            <img class="modal__image-pizza" src="/assets/collect.png" alt="Пицца">
          </div>
        </div>
        <div class="modal__info">
          <h2>Пепперони фреш</h2>
          <p>Вкуснейшая пицца от студентов ЮГУ!</p>
          
          <div class="pizza-options__size">
            <button class="pizza-options__size-btn pizza-options__size-btn--active">Маленькая</button>
            <button class="pizza-options__size-btn">Средняя</button>
            <button class="pizza-options__size-btn">Большая</button>
          </div>
          
          <div class="modal__extras extras">
            <h3 class="extras__title">Добавить по вкусу</h3>
            <div class="extras__item">
              <span class="extras__name">Гавайский соус</span>
              <span class="extras__price">+ 40 ₽</span>
              <div class="extras__counter">
                <button class="extras__button extras__button--minus">-</button>
                <span class="extras__value">0</span>
                <button class="extras__button extras__button--plus">+</button>
              </div>
            </div>
            
            <div class="extras__item">
              <span class="extras__name">Чесночный соус</span>
              <span class="extras__price">+ 30 ₽</span>
              <div class="extras__counter">
                <button class="extras__button extras__button--minus">-</button>
                <span class="extras__value">0</span>
                <button class="extras__button extras__button--plus">+</button>
              </div>
            </div>
    
          <button class="modal__add-button">Добавить в корзину за 799 ₽</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<script>

  // ПОИСК
  const search = document.querySelector('.search__input');
  const pizzas = document.querySelectorAll('.pizza');

  search.oninput = function () {
    const searchValue = search.value.toLowerCase();
    const pizzaTitles = document.querySelectorAll('.pizza__title');

    if (search.value == '') {
      cross.style.display = 'none';
    } else {
      cross.style.display = 'flex';
    }
    
    pizzaTitles.forEach(element => {
      if (element.innerHTML.toLowerCase().startsWith(searchValue)) {
        element.parentElement.parentElement.style.display = 'grid';
      } else {
        element.parentElement.parentElement.style.display = 'none';
      }
    });
  };

  //КРЕСТИК
  const cross = document.querySelector('.search__cross');
  cross.addEventListener('click', function() {
    search.value = '';
  });

  // КНОПКИ
  const basket = document.querySelector('.basket');
  let isBasket = false;
  let isOpening = false; 

  document.addEventListener('click', function(event) {
    const isClick = basket.contains(event.target);

    if (isOpening) {
      isOpening = false; // Сбрасываем флаг после первого клика
      return;
    }

    if (!isClick && isBasket) {
      isBasket = false;
      basket.style.display = isBasket ? 'flex' : 'none';
    }
  });
  
  function switchBasket () {
    isBasket = !isBasket;

    if (isBasket) {
      basket.style.display = 'flex'; // Открываем корзину
      isOpening = true; // Активируем флаг открытия
    } else {
      basket.style.display = 'none'; // Закрываем корзину
    }
  }
  
  // СОРТИРОВКА
  const sortText = document.querySelector('.button__subtitle')
  function switchSort() {
    if (sortText.innerHTML == 'цена низкая') {
      sortText.innerHTML = 'цена высокая';
    } else {
      sortText.innerHTML = 'цена низкая';
    }
  }

  let isAscending = true; // Переменная для отслеживания направления сортировки

  document.getElementById('sortPrice').addEventListener('click', () => {
      const pizzaContainer = document.querySelector('.pizza-container');
      const pizzas = Array.from(pizzaContainer.querySelectorAll('.pizza'));

      pizzas.sort((a, b) => {
          const priceA = parseInt(a.querySelector('p strong').textContent.replace(/\D/g, ''));
          const priceB = parseInt(b.querySelector('p strong').textContent.replace(/\D/g, ''));
          
          // Если сортировка по возрастанию
          if (isAscending) {
              return priceA - priceB;
          } else {
              return priceB - priceA;
          }
      });

      // Перестановка пицц в DOM
      pizzas.forEach(pizza => pizzaContainer.appendChild(pizza));

      // Переключение направления сортировки
      isAscending = !isAscending;
  });

  // МОДАЛКА
  document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById('modal');
    const closeBtn = document.getElementById('closeBtn');

    // Закрытие модалки при нажатии на кнопку закрытия
    closeBtn.addEventListener('click', function() {
      modal.style.display = 'none';
    });

    // Закрытие модалки при нажатии вне модального контента
    modal.addEventListener('click', function(event) {
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    });
  });

  // ДОБАВКИ
  document.querySelectorAll('.extras__item').forEach(item => {
  const minusBtn = item.querySelector('.extras__button--minus');
  const plusBtn = item.querySelector('.extras__button--plus');
  const valueDisplay = item.querySelector('.extras__value');
  
  let value = 0;

  minusBtn.addEventListener('click', () => {
    if (value > 0) {
      value--;
      valueDisplay.textContent = value;
    }
  });

  plusBtn.addEventListener('click', () => {
    value++;
    valueDisplay.textContent = value;
  });
});

</script>
========
>>>>>>>> origin/misfit:resources/views/welcome.blade.php
