<template>
  <HeaderView />
  <div class="projects-wrapper">
    <div class="project-heading">
      <h1 class="project-title">„PAIde Lasteaia teekond lapsest lähtumiseni“</h1>
    </div>
    <div class="text-container">
      11.03-25.05.2023 viidi Euroopa Sotsiaalfondi toel ellu PAIde Lasteaia projekt „PAIde Lasteaia
      teekond lapsest lähtumiseni“. <br /><br />Projekti raames läbiti Hoolingu koolitajate poolt
      läbiviidud õppepäevad teemal „Lapsest lähtuv projektõpe praktikas“ 11.03-12.03.2023 Paide
      Riigigümnaasiumi ruumides ning saadud teadmiste kinnistamiseks ning praktikasse rakendamiseks
      viidi läbi neli õpiringi koolitusteemadel perioodil 23.03-25.05.2023.<br /><br />
      Projekti eesmärk oli projektõppe rakendamine PAIde Lasteaia kõikides rühmades. Saavutada
      oskused ning teadmised ja julgus projektõppe, ehk lapsest lähtuva õpikäsituse täielikuks
      rakendamiseks rühmakeskkonnas.<br /><br />
      Koolituse toel on PAIde Lasteaia kõik rühmad on teemaõppelt üle läinud lapsest lähtuvale
      õpikäsitusele ehk projektõppele. Õpetajad on õppeprotsessis lapse toetajad ja innustajad,
      õpikeskkonna loojad. Koostööd tehakse erinevate spetsialistidega, et tuua lasteni neid
      huvitavaid teadmisi. Õppeprotsess on tervik ning vältab läbi mänguliste tegevuste terve
      lasteaiapäeva vältel. Lapsed on ise tegutsemas ning julgevad avastada, uurida ja katsetada
      ning arutleda. Õpetajad on teadlikud ja enesekindlad rakendatava meetodi vajalikkusest ja
      tulemuslikkusest.<br /><br />
      Projekti rahastas Euroopa sotsiaalfond kogusummas 3045,20 eurot.
    </div>
    <div class="logo-container">
      <div class="logo">
        <img src="../photos/paidelogo.webp" alt="" srcset="" />
      </div>
      <div class="logo">
        <img src="../photos/eesti_tulevik.webp" alt="" srcset="" />
      </div>
      <div class="logo">
        <img src="../photos/EU_liit.webp" alt="" srcset="" />
      </div>
    </div>
  </div>
  <FooterView />
</template>

<script>
export default {
  name: 'Projects',
  data() {
    return {};
  },
};
</script>

<style>
.project-heading {
  padding: 42px;
}
.projects-wrapper {
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  min-height: 100vh;
}
.text-container {
  font-family: 'Open Sans', sans-serif;
  font-size: 20px;
  line-height: 1.6;
  padding: 60px 0 32px 0;
}
@media (min-width: 960px) {
  .text-container {
    width: 960px;
    padding: 60px 42px 32px 42px;
  }
}
@media (max-width: 960px) {
  .project-heading {
    padding: 32px 20px 20px 20px;
  }
  .project-title {
    font-size: 26px;
  }
  .text-container {
    padding: 40px 42px 32px 42px;
    font-size: 18px;
    line-height: 1.5;
  }
}
.logo-container {
  padding: 60px 0 92px 0;
  display: flex;
  gap: 64px;
}
@media (max-width: 650px) {
  .project-heading {
    padding: 32px 10px 10px 10px;
  }
  .project-title {
    font-size: 20px;
  }
  .logo-container {
    flex-wrap: wrap;
    justify-content: center;
    padding-bottom: 32px 0 32px 0;
  }
}
@media (max-width: 460px) {
  .project-title {
    font-size: 16px;
    text-align: center;
  }
  .text-container {
    padding: 40px 26px 32px 26px;
  }
}
</style>
