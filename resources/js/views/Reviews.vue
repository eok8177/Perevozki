<template>
    <main class="main reviews-page">
        <div class="wrapper main__wrapper">
            <h2 class="main__title">Отзывы</h2>
            <p class="main__subtitle reviews__subtitle">Мы собрали для Вас большой автопарк транспортных средств на все случаи перевозки
                грузов. У нас Вы можете срочно и по низкой цене вызвать специалистов на следующих автомобилях:</p>
            <div class="button-center reviews__btn">
                <a href="#" class="button " id="review-btn">Добавить отзыв</a>
            </div>
            <ul class="reviews-big">
                <li v-for="review in reviews" class="reviews-big__item">
                    <div class="reviews-big__img">
                        <img :src="review.img" alt="">
                    </div>
                    <div class="reviews-big__content">
                        <h3 class="reviews-big__title">{{review.title}}</h3>
                        <span class="reviews-big__data">{{review.data}}</span>
                        <p class="reviews-big__text">{{review.text}}</p>
                        <div class="reviews__star">
                            <img src="img/star.svg" alt="" :data-rate="review.rating">
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item "><a href="#" class="breadcrumbs__link breadcrumbs--active">1</a></li>
                <li class="breadcrumbs__item"><a href="#" class="breadcrumbs__link">2</a></li>
                <li class="breadcrumbs__item"><a href="#" class="breadcrumbs__link">3</a></li>
                <li class="breadcrumbs__item"><a href="#" class="breadcrumbs__link">4</a></li>
                <li class="breadcrumbs__item">...</li>
                <li class="breadcrumbs__item"><a href="#" class="breadcrumbs__link">10</a></li>
            </ul>
        </div>


        <div class="review__form" style="position: fixed;">
            <button class="review__form-close">×</button>
            <form action="#">
                <h3 class="review__form-title">Оставте свой отзыв</h3>
                <div class="review__form-block">
                    <label for="yourname" class="review__form-label">Как Вас зовут?</label>
                    <input type="text" name="yourname" id="yourname" class="review__form-field" placeholder="Ваше Имя">
                </div>
                <div class="review__form-block">
                    <label for="type" class="review__form-label">Вид перевозки</label>
                    <select name="type" id="type" class="review__form-field">
                        <option>Вывоз мусора</option>
                        <option>Вывоз мусора</option>
                        <option>Вывоз мусора</option>
                        <option>Вывоз мусора</option>
                        <option>Вывоз мусора</option>
                    </select>
                </div>
                <div class="review__form-block">
                    <label for="yourmessage" class="review__form-label">Сообщение</label>
                    <textarea name="yourname" id="yourmessage" class="review__form-field review__form-message"
                              placeholder="Расскажите нам историю...">

                    </textarea>
                </div>
                <div class="review__form-star">
                    <img src="img/star.svg" alt="">
                </div>
                <div class="button-center">
                    <button class="button">Оставить отзыв</button>
                </div>

            </form>
        </div>
        <div class="overlay"></div>

    </main>
</template>

<script>
    var fakeText = 'Во время офисного переезда переживал за сохранность мебели и техники. Я очень рад, что обратился в эту компанию. Работники оперативно приехали, собрали и упаковали мебель, компьютеры и остальную технику запаковали так надежно, что она вряд ли вообще повредилась бы. Доехало все целым, на новом офисе еще раз убедился в профессионализме и оперативности работников';
export default {
  name: 'Reviews',

  data() {
    return {
        reviews: [
          {title:'Стебницкий Виктор Степанович',img:'img/review1.png',data:'22.01.2012',rating:'4',text:fakeText},
          {title:'Стебницкий Виктор Степанович',img:'img/review2.png',data:'22.01.2012',rating:'4',text:fakeText},
          {title:'Стебницкий Виктор Степанович',img:'img/review3.png',data:'22.01.2012',rating:'4',text:fakeText},
          {title:'Стебницкий Виктор Степанович',img:'img/review1.png',data:'22.01.2012',rating:'4',text:fakeText},
          {title:'Стебницкий Виктор Степанович',img:'img/review1.png',data:'22.01.2012',rating:'4',text:fakeText},
        ]
    }
  }
}
</script>


