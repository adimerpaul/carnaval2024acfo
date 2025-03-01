import { RouteRecordRaw } from 'vue-router'

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/carnaval/CarnavalIO.vue') },
      { path: 'loginMain', component: () => import('pages/Login.vue') },
      { path: 'videos', component: () => import('pages/Videos.vue') },
      { path: 'acfo', component: () => import('pages/Acfo.vue') },
      { path: 'rol', component: () => import('pages/Rol.vue') },
      { path: 'usuarios', component: () => import('pages/User.vue') }
      // { path: 'about', component: () => import('pages/about/About.vue') }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
