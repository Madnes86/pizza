<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Заказы</title>
  @vite('resources/css/global.css')
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
</head>
<body>
  <div class="app">
    <x-header :pizzas="$pizzas" />
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
      </div>
      <div class="input">
        <div class="input__header">
          <h2>Заказ { номер }</h2>
          <p>{ дата }</p>
          <p>{ статус }</p>
          <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10" fill="none">
          <path d="M0.500079 8.45122C0.499498 8.25199 0.537177 8.05514 0.610346 7.87514C0.683514 7.69513 0.790314 7.53655 0.922897 7.41103L7.77939 0.969876C7.98387 0.773731 8.24035 0.666504 8.50504 0.666504C8.76973 0.666504 9.02621 0.773731 9.23068 0.969876L16.0872 7.63774C16.3205 7.8641 16.4673 8.18937 16.4952 8.54201C16.523 8.89464 16.4297 9.24574 16.2357 9.51808C16.0418 9.79042 15.763 9.96168 15.4609 9.99419C15.1587 10.0267 14.8578 9.9178 14.6245 9.69145L8.49932 3.73037L2.37419 9.49141C2.20645 9.65448 2.00219 9.75807 1.78559 9.78991C1.56898 9.82176 1.34909 9.78053 1.15193 9.6711C0.954775 9.56168 0.788606 9.38863 0.673086 9.17244C0.557565 8.95626 0.497528 8.70598 0.500079 8.45122Z" fill="#AEAEAE"/>
          </svg>
        </div>
      </div>
      <div class="input" x-data="order()">
        <div class="input__header" x-on:click="toggle()">
          <h2>Заказ { номер }</h2>
          <p>{ дата }</p>
          <p>{ статус }</p>
          <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10" fill="none">
          <path d="M0.500079 8.45122C0.499498 8.25199 0.537177 8.05514 0.610346 7.87514C0.683514 7.69513 0.790314 7.53655 0.922897 7.41103L7.77939 0.969876C7.98387 0.773731 8.24035 0.666504 8.50504 0.666504C8.76973 0.666504 9.02621 0.773731 9.23068 0.969876L16.0872 7.63774C16.3205 7.8641 16.4673 8.18937 16.4952 8.54201C16.523 8.89464 16.4297 9.24574 16.2357 9.51808C16.0418 9.79042 15.763 9.96168 15.4609 9.99419C15.1587 10.0267 14.8578 9.9178 14.6245 9.69145L8.49932 3.73037L2.37419 9.49141C2.20645 9.65448 2.00219 9.75807 1.78559 9.78991C1.56898 9.82176 1.34909 9.78053 1.15193 9.6711C0.954775 9.56168 0.788606 9.38863 0.673086 9.17244C0.557565 8.95626 0.497528 8.70598 0.500079 8.45122Z" fill="#AEAEAE"/>
          </svg>
        </div>
        <template x-if="isOrder">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt assumenda deleniti porro modi ab totam facilis inventore est eum dicta doloribus cumque reprehenderit, minus distinctio facere delectus? Laborum, hic ut?</p>
        </template>
      </div>
    </div>
  </div>
</body>
</html>

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('order', () => ({
      isOrder: false,
      toggle() {
        this.isOrder = !this.isOrder;
      }
    }));
  });
</script>

<style>
  .input__arow {
    
  }
</style>