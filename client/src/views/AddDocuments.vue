<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <form
        class="form-info"
        @submit.prevent="addDocument"
        enctype="multipart/form-data">
        <h1>Lisa Dokument</h1>
        <input
          type="text"
          class="form-title"
          placeholder="Dokumendi pealkiri"
          v-model="title" />
        <label v-if="selectedOption === 'fail'" class="input-label" for="image"
          >Valige fail</label
        >
        <input
          v-if="selectedOption === 'fail'"
          class="document-input"
          type="file"
          name="file"
          show-size
          accept="application/pdf, application/msword, 
            application/vnd.openxmlformats-officedocument.wordprocessingml.document, 
            application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
          @change="selectFile" />
        <input
          v-if="selectedOption === 'link'"
          type="text"
          class="form-title"
          placeholder="Lehe URL"
          v-model="link" />
        <div class="radio-wrapper">
          <label for="fail">Fail</label>
          <RadioButton v-model="selectedOption" value="fail" inputId="fail" />
          <label for="link">Link</label>
          <RadioButton v-model="selectedOption" value="link" inputId="link" />
        </div>
        <button class="form-button">Lisa dokument</button>
      </form>
      <section>
        <h1>Lisatud dokumendid</h1>
        <ul class="added-list-items">
          <li
            class="list-items"
            v-for="document in documents"
            :key="document.id">
            <div class="list-content">{{ document.title }}</div>
            <div class="list-actions">
              <button
                @click="deleteDocument(document.id)"
                class="delete-button">
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
import RadioButton from 'primevue/radiobutton';
const apiUrl = import.meta.env.VITE_API_BASE_URL;

export default {
  name: 'AddDocuments',
  components: {
    SideBar,
    RadioButton,
  },
  data() {
    return {
      documents: [],
      title: '',
      link: '',
      file: '',
      selectedOption: '',
    };
  },
  async created() {
    await this.fetchDocuments();
  },
  methods: {
    selectFile(event) {
      this.file = event.target.files[0];
    },
    async addDocument() {
      try {
        const formData = new FormData();
        formData.append('title', this.title);

        // check if there is one or other
        if (this.file) {
          formData.append('file', this.file);
        } else if (this.link) {
          formData.append('link', this.link);
        }

        await axios.post(`${apiUrl}/documents/add_documents.php`, formData);
        this.title = '';
        this.link = '';
        this.file = '';
      } catch (error) {
        console.log(error);
      }
    },
    async fetchDocuments() {
      try {
        const response = await axios.get(
          `${apiUrl}/documents/get_allDocuments.php`
        );
        this.documents = response.data;
      } catch (error) {
        console.log(error);
      }
    },
    async deleteDocument(documentId) {
      try {
        await axios.delete(
          `${apiUrl}/documents/delete_document.php?id=${documentId}`
        );
        await this.fetchDocuments();
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

/* FORM  */
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
  padding: 3rem 0 3rem 0;
  margin-bottom: 50px;
}
.form-title {
  padding: 0.8rem;
  width: 50%;
  border-radius: 9px;
}
.radio-wrapper {
  display: flex;
  justify-content: space-between;
  width: 9rem;
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

.list-content {
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
</style>
