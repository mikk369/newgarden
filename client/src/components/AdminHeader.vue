<template>
  <nav class="navbar">
    <img
      class="logo"
      src="./../photos/Paide_lasteaed_logo4.png"
      alt="PAIlasteaed logo" />
    <div class="nav-wrapper">
      <ul class="navbar-nav">
        <li class="nav-item">
          <i
            class="pi pi-power-off"
            style="font-size: 1rem"
            @click="Logout"></i>
        </li>
        <li class="nav-item">{{ userEmail }}</li>
      </ul>
    </div>
  </nav>
</template>

<script>
import axios from 'axios';
import config from './../config.js';

export default {
  name: 'AdminHeader',
  data() {
    return {
      userEmail: '',
    };
  },
  async created() {
    await this.loggedInUsername();
  },
  methods: {
    async loggedInUsername() {
      try {
        const response = await axios.get(
          `${config.baseUrlApi}/users/session.php`
        );
        console.log(response.data);
        // Check if the user is logged in
        if (response.data.loggedIn) {
          this.userEmail = response.data.email;
          console.log('User is logged in with email:', this.userEmail);
        } else {
          console.log('User is not logged in');
        }
      } catch (error) {
        // Handle error
        console.error('Error fetching session data:', error);
      }
    },
    async Logout() {
      try {
        const response = await axios.post(
          `${config.baseUrlApi}/users/logout.php`
        );
        if (response.data.success) {
          this.$router.push('/login');
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style scoped>
.navbar {
  display: flex;
  align-items: center;
  flex-direction: row-reverse;
  background-color: aliceblue;
  padding: 9px 16px 9px 16px;
  height: 3rem;
}

.navbar-nav {
  display: flex;
  gap: 1rem;
}
.nav-item {
  display: flex;
  list-style: none;
  align-items: center;
  margin-right: 0.3rem;
}
.pi.pi-power-off {
  cursor: pointer;
}
.logo {
  height: 35px;
  width: 35px;
  border-radius: 50%;
}
</style>
