<template>
  <div class="lillepai-main">
    <HeaderView />
    <div class="links">
      <router-link to="/lillepai" class="lillepai">
        <button>Lillepai</button>
      </router-link>
      <router-link to="/kullapai" class="kullapai">
        <button>Kullapai</button>
      </router-link>
    </div>
    <div class="card-area">
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Tuulepai</h3>
        <p>Õpetaja: Triinu</p>
        <p>Assistent: Gerli</p>
        <p>Õpetaja abi: Kristelle</p>
        <p>Telefon: 58805762</p>
      </div>
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Vihmapai</h3>
        <p>Õpetaja: Ülli</p>
        <p>Õpetaja: Kairi</p>
        <p>Õpetaja abi: Annika</p>
        <p>Telefon: 58805716</p>
      </div>
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Tähepai</h3>
        <p>Õpetaja: Eveli</p>
        <p>Õpetaja: Mariliis</p>
        <p>Õpetaja abi: Ulvi</p>
        <p>Telefon: 58806291</p>
      </div>
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Päikesepai</h3>
        <p>Õpetaja: Moonika</p>
        <p>Õpetaja: Irina</p>
        <p>Õpetaja abi: Viivika</p>
        <p>Telefon: 58805749</p>
      </div>
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Vikerkaarepai</h3>
        <p>Õpetaja: Irma</p>
        <p>Õpetaja: Merike</p>
        <p>Õpetaja abi: Ilona</p>
        <p>Telefon: 58805720</p>
      </div>
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Pilvepai</h3>
        <p>Õpetaja: Aili</p>
        <p>Õpetaja: Helena</p>
        <p>Õpetaja abi: Triin</p>
        <p>Abiõpetaja: Gerli</p>
        <p>Telefon: 58801145</p>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<script scoped>
export default {
  name: 'ContactView',
  data() {
    return {};
  },
};
</script>

<style scoped>
.lillepai-main {
  min-height: 100vh;
}
.links {
  display: flex;
  justify-content: center;
  padding-top: 100px;
}

.lillepai button {
  border: none;
  background-color: aliceblue;
  padding: 9px;
  border-radius: 9px;
  font-size: 30px;
  font-weight: bold;
  color: rgb(39, 39, 39);
}
.lillepai button:hover {
  cursor: pointer;
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
.kullapai button {
  margin-left: 9px;
  border: none;
  background-color: aliceblue;
  color: rgb(39, 39, 39);

  padding: 9px;
  border-radius: 9px;
  font-size: 30px;
  font-weight: bold;
}
.kullapai button:hover {
  cursor: pointer;
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
/* grid area  */
.card-area {
  display: grid;
  gap: 30px;
  padding: 100px 0px 100px 0px;
  justify-content: center;
  grid-template-columns: repeat(4, 1fr);
  background-image: url('./../photos/background-2.webp');
  background-size: cover;
}
/* sets margin top to card elements  */
.card {
  margin: auto;
  padding: 9px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  background-color: #fff;
}
.card img {
  margin-bottom: 20px;
}
h3 {
  font-size: 1.75rem;
  margin-bottom: 9px;
}
p {
  margin-bottom: 16px;
  line-height: 1.5;
}
/* changes grid to 3 column when screen size 770px */
@media screen and (max-width: 770px) {
  .card-area {
    grid-template-columns: repeat(3, 1fr);
  }
}
/* changes grid to 1 column when screen size 435px */
@media screen and (max-width: 435px) {
  .card-area {
    grid-template-columns: repeat(1, 1fr);
  }
}
</style>
