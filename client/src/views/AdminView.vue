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
      <section>
        <h1>Lisatud rühmad</h1>
        <!-- DataTable section -->
        <DataTable
          v-model:expandedRows="expandedRows"
          :value="groups"
          dataKey="id">
          <!-- DataTable columns -->
          <Column expander style="width: 5rem" />
          <Column field="group_name" header="Rühma nimi"></Column>
          <Column field="phone" header="Telefon"></Column>
          <!-- Expansion template -->
          <template #expansion="slotProps">
            <div class="p-3">
              <h5>{{ slotProps.data.group_name }} töötajad</h5>
              <DataTable :value="slotProps.data.professions">
                <!-- Professions columns -->
                <Column
                  field="teacher_1"
                  header="Õpetaja"
                  v-if="slotProps.data.professions[0].teacher_1"></Column>
                <Column
                  field="teacher_2"
                  header="Õpetaja"
                  v-if="slotProps.data.professions[0].teacher_2"></Column>
                <Column
                  field="assistant_teacher"
                  header="Õpetaja abi"
                  v-if="
                    slotProps.data.professions[0].assistant_teacher
                  "></Column>
                <Column
                  field="assistant"
                  header="Assistent"
                  v-if="slotProps.data.professions[0].assistant"></Column>
                <Column
                  field="special_teacher"
                  header="Eripedagoog"
                  v-if="slotProps.data.professions[0].special_teacher"></Column>
                <!-- Add other columns for professions as needed -->
              </DataTable>
            </div>
          </template>
        </DataTable>
      </section>
    </main>
  </div>
</template>

<script>
import Column from 'primevue/column';
import DataTable from 'primevue/datatable';
import axios from 'axios';
import SideBar from '../components/SideBar.vue';
const apiUrl = import.meta.env.VITE_API_BASE_URL;

export default {
  name: 'AdminView',
  components: {
    SideBar,
    DataTable,
    Column,
  },
  data() {
    return {
      posts: [],
      contacts: [],
      groups: [],
      documents: [],
      expandedRows: [],
    };
  },
  async created() {
    await this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        const [
          postsResponse,
          contactsResponse,
          groupsResponse,
          documentsResponse,
        ] = await Promise.all([
          axios.get(`${apiUrl}/posts/get_allPosts.php`),
          axios.get(`${apiUrl}/contacts/get_allContacts.php`),
          axios.get(`${apiUrl}/groups/get_allGroups.php`),
          axios.get(`${apiUrl}/documents/get_allDocuments.php`),
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
