<template>
  <div class="main-wrapper">
    <div class="form-wrapper">
      <form class="form-class" @submit.prevent="submitLogin">
        <div class="form-class-wrapper">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input
            type="text"
            class="form-control"
            id="exampleInputEmail1"
            v-model="email" />
          <label for="exampleInputPassword1" class="form-label">Salasõna</label>
          <input
            type="password"
            class="form-control"
            id="exampleInputPassword1"
            v-model="password" />
          <button type="submit" class="submit-btn">Login</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import config from './../config.js';

export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    async submitLogin() {
      try {
        const response = await axios.post(
          `${config.baseUrlApi}/users/login.php`,
          {
            email: this.email,
            password: this.password,
          },
          { withCredentials: true }
        );

        if (response.data.success) {
          this.$router.push('/admin');
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
<style scoped>
.main-wrapper {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #f8f9fa;
}

.form-wrapper {
  width: 300px;
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
  width: 50%;
}

.submit-btn:hover {
  background-color: #2779bd;
}
</style>
