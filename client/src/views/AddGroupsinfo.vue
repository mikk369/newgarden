<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <form
        class="form-info"
        @submit.prevent="addGroup"
        enctype="multipart/form-data">
        <h1 class="form-heading">Lisa rühm</h1>
        <input
          class="edit-contact-input-class"
          type="text"
          name="group_name"
          placeholder="Rühma nimi"
          v-model="group_name" />
        <input
          class="edit-contact-input-class"
          type="text"
          name="teacher_1"
          placeholder="Õpetaja"
          v-model="teacher_1" />
        <input
          class="edit-contact-input-class"
          type="text"
          name="teacher_2"
          placeholder="Õpetaja"
          v-model="teacher_2" />
        <input
          class="edit-contact-input-class"
          type="text"
          name="assistant_teacher"
          placeholder="Õpetaja abi"
          v-model="assistant_teacher" />
        <input
          class="edit-contact-input-class"
          type="text"
          name="assistant"
          placeholder="Assistent"
          v-model="assistant" />
        <input
          class="edit-contact-input-class"
          type="text"
          name="special_teacher"
          placeholder="Eripedagoog"
          v-model="special_teacher" />
        <input
          class="edit-contact-input-class"
          type="text"
          name="phone"
          placeholder="Telefon"
          v-model="phone" />
        <button class="form-button">Lisa kontakt</button>
      </form>
      <section>
        <h1>Lisatud kontaktid</h1>
        <ul class="added-list-items">
          <li class="list-items" v-for="group in groups" :key="group.id">
            <div class="list-content">{{ group.group_name }}</div>
            <div class="list-actions">
              <button @click="editContact(group)" class="edit-button">
                Muuda
              </button>
              <button @click="deleteContact(group.id)" class="delete-button">
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
  name: 'AddGroupsinfo',
  components: {
    SideBar,
  },
  data() {
    return {
      groups: [],
      group_name: '',
      teacher_1: '',
      teacher_2: '',
      assistant_teacher: '',
      assistant: '',
      special_teacher: '',
      phone: '',
    };
  },
  async created() {
    await this.fetchGroups();
  },
  methods: {
    async addGroup() {
      try {
        const formData = new FormData();
        formData.append('group_name', this.group_name);
        formData.append('teacher_1', this.teacher_1);
        formData.append('teacher_2', this.teacher_2);
        formData.append('assistant_teacher', this.assistant_teacher);
        formData.append('assistant', this.assistant);
        formData.append('special_teacher', this.special_teacher);
        formData.append('phone', this.phone);

        await axios.post(
          `${config.baseUrlApi}/groups/add_groups.php`,
          formData
        );
        this.group_name = '';
        this.teacher_1 = '';
        this.teacher_2 = '';
        this.assistant_teacher = '';
        this.assistant = '';
        this.special_teacher = '';
        this.phone = '';
      } catch (error) {
        console.log(error);
      }
    },
    async fetchGroups() {
      try {
        const response = await axios.get(
          `${config.baseUrlApi}/groups/get_allGroups.php`
        );
        this.groups = response.data;
        console.log(response.data);
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

.edit-contact-input-class {
  width: 20%;
  padding: 0.5rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 9px;
  margin-bottom: 1.5rem;
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
</style>
