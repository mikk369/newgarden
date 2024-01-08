<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <div class="admin-dashboard">
    <div class="dashboard-card">
      <h2>Total Posts</h2>
      <p>9</p>
    </div>

    <div class="dashboard-card">
      <h2>Total Contacts</h2>
      <p>39</p>
    </div>

    <div class="dashboard-card">
      <h2>Total Groups</h2>
      <p>14</p>
    </div>
  </div>
    </main>
  </div>
</template>

<script>
import SideBar from '../components/SideBar.vue';

export default {
  name: 'AdminView',
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
.admin-dashboard {
  display: flex;
  justify-content: space-around;
  margin: 20px;
}

.dashboard-card {
  background-color: aliceblue;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.dashboard-card h2 {
  margin-bottom: 10px;
  color: #363636;
}
</style>
