<template>
  <HeaderView />
  <div class="content-wrapper">
    <div class="heading">
      <h1>Projektid</h1>
    </div>
    <div class="card-grid">
      <div class="no-posts-div" v-if="projects.length === 0">
        <h3>Hetkel projekti puuduvad</h3>
      </div>
      <div class="paragraph-card" v-for="project in projects" :key="project.id">
        <router-link
          style="text-decoration: none"
          :to="{ params: { id: project.id }, name: 'project' }">
          <div class="cards">
            <h4>
              <b>{{ project.name }}</b>
            </h4>
            <p class="lower-paragraph">{{ project.project_content }}</p>
          </div>
        </router-link>
      </div>
    </div>
  </div>
  <FooterView />
</template>

<script>
import axios from 'axios';
const apiUrl = import.meta.env.VITE_API_BASE_URL;

export default {
  name: 'Projects',
  data() {
    return {
      projects: [],
    };
  },
  async created() {
    const response = await axios.get(
      `${apiUrl}api/projects/get_allProjects.php`
    );
    this.projects = response.data;
  },
};
</script>

<style>
.heading {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 30px;
}
.heading h1 {
  color: #000;
}

.card-grid {
  display: grid;
  padding: 60px 20px 60px 20px;
  grid-gap: 1rem;
  grid-template-columns: repeat(3, 1fr);
}
@media screen and (max-width: 950px) {
  .card-grid {
    grid-template-columns: 1fr;
  }
}
.no-posts-div {
  text-align: center;
  grid-column: 2;
  align-self: center;
}
.paragraph-card {
  white-space: normal;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  border-radius: 9px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin: 10px; /* Add margin for spacing between cards */
}

.cards {
  padding: 20px;
  color: #363636;
}

h4 {
  font-size: 18px;
  margin-bottom: 10px;
  text-align: center;
}

.lower-paragraph {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  text-align: center;
  font-size: 1rem;
  color: #555; /* Set the color as needed */
}

.content-wrapper {
  height: 85vh;
}
</style>
