<template>
  <div class="trustee-contact">
    <HeaderView />
    <div class="main-contact-wrapper">
      <router-link to="/kontaktid" class="main-contact-personal">
        <button>Personal</button>
      </router-link>

      <router-link to="/hoolekogu" class="contact-Hoolekogu">
        <button>Hoolekogu</button>
      </router-link>
    </div>

    <div class="table-wrapper">
      <table class="styled-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nimi</th>
            <th scope="col">Rühm</th>
            <th scope="col">E-POSTIAADRESS</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(trustee, i) in trustees" :key="trustee.id">
            <th scope="row">{{ i + 1 }}</th>
            <td>{{ trustee.name }}</td>
            <td>{{ trustee.table_group_name }}</td>
            <td>kerstinsireli@gmail.com</td>
          </tr>
        </tbody>
      </table>
    </div>
    <FooterView />
  </div>
</template>

<script scoped>
import axios from 'axios';
export default {
  name: 'TrusteesView',

  data() {
    return {
      trustees: [],
    };
  },
  async created() {
    const response = await axios.get(
      'http://localhost:8000/api/trustees/get_alltrustees.php'
    );
    this.trustees = response.data;
  },
};
</script>

<style scoped>
/* two links  */
.main-contact-wrapper {
  display: flex;
  align-items: center;
  padding-top: 100px;
  justify-content: center;
}
@media screen and (max-width: 425px) {
  .main-contact-personal {
    margin-bottom: 30px;
  }
  .main-contact-wrapper {
    flex-direction: column;
  }
}
.main-contact-personal button {
  font-size: 30px;
  border: none;
  border-radius: 9px;
  padding: 9px;
  font-weight: bold;
  background-color: aliceblue;
  color: rgb(39, 39, 39);
}
.main-contact-personal button:hover {
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
.contact-Hoolekogu button {
  font-size: 30px;
  background-color: aliceblue;
  border: none;
  border-radius: 9px;
  padding: 9px;
  font-weight: bold;
  margin-left: 9px;
  color: rgb(39, 39, 39);
}
.contact-Hoolekogu button:hover {
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
.styled-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 18px;
  text-align: left;
}
/* TABLE  */
.styled-table {
  width: 100%;
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 18px;
  text-align: left;
}
.styled-table thead th {
  background-color: #3498db;
  color: #ffffff;
  font-weight: bold;
}

.styled-table th,
.styled-table td {
  padding: 12px 15px;
  border-bottom: 1px solid #ddd;
}

.styled-table tbody tr {
  background-color: #f5f5f5;
  transition: all 0.3s;
}

.styled-table tbody tr:hover {
  background-color: #e0e0e0;
}

.styled-table tbody td {
  text-align: left;
}

.styled-table tbody td:last-child {
  text-align: center;
}

.styled-table tbody tr:last-of-type {
  border-bottom: 2px solid #3498db;
}

.table-wrapper {
  width: 50%;
  margin: auto;
  overflow-x: auto;
  margin-bottom: 100px;
}
</style>
