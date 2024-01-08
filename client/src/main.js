import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import FooterView from './components/FooterView.vue';
import HeaderView from './components/HeaderView.vue';
import VueGtag from 'vue-gtag';
import AOS from 'aos';
import 'aos/dist/aos.css';
import 'primeicons/primeicons.css';
import 'primevue/resources/themes/saga-blue/theme.css'

const app = createApp(App);
app.use(VueGtag, {
  config: { id: 'G-2SYHWYQ5K5' },
});
app.use(router);
app.component('FooterView', FooterView);
app.component('HeaderView', HeaderView);
app.mixin({
  created() {
    AOS.init();
  },
});
app.mount('#app');
