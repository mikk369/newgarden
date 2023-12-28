<template>
  <div class="document-view">
    <HeaderView />
    <div class="links-wrapper-content">
      <div class="links-wrapper">
        <h1 class="title">Dokumendid</h1>
        <!-- TODO:: make ul - li list -->
        <div class="just-links" v-for="document in documents"
        :key="document.id">
            <a :href="getLink(document)" target="_blank">
              <button class="link-background-hover">{{ document.title }}</button>
            </a>
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      documents: [],
    };
  },
  async created() {
    await this.fetchDocuments();
  },
  methods: {
    async fetchDocuments() {
      try {
        const response = await axios.get('http://localhost:8000/api/documents/get_allDocuments.php');
        this.documents = response.data
      } catch (error) {
        console.log(error);
      }
    },
    getLink(document) {
      // Check if link or document_folder is present
      if (document.link) {
        return document.link;
      } else if (document.document_folder) {
        return 'http://localhost:8000/' + document.document_folder;
      } 
    },
  }
};
</script>

<style scoped>
.title {
  display: flex;
  justify-content: center;
  margin: 100px 0 50px 0;
}
.links-wrapper {
  height: 100vh;
  background-image: url('./../photos/background-2.webp');
  background-size: cover;
}
@media screen and (max-width: 600px) {
  .links-wrapper {
    margin-bottom: 100px;
  }
}
.links-wrapper a {
  border: none;
  color: rgb(39, 39, 39);
}
.links-wrapper h1 {
  color: rgb(39, 39, 39);
  font-weight: bold;
}
.just-links {
  text-align: center;
}

.link-background-hover {
  width: 50%;
  margin-bottom: 12px;
  padding: 12px;
  border: none;
  border-radius: 9px;
  background-color: aliceblue;
  font-size: 23px;
  color: rgb(36, 36, 36);
}
.link-background-hover:hover {
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
</style>
