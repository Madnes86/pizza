
@props(['pizzas'])

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
      <input type="text" class="search__input" placeholder="Поиск пиццы " v-model="searchInput">
      <div class="search__cross" v-if="searchInput" @click="clearSearch">
        <span class="search__cross__line"></span>
        <span class="search__cross__line"></span>
      </div>
    </div>
    <div style="display: flex; gap: 10px;">
      <button class="header__button" onclick="window.location.href='{{ route('cuper') }}'">
        <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.5706 14.2087V12.8198C11.5706 12.0831 11.2921 11.3765 10.7966 10.8556C10.301 10.3347 9.6288 10.042 8.92793 10.042H3.64264C2.94177 10.042 2.2696 10.3347 1.77401 10.8556C1.27842 11.3765 1 12.0831 1 12.8198V14.2087" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M6.28522 7.26405C7.74471 7.26405 8.92787 6.0204 8.92787 4.48627C8.92787 2.95215 7.74471 1.7085 6.28522 1.7085C4.82573 1.7085 3.64258 2.95215 3.64258 4.48627C3.64258 6.0204 4.82573 7.26405 6.28522 7.26405Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Войти
      </button>
      <button class="header__button" id="button-basket">
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
      <p>В корзине <strong>3 товара</strong></p>
      <svg class="basket__cross" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path opacity="0.2" d="M11.6328 9.94495L19.7328 1.84495C19.9149 1.63239 20.01 1.35898 19.9992 1.07934C19.9884 0.799697 19.8724 0.534431 19.6746 0.336549C19.4767 0.138666 19.2114 0.0227402 18.9318 0.011939C18.6521 0.00113767 18.3787 0.096256 18.1662 0.278285L10.0662 8.37829L1.96616 0.267174C1.7536 0.0851447 1.48019 -0.00997263 1.20055 0.00082865C0.920905 0.0116299 0.65564 0.127554 0.457757 0.325437C0.259874 0.52332 0.143948 0.788585 0.133147 1.06823C0.122346 1.34787 0.217464 1.62128 0.399494 1.83384L8.49949 9.94495L0.388382 18.045C0.272069 18.1446 0.177602 18.2671 0.11091 18.405C0.044217 18.5428 0.00673853 18.693 0.000827977 18.846C-0.00508257 18.999 0.0207018 19.1516 0.0765624 19.2942C0.132423 19.4368 0.217154 19.5663 0.325438 19.6746C0.433721 19.7828 0.563218 19.8676 0.705801 19.9234C0.848384 19.9793 1.00098 20.0051 1.154 19.9992C1.30702 19.9933 1.45717 19.9558 1.59502 19.8891C1.73287 19.8224 1.85544 19.7279 1.95505 19.6116L10.0662 11.5116L18.1662 19.6116C18.3787 19.7936 18.6521 19.8888 18.9318 19.878C19.2114 19.8672 19.4767 19.7512 19.6746 19.5534C19.8724 19.3555 19.9884 19.0902 19.9992 18.8106C20.01 18.5309 19.9149 18.2575 19.7328 18.045L11.6328 9.94495Z" fill="black"/>
      </svg>
    </div>
    <div class="basket__middle">
      @foreach($pizzas as $pizza)
        <div class="pizza always-medium" style="background-color: #FFF; padding: 5px;">
          <img src="{{ $pizza['image'] }}" alt="pizza" class="pizza__img">
          <div class="pizza__middle">
            <h2 class="pizza__title">{{ $pizza['title'] }}</h2>
            <p class="pizza__components">{{ $pizza['components'] }}</p>
          </div>
          <div class="pizza__bottom" x-data="pizza()">
            <p>от <strong>359 ₽</strong></p>
            <button class="pizza__button" x-on:click="toggle()" x-show="!isOrder">
              Собрать
            </button>
            <template x-if="isOrder">
              <div class="pizza__counter">
                <button class="nav__button" x-on:click="decrement()">-</button>
                <strong x-text="counter"></strong>
                <button class="nav__button" x-on:click="increment()">+</button>
              </div>
            </template>
          </div>
        </div>
      @endforeach
    </div>
    <div class="basket__bottom">
      <p class="basket__price">
        <span>Цена</span>
        <span class="basket__line"></span>
        <strong>2000₽</strong>
      </p>
      <button class="basket__button" href="/order.blade.php" onclick="window.location.href='{{ route('order') }}'">Заказать</button>
    </div>
  </div>
