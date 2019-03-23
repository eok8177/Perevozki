<template>
  <main class="main bus">
    <div class="wrapper main__wrapper">
      <h2 class="main__title">1.5 тонн (9 кубов)</h2>
      <p class="main__subtitle">Мы собрали для Вас большой автопарк транспортных средств на все случаи перевозки
      грузов. У нас Вы можете срочно и по низкой цене вызвать специалистов на следующих автомобилях:</p>

      <div class="sticker">
        <div class="sticker__wrapper">
          <div class="sticker__img">
            <img src="/img/busBig.png" alt="Bus">
          </div>
          <div class="sticker__info">
            <div class="sticker__info-tech">
              <h3 class="sticker__title">Характеристики автомобиля</h3>
              <div class="carpark__item-table">
                <div class="carpark__item-row">
                  <span class="carpark__item-col">Длина</span>
                  <span class="carpark__item-col">3 м</span>
                </div>
                <div class="carpark__item-row">
                  <span class="carpark__item-col">Высота</span>
                  <span class="carpark__item-col">1.80 м</span>
                </div>
                <div class="carpark__item-row">
                  <span class="carpark__item-col">Ширина</span>
                  <span class="carpark__item-col">1.70 м</span>
                </div>
                <div class="carpark__item-row">
                  <span class="carpark__item-col">Объем</span>
                  <span class="carpark__item-col">9 m3</span>
                </div>
              </div>
            </div>
            <div class="sticker__info-more">
              <h3 class="sticker__title">Дополнительная информация</h3>
              <div class="carpark__item-table">
                <div class="carpark__item-row">
                  <span class="carpark__item-col">Миним. заказ ( до 5 км )</span>
                  <span class="carpark__item-col">Миним. заказ ( до 5 км )2 часа</span>
                </div>
                <div class="carpark__item-row">
                  <span class="carpark__item-col">После 5 км по Киеву</span>
                  <span class="carpark__item-col">8 грн/км</span>
                </div>
                <div class="carpark__item-row">
                  <span class="carpark__item-col">Подача</span>
                  <span class="carpark__item-col">140 грн</span>
                </div>
                <div class="carpark__item-row">
                  <span class="carpark__item-col">За городом</span>
                  <span class="carpark__item-col">8 грн/км (в две стороны)</span>
                </div>
                <div class="carpark__item-row">
                  <span class="carpark__item-col">Стоимость за час</span>
                  <span class="carpark__item-col">140 грн</span>
                </div>
                <div class="carpark__item-row">
                  <span class="carpark__item-col">Работа в вечернее время с 18-00</span>
                  <span class="carpark__item-col">+50 грн к часу</span>
                </div>
              </div>
            </div>
            <div class="sticker__order">
              <div class="carpark__item-order">
                <span class="carpark__item-price">400 грн/час</span>
                <a href="#" class="button">Заказать звонок</a>
              </div>
              <p class="carpark__item-text"><b>Последующая цена 100 грн/час</b>
              Подача автомобиля от 30 до 60 минут</p>
            </div>
          </div>
        </div>

      </div>
      <div class="button-center">
        <router-link to="/avtopark" class="button button-border">Весь автопарк</router-link>
      </div>
    </div>

  </main>
</template>

<script>
  export default {
    name: 'Bus',
    data() {
      return {
        bus: {
          title:'1.5 тонн (9 кубов)',
          img:'img/furgon.png',
          lenght:'3 м',
          height:'1.80 м',
          width:'1.70 м',
          volume:'9 m3',
          price:'400 грн/час',
          text:''
        }
      }
    }
  }
</script>