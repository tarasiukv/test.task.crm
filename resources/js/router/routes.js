const routes = [
    {
        path: '/',
        component: () => import('@component/Home.vue'),
        meta: {title: 'Home'}
    },
];

export default routes;