</div>

<script>

  document.querySelector('.basket__cross').addEventListener('click' , () => {
    document.querySelector('.basket').style.display = 'none';
  });
  document.getElementById('button-basket').addEventListener('click', open);

  document.getElementById('decrement').addEventListener('click', decrement);
  document.getElementById('increment').addEventListener('click', increment);

  // Variables
  var counter = 1;
  document.getElementById('counter').innerHTML = counter;

  // Functions
  function open() {
    document.querySelector('.basket').style.display = 'flex';
  }
  function decrement() {
    if (counter > 0) {
      counter--;
      document.getElementById('counter').innerHTML = counter;
    }
  }
  function increment() {
    if (counter < 9) {
      counter++;
      document.getElementById('counter').innerHTML = counter;
    }
  }

</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
  /* Потом добавить проверку корзины на наличии пиццы */
  .header {
    border-bottom: 1px solid #0000033f ;
    display: flex;
    padding: 4vw;
    gap: 4vw;
  }
  .header__logo {
    cursor: pointer;
    display: flex;
    gap: 10px;
  }
  .header__logo__img {
    width: 40px;
  }
  .header__title {
    font-size: 24px;
    line-height: 1;
    letter-spacing: 3%; 
    white-space: nowrap;
  }
  .header__subtitle {
    line-height: 1;
    white-space: nowrap;
    
  }
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
    display: flex;
    justify-content: center;
    width: 20px;
  }
  .search__line {
    background: #bcbcbc;
    border-radius: 2px;
    position: absolute;
    height: 2px;
    width: 16px;
  }
  .serch__line:first-child {
    transform: rotate(-45deg);
  }
  .search__line:last-child {
    transform: rotate(45deg);
  }
  .header__button { 
    align-items: center;
    background: none;
    border: 1px solid #FE5F00;
    border-radius: 15px;
    color: #FE5F00;
    display: flex;
    padding: 10px;
    font-size: 16px;
    gap: 10px;
  }
  .header__button:hover {
    background: #FE5F00;
    color: #FFFFFF;
    cursor: pointer;
  }
  .basket {
    background: #f0efef;
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
    display: flex;
    padding: 2vw;
    justify-content: space-between;
    font-size: 20px;
  }
  .basket__middle {
    display: flex;
    flex-flow: column;
    height: 100%;
    gap: 10px
  }
  .basket__bottom {
    background: #FFFFFF;
    display: flex;
    padding: 2vw;
    flex-flow: column;
    gap: 15px;
  }
  .basket__price {
    display: flex;
    justify-content: space-between;
    gap: 10px;
  }
  .basket__line {
    border-bottom: 1px dashed #0000004c;
    height: 16px;
    width: 100%;
  }
  .basket__button {
    background: #FE5F00;
    border: none;
    border-radius: 15px;
    color: #FFFFFF;
    cursor: pointer;
    padding: 15px;
    font-size: 18px;
    width: 100%;
  }
  .always-medium {
    grid-template-columns: 100px 1fr;
    flex-direction: row;
  }

  .always-medium .pizza__middle {
    display: flex;
    flex-direction: column;
  }

  .always-medium .pizza__title {
    margin-bottom: 1px;
  }

  .always-medium .pizza__img {
    width: 100px;
  }

  .always-medium .pizza__bottom {
    grid-column: 2;
  }
@media (min-width: 1000px) {
  .header {
    padding: 30px;
    gap: 30px;
  }
}
@media (max-width: 600px) {
  .header__logo, .search__img{
    display: none;
  }
}
</style>