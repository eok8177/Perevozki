<template>
    <main class="main">
        <div class="wrapper main__wrapper">
            <h2 class="main__title">Автопарк</h2>
            <p class="main__subtitle">Мы собрали для Вас большой автопарк транспортных средств на все случаи перевозки
                грузов. У
                нас Вы можете срочно и по низкой цене вызвать специалистов на следующих автомобилях:</p>
            <ul class="carpark">
                <li v-for="item in avtopark" class="carpark__item">
                    <div class="carpark__item-image">
                        <img :src="item.img" alt="">
                    </div>
                    <div class="carpark__item-info">
                        <p class="carpark__item-title">{{item.title}}</p>
                        <div class="carpark__item-table">
                            <div class="carpark__item-row">
                                <span class="carpark__item-col">Длина</span>
                                <span class="carpark__item-col">{{item.lenght}}</span>
                            </div>
                            <div class="carpark__item-row">
                                <span class="carpark__item-col">Высота</span>
                                <span class="carpark__item-col">{{item.height}}</span>
                            </div>
                            <div class="carpark__item-row">
                                <span class="carpark__item-col">Ширина</span>
                                <span class="carpark__item-col">{{item.width}}</span>
                            </div>
                            <div class="carpark__item-row">
                                <span class="carpark__item-col">Объем</span>
                                <span class="carpark__item-col">{{item.volume}}</span>
                            </div>

                        </div>
                        <div class="carpark__item-order">
                            <span class="carpark__item-price">{{item.price}}</span>
                            <a href="#callFrom" class="button">Заказать звонок</a>
                        </div>
                        <p class="carpark__item-text"><b>Последующая цена 100 грн/час</b>
                            Подача автомобиля от 30 до 60 минут</p>
                    </div>
                </li>
            </ul>

            <div class="text-block">
                <h2 class="text-block__title">Автопарк</h2>
                <p>Автомобили – это наша гордость. Мы отлично знаем, что именно от состояния машины напрямую зависит
                    скорость и
                    качество доставки груза, поэтому заботливо следим за тем, чтобы автомобили хорошо выглядели, и были
                    полностью исправны. В нашем автопарке есть машины самых разных моделей, которые без проблем перевезут
                    грузы
                    тоннажностью вплоть до 20 тонн.</p>
                <a href="#" class="info__link">Узнать больше</a>
            </div>
        </div>

    </main>
</template>

<script>

export default {
  name: 'Avtopark',
  data() {
    return {
        avtopark: [
          {title:'1.5 тонн (9 кубов)',img:'img/furgon.png',lenght:'3 м',height:'1.80 м',width:'1.70 м',volume:'9 m3',price:'400 грн/час',text:''},
          {title:'1.5 тонн (9 кубов)',img:'img/furgon.png',lenght:'3 м',height:'1.80 м',width:'1.70 м',volume:'9 m3',price:'400 грн/час',text:''},
          {title:'1.5 тонн (9 кубов)',img:'img/furgon.png',lenght:'3 м',height:'1.80 м',width:'1.70 м',volume:'9 m3',price:'400 грн/час',text:''},
          {title:'1.5 тонн (9 кубов)',img:'img/furgon.png',lenght:'3 м',height:'1.80 м',width:'1.70 м',volume:'9 m3',price:'400 грн/час',text:''},
          {title:'1.5 тонн (9 кубов)',img:'img/furgon.png',lenght:'3 м',height:'1.80 м',width:'1.70 м',volume:'9 m3',price:'400 грн/час',text:''},
          {title:'1.5 тонн (9 кубов)',img:'img/furgon.png',lenght:'3 м',height:'1.80 м',width:'1.70 м',volume:'9 m3',price:'400 грн/час',text:''},
          {title:'1.5 тонн (9 кубов)',img:'img/furgon.png',lenght:'3 м',height:'1.80 м',width:'1.70 м',volume:'9 m3',price:'400 грн/час',text:''},
          {title:'1.5 тонн (9 кубов)',img:'img/furgon.png',lenght:'3 м',height:'1.80 м',width:'1.70 м',volume:'9 m3',price:'400 грн/час',text:''},
        ]
    }
  }
}
</script>