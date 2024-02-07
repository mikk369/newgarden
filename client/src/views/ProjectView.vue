<template>
  <div class="post-view">
    <HeaderView />
    <div class="post-container">
      <div class="post-wrapper">
        <div class="post-area">
          <h1 class="post-title">{{ name }}</h1>
          <p class="content">{{ project_content }}</p>
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<script>
import axios from 'axios';
import config from './../config.js';

export default {
  name: 'project',
  data() {
    return {
      id: this.$route.params.id,
      name: '',
      project_content: '',
      image: '',
    };
  },
  created() {
    this.fetchPost();
  },
  methods: {
    async fetchPost() {
      try {
        const response = await axios.get(
          `${config.baseUrlApi}/projects/get_project.php?id=${this.id}`
        );
        (this.name = response.data.name),
          (this.project_content = response.data.project_content);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style>
.post-container {
  min-height: 90vh;
}
.post-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.post-area {
  padding: 5rem 15rem;
}
.post-title {
  font-size: 2rem;
  border-bottom: solid black 3px;
  text-align: center;
}
.content {
  font-size: 1.5rem;
  padding-top: 1rem;
  line-height: 1.6;
}
@media only screen and (max-width: 1800px) {
  .table-wrapper {
    width: 100%;
  }
}

@media only screen and (max-width: 1200px) {
  .post-area {
    padding: 5rem 3rem;
  }
}
@media only screen and (max-width: 900px) {
  .post-area {
    padding: 3rem 3rem;
  }
  .post-title {
    font-size: 1.5rem;
  }
  .content {
    font-size: 1.2rem;
  }
  .image-wrapper img {
    width: 400px;
  }
}
@media only screen and (max-width: 380px) {
  .post-title {
    font-size: 1.6rem;
  }
  .post-area {
    padding: 48px 24px;
  }
  .content {
    font-size: 1rem;
  }
}
@media only screen and (max-width: 500px) {
  .post-title {
    font-size: 1.2rem;
  }
  .image-wrapper img {
    width: 200px;
  }
}
.image-wrapper {
  display: flex;
  justify-content: center;
  padding-top: 30px;
}
.poster-image {
  width: 600px;
  height: auto;
  align-items: center;
}
</style>
