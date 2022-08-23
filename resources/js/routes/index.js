import List from '../views/List';
import Page from '../views/Page';
import Statistics from '../views/Statistics';

export const routes = [
    {
        path: '/',
        name: 'list',
        component: List,
    },
    {
        path: '/pages/:slug',
        name: 'page',
        component: Page,
    },
    {
        path: '/statistics',
        name: 'statistics',
        component: Statistics,
    },
];
