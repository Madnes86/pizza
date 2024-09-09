<template>
  <AppHeader />
  <AppSort />
  <div class="app__box">
    <SideSort />
    <PizzaItem />
  </div>
</template>

<script>
import AppHeader from './components/AppHeader.vue';
import AppSort from './components/AppSort.vue';
import SideSort from './components/SideSort.vue';
import PizzaItem from './components/PizzaItem.vue'

export default {
  name: 'App',
  components: {
    AppHeader,
    AppSort,
    SideSort,
    PizzaItem,
  }
}
</script>

<style lang="scss">
  $text: #000;

  #app {
    background: $white;
    border-radius: $radius;
    margin: auto;
    max-width: 1200px;
  }
  .app__box {
    display: flex;
    margin: $margin;
    gap: $margin;
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