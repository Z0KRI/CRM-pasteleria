import { createRouter, createWebHistory, Router } from 'vue-router'
import container from '../container';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: []
})

container.bind<Router>('Router').toConstantValue(router);

export default router
