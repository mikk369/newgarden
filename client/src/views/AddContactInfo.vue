<template>
  <div class="grid-container">
    <SideBar />
    <main>
      <form class="edit-contact-info">
        <h1 class="form-heading">Lisa kontakt</h1>
        <div class="form-group">
          <label class="input-label" for="image">Image</label>
          <input
            class="image-input"
            type="file"
            ref="image"
            name="image"
            show-size
            accept="image/png, image/jpg, image/webp"
            @change="selectFile" />
        </div>
        <div class="edit-contact-form-group">
          <input class="edit-contact-input-class" type="text" name="name" placeholder="Nimi" />
        </div>
        <div class="edit-contact-form-group">
          <input
            class="edit-contact-input-class"
            type="text"
            name="Ametinimetus"
            placeholder="Ametinimetus" />
        </div>
        <div class="edit-contact-form-group">
          <input
            class="edit-contact-input-class"
            type="text"
            name="Telefon 1"
            placeholder="Telefon 1" />
        </div>
        <div class="edit-contact-form-group">
          <input
            class="edit-contact-input-class"
            type="text"
            name="Telefon 2"
            placeholder="Telefon 2" />
        </div>
        <div class="edit-contact-form-group">
          <input class="edit-contact-input-class" type="text" name="Email" placeholder="Email" />
        </div>
        <button class="form-button">Sisesta</button>
      </form>
    </main>
  </div>
</template>

<script>
import SideBar from '../components/SideBar.vue';

export default {
  name: 'AddContactInfo',
  components: {
    SideBar,
  },
  data() {
    return {};
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
</style>
