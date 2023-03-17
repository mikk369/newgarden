<template>
  <footer>
    <h6>
      PAIde lasteaed Kastani 6, Paide 72718, direktor@pailasteaed.ee, Telefon 55
      12 515
      <a
        target="_blank"
        href="https://www.facebook.com/PAIde-Lasteaed-142586803092495"
      >
        <img class="svg-image" src="./../assets/FbIcon.svg" alt="svg image"
      /></a>
    </h6>
  </footer>
</template>
<style>
footer h6 {
  margin: 0;
  padding: 10px;
  background-color: aliceblue;
  display: flex;
  align-items: center;
  justify-content: center;
  color: rgb(39, 39, 39);
}

.svg-image {
  margin-left: 6px;
  height: 30px;
  width: 30px;
  color: rgb(39, 39, 39);
}
</style>
<script>
export default {
  name: 'FooterView',
  data() {
    return {};
  },
};
</script>
