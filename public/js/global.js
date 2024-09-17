
function handleResize(entries) {
  entries.forEach((entry) => {
    const containerWidth = entry.contentRect.width;
    const pizzas = entry.target.querySelectorAll('.pizza');
    
    pizzas.forEach((pizza) => {
      const pizzasParent = pizza.parentElement;
      pizza.classList.remove('small', 'medium');
      pizzasParent.style.gridTemplateColumns = 'repeat(auto-fit, minmax(220px, 1fr))'

      if (containerWidth < 410) {
        pizza.classList.add('small');
        pizzasParent.style.gridTemplateColumns = '1fr';
      } else if (containerWidth < 700){
        pizza.classList.add('medium');
        pizzasParent.style.gridTemplateColumns = '1fr';
      }
    });
  });
}

// Выбираем все контейнеры с пиццами
const pizzasContainer = Array.from(document.querySelectorAll('.pizza')).map(pizza => pizza.parentElement);
const resizeObserver = new ResizeObserver(handleResize);

// Отслеживаем изменения для каждого контейнера
pizzasContainer.forEach((container) => {
  resizeObserver.observe(container);
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