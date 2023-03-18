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
        <h3>Saialill</h3>
        <p>Õpetaja: Riina</p>
        <p>Assistent: Anu</p>
        <p>Õpetaja abi: Merje</p>
        <p>Telefon: 58366694</p>
      </div>
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Võilill</h3>
        <p>Õpetaja: Egle</p>
        <p>Õpetaja: Ülle</p>
        <p>Õpetaja abi: Gerli</p>
        <p>Telefon: 58359002</p>
      </div>
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Sinilill</h3>
        <p>Õpetaja: Marge</p>
        <p>Õpetaja: Tiina</p>
        <p>Õpetaja abi: Angelika</p>
        <p>telefon: 58368062</p>
      </div>
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Päevalill</h3>
        <p>Õpetaja: Maryann</p>
        <p>Õpetaja: Külliki</p>
        <p>Õpetaja abi: Ragne</p>
        <p>telefon: 58364135</p>
      </div>
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Kaeralill</h3>
        <p>Õpetaja: Tetjana</p>
        <p>Õpetaja: Ulvi</p>
        <p>Õpetaja abi: Janne</p>
        <p>Telefon: 58364125</p>
      </div>
      <div class="card">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Rukkilill</h3>
        <p>Õpetaja: Ehta</p>
        <p>Õpetaja: Helbe-Malle</p>
        <p>Õpetaja abi: Pille</p>
        <p>Telefon: 58366458</p>
      </div>
      <div class="card meelespea">
        <img
          class="contact-card-image"
          src="./../photos/Paide_lasteaed_logo4.png"
          alt="Jane"
          style="max-width: 100%" />
        <br />
        <h3>Meelespea</h3>
        <p>Õpetaja: Annika</p>
        <p>Eripedagoog: Helena</p>
        <p>Assistent: Elery</p>
        <p>Õpetaja abi: Svetlana</p>
        <p>Telefon: 5572686</p>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<script>
export default {
  name: 'ContactView',
  data() {
    return {};
  },
};
</script>

<style scoped>
.links-main {
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
  padding: 9px;
  border-radius: 9px;
  font-size: 30px;
  font-weight: bold;
  color: rgb(39, 39, 39);
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
/* card height and padding  */
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
