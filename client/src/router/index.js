import { createRouter, createWebHistory } from 'vue-router';
import axios from 'axios';
import LandingPage from './../views/LandingPage.vue';
import config from './../config.js';

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
    path: '/projekt/:id',
    name: 'project',
    component: () => import('./../views/ProjectView.vue'),
  },
  {
    path: '/login',
    name: 'LoginView',
    component: () => import('./../views/LoginView.vue'),
  },
  {
    path: '/admin',
    name: 'AdminView',
    component: () => import('./../views/AdminView.vue'),
    meta: {
      requiredAuth: true,
    },
  },
  {
    path: '/kontaktideinfo',
    name: 'AddContactInfo',
    component: () => import('./../views/AddContactInfo.vue'),
    meta: {
      requiredAuth: true,
    },
  },
  {
    path: '/hoolekoguinfo',
    name: 'AddTrustees',
    component: () => import('./../views/AddTrustees.vue'),
    meta: {
      requiredAuth: true,
    },
  },
  {
    path: '/ruhmadeinfo',
    name: 'AddGroupsinfo',
    component: () => import('./../views/AddGroupsinfo.vue'),
    meta: {
      requiredAuth: true,
    },
  },
  {
    path: '/lisapostitus',
    name: 'AddPosts',
    component: () => import('./../views/AddPosts.vue'),
    meta: {
      requiredAuth: true,
    },
  },
  {
    path: '/projektideinfo',
    name: 'AddProjectsInfo',
    component: () => import('./../views/AddProjectsInfo.vue'),
    meta: {
      requiredAuth: true,
    },
  },
  {
    path: '/dokumentideinfo',
    name: 'AddDocuments',
    component: () => import('./../views/AddDocuments.vue'),
    meta: {
      requiredAuth: true,
    },
  },
  {
    path: '/seaded',
    name: 'seaded',
    component: () => import('./../views/SettingsView.vue'),
    meta: {
      requiredAuth: true,
    },
  },
];

const router = createRouter({
  routes,
  history: createWebHistory(),
});

router.beforeEach(async (to, from, next) => {
  // Check if the route requires authentication
  if (to.matched.some((record) => record.meta.requiredAuth)) {
    try {
      // Check if PHPSESSID cookie is present
      const hasSessionCookie = document.cookie
        .split(';')
        .some((c) => c.trim().startsWith('PHPSESSID='));
      // Make a request to your session.php endpoint to check if the user is logged in
      const response = await axios.get(
        `${config.baseUrlApi}/users/session.php`,
        { withCredentials: true }
      );
      const { loggedIn } = response.data;

      // Check if the user is logged in
      if (loggedIn && hasSessionCookie) {
        next();
      } else {
        // User is not authenticated, redirect to login or another page
        next('/login'); // Redirect to the login page
      }
    } catch (error) {
      // Handle errors, e.g., network issues
      console.error('Error checking authentication:', error);
      next('/login'); // Redirect to the login page in case of an error
    }
  } else {
    // If the route does not require authentication, proceed to the next route
    next();
  }
});

export default router;
