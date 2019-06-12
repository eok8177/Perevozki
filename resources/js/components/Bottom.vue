<template>
  <footer class="footer">
    <div class="wrapper">
      <h3 class="footer__title">Давайте работать вместе!</h3>
      <p class="footer__subtitle">Заказывайте сейчас, а мы сделаем все остальное!</p>
      <div id="callFrom" class="footer__wrapper">
        <form @submit="sendForm" class="footer__form">
          <div class="footer__form-item">
            <label for="name" class="form__label">Как Вас зовут?</label>
            <input v-model="call.name" type="text" class="form__field" id="name" placeholder="Ваше Имя" required="required">
          </div>
          <div class="footer__form-item">
            <label for="tel" class="form__label">Ваш телефон</label>
            <input v-model="call.phone" type="text" class="form__field" id="tel" placeholder="+38" required="required">
          </div>
          <div class="footer__form-item">
            <label for="type-delivery" class="form__label">Вид перевозки</label>
            <select  v-model="call.type" id="type-delivery" class="form__field">
              <option value="Грузоперевозки">Грузоперевозки</option>
              <option v-for="page in pages" v-bind:value="page.title">{{ page.title }}</option>
            </select>
          </div>
          <div class="footer__form-item">
            <label for="type-delivery" class="form__label">Сообщение</label>
            <textarea v-model="call.message" placeholder="Расскажите нам историю..." class="form__field form__message" rows="8" required="required">

            </textarea>
          </div>
          <div v-show="status">
            <p>{{message}}</p>
          </div>
          <button :disabled="status" class="button form-button">Отправить</button>
        </form>
        <div class="footer__info">
          <p class="footer__info-title">Краун Карс<br>
            Мы работаем без выходных.<br>
          Прием заказов с 7:00 до 23:00</p>
          <p class="footer__info-block">
            Звоните:
            <a href="tel:0675588838" class="footer__tel">(067) 580 60 60</a>
            <a href="tel:0935188838" class="footer__tel">(063) 580 60 60</a>
            <a href="tel:0504588838" class="footer__tel">(050) 580 60 60</a>
          </p>
          <p class="footer__info-block">
            Пишите:  <br>
            <a href="mailto:gruzoperevozka.kiev@gmail.com" class="footer__tel">gruzoperevozka.kiev@gmail.com</a>
          </p>
          <p class="footer__info-block">
            Заходите: <br>
            г.Киев, ул.Волховская 10, офис 6
          </p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
  import axios from 'axios';
  export default {
    name: 'Bottom',
    props: ['menuPages'],
    data() {
      return {
        pages: this.menuPages,
        call: {
          name: null,
          phone: null,
          type: 'Грузоперевозки',
          message: null
        },
        status: false,
        message: null
      }
    },
    watch: {
      menuPages: function (newVal) {
        this.pages = newVal
      }
    },
    methods: {
      sendForm: function(e) {
        e.preventDefault();
        axios.post('/api/call', this.call)
        .then(
          (response) => {
            this.message = 'Спасибо, мы скоро свяжемся с Вами';
            this.status = true;
            this.call.name = null;
            this.call.phone = null;
            this.call.message = null;
            console.log(response);
          }
        )
        .catch(
          (error) => console.log(error)
        );
      }
    }
  }
</script>