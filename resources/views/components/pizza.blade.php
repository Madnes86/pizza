<div class="box">
  <div class="pizzas">
    <div class="pizza">
      <img src="/assets/pizza-1.png" alt="pizza" class="pizza__img">
      <h2 class="pizza__title">Сырный цыпленок</h2>
      <p class="pizza__components">Цыпленок, моцарелла, сыры чеддер и пармезан, сырный соус, томаты, соус альфредо, чеснок</p>
      <div class="pizza__bottom">
        <p>от <strong>359 ₽</strong></p>
        <button class="pizza__button" v-if="isButton" @click="switchButton">
          Собрать
        </button>
        <!-- <div class="pizza__counter" v-if="!isButton">
          <button class="nav__button" @click="decrement(counter)">-</button>
          <strong>counter</strong>
          <button class="nav__button" @click="increment">+</button>
        </div> -->
      </div>
    </div>
    <div class="pizza">
      <img src="/assets/pizza-2.png" alt="pizza" class="pizza__img">
      <h2 class="pizza__title">Сырный цыпленок</h2>
      <p class="pizza__components">Цыпленок, моцарелла, сыры чеддер и пармезан, сырный соус, томаты, соус альфредо, чеснок</p>
      <div class="pizza__bottom">
        <p>от <strong>359 ₽</strong></p>
        <button class="pizza__button">
          Купить
        </button>
      </div>
    </div>
    <div class="pizza">
      <img src="/assets/pizza-3.png" alt="pizza" class="pizza__img">
      <h2 class="pizza__title">Сырный цыпленок</h2>
      <p class="pizza__components">Цыпленок, моцарелла, сыры чеддер и пармезан, сырный соус, томаты, соус альфредо, чеснок</p>
      <div class="pizza__bottom">
        <p>от <strong>359 ₽</strong></p>
        <button class="pizza__button" id="button-pizza">
          Купить
        </button>
      </div>
    </div>
  </div>
  <div class="nav">
    <button class="nav__button">-</button>
    <button class="nav__button">1</button>
    <button class="nav__button">2</button>
    <button class="nav__button">3</button>
    <button class="nav__button">></button>
  </div>
</div>

<script>
  document.getElementById('button-pizza').addEventListener('click', () => {
    alert('Кнопка добавлена в компонент пиццы')
  })
</script>

<style lang="scss">
  /* Font-size текста pizza не подстраивается под блок */
  /* Grid колонки работают не корректно */
  /* + Можно добавть вертикальный скролл пиццы на мобилке */
  /* + Добавить соотношение картинки и текста в карточке */
  .pizzas {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    grid-template-rows: auto;
    gap: 20px;
  }
  .pizza {
    display: flex;
    flex-flow: column;
    gap: 15px;
  }
  .pizza__img {
    background: #fef0e0;
    border-radius: 15px;
    padding: 10%;
    object-fit: cover;
  }
  .pizza__title {

  }
  .pizza__components {
    opacity: 0.5;
  }
  .pizza__bottom {
    align-items: center;
    display: flex;
    justify-content: space-between;
  }
  .pizza__button {
    background: #fef0e0;
    border: none;
    border-radius: 15px;
    color: #FE5F00;
    display: flex;
    padding: 10px 25px;
    font-size: 15px;
    gap: 10px;
  }
  .pizza__button:hover {
    background: #FE5F00;
    color: #FFFFFF;
    cursor: pointer;
  }
  .pizza__counter {
    align-items: center;
    display: flex;
    gap: 10px;
  }
  .nav {
    display: flex;
    justify-content: center;
    margin: 30px 0px;
    gap: 10px;
  }
  .nav__button {
    align-items: center;
    background: none;
    border-radius: 15px;
    border: 1px solid #FE5F00;
    color: #FE5F00;
    display: flex;
    justify-content: center;
    height: 38px;
    width: 38px;
    font-size: 16px;
  }
  .nav__button:hover {
    background: #FE5F00;
    color: #FFFFFF;
  }
</style>