<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <div class="main-wrapper">
        <div class="form-wrapper">
          <form class="form-class" @submit.prevent="register">
            <div class="form-class-wrapper">
              <label for="exampleInputEmail1" class="form-label">Email </label>
              <input
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                v-model="email"
                name="email" />
              <label for="exampleInputPassword1" class="form-label"
                >Salasõna</label
              >
              <input
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                v-model="password"
                name="password" />
              <button type="submit" class="submit-btn">Loo konto</button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import axios from 'axios';
import SideBar from '../components/SideBar.vue';
import config from './../config.js';

export default {
  name: 'seaded',
  components: {
    SideBar,
  },
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    async register() {
      try {
        axios.post(`${config.baseUrlApi}api/users/register.php`, {
          email: this.email,
          password: this.password,
        });
        this.email = '';
        this.password = '';
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style>
main {
  background-color: var(--color-grey-50);
  padding: 4rem 4.8rem 6.4rem;
}

.grid-container {
  display: grid;
  grid-template-columns: 20rem 1fr;
  grid-template-rows: auto 1fr;
  height: 100vh;
}
/* LOGIN FORM  */

.form-wrapper {
  width: 100%;
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0px 1px 3px 0px #363636;
  padding: 20px;
}

.form-class {
  display: flex;
  flex-direction: column;
  gap: 15px;
  padding: 1rem;
}

.form-class-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
}

.form-label {
  font-weight: bold;
  margin: 5px 0px 5px 0px;
  color: #333;
}

.form-control {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.submit-btn {
  padding: 5px 10px;
  font-size: 0.8rem;
  cursor: pointer;
  border: none;
  background-color: #3490dc;
  color: #fff;
  border-radius: 6px;
  width: 20%;
}

.submit-btn:hover {
  background-color: #2779bd;
}
</style>
