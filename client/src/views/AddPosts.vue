<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <h1>Add Posts</h1>
      <form class="input-form" @submit.prevent="addPost">
        <input type="text" class="form-title" placeholder="Pealkiri" v-model="title" />
        <textarea
          name="content"
          id="content"
          class="form-textarea"
          placeholder="Tekst"
          v-model="content"></textarea>
        <button class="form-button">Sisesta</button>
      </form>
    </main>
  </div>
</template>

<script>
import axios from 'axios';
import SideBar from '../components/SideBar.vue';

export default {
  name: 'AddPosts',
  components: {
    SideBar,
  },
  data() {
    return {
      title: '',
      content: '',
    };
  },
  methods: {
    async addPost() {
      try {
        const formData = new FormData();
        formData.append('title', this.title);
        formData.append('content', this.content);

        await axios.post('http://localhost:8000/api/add_posts.php', formData);
        console.log('Post added');

        this.title = '';
        this.content = '';
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
.input-form {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}
.form-title {
  padding: 0.8rem;
}
.form-textarea {
  height: 100px; /* Set the desired height */
  width: 100%; /* Set the desired width */
  padding: 0.8rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 4px;
  outline: none;
  resize: none; /* Disable resizing */
}

.form-button {
  padding: 0.8rem 1.5rem;
  background-color: var(--color-grey-300);
  color: rgb(0, 0, 0);
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 1rem;
}

.form-button:hover {
  background-color: var(--color-grey-200);
}
</style>
