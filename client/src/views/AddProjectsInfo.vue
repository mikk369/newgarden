<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <form
        class="form-info"
        @submit.prevent="addProject"
        enctype="multipart/form-data">
        <h1>Lisa projekt</h1>
        <div class="form-group">
          <label class="input-label" for="image">Image</label>
          <input
            class="image-input"
            type="file"
            name="image"
            show-size
            accept="image/png, image/jpg, image/webp"
            @change="selectFile" />
        </div>
        <input
          class="form-title"
          type="text"
          name="name"
          placeholder="Projekti pealkiri"
          v-model="name" />
        <textarea
          class="form-textarea"
          type="text"
          name="Ametinimetus"
          placeholder="Projekti Kirjeldus"
          v-model="project_content"></textarea>
        <button class="form-button">Lisa projekt</button>
      </form>
      <section>
        <h1>Lisatud projektid</h1>
        <ul class="all-added-posts">
          <li
            class="added-post"
            v-for="projects in reversedPosts"
            :key="projects.id">
            <div class="post-content">{{ projects.name }}</div>
            <div class="post-actions">
              <button @click="editPost(post)" class="edit-button">Muuda</button>
              <button @click="deletePost(post.id)" class="delete-button">
                Kustuta
              </button>
            </div>
          </li>
        </ul>
      </section>
    </main>
  </div>
</template>

<script>
import axios from 'axios';
import SideBar from '../components/SideBar.vue';
import config from './../config.js';

export default {
  name: 'AddProjectsInfo',
  components: {
    SideBar,
  },
  data() {
    return {
      projects: [],
      name: '',
      project_content: '',
    };
  },
  async created() {
    await this.fetchProjects();
  },
  computed: {
    // So new post will be top
    reversedPosts() {
      return this.projects.slice().reverse();
    },
  },
  methods: {
    async fetchProjects() {
      try {
        const response = await axios.get(
          `${config.baseUrlApi}/projects/get_allProjects.php`,
          {
            // withCredentials: true,
          }
        );
        this.projects = response.data;
      } catch (error) {
        console.log(error);
      }
    },
    async addProject() {
      try {
        const formData = new FormData();
        formData.append('name', this.name);
        formData.append('project_content', this.project_content);

        await axios.post(
          `${config.baseUrlApi}/projects/add_projects.php`,
          formData
        );
        this.name = '';
        this.project_content = '';
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
.form-info {
  display: flex;
  flex-direction: column;
  width: 100%;
  gap: 1.5rem;
  justify-content: center;
  align-items: center;
  background-color: aliceblue;
  border: 1px solid #ddd;
  border-radius: 9px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 9px;
  margin-bottom: 50px;
}

.image-input {
  margin-bottom: 1.5rem;
}
.form-input {
  margin-bottom: 1.5rem;
}

.form-title {
  padding: 0.8rem;
  width: 50%;
  border-radius: 9px;
}

.form-textarea {
  height: 10rem;
  width: 50%;
  padding: 0.8rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 9px;
  outline: none;
  resize: none;
}
.form-button {
  padding: 0.8rem 1.5rem;
  background-color: #28a745;
  color: rgb(0, 0, 0);
  border: none;
  border-radius: 9px;
  cursor: pointer;
  font-size: 1rem;
}
.form-button:hover {
  background-color: #1c8334;
}

/* ADDED PROJECTS LIST  */
section {
  margin-top: 20px;
}
h1 {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.all-added-posts {
  list-style-type: none;
  padding: 0;
}

.added-post {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border: 1px solid #ddd;
  padding: 10px;
  margin-bottom: 10px;
  background-color: #f9f9f9;
}

.post-content {
  flex-grow: 1;
}

.post-actions {
  display: flex;
  gap: 10px;
}

.edit-button,
.save-btn {
  padding: 5px 10px;
  font-size: 0.8rem;
  cursor: pointer;
  border: none;
  background-color: #3490dc;
  color: #fff;
  border-radius: 9px;
}
.delete-button,
.close-btn {
  padding: 5px 10px;
  font-size: 0.8rem;
  cursor: pointer;
  border: none;
  background-color: orangered;
  color: #fff;
  border-radius: 9px;
}
.edit-button:hover,
.save-btn:hover {
  background-color: #2779bd;
}
.delete-button:hover,
.close-btn:hover {
  background-color: rgb(235, 63, 1);
}
</style>
