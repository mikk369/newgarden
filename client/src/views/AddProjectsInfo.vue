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
            v-model="project_content" ></textarea>
        <button class="form-button">Lisa projekt</button>
      </form>
    </main>
  </div>
</template>

<script>
import axios from 'axios';
import SideBar from '../components/SideBar.vue';

export default {
  name: 'AddProjectsInfo',
  components: {
    SideBar,
  },
  data() {
    return {
      name: "",
      project_content: "",
    };
  },
  methods:{
   async addProject(){
      try {
        const formData = new FormData();
        formData.append('name', this.name);
        formData.append('project_content', this.project_content);
        
        await axios.post(
          'http://localhost:8000/api/projects/add_projects.php',
          formData
        );
        this.name = '';
        this.project_content = ''; 
      } catch (error) {
        console.log(error);
      }
    }
  }

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
</style>
