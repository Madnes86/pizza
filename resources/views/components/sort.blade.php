<div class="sort">
    <h3 class="sort__title">Все пиццы</h3>
    <div class="sort__row">
      <nav class="sort__options">
        <p class="sort__option">Все</p>
        <p class="sort__option">Мясные</p>
        <p class="sort__option">Острые</p>
      </nav>
      <button class="sort__button" @click="switchSort">
        <svg class="button__svg" width="14" height="14" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M13.7333 13.073C13.8167 12.991 13.8833 12.8929 13.9291 12.7845C13.9749 12.676 13.999 12.5594 14 12.4414C14.001 12.3233 13.9789 12.2063 13.9349 12.097C13.891 11.9878 13.8261 11.8885 13.7441 11.8051C13.6621 11.7216 13.5645 11.6556 13.4572 11.6109C13.3498 11.5662 13.2348 11.5437 13.1187 11.5448C13.0027 11.5458 12.8881 11.5703 12.7815 11.6169C12.6749 11.6635 12.5785 11.7312 12.4979 11.8161L11.3683 12.9655L11.3683 6.22218C11.3683 5.98643 11.2762 5.76033 11.1124 5.59363C10.9486 5.42692 10.7263 5.33327 10.4946 5.33327C10.2629 5.33327 10.0407 5.42692 9.87686 5.59363C9.71302 5.76033 9.62097 5.98643 9.62097 6.22218L9.62097 12.9655L8.49133 11.8161C8.32656 11.6542 8.10587 11.5646 7.8768 11.5666C7.64773 11.5686 7.42861 11.6621 7.26662 11.8269C7.10464 11.9917 7.01276 12.2147 7.01077 12.4477C7.00878 12.6808 7.09684 12.9054 7.25598 13.073L9.87696 15.7397C10.0408 15.9064 10.263 16 10.4946 16C10.7263 16 10.9485 15.9064 11.1123 15.7397L13.7333 13.073ZM6.74402 2.92699C6.90316 3.09464 6.99122 3.31918 6.98923 3.55225C6.98724 3.78532 6.89536 4.00827 6.73338 4.17308C6.57139 4.33789 6.35227 4.43138 6.1232 4.4334C5.89413 4.43543 5.67344 4.34583 5.50867 4.18391L4.37903 3.03455L4.37903 9.77782C4.37903 10.0136 4.28698 10.2397 4.12314 10.4064C3.95929 10.5731 3.73708 10.6667 3.50537 10.6667C3.27366 10.6667 3.05144 10.5731 2.8876 10.4064C2.72376 10.2397 2.63171 10.0136 2.63171 9.77782L2.63171 3.03455L1.50207 4.18391C1.42148 4.26881 1.32507 4.33653 1.21848 4.38311C1.1119 4.4297 0.997254 4.45422 0.88125 4.45525C0.765246 4.45628 0.650204 4.43378 0.542835 4.38909C0.435466 4.34439 0.33792 4.27839 0.25589 4.19493C0.173859 4.11146 0.108987 4.01222 0.0650585 3.90297C0.0211304 3.79373 -0.00097577 3.67668 3.22694e-05 3.55865C0.00104031 3.44062 0.0251425 3.32398 0.0709303 3.21553C0.116718 3.10708 0.183274 3.00899 0.266718 2.92699L2.88769 0.26026C3.05153 0.0936154 3.27371 -4.68861e-07 3.50537 -4.58735e-07C3.73703 -4.48609e-07 3.95921 0.0936154 4.12304 0.26026L6.74402 2.92699Z" fill="currentColor"/>
        </svg>
        <p class="button__title">Сортировка по:</p>
        <p class="button__subtitle">sort</p>
      </button>
    </div>
  </div>

  <style lang="scss">
  .sort {
    margin: 4vw;
  }
  .sort__title {
    font-size: 36px;
    line-height: 1;
    margin-bottom: 1.5vw;
  }
  .sort__row {
    display: flex;
    justify-content: space-between;
  }
  .sort__options {
    background: #f0efef;
    border-radius: 15px;
    display: flex;
  }
  .sort__option {
    border-radius: 15px;
    cursor: pointer;
    padding: 5px 10px;
    margin: 5px 5px;
  }
  .sort__option:hover {
    background: #FFFFFF;
    color: #FE5F00;
  }
  .sort__button {
    align-items: center;
    background: #f0efef;
    border: none;
    border-radius: 15px;
    cursor: pointer;
    display: flex;
    padding: 10px;
    font-size: 16px;
    gap: 10px;
  }
  .button__subtitle {
    color: #FE5F00;
  }
  .sort__button:hover {
    background: #FE5F00;
    color: #FFFFFF;
  }
  .sort__button:hover .button__subtitle {
    color: #FFFFFF;
  }
  @media (min-width: 1000px) {
    .sort {
      margin: 30px;
    }
    .sort__title {
      margin-bottom: 15px
    }
  }
  @media (max-width: 600px) {
    .button__title {
      display: none;
    }
    .sort__button {
      color: #FE5F00;
    }
  }

</style>