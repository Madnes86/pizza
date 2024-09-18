
function handleResize(entries) {
  entries.forEach((entry) => {
    const containerWidth = entry.contentRect.width;
    const pizzas = entry.target.querySelectorAll('.pizza');
    
    pizzas.forEach((pizza) => {
      pizza.classList.remove('small', 'medium');
      pizza.parentElement.style.gridTemplateColumns = 'repeat(auto-fit, minmax(220px, 1fr))';

      if (containerWidth < 410) {
        pizza.classList.add('small');
        pizza.parentElement.style.gridTemplateColumns = '1fr';
      } else if (containerWidth < 700){
        pizza.classList.add('medium');
        pizza.parentElement.style.gridTemplateColumns = '1fr';
      }
    });
  });
}

// Выбираем все контейнеры с пиццами
const pizzasContainers = Array.from(document.querySelectorAll('.pizza-container'));
const resizeObserver = new ResizeObserver(handleResize);

// Отслеживаем изменения для каждого контейнера
pizzasContainers.forEach((container) => {
  resizeObserver.observe(container);
});

// КНОПОЧКИ
const pizzaButtons = document.querySelectorAll('.pizza__button');
const decrementButtons = document.querySelectorAll('.decrement');
const incrementButtons = document.querySelectorAll('.increment');

pizzaButtons.forEach(button => {
  button.addEventListener('click', function(event) {
    const pizzaCard = event.target.closest('.pizza');
    const pizzaCounter = pizzaCard.querySelector('.pizza__counter');
    const isCounterVisible = pizzaCounter.style.display === 'flex';
    
    pizzaCounter.style.display = isCounterVisible ? 'none' : 'flex';
    button.style.display = isCounterVisible ? 'flex' : 'none';
  });
});

decrementButtons.forEach(button => {
  button.addEventListener('click', function(event) {
    const pizzaCard = event.target.closest('.pizza');
    const decrement = pizzaCard.querySelector('.counter');
    const pizzaCounter = pizzaCard.querySelector('.pizza__counter');
    const pizzaButton = pizzaCard.querySelector('.pizza__button');
    let count = parseInt(decrement.innerHTML, 10);
    if (count > 1) {
      decrement.innerHTML = count - 1;
    }
    if (count == 1) {
      pizzaCounter.style.display = 'none';
      pizzaButton.style.display = 'flex';
    }

  });
});

incrementButtons.forEach(button => {
  button.addEventListener('click', function(event) {
    const pizzaCard = event.target.closest('.pizza');
    const increment = pizzaCard.querySelector('.counter');
    let count = parseInt(increment.innerHTML, 10);
    if (count < 9)
      increment.innerHTML = count + 1;
  });
});

//МЕНЮ
const menu = document.getElementById('menu');
const headerOptions = document.querySelector('.header__options');
menu.addEventListener('mouseover', function() {
  headerOptions.style.display = 'flex';
});
menu.addEventListener('mouseout', function() {
  headerOptions.style.display = 'none';
});
headerOptions.addEventListener('mouseover', function() {
  headerOptions.style.display = 'flex';
});
headerOptions.addEventListener('mouseout', function() {
  headerOptions.style.display = 'none';
});

//ОТКРЫТИЕ КАРТОЧКИ 
const inputs = document.querySelectorAll('.input');

inputs.forEach(input => {
  const inputHeader = input.querySelector('.input__header');
  const inputBody = input.querySelector('.input__body');
  const inputSvg = input.querySelector('.input__svg');

  inputBody.style.display = 'none';
  inputHeader.addEventListener('click', function(event) {
    inputBody.style.display = inputBody.style.display === 'block' ? 'none' : 'block';
    inputSvg.style.transform = inputSvg.style.transform === 'rotate(180deg)' ? 'rotate(0deg)' : 'rotate(180deg)';
  });
});