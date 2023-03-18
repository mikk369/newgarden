<template>
  <div id="app">
    <HeaderView />
    <div class="main-card-area">
      <div class="main-contact-container">
        <router-link to="/kontaktid" class="main-contact">
          <button>Personal</button>
        </router-link>
        <router-link to="/hoolekogu" class="contact-Hoolekogu">
          <button>Hoolekogu</button>
        </router-link>
      </div>

      <div class="card-area">
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/Grisly.webp"
            alt="Jane"
            style="max-width: 100%" />
          <h3>Grisly Kuuskler</h3>
          <p class="title">Direktor</p>
          <p>Telefon1: 5512 515</p>
          <p>Telefon2: 6988 921</p>
          <p>direktor@pailasteaed.ee</p>
        </div>
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/Sirje.webp"
            alt="Jane"
            style="width: 100%" />
          <h3>Sirje Kroonsaare</h3>
          <p class="title">Õppealajuhataja</p>
          <p>Telefon1: 58376309</p>
          <p>Telefon2: 6988 922</p>
          <p>oppejuht@pailasteaed.ee</p>
        </div>
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/Gelit.webp"
            alt="Jane"
            style="width: 100%" />
          <h3>Gelit Kivisalu</h3>
          <p class="title">Õppealajuhataja</p>
          <p>Telefon1: 55581527</p>
          <p>lillepai@pailasteaed.ee</p>
          <p>(Osakoormusega)</p>
        </div>
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/Rita.webp"
            alt="Jane"
            style="width: 100%" />
          <h3>Rita Liiver</h3>
          <p class="title">muusikaõpetaja</p>
        </div>
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/Eva.webp"
            alt="Jane"
            style="width: 100%" />
          <h3>Eva Uibopuu</h3>
          <p class="title">Liikumisõpetaja Kullapais</p>
          <p>eva.uibopuu@pailasteaed.ee</p>
        </div>
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/jaana.webp"
            alt="Jane"
            style="width: 100%" />
          <h3>Jaana Kaju</h3>
          <p class="title">Liikumisõpetaja Lillepais</p>

          <p>jaana.hussar@pailasteaed.ee</p>
        </div>
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/Maive.webp"
            alt="Jane"
            style="width: 100%" />
          <h3>Maive Loorits</h3>
          <p class="title">Muusikaõpetaja</p>

          <p>maive.loorits@pailasteaed.ee</p>
        </div>
      </div>
      <div class="support-wrapper">
        <h1 class="text-tugimeeskond">Tugimeeskond</h1>
      </div>

      <div class="card-area">
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/jane.webp"
            alt="Jane"
            style="width: 100%" />
          <h3>Jane Sihvart</h3>
          <p class="title">Eripedagoog Lillepais</p>
          <p>Tallinna tn 49</p>
          <p>jane.sihvart@pailasteaed.ee</p>
        </div>
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/Helen.webp"
            alt="Jane"
            style="width: 100%" />
          <h3>Helen Schvede</h3>
          <p class="title">Mänguterapeut</p>
          <p>Esmaspäeval Kullapais</p>
          <p>Teisipäeval Lillepais</p>
          <p>terapeut@pailasteaed.ee</p>
        </div>
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/Maarja.webp"
            alt="Jane"
            style="width: 100%" />
          <h3>Maarja Toomväli</h3>
          <p class="title">Eripedagoog Kullapais</p>
          <p>Kastani 6</p>
          <p>maarja.toomvali@pailasteaed.ee</p>
        </div>
        <div class="card">
          <img
            class="contact-card-image"
            src="./../photos/Eva_lindermann.webp"
            alt="Jane"
            style="width: 100%" />
          <h3>Eva Lindermann</h3>
          <p class="title">Kõneterapeut</p>
          <p>Esmaspäeval ja teisipäeval Lillepais</p>
          <p>Kolmapäeval Kullapais</p>
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<script scoped>
export default {
  name: 'ContactView',
  methods: {
    // compare if its already on that route if not then push otherwise getting already on route error
    navigateTo(path) {
      if (this.$route.path !== path) {
        this.$router.push(path);
      }
    },
  },
};
</script>

<style scoped>
.main-contact-container {
  display: flex;
  justify-content: center;
  overflow: hidden;
}
@media screen and (max-width: 425px) {
  .main-contact {
    margin-bottom: 30px;
  }
  .main-contact-container {
    flex-direction: column;
    align-items: center;
  }
}
.main-contact button {
  border: none;
  border-radius: 9px;
  font-size: 30px;
  padding: 9px;
  font-weight: bold;
  background-color: aliceblue;
  color: rgb(39, 39, 39);
}
.main-contact button:hover {
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
/* CONTACT CARDS  */
.contact-links {
  align-items: center;
  display: flex;
}
/* margin for hoolekogu button  */
.contact-Hoolekogu button {
  margin-left: 9px;
  border: none;
  border-radius: 9px;
  padding: 9px;
  font-weight: bold;
  background-color: aliceblue;
  font-size: 30px;
  color: rgb(39, 39, 39);
}
.contact-Hoolekogu:hover button {
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
/* grid area  */
.card-area {
  display: grid;
  gap: 30px;
  padding: 100px 0px 100px 0px;
  justify-content: center;
  grid-template-columns: repeat(3, 1fr);
  background-image: url('./../photos/background-2.webp');
  background-size: cover;
}
/* sets margin top to card elements  */
.card {
  margin: auto;
}

/* changes grid to 2 column when screen size 770px */
@media screen and (max-width: 768px) {
  .card-area {
    grid-template-columns: repeat(2, 1fr);
  }
}
/* changes grid to 1 column when screen size 770px */
@media screen and (max-width: 767px) {
  .card-area {
    grid-template-columns: repeat(1, 1fr);
  }
}
/* //so cards wont be behind the heander nav cause position: fixed */
.main-card-area {
  padding-top: 100px;
}

/* card image upper corners rounded  */
.card img {
  border-radius: 3px 3px 0px 0px;
}
h3 {
  font-size: 1.75rem;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 250px;
  text-align: center;
  background-color: #fff;
  line-height: 2rem;
}

/* card title  */
.title {
  font-size: 16px;
  font-weight: bold;
}
.support-wrapper {
  border-bottom: 2px solid rgb(39, 39, 39);
  border-radius: 7px;
}
.support-wrapper {
  display: flex;
  justify-content: center;
}
</style>
