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
        <div class="card" v-for="contact in contacts" :key="contact.id">
          <img
            class="contact-card-image"
            :src="'http://localhost:8000/' + contact.image"
            alt="Jane"
            style="max-width: 100%" />
          <h3>{{ contact.name }}</h3>
          <p class="title">{{ contact.jobTitle }}</p>
          <p v-if="contact.phone_1">Telefon1: {{ contact.phone_1 }}</p>
          <p v-if="contact.phone_2">Telefon2: {{ contact.phone_2 }}</p>
          <p>{{ contact.email }}</p>
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<script scoped>
import axios from 'axios';
export default {
  name: 'ContactView',
  data() {
    return {
      contacts: [],
    };
  },
  async created() {
    const response = await axios.get(
      'http://localhost:8000/api/contacts/get_allContacts.php'
    );
    this.contacts = response.data;
  },
};
</script>

<style scoped>
.main-contact-container {
  display: flex;
  justify-content: center;
  padding-top: 100px;
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
  gap: 90px;
  padding: 100px 0px 100px 0px;
  justify-content: center;
  grid-template-columns: repeat(3, 1fr);
  background-image: url('./../photos/background-2.webp');
  background-size: cover;
}
/* sets margin top to card elements  */
.card {
  margin: auto;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 250px;
  width: 250px;
  text-align: center;
  background-color: #fff;
  line-height: 2rem;
}
/* changes grid to 2 column when screen size 770px */
@media screen and (max-width: 75rem) {
  .card-area {
    grid-template-columns: repeat(2, 1fr);
  }
}
/* changes grid to 1 column when screen size 770px */
@media screen and (max-width: 50rem) {
  .card-area {
    grid-template-columns: repeat(1, 1fr);
  }
}

/* card image upper corners rounded  */
.card img {
  border-radius: 3px 3px 0px 0px;
}
h3 {
  font-size: 1.75rem;
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
