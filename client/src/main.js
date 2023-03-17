import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import FooterView from './components/FooterView.vue';
import HeaderView from './components/HeaderView.vue';
// import 'popper.js/dist/popper.min.js';
// import 'bootstrap/dist/css/bootstrap.min.css';
// import 'bootstrap/dist/js/bootstrap.min.js';
import AOS from 'aos';
import 'aos/dist/aos.css';

const app = createApp(App);
app.use(router);
app.component('FooterView', FooterView);
app.component('HeaderView', HeaderView);
app.mixin({
  created() {
    AOS.init();
  },
});
app.mount('#app');
