
@props(['pizzas'])

<div class="box">
  <div class="pizzas" id="pizzas-container">
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
  function handleResize(entries) {
    entries.forEach((entry) => {
      const containerWidth = entry.contentRect.width;
      const pizzas = document.querySelectorAll('.pizza');
      const container = document.getElementById('pizzas-container');

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
  

  const pizzasContainer = document.getElementById('pizzas-container');
  const resizeObserver = new ResizeObserver(handleResize);
  resizeObserver.observe(pizzasContainer);
</script>

<style >
  /* Font-size текста pizza не подстраивается под блок */
  /* #pizzas-container {
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  } */
  /* .medium #pizzas-container {
    grid-template-columns: 1fr;
  } */
  .pizzas {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    grid-template-rows: auto;
    gap: 20px;
  }
  .pizza {
    display: grid;
    grid-template-columns: 1fr;
    flex-direction: column;
    gap: 15px;
  }
  .pizza__middle {
    flex: 1;
  }

  .medium {
    grid-template-columns: 100px 1fr;
    /* flex-direction: row; */
  }
  .medium .pizza__middle {
    display: flex;
    flex-direction: column;
  }
  .medium .pizza__title {
    margin-bottom: 1px;
  }
  .medium .pizza__img {
    width: 100px;
  }
  .medium .pizza__bottom {
    grid-column: 2;
  }
  .pizza__img {
    background: #fef0e0;
    border-radius: 15px;
    padding: 5%;
    object-fit: cover;
    width: 100%;
  }
  .pizza__title {
    margin-bottom: 10px;
  }
  .pizza__components {
    opacity: 0.5;
  }
  .pizza__bottom {
    align-items: center;
    display: flex;
    justify-content: space-between;
    gap: 10px;
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