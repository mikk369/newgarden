import { createRouter, createWebHistory } from 'vue-router';
// import AdminView from './../views/AdminView.vue';
import LandingPage from './../views/LandingPage.vue';

const routes = [
  {
    path: '/',
    name: 'LandingPage',
    component: LandingPage,
  },
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
    path: '/ruhmad',
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
    path: '/projektid',
    name: 'Projektid',
    component: () => import('./../views/projectsView.vue'),
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
  {
    path: '/admin',
    name: 'AdminView',
    component: () => import('./../views/AdminView.vue'),
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
  {
    path: '/kontaktideinfo',
    name: 'AddContactInfo',
    component: () => import('./../views/AddContactInfo.vue'),
  },
  {
    path: '/hoolekoguinfo',
    name: 'AddTrustees',
    component: () => import('./../views/AddTrustees.vue'),
  },
  {
    path: '/ruhmadeinfo',
    name: 'EditGroupsInfo',
    component: () => import('./../views/EditGroupsInfo.vue'),
  },
  {
    path: '/lisapostitus',
    name: 'AddPosts',
    component: () => import('./../views/AddPosts.vue'),
  },
  {
    path: '/projektideinfo',
    name: 'AddProjectsInfo',
    component: () => import('./../views/AddProjectsInfo.vue'),
  },
  {
    path: '/dokumentideinfo',
    name: 'AddDocuments',
    component: () => import('./../views/AddDocuments.vue'),
  },
  {
    path: '/projekt/:id',
    name: 'project',
    component: () => import('./../views/ProjectView.vue'),
  },
];

const router = createRouter({
  routes,
  history: createWebHistory(),
});

export default router;
