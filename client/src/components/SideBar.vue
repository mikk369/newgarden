<template>
  <HeaderView />
  <aside>
    <MainNav />
  </aside>
</template>

<script>
import MainNav from './MainNav.vue';
export default {
  name: 'AdminView',
  components: {
    MainNav,
  },
  data() {
    return {};
  },
};
</script>

<style>
aside {
  background-color: #fff;
  padding: 3.2rem 2.4rem;
  border: 1px solid aliceblue;
  border-top-right-radius: 3rem; /* Adjust as needed */
  border-bottom-right-radius: 3rem; /* Adjust as needed */
  overflow: hidden;
  grid-row: 1 / -1;
  background-color: aliceblue;
}
</style>
