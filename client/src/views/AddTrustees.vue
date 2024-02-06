<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <form class="add-trustee-input-trustees" @submit.prevent="addTrustees">
        <h1>Lisa hoolekogu liige</h1>
        <div
          v-for="(row, index) in rows"
          :key="index"
          class="input-wrapper-row">
          <div class="index">{{ index + 1 }}</div>
          <input
            type="text"
            class="add-trustee-form"
            placeholder="Nimi"
            v-model="row.name" />
          <input
            type="text"
            class="add-trustee-form"
            placeholder="Rühm"
            v-model="row.table_group_name" />
          <button class="delete-button" @click.prevent="removeRow(index)">
            X
          </button>
        </div>
        <button class="form-button" @click.prevent="addRow">Lisa rida</button>
        <button class="form-button submit-button">Lisa postitus</button>
      </form>
      <section>
        <h1>Hoolekogu nimekiri</h1>
        <ul class="all-added-trustee">
          <li
            class="added-trustee"
            v-for="trustee in trustees"
            :key="trustee.id">
            <div class="trustee-content">{{ trustee.name }}</div>
            <div class="trustee-content">{{ trustee.table_group_name }}</div>
            <div class="trustee-actions">
              <button @click="editTrustee(trustee)" class="edit-button">
                Muuda
              </button>
              <button @click="deleteTrustee(trustee.id)" class="delete-button">
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
              type="text"
              v-model="editName"
              id="name"
              placeholder="Nimi" />
            <input
              type="text"
              v-model="editTable_group_name"
              id="name"
              placeholder="Rühm" />
            <button class="save-btn" @click.prevent="updateTrustee()">
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
const apiUrl = import.meta.env.VITE_API_BASE_URL;

export default {
  name: 'EditTrusteesInfo',
  components: {
    SideBar,
  },
  data() {
    return {
      rows: [{ name: '', table_group_name: '' }],
      trustees: [],
      isModalVisible: false,
      id: '',
      name: '',
      table_group_name: '',
      editName: '',
      editTable_group_name: '',
    };
  },
  async created() {
    await this.fetchTrustees();
  },
  methods: {
    addRow() {
      this.rows.push({ name: '', table_group_name: '' });
    },
    removeRow(index) {
      this.rows.splice(index, 1);
    },

    async addTrustees() {
      try {
        const combinedFormData = new FormData();
        this.rows.forEach((row, index) => {
          combinedFormData.append(`trusteesData[${index}][name]`, row.name);
          combinedFormData.append(
            `trusteesData[${index}][table_group_name]`,
            row.table_group_name
          );
        });
        // Send the array of FormData objects to the server
        await axios.post(
          `${apiUrl}api/trustees/add_trustees.php`,
          combinedFormData
        );
        // Reset the name and table_group_name properties for each row
        this.rows.forEach((row) => {
          row.name = '';
          row.table_group_name = '';
        });
        await this.fetchTrustees();
      } catch (error) {
        console.error(error);
      }
    },
    async fetchTrustees() {
      try {
        const response = await axios.get(
          `${apiUrl}api/trustees/get_allTrustees.php`
        );
        this.trustees = response.data;
      } catch (error) {
        console.log(error);
      }
    },
    async deleteTrustee(trusteeId) {
      try {
        await axios.delete(
          `${apiUrl}api/trustees/delete_trustee.php?id=${trusteeId}`
        );
        await this.fetchTrustees();
      } catch (error) {
        console.log(error);
      }
    },
    // Get data to modal
    editTrustee(trustee) {
      this.isModalVisible = true;
      this.id = trustee.id;
      this.editName = trustee.name;
      this.editTable_group_name = trustee.table_group_name;
    },
    async updateTrustee() {
      try {
        const formData = {
          id: this.id,
          name: this.editName,
          table_group_name: this.editTable_group_name,
        };
        await axios.patch(
          `${apiUrl}/api/trustees/update_trustee.php?id=${this.id}`,
          formData
        );
        // fetch contacts after updating
        await this.fetchTrustees();

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

.grid-container {
  display: grid;
  grid-template-columns: 20rem 1fr;
  grid-template-rows: auto 1fr;
  height: 100vh;
}
/* //FORM */
.add-trustee-input-trustees {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: aliceblue;
  border: 1px solid #ddd;
  border-radius: 9px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-bottom: 50px;
}

h1 {
  font-size: 1.5rem;
  margin-bottom: 20px;
}
.index {
  font-weight: bold;
  margin-right: 10px;
}
.input-wrapper-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.add-trustee-form {
  width: calc(50% - 5px);
  padding: 10px;
  box-sizing: border-box;
  margin-right: 10px;
  border-radius: 9px;
}

.form-button {
  padding: 10px;
  background-color: #2779bd;
  color: #fff;
  border: none;
  border-radius: 9px;
  cursor: pointer;
  transition: background-color 0.3s;
}
.form-button:first-of-type {
  margin-right: 10px;
}

.form-button:hover {
  background-color: #0056b3;
}

.submit-button {
  background-color: #28a745;
}
.submit-button:hover {
  background-color: #1c8334;
}
.delete-button {
  padding: 5px 10px;
  font-size: 0.6rem;
  cursor: pointer;
  border: none;
  background-color: orangered;
  color: #fff;
  border-radius: 9px;
}
.delete-button:hover {
  background-color: rgb(235, 63, 1);
}

/* //LIST OF ADDED TRUSTEES \\ */
.all-added-trustee {
  list-style-type: none;
  padding: 0;
}

.added-trustee {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border: 1px solid #ddd;
  padding: 10px;
  margin-bottom: 10px;
  background-color: #f9f9f9;
}

.trustee-content {
  flex-grow: 1;
}

.trustee-actions {
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
