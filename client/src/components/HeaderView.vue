<template>
  <div class="header-view">
    <nav class="navbar navbar-expand-lg navbar-light navbar-text-color">
      <img
        class="logo"
        src="./../photos/Paide_lasteaed_logo4.png"
        alt="PAIlasteaed logo" />
      <div
        class="navbar-toggle"
        @click="toggleMenu"
        :class="{ 'is-active': showX }">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
      <div class="nav-wrapper">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="link-color-one" href="/">Avaleht</a>
          </li>
          <li class="nav-item">
            <a class="link-color-one" href="/kontaktid">Kontaktid</a>
          </li>
          <li class="nav-item">
            <a class="link-color-one" href="/ruhmad">Rühmad</a>
          </li>
          <li class="nav-item">
            <a class="link-color-one" href="/projektid">Projektid</a>
          </li>
          <li class="nav-item">
            <a class="link-color-one" href="/dokumendid">Dokumendid</a>
          </li>
          <li class="nav-item active">
            <a class="link-color-one" href="/ajalugu">Ajalugu</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  data() {
    return {
      show: false,
      showX: false,
    };
  },
  computed: {
    navWrapperClass() {
      return this.show ? 'show' : '';
    },
  },
  methods: {
    toggleMenu() {
      this.show = !this.show;
      this.showX = !this.showX;
      if (this.show) {
        document.querySelector('.nav-wrapper').classList.add('show');
      } else {
        document.querySelector('.nav-wrapper').classList.remove('show');
      }
    },
  },
};
</script>
<style scoped>
@media only screen and (min-width: 1200px) {
  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 9px 16px 9px 16px;
  }
}
.navbar-toggle {
  display: none;
}
@media only screen and (max-width: 1200px) {
  .navbar-toggle {
    display: block;
    position: absolute;
    top: 16px;
    right: 16px;
  }
  .navbar {
    padding: 9px 16px 9px 16px;
  }
  .nav-wrapper {
    display: none;
    transition: top 0.3s ease-in-out;
  }
  .navbar-nav {
    display: flex;
    align-items: center;
    padding: 20px;
    flex-direction: column;
    line-height: 3.5rem;
  }
}
.nav-wrapper.show {
  display: block;
}
.navbar-nav a {
  text-decoration: none;
  font-size: 29px;
  font-weight: 600;
  padding: 9px;
}
.navbar-nav {
  display: flex;
  list-style: none;
}

.link-color-one {
  color: rgb(39, 39, 39);
}
.header-view {
  background-color: aliceblue;
}

.navbar-toggle .bar {
  width: 20px;
  height: 3px;
  margin: 3px auto;
  transition: all 0.3s ease-in-out;
  background-color: #3a3d57;
  display: block;
  cursor: pointer;
}
.navbar-toggle.is-active .bar:nth-child(2) {
  opacity: 0;
}
.navbar-toggle.is-active .bar:nth-child(1) {
  transform: translateY(5px) rotate(45deg);
}
.navbar-toggle.is-active .bar:nth-child(3) {
  transform: translateY(-7px) rotate(-45deg);
}
</style>
