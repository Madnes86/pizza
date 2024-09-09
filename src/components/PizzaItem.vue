<template>
  <div class="pizzas">
    <div class="pizza">
      <img src="@/assets/pizza-1.png" alt="pizza" class="pizza__img">
      <h2 class="pizza__title">Сырный цыпленок</h2>
      <p class="pizza__components">Цыпленок, моцарелла, сыры чеддер и пармезан, сырный соус, томаты, соус альфредо, чеснок</p>
      <div class="pizza__bottom">
        <p>от <strong>359 ₽</strong></p>
        <button class="pizza__button">
          Собрать
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PizzaItem',
}
</script>

<style lang="scss">
  .pizzas {
    display: flex;
    gap: 20px;
  }
  .pizza {
    display: flex;
    flex-flow: column;
    height: 380px;
    width: 240px;
    gap: 15px;
    &__img {
      background: $orange-3;
      border-radius: $radius;
      padding: 10%;
      height: 240px;
    }
    &__title {
      // font-size: 22px;
    }
    &__components {
      opacity: 0.5;
      font-size: 14px;
    }
    &__bottom {
      align-items: center;
      display: flex;
      justify-content: space-between;
    }
    &__button {
      background: $orange-3;
      border: none;
      border-radius: $radius;
      color: $orange-1;
      display: flex;
      padding: 5px 10px;
      font-size: 15px;
      gap: 10px;
    }
  }
</style>