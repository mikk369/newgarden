<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <div class="admin-dashboard">
        <div class="dashboard-card">
          <h2>Postitusi</h2>
          <p>{{ posts.length }}</p>
        </div>
        <div class="dashboard-card">
          <h2>Kontaktid</h2>
          <p>{{ contacts.length }}</p>
        </div>
        <div class="dashboard-card">
          <h2>Rühmad</h2>
          <p>{{ groups.length }}</p>
        </div>
        <div class="dashboard-card">
          <h2>Dokumendid</h2>
          <p>{{ documents.length }}</p>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import axios from 'axios';
import SideBar from '../components/SideBar.vue';

export default {
  name: 'AdminView',
  components: {
    SideBar,
  },
  data() {
    return {
      posts: [],
      contacts: [],
      groups: [],
      documents: [],
    };
  },
  async created() {
    await this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        const [postsResponse, contactsResponse, groupsResponse, documentsResponse] = await Promise.all([
          axios.get('http://localhost:8000/api/posts/get_allPosts.php'),
          axios.get('http://localhost:8000/api/contacts/get_allContacts.php'),
          axios.get('http://localhost:8000/api/groups/get_allGroups.php'),
          axios.get('http://localhost:8000/api/documents/get_allDocuments.php'),
        ]);

        this.posts = postsResponse.data;
        this.contacts = contactsResponse.data;
        this.groups = groupsResponse.data;
        this.documents = documentsResponse.data;
      } catch (error) {
        console.log(error);
      }
    },
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
