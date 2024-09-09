<template>
  <div class="side">
    <h3 class="side__title">Фильтрация</h3>
    <div class="side__checkbox">
      <input type="checkbox" id="input-1">
      <label for="input-1" class="side__text">Можно собрать</label>
    </div>
    <div class="side__checkbox">
      <input type="checkbox" id="input-2">
      <label for="input-2" class="side__text">Новинки</label>
    </div>
    <h3 class="side__title">Ингредиенты</h3>
    <div class="side__checkbox">
      <input type="checkbox" id="input-3">
      <label for="input-3" class="side__text">Сырный соус</label>
    </div>
    <div class="side__checkbox">
      <input type="checkbox" id="input-4">
      <label for="input-4" class="side__text">Моцарелла</label>
    </div>
    <div class="side__checkbox">
      <input type="checkbox" id="input-5">
      <label for="input-5" class="side__text">Чеснок</label>
    </div>
    <div class="side__checkbox">
      <input type="checkbox" id="input-6">
      <label for="input-6" class="side__text">Красный лук</label>
    </div>
    <div class="side__checkbox">
      <input type="checkbox" id="input-7">
      <label for="input-7" class="side__text">Томаты</label>
    </div>
    <div class="side__checkbox">
      <input type="checkbox" id="input-8">
      <label for="input-8" class="side__text">Соленные огурчики</label>
    </div>
    <h3 class="side__title">Тип теста</h3>
    <div class="side__checkbox">
      <input type="radio" id="input-9">
      <label for="input-9" class="side__text">Традиционное</label>
    </div>
    <div class="side__checkbox">
      <input type="radio" id="input-10">
      <label for="input-10" class="side__text">Тонкое</label>
    </div>
    <button class="side__button">Применить</button>
  </div>
</template>

<script>
export default {
  name: 'SideSort',
}
</script>

<style lang="scss">
  .side {
    display: flex;
    flex-flow: column;
    gap: 10px;

    &__title {
      // Удалить мб
    }
    &__checkbox {
      align-items: center;
      display: flex;
      padding: 0 4px;
      gap: 10px;
    }
    &__text {
      cursor: pointer;
    }
    &__button {
      background: $orange-1;
      border: none;
      border-radius: $radius;
      color: $white;
      cursor: pointer;
      padding: 10px;
      font-size: 16px;
      &:hover {
        // Доделать
      }
    }
  }
</style>