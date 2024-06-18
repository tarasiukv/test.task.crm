import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes.js';

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes,
});

router.beforeEach(async (to, from, next) => {
    document.title = to.meta.title || 'Page';
});

export default router;
