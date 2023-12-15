<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <form
        class="edit-contact-info"
        @submit.prevent="addContact"
        enctype="multipart/form-data">
        <h1 class="form-heading">Lisa kontakt</h1>
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
        <div class="edit-contact-form-group">
          <input
            class="edit-contact-input-class"
            type="text"
            name="name"
            placeholder="Nimi"
            v-model="name" />
        </div>
        <div class="edit-contact-form-group">
          <input
            class="edit-contact-input-class"
            type="text"
            name="Ametinimetus"
            placeholder="Ametinimetus"
            v-model="jobTitle" />
        </div>
        <div class="edit-contact-form-group">
          <input
            class="edit-contact-input-class"
            type="text"
            name="Telefon 1"
            placeholder="Telefon 1"
            v-model="phone_1" />
        </div>
        <div class="edit-contact-form-group">
          <input
            class="edit-contact-input-class"
            type="text"
            name="Telefon 2"
            placeholder="Telefon 2"
            v-model="phone_2" />
        </div>
        <div class="edit-contact-form-group">
          <input
            class="edit-contact-input-class"
            type="text"
            name="Email"
            placeholder="Email"
            v-model="email" />
        </div>
        <button class="form-button">Lisa kontakt</button>
      </form>
      <section>
        <h1>Lisatud kontaktid</h1>
        <ul class="all-added-posts">
          <li class="added-post" v-for="contact in contacts" :key="contact.id">
            <div class="post-content">{{ contact.name }}</div>
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

export default {
  name: 'AddContactInfo',
  components: {
    SideBar,
  },
  data() {
    return {
      contacts: [],
      id: '',
      image: '',
      name: '',
      jobTitle: '',
      phone_1: '',
      phone_2: '',
      email: '',
      isModalVisible: false,
    };
  },
  async created() {
    await this.fetchContacts();
  },
  methods: {
    selectFile(event) {
      this.image = event.target.files[0];
    },
    async addContact() {
      try {
        const formData = new FormData();
        formData.append('image', this.image);
        formData.append('name', this.name);
        formData.append('jobTitle', this.jobTitle);
        formData.append('phone_1', this.phone_1);
        formData.append('phone_2', this.phone_2);
        formData.append('email', this.email);

        await axios.post(
          'http://localhost:8000/api/contacts/add_contacts.php',
          formData
        );
        this.image = '';
        this.name = '';
        this.jobTitle = '';
        this.phone_1 = '';
        this.phone_2 = '';
        this.email = '';
      } catch (error) {
        console.log(error);
      }
    },
    async fetchContacts() {
      try {
        const response = await axios.get(
          'http://localhost:8000/api/contacts/get_allContacts.php'
        );
        this.contacts = response.data;
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
.edit-contact-info {
  justify-content: center;
  align-items: center;
  display: flex;
  flex-direction: column;
}
.grid-container {
  display: grid;
  grid-template-columns: 20rem 1fr;
  grid-template-rows: auto 1fr;
  height: 100vh;
}
.form-heading {
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 1rem;
}
.image-input {
  margin-bottom: 1.5rem;
}
.edit-contact-form-group {
  margin-bottom: 1.5rem;
}

.edit-contact-input-class {
  width: 100%;
  padding: 0.5rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 4px;
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

/* added contacts list  */
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
