<template>
  <nav>
    <ul class="nav-list">
      <li class="side-nav-links">
        <router-link
          class="link-color-second"
          to="/admin"
          :class="{ 'active-link': $route.path === '/admin' }">
          <i class="pi pi-home" style="font-size: 1.5rem"></i
          ><span>Pealeht</span></router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link
          class="link-color-second"
          to="/lisapostitus"
          :class="{ 'active-link': $route.path === '/lisapostitus' }">
          <i class="pi pi-envelope" style="font-size: 1.5rem"></i
          ><span>Postitused</span></router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link
          class="link-color-second"
          to="/kontaktideinfo"
          :class="{ 'active-link': $route.path === '/kontaktideinfo' }">
          <i class="pi pi-user-plus" style="font-size: 1.5rem"> </i
          ><span>Kontaktid</span></router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link
          class="link-color-second"
          to="/hoolekoguinfo"
          :class="{ 'active-link': $route.path === '/hoolekoguinfo' }">
          <i class="pi pi-table" style="font-size: 1.5rem"> </i
          ><span>Hoolekogu</span></router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link
          class="link-color-second"
          to="/ruhmadeinfo"
          :class="{ 'active-link': $route.path === '/ruhmadeinfo' }">
          <i class="pi pi-users" style="font-size: 1.5rem"> </i
          ><span>Rühmad</span></router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link
          class="link-color-second"
          to="/projektideinfo"
          :class="{ 'active-link': $route.path === '/projektideinfo' }">
          <i class="pi pi-book" style="font-size: 1.5rem"> </i
          ><span>Projektid</span></router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link
          class="link-color-second"
          to="/dokumentideinfo"
          :class="{ 'active-link': $route.path === '/dokumentideinfo' }">
          <i class="pi pi-file" style="font-size: 1.5rem"> </i
          ><span>Dokumendid</span></router-link
        >
      </li>
      <li class="side-nav-links">
        <router-link
          class="link-color-second"
          to="/seaded"
          :class="{ 'active-link': $route.path === '/seaded' }">
          <i class="pi pi-cog" style="font-size: 1.5rem"> </i
          ><span>Seaded</span></router-link
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
  border-radius: 5rempx;
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

.link-color-second:hover,
.active-link {
  background-color: rgb(223, 239, 252);
  border-radius: 9px;
}

.active-link i {
  color: #3498db;
}
</style>
