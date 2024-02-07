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
      <div class="card" v-for="group in groups" :key="group.id">
        <img
          class="contact-card-image"
          src="./../photos/pailasteaed.jpg"
          alt="Jane"
          style="max-width: 100%" />
        <div class="lower-card">
          <h3>{{ group.group_name }}</h3>
          <div v-for="profession in group.professions" :key="group.id">
            <p v-if="profession.teacher_1">
              Õpetaja: {{ profession.teacher_1 }}
            </p>
            <p v-if="profession.teacher_2">
              Õpetaja: {{ profession.teacher_2 }}
            </p>
            <p v-if="profession.assistant_teacher">
              Õpetaja abi: {{ profession.assistant_teacher }}
            </p>
            <p v-if="profession.assistant">
              Assistent: {{ profession.assistant }}
            </p>
            <p v-if="profession.special_teacher">
              Eripedagoog: {{ profession.special_teacher }}
            </p>
          </div>
          <p>Telefon: {{ group.phone }}</p>
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<script>
import axios from 'axios';
import config from './../config.js';

export default {
  name: 'ContactView',
  data() {
    return {
      groups: [],
    };
  },
  async created() {
    await this.fetchGroups();
  },
  methods: {
    async fetchGroups() {
      try {
        const response = await axios.get(
          `${config.baseUrlApi}/groups/get_allGroups.php`
        );
        this.groups = response.data;
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style scoped>
.card-area {
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
  border-radius: 9px;
}
.card img {
  margin-bottom: 20px;
}
.lower-card {
  text-align: center;
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
