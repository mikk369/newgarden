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
  /* background-color: #fff; */
  padding: 3.2rem 2.4rem;
  border-right: 1px solid aliceblue;
  grid-row: 1 / -1;
}
</style>
