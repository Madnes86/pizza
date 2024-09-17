{{-- 
@props(['pizzas'])

<div class="inputs">
  <div class="input">
    <div class="input__header">
      <h2 class="input__title">1.Корзина</h2>
      <div class="input__clear">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M2.3999 3.7998H13.5999L12.4939 13.7538C12.456 14.0964 12.293 14.4129 12.0363 14.6428C11.7795 14.8727 11.447 14.9998 11.1023 14.9998H4.8975C4.55285 14.9998 4.2203 14.8727 3.96353 14.6428C3.70676 14.4129 3.54381 14.0964 3.5059 13.7538L2.3999 3.7998Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M4.7413 1.8029C4.85453 1.56278 5.0337 1.3598 5.25791 1.21764C5.48212 1.07548 5.74213 0.999997 6.0076 1H9.992C10.2576 0.999864 10.5178 1.07528 10.7421 1.21745C10.9665 1.35962 11.1457 1.56267 11.259 1.8029L12.1998 3.8H3.7998L4.7413 1.8029Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M1 3.7998H15" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M6.6001 7.2998V10.7998" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M9.3999 7.2998V10.7998" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <form action="/order/clear" method="POST">
          @csrf
          <button type="submit" class="input__subtitle">Очистить корзину</button>
        </form>
      </div>
    </div>
    <div class="input__box-1 pizzas-container">
      @foreach($pizzas as $pizza)
        <div class="pizza">
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
  </div>
  <div class="input">
    <div class="input__header">
      <h2 class="input__title">2.Информация</h2>
    </div>
    <div class="input__box-2">
      <div>
        <p>Имя</p>
        <input type="text" placeholder="Введите имя" class="input-text">
      </div>
      <div>
        <p>Фамилия</p>
        <input type="text" placeholder="Введите фамилию" class="input-text">
      </div>
      <div>
        <p>E-mail</p>
        <input type="text" placeholder="Введите E-mail" class="input-text">
      </div>
      <div>
        <p>Телефон</p>
        <input type="text" placeholder="Введите телефон" class="input-text">
      </div>
    </div>
  </div>
  <div class="input">
    <div class="input__header">
      <h2 class="input__title">3.Адрес</h2>
    </div>
    <div class="input__box-3">
      <div>
        <p>Адрес</p>
        <input type="text" placeholder="Введите адрес" class="input-text">
      </div>
      <div>
        <p>Комментарий к заказу</p>
        <textarea name="" id="" cols="30" rows="10" placeholder="Укажите дополнительную информацию курьеру"></textarea>
      </div>
      <div>
        <p>Время доставки</p>
        <select name="" id="">
          <option value="">С 11:00 до 14:00</option>
          <option value="">С 14:00 до 17:00</option>
          <option value="">С 17:00 до 20:00</option>
        </select>
      </div>
    </div>
  </div>
  <div class="input">
    <div class="input__header">
      <h2 class="input__title">Сумма:</h2>
      <h2 class="input__title">2365 ₽</h2>
    </div>
    <div class="input__box-4">
      <p class="basket__price">
        <span>Товары</span>
        <span class="basket__line"></span>
        <strong>2000₽</strong>
      </p>
      <p class="basket__price">
        <span>Доставка</span>
        <span class="basket__line"></span>
        <strong>135₽</strong>
      </p>
      <p class="basket__price">
        <span>Налог</span>
        <span class="basket__line"></span>
        <strong>299₽</strong>
      </p>
      <button class="basket__button" onclick="window.location.href = '/orders'">Оформить</button>
    </div>
  </div>
</div>


<script>

  function handleResize(entries) {
    entries.forEach((entry) => {
      const containerWidth = entry.contentRect.width;
      const pizzas = entry.target.querySelectorAll('.pizza');
      const container = entry.target;

      container.style.gridTemplateColumns = 'repeat(auto-fit, minmax(220px, 1fr))';

      if (containerWidth < 700) {
        container.style.gridTemplateColumns = '1fr';
      }

      pizzas.forEach((pizza) => {
        pizza.classList.remove('small', 'medium', 'large');
        if (containerWidth > 700) {
          pizza.classList.add('large');
        } else if (containerWidth > 400) {
          pizza.classList.add('medium');
        } else {
          pizza.classList.add('small');
        }
      });
    });
  }

  // Выбираем все контейнеры с пиццами
  const pizzasContainers = document.querySelectorAll('.pizzas-container');
  const resizeObserver = new ResizeObserver(handleResize);

  // Отслеживаем изменения для каждого контейнера
  pizzasContainers.forEach((container) => {
    resizeObserver.observe(container);
  });
</script>

<style>
  .inputs {
    display: grid;
    grid-template-columns: 1fr minmax(1fr, 300px);
    grid-template-rows: 1fr;
    margin: 20px;
    gap: 20px;
  }
  .input:nth-child(1),
  .input:nth-child(2),
  .input:nth-child(3) {
    grid-column: 1;
  }

  .input:nth-child(4) {
    grid-column: 2;
    grid-row: 1;
    max-height: 275px;
  }
  .input {
    background: #FFF;
    border-radius: 15px;
    display: flex;
    flex-flow: column;
    width: 100%;
  }
  .input__title {
    white-space: nowrap;
  }
  .input__header {
    align-items: center;
    border-bottom: 1px solid #f0efef;
    display: flex;
    padding: 20px;
    justify-content: space-between;
    width: 100%
  }
  .input__clear {
    align-items: center;
    cursor: pointer;
    display: flex;
    opacity: 0.6;
    gap: 10px;
  }
  .input__clear:hover {
    opacity: 1;
  }
  .input__subtitle {
    background: none;
    border: none;
    font-size: 14px;
  }
  .input__box-1 {
    display: grid;
    padding: 20px;
    gap: 20px;
  }
  .input__box-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    padding: 20px;
    width: 100%;
  }
  .input__box-3 {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    padding: 20px;
    width: 100%;
  }
  .input__box-4 {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
    padding: 10px;
    width: 100%;
  }
  .input-text {
    border: 1px solid #f0efef;
    border-radius: 15px;
    padding: 10px;
    font-size: 16px;
    width: 100%;
  }
  textarea {
    border: 1px solid #f0efef;
    border-radius: 15px;
    padding: 10px;
    resize: none;
    font-size: 14px;
    width: 100%
  }
  @media (max-width: 800px) {
    .inputs {
      grid-template-columns: 1fr;
    }
    .input:nth-child(4) {
      grid-column: 1;
      grid-row: 4;
    }
  }
</style> --}}