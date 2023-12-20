<template>
  <div class="landing-page">
    <HeaderView />
    <div class="landing-bg">
      <div class="welcome-text-wrapper">
        <div class="welcome-text">Tere tulemast PAIde lasteaeda!</div>
      </div>
      <a
        target="_blank"
        href="https://pass.piksel.ee/ctrl/et/Auth/login/spoku_paide/?back_url=&sso=1"
        ><button class="app-button">LASTEAIAKOHA TAOTLUS</button></a
      >
      <img src="./../photos/landing.webp" alt="playground" />
    </div>
    <div class="main-area">
      <div class="principles-text">
        <h1>Meie väärtustame</h1>
      </div>
      <div class="principles-wrapper">
        <div class="principles-logo">
          <img src="./../assets/teamwork.svg" alt="PlaceHolder" />
          <h4>Koostöö</h4>
        </div>
        <div class="principles-logo">
          <img src="./../assets/thinking.svg" alt="PlaceHolder" />
          <h4>Iseseisvus</h4>
        </div>
        <div class="principles-logo">
          <img src="./../assets/care.svg" alt="PlaceHolder" />
          <h4>Hoolivus</h4>
        </div>
      </div>
      <div
        class="principles-main"
        data-aos="fade-right"
        data-aos-offset="300"
        data-aos-easing="ease-in-sine">
        <div class="princible-text">
          <h1 class="paragraph-heading">PAI IGASSE PÄEVA!</h1>
          <p class="paragraph-class">
            Lasteaed võimaldab kvaliteetset ning nüüdisaegset alushariduse
            teenust kõigile Paide linna lastele. Igapäevategevuste planeerimisel
            toetutakse lapsest lähtuvale õpikäsitlusele, fookusesse on seatud
            projektõpe. Lasteaias tegutseb Paide linna ainus erirühm, mille
            tähelepanu on kõnepuudega lastele. Laste arengut toetavad lisaks
            rühmameeskondadele ka tugispetsialistid, mõlemas õppekohas on olemas
            eripedagoogid, kõne- ja mänguterapeut. Lasteaed tegutseb kahes
            õppekohas. Mõlemad on ümbritsetud loodusliku keskkonnaga, läheduses
            asuvad mets, park, järv, vallimägi. Samuti on Kullapai õppekohas
            ujula, mida kasutavad ujumisõpetuseks kõik rühmad. <br />
            Meie Lasteaiast sirguvad õnnelikud, julged ja uudishimulikud lapsed!
          </p>
        </div>
      </div>
      <div class="support-main-div">
        <div class="support-div">
          <img src="./../photos/tervis_logo.webp" alt="tervis_logo" />
        </div>
        <div class="support-div">
          <img
            src="./../photos/Tervislik_tookoht.webp"
            alt="Tervislik_töökoht" />
        </div>
        <div class="support-div">
          <img
            src="./../photos/ettevotlik-lasteaed_baastase_logo.webp"
            alt="ettevotlik-lasteaed" />
        </div>
      </div>
      <div class="heading">
        <h1>Teated</h1>
      </div>
      <div class="news-main">
        <div class="no-posts-div" v-if="posts.length === 0">
          <h3>Hetkel teated puuduvad</h3>
        </div>
        <div
          class="paragraph-card"
          v-for="post in reversedPosts"
          :key="post.id">
          <router-link
            style="text-decoration: none"
            class="router-styles"
            :to="{ params: { id: post.id }, name: 'post' }">
            <div class="cards">
              <h4>
                <b>{{ post.title }}</b>
              </h4>
              <p class="lower-paragraph">{{ post.content }}</p>
            </div>
          </router-link>
          <div class="time-div">
            <div class="created-At">{{ post.createdAt }}</div>
          </div>
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'LandingPage',
  data() {
    return {
      posts: [],
    };
  },
  computed: {
    // So new post will be top
    reversedPosts() {
      return this.posts.slice().reverse();
    },
  },

  async created() {
    const response = await axios.get(
      'http://localhost:8000/api/posts/get_allposts.php',
      {
        // withCredentials: true,
      }
    );
    this.posts = response.data;
  },
};
</script>

<style scoped>
.landing-bg {
  position: relative;
}
.landing-bg img {
  display: block;
}

/* application button styling  */
.app-button {
  top: 20rem;
  left: 20rem;
  position: absolute;
  border: none;
  color: rgb(255, 255, 255);
  padding: 10px;
  background-color: rgba(19, 19, 19, 0.6);
  border-radius: 9px;
  cursor: pointer;
  letter-spacing: 3px;
  font-weight: 900;
}
.app-button:hover {
  background-color: rgba(19, 19, 19, 0.8);
}

