<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <form class="add-post-input-form" @submit.prevent="addPost">
        <h1>Lisa postitus</h1>
        <input type="text" class="add-post-form-title" placeholder="Pealkiri" v-model="title" />
        <textarea
          name="content"
          id="content"
          class="add-post-form-textarea"
          placeholder="Tekst"
          v-model="content"></textarea>
        <button class="form-button">Lisa postitus</button>
      </form>
      <section>
        <h1>Lisatud postitused</h1>
        <ul class="all-added-posts">
          <li class="added-post" v-for="post in posts" :key="post.id">
            <div class="post-content">{{ post.title }}</div>
            <div class="post-actions">
              <button @click="editPost(post.id)" class="edit-button">Muuda</button>
              <button @click="deletePost(post.id)" class="delete-button">Kustuta</button>
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

export default {
  name: 'AddPosts',
  components: {
    SideBar,
  },
  data() {
    return {
      posts: [],
      title: '',
      content: '',
    };
  },
  async created() {
    await this.fetchPosts();
  },
  methods: {
    async fetchPosts() {
      try {
        const response = await axios.get('http://localhost:8000/api/get_allPosts.php', {
          // withCredentials: true,
        });
        this.posts = response.data;
      } catch (error) {
        console.log(error);
      }
    },
    async addPost() {
      try {
        const formData = new FormData();
        formData.append('title', this.title);
        formData.append('content', this.content);

        await axios.post('http://localhost:8000/api/add_posts.php', formData);
        // fetch posts after new post is added so list is updated
        await this.fetchPosts();

        this.title = '';
        this.content = '';
      } catch (error) {
        console.log(error);
      }
    },
    async deletePost(postId) {
      try {
        await axios.delete(`http://localhost:8000/api/delete_post.php?id=${postId}`);
        await this.fetchPosts();
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
.add-post-input-form {
  display: flex;
  flex-direction: column;
  width: 100%;
  gap: 1.5rem;
  justify-content: center;
  align-items: center;
}
.add-post-form-title {
  padding: 0.8rem;
  width: 50%;
}
.add-post-form-textarea {
  height: 10rem;
  width: 50%;
  padding: 0.8rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 4px;
  outline: none;
  resize: none;
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

.edit-button {
  padding: 5px 10px;
  font-size: 0.8rem;
  cursor: pointer;
  border: none;
  background-color: #3490dc;
  color: #fff;
}
.delete-button {
  padding: 5px 10px;
  font-size: 0.8rem;
  cursor: pointer;
  border: none;
  background-color: orangered;
  color: #fff;
}
.edit-button:hover {
  background-color: #2779bd;
}
.delete-button:hover {
  background-color: rgb(235, 63, 1);
}
</style>
