<template>
  <div class="post-view">
    <HeaderView />
    <div class="post-container">
      <div class="post-wrapper">
        <div class="post-area">
          <h1 class="post-title">{{ title }}</h1>
          <p class="content" v-html="content"></p>
          <!-- <div class="image-wrapper">
            <img v-if="id !== 1" class="poster-image" :src="image" alt="Post Image" />
          </div> -->
        </div>
        <div class="table-wrapper" v-if="id !== 1">
          <table>
            <thead>
              <tr>
                <th>PILVEPAI (KASTANI tn 2-3)</th>
                <th>RUKKILILL (TALLINNA TN 2-3)</th>
                <th>SAIALILL (TALLINNA TN EELSÕIM)</th>
                <th>TUULEPAI (KASTANI TN)</th>
                <th>VIHMAPAI (KASTANI TN 3-4)</th>
                <th>VÕILILL (TALLINNA TN 3-4)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Märten M.</td>
                <td>Deivi P.</td>
                <td>Kenneth P.</td>
                <td>Nelli Anette P.</td>
                <td>Kevin O.</td>
                <td>Noora-Viktoria T.</td>
              </tr>
              <tr>
                <td>Kaspar K.</td>
                <td>Trevor B.</td>
                <td>Roman M.</td>
                <td></td>
                <td>Yelizaveta B..</td>
                <td>Melisa Z.</td>
              </tr>
              <tr>
                <td>Rosaly A.</td>
                <td>Jakob R.</td>
                <td>Daryna K</td>
                <td></td>
                <td>Anni V.</td>
                <td>Anastasiia S.</td>
              </tr>
              <tr>
                <td>Sander K.</td>
                <td>Karl Kustav K.</td>
                <td>Marten K.</td>
                <td></td>
                <td>Aaron J.</td>
                <td></td>
              </tr>
              <tr>
                <td>Kertu-Liisa A.</td>
                <td>Kris Sebastian P.</td>
                <td>Matteo T.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Helinee K.</td>
                <td>Kennet T.</td>
                <td>Aureelia L.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Marta T.</td>
                <td>Oleksander O.</td>
                <td>Henri L.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Otto L.</td>
                <td>Lisette R.</td>
                <td>Hannaly M.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Elvira S.</td>
                <td>Emilia N.</td>
                <td>Ruby V.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Ricco Romeo P.</td>
                <td>Roven T.</td>
                <td>Demiloore K.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Ander R.</td>
                <td>Emma K.</td>
                <td>Heily L.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>Emili K.</td>
                <td>Elisabeth R.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>Aleksandra L.</td>
                <td>Henri T.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>Veronika L.</td>
                <td>Aron S.</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <!-- add more rows as needed -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>
<script>
import { posts } from './data';
export default {
  name: 'LandingPage',
  data() {
    return {
      post: null,
      id: '',
      title: '',
      content: '',
      image: '',
    };
  },
  created() {
    try {
      const postId = parseInt(this.$route.params.id);
      const post = posts.find((post) => post.id === postId);
      (this.title = post.title),
        (this.content = post.content),
        (this.image = post.image),
        (this.id = post.id);
    } catch (error) {
      console.log(error);
    }
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
