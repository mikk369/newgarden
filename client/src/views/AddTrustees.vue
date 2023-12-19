<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <form class="add-trustee-input-form" @submit.prevent="addTrustees">
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
            v-model="row.group_name" />
          <button class="delete-button" @click.prevent="removeRow(index)">
            X
          </button>
        </div>
        <button class="form-button" @click.prevent="addRow">Lisa rida</button>
        <button class="form-button submit-button">Lisa postitus</button>
      </form>
    </main>
  </div>
</template>

<script>
import axios from 'axios';
import SideBar from '../components/SideBar.vue';
export default {
  name: 'EditTrusteesInfo',
  components: {
    SideBar,
  },
  data() {
    return {
      rows: [{ name: '', group_name: '' }],
    };
  },
  methods: {
    addRow() {
      this.rows.push({ name: '', group_name: '' });
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
            `trusteesData[${index}][group_name]`,
            row.group_name
          );
        });

        // Send the array of FormData objects to the server
        const response = await axios.post(
          'http://localhost:8000/api/trustees/add_trustees.php',
          combinedFormData
        );

        console.log(response);
      } catch (error) {
        console.error(error);
      }
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
.add-trustee-input-form {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: aliceblue;
  border: 1px solid #ddd;
  border-radius: 9px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
</style>
