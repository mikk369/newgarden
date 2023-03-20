<template>
  <div class="trustee-contact">
    <HeaderView />
    <div class="main-contact-wrapper">
      <router-link to="/kontaktid" class="main-contact-personal">
        <button>Personal</button>
      </router-link>

      <router-link to="/hoolekogu" class="contact-Hoolekogu">
        <button>Hoolekogu</button>
      </router-link>
    </div>

    <div class="table-responsive table-margin-top">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nimi</th>
            <th scope="col">Rühm</th>
            <th scope="col">E - POSTIAADRESS</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Kerstin</td>
            <td>Tuulepai rühma esindaja</td>
            <td>kerstinsireli@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Margit</td>
            <td>Tähepai rühma esindaja</td>
            <td>margitmeikup@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Karmo</td>
            <td>Vihmapai rühma esindaja</td>
            <td>karmo.kirspuu@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Ketlin</td>
            <td>Pilvepai rühma esindaja</td>
            <td>ketlinsalla87@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Aira</td>
            <td>Päikesepai rühma esindaja</td>
            <td>airatyrk@hot.ee</td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>Moonika</td>
            <td>Vikerkaarepai rühma esindaja</td>
            <td>moonika.troost@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">7</th>
            <td>Gerli</td>
            <td>Päevalill rühma esindaja</td>
            <td>gerlilihvar@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">8</th>
            <td>Anne-Marie</td>
            <td>Sinilill rühma esindaja</td>
            <td>anne.maria.oksmann@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">9</th>
            <td>Estelle</td>
            <td>Rukkilill rühma esindaja</td>
            <td>estellepeetri@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">10</th>
            <td>Liis K</td>
            <td>Saialill rühma esindaja</td>
            <td>liiskitsing@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">11</th>
            <td>Annika</td>
            <td>Võilill rühma esindaja</td>
            <td>annika.25@hotmail.com</td>
          </tr>
          <tr>
            <th scope="row">12</th>
            <td>Kersti</td>
            <td>Meelespea rühma esindaja</td>
            <td>kerstik23@hot.ee</td>
          </tr>
          <tr>
            <th scope="row">13</th>
            <td>Jane</td>
            <td>Kaeralille rühma esindaja</td>
            <td>jane.k6nno@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">14</th>
            <td>Moonika</td>
            <td>Kullapai maja õpetajate esindaja</td>
            <td>moonika.venepailasteaed.ee</td>
          </tr>
          <tr>
            <th scope="row">15</th>
            <td>Annika</td>
            <td>Lillepai maja õpetajate esindaja</td>
            <td>Annika.Paltsmar@pailasteaed.ee</td>
          </tr>
        </tbody>
      </table>
    </div>

    <FooterView />
  </div>
</template>

<script scoped>
export default {
  name: 'TrusteesView',

  data() {
    return {};
  },
};
</script>

<style scoped>
/* two links  */
.main-contact-wrapper {
  display: flex;
  align-items: center;
  padding-top: 100px;
  justify-content: center;
}
@media screen and (max-width: 425px) {
  .main-contact-personal {
    margin-bottom: 30px;
  }
  .main-contact-wrapper {
    flex-direction: column;
  }
}
.main-contact-personal button {
  font-size: 30px;
  border: none;
  border-radius: 9px;
  padding: 9px;
  font-weight: bold;
  background-color: aliceblue;
  color: rgb(39, 39, 39);
}
.main-contact-personal button:hover {
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
.contact-Hoolekogu button {
  font-size: 30px;
  background-color: aliceblue;
  border: none;
  border-radius: 9px;
  padding: 9px;
  font-weight: bold;
  margin-left: 9px;
  color: rgb(39, 39, 39);
}
.contact-Hoolekogu button:hover {
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
.table-margin-top {
  margin: 100px 0px 100px 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: url('./../photos/background-2.webp');
  background-size: cover;
  overflow-x: auto;
}
table {
  border-collapse: collapse;
  font-size: 1rem;
}
@media screen and (max-width: 750px) {
  .table-margin-top {
    display: block;
  }
  table {
    width: 100%;
  }
  .table-margin-top {
    background-image: none;
  }
}
thead {
  background-color: rgb(39, 39, 39);
  color: #fff;
}
th,
td {
  padding: 10px 16px;
  white-space: nowrap;
}
tbody tr:nth-child(odd) {
  background-color: #f8f9fa;
}
tbody tr:nth-child(even) {
  background-color: #e9ecef;
}
</style>
