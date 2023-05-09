import { createRouter, createWebHistory } from 'vue-router';
// import AdminView from './../views/AdminView.vue';
import LandingPage from './../views/LandingPage.vue';

const routes = [
  {
    path: '/',
    name: 'LandingPage',
    component: LandingPage,
  },
  //   {
  //     path: '/AdminView',
  //     name: 'AdminView',
  //     component: AdminView,
  //   },
  {
    path: '/kontaktid',
    name: 'ContactView',
    component: () => import('./../views/ContactView.vue'),
  },
  {
    path: '/hoolekogu',
    name: 'TrusteesView',
    component: () => import('./../views/TrusteesView.vue'),
  },
  {
    path: '/groups',
    name: 'Groups',
    component: () => import('./../views/GroupsView.vue'),
  },
  {
    path: '/lillepai',
    name: 'lillepai',
    component: () => import('./../views/LillepaiView.vue'),
  },
  {
    path: '/kullapai',
    name: 'kullapai',
    component: () => import('./../views/KullapaiView.vue'),
  },
  {
    path: '/dokumendid',
    name: 'Documents',
    component: () => import('./../views/DocumentsView.vue'),
  },
  {
    path: '/ajalugu',
    name: 'History',
    component: () => import('./../views/HistoryView.vue'),
  },
  {
    path: '/post/:id',
    name: 'post',
    component: () => import('./../views/PostView.vue'),
  },
  //   {
  //     path: '/admin',
  //     name: 'Login',
  //     component: () => import('./../views/LoginView.vue'),
  //   },

  //   {
  //     path: '/Profile',
  //     name: 'ProfileView',
  //     component: () => import('./../views/ProfileView.vue'),
  //   },
  //   {
  //     path: '/AddContacts',
  //     name: 'AddContactsView',
  //     component: () => import('./../views/AddContactsView.vue'),
  //   },
  //   {
  //     path: '/AddGroups',
  //     name: 'AddGroupsView',
  //     component: () => import('./../views/AddGroupsView.vue'),
  //   },
  //   {
  //     path: '/AddPosts',
  //     name: 'AddPostsView',
  //     component: () => import('./../views/AddPostsView.vue'),
  //   },
];

const router = createRouter({
  routes,
  history: createWebHistory(),
});

export default router;
