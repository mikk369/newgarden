<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <form class="add-post-input-form" @submit.prevent="addPost">
        <h1>Lisa postitus</h1>
        <input
          type="text"
          class="add-post-form-title"
          placeholder="Pealkiri"
          v-model="title" />
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
          <li class="added-post" v-for="post in reversedPosts" :key="post.id">
            <div class="post-content">{{ post.title }}</div>
            <div class="post-actions">
              <button @click="editPost(post)" class="edit-button">Muuda</button>
              <button @click="deletePost(post.id)" class="delete-button">
                Kustuta
              </button>
            </div>
          </li>
        </ul>
      </section>
      <!-- Modal for editing a post -->
      <div v-if="isModalVisible" class="modal">
        <div class="modal-wrapper">
          <h2>Muuda postitust</h2>
          <form>
            <input
              type="text"
              v-model="editTitle"
              id="title"
              placeholder="Pealkiri" />
            <textarea
              v-model="editContent"
              id="content"
              placeholder="Tekst"></textarea>
            <button class="save-btn" @click.prevent="updatePost()">
              Salvesta muudatused
            </button>
          </form>
          <button class="close-btn" @click="closeModal">Sulge</button>
        </div>
      </div>
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
      id: '',
      title: '',
      content: '',
      editTitle: '',
      editContent: '',
      isModalVisible: false,
    };
  },
  async created() {
    await this.fetchPosts();
  },
  computed: {
    // So new post will be top
    reversedPosts() {
      return this.posts.slice().reverse();
    },
  },
  methods: {
    async fetchPosts() {
      try {
        const response = await axios.get(
          'http://localhost:8000/api/posts/get_allPosts.php',
          {
            // withCredentials: true,
          }
        );
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

        await axios.post(
          'http://localhost:8000/api/posts/add_posts.php',
          formData
        );

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
        await axios.delete(
          `http://localhost:8000/api/posts/delete_post.php?id=${postId}`
        );
        await this.fetchPosts();
      } catch (error) {
        console.log(error);
      }
    },

    // Get data to modal
    editPost(post) {
      this.isModalVisible = true;
      this.id = post.id;
      this.editTitle = post.title;
      this.editContent = post.content;
    },

    // Update the post with the edited content
    async updatePost() {
      try {
        const formData = {
          id: this.id,
          title: this.editTitle,
          content: this.editContent,
        };
        await axios.patch(
          `http://localhost:8000/api/posts/update_post.php?id=${this.id}`,
          formData
        );

        // fetch posts after updating post so the list is updated
        await this.fetchPosts();

        // Close the modal after updating
        this.closeModal();
      } catch (error) {
        console.log(error);
      }
    },
    // Close the modal
    closeModal() {
      this.isModalVisible = false;
      this.title = '';
      this.content = '';
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
  border-radius: 9px;
  outline: none;
  resize: none;
}
.form-button {
  padding: 0.8rem 1.5rem;
  background-color: var(--color-grey-300);
  color: rgb(0, 0, 0);
  border: none;
  border-radius: 9px;
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

.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.modal-wrapper {
  background: white;
  padding: 20px;
  border-radius: 9px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  width: 80%;
  max-width: 400px;
  text-align: center;
}

.modal h2 {
  margin-bottom: 20px;
  font-size: 1.5rem;
  color: #333;
}

.modal form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.modal label {
  font-weight: bold;
}

.modal input,
.modal textarea,
.modal button {
  padding: 8px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 9px;
  width: 100%;
  box-sizing: border-box;
  resize: none;
}
</style>
