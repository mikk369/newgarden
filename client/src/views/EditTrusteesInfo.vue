<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <h1>Hoolekogu</h1>
    </main>
  </div>
</template>

<script>
import SideBar from '../components/SideBar.vue';

export default {
  name: 'EditTrusteesInfo',
  components: {
    SideBar,
  },
  data() {
    return {};
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
</style>
