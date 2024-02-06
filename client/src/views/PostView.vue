<template>
  <div class="post-view">
    <HeaderView />
    <div class="post-container">
      <div class="post-wrapper">
        <div class="post-area">
          <h1 class="post-title">{{ title }}</h1>
          <p class="content">{{ content }}</p>
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>
<script>
import axios from 'axios';
const apiUrl = import.meta.env.VITE_API_BASE_URL;

export default {
  name: 'PostView',
  data() {
    return {
      id: this.$route.params.id,
      title: '',
      content: '',
      image: '',
    };
  },
  created() {
    this.fetchPost();
  },
  methods: {
    fetchPost() {
      // Use Axios to make the GET request
      axios
        .get(`${apiUrl}api/posts/get_post.php?id=${this.id}`)
        .then((response) => {
          // Update component data with fetched post data
          const data = response.data;
          this.title = data.title;
          this.content = data.content;
          this.image = data.image;
        })
        .catch((error) => {
          console.error('Error fetching post:', error);
        });
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
.table-wrapper {
  overflow-x: auto;
}

table {
  border-collapse: collapse;
  font-size: 1.2rem;
  margin-bottom: 3rem;
}
thead {
  background-color: #272727;
  color: #fff;
}
th,
td {
  padding: 10px 16px;
  white-space: nowrap;
  border: 1px solid black;
}
tbody tr:nth-child(odd) {
  background-color: #f8f9fa;
}
tbody tr:nth-child(even) {
  background-color: #e9ecef;
}
</style>
