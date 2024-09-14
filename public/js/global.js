
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