/* makes the transperent button to move when smalles screen  */
@media screen and (max-width: 1024px) {
  .app-button {
    left: 11rem;
    top: 18rem;
    font-size: 20px;
    width: 50%;
  }
}
@media screen and (max-width: 768px) {
  .app-button {
    left: 9rem;
    top: 20rem;
    font-size: 20px;
    width: 50%;
  }
}
@media screen and (max-width: 425px) {
  .app-button {
    left: 3rem;
    top: 19rem;
    width: 80%;
    font-size: 20px;
  }
}
@media screen and (max-width: 320px) {
  .app-button {
    left: 2rem;
    top: 19rem;
    width: 80%;
    font-size: 20px;
  }
}

/* .welcome-text-wrapper {
    position: relative;
  } */
.welcome-text {
  position: absolute;
  background-color: rgba(19, 19, 19, 0.6);
  top: 6rem;
  left: 20rem;
  color: white;
  font-weight: bold;
  font-size: 50px;
  border-radius: 9px;
  text-align: center;
  padding: 8px;
}

/* makes the welcome text  to move when smalles screen  */
@media screen and (max-width: 1024px) {
  .welcome-text {
    top: 10rem;
    left: 12rem;
    font-size: 42px;
  }
}
@media screen and (max-width: 768px) {
  .welcome-text {
    top: 10rem;
    left: 5rem;
    font-size: 42px;
  }
}
@media screen and (max-width: 425px) {
  .welcome-text {
    top: 3rem;
    left: 1rem;
    font-size: 42px;
  }
}

/* the welcoming text  */
.principles-wrapper {
  background-color: rgb(245, 245, 65);
  display: flex;
  height: 200px;
  justify-content: space-around;
  padding-top: 20px;
}
/* the welcoming text  background color  */
.principles-text {
  background-color: rgb(245, 245, 65);
}
/* the welcoming text  */
.principles-text h1 {
  margin: 0;
  text-align: center;
  padding-top: 20px;
  font-weight: 600;
  font-size: 2.5rem;
  color: #000;
}

/* principles-logo sizes  */
.principles-logo img {
  height: 100px;
  width: 100px;
}

/* principles-logo lower text  */
.principles-logo h4 {
  color: #000;
  text-align: center;
  font-weight: 700;
  font-size: 1.5rem;
}
/* the main heading sentence  */
.principles-main {
  display: flex;
  padding: 90px 0px 40px 0px;
  text-align: center;
  justify-content: center;
}
/* main heading lower text  */
.princible-text {
  flex-direction: column;
  display: flex;
  width: 65%;
}
.princible-text h1 {
  margin-bottom: 19px;
}
.paragraph-class {
  line-height: 1.6;
}
/* changes paragraph-text width  */
@media screen and (max-width: 1024px) {
  .princible-text {
    width: 90%;
  }
}
.princible-text h1 {
  font-weight: 600;
  color: #000;
}
/* lower paragraph text  */
.princible-text p {
  font-size: 20px;
}
/* main div with pictures  */
.support-main-div {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: auto;
  text-align: center;
  justify-content: center;
  padding: 90px;
}
/* Support divs  */
.support-div img {
  height: 250px;
}

/* mobile view grid changes  */
@media screen and (max-width: 1320px) {
  .support-main-div {
    grid-template-columns: repeat(2, 1fr);
  }
  .support-div:nth-child(3) {
    margin-top: 30px;
  }
}
/* mobile view grid changes  */
@media screen and (max-width: 950px) {
  .support-main-div {
    grid-template-columns: repeat(1, 1fr);
  }
}
/* picture size changes */
@media screen and (max-width: 490px) {
  .support-div img {
    height: 160px;
  }
  .support-div:nth-child(2) {
    margin-top: 30px;
  }
  .support-div:nth-child(3) {
    margin-top: 30px;
  }
}
.support-div h4 {
  margin-top: 20px;
  font-weight: 500;
  color: #000;
}

/* landingpage background image  */
.landing-bg img {
  width: 100%;
  height: 60vh;
  object-fit: cover;
  object-position: 0% 85%;
}
/* news heading position and bg color  */
.heading {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: aliceblue;
  padding: 30px;
}
.heading h1 {
  color: #000;
}
/* news cards positioning  */
.news-main {
  display: grid;
  padding: 60px 20px 60px 20px;
  grid-gap: 1rem;
  grid-template-columns: repeat(3, 1fr);
}
@media screen and (max-width: 950px) {
  .news-main {
    grid-template-columns: 1fr;
  }
}
.no-posts-div {
  text-align: center;
  grid-column: 2;
  align-self: center;
}
.paragraph-card {
  white-space: normal;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  border-radius: 9px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin: 10px; /* Add margin for spacing between cards */
}

.cards {
  padding: 20px;
  color: #363636;
}

h4 {
  font-size: 18px;
  margin-bottom: 10px;
  text-align: center;
}

.lower-paragraph {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  text-align: center;
  font-size: 1rem;
  color: #555; /* Set the color as needed */
}

.time-div {
  background-color: aliceblue; /* Set background color as needed */
  padding: 10px;
  text-align: right;
}

.created-At {
  font-size: 12px;
  color: #888; /* Set the color as needed */
}
</style>
