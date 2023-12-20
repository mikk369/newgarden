<template>
  <nav>
    <ul class="nav-list">
      <li class="side-nav-links">
        <router-link class="link-color-second" to="/admin"> Home</router-link>
      </li>
      <li class="side-nav-links">
        <router-link class="link-color-second" to="/lisapostitus"
          >Postitused</router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link class="link-color-second" to="/kontaktideinfo"
          >Kontaktid</router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link class="link-color-second" to="/hoolekoguinfo"
          >Hoolekogu</router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link class="link-color-second" to="/ruhmadeinfo"
          >Rühmad</router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link class="link-color-second" to="/projektideinfo"
          >Projektid</router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link class="link-color-second" to="/dokumentideinfo"
          >Dokumendid</router-link
        >
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: 'MainNav',
  data() {
    return {};
  },
};
</script>

<style>
.link-color-second {
  color: rgb(39, 39, 39);
}
.nav-list {
  display: flex;
  flex-direction: column;
  gap: 0.8rem;
}
.side-nav-links,
:link,
:visited {
  display: flex;
  align-items: center;
  gap: 1.2rem;
  font-size: 1.2rem;
  font-weight: 500;
  padding: 0.8rem 2rem;
  transition: all 0.3s;
  text-decoration: none;
}

.side-nav-links :hover,
.active:link,
.active:visited {
  background-color: aliceblue;
  border-radius: 9px;
}
</style>
