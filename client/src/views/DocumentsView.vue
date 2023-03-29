<template>
  <div class="document-view">
    <HeaderView />
    <div class="links-wrapper-content">
      <div class="links-wrapper">
        <h1 class="title">Dokumendid</h1>
        <div class="just-links">
          <div>
            <a href="https://documents.pailasteaed.ee/2022-2023-tegevuskava.pdf" target="_blank">
              <button class="link-background-hover">Tegevuskava</button>
            </a>
          </div>
          <div>
            <a href="https://documents.pailasteaed.ee/kodukord-2022.pdf" target="_blank">
              <button class="link-background-hover">Kodukord</button>
            </a>
          </div>
          <div>
            <a href="https://documents.pailasteaed.ee/Oppekava.pdf" target="_blank">
              <button class="link-background-hover">Õppekava</button>
            </a>
          </div>
          <div>
            <a href="https://documents.pailasteaed.ee/Paevakava-2022-2023.pdf" target="_blank">
              <button class="link-background-hover">Päevakava</button>
            </a>
          </div>
          <div>
            <a
              href="https://documents.pailasteaed.ee/Paide_lasteaia_arengukava_2023-2027.docx"
              target="_blank">
              <button class="link-background-hover">Arengukava</button>
            </a>
          </div>
          <div>
            <a
              href="https://documents.pailasteaed.ee/Lapse-lasteaiakoha-lopetamise-avalduse-pohi.docx"
              target="_blank">
              <button class="link-background-hover">
                Lapse lasteaiakoha lopetamise avalduse pohi
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
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
