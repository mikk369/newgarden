<template>
  <div class="groups-view">
    <HeaderView />
    <div class="links-main">
      <div class="links">
        <router-link to="/lillepai" class="lillepai">
          <button>Lillepai</button>
        </router-link>
        <router-link to="/kullapai" class="kullapai">
          <button>Kullapai</button>
        </router-link>
      </div>
      <div class="princible-main-text">
        <div class="princible-text">
          <p class="bg-light rounded">
            Lasteaias on 13 rühma. Seitse rühma asub Lillepai õppekohas
            (Tallinna tn 49) ja kuus rühma Kullapai õppekohas (Kastani tn 6).
          </p>
        </div>
      </div>
      <div class="image-main-container">
        <div class="image-left col-md-4 text-center img-fluid">
          <img src="./../photos/kite-kid-1.webp" alt="kid-with-yellow-kite" />
        </div>
        <div class="image-right col-md-4 text-center">
          <img src="./../photos/kite-kids.webp" alt="kids-jumping" />
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<style scoped>
.lillepai button {
  border: none;
  border-radius: 9px;
  padding: 9px;
  font-weight: bold;
  margin-right: 9px;
  font-size: 30px;
  color: rgb(39, 39, 39);
  background-color: aliceblue;
}
.lillepai button:hover {
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
.kullapai button {
  border: none;
  border-radius: 9px;
  padding: 9px;
  font-weight: bold;
  font-size: 30px;
  color: rgb(39, 39, 39);
  background-color: aliceblue;
}
.kullapai button:hover {
  box-shadow: 0 0px 3px 1px rgba(31, 31, 31, 0.3);
  transition: all 200ms ease-out;
}
.links-main {
  min-height: 100vh;
  background-image: url('./../photos/background-2.webp');
  background-size: cover;
  z-index: 1;
}
.links {
  display: flex;
  justify-content: center;
  padding-top: 100px;
}

.princible-main-text {
  display: flex;
  text-align: center;
  justify-content: center;
  padding-top: 100px;
  font-weight: 600;
}
.image-main-container {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding-top: 100px;
}
.image-main-container {
  display: flex;
  justify-content: center;
  align-items: center;
}
@media only screen and (max-width: 767px) {
  .image-left,
  .image-right {
    display: none;
  }
}
.image-left img {
  width: 50%;
}
.image-right img {
  width: 50%;
}
</style>
