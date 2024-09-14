
@props(['pizzas'])

<div class="box">
  <div class="pizzas pizzas-container">
    @foreach($pizzas as $pizza)
      <div class="pizza">
        <img src="{{ $pizza['image'] }}" alt="pizza" class="pizza__img">
        <div class="pizza__middle">
          <h2 class="pizza__title">{{ $pizza['title'] }}</h2>
          <p class="pizza__components">{{ $pizza['components'] }}</p>
        </div>
        <div class="pizza__bottom">
          <p>от <strong>{{ $pizza['price'] }} ₽</strong></p>
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
  <div class="nav">
    <button class="nav__button">-</button>
    <button class="nav__button">1</button>
    <button class="nav__button">2</button>
    <button class="nav__button">3</button>
    <button class="nav__button">></button>
  </div>
</div>

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('pizza', (id) => ({
      isOrder: false,
      counter: 1,
      toggle() {
        this.isOrder = !this.isOrder;
      },
      decrement() {
        if (this.counter > 1) {
          this.counter--;
        } else {
          this.isOrder = false;
        }
      },
      increment() {
        if (this.counter < 9) {
          this.counter++;
        }
      }
    }));
  });
</script>

<style >
  .pizzas {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    grid-template-rows: auto;
    gap: 20px;
  }
</style>