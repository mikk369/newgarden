<template>
  <AdminHeader />
  <aside>
    <MainNav />
  </aside>
</template>

<script>
import AdminHeader from './AdminHeader.vue';
import MainNav from './MainNav.vue';
export default {
  name: 'AdminView',
  components: {
    MainNav,
    AdminHeader,
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
  overflow: hidden;
  grid-row: 1 / -1;
  background-color: aliceblue;
  border-right: 1px solid var(--color-grey-100);
}
</style>
