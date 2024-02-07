<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <form
        class="form-info"
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
        <ul class="added-list-items">
          <li class="list-items" v-for="contact in contacts" :key="contact.id">
            <div class="list-content">{{ contact.name }}</div>
            <div class="list-actions">
              <button @click="editContact(contact)" class="edit-button">
                Muuda
              </button>
              <button @click="deleteContact(contact.id)" class="delete-button">
                Kustuta
              </button>
            </div>
          </li>
        </ul>
      </section>
      <!-- Modal for editing a contact -->
      <div v-if="isModalVisible" class="modal">
        <div class="modal-wrapper">
          <h2>Muuda kontakti</h2>
          <form>
            <input
              class="image-input"
              type="file"
              name="image"
              show-size
              accept="image/png, image/jpg, image/webp"
              @change="selectFile" />
            <!-- <div class="preview-img-wrapper">
                <img
                class="image-preview"
                :src="editImage"
                alt="Preview"
                 />
              </div> -->
            <input
              type="text"
              v-model="editName"
              id="name"
              placeholder="Nimi" />
            <input
              type="text"
              v-model="editJobtitle"
              id="jobTitle"
              placeholder="Ametinimetus" />
            <input
              type="text"
              v-model="editPhone_1"
              id="name"
              placeholder="Telefon 1" />
            <input
              type="text"
              v-model="editPhone_2"
              id="name"
              placeholder="Telefon 2" />
            <input
              type="text"
              v-model="editEmail"
              id="name"
              placeholder="Email" />
            <button class="save-btn" @click.prevent="updateContact()">
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
import config from './../config.js';

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
      editImage: '',
      editName: '',
      editJobtitle: '',
      editPhone_1: '',
      editPhone_2: '',
      editEmail: '',
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
          `${config.baseUrlApi}/contacts/add_contacts.php`,
          formData
        );
        this.image = '';
        this.name = '';
        this.jobTitle = '';
        this.phone_1 = '';
        this.phone_2 = '';
        this.email = '';

        await this.fetchContacts();
      } catch (error) {
        console.log(error);
      }
    },
    async fetchContacts() {
      try {
        const response = await axios.get(
          `${config.baseUrlApi}/contacts/get_allContacts.php`
        );
        this.contacts = response.data;
      } catch (error) {
        console.log(error);
      }
    },
    async deleteContact(contactId) {
      try {
        await axios.delete(
          `${config.baseUrlApi}/contacts/delete_contact.php?id=${contactId}`
        );
        await this.fetchContacts();
      } catch (error) {
        console.log(error);
      }
    },
    // Get data to modal
    editContact(contact) {
      this.isModalVisible = true;
      this.id = contact.id;
      this.editImage = contact.image;
      this.editName = contact.name;
      this.editJobtitle = contact.jobTitle;
      this.editPhone_1 = contact.phone_1;
      this.editPhone_2 = contact.phone_2;
      this.editEmail = contact.email;
    },
    async updateContact() {
      try {
        const formData = {
          id: this.id,
          image: this.editImage,
          name: this.editName,
          jobTitle: this.editJobtitle,
          phone_1: this.editPhone_1,
          phone_2: this.editPhone_2,
          email: this.editEmail,
        };
        await axios.patch(
          `${config.baseUrlApi}/contacts/update_contact.php?id=${this.id}`,
          formData
        );
        // fetch contacts after updating
        await this.fetchContacts();

        // close modal after update
        this.closeModal();
      } catch (error) {
        console.log(error);
      }
    },
    // Close the modal
    closeModal() {
      this.isModalVisible = false;
    },
  },
};
</script>

<style scoped>
main {
  background-color: var(--color-grey-50);
  padding: 4rem 4.8rem 6.4rem;
}
.form-info {
  justify-content: center;
  align-items: center;
  display: flex;
  flex-direction: column;
  background-color: aliceblue;
  border: 1px solid #ddd;
  border-radius: 9px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 3rem 0 3rem 0;
  margin-bottom: 50px;
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
  border-radius: 9px;
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

/* added contacts list  */
.added-list-items {
  list-style-type: none;
  padding: 0;
}

.list-items {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border: 1px solid #ddd;
  padding: 10px;
  margin-bottom: 10px;
  background-color: #f9f9f9;
}

.contact-content {
  flex-grow: 1;
}

.list-actions {
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

/* //MODAL\\ */
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
.image-preview {
  /* max-width: 100%; */
  max-height: 200px;
  width: 150px;
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
