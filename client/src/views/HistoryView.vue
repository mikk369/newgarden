<template>
  <div class="history-view">
    <HeaderView />

    <div class="history-main">
      <div class="history-text">
        <div class="card" style="width: 20rem">
          <img
            src="./../photos/Ajalugu-1965.webp"
            class="card-img-top"
            alt="ajalugu-1965"
          />
          <div class="card-body">
            <p class="card-text">
              Paide linna PAIde Lasteaia ajalugu viib meid aastasse 1965, kui
              19. juulil avati tolle aja kohta südalinnas väga moodne
              6-rühmaline: 2 sõime- ja 4 aiarühmaga uhke kivimaja, mille ametlik
              nimetus oli Paide I Lastepäevakodu ning mida hellitavalt nimetati
              MÄNGUDE MAJAKS.
            </p>
          </div>
        </div>

        <div class="card" style="width: 20rem">
          <img
            src="./../photos/Lillepai-maja-scaled-1.webp"
            class="card-img-top"
            alt="lillepai"
          />
          <div class="card-body">
            <p class="card-text">
              Laste vähesuse tõttu tühjana seisnud 1980. aastal valminud Paide
              Orava Lasteaed täitus uuesti laste naerukilkedega 2004. aastal,
              mil seal avati üks Paide Kesklinna Lasteaia rühm.Alates 2001.
              aastast hakati laste õpetamisel pöörama suuremat tähelepanu
              looduse tundmisele ja hoidmisele. 2005. aastal koos KIK
              keskkonnateadlikkuse projektiga pandi rühmadele numbrite asemel
              kaunid lillede nimed, õmmeldi igale rühmale maskoti kostüüm ja
              hakati tähistama rühma nimepäeva.
            </p>
          </div>
        </div>
        <div class="card" style="width: 20rem">
          <img
            src="./../photos/kullapai-suurem-pilt.webp"
            class="card-img-top"
            alt="kullapai-pilt"
          />
          <div class="card-body">
            <p class="card-text">
              Juba pikka aega plaaniti ka uue lasteaia maja ehitust, sest Pärnu
              tänava maja oli jäänud kitsaks ja remonti vajavaks. 9. detsembril
              2008 pandigi uuele lasteaia majale nurgakivi ning juba 1.
              septembril 2009 avati uus lasteaia maja Kastani tn 6 ja Pärnu tn 7
              suleti. Paide Kesklinna Lasteaed nimetati ümber PAIde Lasteaiaks
              (24.augustist 2009.a). Lasteaia Kastani tänava maja nimeks sai
              Kullapai ja Tallinna tänava maja nimeks Lillepai.
            </p>
          </div>
        </div>
      </div>
    </div>
    <FooterView />
  </div>
</template>

<style scoped>
/* HISTORY PAGE  */
.history-text {
  display: flex;
  padding: 80px;
  gap: 20px;
  text-align: center;
  justify-content: space-around;
  background-image: url('./../photos/background-2.webp');
  background-size: contain;
}
@media screen and (max-width: 1023px) {
  .history-text {
    all: unset;
    gap: 20px;
  }
  .history-text > :nth-child(2),
  .history-text > :nth-child(3) {
    margin-top: 20px;
  }
  .history-main {
    display: flex;
    padding: 80px;
    gap: 20px;
    text-align: center;
    justify-content: center;
  }
}

.history-text p {
  font-weight: bold;
  line-height: 1.7;
  color: rgb(39, 39, 39);
  padding: 20px;
}

.card {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  background-color: #fff;
}
.card img {
  height: 212px;
  width: 100%;
}
</style>
